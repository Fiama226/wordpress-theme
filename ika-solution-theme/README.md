# IKA Solution Pro - Thème WordPress 100% Open Source

Ce dossier contient le thème WordPress sur mesure pour **IKA SOLUTION LTD**, conçu pour restituer à l'identique (pixel-perfect et animations fluides) le site statique d'origine tout en rendant l'ensemble du contenu administrable via la base de données WordPress.

---

## 🚀 Installation du Thème dans WordPress

1. Compressez le dossier `ika-solution-theme` au format `.zip` (ou copiez-le dans `wp-content/themes/ika-solution-theme`).
2. Dans WordPress : **Apparence > Thèmes > Ajouter nouveau > Installer**.
3. Activez **IKA Solution Pro**.

> **Pages + contenu créés automatiquement à l'activation :**
> - Pages : Société, Équipe, Réalisations, Actualités
> - CPT seed : 4 slides hero, 4 solutions logicielles, 8 expertises, 6 logos clients

---

## 🛠️ Stack Technique

- **WordPress Core (GPLv2)** + **Tailwind CSS (CDN)** + **Meta Boxes natives** (pas de dépendance ACF)
- **Contact Form 7** recommandé pour les formulaires (shortcode `[contact-form-7 id="ika-solution"]` / `[contact-form-7 id="ika-expertise"]`)

---

## 📁 Architecture Modulaire

### Template Parts (sections réutilisables)

| Fichier | Section | Source |
|---------|---------|--------|
| `template-parts/hero.php` | Accueil hero slider | ika_slide CPT |
| `template-parts/about.php` | Qui sommes-nous | statique |
| `template-parts/pourquoi.php` | 4 piliers | statique |
| `template-parts/expertises.php` | Expertises grid | ika_expertise CPT |
| `template-parts/solutions.php` | Onglets produits | ika_solution CPT |
| `template-parts/clients.php` | Marquee logos | ika_client CPT |

### Single Templates (pages dynamiques depuis CPTs)

| Template | CPT | Sections |
|----------|-----|----------|
| `single-ika_expertise.php` | ika_expertise | Hero + description + capabilities + process + deliverables + CTA + related |
| `single-ika_solution.php` | ika_solution | Hero + description + features + use_cases + benefits + CF7 form + related |

> **Pas besoin de stubs !** WordPress route automatiquement vers `single-ika_expertise.php` et `single-ika_solution.php` selon le CPT. Les 17 anciens fichiers stubs (page-developpement-app, expertise-template, etc.) ont été supprimés.

### Page Templates

| Template | Page | Description |
|----------|------|-------------|
| `front-page.php` | Accueil | Assemble les 6 template-parts + JS animations |
| `page-presentation.php` | Société | Vision, mission, valeurs, mot du DG |
| `page-equipe.php` | Équipe | Fiches membres, valeurs |
| `page-realisations.php` | Réalisations | Portfolio filtré |
| `page-actualites.php` | Actualités | Blog articles |
| `page-detail-actualite.php` | Article | Article individuel |

### CPTs & Meta Fields

| CPT | Slug | Meta Fields |
|-----|------|-------------|
| `ika_slide` | — | eyebrow, title, text, primary/secondary buttons, image, metric |
| `ika_solution` | solutions | eyebrow, image, features (list), benefits (list), use_cases (list) |
| `ika_expertise` | expertises | image, eyebrow, highlights (list), capabilities (list), process (list), deliverables (list) |
| `ika_client` | — | image |
| `ika_realisation` | — | (uses title, editor, thumbnail, excerpt) |
| `ika_membre` | — | (uses title, editor, thumbnail, excerpt) |

---

## 🎨 Animations & Design

- **Hero Slider** : transitions orbit/decompose/parallax + clip-path + blur
- **Product Tabs** : JS switch instantané
- **Client Marquee** : CSS `@keyframes marquee` 26s
- **Scroll Reveal** : IntersectionObserver `.reveal → .visible`
- **Expertise Cards** : 8 clip-path shapes + hover scale/rotate/saturate
- **WhatsApp Widget** : pulse animation + tooltip
