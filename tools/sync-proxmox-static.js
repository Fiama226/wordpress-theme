#!/usr/bin/env node
/* eslint-disable */
/**
 * Génère la version STATIQUE de la page Proxmox (proxmox.php à la racine)
 * à partir du template WordPress du thème (ika-solution-theme/page-proxmox.php).
 *
 * Les textes — entièrement réécrits pour IKA SOLUTION — restent identiques
 * entre les deux versions ; seuls les « connecteurs » changent :
 *  - helpers d'échappement : esc_html/esc_attr/esc_url → pmx_h ;
 *  - assets : ika_asset('images/x') → chemin 'assets/images/x' ;
 *  - liens : home_url('/#expertises') → 'index.php#expertises' ;
 *  - header/footer : get_header()/get_footer() → include statique avec
 *    $pageTitle / $pageDescription ;
 *  - formulaire natif du thème → formulaire contact-submit.php du statique.
 */
const fs = require('fs');
const path = require('path');

const THEME_FILE = path.join(__dirname, '..', 'ika-solution-theme', 'page-proxmox.php');
const STATIC_FILE = path.join(__dirname, '..', 'proxmox.php');

let s = fs.readFileSync(THEME_FILE, 'utf8');

// 1. Retire l'en-tête « Template Name » (spécifique WordPress).
s = s.replace(/^<\?php \/\* Template Name: Proxmox \*\/ \?>\n<\?php\n/, '<?php\n');

// 2. Retire le marqueur @package (spécifique WordPress) et referme le bloc.
s = s.replace(/\n \* @package ika-solution\n \*\//, '\n */');

// 3. Remplace la définition du filtre de sujets (spécifique WordPress) par
//    le helper d'échappement du site statique.
s = s.replace(
  /if \( ! function_exists\( 'ika_pmx_contact_subjects' \) \) \{[\s\S]*?\n\}\n/,
  "  function pmx_h($value) {\n" +
  "    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');\n" +
  "  }\n"
);

// 4. Header statique avec titre/meta à la place de get_header().
s = s.replace(
  /get_header\(\);\s*\?>/,
  "  $pageTitle = 'Proxmox | IKA SOLUTION LTD';\n" +
  "  $pageDescription = 'Virtualisation open source avec Proxmox : consolidation de serveurs (KVM et LXC), sauvegardes dédupliquées et chiffrées, passerelle anti-spam et antivirus.';\n" +
  "  include 'header.php';\n" +
  '?>'
);

// 5. Assets du thème → chemins du site statique.
s = s.replace(/esc_url\(\s*ika_asset\(\s*'([^']+)'\s*\)\s*\)/g, "pmx_h('assets/$1')");

// 6. Lien « Retour aux expertises ».
s = s.replace(
  /esc_url\(\s*home_url\(\s*'\/#expertises'\s*\)\s*\)/g,
  "pmx_h('index.php#expertises')"
);

// 7. Helpers d'échappement génériques.
s = s.replace(/esc_html\(/g, 'pmx_h(').replace(/esc_attr\(/g, 'pmx_h(').replace(/esc_url\(/g, 'pmx_h(');

// 8. Bloc contact du thème → formulaire contact-submit.php du site statique.
const staticForm = `  <!-- ===================== CONTACT ===================== -->
  <section id="contact" class="bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Contact</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">Parlez-nous de votre projet Proxmox.</h2>
        <p class="mt-5 max-w-xl text-base leading-8 text-white/85">Virtualisation des serveurs, sauvegardes dédupliquées ou protection de la messagerie : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.</p>
      </div>
      <form class="relative grid gap-4 rounded-[2rem] bg-white p-7 text-ikaInk shadow-premium sm:p-8" action="contact-submit.php" method="post">
        <input type="hidden" name="type" value="contact">
        <input type="hidden" name="redirect" value="proxmox.php#contact">
        <input type="hidden" name="page" value="Proxmox">
        <input type="hidden" name="form_time" value="<?= time() ?>">
        <div class="absolute left-[-9999px] top-auto h-px w-px overflow-hidden" aria-hidden="true">
          <label>Ne pas remplir ce champ <input type="text" name="site_web" tabindex="-1" autocomplete="off" value=""></label>
        </div>
        <?php if (isset($_GET['mail'], $_GET['notice'])): ?>
          <div class="rounded-2xl <?= $_GET['mail'] === 'success' ? 'bg-green-50 text-green-800' : 'bg-red-50 text-red-800' ?> p-4 text-sm font-bold">
            <?= htmlspecialchars((string) $_GET['notice'], ENT_QUOTES, 'UTF-8') ?>
          </div>
        <?php endif; ?>
        <div class="grid gap-4 sm:grid-cols-2">
          <label class="grid gap-2 text-sm font-bold text-slate-700">Nom
            <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="nom" type="text" placeholder="Votre nom" required>
          </label>
          <label class="grid gap-2 text-sm font-bold text-slate-700">Téléphone
            <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="telephone" type="tel" placeholder="+226">
          </label>
        </div>
        <label class="grid gap-2 text-sm font-bold text-slate-700">Email
          <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="email" type="email" placeholder="vous@entreprise.com" required>
        </label>
        <label class="grid gap-2 text-sm font-bold text-slate-700">Solution concernée
          <select class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="besoin">
            <option>Proxmox Virtual Environment (virtualisation)</option>
            <option>Proxmox Backup Server (sauvegarde)</option>
            <option>Proxmox Mail Gateway (sécurité messagerie)</option>
            <option>Autre demande liée à Proxmox</option>
          </select>
        </label>
        <label class="grid gap-2 text-sm font-bold text-slate-700">Message
          <textarea class="min-h-28 rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="message" placeholder="Décrivez votre projet" required></textarea>
        </label>
        <button class="h-10 w-fit whitespace-nowrap rounded-full bg-ikaRed px-4 text-xs font-extrabold text-white shadow-clean transition hover:bg-red-700" type="submit">Envoyer la demande</button>
      </form>
    </div>
  </section>`;

const contactRegex = /  <\?php\n  \/\/ Bloc contact commun au thème[\s\S]*?\n  \?>/;
if (!contactRegex.test(s)) {
  console.error('❌ Bloc contact du thème introuvable — transformation annulée.');
  process.exit(1);
}
s = s.replace(contactRegex, staticForm);

// 9. Footer statique.
s = s.replace(/<\?php get_footer\(\); \?>/, "<?php include 'footer.php'; ?>");

fs.writeFileSync(STATIC_FILE, s.replace(/\s+$/, '\n'), 'utf8');
console.log('✅ proxmox.php (statique) régénéré depuis le template du thème.');
