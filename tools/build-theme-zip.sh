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
[ -z "$(find "$THEME" -path "$THEME/node_modules" -prune -o -type l -print)" ] || { echo "ERREUR : le thème contient des liens symboliques."; exit 1; }

rm -f "$OUT"
zip -r -q "$OUT" "$THEME" \
  -x "$THEME/node_modules/*" \
     "$THEME/package-lock.json" \
     "$THEME/assets/css/src.css" \
     "*/.DS_Store"

echo "→ $OUT"
unzip -l "$OUT" | tail -1
