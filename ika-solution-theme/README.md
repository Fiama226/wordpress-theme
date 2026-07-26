# IKA Solution Pro - Thème WordPress 100% Open Source

Ce dossier contient le thème WordPress sur mesure pour **IKA SOLUTION LTD**, conçu pour restituer à l'identique (pixel-perfect et animations fluides) le site statique d'origine tout en rendant l'ensemble du contenu administrable via la base de données WordPress.

---

## 🚀 Installation du Thème dans WordPress

1. Compressez le dossier `ika-solution-theme` au format `.zip` (ou téléchargez-le directement dans votre répertoire `wp-content/themes/ika-solution-theme`).
2. Rendez-vous dans votre tableau de bord WordPress : **Apparence > Thèmes > Ajouter nouveau**.
3. Cliquez sur **Mettre téléverser un thème**, sélectionnez le fichier zip, puis cliquez sur **Installer maintenant**.
4. Activez le thème **IKA Solution Pro**.

> **Pages créées automatiquement à l'activation :** Société, Équipe, Réalisations, Actualités — avec leurs templates assignés.

---

## 🛠️ Stack Technique 100% Open Source

- **WordPress Core (GPLv2)** : Moteur de gestion de contenu.
- **Tailwind CSS (CDN)** : Intégration fidèle du design et des classes d'origine.
- **Custom Post Types (CPT)** : Enregistrés nativement dans `functions.php` pour les Slides hero, Solutions, Expertises, Clients, Réalisations et Membres de l'Équipe.
- **Meta Boxes natives** : Champs personnalisés sans dépendance ACF, configurés dans `functions.php` pour chaque CPT.

---

## 📁 Architecture Modulaire

### Template Parts (sections réutilisables)

| Fichier | Section | Description |
|---------|---------|-------------|
| `template-parts/hero.php` | Accueil | Hero slider dynamique (ika_slide CPT) avec animations orbit/decompose |
| `template-parts/about.php` | Société | Section "Qui sommes-nous" avec stats et image |
| `template-parts/pourquoi.php` | Pourquoi | 4 piliers : Proximité, Fiabilité, Réactivité, Sur-mesure |
| `template-parts/expertises.php` | Expertises | Grid 4 colonnes (ika_expertise CPT) avec clip-path |
| `template-parts/solutions.php` | Produits | Onglets interactifs (ika_solution CPT) avec tabs JS |
| `template-parts/clients.php` | Clients | Marquee logos défilants (ika_client CPT) |

### Page Templates

| Template | Page WordPress | Description |
|----------|---------------|-------------|
| `front-page.php` | Accueil | Assemble les 6 template-parts + JS animations |
| `page-presentation.php` | Société | Vision, mission, valeurs, mot du DG |
| `page-equipe.php` | Équipe | Fiches membres, valeurs d'entreprise |
| `page-realisations.php` | Réalisations | Portfolio filtré par type (app, site, intranet…) |
| `page-actualites.php` | Actualités | Blog-style articles |
| `page-expertise-template.php` | Expertises | Page détaillée par expertise |
| `page-detail-actualite.php` | Article | Article actualité individuel |
| `page-solutions-*.php` | Solutions | Pages détaillées par solution (courrier, visite, archive, portail) |

### CPTs & Seeding

| CPT | Slug | Admin Icon | Seed Data |
|-----|------|-----------|-----------|
| `ika_slide` | — | images-alt2 | 4 slides hero par défaut |
| `ika_solution` | solutions | lightbulb | IKA Visite, Courrier, Archive, Portail |
| `ika_expertise` | expertises | admin-tools | 8 domaines d'intervention |
| `ika_client` | — | businessman | 6 logos clients (APEC, Coris, LONAB…) |
| `ika_realisation` | — | portfolio | Réalisations (portfolio) |
| `ika_membre` | — | id | Membres de l'équipe |

---

## 💡 Remplissage Initial de la Base de Données

À l'activation du thème (`after_switch_theme`), le hook :
1. **Crée les pages** : Société (→ page-presentation), Équipe (→ page-equipe), Réalisations (→ page-realisations), Actualités (→ page-actualites)
2. **Seed les CPTs** : 4 slides hero, 4 solutions logicielles, 8 expertises, 6 logos clients — tout est idempotent (ne se recrée pas si déjà existant)

---

## 🎨 Animations & Design Pixel-Perfect

- **Hero Slider** : Transitions orbit/decompose/parallax avec clip-path et blur effects
- **Product Tabs** : Onglets interactifs JS avec switch instantané
- **Client Marquee** : Scroll infini CSS `@keyframes marquee` 26s linear
- **Scroll Reveal** : IntersectionObserver `.reveal` → `.visible` (fade + translateY)
- **WhatsApp Widget** : Pulse animation + tooltip contextuel
- **Expertise Cards** : Clip-path variations (8 formes) + hover scale/rotate/saturate
- **Float Animation** : 7s ease-in-out infinite translateY

---

## 🔧 Assets

Les assets (images, PDF) sont dans le dossier `assets/` avec des symlinks vers les ressources du repo :
- `assets/images/` → images du site (logo, slides, photos d'équipe, clients…)
- `assets/pdf/` → brochure.pdf

La fonction `ika_asset()` résout automatiquement les URLs : `get_template_directory_uri() . '/assets/' . $path`
