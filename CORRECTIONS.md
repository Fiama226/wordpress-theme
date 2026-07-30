# Corrections apportées — les 5 phases

Réponse au rapport `AUDIT-THEME.md`. Les 21 actions planifiées ont été réalisées.

**Résultat de `bash tools/audit-theme.sh` :**

| | Avant | Après (v1.1.0) | Après (v1.2.0) |
|---|---:|---:|---:|
| Bloquants | **13** | **0** | **0** |
| Avertissements | 26 | 2 | **0** |

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
4. Installer **WP Mail SMTP** pour fiabiliser l'envoi des emails.
5. Après activation : **Réglages > Permaliens > Enregistrer**.
