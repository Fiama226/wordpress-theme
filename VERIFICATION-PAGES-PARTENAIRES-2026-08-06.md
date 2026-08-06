# Vérification — pages partenaires identiques au site statique

**Date :** 6 août 2026
**Périmètre :** pages partenaires Odoo, Fortinet, Palo Alto, Microsoft et
Proxmox (thème `ika-solution-theme` vs pages statiques de la racine).

## Problème constaté

Après installation du thème, les pages partenaires n'étaient **pas** identiques
au site statique :

1. **Sections vides** sur Fortinet, Palo Alto et Microsoft : leurs templates
   appelaient des clés de personnalisation (`ika_forti_gate_*`,
   `ika_palo_strata_*`, `ika_ms_sec_*`, …) **jamais définies** dans les
   valeurs par défaut du Customizer → tout le corps de page s'affichait vide.
2. **Textes différents** sur Odoo (bouton secondaire, pastille du hero,
   légendes, lien « Éditions & tarifs »…).
3. **Images différentes** sur toutes les pages (ex : `cloud2.jpg` au lieu de
   `OdooBackgound.png` / `Odoo_apps_page.png`) — et 11 images du site statique
   **absentes** du dossier `assets/images/` du thème.
4. **Ligne de logos en trop** ajoutée par le thème dans la première section.
5. **Section contact générique** (fond clair, coordonnées, carte) à la place
   de la section dédiée de chaque page statique (fond bleu foncé, titre et
   sujets propres au partenaire).
6. Sur Proxmox : section contact générique + un texte avec apostrophes
   typographiques au lieu des apostrophes droites du statique.

## Corrections apportées

### Templates (`page-odoo`, `page-fortinet`, `page-paloalto`, `page-microsoft`)

Réécrits **à partir du HTML statique exact** (structure, classes Tailwind,
images, ancres, ordre des sections) :

- chaque texte passe par `ika_opt( 'clé', 'texte exact du statique' )` :
  rendu par défaut **strictement identique** au statique, tout en restant
  éditable dans *Apparence > Personnaliser > Contenu IKA Solution > Page …* ;
- les images pointent vers les mêmes fichiers que le statique via
  `ika_asset()`, après copie des **11 images manquantes** dans
  `ika-solution-theme/assets/images/` ;
- les onglets continuent d'utiliser `ika_partner_tabs_for()` (repli déjà
  fidèle au statique, vérifié) ;
- la ligne de logos en trop est supprimée.

### Section contact partenaire (`template-parts/contact-partner.php`, nouveau)

Reproduction à l'identique de la section « Contact » du site statique
(fond `bg-ikaBlueDark`, formulaire blanc flottant, libellés « Nom »,
« Téléphone », « Email », « Solution concernée », « Message », bouton
« Envoyer la demande »). Titre et texte propres à chaque partenaire
(clés `*_contact_title` / `*_contact_text`), sujets du select inchangés
(filtres `ika_*_contact_subjects` existants). Seule la plomberie change :
le formulaire est traité par le thème (`ika_handle_contact_form()` : nonce,
honeypot, `wp_mail()`) au lieu de `contact-submit.php`.
`page-proxmox.php` utilise désormais aussi cette section.

### Customizer (`inc/customizer.php`)

- `ika_partner_default_options()` : restructurée par partenaire ; les
  **148 valeurs** sont désormais le contenu exact du statique (y compris les
  clés `gate_*`/`fabric_*`/`eco_*`, `strata_*`/`platform_*`/`cloud_*`,
  `sec_*`/`plans_*` qui manquaient, et les nouvelles clés `contact_*`).
- `ika_partner_sections()` : chaque page partenaire a ses propres champs
  (37 champs/partenaire) avec libellés en français, plus la fonction
  utilitaire `ika_partner_field_label()`.
- Proxmox : `ika_pmx_repo_text` corrigé (apostrophes droites comme le
  statique) + clés `ika_pmx_contact_title`/`ika_pmx_contact_text` ajoutées
  (valeurs + champs du Customizer).

### Outil de vérification (`tools/compare-partner-static.py`)

Script Python autonome (sans PHP ni WordPress) qui simule les deux rendus
et compare segments de texte, images et onglets pour les 5 pages :

```bash
python3 tools/compare-partner-static.py   # code retour 0 = identique
```

Résultat actuel : **0 différence** (133/133, 112/112, 105/105, 99/99 et
67/67 segments identiques ; images et onglets identiques).

`tools/audit-theme.sh` : 0 bloquant, 0 avertissement.

## Résultat

À l'activation du thème (pages créées automatiquement par le seeder,
contenus par défaut fournis) : **les 5 pages partenaires s'affichent comme
le site statique, sans aucune différence de contenu ni de structure.**
Chaque texte reste éditable dans le Customizer ; dès qu'un réglage est
modifié, c'est la version personnalisée qui s'affiche.
