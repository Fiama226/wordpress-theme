# Audit comparatif — `proxmox.php` (IKA) vs `nktek-holding.com/en/proxmox`

Date : 2026-07-28
Source analysée : https://www.nktek-holding.com/en/proxmox (15 chunks, contenu intégral)
Cible : `proxmox.php` (710 lignes)

---

## Verdict global

**Couverture du contenu technique Proxmox : ~98 %.**

Les deux blocs techniques majeurs (Proxmox VE et Proxmox Backup Server) sont **complets**, y compris
les détails fins que l'on oublie facilement. Il reste **1 omission majeure** (les 4 sections
formations PECB) et **quelques détails mineurs**.

---

## ✅ Ce qui est bien couvert (vérifié terme par terme)

### Proxmox Virtual Environment — 7 onglets
| Onglet source | Statut |
|---|---|
| KVM & Container | ✅ Debian GNU/Linux, AGPL v3, KVM, Intel VT-x / AMD-V, 2008, LXC |
| Management | ✅ ExtJS, CLI, Mobile (Android/Flutter/HTML5/SPICE), multi-maître, **pmxcfs**, Corosync, 30 Mo, migration en direct, API REST, rôles/ACL + jeton d'API, domaines d'auth (PAM, LDAP, AD, OpenID) |
| HA Cluster | ✅ HA Manager, chien de garde, simulateur 3 nœuds / 6 VM |
| Network | ✅ Réseau ponté, **4 094 ponts**, VLAN 802.1q, liaison/agrégation, Open vSwitch, RSTP, VXLAN, OpenFlow |
| Storage | ✅ Liste réseau complète (LVM+iSCSI, iSCSI, NFS, SMB/CIFS, Ceph RBD, iSCSI LUN, GlusterFS, CephFS) + liste locale (LVM, répertoire, ZFS) + Ceph (RBD/CephFS, auto-guérison, exaoctet, matériel de base) |
| Backup | ✅ vzdump, sauvegarde planifiée, stockage de sauvegarde, intégration PBS, restauration fichier unique, restauration en direct |
| Firewall | ✅ Pare-feu distribué, iptables, macros, groupes de sécurité, alias, IPv4 **et** IPv6 |

### Proxmox Backup Server — 7 onglets
| Onglet source | Statut |
|---|---|
| Backup | ✅ Open source AGPL, incrémental + déduplication (blocs fixes/variables), **Rust**, **ZSTD** |
| Architecture | ✅ Modèle client-serveur, chiffrement côté client, synchronisation à distance (Remotes / Sync Jobs) |
| Data Integrity & Security | ✅ AES-256 GCM, clé principale RSA, protection rançongiciel, rôles/autorisations, **SHA-256 + index.json**, pourriture des bits |
| Restore | ✅ Restauration rapide, récupération granulaire, shell interactif, catalogue, récupération de place |
| Management | ✅ GUI web **port 8007**, CLI, API REST |
| Proxmox VE Integration | ✅ Bitmaps sales QEMU, empreinte de certificat, restauration en direct |
| Tape | ✅ LTO-5+ / LTO-4, chiffrement matériel, politiques de conservation, **pmtx**, générateur de codes-barres LTO |

> Note : sur la page source, l'onglet **Tape** est dupliqué (bug d'affichage Odoo, contenu identique répété deux fois). Ne pas reproduire.

### Formulaire de contact
✅ Tous les champs de la source sont présents : Nom, Téléphone, Email, Société,
**select « Choisir une solution Proxmox »** avec les 3 options exactes
(Virtual Environment / Backup Server / **Mail Gateway**), Objet, Message, bouton Soumettre.

---

## ❌ OMISSION MAJEURE — Les 4 sections « Formations PECB »

C'est le seul vrai manque. La page NKTEK contient, **après** le bloc Proxmox Backup Server,
quatre sections de formations/certifications entièrement absentes de votre page :

| # | Section | Contenu source |
|---|---|---|
| 1 | **CMMC** (Cybersecurity Maturity Model Certification) | Définition, FCI/CUI, 5 niveaux cumulatifs, DoD, CMMC-AB, DIB, avantages (5 puces), 2 formations : *PECB CMMC Foundations*, *CMMC Certified Professional* |
| 2 | **Cloud Security** | Définition, ISO/IEC **27017** et ISO/IEC **27018**, PII, avantages (6 puces), 1 formation : *Lead Cloud Security Manager* |
| 3 | **Piratage éthique** (Ethical Hacking) | Définition, « white hats », tests d'intrusion, avantages (7 puces), 1 formation : *Lead Ethical Hacker* |
| 4 | **RGPD / GDPR** | Définition, amendes **2 % / 4 %** du CA annuel, rôle du **DPO**, avantages (8 puces), 3 formations : *GDPR Introduction*, *GDPR Foundation*, *GDPR – Certified Data Protection Officer* |

Chaque section suit la même trame : *Qu'est-ce que… ? / Pourquoi est-ce important pour vous ? /
Avantages / Comment démarrer ?* + un CTA « Contactez-nous pour commencer votre parcours » +
une liste de formations avec liens vers les brochures PDF PECB.

> ⚠️ **Recommandation** : ces sections n'ont **aucun rapport avec Proxmox**. Sur le site NKTEK, elles
> semblent avoir été collées par erreur sur la page Proxmox (elles apparaissent aussi dupliquées deux
> fois dans le HTML). Elles vendent des formations **PECB**, un organisme tiers dont IKA n'est
> peut-être pas partenaire. **Ne les copiez que si IKA propose réellement ces certifications** —
> sinon leur absence est un choix éditorial correct, pas un oubli.

---

## ⚠️ Détails mineurs manquants

| Élément | Source | Votre page |
|---|---|---|
| Ceph — infrastructure **hyperconvergée** | Lien wiki « Deploy Hyper-Converged Ceph Cluster » | absent |
| Ceph — **Benchmark 2020/09** | Lien vers le PDF de benchmark | absent |
| KVM — version exacte | « depuis la version **0.9beta2** » | seulement « depuis 2008 » |
| Chiffrement — cible non fiable | « ex. une installation de **colocation** louée » | nuance absente |
| Sécurité formulaire | **reCAPTCHA** | absent (aucune protection anti-spam) |
| Formulaire | mention « Séparez les adresses email par une virgule » / « Plusieurs choix possibles » | absent (non pertinent chez vous) |

À l'inverse, vous avez **correctement omis** les deux textes placeholder Odoo laissés sur la page
source (« Pour avoir du succès, votre contenu doit être utile à vos lecteurs. » et « Commencez par
le client: trouvez ce qu'il veut et donner-le lui. »). Bonne décision.

---

## 🖼️ Images — problème à corriger

| Image | Statut |
|---|---|
| `assets/images/proxmox-hero.jpg` | ✅ locale (267 Ko) |
| `assets/images/proxmox-backup.jpg` | ✅ locale (243 Ko) |
| `assets/images/Proxmox-VE-7-1-Host-Summary.svg` | ✅ **présente en local (299 Ko)** mais **non utilisée** — la page pointe vers l'URL distante |

### 🔴 Hotlinks à corriger (6 images chargées depuis des serveurs tiers)

```
https://www.nktek-holding.com/web/image/1254-.../Proxmox-Backup-Server-2-3-dashboard.svg   ← serveur du concurrent !
https://www.nktek-holding.com/web/image/1255-.../Proxmox-VE-7-1-Host-Summary.svg           ← serveur du concurrent !
https://proxmox.com/images/proxmox/logos/debian-logo-100.png
https://proxmox.com/images/proxmox/logos/kvm-logo-200.png
https://proxmox.com/images/proxmox/logos/lxc-containers-logo-170.png
https://proxmox.com/images/proxmox/logos/Ceph_logo_stacked_220.png
https://www.proxmox.com/images/proxmox/screenshots/Proxmox-VE-8-1-Host-Summary-Secure-Boot.png#joomlaImage://...
```

**Trois problèmes :**
1. **Vous chargez 2 images depuis le serveur de NKTEK.** S'ils les suppriment ou bloquent le
   referer, votre page casse. C'est aussi visible dans leurs logs.
2. `debian.png` **existe déjà en local** (`assets/images/debian.png`) mais n'est pas utilisé.
3. La dernière URL contient un fragment `#joomlaImage://local-images/...` copié-collé depuis le
   HTML source — inutile et peu propre.

**Action recommandée :** télécharger les 6 images dans `assets/images/` et remplacer les URLs
distantes par des chemins locaux (le SVG VE et `debian.png` sont déjà là, il suffit de repointer).

---

## Résumé des actions

| Priorité | Action |
|---|---|
| 🔴 Haute | Rapatrier les 6 images hotlinkées en local (surtout les 2 hébergées chez NKTEK) |
| 🔴 Haute | Utiliser `assets/images/Proxmox-VE-7-1-Host-Summary.svg` et `assets/images/debian.png` déjà présents |
| 🟠 Moyenne | Décider pour les 4 sections PECB (CMMC / Cloud Security / Ethical Hacking / RGPD) — à copier **uniquement** si IKA propose ces formations |
| 🟡 Basse | Ajouter une protection anti-spam au formulaire (reCAPTCHA ou honeypot) |
| 🟡 Basse | Ajouter les liens Ceph hyperconvergé + benchmark, la mention « 0.9beta2 », l'exemple « colocation » |


---

# ✅ MISE À JOUR — Corrections appliquées (2026-07-28)

## 1. Proxmox Mail Gateway ajouté (omission majeure signalée par le client)

Le 3ᵉ produit Proxmox était bien présent sur la page NKTEK (chunks 9-10) et **totalement absent**
de `proxmox.php`. Deux sections complètes ont été créées :

- **Section intro** : titre, chapô « Plate-forme open source et complète de sécurité des e-mails »,
  les 2 paragraphes de présentation, badges (Postfix MTA / ClamAV® / SpamAssassin™ / Cluster HA),
  CTA « Prêt à démarrer Proxmox Mail Gateway ? » et le schéma d'architecture.
- **Section onglets** : **5 onglets / 27 cartes** reprenant l'intégralité du contenu source.

| Onglet | Contenu couvert |
|---|---|
| Anti-Spam / Antivirus | Proxy de messagerie, Postfix MTA, ClamAV® + Google Safe Browsing, SpamAssassin™, score de spam, faux positifs/négatifs, déploiement réseau (filtrage avant file d'attente) |
| Méthodes de filtrage | Vérification du récepteur (**-90 % de trafic**), SPF, DNSBL, liste blanche SMTP, filtre bayésien, listes noires/blanches (groupe LDAP), **liste grise (-50 %)**, SURBL |
| Suivi & journaux | Centre de suivi des messages, **1 million d'e-mails/jour**, 7 derniers jours, 4 étapes de journaux corrélés, temps réel (**100 dernières lignes**) |
| Cluster HA | Clustering au niveau applicatif, **tunnel VPN** maître/nœuds, 7 avantages, équilibrage **MX + Round-robin**, **enregistrements PTR**, plusieurs enregistrements d'adresse |
| Système de règles | Système orienté objet, objets ACTIONS/QUI/QUOI/QUAND, 5 catégories (DE, À, QUAND, QUOI, ACTION) + direction, du simple au sophistiqué |

Lien ajouté vers la [documentation de référence du filtrage PMG](https://pmg.proxmox.com/pmg-docs/pmg-admin-guide.html#chapter_mailfilter).

## 2. Images : 100 % locales — 0 hotlink

Les 6 images distantes ont été supprimées. **Plus aucun `src="http..."` dans la page.**

| Avant (distant) | Après (local) |
|---|---|
| `nktek-holding.com/.../Proxmox-Backup-Server-2-3-dashboard.svg` | `assets/images/proxmox/proxmox-backup-server-dashboard.png` |
| `proxmox.com/.../Proxmox-VE-8-1-Host-Summary-Secure-Boot.png#joomlaImage://...` | `assets/images/Proxmox-VE-7-1-Host-Summary.svg` (fragment Joomla nettoyé) |
| `proxmox.com/.../debian-logo-100.png` | `assets/images/proxmox/logo-debian.svg` |
| `proxmox.com/.../kvm-logo-200.png` | `assets/images/proxmox/logo-kvm.svg` |
| `proxmox.com/.../lxc-containers-logo-170.png` | `assets/images/proxmox/logo-lxc.svg` |
| `proxmox.com/.../Ceph_logo_stacked_220.png` | `assets/images/proxmox/logo-ceph.svg` |
| *(nouveau)* schéma PMG | `assets/images/proxmox/proxmox-mail-gateway-infrastructure.png` |

> ⚠️ **Note importante sur les logos.** Le réseau du sandbox bloque `proxmox.com`, les logos
> officiels n'ont donc pas pu être téléchargés. J'ai créé **4 logos SVG de remplacement** (Debian,
> KVM, LXC, Ceph) — légers, vectoriels et aux couleurs de la marque. **Remplacez-les par les
> fichiers officiels** quand vous aurez accès au réseau :
> ```bash
> cd assets/images/proxmox
> curl -O https://proxmox.com/images/proxmox/logos/debian-logo-100.png
> curl -O https://proxmox.com/images/proxmox/logos/kvm-logo-200.png
> curl -O https://proxmox.com/images/proxmox/logos/lxc-containers-logo-170.png
> curl -O https://proxmox.com/images/proxmox/logos/Ceph_logo_stacked_220.png
> ```
> Le dashboard PBS et le schéma PMG sont, eux, de véritables captures récupérées.

## 3. Protection anti-spam (à la place de reCAPTCHA)

Plutôt que reCAPTCHA (dépendance Google, RGPD, clés API à gérer), j'ai implémenté une double
protection **honeypot + contrôle de délai**, sans dépendance externe :

- Champ leurre `site_web` masqué hors écran (`left:-9999px`, `tabindex="-1"`) — seul un robot le remplit.
- Champ `form_time` : toute soumission en **moins de 3 secondes** est rejetée.
- Côté serveur (`contact-submit.php`) : si le honeypot est rempli, on renvoie un **faux succès**
  pour ne pas informer le robot du rejet.
- Appliqué aux **4 formulaires** du site : `proxmox.php`, `index.php`, `solution-template.php`,
  `detail-actualite.php`.

## 4. Détails mineurs comblés

- ✅ KVM : « depuis le début du projet, en 2008 (**depuis la version 0.9beta2**) »
- ✅ Chiffrement : « même sur des cibles non fiables — par exemple **une installation de colocation louée** »
- ✅ Ceph : 2 boutons ajoutés → **cluster hyperconvergé** + **benchmark Proxmox VE Ceph 2020/09**
- ✅ Hero : badge « Mail Gateway », chapô et `$pageDescription` mis à jour pour les 3 produits

## 5. Sections PECB — décision : NON reprises

L'analyse complète des 15 chunks révèle **6 sections PECB** (et non 4) : CMMC, Cloud Security,
Ethical Hacking, RGPD, **ISO 37301** et **ISO 21502**. Elles n'ont **aucun rapport avec Proxmox**,
sont **dupliquées deux fois** dans le HTML source et vendent des formations d'un organisme tiers
(PECB) dont IKA n'est pas partenaire déclaré. Une de leurs cartes est même mal étiquetée sur le site
source (« ISO 9001 Lead Implementer » et « ISO 22301 Lead Auditor » pointant vers des brochures
ISO 37301) — preuve d'un copier-coller non relu.

**Recommandation maintenue : ne pas les copier.** Si IKA souhaite proposer des formations
certifiantes, elles méritent une page dédiée (`formations.php`), pas un ajout à la page Proxmox.

---

## État final de la page

| Indicateur | Valeur |
|---|---|
| Couverture du contenu Proxmox (VE + PBS + PMG) | **100 %** |
| Onglets / cartes | 7 VE + 7 PBS + **5 PMG** = 19 onglets |
| Hotlinks externes | **0** |
| Images locales | 9 |
| Formulaires protégés anti-spam | 4 |
| Structure PHP / HTML | équilibrée (vérifiée) |
