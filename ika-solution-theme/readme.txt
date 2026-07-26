=== IKA Solution Pro ===

Contributors: ikasolution
Requires at least: 6.0
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.1.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: custom-menu, featured-images, translation-ready, full-width-template, custom-logo, threaded-comments

Thème WordPress sur mesure pour IKA SOLUTION LTD.

== Description ==

Reproduit fidèlement le site d'origine (mise en page et animations) et rend
l'ensemble des contenus administrables depuis WordPress : slides du hero,
expertises, solutions logicielles, réalisations, équipe, clients, partenaires,
actualités, coordonnées et chiffres clés.

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

= 1.0.0 =
* Version initiale.
