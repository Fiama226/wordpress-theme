#!/usr/bin/env bash
# ---------------------------------------------------------------------------
# Audit reproductible du thème « IKA Solution Pro »
# Rejoue les contrôles du rapport AUDIT-THEME.md.
# Sortie : 0 si aucun bloquant, 1 sinon.
# Usage : bash tools/audit-theme.sh
# ---------------------------------------------------------------------------
set -uo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
THEME="$ROOT/ika-solution-theme"
cd "$ROOT"

RED=$'\033[31m'; YEL=$'\033[33m'; GRN=$'\033[32m'; BLD=$'\033[1m'; RST=$'\033[0m'
blockers=0; warnings=0

section() { printf '\n%s== %s ==%s\n' "$BLD" "$1" "$RST"; }
ko()   { printf '  %sBLOQUANT%s  %s\n' "$RED" "$RST" "$1"; blockers=$((blockers+1)); }
warn() { printf '  %sATTENTION%s %s\n' "$YEL" "$RST" "$1"; warnings=$((warnings+1)); }
ok()   { printf '  %sOK%s        %s\n' "$GRN" "$RST" "$1"; }

# --- 1. Symlinks dans assets/ (images invisibles après installation) -------
section "1. Assets du thème"
if [ -L "$THEME/assets/images" ] || [ -L "$THEME/assets/pdf" ]; then
  ko "assets/ contient des liens symboliques -> images/PDF en 404 une fois installé"
  find "$THEME/assets" -maxdepth 1 -type l -printf '              %f -> %l\n'
else
  n=$(find "$THEME/assets" -type f \( -name '*.jpg' -o -name '*.png' -o -name '*.webp' -o -name '*.svg' \) 2>/dev/null | wc -l)
  [ "$n" -gt 0 ] && ok "assets/ contient $n images réelles" || ko "assets/ ne contient aucune image"
fi

# --- 2. Images référencées mais absentes ----------------------------------
section "2. Images référencées introuvables"
missing=0
while read -r p; do
  [ -z "$p" ] && continue
  if [ ! -f "$ROOT/$p" ] && [ ! -f "$THEME/assets/$p" ]; then
    warn "référencée mais absente : $p"; missing=$((missing+1))
  fi
done < <(grep -rhoP "ika_asset\(\s*'\K[^']+" "$THEME" --include=*.php 2>/dev/null | sort -u)
[ "$missing" -eq 0 ] && ok "toutes les images référencées existent"

# --- 3. Fichiers requis par WordPress -------------------------------------
section "3. Fichiers de thème attendus"
for f in style.css index.php functions.php; do
  [ -f "$THEME/$f" ] && ok "$f présent" || ko "$f manquant (obligatoire)"
done
for f in screenshot.png 404.php search.php archive.php comments.php readme.txt; do
  [ -f "$THEME/$f" ] && ok "$f présent" || warn "$f manquant"
done

# --- 4. Sections de la home présentes ? -----------------------------------
section "4. Parité de la page d'accueil avec le site statique"
for s in accueil societe pourquoi expertises produits realisations hosting actualites vision partenaires contact; do
  if grep -rqs "id=\"$s\"" "$THEME/front-page.php" "$THEME/template-parts/" 2>/dev/null; then
    ok "section #$s"
  else
    ko "section #$s absente de la page d'accueil"
  fi
done
# La section clients existe mais sans ancre #clients ni titre : version dégradée.
if grep -rqs 'id="clients"' "$THEME/template-parts/" 2>/dev/null; then
  ok "section #clients"
elif grep -rqs "client-logo" "$THEME/template-parts/clients.php" 2>/dev/null; then
  warn "section clients présente mais dégradée (ancre #clients et titre « Ils ont choisi IKA Solutions » absents)"
else
  ko "section #clients absente de la page d'accueil"
fi

# --- 5. Contenu codé en dur (non éditable) --------------------------------
section "5. Éditabilité des templates"
for f in page-equipe.php page-realisations.php page-actualites.php \
         page-detail-actualite.php page-presentation.php \
         template-parts/about.php template-parts/pourquoi.php \
         header.php footer.php; do
  [ -f "$THEME/$f" ] || continue
  if grep -qsE "get_posts|WP_Query|have_posts|get_post_meta|the_content|get_theme_mod|get_option|ika_opt|ika_m\(" "$THEME/$f"; then
    ok "$f lit la base"
  else
    warn "$f est 100% codé en dur (non éditable depuis l'admin)"
  fi
done

# --- 6. CPT enregistrés mais jamais utilisés ------------------------------
section "6. Custom Post Types orphelins"
for cpt in $(grep -oP "register_post_type\(\s*'\K[^']+" "$THEME/functions.php" 2>/dev/null); do
  if grep -rqs "post_type'\s*=>\s*'$cpt'" "$THEME"/*.php "$THEME"/template-parts/*.php 2>/dev/null \
     || [ -f "$THEME/single-$cpt.php" ]; then
    ok "$cpt est utilisé"
  else
    warn "$cpt est enregistré mais aucun template ne l'affiche"
  fi
done

# --- 7. Liens .php en dur (404 sous WordPress) ----------------------------
section "7. Liens en dur vers des .php"
# Les href construits dynamiquement via admin_url() (admin-post.php, pages
# d'admin comme themes.php?page=…) ne sont pas des liens en dur : exclus.
hits=$(grep -rnoP 'href="\K(?!https?://)(?!.*admin-post\.php)(?!.*admin_url\s*\()[^"]*\.php[^"]*' "$THEME" --include=*.php 2>/dev/null)
if [ -n "$hits" ]; then
  echo "$hits" | while read -r l; do warn "lien .php : $l"; done
  warnings=$((warnings+1))
else
  ok "aucun lien .php en dur"
fi
grep -nP "_url'\s*=>\s*'[^']*\.php'" "$THEME/functions.php" 2>/dev/null \
  | while read -r l; do warn "URL .php dans un seeder : $l"; done

# --- 8. Double menu -------------------------------------------------------
section "8. Menu de navigation"
if grep -qs "wp_nav_menu" "$THEME/header.php" && ! grep -qs "has_nav_menu" "$THEME/header.php"; then
  ko "menu de repli affiché sans has_nav_menu() -> double menu dès qu'un menu WP est assigné"
else
  ok "repli de menu conditionné"
fi

# --- 9. Tailwind CDN + polices distantes ----------------------------------
section "9. Chargement des ressources"
grep -qs "cdn.tailwindcss.com" "$THEME/functions.php" \
  && ko "Tailwind chargé via CDN (interdit en production)" \
  || ok "pas de CDN Tailwind"
grep -qs "fonts.googleapis.com" "$THEME/header.php" \
  && warn "Google Fonts distant (perf + RGPD) : à héberger localement" \
  || ok "polices locales"
inline=$(grep -rls "<script>" "$THEME" --include=*.php 2>/dev/null | grep -v 'searchform.php' | wc -l)
[ "$inline" -gt 0 ] && warn "$inline fichier(s) avec du JS inline (à passer par wp_enqueue_script)" \
                    || ok "pas de JS inline"

# --- 10. Secrets ----------------------------------------------------------
section "10. Secrets versionnés"
sec=$(grep -rniE "define\(\s*'[A-Z_]*(PASS|SECRET|TOKEN|API_KEY)[A-Z_]*'\s*,\s*'[^']{4,}'" \
      "$ROOT" --include=*.php 2>/dev/null | grep -v '/\.git/' | grep -v '\.sample\.php' \
      | while IFS=: read -r file rest; do
          rel="${file#$ROOT/}"
          # Ignore les fichiers exclus du dépôt par .gitignore.
          if git -C "$ROOT" check-ignore -q "$rel" 2>/dev/null; then continue; fi
          if git -C "$ROOT" ls-files --error-unmatch "$rel" >/dev/null 2>&1; then
            echo "$file:$rest"
          fi
        done)
if [ -n "$sec" ]; then
  ko "secret versionné en clair :"
  echo "$sec" | sed 's/^/              /' | sed -E "s/(,\s*')[^']+('\s*\))/\1********\2/"
  [ -f "$ROOT/.gitignore" ] || ko "aucun .gitignore présent"
else
  ok "aucun secret détecté"
fi

# --- 11. Cohérence du ZIP livré -------------------------------------------
section "11. Archive de distribution"
if [ -f "$ROOT/ika-solution-theme.zip" ]; then
  python3 - "$ROOT" <<'PY'
import sys, os, zipfile
root = sys.argv[1]
z = zipfile.ZipFile(os.path.join(root, 'ika-solution-theme.zip'))
pre = 'ika-solution-theme/'
inzip = {n[len(pre):] for n in z.namelist() if n.startswith(pre) and n.endswith(('.php', '.css'))}
disk = set()
for r, d, f in os.walk(os.path.join(root, 'ika-solution-theme')):
    d[:] = [x for x in d if x not in ('node_modules', 'vendor')]
    for x in f:
        if x.endswith(('.php', '.css')):
            disk.add(os.path.relpath(os.path.join(r, x), os.path.join(root, 'ika-solution-theme')))
dead, absent = inzip - disk, (disk - inzip) - {'assets/css/src.css'}
imgs = [n for n in z.namelist() if n.endswith(('.jpg', '.png', '.webp', '.svg', '.pdf'))]
print(f"              fichiers morts dans le ZIP : {len(dead)}")
print(f"              fichiers du thème absents du ZIP : {len(absent)}")
print(f"              images embarquées : {len(imgs)}")
sys.exit(1 if (dead or absent or not imgs) else 0)
PY
  [ $? -ne 0 ] && ko "ika-solution-theme.zip est périmé / incomplet" || ok "ZIP cohérent"
else
  ok "pas de ZIP versionné"
fi

# --- 12. API dépréciées ---------------------------------------------------
section "12. API dépréciées"
grep -qsE "^[^/*]*[^a-z_]get_page_by_title\(" "$THEME/functions.php" \
  && warn "get_page_by_title() est déprécié depuis WordPress 6.2" \
  || ok "pas de get_page_by_title()"
grep -qs "echo date(" "$THEME/footer.php" \
  && warn "date() ignore le fuseau du site : utiliser wp_date()" \
  || ok "gestion des dates correcte"

# --- 13. État actif de la navigation (entrée courante soulignée/bleue) ----
section "13. État actif de la navigation"
if grep -qs "function ika_nav_active" "$THEME/functions.php" \
   && [ "$(grep -c 'ika_nav_active(' "$THEME/header.php")" -ge 14 ]; then
  ok "ika_nav_active() appliquée au menu de repli (desktop + mobile)"
else
  ko "état actif absent du menu de repli (entrée courante non soulignée)"
fi
grep -qs "current-menu-item" "$THEME/style.css" \
  && ok "état actif stylé pour les menus WordPress personnalisés" \
  || ko "aucun style pour .current-menu-item (menu WP assigné)"

# --- 14. Parité partenaires / clients avec le site statique ---------------
section "14. Parité partenaires & clients"
for asset in images/microsoft.png images/paloalto.svg; do
  [ -f "$THEME/assets/$asset" ] || ko "asset partenaire manquant : assets/$asset"
done
grep -qs "'palo-alto'" "$THEME/functions.php" && ok "partenaire Palo Alto seedé" || ko "Palo Alto absent du seed partenaires"
grep -qs "images/microsoft.png" "$THEME/functions.php" && ok "logo Microsoft seedé" || ko "logo Microsoft absent du seed partenaires"
if grep -qsE "'(abdi|arcep)' *=> *array" "$THEME/functions.php"; then
  ko "ABDI/ARCEP seedés alors qu'ils sont absents du site statique"
else
  ok "pas de partenaire hors-statique dans le seed (ABDI/ARCEP)"
fi
grep -qs "ika_partenaire_url" "$THEME/template-parts/partenaires.php" \
  && ok "liens optionnels sur les logos partenaires" \
  || ko "logos partenaires non cliquables (meta url non utilisée)"
grep -qs "ika_client_url" "$THEME/template-parts/clients.php" \
  && ok "liens optionnels sur les logos clients" \
  || ko "logos clients non cliquables (meta url non utilisée)"
grep -qs "'CORIS BANK'" "$THEME/functions.php" && ok "libellé CORIS BANK conforme au statique" || warn "libellé client Coris différent du statique"

# --- 15. Pagination Réalisations & Actualités -----------------------------
section "15. Pagination (réglable depuis l'admin)"
grep -qs "ika_realisations_per_page" "$THEME/inc/customizer.php" \
  && grep -qs "ika_actualites_per_page" "$THEME/inc/customizer.php" \
  && ok "réglages « nombre par page » dans le Customizer" \
  || ko "réglages de pagination absents du Customizer"
grep -qs 'data-per-page' "$THEME/page-realisations.php" \
  && grep -qs 'data-per-page' "$THEME/page-actualites.php" \
  && ok "grilles data-per-page branchées sur les réglages" \
  || ko "data-per-page absent des pages Réalisations/Actualités"
grep -qs "data-pagination-for" "$THEME/assets/js/theme.js" \
  && ok "pagination JS (compatible filtres) présente" \
  || ko "module de pagination absent de theme.js"

# --- 16. SMTP administrable -----------------------------------------------
section "16. Réglages SMTP dans l'admin"
grep -qs "inc/smtp-settings.php" "$THEME/functions.php" \
  && ok "inc/smtp-settings.php chargé" \
  || ko "inc/smtp-settings.php non chargé par functions.php"
[ -f "$THEME/inc/smtp-settings.php" ] \
  && grep -qs "phpmailer_init" "$THEME/inc/smtp-settings.php" \
  && grep -qs "add_options_page" "$THEME/inc/smtp-settings.php" \
  && ok "page Réglages ▸ Email (SMTP) + hook phpmailer_init" \
  || ko "configuration SMTP incomplète"

# --- 17. Page Proxmox (réécrite, anti-plagiat) -----------------------------
section "17. Page Proxmox"
[ -f "$THEME/page-proxmox.php" ] && ok "page-proxmox.php présent" || ko "page-proxmox.php absent"
grep -qs "'page-proxmox.php'" "$THEME/functions.php" \
  && ok "page Proxmox créée à l'activation" \
  || ko "page Proxmox non enregistrée dans les pages par défaut"
for f in logo-debian.png logo-kvm.png logo-lxc.png logo-ceph.png proxmox-backup-server-dashboard.png proxmox-mail-gateway-infrastructure.png; do
  [ -f "$THEME/assets/images/proxmox/$f" ] || ko "image Proxmox manquante : assets/images/proxmox/$f"
done
ok "visuels Proxmox présents"
for f in "$THEME/page-proxmox.php" "$ROOT/proxmox.php"; do
  if grep -qiE "nktek|KVM est la technologie de virtualisation Linux leader de l" "$f"; then
    ko "texte suspect (copié d'une source externe) détecté dans $f"
  else
    ok "$(basename "$f") : aucun texte repris de la source externe"
  fi
done

# --- 18. Régression héros : overlay opacité hors-échelle Tailwind ----------
section "18. Images de fond des héros internes"
if grep -qsE '\.bg-ikaBlueDark\\/9[28]\b' "$THEME/style.css"; then
  ko "style.css redéfinit bg-ikaBlueDark/92 : masque l'image de fond (différent du statique, où la classe est inerte)"
else
  ok "overlay /92 non redéfini (image de fond visible à 10 %, comme sur le statique)"
fi

# --- 19. Extensions recommandées (installation/configuration par le thème) -
section "19. Extensions recommandées"
REC="$THEME/inc/recommended-plugins.php"
[ -f "$REC" ] && grep -qs "inc/recommended-plugins.php" "$THEME/functions.php" \
  && ok "module inc/recommended-plugins.php chargé par functions.php" \
  || ko "inc/recommended-plugins.php absent ou non chargé"
ko_slugs=0
for slug in simple-custom-post-order updraftplus wordfence wordpress-seo wp-smushit duplicate-page contact-form-7; do
  grep -qs "'$slug'" "$REC" || { ko "extension absente du catalogue : $slug"; ko_slugs=$((ko_slugs+1)); }
done
[ "$ko_slugs" -eq 0 ] && ok "catalogue complet (7 extensions gratuites)"
if [ -f "$REC" ]; then
  grep -qs "current_user_can" "$REC" && grep -qs "wp_nonce_url" "$REC" && grep -qs "check_admin_referer" "$REC" \
    && ok "actions sécurisées (capacités + nonces)" \
    || ko "actions d'installation insuffisamment sécurisées"
  grep -qs "scporder_options" "$REC" && grep -qs "updraft_interval" "$REC" \
    && ok "configuration automatique (SCPOrder + UpdraftPlus) présente" \
    || ko "configuration automatique des extensions absente"
  grep -qs "admin_post_ika_ext_action" "$REC" \
    && ok "endpoint admin-post d'installation/activation présent" \
    || ko "endpoint admin-post manquant"
fi
if find "$THEME" -name '*.zip' -o -name '*.tar.gz' | grep -q .; then
  ko "des extensions sont embarquées en archive dans le thème (à proscrire)"
else
  ok "aucune extension embarquée (téléchargement depuis wordpress.org)"
fi

# --- 20. Onglets des pages partenaires (contenu + mécanisme) ---------------
section "20. Onglets partenaires (parité + filtrage)"
# Mécanisme de filtrage par délégation d'événement dans theme.js.
grep -qs "closest('.pmx-tab')\|closest(\".pmx-tab\")" "$THEME/assets/js/theme.js" \
  && grep -qs "data-pmx-tabs" "$THEME/assets/js/theme.js" \
  && ok "filtrage par onglets : délégation d'événement (theme.js)" \
  || ko "mécanisme de filtrage par onglets absent de theme.js"
grep -qs "ikaPmxInit" "$THEME/assets/js/theme.js" \
  && ok "activation du premier onglet à l'ouverture" \
  || warn "initialisation du premier onglet non repérée"
# Parité du contenu des onglets avec le site statique (représentatif).
pmx_ko=0
declare -A PMX_CHECK=(
  ["odoo"]="CRM : piloter votre pipeline|Écritures et facturation|Gestion de stock multi-entrepôts"
  ["fortinet"]="Administration centralisée|FortiClient|Détection des menaces"
  ["paloalto"]="Prisma Access (SASE)|Un accès sécurisé dans le cloud|Contrôle applicatif"
  ["microsoft"]="Plans Business|Business Standard|Messagerie, Teams et applications Office"
)
for partner in odoo fortinet paloalto microsoft; do
  for needle in $(echo "${PMX_CHECK[$partner]}" | tr '|' '\n'); do
    grep -qsF "$needle" "$THEME/functions.php" || { ko "onglet partenaire '$partner' : texte absent des défauts : $needle"; pmx_ko=$((pmx_ko+1)); }
  done
done
[ "$pmx_ko" -eq 0 ] && ok "contenu des onglets partenaires conforme au site statique"

# --- Synthèse -------------------------------------------------------------
printf '\n%s────────────────────────────────────────────%s\n' "$BLD" "$RST"
printf '  Bloquants : %s%d%s   Avertissements : %s%d%s\n' \
  "$RED" "$blockers" "$RST" "$YEL" "$warnings" "$RST"
if [ "$blockers" -gt 0 ]; then
  printf '  %sVerdict : NON production-ready%s\n\n' "$RED" "$RST"; exit 1
fi
printf '  %sVerdict : aucun bloquant détecté%s\n\n' "$GRN" "$RST"; exit 0
