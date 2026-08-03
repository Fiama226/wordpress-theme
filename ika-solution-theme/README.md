# IKA Solution Pro — thème WordPress

Thème sur mesure pour **IKA SOLUTION LTD**. Il reproduit le site d'origine
(mise en page et animations) et rend l'ensemble des contenus administrables
depuis WordPress.

---

## Installation

1. **Apparence > Thèmes > Ajouter > Téléverser le thème** → `ika-solution-theme.zip`
2. Activer **IKA Solution Pro**.
3. **Réglages > Permaliens > Enregistrer** (rafraîchit les règles de réécriture).

À l'activation, le thème crée les pages *Société*, *Équipe*, *Réalisations*,
*Actualités* et pré-remplit tous les contenus. L'opération est idempotente :
réactiver le thème ne duplique rien.

> L'archive contient les images : le site s'affiche complet dès l'activation.

---

## Où modifier chaque contenu

| Contenu | Emplacement dans l'administration |
|---|---|
| Slides du hero | **Slides hero** |
| Expertises | **Expertises** |
| Solutions logicielles | **Solutions IKA** |
| Réalisations | **Réalisations** |
| Équipe | **Membres d'équipe** |
| Clients | **Clients** |
| Partenaires | **Partenaires** |
| Onglets de la page Proxmox (fiches VE, PBS, PMG) | **Onglets Proxmox** |
| Actualités | **Articles** |
| Adresse, téléphones, email, WhatsApp | **Apparence > Personnaliser > Contenu IKA Solution** |
| Chiffres clés, textes « Qui sommes-nous », footer | idem |
| Badge « IKA SOLUTION », bouton « En savoir plus » | **Personnaliser > Section « Qui sommes-nous »** |
| Hébergement (textes, offres, carte domaine .bf) | **Personnaliser > Accueil — Hébergement, cloud et domaines** |
| Bandeau défilant de mots-clés | **Personnaliser > Accueil — Bandeau défilant** |
| Section « Méthode » | **Personnaliser > Accueil — Méthode** |
| Pages Équipe, Réalisations, Actualités, Société | **Personnaliser > Page Équipe / Page Réalisations / Page Actualités / Page Société…** |
| Page Proxmox (hero, sections, badges, liens) | **Personnaliser > Page Proxmox** |
| Pages détail Solution & Expertise | **Personnaliser > Page détail d'une solution / d'une expertise** |
| Bandeau support WhatsApp (footer) | **Personnaliser > Footer — bandeau support** |
| Logo | **Apparence > Personnaliser > Identité du site** |
| Menus | **Apparence > Menus** (emplacements : header, footer société, footer solutions) |

Les images se référencent par chemin relatif (`images/equipe.jpg`) ou, mieux,
via l'**image mise en avant** du contenu — qui a la priorité.

---

## Page d'accueil

`front-page.php` assemble les sections dans l'ordre exact du site d'origine :

```
hero · société · partenaires · pourquoi · expertises · bandeau · solutions
réalisations · hébergement · méthode · actualités · vision · clients · contact
```

Chaque section est un fichier de `template-parts/`. Une section dont le contenu
est vide (aucune réalisation, aucun partenaire…) ne s'affiche pas.

---

## Formulaire de contact

Le thème embarque un formulaire natif : nonce, validation, honeypot anti-spam
et envoi par `wp_mail()`. Les messages partent vers l'adresse d'administration
du site (filtre `ika_contact_recipient` pour la changer).

Pour utiliser **Contact Form 7** ou **WPForms**, renseignez simplement le
shortcode dans *Personnaliser > Contenu IKA Solution > Section contact* : il
remplace le formulaire natif.

> Pour un envoi fiable, installez **WP Mail SMTP** et placez les identifiants
> dans `wp-config.php` — jamais dans un fichier du thème.

---

## Développement

```bash
cd ika-solution-theme
npm install
npm run build:css     # compile assets/css/tailwind.css (minifié)
npm run watch:css     # recompilation à la volée
```

Tailwind est **compilé localement** (24 Ko) : pas de CDN, donc pas de FOUC,
pas de dépendance externe et un site qui fonctionne en intranet.

Après toute modification de classes Tailwind dans les fichiers PHP,
relancez `npm run build:css`.

### Scripts du dépôt

```bash
bash tools/audit-theme.sh        # contrôle qualité (sort en erreur si bloquant)
bash tools/build-theme-zip.sh    # régénère ika-solution-theme.zip
```

---

## Architecture

```
ika-solution-theme/
├── assets/
│   ├── css/{src.css, tailwind.css}   ← source et build Tailwind
│   ├── js/theme.js                   ← slider, onglets, filtres, menu, reveal
│   ├── images/                       ← visuels embarqués
│   └── pdf/
├── inc/
│   ├── customizer.php                ← réglages éditables (ika_opt)
│   └── contact-form.php              ← traitement du formulaire natif
├── template-parts/                   ← 14 sections de la page d'accueil
├── front-page.php                    ← assemblage de la page d'accueil
├── page-{presentation,equipe,realisations,actualites}.php
├── single-{ika_solution,ika_expertise}.php
├── single.php · archive.php · search.php · 404.php · comments.php
└── functions.php                     ← CPT, meta boxes, seeders, enqueue
```

### Fonctions utiles

| Fonction | Rôle |
|---|---|
| `ika_opt( $cle )` | Valeur du Customizer, avec repli sur le texte d'origine |
| `ika_asset( $chemin )` | URL d'un fichier de `assets/` |
| `ika_post_image( $id, $meta )` | Image mise en avant, sinon meta, sinon repli |
| `ika_page_url( $slug )` | URL d'une page par son slug (jamais de `.php`) |
| `ika_tel( $cle )` | Numéro nettoyé pour un lien `tel:` |

---

## Notes techniques

- **Sécurité** : `wp_verify_nonce`, `current_user_can` et `sanitize_*` à
  l'enregistrement des meta ; échappement systématique en sortie.
- **Accessibilité** : la préférence système *animations réduites* est respectée
  (défilements et transitions désactivés).
- **Performance** : images `loading="lazy"`, CSS et JS versionnés par `filemtime`
  pour un cache correct.
- **Traduction** : chaînes internationalisées avec le domaine `ika-solution`.
