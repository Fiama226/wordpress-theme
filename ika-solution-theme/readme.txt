=== IKA Solution Pro ===

Contributors: ikasolution
Requires at least: 6.0
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.7.1
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: custom-menu, featured-images, translation-ready, full-width-template, custom-logo, threaded-comments

Thème WordPress sur mesure pour IKA SOLUTION LTD.

== Description ==

Reproduit fidèlement le site d'origine (mise en page et animations) et rend
l'ensemble des contenus administrables depuis WordPress : slides du hero,
expertises, solutions logicielles, réalisations, équipe, clients, partenaires,
actualités, onglets de la page Proxmox, coordonnées et chiffres clés.
Tous les textes des pages (Société, Équipe, Réalisations, Actualités,
Proxmox, détails des solutions et expertises) sont éditables depuis
Apparence > Personnaliser > Contenu IKA Solution.

Tailwind CSS est compilé localement : aucune dépendance à un CDN externe.

== Installation ==

1. Apparence > Thèmes > Ajouter > Téléverser le thème > ika-solution-theme.zip
2. Activer le thème.
3. Réglages > Permaliens > Enregistrer (rafraîchit les règles de réécriture).

À l'activation, le thème crée automatiquement les pages Société, Équipe,
Réalisations et Actualités, et pré-remplit les contenus (idempotent : aucune
duplication en cas de réactivation).

== Où modifier le contenu ==

* Slides du hero .......... Slides hero
* Expertises .............. Expertises
* Solutions logicielles ... Solutions IKA
* Réalisations ............ Réalisations
* Équipe .................. Membres d'équipe
* Clients / Partenaires ... Clients / Partenaires
* Coordonnées, chiffres clés, page Société, section « Pourquoi nous
  choisir » .................. Personnaliser > Contenu IKA Solution
* Actualités .............. Articles
* Coordonnées et textes ... Apparence > Personnaliser > Contenu IKA Solution

== Formulaire de contact ==

Le thème embarque un formulaire natif (nonce, validation, anti-spam, wp_mail).
Pour utiliser Contact Form 7 ou WPForms, renseignez le shortcode dans
Apparence > Personnaliser > Contenu IKA Solution > Section contact.

Pour un envoi fiable, installez le plugin WP Mail SMTP et configurez les
identifiants dans wp-config.php (jamais dans un fichier du thème).

== Développement ==

  cd ika-solution-theme
  npm install
  npm run build:css     # compile assets/css/tailwind.css
  npm run watch:css     # recompilation à la volée

Régénérer l'archive de distribution : bash tools/build-theme-zip.sh
Contrôler la qualité du thème :        bash tools/audit-theme.sh

== Changelog ==

= 1.7.1 =
* Onglets des pages partenaires (Odoo, Fortinet, Palo Alto, Microsoft) :
  refonte du mécanisme d'activation par délégation d'événement — le
  filtrage par onglets fonctionne désormais de façon fiable quel que soit
  l'ordre de chargement, le cache du script ou le rendu tardif du DOM.
  Première carte activée à l'ouverture de la page.

= 1.7.0 =
* Page Proxmox entièrement éditable : nouveau type de contenu « Onglets
  Proxmox » (58 fiches créées automatiquement) + section Personnaliser
  dédiée (hero, sections, badges, liens).
* Pages Équipe, Réalisations, Actualités, Société : tous les textes
  éditables depuis le Personnalisateur.
* Pages détail Solution et Expertise : étiquettes de sections et textes
  des blocs contact éditables.
* Footer : bandeau support WhatsApp éditable.
* Correctif image tableau de bord Proxmox (double préfixe assets/).

= 1.6.0 =
* Navigation : « Actualités » n'est plus active sur l'accueil.
* Page d'accueil : ordre des sections et espacements identiques au site
  statique (partenaires en 3e position, py-10 sm:py-18).
* Nouveaux contenus éditables : badge « Qui sommes-nous », hébergement
  complet, bandeau défilant, méthode.


= 1.1.0 =
* Page d'accueil complète : ajout des sections réalisations, hébergement,
  méthode, actualités, vision, partenaires, contact (formulaire + carte) et
  du bandeau défilant.
* Équipe, réalisations et actualités désormais éditables (CPT et articles).
* Nouveau CPT Partenaires ; les CPT Réalisations et Membres sont exploités.
* Coordonnées, chiffres clés et textes éditables via le Customizer.
* Tailwind compilé localement (le CDN est supprimé).
* JavaScript et CSS externalisés et chargés via wp_enqueue.
* Ajout de 404.php, search.php, archive.php, comments.php, searchform.php,
  screenshot.png et readme.txt.
* Correction du double menu affiché lorsqu'un menu WordPress est assigné.
* Suppression des liens « .php » invalides sous WordPress.
* Les images sont embarquées dans le thème (les liens symboliques cassaient
  toutes les illustrations après installation).
* Suppression de 5 modèles dupliqués et du code mort hérité du site statique.
* Remplacement de get_page_by_title() (dépréciée) et de date() par wp_date().
* Respect de la préférence système « animations réduites ».

= 1.2.0 =
* Le contenu de la page Société (introduction, identité, vision/mission/
  valeurs, mot du Directeur Général, engagements) et de la section « Pourquoi
  nous choisir » de l'accueil est désormais éditable depuis le Customizer
  (`Personnaliser > Contenu IKA Solution`).
* Plus aucun texte codé en dur dans le thème : `bash tools/audit-theme.sh`
  retourne 0 bloquant et 0 avertissement.

= 1.3.0 =
* Parité stricte avec le site statique : régénération du CSS Tailwind compilé
  (classes manquantes : espacements de la grille « Nos domaines d'expertise »,
  décalages verticaux des cartes, ancrage du bandeau WhatsApp en bas à droite).
* Animations de révélation au défilement identiques au site statique : cibles
  automatiques (sections, articles, formulaires, images, blocs arrondis),
  variantes gauche/droite/haut/bas/zoom/tilt en rotation, délais en cascade,
  ré-apparition à chaque entrée dans le viewport ; surlignage du menu selon
  l'ancre courante rétabli.
* Accueil : les 3 cartes « Dernières réalisations » reproduisent le contenu
  exact du site statique (teasers Sonatur), éditables dans
  `Personnaliser > Contenu IKA Solution > Accueil — Dernières réalisations`.
* Page Réalisations : les 6 boutons de filtre sont toujours affichés, comme
  sur le site statique.
* Section « Nos solutions » de l'accueil : badges identiques au site statique
  (nouveau meta « ika_home_tags » seedé par solution).
* À l'activation, toutes les images du site (+ la brochure PDF) sont importées
  dans la médiathèque WordPress ; les templates utilisent automatiquement ces
  copies. Import idempotent, réparable depuis l'administration si interrompu.

= 1.4.0 =
* Navigation : l'entrée de la page courante est soulignée et colorée en bleu
  (menu de repli et menus WordPress personnalisés, desktop et mobile).
* Héros internes : l'image de fond des pages Équipe, Réalisations et
  Actualités est de nouveau visible à 10 %, exactement comme sur le site
  statique (le style maison `bg-ikaBlueDark/92` — absent du CDN Tailwind — la
  masquait entièrement).
* Expertises : contenus des 8 pages identiques au site statique (accroches,
  capacités, process, livrables) ; texte de carte accueil éditable
  séparément (nouveau champ « Texte de la carte »).
* Partenaires : liste identique au site statique (Microsoft avec logo, Odoo,
  Palo Alto, Fortinet, Proxmox) ; chaque logo peut avoir un lien optionnel —
  renseigné = cliquable (ex : Proxmox → page /proxmox), vide = non cliquable.
  Même mécanisme pour les logos clients.
* Clients : ordre d'affichage et libellés identiques au site statique.
* Nouvelle page « Proxmox » (créée automatiquement à l'activation) : contenu
  entièrement réécrit (anti-plagiat) avec la présentation par onglets —
  Virtual Environment, Backup Server, Mail Gateway — et formulaire de
  contact aux sujets adaptés.
* Pagination instantanée sur les pages Réalisations et Actualités (sans
  rechargement, compatible avec les filtres) ; nombre d'éléments par page
  réglable dans `Personnaliser > Contenu IKA Solution > Pagination`.
* SMTP administrable : nouvelle page `Réglages > Email (SMTP)` (hôte, port,
  chiffrement, authentification, expéditeur) avec bouton d'envoi d'un email
  de test — plus aucun identifiant codé en dur dans un fichier.
* Liens « Retour à l'accueil / aux expertises / aux solutions » : ajout
  d'une icône flèche pour une finition cohérente.
* Migration v7 automatique : met à niveau le contenu existant vers la parité
  statique sans écraser les modifications faites dans l'administration.

= 1.5.0 =
* Nouvelle page `Apparence > Extensions IKA` : installation et activation en
  un clic des extensions gratuites recommandées (Simple Custom Post Order,
  UpdraftPlus, Wordfence, Yoast SEO, Smush, Duplicate Page, Contact Form 7),
  directement depuis wordpress.org — aucune extension embarquée dans le
  thème. Inclut un guide de réglages conseillés en français, avec liens
  directs vers chaque page de réglages.
* Configuration automatique par le thème (sans jamais écraser un réglage
  déjà personnalisé) : glisser-déposer Simple Custom Post Order activé sur
  les 7 types de contenus IKA ; sauvegarde hebdomadaire UpdraftPlus
  (fichiers + base, 4 exemplaires conservés). Application immédiate après
  chaque activation, vérification régulière en tâche de fond, et bouton
  « Appliquer maintenant ».
* Notification d'accompagnement dans l'admin (masquable) tant que les
  extensions ne sont pas toutes actives.
* Rappel affiché de ne pas installer WP Mail SMTP (le thème possède déjà
  `Réglages > Email (SMTP)` — utiliser les deux provoquerait des conflits).

= 1.0.0 =
* Version initiale.
