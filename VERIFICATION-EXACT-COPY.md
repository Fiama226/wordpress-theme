# Vérification : parité thème WordPress ↔ site statique

Date : 2026-08-06 · Thème : **IKA Solution Pro v1.7.1** · Branche `arena/019fd5a3-wordpress-theme`

## Objectif

Confirmer que l'installation + activation du thème WordPress `ika-solution-theme`
reproduit le site statique d'origine **à l'identique**, et documenter la correction
du **filtrage par onglets** des pages partenaires.

---

## 1. Contrôle qualité global — `bash tools/audit-theme.sh`

| | Résultat |
|---|---|
| Bloquants | **0** |
| Avertissements | **0** |
| Verdict | production-ready |

Les 20 sections de contrôle passent (assets, images référencées, sécurité,
échappement, navigation active, parité partenaires/clients, pagination, SMTP,
page Proxmox, extensions recommandées…).

---

## 2. Parité du contenu des onglets partenaires (Odoo, Fortinet, Palo Alto, Microsoft)

Comparaison automatique des textes (`title` / `label` / `text`) entre les pages
statiques (`odoo.php`, `fortinet.php`, `paloalto.php`, `microsoft.php`) et les
défauts du thème (`ika_partner_default_tabs()` dans `functions.php`).

| Page | Textes statiques | Textes thème | Écart |
|---|---|---|---|
| 4 pages partenaires (total) | **224** | **224** | **0 manquant / 0 en trop** |

➡️ **Le contenu des onglets des pages partenaires est une copie exacte** du site
statique. Après activation, la première carte de chaque groupe d'onglets est
affichée et les onglets sont pleinement fonctionnels.

---

## 3. Parité de la page d'accueil

- **Ordre des sections** identique au statique :

  `hero → societe → partenaires → pourquoi → expertises → marquee → produits
  (solutions) → realisations → hosting → méthode → actualites → vision →
  clients → contact`

  (les sections « bandeau défilant » et « Méthode » existent bien dans
  `index.php` du statique — elles n'avaient simplement pas d'`id` de section).

- **Section « Nos partenaires »** : même grille, même ordre, mêmes logos,
  mêmes hauteurs et mêmes liens que `index.php` (Microsoft, Odoo, Palo Alto,
  Fortinet, Proxmox). Les logos renvoient vers les pages partenaires dédiées.

- **Slides du hero** : mêmes images (`slide11`, `slide2`, `slide3`, `slide4`).

- **Actualités** : mêmes 3 titres / textes que le statique.

---

## 4. Parité CSS (classes Tailwind)

La régénération de `tailwind.css` a révélé **4 classes utilisées par les
templates mais absentes du CSS compilé** : `h-16`, `opacity-70`, `opacity-80`,
`w-16`. Elles sont désormais incluses (aucune classe retirée). Cela corrige
d'éventuels petits écarts visuels par rapport au statique.

---

## 5. Correction — filtrage par onglets des pages partenaires

### Problème constaté
Sur les pages partenaires, la bascule entre onglets (« Ventes & CRM »,
« Comptabilité », etc.) pouvait ne pas fonctionner.

### Cause
Le mécanisme d'activation était lié une seule fois aux boutons présents au
moment de l'exécution du script (`theme.js`) : fragile selon l'ordre de
chargement, le cache du fichier JS, ou un échec d'un script précédent.

### Correctif (`assets/js/theme.js`)
Réécriture du module des onglets avec **délégation d'événement** sur `document` :
- un clic sur un onglet (y compris sur une icône/libellé imbriqué) est capturé ;
- fonctionne quel que soit l'ordre de chargement / le cache du script ;
- fonctionne même si les onglets sont (re)rendus après le script ;
- le premier onglet (ou celui déjà marqué `aria-selected="true"`) est activé à
  l'ouverture (init idempotente, immédiate + `DOMContentLoaded`).

### Tests effectués (jsdom)
- Groupe Odoo (2 onglets) et groupe Enterprise (2 onglets) sur la même page :
  activation initiale correcte, bascule correcte de chaque onglet, clic sur un
  élément imbriqué (`<span>`) correct. ✅

### Version & livrable
- Version passée à **1.7.1** (`style.css`, `readme.txt`, `package.json`).
- Archive régénérée : **`ika-solution-theme.zip`** (152 fichiers).
- Nouvelle section **20** dans `tools/audit-theme.sh` : « Onglets partenaires
  (parité + filtrage) » — vérifie le mécanisme de délégation et la présence du
  contenu statique dans les défauts du thème.

---

## 6. Déploiement recommandé

1. Téléversez **`ika-solution-theme.zip`** via *Apparence > Thèmes > Ajouter > Téléverser*.
2. **Activez** le thème (création/remplissage automatique des contenus, idempotent).
3. *Réglages > Permaliens > Enregistrer* (rafraîchit les règles de réécriture).
4. Si le thème était déjà installé : **videz le cache** (plug-in de cache, cache
   navigateur) car l'ancien `theme.js` pouvait être en cache — c'est la cause la
   plus fréquente du « filtrage ne fonctionne pas » après une mise à jour.
