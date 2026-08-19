#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Compare la STRUCTURE HTML du site statique et du thème WordPress.

Complète `tools/compare-partner-static.py` (qui compare les *textes* des pages
partenaires) : ici on compare le squelette HTML — balises, classes CSS et
identifiants — de chaque page statique avec son gabarit WordPress.

C'est ce contrôle qui détecte les éléments présents d'un côté et absents de
l'autre : bouton hamburger, formulaire de contact, icône ajoutée dans un
bouton, section oubliée, etc.

Usage :
    python3 tools/compare-structure.py          # 0 si conforme, 1 sinon
    python3 tools/compare-structure.py -v       # détaille les écarts tolérés

Principe : chaque élément HTML devient « balise #id [classes] ». Les classes
construites en PHP (boucles WordPress) sont marquées « dynamiques » : on exige
alors que les classes écrites en dur côté thème soient présentes côté statique
(et inversement), sans imposer un ordre ni un nombre d'itérations identiques.
"""

import os
import re
import sys

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
THEME = os.path.join(ROOT, 'ika-solution-theme')
VERBOSE = '-v' in sys.argv or '--verbose' in sys.argv

GREEN, RED, YELLOW, BOLD, OFF = '\033[32m', '\033[31m', '\033[33m', '\033[1m', '\033[0m'

# Identifiants ajoutés par le thème pour la pagination / le filtrage JS :
# invisibles pour le visiteur, donc neutralisés avant comparaison.
WP_ONLY_IDS = ('actualitesGrid', 'realisationGrid', 'expertisesGrid', 'clientsGrid', 'comments')

# Équivalences de rendu : the_content() encapsule le texte dans un <div>.
EQUIVALENT = {
    'div': {
        'leading-8 text-base text-slate-600': 'p',        # the_content()
        'leading-7 mt-2 text-slate-600 text-sm': 'p',     # comment_text()
    },
}

# Éléments propres à WordPress, sans équivalent statique, mais sans impact
# visuel par défaut (masqués ou affichés seulement si la grille est vide).
WP_ONLY_LINES = (
    'nav [ika-pagination mt-10]',       # pagination JS (masquée par défaut)
    '/nav []',
    'p [text-slate-600]',               # message « aucun élément »
    'a [client-logo]',                  # lien optionnel sur un logo client
    '/a []',
    'div [bg-white flex h-32 items-center justify-center p-6 reveal rounded-2xl shadow-clean]',
    'div [p-6 reveal sm:p-8]',          # conteneur du shortcode de formulaire
    'p [leading-7 text-slate-600 text-sm]',   # « aucun commentaire »
    'p [font-bold mt-2 text-ikaRed text-xs]',  # « commentaire en attente de validation »
    'p [mt-6 text-slate-600 text-sm]',         # « les commentaires sont fermés »
)

# Balises que le thème produit depuis une chaîne PHP (logo cliquable ou non,
# titre du hero découpé en <span>) : invisibles pour l'analyseur statique.
PHP_BUILT_LINES = (
    'span [block]',                     # <h1> du hero assemblé en PHP
    'img []',                           # logo client construit en PHP
    'img [max-h-14 max-w-full object-contain]',
    'img [max-h-16 max-w-full object-contain]',
    'img [max-h-20 max-w-full object-contain]',
    # Formulaire de commentaire : généré par comment_form() (mêmes classes,
    # définies dans comments.php mais assemblées en PHP).
    'form #commentForm [bg-white p-7 relative rounded-[2rem] shadow-clean sm:p-8]',
    '/form []',
    'label [font-bold gap-2 grid mt-6 text-slate-700 text-sm]',
    'label [font-bold gap-2 grid mt-5 text-slate-700 text-sm]',
    'label []',
    '/label []',
    'input #commentName [border border-slate-200 focus:border-ikaBlue min-h-[3.25rem] outline-none px-4 py-3 rounded-xl transition]',
    'input [border border-slate-200 focus:border-ikaBlue min-h-[3.25rem] outline-none px-4 py-3 rounded-xl transition]',
    'textarea #commentMessage [border border-slate-200 focus:border-ikaBlue min-h-36 outline-none px-4 py-3 rounded-xl transition]',
    '/textarea []',
    'button [bg-ikaRed font-extrabold hover:bg-red-700 mt-6 px-7 py-4 rounded-full shadow-clean text-sm text-white transition]',
    '/button []',
    'div [absolute h-px left-[-9999px] overflow-hidden top-auto w-px]',   # pot de miel anti-spam
    'div [font-bold mt-5 p-4 rounded-2xl text-sm]',                       # message de confirmation
    'p []',
)


def read(path):
    with open(path, encoding='utf-8') as fh:
        return fh.read()


def between(source, start, end):
    i = source.find(start)
    j = source.rfind(end)
    return source[i:j] if i >= 0 and j > i else source


def inline_template_parts(source):
    """Inline get_template_part('template-parts/x') et comments_template()."""
    def wrap(content):
        # L'appel est le plus souvent dans un bloc <?php … ?> : on ferme le
        # bloc avant d'insérer le gabarit, puis on le rouvre.
        return '?>\n' + content + '\n<?php '

    def repl(m):
        part = os.path.join(THEME, m.group(1) + '.php')
        return wrap(read(part)) if os.path.exists(part) else ''

    source = re.sub(r"get_template_part\(\s*'([^']+)'\s*\)\s*;", repl, source)
    comments = os.path.join(THEME, 'comments.php')
    if 'comments_template()' in source and os.path.exists(comments):
        source = source.replace('comments_template();', wrap(read(comments)))
    return source


class Node(object):
    """Un élément HTML comparable, tolérant aux classes générées en PHP."""

    __slots__ = ('tag', 'ident', 'classes', 'dynamic')

    def __init__(self, tag, ident, classes, dynamic):
        self.tag = tag
        self.ident = ident
        self.classes = frozenset(classes)
        self.dynamic = dynamic

    def __hash__(self):
        return hash(self.tag)

    def __eq__(self, other):
        if self.tag != other.tag or self.ident != other.ident:
            return False
        if self.dynamic or other.dynamic:
            # Une partie des classes est produite en PHP : on vérifie
            # l'inclusion des classes écrites en dur.
            return self.classes <= other.classes or other.classes <= self.classes
        return self.classes == other.classes

    def __str__(self):
        return '%s%s [%s]' % (
            self.tag,
            ' #' + self.ident if self.ident else '',
            ' '.join(sorted(self.classes)),
        )


def skeleton(source):
    """Liste de Node pour un fragment HTML/PHP."""
    s = re.sub(r'<script.*?</script>', '', source, flags=re.S)
    s = re.sub(r'<style.*?</style>', '', s, flags=re.S)
    s = re.sub(r'<!--.*?-->', '', s, flags=re.S)
    s = re.sub(r'<\?(php|=).*?\?>', '@', s, flags=re.S)

    out = []
    for m in re.finditer(r'<(/?[a-zA-Z0-9]+)([^>]*)>', s):
        tag = m.group(1).lower()
        attrs = m.group(2) or ''
        raw = re.search(r'class="([^"]*)"', attrs)
        raw = raw.group(1) if raw else ''
        # PHP dans l'attribut class OU ailleurs dans la balise (comment_class()…).
        dynamic = '@' in raw or '@' in attrs
        classes = [c for c in raw.replace('@', ' ').split()]

        ident = re.search(r'\sid="([^"@]*)"', attrs)
        ident = ident.group(1) if ident else ''
        if ident in WP_ONLY_IDS:
            ident = ''

        key = ' '.join(sorted(classes))
        tag = EQUIVALENT.get(tag, {}).get(key, tag)
        if tag.startswith('/'):
            base = EQUIVALENT.get(tag[1:], {}).get(key)
            tag = '/' + base if base else tag

        # Champs cachés (nonce, jeton anti-spam…) : plomberie propre à chaque
        # implémentation, sans rendu visuel.
        if tag == 'input' and not classes:
            continue

        out.append(Node(tag, ident, classes, dynamic))
    return out


def compare(label, static_src, theme_src):
    """Signale les éléments présents d'un seul côté."""
    a, b = skeleton(static_src), skeleton(theme_src)

    only_static = [n for n in a if n not in b]
    only_theme = [n for n in b if n not in a]

    tolerated = [n for n in only_theme if str(n) in WP_ONLY_LINES]
    tolerated += [n for n in only_static if str(n) in PHP_BUILT_LINES]
    only_theme = [n for n in only_theme if str(n) not in WP_ONLY_LINES]
    only_static = [n for n in only_static if str(n) not in PHP_BUILT_LINES]

    # Dédoublonnage pour un rapport lisible.
    def uniq(nodes):
        seen, out = set(), []
        for n in nodes:
            if str(n) not in seen:
                seen.add(str(n))
                out.append(n)
        return out

    only_static, only_theme = uniq(only_static), uniq(only_theme)

    if only_static or only_theme:
        print('  %sÉCART%s     %s' % (RED, OFF, label))
        for n in only_static:
            print('              [statique seulement] %s' % n)
        for n in only_theme:
            print('              [thème seulement   ] %s' % n)
        return [label]

    note = '' if not tolerated else '  (%d élément(s) WordPress toléré(s))' % len(tolerated)
    print('  %sOK%s        %s%s' % (GREEN, OFF, label, note))
    if VERBOSE:
        for n in uniq(tolerated):
            print('              %s[toléré] %s%s' % (YELLOW, n, OFF))
    return []


# --------------------------------------------------------------------------- #
# Paires à comparer
# --------------------------------------------------------------------------- #
PAIRS = [
    ('En-tête',          'header.php',              'ika-solution-theme/header.php'),
    ('Pied de page',     'footer.php',              'ika-solution-theme/footer.php'),
    ('Présentation',     'presentation.php',        'ika-solution-theme/page-presentation.php'),
    ('Équipe',           'equipe.php',              'ika-solution-theme/page-equipe.php'),
    ('Réalisations',     'realisations.php',        'ika-solution-theme/page-realisations.php'),
    ('Actualités',       'actualites.php',          'ika-solution-theme/page-actualites.php'),
    ('Détail actualité', 'detail-actualite.php',    'ika-solution-theme/single.php'),
    ('Détail expertise', 'expertise-template.php',  'ika-solution-theme/single-ika_expertise.php'),
    ('Détail solution',  'solution-template.php',   'ika-solution-theme/single-ika_solution.php'),
    ('Odoo',             'odoo.php',                'ika-solution-theme/page-odoo.php'),
    ('Fortinet',         'fortinet.php',            'ika-solution-theme/page-fortinet.php'),
    ('Palo Alto',        'paloalto.php',            'ika-solution-theme/page-paloalto.php'),
    ('Microsoft',        'microsoft.php',           'ika-solution-theme/page-microsoft.php'),
    ('Zimbra',           'zimbra.php',              'ika-solution-theme/page-zimbra.php'),
    ('Proxmox',          'proxmox.php',             'ika-solution-theme/page-proxmox.php'),
]

# Sections de la page d'accueil, dans l'ordre du site statique.
HOME_PARTS = [
    'hero', 'about', 'partenaires', 'pourquoi', 'expertises', 'marquee',
    'solutions', 'realisations', 'hosting', 'methode', 'actualites',
    'vision', 'clients', 'contact',
]

# Éléments d'interface qui doivent exister des deux côtés.
UI_CHECKS = [
    ('bouton hamburger (#menuButton)', 'id="menuButton"',
     ['header.php'], ['ika-solution-theme/header.php']),
    ('barres du hamburger (::before/::after)', 'before:h-0.5',
     ['header.php'], ['ika-solution-theme/header.php']),
    ('panneau du menu mobile (#mobileMenu)', 'id="mobileMenu"',
     ['header.php'], ['ika-solution-theme/header.php']),
    ('bouton hamburger masqué en desktop (xl:hidden)', 'text-ikaBlue xl:hidden',
     ['header.php'], ['ika-solution-theme/header.php']),
    ('ouverture/fermeture du menu mobile (JS)', "menuButton",
     ['footer.php'], ['ika-solution-theme/assets/js/theme.js']),
    ('raccourcis mobiles « Devis » / « Appeler »', 'md:flex xl:hidden',
     ['header.php'], ['ika-solution-theme/header.php']),
    ('widget WhatsApp', 'whatsapp-widget',
     ['footer.php'], ['ika-solution-theme/footer.php']),
    ('formulaire de contact (page solution)', 'name="solution_label"',
     ['solution-template.php'], ['ika-solution-theme/single-ika_solution.php']),
]


def main():
    failures = []

    print('%s== Structure : pages statiques vs gabarits du thème ==%s' % (BOLD, OFF))
    for label, static_rel, theme_rel in PAIRS:
        static_path = os.path.join(ROOT, static_rel)
        theme_path = os.path.join(ROOT, theme_rel)
        if not (os.path.exists(static_path) and os.path.exists(theme_path)):
            print('  %sABSENT%s    %s' % (YELLOW, OFF, label))
            continue
        static_src = read(static_path)
        theme_src = inline_template_parts(read(theme_path))
        if label == 'En-tête':
            static_src = between(static_src, '<header', '</header>')
            theme_src = between(theme_src, '<header', '</header>')
        elif label == 'Pied de page':
            static_src = between(static_src, '<footer', '</html>')
            theme_src = between(theme_src, '<footer', '</html>')
        failures += compare(label, static_src, theme_src)

    print()
    print('%s== Structure : accueil (index.php vs template-parts) ==%s' % (BOLD, OFF))
    body = between(read(os.path.join(ROOT, 'index.php')), '<main>', '</main>')
    sections = [p for p in re.split(r'(?=<section)', body) if p.strip().startswith('<section')]
    if len(sections) != len(HOME_PARTS):
        print('  %sÉCART%s     accueil : %d sections statiques pour %d template-parts'
              % (RED, OFF, len(sections), len(HOME_PARTS)))
        failures.append('accueil : nombre de sections')
    for name, section in zip(HOME_PARTS, sections):
        part = os.path.join(THEME, 'template-parts', '%s.php' % name)
        if not os.path.exists(part):
            print('  %sÉCART%s     accueil/%s : template-part manquant' % (RED, OFF, name))
            failures.append('accueil/%s manquant' % name)
            continue
        failures += compare('accueil/%s' % name, section, inline_template_parts(read(part)))

    # L'ordre des sections de l'accueil doit suivre le site statique.
    front = read(os.path.join(THEME, 'front-page.php'))
    order = re.findall(r"get_template_part\(\s*'template-parts/([\w-]+)'", front)
    if order != HOME_PARTS:
        print('  %sÉCART%s     ordre des sections de l\'accueil : %s' % (RED, OFF, ' → '.join(order)))
        failures.append('ordre des sections de l\'accueil')
    else:
        print('  %sOK%s        ordre des sections de l\'accueil' % (GREEN, OFF))

    print()
    print('%s== Éléments d\'interface présents des deux côtés ==%s' % (BOLD, OFF))
    for label, needle, static_files, theme_files in UI_CHECKS:
        missing = []
        for rel in static_files:
            if needle not in read(os.path.join(ROOT, rel)):
                missing.append('statique/%s' % rel)
        for rel in theme_files:
            if needle not in read(os.path.join(ROOT, rel)):
                missing.append('thème/%s' % rel)
        if missing:
            print('  %sÉCART%s     %s → absent de %s' % (RED, OFF, label, ', '.join(missing)))
            failures.append(label)
        else:
            print('  %sOK%s        %s' % (GREEN, OFF, label))

    print()
    if failures:
        print('%sÉCHEC : %d écart(s) de structure entre le site statique et le thème.%s'
              % (RED, len(failures), OFF))
        return 1
    print('%sOK : structure du thème WordPress identique au site statique.%s' % (GREEN, OFF))
    return 0


if __name__ == '__main__':
    sys.exit(main())
