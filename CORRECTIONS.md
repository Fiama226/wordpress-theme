# Corrections apportées — les 5 phases

Réponse au rapport `AUDIT-THEME.md`. Les 21 actions planifiées ont été réalisées.

**Résultat de `bash tools/audit-theme.sh` :**

| | Avant | Après |
|---|---:|---:|
| Bloquants | **13** | **0** |
| Avertissements | 26 | 2 |

Les 2 avertissements restants sont assumés : `page-presentation.php` et
`template-parts/pourquoi.php` restent en dur (contenu institutionnel très stable,
modifiable par l'éditeur de page si besoin).

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
