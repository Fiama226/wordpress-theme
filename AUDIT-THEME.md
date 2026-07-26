# Audit technique — Thème « IKA Solution Pro »

**Date de l'audit :** 26 juillet 2026
**Auditeur :** revue de code type agence web, avant mise en production
**Périmètre :** `ika-solution-theme/` comparé au site statique de référence

> ## ✅ Statut : corrigé — les 5 phases ont été réalisées
>
> Ce rapport documente l'état **initial** du thème. Tous les points bloquants
> ont depuis été traités (voir `CORRECTIONS.md` pour le détail des travaux).
>
> `bash tools/audit-theme.sh` retourne désormais **0 bloquant**.

---

## Verdict global

> ### ❌ Le thème n'est PAS production-ready en l'état.

Trois réponses directes à tes questions :

| Ta question | Réponse |
|---|---|
| **Si j'installe le thème, j'ai exactement mon site statique ?** | **Non.** La page d'accueil perd **9 sections sur 14** (~411 lignes de contenu), dont **le formulaire de contact, la carte Google Maps, les partenaires, les actualités, l'hébergement .bf et la section vision**. |
| **Tout mon template est éditable ?** | **Non.** Environ **40 % du contenu reste codé en dur** dans le PHP : les 14 membres de l'équipe, les réalisations, les actualités, le footer, le header, la section « Qui sommes-nous » et les 4 piliers « Pourquoi nous choisir ». |
| **Est-ce production-ready ?** | **Non.** 2 bugs bloquants à l'installation (images invisibles), 1 fuite de mot de passe en dépôt public, 1 CDN interdit en production. |

**Estimation de remise à niveau :** 3 à 5 jours de développement.

---

## 🔴 Bloquants — le thème ne fonctionne pas correctement une fois installé

### B1. Les images ne s'afficheront pas du tout (symlinks)

Le dossier `assets/` du thème ne contient pas d'images : ce sont deux **liens symboliques** qui pointent en dehors du thème, vers la racine du dépôt.

```
ika-solution-theme/assets/images -> ../../images
ika-solution-theme/assets/pdf    -> ../../pdf
```

**Conséquence :** WordPress installe le thème dans `wp-content/themes/ika-solution-theme/`. Les cibles `../../images` (soit `wp-content/images`) n'existent pas sur le serveur. **Les 100+ appels `ika_asset()` renverront tous des 404 :** logo, slides du hero, photos de l'équipe, logos clients, brochure PDF. Le site s'affichera « cassé », sans une seule image.

De plus, l'installeur ZIP de WordPress ne préserve pas les symlinks — et les décompresseurs les rejettent souvent pour raisons de sécurité.

**Correctif :** copier physiquement `images/` (31 Mo) et `pdf/` (196 Ko) dans `ika-solution-theme/assets/`, ou migrer les visuels vers la médiathèque WordPress (recommandé — voir R2).

### B2. Le ZIP livré est périmé et inutilisable

`ika-solution-theme.zip` (à la racine) ne correspond plus au thème :

- **20 fichiers morts** qu'il contient encore (`page-developpement-app.php`, `expertise-template.php`, `solution-template.php`, etc. — les stubs supprimés au dernier commit) ;
- **9 fichiers essentiels absents** : `single-ika_expertise.php`, `single-ika_solution.php`, `archive-ika_solution.php` et **les 6 `template-parts/`** ;
- **0 image / 0 PDF** à l'intérieur.

**Conséquence :** installer ce ZIP produit une page d'accueil vide (les `get_template_part()` ne trouvent rien) et un site sans images. **Ce fichier doit être régénéré ou supprimé du dépôt.**

### B3. 🔒 Mot de passe SMTP en clair dans un dépôt PUBLIC

`mail-config.php`, ligne 10 :

```php
define('SMTP_USER', 'soue@ikasolution.com');
define('SMTP_PASS', 'Gedeonr9@@@');   // ← exposé publiquement
```

Le dépôt `Fiama226/wordpress-theme` est **public** (vérifié), il n'y a **aucun `.gitignore`**, et ce fichier est dans l'historique Git depuis le commit `7d66cd0`.

**Ce compte Office 365 doit être considéré comme compromis.** Des robots scannent GitHub en continu à la recherche de ce motif ; un compte SMTP volé sert typiquement à envoyer du spam en votre nom, ce qui fera blacklister le domaine `ikasolution.com`.

**Actions immédiates, dans cet ordre :**
1. **Changer le mot de passe** du compte `soue@ikasolution.com` maintenant (avant tout nettoyage Git).
2. Activer l'authentification à deux facteurs sur ce compte.
3. Purger le fichier de l'historique (`git filter-repo` ou BFG) et forcer la réécriture, ou **passer le dépôt en privé**.
4. Remplacer par un plugin **WP Mail SMTP** avec les identifiants stockés dans `wp-config.php` (hors dépôt), et ajouter un `.gitignore`.

---

## 🟠 Écarts majeurs avec le site statique

### E1. La page d'accueil perd 9 sections sur 14

Comparaison `index.php` (statique, 684 lignes) vs `front-page.php` + template-parts (théme) :

| Section (id) | Lignes | Dans le thème ? |
|---|---:|---|
| `accueil` (hero) | 46 | ✅ |
| `societe` | 34 | ✅ |
| `pourquoi` | 33 | ✅ |
| `expertises` | 71 | ✅ |
| *(bandeau sans id)* | 33 | ❌ **manquant** |
| `produits` | 85 | ✅ |
| `realisations` | 38 | ❌ **manquant** |
| `hosting` (domaines .bf) | 35 | ❌ **manquant** |
| *(bandeau sans id)* | 36 | ❌ **manquant** |
| `actualites` | 38 | ❌ **manquant** |
| `vision` | 26 | ❌ **manquant** |
| `partenaires` | 33 | ❌ **manquant** |
| `clients` | 99 | ⚠️ version très réduite |
| `contact` (formulaire + carte) | 73 | ❌ **manquant** |

**Total : ~411 lignes de contenu absentes.** Le plus grave : **il n'y a plus aucun formulaire de contact ni carte Google Maps sur la page d'accueil**, alors que c'est le point de conversion principal du site. Les liens « Demander un devis » et « Contact » du menu pointent vers `/#contact` — une ancre **qui n'existe plus**. Idem pour les liens du footer vers `/#vision`.

### E2. Trois photos d'équipe référencées mais absentes du dépôt

`page-equipe.php` appelle trois images qui n'existent nulle part :

- `images/Fatoumata.jpg`
- `images/Koro.jpg`
- `images/team/kader.jpg` (le dossier `images/team/` n'existe pas)

Ces trois fiches afficheront une image cassée, **même après correction du bug B1**.

### E3. Liens `.php` en dur → 404 sous WordPress

- `page-actualites.php:55` et `actualites.php:54` : `href="detail-actualite.php?article=..."` — n'existe pas sous WordPress (permaliens réécrits).
- `functions.php:766` : un slide du hero a `'secondary_url' => 'presentation.php'` — cassé, doit être `home_url('/presentation')`.
- `detail-actualite.php:77` et `page-detail-actualite.php:78` : formulaire en `action="contact-submit.php"`, fichier **absent du thème**. Ces formulaires enverront vers une 404.

### E4. Double menu affiché simultanément

Dans `header.php`, `wp_nav_menu()` est appelé avec `'fallback_cb' => false`, puis **un menu statique est affiché juste en dessous sans aucune condition**. Dès que le client assignera un menu dans WordPress, **les deux menus s'afficheront côte à côte**. Le fallback doit être placé dans un `if ( ! has_nav_menu( 'header-menu' ) )`.

Même problème sur le menu mobile.

---

## 🟡 Éditabilité : la promesse « tout est éditable » n'est pas tenue

Le README annonce « l'ensemble du contenu administrable ». La réalité mesurée :

| Contenu | État réel |
|---|---|
| Slides du hero | ✅ éditable (CPT `ika_slide`) |
| Solutions logicielles | ✅ éditable (CPT `ika_solution`) |
| Expertises | ✅ éditable (CPT `ika_expertise`) |
| Logos clients | ✅ éditable (CPT `ika_client`) |
| **Équipe (14 membres)** | ❌ **codé en dur** dans `page-equipe.php` |
| **Réalisations** | ❌ **codé en dur** dans `page-realisations.php` |
| **Actualités (3 articles)** | ❌ **tableau PHP en dur** dans `page-actualites.php` |
| **Détail article** | ❌ **codé en dur** |
| **Page Société / vision / mission** | ❌ **codé en dur** |
| **« Qui sommes-nous » + chiffres clés** | ❌ **codé en dur** (`about.php`) |
| **4 piliers « Pourquoi nous choisir »** | ❌ **codé en dur** (`pourquoi.php`) |
| **Header : adresse, 2 téléphones, email** | ❌ **codé en dur** |
| **Footer : coordonnées, liens, WhatsApp** | ❌ **codé en dur** |

**Preuve technique :** ces 9 fichiers ne contiennent **aucun** appel à `get_posts`, `WP_Query`, `have_posts`, `get_post_meta`, `the_content`, `get_theme_mod` ni `get_option`. Ce sont des pages HTML statiques déguisées en templates.

### CPTs fantômes

`ika_realisation` et `ika_membre` sont **enregistrés** dans `functions.php` (avec libellés, icônes, support REST) mais **jamais interrogés par aucun template**, et **jamais alimentés** par les seeders.

**Conséquence concrète et déroutante pour le client :** il verra « Réalisations » et « Membres d'équipe » dans le menu WordPress, il y ajoutera ses contenus… **et rien n'apparaîtra sur le site**. Les pages continueront d'afficher les 14 noms codés en dur.

### Changer un numéro de téléphone = éditer du code

Le numéro `+226 72 08 90 90` apparaît en dur dans `header.php`, `footer.php` et le lien WhatsApp. Une simple mise à jour de coordonnées oblige à modifier trois fichiers PHP en FTP — exactement ce qu'un CMS est censé éviter.

---

## 🔵 Conformité WordPress & bonnes pratiques

### Fichiers obligatoires / attendus manquants

| Fichier | Impact |
|---|---|
| `screenshot.png` | **Aucune vignette** dans Apparence > Thèmes. Très amateur à la livraison. |
| `404.php` | Les pages introuvables tombent sur un template générique non stylé. |
| `search.php` | Résultats de recherche non stylés. |
| `archive.php` | Archives de catégories/dates non stylées. |
| `comments.php` | Commentaires impossibles à afficher. |
| `readme.txt` | Attendu pour tout thème distribué. |

### Tailwind via CDN — bloquant pour la production

```php
wp_enqueue_script( 'tailwindcss', 'https://cdn.tailwindcss.com', ... );
```

Le CDN Tailwind **compile le CSS dans le navigateur à chaque visite**. Ses propres auteurs indiquent qu'il ne doit **jamais** être utilisé en production. Conséquences : FOUC (page non stylée pendant un instant), pénalité Core Web Vitals / SEO, dépendance à un service tiers (CDN indisponible = site sans aucun style), et **site inutilisable hors ligne / intranet**.

**Correctif :** compiler Tailwind en amont vers un `assets/css/tailwind.css` et l'`enqueue` en local.

### Autres points de conformité

- **Google Fonts en dur** dans `header.php` : chargement bloquant hors `wp_enqueue_style`, et transfert d'IP vers Google (sujet RGPD). À héberger localement.
- **JS inline** dans `footer.php`, `front-page.php`, `page-realisations.php` : doit passer par `wp_enqueue_script` + `wp_localize_script`. Actuellement incompatible avec tout plugin de cache/minification.
- **CSS inline** (170 lignes) dans `header.php` : à déplacer dans `style.css`.
- **`date('Y')`** dans `footer.php` : ignore le fuseau du site. Utiliser `wp_date('Y')`.
- **`$_SERVER['SCRIPT_NAME']`** dans `header.php` (ligne 8) : vestige du site statique, sans effet sous WordPress où le routage passe par le `WP_Query`. La fonction `ika_nav_active()` associée est morte.
- **`get_page_by_title()`** (ligne 211) : **dépréciée depuis WordPress 6.2**. Le code prévoit un repli, mais un `_deprecated_function` sera loggé. À remplacer par `WP_Query`.
- **Fonctions non préfixées de manière homogène** : `ika_asset()`, `ika_h()` sont trop génériques pour un thème public ; risque de collision.
- **Doublons de templates** : `presentation.php` / `page-presentation.php`, `equipe.php` / `page-equipe.php`, etc. — 5 paires identiques à une ligne près (l'en-tête `Template Name`). ~1 400 lignes dupliquées à maintenir en double. Les fichiers sans en-tête ne sont jamais chargés par WordPress : **code mort**.

### Ce qui est bien fait ✅

Pour être juste, plusieurs points sont de bonne facture :

- **Sécurité des meta boxes exemplaire** : vérification `wp_verify_nonce`, `current_user_can('edit_post')`, garde `DOING_AUTOSAVE`, et `sanitize_text_field` avec `wp_unslash` à l'enregistrement.
- **Échappement en sortie** correct et systématique (`esc_url`, `esc_attr`, `esc_html`, `wp_kses_post`).
- **Garde `ABSPATH`** en tête de `functions.php`.
- **Seeders idempotents** : la vérification d'existence évite les doublons à chaque réactivation.
- **Repli propre si Contact Form 7 est absent** sur les templates `single-*`.
- **Architecture en template-parts** et suppression des 17 stubs : bonne direction, le routage natif `single-{cpt}.php` est la bonne approche.
- **37 chaînes internationalisées** avec un text domain cohérent.

---

## Plan de remise en production

### Phase 1 — Sécurité (aujourd'hui, ~1 h)
1. Changer le mot de passe SMTP `soue@ikasolution.com` **immédiatement** + activer le 2FA.
2. Purger `mail-config.php` de l'historique Git, ou passer le dépôt en privé.
3. Ajouter un `.gitignore` (`mail-config.php`, `*.zip`, `node_modules/`).

### Phase 2 — Débloquer l'installation (~0,5 j)
4. Remplacer les symlinks `assets/` par de vraies copies des dossiers `images/` et `pdf/`.
5. Supprimer le ZIP périmé du dépôt et le régénérer proprement à la livraison.
6. Ajouter un `screenshot.png` (1200×900).

### Phase 3 — Restituer le site à l'identique (~2 j)
7. Créer les 6 template-parts manquants : `contact.php` (formulaire + carte), `partenaires.php`, `hosting.php`, `actualites.php`, `vision.php`, `realisations.php`, et les brancher dans `front-page.php`.
8. Corriger le double menu (`has_nav_menu()`).
9. Remplacer tous les liens `.php` en dur par `get_permalink()` / `home_url()`.
10. Brancher le formulaire de contact sur Contact Form 7 ou WPForms.

### Phase 4 — Rendre le contenu réellement éditable (~1,5 j)
11. Câbler `page-equipe.php` sur le CPT `ika_membre` + créer `ika_seed_membres()` avec les 14 membres actuels.
12. Câbler `page-realisations.php` sur le CPT `ika_realisation` + seeder.
13. Basculer les actualités sur les **articles WordPress natifs** (et supprimer `page-detail-actualite.php` au profit de `single.php`).
14. Exposer les coordonnées (adresse, téléphones, email, WhatsApp) et les chiffres clés via le **Customizer** (`get_theme_mod`).
15. Rendre éditables les sections `about` et `pourquoi`.

### Phase 5 — Qualité production (~1 j)
16. Compiler Tailwind en local, retirer le CDN.
17. Héberger les polices Inter localement.
18. Externaliser le JS/CSS inline vers `assets/js/` et `assets/css/` via `wp_enqueue_*`.
19. Ajouter `404.php`, `search.php`, `archive.php`, `comments.php`.
20. Supprimer les 5 templates dupliqués (code mort) et le code mort de `header.php`.
21. Remplacer `get_page_by_title()` et `date()`.

---

## Vérification

Un script d'audit reproductible est fourni : `tools/audit-theme.sh`.
Il rejoue automatiquement les contrôles ci-dessus (symlinks, sections manquantes, contenu codé en dur, secrets, fichiers requis, liens `.php`, CDN) et sort en code d'erreur si un bloquant subsiste.

```bash
bash tools/audit-theme.sh
```
