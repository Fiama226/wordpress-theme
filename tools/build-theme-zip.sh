#!/usr/bin/env bash
# Génère l'archive distribuable du thème.
# Le ZIP n'est pas versionné (.gitignore) : il se régénère à la livraison.
#   bash tools/build-theme-zip.sh
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
THEME="ika-solution-theme"
OUT="$ROOT/$THEME.zip"

cd "$ROOT"

# 1. Compiler Tailwind si npm est disponible.
if command -v npm >/dev/null 2>&1 && [ -f "$THEME/package.json" ]; then
  echo "→ compilation de Tailwind…"
  ( cd "$THEME" && npm install --silent && npm run build:css )
fi

[ -f "$THEME/assets/css/tailwind.css" ] || { echo "ERREUR : assets/css/tailwind.css absent."; exit 1; }

# 2. Refuser de livrer un thème qui ne s'analyse pas (erreur fatale WordPress).
echo "→ contrôle de syntaxe PHP…"
if command -v php >/dev/null 2>&1; then
  find "$THEME" -name '*.php' -not -path '*/node_modules/*' -print0 \
    | xargs -0 -n1 php -l >/dev/null || { echo "ERREUR : erreur de syntaxe PHP dans le thème."; exit 1; }
elif [ -d "$THEME/node_modules/php-parser" ]; then
  node "$ROOT/tools/lint-php.js" || { echo "ERREUR : erreur de syntaxe PHP dans le thème."; exit 1; }
else
  echo "ATTENTION : ni php ni php-parser — syntaxe PHP non vérifiée."
fi
[ -z "$(find "$THEME" -path "$THEME/node_modules" -prune -o -type l -print)" ] || { echo "ERREUR : le thème contient des liens symboliques."; exit 1; }

rm -f "$OUT"
zip -r -q "$OUT" "$THEME" \
  -x "$THEME/node_modules/*" \
     "$THEME/package-lock.json" \
     "$THEME/assets/css/src.css" \
     "*/.DS_Store"

echo "→ $OUT"
unzip -l "$OUT" | tail -1
