# wordpress-theme

Site statique (racine, `*.php`) + thème WordPress `ika-solution-theme`.

## Pages partenaires

En plus de **Proxmox**, chaque partenaire dispose d'une page dédiée (même design
que la page Proxmox : hero, sections, onglets, étapes projet, formulaire de contact) :

| Partenaire | Site statique        | Thème WordPress        | Slug   |
|------------|----------------------|------------------------|--------|
| Odoo       | `odoo.php`           | `page-odoo.php`        | `odoo` |
| Fortinet   | `fortinet.php`       | `page-fortinet.php`    | `fortinet` |
| Palo Alto  | `paloalto.php`       | `page-paloalto.php`    | `paloalto` |
| Microsoft  | `microsoft.php`      | `page-microsoft.php`   | `microsoft` |
| Proxmox    | `proxmox.php`        | `page-proxmox.php`     | `proxmox` |

### Gestion dans WordPress (personnes non techniques)

- **Pages** : créées automatiquement à l'activation du thème (les logos de la
  section « Nos partenaires » renvoient vers ces pages).
- **Onglets** : chaque carte des onglets est une fiche du menu *Onglets
  Partenaires* (champ « Partenaire & section » : Odoo, Fortinet, Palo Alto,
  Microsoft). Ajoutez/modifiez/supprimez des fiches sans toucher au code.
- **Filtrage par onglets** (boutons « Ventes & CRM », « Comptabilité », …) :
  robuste par délégation d'événement — fonctionne quel que soit l'ordre de
  chargement ou le cache, et la première carte est activée à l'ouverture.
  Vérifié par `bash tools/audit-theme.sh` (section 20).
- **Textes de sections** : dans *Apparence > Personnaliser > Contenu IKA
  Solution > Page Odoo / Page Fortinet / Page Palo Alto / Page Microsoft /
  Page Proxmox* (37 champs par page : hero, sections, bande, onglets, étapes
  projet, contact).
- Le contenu d'origine est fourni par défaut (seeder + repli) et est
  **strictement identique** au site statique tant que rien n'est modifié :
  vérifié page par page (textes, images, onglets) par
  `python3 tools/compare-partner-static.py`, qui compare les rendus des 5
  pages et renvoie un code 0 en cas d'identité (voir
  `VERIFICATION-PAGES-PARTENAIRES-2026-08-06.md`).
