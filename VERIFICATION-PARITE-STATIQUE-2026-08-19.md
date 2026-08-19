# Vérification de parité — site statique ⇄ thème WordPress (19/08/2026)

Le site statique (fichiers `*.php` à la racine) est la **référence validée par le
client**. Le thème `ika-solution-theme` doit en être la copie conforme.
Cette passe a comparé **page par page et balise par balise** les deux versions,
puis corrigé les écarts trouvés.

## Comment (re)vérifier

```bash
python3 tools/compare-structure.py        # structure : balises, classes, éléments manquants
python3 tools/compare-partner-static.py   # textes/images des pages partenaires
bash    tools/audit-theme.sh              # audit complet (inclut les deux contrôles ci-dessus)
```

`tools/compare-structure.py` (nouveau) compare l'en-tête, le pied de page, les
14 sections de l'accueil et chaque gabarit de page avec la page statique
correspondante. Il signale tout élément présent d'un seul côté — c'est
exactement le contrôle qui aurait détecté un bouton hamburger manquant.
Il vérifie en plus la présence, **des deux côtés**, des éléments d'interface
critiques (bouton hamburger et ses barres, panneau du menu mobile, JS
d'ouverture/fermeture, raccourcis mobiles « Devis » / « Appeler », widget
WhatsApp, formulaire de contact des pages solution).

## Menu mobile / bouton hamburger

Vérifié dans le thème (`ika-solution-theme/header.php`) : le bouton
`#menuButton` (barres dessinées via `before:`/`after:`), le panneau
`#mobileMenu` et le script d'ouverture (`assets/js/theme.js`) sont bien
présents et identiques au statique, y compris les raccourcis « Devis » /
« Appeler » affichés entre 768 px et 1280 px.

⚠️ Deux causes possibles si le hamburger n'apparaît pas sur le site en ligne :

1. **Le thème installé n'est pas à jour.** Régénérez et réinstallez l'archive :
   `bash tools/build-theme-zip.sh` puis *Apparence ▸ Thèmes ▸ Téléverser*.
2. **Le CSS compilé était périmé** (voir plus bas) : les classes utilitaires
   absentes du build rendent certains éléments invisibles ou non stylés.
   `assets/css/tailwind.css` a été recompilé dans cette passe.

Un contrôle automatique empêche désormais ce type de régression.

## Écarts corrigés

| # | Page / section | Écart constaté | Correction |
|---|----------------|----------------|------------|
| 1 | Page **solution** (IKA Visite, Courrier, Archive, Portail) | Le statique affiche un **formulaire de demande complet** ; le thème n'affichait qu'un encart « Installez Contact Form 7 » avec un simple bouton. | Formulaire natif rétabli à l'identique (nom, téléphone, email, solution souhaitée en lecture seule, message), traité par le thème (nonce, anti-spam, `wp_mail`). |
| 2 | Page **solution** | « Autres solutions » affichait 4 cartes dans une grille de 3. | Limité à 3 cartes comme le statique. |
| 3 | Page **expertise** | Variante Contact Form 7 qui remplaçait le bouton du statique. | Bouton « Contacter IKA SOLUTION » identique au statique en toutes circonstances. |
| 4 | **Équipe**, **Réalisations**, **détail expertise**, **détail solution**, **détail actualité** | Bouton « Retour … » avec une **icône flèche** absente du statique. | Icône retirée, bouton identique au statique (les pages partenaires gardent la leur : le statique en a une). |
| 5 | **Accueil ▸ Nos partenaires** | Les logos n'avaient plus l'effet de survol (`transition hover:-translate-y-1 hover:shadow-premium`). | Effet rétabli. |
| 6 | **Accueil ▸ Nos solutions** | Les onglets produits avaient une classe `transition` en plus. | Alignés sur le statique. |
| 7 | **Accueil ▸ Actualités** | Le badge de catégorie était en `w-fit` (largeur réduite). | Largeur identique au statique. |
| 8 | **Détail actualité** | Les commentaires s'affichaient dans une seule carte au style WordPress par défaut. | Mise en page du statique reproduite : carte « Commentaires » à gauche, formulaire « Laisser un commentaire » à droite, mêmes champs et mêmes styles — tout en conservant les **vrais commentaires WordPress** (modération incluse). |
| 9 | **En-tête (menu mobile)** | `esc_url()` appliqué à une liste de classes CSS pour l'entrée « Solutions » : l'état actif n'était jamais appliqué. | Remplacé par `esc_attr()`. |
| 10 | **CSS compilé** | `assets/css/tailwind.css` était périmé : les classes `min-h-32`, `min-h-36`, `mb-5` (champs des formulaires rétablis) manquaient. | Recompilé (`npm run build:css`). |

## Écarts volontaires conservés (plomberie WordPress)

Sans effet visuel par défaut, ils sont documentés et tolérés par le contrôle :

- pagination JavaScript (`nav.ika-pagination`, masquée tant qu'il n'y a qu'une page) sur Réalisations et Actualités ;
- messages « aucun élément » quand une grille est vide ;
- liens optionnels sur les logos clients/partenaires (le statique n'en a pas sur les clients) ;
- `the_content()` / `comment_text()` qui encapsulent le texte dans un `<div>` ;
- menus WordPress (`wp_nav_menu`) utilisés à la place du menu de repli lorsqu'un menu est assigné ;
- champs cachés supplémentaires des formulaires (nonce WordPress, pot de miel).

## Résultat

```
tools/compare-structure.py       → OK (0 écart)
tools/compare-partner-static.py  → OK (0 écart)
tools/audit-theme.sh             → 0 bloquant, 0 avertissement
```
