# Plan de Transformation - Thème WordPress Professionnel 100% Open Source

Ce document présente l'architecture, la méthodologie et le plan d'action pour transformer votre site web PHP actuel en un thème WordPress professionnel, dynamique, 100% open source, tout en conservant strictement le design initial, l'ergonomie et toutes les animations.

---

## 1. Objectifs du Projet

1. **Fidélité Visuelle et Fonctionnelle Absolue ("Copier-Coller" parfait)** : Le front-end (HTML, CSS, JS, animations) doit être restitué à l'identique. Aucune régression graphique ou d'animation ne sera tolérée.
2. **Administration Dynamique (WordPress)** : Plus aucun contenu textuel ou visuel ne sera "en dur" (hardcodé) dans les templates PHP (à l'exception des éléments structurels figés). Tout sera administrable depuis le tableau de bord WordPress (Textes, Images, Boutons, Liens, Répéteurs).
3. **100% Open Source** : Utilisation exclusive de technologies et de plugins open source (WordPress Core, ACF Free, Kirki, etc.), sans dépendance à des licences payantes ou propriétaires.
4. **Maintenabilité et Performance** : Code propre respectant les normes de codage WordPress (WordPress Coding Standards), structure modulaire, chargement optimisé des scripts et des styles.

---

## 2. Architecture Technique Proposée

### A. Structure du Thème WordPress Sur Mesure
Le thème sera développé sur une base propre et légère (inspirée des meilleures pratiques de thèmes de départ comme *Underscores* ou d'une structure modulaire sur mesure) :
```text
wordpress-theme/
├── style.css             # En-tête du thème WordPress + Styles globaux
├── index.php             # Template par défaut
├── front-page.php        # Template de la page d'accueil
├── header.php            # En-tête (HTML <head>, navigation, logo)
├── footer.php            # Pied de page (scripts, copyright, liens)
├── functions.php         # Enregistrement des menus, scripts, styles, CPT, ACF
├── page.php              # Template des pages standard
├── single.php            # Template des articles / publications
├── archive.php           # Template des archives
├── 404.php               # Page d'erreur 404
├── assets/
│   ├── css/              # Feuilles de style (main.css, animations.css, etc.)
│   ├── js/               # Scripts JavaScript et gestion des animations
│   ├── images/           # Images par défaut / placeholders
│   └── fonts/            # Polices locales (si applicables)
└── template-parts/       # Parties de templates modulaires (hero, services, testimonials...)
```

### B. Gestion des Contenus Dynamiques
- **Page d'accueil & Pages spécifiques** : Utilisation d'**Advanced Custom Fields (ACF - Version Gratuite)** ou des **Champs Personnalisés / Blocs Gutenberg** pour administrer chaque section de manière intuitive (titres, sous-titres, images d'arrière-plan, boutons).
- **Options Globales du Site** : Utilisation du **Personnalisateur WordPress (Customizer API)** ou d'une page d'options ACF pour les éléments transverses (logo du site, liens de réseaux sociaux, informations de contact).
- **Types de Contenu Personnalisés (CPT - Custom Post Types)** : Si le site contient des éléments répétés (projets/réalisations, témoignages, membres d'équipe, services), création de CPT dédiés pour une gestion propre dans la base de données.
- **Menus de Navigation** : Enregistrement des emplacements de menus natifs WordPress (`register_nav_menus`).

### C. Gestion des Animations et du Design
- **Feuilles de style** : Les fichiers CSS existants seront organisés et injectés proprement via `wp_enqueue_style`.
- **Scripts et Animations** : Les bibliothèques JS (GSAP, AOS, Swiper, Vanilla JS, etc.) et scripts d'animation seront chargés de manière conditionnelle ou globale via `wp_enqueue_script` en évitant les conflits (utilisation de jQuery en mode no-conflict ou pur JS).

---

## 3. Plan d'Action Étape par Étape

### Phase 1 : Analyse et Préparation (Étape Actuelle)
- Analyse des fichiers PHP source et identification des composants statiques vs dynamiques.
- Validation de l'architecture des données (quels champs doivent être modifiables dans WordPress).

### Phase 2 : Initialisation du Thème WordPress
- Création du fichier `style.css` avec les métadonnées requises par WordPress.
- Création du fichier `functions.php` (activation du support des images à la une, des menus, des balises titre, etc.).
- Configuration du support multilingue ou des traductions (si nécessaire).

### Phase 3 : Découpage et Intégration du Front-End (`header.php`, `footer.php`, `front-page.php`)
- Extraction du `<head>` et du menu de navigation vers `header.php`.
- Extraction du pied de page et des scripts de fermeture vers `footer.php`.
- Transformation de la page d'accueil en `front-page.php`, en injectant les fonctions WordPress (`wp_head()`, `wp_footer()`, `bloginfo()`, etc.).

### Phase 4 : Dynamisation des Contenus (Suppression du Hardcode)
- Remplacement des textes et images statiques par des appels dynamiques (ACF / Customizer / Fonctions WP).
- Création des champs personnalisés pour chaque bloc (titres, paragraphes, images, CTA).
- Remplissage initial de la base de données WordPress avec le contenu d'origine pour obtenir un copier-conforme immédiat à l'activation.

### Phase 5 : Tests et Recette
- Vérification de l'intégrité visuelle (comparaison avant/après).
- Test de toutes les animations (au scroll, au survol, etc.).
- Vérification du responsive (mobile, tablette, desktop).
- Tests de modification via l'administration WordPress (vérification que chaque texte/image modifiable se met à jour correctement en front-end).

---

## 4. Questions pour affiner le projet

Pour que ce thème réponde parfaitement à vos attentes, merci de répondre aux questions suivantes (lors de votre prochain envoi des fichiers PHP ou dans votre réponse) :

1. **Quels sont les fichiers PHP composant actuellement votre site ?** (Vous pouvez les coller ici, ou m'indiquer leur liste et contenu : `index.php`, `contact.php`, `about.php`, etc.).
2. **Quelles sont les sections dynamiques dont vous souhaitez modifier le contenu fréquemment ?** (ex: Textes d'accueil, portfolio, témoignages, catalogue, formulaire de contact...).
3. **Quelles bibliothèques JavaScript ou frameworks CSS sont utilisés dans votre site actuel ?** (ex: Bootstrap, Tailwind, GSAP, AOS, Swiper.js, jQuery, etc.).
4. **Y a-t-il des fonctionnalités particulières ?** (ex: Formulaire de contact, blog, espace membre, multilingue, recherche, etc.).
5. **Avez-vous des préférences pour la gestion des champs dynamiques ?** (Préférez-vous l'extension **Advanced Custom Fields (ACF)** gratuite, ou l'éditeur de blocs natif **Gutenberg**, ou une approche 100% code via le Personnalisateur WordPress ?).

---

## 5. Nos Propositions et Recommandations Open Source

- **Stack recommandée** : WordPress (GPLv2) + ACF (Version Gratuite) + Contact Form 7 (ou WPForms Lite) + Thème sur mesure léger. Cette combinaison garantit une maintenabilité maximale, une vitesse de chargement élevée et une prise en main ultra-simple pour modifier textes et images sans compétences techniques.
- **Assets** : Vos fichiers CSS/JS actuels seront conservés à l'identique pour garantir que 100% des animations et styles CSS fonctionnent du premier coup sans réécriture lourde.
