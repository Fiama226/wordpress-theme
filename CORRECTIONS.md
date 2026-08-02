# Corrections apportées — les 5 phases

Réponse au rapport `AUDIT-THEME.md`. Les 21 actions planifiées ont été réalisées.

**Résultat de `bash tools/audit-theme.sh` :**

| | Avant | Après (v1.1.0) | Après (v1.2.0) | Après (v1.4.0) | Après (v1.5.0) |
|---|---:|---:|---:|---:|---:|
| Bloquants | **13** | **0** | **0** | **0** | **0** |
| Avertissements | 26 | 2 | **0** | **0** | **0** |

## Mise à jour v1.5.0 — extensions recommandées : installation et configuration par le thème

Nouveau module
[`inc/recommended-plugins.php`](ika-solution-theme/inc/recommended-plugins.php)
(aucune librairie externe, uniquement les API natives de WordPress) :

### Page `Apparence ▸ Extensions IKA`

- **Installation et activation en un clic** des 7 extensions gratuites
  recommandées, téléchargées depuis wordpress.org (aucune extension n'est
  embarquée dans le thème ; le serveur doit avoir accès à Internet) :
  Simple Custom Post Order, UpdraftPlus, Wordfence Security, Yoast SEO,
  Smush, Duplicate Page, Contact Form 7.
- Sécurité : liste blanche stricte des slugs, nonces (`wp_nonce_url` /
  `check_admin_referer`) et contrôle des capacités (`install_plugins`,
  `activate_plugins`) ; skin de mise à niveau silencieux qui n'affiche rien
  et ne demande jamais d'identifiants FTP (échec propre + message clair).
- Statut en direct de chaque extension (Actif / Installé / Non installé),
  lien direct vers ses **réglages**, et **guide en français** des réglages
  conseillés pour chaque extension.

### Configuration automatique par le thème

Appliquée dès l'activation d'une extension, re-vérifiée régulièrement en
tâche de fond, et déclenchable à la main (bouton « Appliquer les réglages
recommandés maintenant »). **Un réglage déjà personnalisé n'est jamais
écrasé** — seules les valeurs absentes sont complétées :

- **Simple Custom Post Order** : `scporder_options[objects]` ← les 7 types
  de contenus IKA (`ika_realisation`, `ika_membre`, `ika_partenaire`,
  `ika_client`, `ika_solution`, `ika_expertise`, `ika_slide`) dont
  l'affichage public suit `menu_order`. Le glisser-déposer fonctionne donc
  immédiatement dans les listes d'admin.
- **UpdraftPlus** : `updraft_interval` / `updraft_interval_database` ‹
  `weekly`, 4 exemplaires conservés (`updraft_retain`,
  `updraft_retain_db`), puis appel de `schedule_backup()` /
  `schedule_backup_database()` pour planifier réellement les crons.

Une notification d'accompagnement (masquable, auto-masquée quand tout est
actif) guide l'équipe vers la page. Un rappel y est aussi affiché : **ne
pas installer WP Mail SMTP** — le thème possède déjà `Réglages ▸ Email
(SMTP)`, utiliser les deux provoquerait des conflits d'envoi.

> WP Mail SMTP reste donc volontairement **hors** du catalogue (redondant
> avec le SMTP du thème) ; Contact Form 7 y est marqué « Optionnel » (le
> formulaire d'accueil natif du thème reste le canal principal).

### Vérification

```bash
bash tools/audit-theme.sh      # 0 bloquant, 0 avertissement (19 sections)
bash tools/build-theme-zip.sh  # régénère l'archive distribuable
```

**Non testable ici** (à valider sur la préproduction) : le téléchargement
wordpress.org et l'activation réelle des extensions, l'apparition du
glisser-déposer dans les listes après auto-configuration, et la planification
cron d'UpdraftPlus.

## Mise à jour v1.4.0 — retours terrain (août 2026)

Réponses aux problèmes remontés après installation réelle du thème.

### 1. Réécriture de la page Proxmox (anti-plagiat)

La page `/proxmox` reprenait les textes d'une page concurrente publiée en ligne.
Elle a été **entièrement réécrite** (formulations 100 % originales, sens et
périmètre fonctionnel conservés : Proxmox VE, Backup Server et Mail Gateway)
:

- nouveau template [`ika-solution-theme/page-proxmox.php`](ika-solution-theme/page-proxmox.php)
  avec la présentation par onglets (7 + 7 + 5 onglets de fonctionnalités) ;
- page créée **automatiquement à l'activation** du thème (menu + lien du logo
  Proxmox dans la section Partenaires) ;
- formulaire de contact du thème greffé en bas de page, avec des sujets
  adaptés (VE / Backup Server / Mail Gateway) ;
- la version **statique** [`proxmox.php`](proxmox.php) a été régénérée avec les
  mêmes textes (script : `node tools/sync-proxmox-static.js` — à relancer si
  le template du thème évolue).

### 2. Navigation : l'entrée courante n'était pas surlignée

Symptôme : sur une page (Accueil, Équipe…), le texte de l'entrée n'était pas
souligné/bleu — seul « Expertise » se comportait correctement.

Cause : seul le JavaScript gérait les **ancres** de l'accueil ; aucun état
actif n'existait pour les **pages** (le helper PHP du site statique n'avait
pas été porté).

Corrections :

- nouveau helper `ika_nav_active()` (functions.php) qui détecte la page
  courante (y compris les détails d'articles, de réalisations, d'expertises
  et de solutions) — classes identiques au site statique ;
- appliqué au menu de repli desktop **et** mobile dans `header.php` ;
- quand un **menu WordPress personnalisé** est assigné, `style.css` colore
  désormais `.current-menu-item` / `.current_page_item` (souligné bleu sur
  desktop, fond bleuté sur mobile).

### 3. « Nos domaines d'expertise » : contenus différents

Le seed embarquait des textes différents du site statique (accroches des
pages détail, capacités, process, livrables — notamment pour « Équipements &
services énergétiques » et « Support technique & infogérance »).

Corrections :

- les données des 8 expertises reprennent désormais **mot à mot** le site
  statique, en distinguant le **texte de carte accueil** (nouveau champ
  « Texte de la carte sur l'accueil ») du **chapô de la page détail**
  (l'extrait) — comme le fait le statique ;
- une **migration v7** met à jour les contenus déjà seedés vers la parité,
  **sans écraser** les champs que vous auriez modifiés dans l'admin (elle ne
  touche un champ que s'il est vide ou encore égal à l'ancienne valeur seedée).

### 4. Partenaires et clients différents du statique

| Écart | Correction |
|---|---|
| Microsoft affiché en texte brut (pas d'image) | `images/microsoft.png` copiée dans le thème et seedée |
| Palo Alto absent | ajouté (ordre et hauteur du statique, `max-h-16`) |
| ABDI, ARCEP et Coris affichés en plus | retirés par la migration v7 |
| Proxmox non cliquable | lien `/proxmox` seedé — comme sur le statique |
| Ordre du carrousel clients différent | ordre identique au statique (SONATUR, SONABHY, ONEA, LONAB, CORIS BANK, APEC) |

**Liens optionnels sur les logos** : chaque partenaire et chaque client
dispose d'un champ « Lien du logo » dans l'admin. Vide = logo non cliquable ;
renseigné = cliquable (nouvel onglet pour les URL externes). Exemple seedé :
Proxmox → page Proxmox.

### 5. Pagination Réalisations / Actualités + réglage en admin

- Pagination **instantanée côté navigateur** (choix validé avec vous) : aucun
  rechargement, et les **filtres de la page Réalisations continuent de
  fonctionner sur tous les projets** (la pagination suit le filtre actif et
  revient en page 1). Sans JavaScript, tout reste affiché.
- Nombre d'éléments par page réglable dans `Apparence > Personnaliser >
  Contenu IKA Solution > Pagination` (valeurs séparées pour Réalisations et
  Actualités, **0 = tout afficher**).

### 6. SMTP configurable depuis l'admin

Nouvelle page **`Réglages > Email (SMTP)`** (module
[`inc/smtp-settings.php`](ika-solution-theme/inc/smtp-settings.php)) :
activation, hôte, port, chiffrement (TLS/SSL/none), authentification,
identifiant, mot de passe (stocké en base, jamais dans le code), email et nom
d'expédition, plus un **bouton « Envoyer un email de test »**. Le formulaire
de contact et toutes les notifications `wp_mail()` passent automatiquement
par ces réglages — plus rien n'est codé en dur dans un fichier.

> Le plugin gratuit **WP Mail SMTP** est une alternative possible ; dans ce
> cas, laissez le SMTP du thème désactivé pour éviter les doublons.

### 7. Images de fond absentes des héros internes

Cause trouvée : `bg-ikaBlueDark/92` **n'existe pas dans l'échelle Tailwind**
(90, 95…). Le CDN du site statique ne générait donc **rien** pour cette
classe et l'image y restait visible à 10 % — tandis que `style.css` la
définissait manuellement à 92 % d'opacité dans le thème, masquant presque
totalement l'image. La retouche maison a été supprimée : les héros des pages
Équipe/Réalisations/Actualités affichent de nouveau l'image de fond à 10 %,
**exactement comme le site statique**. Un contrôle de régression (section 18
de `tools/audit-theme.sh`) bloque toute réintroduction.

### 8. Petites imperfections

- Icône flèche `←` (SVG) ajoutée sur tous les liens « Retour à
  l'accueil / aux expertises / aux solutions / aux actualités ».
- Coquille « Technicien , helpdesk » corrigée (seed + migration v7 + fichier
  statique `equipe.php`).
- Le mot-clé Proxmox du bandeau défilant, les visuels de la page
  (`assets/images/proxmox/`, hero, dashboard, schéma) et les logos
  Microsoft/Palo Alto sont **embarqués dans le thème** : aucun hotlink.

### 9. Plugins gratuits recommandés (maintenance par des non-techniciens)

**Depuis la v1.5.0 : installation en un clic depuis `Apparence > Extensions
IKA`** (le thème applique ensuite automatiquement les réglages utiles).
Sinon, toujours possible depuis `Extensions > Ajouter` (versions gratuites
suffisantes) :

| Plugin (gratuit) | Utilité pour l'équipe |
|---|---|
| **Simple Custom Post Order** | Réordonner réalisations, membres, partenaires, clients et slides **par glisser-déposer** dans l'admin (l'ordre d'affichage suit le `menu_order` utilisé par le thème). |
| **Contact Form 7** | Si vous préférez un constructeur de formulaires au formulaire natif du thème (le Customizer accepte son shortcode). |
| **Yoast SEO** (ou **Rank Math**) | Titres/meta descriptions, sitemap XML, aperçu Google — sans toucher au code. |
| **UpdraftPlus** | Sauvegardes planifiées du site (base + fichiers) vers cloud, restauration en un clic. |
| **Wordfence Security** | Pare-feu applicatif, alertes de connexion, scan de vulnérabilités. |
| **Smush** | Compression automatique des images envoyées dans la médiathèque. |
| **Duplicate Page** | Dupliquer une page/réalisation en un clic avant modification. |
| **WP Mail SMTP** | Alternative au SMTP du thème (assistant de configuration guidé). N'en utiliser qu'un des deux. |

### Vérification

```bash
bash tools/audit-theme.sh        # 0 bloquant, 0 avertissement (18 sections)
node tools/sync-proxmox-static.js # régénère le proxmox.php statique si besoin
bash tools/build-theme-zip.sh    # régénère l'archive distribuable
```

Les 39 fichiers PHP ont été validés avec un parseur PHP (`php-parser`),
`node --check` pour le JavaScript, et Tailwind a été recompilé.

**Non testable ici** : l'activation réelle (seed, migration v7) et l'envoi
SMTP. À valider sur la préproduction : réactivation du thème, pagination,
liens des logos, état actif du menu, et l'email de test après avoir saisi les
identifiants SMTP dans `Réglages > Email (SMTP)`.

---

## Mise à jour v1.3.0 — parité stricte avec le site statique

Retour terrain : malgré la v1.2.0, quelques écarts subsistaient entre le thème
installé et le site statique. Chacun a été corrigé à la racine :

| Écart constaté | Cause | Correction |
|---|---|---|
| **Espacements absents dans « Nos domaines d'expertise »** | `assets/css/tailwind.css` compilé **périmé** (généré avant les template-parts) : `gap-7` et les décalages `lg:translate-y-*` n'existaient pas | Recompilation `npm run build:css` + script de build qui impose une compilation fraîche ; la 2ᵉ carte (« Infrastructures ») n'a volontairement **aucun** décalage, comme sur le statique — matrice corrigée |
| **Bandeau de contact fixe (WhatsApp) introuvable** | Le widget existait mais les classes d'ancrage (`bottom-4`, `right-3`, `sm:bottom-5`, `sm:right-6`, `max-w-[calc(100vw-1.5rem)]`) avaient disparu avec le CSS périmé | Corrigé par la même recompilation ; apostrophe typographique (`d’un`) alignée sur le statique |
| **Section « Dernières réalisations » différente (accueil)** | Le statique affiche 3 cartes teaser Sonatur propres à l'accueil ; le thème affichait les 3 premiers projets CPT | Les 3 cartes sont désormais pilotées par le Customizer (**Contenu IKA Solution > Accueil — Dernières réalisations**) avec le contenu exact du statique par défaut — page Réalisations inchangée (15 projets) |
| **Page Réalisations : boutons de filtre manquants** | Le thème n'affichait que les types utilisés | Les **6 boutons** (Application web & mobile, Site web, Intranet, Formations, Licences, Infrastructure serveur) sont toujours affichés, comme sur le statique |
| **Animations de défilement différentes** | `theme.js` était simplifié : révélation one-shot, sans variantes ni cascade | Réécriture à l'identique du script statique : ajout automatique de `.reveal` (sections, articles, formulaires, iframe, images, blocs arrondis), variantes `reveal-up/left/right/zoom/tilt/down` en rotation, délais `(i % 4) × 70 ms`, threshold **0.14**, ré-apparition à la sortie du viewport ; **surlignage du menu selon l'ancre** (`applyNavHash`) restauré ; temporisations du hero alignées (220 ms / 5,6 s / 1,3 s) |
| **Images absentes de la médiathèque** | Jamais importées | À l'activation, **les 77 images + la brochure PDF** sont copiées dans `uploads/` et créées comme pièces jointes (**visibles dans Médiathèque**) ; `ika_asset()` sert automatiquement ces copies. Import idempotent (meta `_ika_source_path`), relançable depuis l'admin s'il est interrompu, jamais exécuté en front-office |

**Contrôles de parité automatisés rejoués après correction :**
- 0 texte visible du site statique introuvable dans le thème (accueil,
  réalisations, équipe, société, actualités) ;
- 8/8 cartes expertises strictement identiques (classes, fonds, décalages) ;
- 0 classe manquante dans les 14 sections de l'accueil ;
- 52 images référencées par le thème toutes présentes dans ses assets ;
- `node --check` (JS) et parseur PHP : OK ; `tools/audit-theme.sh` : 0/0.

À noter : les 3 fiches d'équipe « manquantes » sont **commentées dans le site
statique lui-même** (donc invisibles là-bas) — le thème est conforme.

## Mise à jour v1.2.0 — 100 % éditable

Les 2 derniers avertissements ont été traités : `page-presentation.php`
(page « Société ») et `template-parts/pourquoi.php` (section « Pourquoi nous
choisir » de l'accueil) étaient les deux derniers blocs codés en dur. Tous
leurs textes, images et titres sont désormais pilotés par le **Customizer**
(`Apparence > Personnaliser > Contenu IKA Solution`), dans de nouvelles
sections dédiées :

- Accueil — Pourquoi nous choisir
- Page Société — Introduction
- Page Société — Notre identité
- Page Société — Vision, mission, valeurs
- Page Société — Mot du Directeur Général
- Page Société — Ce qui nous guide

Comme pour le reste du Customizer, chaque champ a pour valeur par défaut le
texte exact du site statique d'origine : **tant que rien n'est modifié dans
l'admin, le rendu est strictement identique**. `bash tools/audit-theme.sh`
retourne désormais 0 bloquant et 0 avertissement.

---

## Phase 1 — Sécurité

**⚠️ Action qui t'incombe et que je ne peux pas faire à ta place :
change le mot de passe du compte `soue@ikasolution.com` et active le 2FA.**
Le mot de passe a été exposé publiquement ; le retirer du dépôt ne le
« dé-publie » pas. Tant qu'il n'est pas changé, le compte reste compromis.

Ce que j'ai fait :

- `mail-config.php` **retiré du suivi Git** (`git rm --cached`) — le fichier
  reste sur ton disque, il n'est simplement plus versionné.
- Ajout de `mail-config.sample.php` comme modèle sans secret.
- Création d'un **`.gitignore`** (il n'y en avait aucun) couvrant
  `mail-config.php`, `wp-config.php`, `.env`, `*.zip`, `node_modules/`.

> Le fichier reste présent dans l'**historique Git**. Pour l'effacer
> complètement : `git filter-repo --path mail-config.php --invert-paths`
> puis push forcé — ou passer le dépôt en privé.

---

## Phase 2 — Débloquer l'installation

| Problème | Correction |
|---|---|
| `assets/images` et `assets/pdf` étaient des **liens symboliques** → toutes les images en 404 | Copie réelle des fichiers dans le thème |
| 27 Mo d'images non optimisées | Redimensionnement ≤ 1800 px et compression : **28 Mo → 16 Mo**, noms et formats inchangés |
| Fichiers inutilisés (`*__old.jpg`, doublons) | Supprimés |
| `screenshot.png` absent | Créé (1200×900, aux couleurs de la marque) |
| ZIP périmé (20 fichiers morts, 9 manquants, 0 image) | Régénéré par `tools/build-theme-zip.sh` : **130 fichiers, 76 images**, et retiré du suivi Git |

Le script de build refuse de produire une archive si un lien symbolique ou le
CSS compilé manquent — l'erreur de départ ne peut plus se reproduire.

---

## Phase 3 — Restituer le site à l'identique

**9 sections manquantes sur la page d'accueil ont été recréées** (~411 lignes) :

| Nouveau fichier | Section |
|---|---|
| `template-parts/marquee.php` | Bandeau défilant de mots-clés |
| `template-parts/realisations.php` | Dernières réalisations |
| `template-parts/hosting.php` | Hébergement, VPS, SSL, domaine `.bf` |
| `template-parts/methode.php` | Méthode en 3 étapes |
| `template-parts/actualites.php` | Dernières actualités |
| `template-parts/vision.php` | Vision, mission, valeurs |
| `template-parts/partenaires.php` | Logos partenaires |
| `template-parts/contact.php` | **Formulaire + carte Google Maps** |
| `template-parts/clients.php` | Réécrit : titre et carrousel complets |

L'ordre de `front-page.php` reproduit exactement celui du site statique.

**Autres correctifs :**

- **Double menu** — le menu de repli s'affichait *en plus* du menu WordPress.
  Il est désormais dans un `else` de `has_nav_menu()`. Idem sur mobile.
- **Liens `.php`** — tous remplacés par `ika_page_url()` / `get_permalink()`.
  Un helper `ika_slide_url()` convertit même les anciennes valeurs déjà saisies
  en base (`presentation.php` → la bonne page).
- **Formulaire de contact** — nouveau `inc/contact-form.php` : nonce,
  validation, honeypot anti-spam, envoi par `wp_mail()`. Un shortcode CF7 ou
  WPForms peut le remplacer depuis le Customizer.
- **Hero** — le premier slide est maintenant rendu côté serveur : la page a du
  contenu même sans JavaScript (SEO).

---

## Phase 4 — Rendre le contenu réellement éditable

| Contenu | Avant | Après |
|---|---|---|
| Équipe (11 membres) | codé en dur | CPT **Membres d'équipe** + seeder |
| Réalisations (15) | tableau PHP | CPT **Réalisations** + seeder |
| Actualités | tableau PHP | **Articles WordPress natifs** + catégories |
| Partenaires | codé en dur | Nouveau CPT **Partenaires** |
| Coordonnées, chiffres clés, textes | codés en dur | **Customizer** (`inc/customizer.php`) |
| Footer et header | codés en dur | Lisent le Customizer |

Les **CPT fantômes sont résolus** : `ika_realisation` et `ika_membre` étaient
déclarés mais jamais affichés ni alimentés — ce qui aurait donné l'impression
que l'administration « ne marche pas ». Ils sont maintenant branchés.

`page-equipe.php` passe de 206 à 103 lignes ; tout le contenu vient de la base.

Un panneau **« Contenu IKA Solution »** regroupe dans le Customizer : adresse,
2 téléphones, email, WhatsApp, carte, chiffres clés, textes « Qui sommes-nous »,
footer, bloc contact. Chaque réglage a pour valeur par défaut le texte d'origine :
**tant que rien n'est modifié, le site est identique à ton site statique.**

---

## Phase 5 — Qualité production

- **Tailwind compilé localement** — le CDN (interdit en production, FOUC,
  dépendance externe) est supprimé. Build de **24 Ko** via
  `npm run build:css`, versionné par `filemtime`.
- **Polices Inter** — chargées par `wp_enqueue_style`, avec bascule automatique
  vers un hébergement local si `assets/fonts/inter.css` est déposé.
- **JS externalisé** — `assets/js/theme.js` remplace le JS inline de
  `front-page.php`, `footer.php` et `page-realisations.php`. Données passées
  par `wp_localize_script`.

  > Au passage : le JS du menu mobile était sur le point d'être dupliqué
  > (footer + nouveau fichier), ce qui aurait **annulé le clic**. Corrigé.

- **CSS externalisé** — 164 lignes sorties de `header.php` vers `style.css`.
- **Templates ajoutés** — `404.php`, `search.php`, `archive.php`,
  `comments.php`, `searchform.php`, `readme.txt`.
- **Code mort supprimé** — 5 modèles dupliqués (`presentation.php`,
  `equipe.php`…) qui n'étaient jamais chargés par WordPress, plus les variables
  `$pageTitle` / `$_SERVER` héritées du site statique.
- **API dépréciées** — `get_page_by_title()` (dépréciée depuis WP 6.2) remplacée
  par `WP_Query` ; `date()` remplacée par `wp_date()` (respect du fuseau).
- **Accessibilité** — la préférence système *animations réduites* désactive
  désormais défilements et transitions.

---

## Vérification

```bash
bash tools/audit-theme.sh        # 0 bloquant
bash tools/build-theme-zip.sh    # régénère l'archive
```

Les 35 fichiers PHP ont été validés syntaxiquement avec un parseur PHP
(`php-parser`), PHP n'étant pas installable dans l'environnement de travail.

**Ce qui n'a pas été testé :** aucune installation WordPress réelle n'était
disponible ici. Le rendu final doit être validé sur un site de préproduction —
en particulier l'activation (création des pages et seeding) et l'envoi du
formulaire de contact.

---

## À faire de ton côté

1. **Changer le mot de passe SMTP** et activer le 2FA. *(prioritaire)*
2. Purger `mail-config.php` de l'historique Git, ou passer le dépôt en privé.
3. Tester le ZIP sur une préproduction avant la mise en ligne.
4. Configurer l'envoi des emails dans **Réglages ▸ Email (SMTP)** (bouton de
   test intégré), puis installer les extensions recommandées en un clic
   depuis **Apparence ▸ Extensions IKA**.
5. Après activation : **Réglages > Permaliens > Enregistrer**.
