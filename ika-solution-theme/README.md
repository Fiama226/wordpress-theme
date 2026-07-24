# IKA Solution Pro - Thème WordPress 100% Open Source

Ce dossier contient le thème WordPress sur mesure pour **IKA SOLUTION LTD**, conçu pour restituer à l'identique (pixel-perfect et animations fluides) le site statique d'origine tout en rendant l'ensemble du contenu administrable via la base de données WordPress.

---

## 🚀 Installation du Thème dans WordPress

1. Compressez le dossier `ika-solution-theme` au format `.zip` (ou téléchargez-le directement dans votre répertoire `wp-content/themes/ika-solution-theme`).
2. Rendez-vous dans votre tableau de bord WordPress : **Apparence > Thèmes > Ajouter nouveau**.
3. Cliquez sur **Mettre téléverser un thème**, sélectionnez le fichier zip, puis cliquez sur **Installer maintenant**.
4. Activez le thème **IKA Solution Pro**.

---

## 🛠️ Stack Technique 100% Open Source

- **WordPress Core (GPLv2)** : Moteur de gestion de contenu.
- **Tailwind CSS (CDN)** : Intégration fidèle du design et des classes d'origine.
- **Advanced Custom Fields (ACF - Version Gratuite)** : Pour la gestion intuitive des champs personnalisés (textes d'accueil, slogans, images, témoignages, détails d'équipe et de réalisations).
- **Custom Post Types (CPT)** : Enregistrés nativement dans `functions.php` pour les Réalisations et les Membres de l'Équipe.

---

## 📁 Structure des Templates WordPress

- `style.css` : En-tête du thème et définitions d'animations personnalisées.
- `functions.php` : Configuration du thème, enqueued scripts/styles, enregistrement des menus et des CPT.
- `header.php` / `footer.php` : En-tête et pied de page modulaires avec intégration dynamique des logos, menus et widgets.
- `front-page.php` : Page d'accueil complète (Hero Slider, section Société, Pourquoi nous choisir, Expertises, Logiciels phares avec onglets interactifs, Marquee clients).
- `page-presentation.php` / `presentation.php` : Page "Société".
- `page-equipe.php` / `equipe.php` : Page "Équipe".
- `page-realisations.php` / `realisations.php` : Page "Réalisations".
- `page-actualites.php` / `actualites.php` : Page "Actualités".
- Templates de solutions et d'expertises individuelles (`solution-template.php`, `expertise-template.php`, etc.).

---

## 💡 Remplissage Initial de la Base de Données

À l'activation du thème, les templates utilisent un contenu de repli (fallback) rigoureusement identique aux pages PHP d'origine. Vous pouvez ainsi modifier immédiatement vos textes et images via l'administration WordPress ou les champs ACF configurés.
