#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""Vérifie que le rendu par défaut des pages partenaires du thème WordPress
(odoo, fortinet, paloalto, microsoft, proxmox) est strictement identique au
site statique : textes, images et onglets.

Usage : python3 tools/compare-partner-static.py
Sortie 0 si aucune différence, 1 sinon. Ne nécessite ni PHP ni WordPress :
le script simule les deux rendus (ika_opt -> défauts du Customizer,
ika_partner_tabs -> repli statique, get_template_part -> template part).
"""
import re, sys, os, html, difflib
ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
THEME = os.path.join(ROOT, 'ika-solution-theme')

"""Mini-parseur de tableaux PHP array(...) -> objets Python + extraction de texte."""


class PHPParser:
    def __init__(self, s):
        self.s = s
        self.i = 0

    def skip_ws(self):
        while self.i < len(self.s):
            c = self.s[self.i]
            if c in ' \t\r\n,':
                self.i += 1
            elif self.s.startswith('//', self.i):
                j = self.s.find('\n', self.i)
                self.i = len(self.s) if j < 0 else j + 1
            elif self.s.startswith('/*', self.i):
                j = self.s.find('*/', self.i)
                self.i = len(self.s) if j < 0 else j + 2
            else:
                break

    def parse_value(self):
        self.skip_ws()
        if self.s.startswith('array', self.i):
            self.i += 5
            self.skip_ws()
            assert self.s[self.i] == '(', self.s[self.i - 10:self.i + 10]
            self.i += 1
            return self.parse_array_body()
        c = self.s[self.i]
        if c in "'\"":
            return self.parse_string()
        # number or bare token
        j = self.i
        while self.i < len(self.s) and self.s[self.i] not in ',)':
            self.i += 1
        tok = self.s[j:self.i].strip()
        try:
            return int(tok)
        except ValueError:
            return tok

    def parse_string(self):
        q = self.s[self.i]
        self.i += 1
        out = []
        while self.i < len(self.s):
            c = self.s[self.i]
            if c == '\\':
                nxt = self.s[self.i + 1]
                if nxt == "'":
                    out.append("'")
                elif nxt == '\\':
                    out.append('\\')
                else:
                    out.append(nxt)
                self.i += 2
                continue
            if c == q:
                self.i += 1
                return ''.join(out)
            out.append(c)
            self.i += 1
        return ''.join(out)

    def parse_array_body(self):
        # after 'array('
        items = []
        mapping = {}
        is_map = False
        while True:
            self.skip_ws()
            if self.i >= len(self.s):
                break
            if self.s[self.i] == ')':
                self.i += 1
                break
            # try to detect 'key' =>
            save = self.i
            key = None
            if self.s[self.i] in "'\"":
                k = self.parse_string()
                self.skip_ws()
                if self.s.startswith('=>', self.i):
                    self.i += 2
                    key = k
                    is_map = True
                else:
                    self.i = save
            val = self.parse_value()
            if key is not None:
                mapping[key] = val
            items.append(val)
            self.skip_ws()
        if is_map:
            # merge: keep order via mapping, but positional items appended under int keys
            for idx, v in enumerate(items):
                if isinstance(v, tuple):
                    pass
            return mapping
        return items


def extract_array(source, varname, startpos=0):
    """Extract `= array(...)` assigned to $varname starting from startpos."""
    pat = re.compile(r'\$' + re.escape(varname) + r'\s*=\s*array\s*\(')
    m = pat.search(source, startpos)
    if not m:
        return None
    p = PHPParser(source)
    p.i = source.index('(', m.start()) + 1
    return p.parse_array_body()


def extract_returned_array(source, func_name):
    """Extract first `return array(...)` inside function func_name."""
    fpat = re.compile(r'function\s+' + re.escape(func_name) + r'\s*\(')
    fm = fpat.search(source)
    if not fm:
        return None
    rpat = re.compile(r'return\s+array\s*\(')
    rm = rpat.search(source, fm.end())
    if not rm:
        return None
    p = PHPParser(source)
    p.i = source.index('(', rm.start()) + 1
    return p.parse_array_body()

customizer_src = open(os.path.join(THEME, 'inc', 'customizer.php'), encoding='utf-8').read()
functions_src = open(os.path.join(THEME, 'functions.php'), encoding='utf-8').read()

# ---------------------------------------------------------------- partner defaults
def build_partner_options():
    # parse le $map de ika_partner_default_options() (structure prefix + fields)
    fm = re.search(r'function ika_partner_default_options\(\)', customizer_src)
    start = fm.end()
    p = PHPParser(customizer_src)
    mm = re.search(r'\$map\s*=\s*array\s*\(', customizer_src[start:])
    p.i = start + customizer_src[start:].index('(', mm.start()) + 1
    pmap = p.parse_array_body()
    out = {    'proxmox': ['Proxmox Virtual Environment (virtualisation)','Proxmox Backup Server (sauvegarde)','Proxmox Mail Gateway (sécurité messagerie)','Autre demande liée à Proxmox'],
}
    for partner, cfg in pmap.items():
        for k, v in cfg['fields'].items():
            out[cfg['prefix'] + '_' + k] = v
    return out

partner_opts = build_partner_options()

# ------------------------------------------------- ika_default_options (static array)
fm = re.search(r'function ika_default_options\(\)', customizer_src)
seg = customizer_src[fm.end():fm.end() + 90000]
mm = re.search(r'return\s+array_merge\s*\(\s*array\s*\(', seg)
p = PHPParser(seg)
p.i = seg.index('(', mm.end() - 1) + 1  # inside array( after array_merge(
base_opts = p.parse_array_body()
DEFAULTS = dict(base_opts)
DEFAULTS.update(partner_opts)

# ---------------------------------------------------------------- default tabs
def parse_default_tabs():
    fm = re.search(r'function ika_partner_default_tabs\(', functions_src)
    end = functions_src.index('\n/**', fm.end())
    code = functions_src[fm.end():end]
    tabs = {}
    # structure: $tabs['P']['G'] = array(...);
    for m in re.finditer(r"\$tabs\['(\w+)'\]\['(\w+)'\]\s*=\s*array\s*\(", code):
        pr = PHPParser(code)
        pr.i = code.index('(', m.end() - 1) + 1
        arr = pr.parse_array_body()
        tabs.setdefault(m.group(1), {})[m.group(2)] = arr
    return tabs

THEME_TABS = parse_default_tabs()

def parse_pmx_tabs():
    fm = re.search(r'function ika_pmx_default_tabs\(', functions_src)
    end = functions_src.index('\n/**', fm.end())
    code = functions_src[fm.end():end]
    tabs = {}
    for m in re.finditer(r"\$tabs\['(\w+)'\]\s*=\s*array\s*\(", code):
        pr = PHPParser(code)
        pr.i = code.index('(', m.end() - 1) + 1
        tabs.setdefault('proxmox', {})[m.group(1)] = pr.parse_array_body()
    return tabs

THEME_TABS.update(parse_pmx_tabs())

# ---------------------------------------------------------------- text extraction
def tabs_text(tabs):
    parts = []
    for t in tabs:
        parts.append(t['label'])
        for it in t['items']:
            parts.append(it['title'])
            parts.append(it['text'])
            for ln in it.get('links', []) or []:
                parts.append(ln[0])
    return parts

def substitute(src, page):
    """Replace PHP echo patterns with their default values; drop the rest of PHP."""
    s = src
    # foreach hero badges loop -> join badge texts separated
    def badges(m):
        km = re.search(r"ika_list_option\(\s*'((?:[^'\\\\]|\\\\.)+)'(?:\s*,\s*'((?:[^'\\\\]|\\\\.)*)')?", m.group(1))
        key = km.group(1)
        val = km.group(2) if km.group(2) is not None else DEFAULTS.get(key, '')
        return '\n' + '\n'.join(x.strip() for x in val.split(',') if x.strip()) + '\n'
    s = re.sub(r'<\?php\s+foreach\s*\((.*?)\?>(.*?)<\?php\s+endforeach;\s*\?>', lambda m: badges(m) if 'ika_list_option' in m.group(1) else '', s, flags=re.S)

    # ika_opt echoes with optional explicit default
    def opt(m):
        key = m.group(1)
        d = m.group(2)
        if d:
            d = d.replace("\\'", "'")
            return d
        return DEFAULTS.get(key, f'«{key}?»')
    s = re.sub(r"<\?php\s+echo\s+(?:esc_html|esc_url|esc_attr)\s*\(\s*ika_opt\(\s*'([^']+)'\s*(?:,\s*'((?:[^'\\]|\\.)*)'\s*)?\)\s*\);\s*\?>", opt, s)

    # ika_asset
    s = re.sub(r"<\?php\s+echo\s+esc_url\s*\(\s*ika_asset\(\s*'([^']+)'\s*\)\s*\);\s*\?>", r'ASSET:\1', s)
    # static ika_h
    s = re.sub(r"<\?php\s+echo\s+(?:ika_h|pmx_h)\('([^']+)'\);\s*\?>", r'ASSET:\1', s)
    s = re.sub(r"<\?=?\s*htmlspecialchars.*?ASSET:([^'\"]+)['\"];?\s*\?>", r'ASSET:\1', s)
    # home_url
    s = re.sub(r"<\?php\s+echo\s+esc_url\s*\(\s*home_url\(\s*'([^']+)'\s*\)\s*\);\s*\?>", r'HOME\1', s)
    # time()
    s = re.sub(r"<\?=\s*time\(\)\s*\?>", '1234567890', s)

    # render tabs calls (static pages)
    static_tabs = PAGE_STATIC_TABS.get(page, {})
    def rt(m):
        var = m.group(2)
        arr = static_tabs.get(var)
        if arr is None:
            return ''
        return '\n' + '\n'.join(tabs_text(arr)) + '\n'
    s = re.sub(r"<\?php\s+ika_partner_render_tabs\(\s*'([^']+)'\s*,\s*\$(\w+)\s*\);\s*\?>", rt, s)

    # contact template part (theme) : section partenaire dédiée
    if 'contact-partner' in s and page in THEME_CONTACT_SUBJ:
        title_m = re.search(r"'title' => ika_opt\( '[^']+', '((?:[^'\\\\]|\\\\.)*)' \)", s)
        text_m = re.search(r"'text'  => ika_opt\( '[^']+', '((?:[^'\\\\]|\\\\.)*)' \)", s)
        c_title = title_m.group(1) if title_m else ''
        c_text = text_m.group(1) if text_m else ''
        cs = open(os.path.join(THEME, 'template-parts', 'contact-partner.php'), encoding='utf-8').read()
        cs = re.sub(r"\$ika_pc_title \?>", lambda m: m.group(0), cs)
        cs = cs.replace("<?php echo esc_html( $ika_pc_title ); ?>", c_title)
        cs = cs.replace("<?php echo esc_html( $ika_pc_text ); ?>", c_text)
        cs = re.sub(r"<\?php foreach \( ika_contact_subjects\(\).*?\?>(.*?)<\?php endforeach; \?>",
                    lambda m: '\n'.join('<option>%s</option>' % x for x in THEME_CONTACT_SUBJ[page]), cs, flags=re.S)
        cs = re.sub(r"<\?php\s+(?:esc_html_e|esc_attr_e)\s*\(\s*'([^']+)'.*?;\s*\?>", r'\1', cs)
        cs = re.sub(r'<\?php.*?\?>', '', cs, flags=re.S)
        s = re.sub(r"  <\?php\s*// Section contact.*?unset\( \$GLOBALS\['ika_partner_contact'\] \);\s*\?>",
                   '\n--CONTACT--\n' + cs + '\n--ENDCONTACT--\n', s, flags=re.S)

    # drop remaining PHP
    s = re.sub(r'<\?(?:php|=).*?\?>', '', s, flags=re.S)
    s = re.sub(r'<\?[^>]*', '', s)
    return s

PAGE_STATIC_TABS = {}
PAGE_MAP = {
    'odoo':      {'static': os.path.join(ROOT, 'odoo.php'),      'theme': os.path.join(THEME, 'page-odoo.php'),      'tabs': [('odoo-comm', 'odoo_comm_tabs', 'comm'), ('odoo-ent', 'odoo_ent_tabs', 'ent')]},
    'fortinet':  {'static': os.path.join(ROOT, 'fortinet.php'),  'theme': os.path.join(THEME, 'page-fortinet.php'),  'tabs': [('forti-gate', 'forti_fortigate_tabs', 'gate'), ('forti-eco', 'forti_eco_tabs', 'eco')]},
    'paloalto':  {'static': os.path.join(ROOT, 'paloalto.php'),  'theme': os.path.join(THEME, 'page-paloalto.php'),  'tabs': [('palo-ngfw', 'palo_ngfw_tabs', 'ngfw'), ('palo-cloud', 'palo_cloud_tabs', 'cloud')]},
    'microsoft': {'static': os.path.join(ROOT, 'microsoft.php'), 'theme': os.path.join(THEME, 'page-microsoft.php'), 'tabs': [('ms-collab', 'ms_collab_tabs', 'collab'), ('ms-plans', 'ms_plans_tabs', 'plans')]},
    'proxmox':   {'static': os.path.join(ROOT, 'proxmox.php'),   'theme': os.path.join(THEME, 'page-proxmox.php'),   'tabs': [('pmx-ve', 'pmx_ve_tabs', 've'), ('pmx-pbs', 'pmx_pbs_tabs', 'pbs'), ('pmx-pmg', 'pmx_pmg_tabs', 'pmg')]},
}
THEME_CONTACT_SUBJ = {
    'odoo': ['Odoo CRM & ventes','Odoo comptabilité & finances','Odoo stock, achats & production','Odoo RH, projets & services','Odoo eCommerce & site web','Audit / migration vers Odoo','Autre demande liée à Odoo'],
    'fortinet': ['FortiGate pare-feu NGFW','Secure SD-WAN multi-sites','VPN & accès distants sécurisés','FortiManager / FortiAnalyzer','Protection des postes (FortiClient)','Audit / supervision de la sécurité','Autre demande liée à Fortinet'],
    'paloalto': ['Pare-feu Strata (PAN-OS)','GlobalProtect & accès distant','Prisma Access (SASE)','Sécurité cloud (Prisma Cloud)','Détection & réponse (Cortex)','Audit / supervision de la sécurité','Autre demande liée à Palo Alto'],
    'microsoft': ['Microsoft 365 — plans Business','Microsoft 365 — plans Enterprise','Migration / déploiement Microsoft 365','Messagerie Exchange & Teams','SharePoint / intranet','Sécurité & conformité (Defender, Entra ID)','Revue & optimisation des licences','Autre demande liée à Microsoft'],
    'proxmox': ['Proxmox Virtual Environment (virtualisation)','Proxmox Backup Server (sauvegarde)','Proxmox Mail Gateway (sécurité messagerie)','Autre demande liée à Proxmox'],
}

def visible_text(s):
    s = re.sub(r'<!--.*?-->', '', s, flags=re.S)
    s = re.sub(r'<script.*?</script>', '', s, flags=re.S)
    s = re.sub(r'<style.*?</style>', '', s, flags=re.S)
    s = re.sub(r'<[^>]+>', '\n', s)
    s = html.unescape(s)
    lines = [re.sub(r'\s+', ' ', ln).strip() for ln in s.split('\n')]
    return [ln for ln in lines if ln and not ln.startswith('--')]

def images(s):
    import os
    srcs = re.findall(r'src="(ASSET:[^"]+)"', s)
    return [os.path.basename(x.replace('ASSET:', '')) for x in srcs]

def hrefs(s):
    return re.findall(r'href="(ASSET:[^"]+|HOME[^"]*|https?://[^"]+)"', s)

DIFFS = []
for page, cfg in PAGE_MAP.items():
    st_src = open(cfg['static'], encoding='utf-8').read()
    th_src = open(cfg['theme'], encoding='utf-8').read()

    # parse static tab arrays
    stat_tabs = {}
    for grp, var, thgrp in cfg['tabs']:
        m = re.search(r'\$' + var + r'\s*=\s*array\s*\(', st_src)
        if m:
            pr = PHPParser(st_src)
            pr.i = st_src.index('(', m.end() - 1) + 1
            stat_tabs[var] = pr.parse_array_body()
    PAGE_STATIC_TABS[page] = stat_tabs

    st = substitute(st_src[st_src.index('?>') + 2:] if '?>' in st_src else st_src, page)
    th = substitute(th_src, page)

    st_txt, th_txt = visible_text(st), visible_text(th)
    st_img, th_img = images(st), images(th)

    print('=' * 100)
    print(f'PAGE: {page.upper()}  — texte statique {len(st_txt)} segments / thème {len(th_txt)} segments')
    print('=' * 100)
    sm = difflib.SequenceMatcher(a=st_txt, b=th_txt, autojunk=False)
    for tag, i1, i2, j1, j2 in sm.get_opcodes():
        if tag == 'equal':
            continue
        DIFFS.append(f'{page}: texte ({tag})')
        print(f'--- {tag} ---')
        for x in st_txt[i1:i2]:
            print(f'  [STATIQUE] {x}')
        for x in th_txt[j1:j2]:
            print(f'  [THEME   ] {x}')
    if st_img != th_img:
        DIFFS.append(f'{page}: images')
        print('--- IMAGES DIFFERENTES ---')
        for a, b in zip(st_img + [''] * 9, th_img + [''] * 9):
            mark = '  ' if a == b else '* '
            print(f'{mark}[S] {a:60s} [T] {b}')
    # tabs structural compare
    for grp, var, thgrp in cfg['tabs']:
        a = stat_tabs.get(var)
        b = THEME_TABS.get(page, {}).get(thgrp)
        if a and b:
            ta, tb = tabs_text(a), tabs_text(b)
            if ta != tb:
                DIFFS.append(f'{page}: onglets {var}')
                print(f'--- ONGLETS DIFFERENTS ({var} vs {page}/{thgrp}) ---')
                for d in difflib.unified_diff(ta, tb, lineterm=''):
                    print('   ' + d)
print()
if DIFFS:
    print('ÉCHEC :', len(DIFFS), 'différence(s) ->', ', '.join(DIFFS))
    sys.exit(1)
print('OK : rendu par défaut des pages partenaires strictement identique au site statique.')
sys.exit(0)
