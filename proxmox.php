<?php
/**
 * Page Proxmox — contenu rédigé en propre par IKA SOLUTION (août 2026).
 *
 * La page précédente reprenait des textes publiés par un tiers : elle a été
 * entièrement réécrite (formulations 100 % originales) tout en conservant
 * le même périmètre fonctionnel — Proxmox Virtual Environment, Proxmox
 * Backup Server et Proxmox Mail Gateway — et la présentation par onglets.
 *
 */

  function pmx_h($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
  }

/**
 * Rend un groupe d'onglets (boutons + panneaux de cartes).
 *
 * @param string $group_id Préfixe unique du groupe (ex : 've').
 * @param array  $tabs     Onglets : id, label, icon, items[ {title, text} ].
 */
function pmx_render_tabs( $group_id, $tabs ) {
	?>
	<div class="mt-10" data-pmx-tabs>
		<div class="flex flex-wrap gap-2.5" role="tablist">
			<?php foreach ( $tabs as $pmx_tab ) : ?>
			<button type="button" role="tab" class="pmx-tab rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-black text-ikaBlue transition hover:border-ikaBlue" data-pmx-target="<?php echo pmx_h( $group_id . '-' . $pmx_tab['id'] ); ?>" aria-selected="false">
				<span aria-hidden="true"><?php echo pmx_h( $pmx_tab['icon'] ); ?></span> <?php echo pmx_h( $pmx_tab['label'] ); ?>
			</button>
			<?php endforeach; ?>
		</div>
		<?php foreach ( $tabs as $pmx_tab ) : ?>
		<div id="<?php echo pmx_h( $group_id . '-' . $pmx_tab['id'] ); ?>" class="pmx-panel mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3" role="tabpanel" hidden>
			<?php foreach ( $pmx_tab['items'] as $pmx_item ) : ?>
			<article class="flex h-full flex-col rounded-2xl bg-white p-6 shadow-clean transition hover:-translate-y-1 hover:shadow-premium">
				<h3 class="text-lg font-black leading-snug text-ikaBlue"><?php echo pmx_h( $pmx_item['title'] ); ?></h3>
				<p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo pmx_h( $pmx_item['text'] ); ?></p>
				<?php if ( ! empty( $pmx_item['links'] ) ) : ?>
				<div class="mt-4 flex flex-wrap gap-2">
					<?php foreach ( $pmx_item['links'] as $pmx_link ) : ?>
					<a class="rounded-full bg-ikaSoft px-4 py-2 text-xs font-black text-ikaBlue transition hover:bg-ikaBlue hover:text-white" href="<?php echo pmx_h( $pmx_link[1] ); ?>" target="_blank" rel="noopener"><?php echo pmx_h( $pmx_link[0] ); ?> ↗</a>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</article>
			<?php endforeach; ?>
		</div>
		<?php endforeach; ?>
	</div>
	<?php
}

/* ---------------------------------------------------------------------------
 * Proxmox Virtual Environment — onglets de fonctionnalités (textes originaux)
 * ------------------------------------------------------------------------- */
$pmx_ve_tabs = array(
	array(
		'id'    => 'kvm-lxc',
		'label' => 'KVM & Conteneurs',
		'icon'  => '▢',
		'items' => array(
			array(
				'title' => 'Une base Debian 100 % open source',
				'text'  => 'La plateforme s’appuie sur Debian GNU/Linux et un noyau optimisé. Son code, publié sous licence GNU AGPL v3, peut être audité librement : aucune fonctionnalité cachée, aucun coût de licence, et une fiabilité éprouvée à grande échelle.',
			),
			array(
				'title' => 'Virtualisation complète avec KVM',
				'text'  => 'KVM, la technologie de virtualisation de référence sous Linux, est intégrée à Proxmox VE depuis les débuts du projet en 2008. Elle atteint des performances proches du natif sur tout processeur x86 récent (Intel VT-x ou AMD-V) et exécute Windows comme Linux avec un matériel virtuel dédié (réseau, disque, affichage).',
			),
			array(
				'title' => 'Conteneurs Linux (LXC)',
				'text'  => 'Légers et quasi instantanés au démarrage, les conteneurs partagent le noyau de l’hôte pour exécuter plusieurs environnements Linux isolés sur une même machine, avec une empreinte mémoire et disque minimale et des outils d’administration simples.',
			),
		),
	),
	array(
		'id'    => 'gestion',
		'label' => 'Gestion',
		'icon'  => '⚙',
		'items' => array(
			array(
				'title' => 'Administration web centralisée',
				'text'  => 'Toutes les opérations du datacenter virtuel — VM, conteneurs, stockage, sauvegardes, haute disponibilité — se pilotent depuis une interface web unique (framework ExtJS), sans rien installer sur le poste. Historique des tâches et journaux de chaque nœud sont consultables en direct.',
			),
			array(
				'title' => 'Ligne de commande complète',
				'text'  => 'Les administrateurs habitués au shell disposent d’une CLI couvrant l’ensemble des composants, avec auto-complétion intelligente et documentation intégrée au format man.',
			),
			array(
				'title' => 'Pilotage mobile',
				'text'  => 'Une application dédiée (Android) et une version mobile HTML5 de l’interface permettent de superviser cluster, nœuds, VM et conteneurs en déplacement — console SPICE/HTML5 comprise.',
			),
			array(
				'title' => 'Cluster sans serveur de gestion',
				'text'  => 'L’architecture multi-maître autorise l’administration depuis n’importe quel nœud : inutile de déployer un serveur d’administration séparé, coûteux et complexe.',
			),
			array(
				'title' => 'Configuration répliquée (pmxcfs)',
				'text'  => 'Le système de fichiers de cluster maison synchronise la configuration sur tous les nœuds en temps réel via Corosync. Une trentaine de mégaoctets en mémoire suffisent, même pour des milliers de machines virtuelles.',
			),
			array(
				'title' => 'Migration à chaud',
				'text'  => 'Déplacez une machine virtuelle en cours d’exécution d’un nœud vers un autre, sans arrêt perceptible : idéal pour maintenir un hôte sans interrompre les services.',
			),
			array(
				'title' => 'API REST documentée',
				'text'  => 'Une API RESTful au format JSON, décrite formellement par schéma, facilite l’intégration avec vos outils d’orchestration, portails ou environnements d’hébergement.',
			),
			array(
				'title' => 'Droits par rôles (ACL)',
				'text'  => 'Attribuez des permissions fines sur chaque objet (VM, stockage, nœud) à des groupes, utilisateurs ou jetons d’API, selon des rôles prédéfinis.',
			),
			array(
				'title' => 'Annuaires d’authentification',
				'text'  => 'Connectez la plateforme à vos annuaires : Linux PAM, LDAP, Microsoft Active Directory, OpenID Connect ou serveur d’authentification intégré.',
			),
		),
	),
	array(
		'id'    => 'ha',
		'label' => 'Haute disponibilité',
		'icon'  => '⟳',
		'items' => array(
			array(
				'title' => 'Cluster HA prêt à l’emploi',
				'text'  => 'En regroupant plusieurs nœuds, vos serveurs virtuels deviennent hautement disponibles : en cas de panne d’un hôte, les VM concernées basculent automatiquement, grâce à des briques Linux HA éprouvées.',
			),
			array(
				'title' => 'Surveillance et bascule automatiques',
				'text'  => 'Le gestionnaire de ressources surveille en continu VM et conteneurs et réagit dès qu’un service tombe. La protection par chien de garde (watchdog) simplifie le déploiement ; tout se configure depuis l’interface web.',
			),
			array(
				'title' => 'Simulateur de panne intégré',
				'text'  => 'Un laboratoire virtuel (3 nœuds, 6 VM) permet d’expérimenter les scénarios de bascule et de se former à la haute disponibilité sans toucher à la production.',
			),
		),
	),
	array(
		'id'    => 'reseau',
		'label' => 'Réseau',
		'icon'  => '⇄',
		'items' => array(
			array(
				'title' => 'Ponts, VLAN et agrégation',
				'text'  => 'Le modèle réseau ponté fait office de commutateur logiciel (jusqu’à 4 094 ponts par hôte). Les VLAN IEEE 802.1q et l’agrégation de liens offrent la souplesse nécessaire aux architectures segmentées.',
			),
			array(
				'title' => 'Open vSwitch (OVS)',
				'text'  => 'Pour les besoins avancés, Open vSwitch peut remplacer les ponts standards : RSTP, VXLAN, OpenFlow et transport de plusieurs VLAN sur un même pont.',
			),
		),
	),
	array(
		'id'    => 'stockage',
		'label' => 'Stockage',
		'icon'  => '▤',
		'items' => array(
			array(
				'title' => 'Un modèle de stockage très souple',
				'text'  => 'Les disques des VM peuvent résider sur un ou plusieurs stockages locaux ou partagés, en nombre illimité. Le stockage partagé (NFS, SAN) autorise la migration à chaud des machines entre nœuds.',
			),
			array(
				'title' => 'Stockage réseau : un large choix',
				'text'  => 'LVM sur iSCSI, iSCSI direct, NFS, SMB/CIFS, Ceph RBD, GlusterFS, CephFS ou LUN iSCSI : la plateforme s’adapte à votre équipement existant plutôt que l’inverse.',
			),
			array(
				'title' => 'Stockage local maîtrisé',
				'text'  => 'En local, vous disposez de LVM, de simples répertoires et de ZFS intégré avec ses fonctions avancées (snapshots, compression, sommes de contrôle).',
			),
			array(
				'title' => 'Ceph hyperconvergé intégré',
				'text'  => 'Déployez un stockage distribué auto-réparateur directement depuis l’interface Proxmox : Ceph RBD et CephFS tournent sur du matériel standard et montent en charge sans limite pratique. Deux liens utiles :',
				'links' => array(
					array( 'Cluster Ceph hyperconvergé', 'https://pve.proxmox.com/wiki/Deploy_Hyper-Converged_Ceph_Cluster' ),
					array( 'Benchmark Ceph sous Proxmox VE', 'https://www.proxmox.com/en/downloads/item/proxmox-ve-ceph-benchmark-2020-09' ),
				),
			),
		),
	),
	array(
		'id'    => 'sauvegarde',
		'label' => 'Sauvegarde',
		'icon'  => '🛡',
		'items' => array(
			array(
				'title' => 'Snapshots cohérents avec vzdump',
				'text'  => 'L’outil intégré crée des sauvegardes cohérentes de VM et de conteneurs, en ligne, avec planification et stockages de destination multiples.',
			),
			array(
				'title' => 'Couplage avec Proxmox Backup Server',
				'text'  => 'Associé à Proxmox Backup Server, le cycle de sauvegarde devient incrémental et dédupliqué : moins de bande passante, moins d’espace consommé, et restauration à chaud des VM.',
			),
			array(
				'title' => 'Restauration granulaire',
				'text'  => 'Restaurez une VM complète, un conteneur ou seulement quelques fichiers depuis une archive, y compris pendant que la machine redémarre.',
			),
		),
	),
	array(
		'id'    => 'parefeu',
		'label' => 'Pare-feu',
		'icon'  => '⛨',
		'items' => array(
			array(
				'title' => 'Un pare-feu distribué',
				'text'  => 'Définissez vos règles une fois au niveau du cluster : elles sont appliquées par chaque hôte via iptables, jusqu’au niveau de chaque interface virtuelle.',
			),
			array(
				'title' => 'Macros, groupes et alias',
				'text'  => 'Groupes de sécurité réutilisables, macros pour les protocoles courants et alias d’adresses simplifient la gestion des politiques, en IPv4 comme en IPv6.',
			),
		),
	),
);

/* ---------------------------------------------------------------------------
 * Proxmox Backup Server — onglets (textes originaux)
 * ------------------------------------------------------------------------- */
$pmx_pbs_tabs = array(
	array(
		'id'    => 'backup',
		'label' => 'Sauvegarde',
		'icon'  => '🛡',
		'items' => array(
			array(
				'title' => 'Incrémentale et dédupliquée',
				'text'  => 'Seules les données réellement modifiées sont transférées, puis stockées en blocs uniques (taille fixe ou variable). Résultat : fenêtres de sauvegarde courtes, réseau préservé et espace disque économisé.',
			),
			array(
				'title' => 'Un moteur moderne',
				'text'  => 'Écrit en Rust et publié sous GNU AGPL, le serveur compresse avec ZSTD pour conjuguer vitesse et taux de compression élevé.',
			),
			array(
				'title' => 'Planification et rétention',
				'text'  => 'Programmez les sauvegardes de VM, conteneurs et hôtes physiques, puis laissez les politiques de rétention élaguer automatiquement les archives obsolètes.',
			),
		),
	),
	array(
		'id'    => 'architecture',
		'label' => 'Architecture',
		'icon'  => '🏗',
		'items' => array(
			array(
				'title' => 'Modèle client-serveur',
				'text'  => 'Les sources à protéger envoient leurs données à un serveur central qui gère les banques de données (datastores), les rétentions et les vérifications.',
			),
			array(
				'title' => 'Chiffrement côté client',
				'text'  => 'Les données sont chiffrées avant de quitter leur source : une sauvegarde reste illisible sans vos clés, même hébergée sur une infrastructure qui ne vous appartient pas.',
			),
			array(
				'title' => 'Synchronisation hors site',
				'text'  => 'Les Remotes et Sync Jobs répliquent vos banques de données vers un second site — à la demande ou planifiés — en ne transférant que les différences depuis la dernière synchronisation.',
			),
		),
	),
	array(
		'id'    => 'integrite',
		'label' => 'Intégrité & sécurité',
		'icon'  => '🔐',
		'items' => array(
			array(
				'title' => 'Chiffrement AES-256 et clé RSA',
				'text'  => 'Le chiffrement AES-256 en mode Galois/Counter garantit confidentialité et authenticité ; une clé maîtresse RSA protège les clés de chiffrement.',
			),
			array(
				'title' => 'Détection de l’altération silencieuse',
				'text'  => 'Sommes SHA-256 et index signés permettent de vérifier chaque archive et de repérer toute corruption progressive des supports (bit rot).',
			),
			array(
				'title' => 'Bouclier anti-rançongiciel',
				'text'  => 'Rôles et permissions stricts empêchent un compte compromis d’effacer ou de chiffrer l’historique des sauvegardes.',
			),
		),
	),
	array(
		'id'    => 'restauration',
		'label' => 'Restauration',
		'icon'  => '⟳',
		'items' => array(
			array(
				'title' => 'Restauration à chaud',
				'text'  => 'Une VM stockée sur Proxmox Backup Server redémarre presque immédiatement : les blocs nécessaires sont copiés en priorité pendant que la machine tourne déjà.',
			),
			array(
				'title' => 'Récupération fichier par fichier',
				'text'  => 'Un shell interactif et un catalogue d’archives permettent d’extraire précisément le dossier ou le fichier recherché, sans restaurer l’intégralité.',
			),
			array(
				'title' => 'Nettoyage automatique',
				'text'  => 'Le ramasse-miettes intégré libère l’espace des blocs devenus inutiles après élagage des anciennes sauvegardes.',
			),
		),
	),
	array(
		'id'    => 'gestion-pbs',
		'label' => 'Gestion',
		'icon'  => '⚙',
		'items' => array(
			array(
				'title' => 'Interface web intuitive',
				'text'  => 'La console graphique (port 8007) centralise banques de données, tâches, statistiques et journaux pour un suivi quotidien sans friction.',
			),
			array(
				'title' => 'CLI et API REST',
				'text'  => 'Toutes les opérations sont aussi réalisables en ligne de commande ou via l’API RESTful JSON, pour intégrer la sauvegarde à vos scripts.',
			),
		),
	),
	array(
		'id'    => 'integration',
		'label' => 'Intégration Proxmox VE',
		'icon'  => '⟷',
		'items' => array(
			array(
				'title' => 'Couple gagnant avec Proxmox VE',
				'text'  => 'Déclaré comme stockage de sauvegarde dans Proxmox VE (avec vérification d’empreinte de certificat), le serveur devient la cible naturelle des sauvegardes planifiées.',
			),
			array(
				'title' => 'Incrémental accéléré',
				'text'  => 'Grâce au suivi des blocs modifiés côté QEMU (dirty bitmaps), les sauvegardes incrémentales des VM n’analysent que ce qui a changé.',
			),
			array(
				'title' => 'Redémarrage immédiat',
				'text'  => 'La restauration en direct relance la VM depuis l’archive pendant que les données se synchronisent en arrière-plan.',
			),
		),
	),
	array(
		'id'    => 'bande',
		'label' => 'Bande (Tape)',
		'icon'  => '▦',
		'items' => array(
			array(
				'title' => 'Archivage sur bandes LTO',
				'text'  => 'Externalisez vos archives sur bandes LTO-5 et ultérieures (LTO-4 en lecture), avec chiffrement matériel et politiques de conservation.',
			),
			array(
				'title' => 'Gestion complète des médias',
				'text'  => 'L’outil pmtx pilote changeurs et bibliothèques ; un générateur d’étiquettes code-barres LTO facilite l’inventaire des cartouches.',
			),
		),
	),
);

/* ---------------------------------------------------------------------------
 * Proxmox Mail Gateway — onglets (textes originaux)
 * ------------------------------------------------------------------------- */
$pmx_pmg_tabs = array(
	array(
		'id'    => 'antispam',
		'label' => 'Anti-spam & antivirus',
		'icon'  => '✉',
		'items' => array(
			array(
				'title' => 'Un proxy devant votre messagerie',
				'text'  => 'Installé entre le pare-feu et le serveur de messagerie, Proxmox Mail Gateway analyse l’intégralité du trafic entrant et sortant avant de le laisser passer.',
			),
			array(
				'title' => 'Trois moteurs complémentaires',
				'text'  => 'Postfix (MTA) transporte les messages, ClamAV bloque pièces jointes infectées et liens malveillants référencés, tandis que SpamAssassin attribue à chaque email un score de spam fondé sur de nombreux tests.',
			),
			array(
				'title' => 'Filtrage en amont de la file d’attente',
				'text'  => 'Les courriers indésirables sont rejetés ou supprimés avant même d’atteindre vos serveurs : charge réduite, files propres et utilisateurs protégés.',
			),
		),
	),
	array(
		'id'    => 'filtrage',
		'label' => 'Méthodes de filtrage',
		'icon'  => '⚗',
		'items' => array(
			array(
				'title' => 'Vérification des destinataires',
				'text'  => 'Les messages destinés à des adresses inexistantes — l’essentiel du spam — sont rejetés dès le dialogue SMTP, ce qui élimine jusqu’à 90 % du trafic à analyser.',
			),
			array(
				'title' => 'SPF, DNSBL et SURBL',
				'text'  => 'Le contrôle des politiques d’envoi (SPF), des listes noires d’adresses IP (DNSBL) et des domaines contenus dans les URL (SURBL) bloque les sources connues de messages indésirables.',
			),
			array(
				'title' => 'Filtre bayésien auto-apprenant',
				'text'  => 'L’analyse statistique s’améliore à l’usage et affine la détection tout en limitant les faux positifs.',
			),
			array(
				'title' => 'Greylisting et listes personnalisées',
				'text'  => 'Le rejet temporaire des expéditeurs inconnus (greylisting) coupe environ la moitié du spam ; listes noires et blanches — y compris via groupes LDAP — vous donnent le dernier mot.',
			),
		),
	),
	array(
		'id'    => 'suivi',
		'label' => 'Suivi & journaux',
		'icon'  => '📈',
		'items' => array(
			array(
				'title' => 'Tracking Center',
				'text'  => 'Retracez le parcours complet de chaque message en quelques secondes grâce à quatre étapes de journaux corrélés — même sur des plateformes dépassant le million d’emails par jour.',
			),
			array(
				'title' => 'Une semaine d’historique et le temps réel',
				'text'  => 'Les journaux des sept derniers jours restent consultables, et un flux temps réel affiche les cent dernières lignes pour diagnostiquer un incident en direct.',
			),
		),
	),
	array(
		'id'    => 'cluster',
		'label' => 'Cluster haute disponibilité',
		'icon'  => '⟳',
		'items' => array(
			array(
				'title' => 'Un cluster applicatif',
				'text'  => 'Plusieurs passerelles forment un cluster synchronisé par tunnel VPN (maître et nœuds) : configuration mutualisée, tolérance aux pannes et montée en charge simple.',
			),
			array(
				'title' => 'Répartition de charge DNS',
				'text'  => 'Enregistrements MX multiples, round-robin DNS et PTR soigneusement renseignés assurent une distribution fluide du trafic entre les passerelles.',
			),
		),
	),
	array(
		'id'    => 'regles',
		'label' => 'Système de règles',
		'icon'  => '⛁',
		'items' => array(
			array(
				'title' => 'Un moteur orienté objet',
				'text'  => 'Les règles combinent des objets réutilisables : DE (expéditeur), À (destinataire), QUAND (plage horaire), QUOI (contenu) et ACTION (que faire du message), complétés par la direction du flux.',
			),
			array(
				'title' => 'Du simple au sophistiqué',
				'text'  => 'Blocage d’une pièce jointe exécutable, quarantaine ciblée, réécriture d’objet : les cas simples se configurent en quelques clics, les politiques complexes en combinant les objets.',
			),
		),
	),
);

  $pageTitle = 'Proxmox | IKA SOLUTION LTD';
  $pageDescription = 'Virtualisation open source avec Proxmox : consolidation de serveurs (KVM et LXC), sauvegardes dédupliquées et chiffrées, passerelle anti-spam et antivirus.';
  include 'header.php';
?>

<main class="bg-white pt-32">

  <!-- ===================== HERO ===================== -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-25" src="<?php echo pmx_h('assets/images/proxmox-hero.jpg'); ?>" alt="Infrastructure virtualisée Proxmox">
      <div class="absolute inset-0 bg-ikaBlueDark/80" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo pmx_h('index.php#expertises'); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>Retour aux expertises</a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200">Virtualisation open source</p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl">Proxmox : la plateforme de virtualisation sans coûts de licence.</h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85">IKA SOLUTION déploie et maintient la suite Proxmox — Virtual Environment, Backup Server et Mail Gateway — pour consolider vos serveurs, sécuriser vos sauvegardes et filtrer votre messagerie, avec des briques 100 % open source et un accompagnement local.</p>
        <div class="mt-8 flex flex-wrap gap-3">
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Virtual Environment</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Backup Server</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Mail Gateway</span>
        </div>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="#contact" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Parler à un expert Proxmox</a>
          <a href="#proxmox-ve" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Découvrir la suite</a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo pmx_h('assets/images/proxmox-hero.jpg'); ?>" alt="Salle serveur virtualisée sous Proxmox">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed">Open source</p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark">0 FCFA de licence</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== OPEN SOURCE + REPO ENTREPRISE ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <span class="flex h-16 w-16 items-center justify-center rounded-2xl bg-ikaRed text-2xl" aria-hidden="true">🛡</span>
        <div>
          <h3 class="text-2xl font-black">Libre et gratuit, avec un Repository Enterprise pour les entreprises.</h3>
          <p class="mt-3 text-sm leading-7 text-white/80">Proxmox est un logiciel libre et gratuit : aucune licence à payer, un code ouvert et auditable. Pour la production, Proxmox propose une souscription au Repository Enterprise qui offre des paquets stables et testés, ainsi qu'un support d'assistance dédié pour les entreprises.</p>
        </div>
        <a href="https://www.proxmox.com/en/proxmox-virtual-environment/pricing" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700">Découvrir les abonnements ↗</a>
      </div>
    </div>
  </section>

  <!-- ===================== PROXMOX VE ===================== -->
  <section id="proxmox-ve" class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Proxmox Virtual Environment</p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Tout votre datacenter virtuel dans une seule interface.</h2>
          <p class="mt-5 text-base leading-8 text-slate-600">Proxmox VE réunit sur une même plateforme deux technologies complémentaires : la virtualisation complète KVM et les conteneurs LXC. Machines virtuelles, réseaux, stockage, sauvegardes et haute disponibilité se gèrent depuis une interface web unique, sans agent à installer.</p>
          <p class="mt-4 text-base leading-8 text-slate-600">Chez IKA SOLUTION, nous l’utilisons pour consolider les serveurs de nos clients : moins de matériel, des ressources mutualisées et une administration simple à reprendre en main.</p>
          <div class="mt-6 flex flex-wrap items-center gap-6">
            <img class="h-8 w-auto opacity-60 transition hover:opacity-100" src="<?php echo pmx_h('assets/images/proxmox/logo-debian.png'); ?>" alt="Debian GNU/Linux" loading="lazy">
            <img class="h-11 w-auto opacity-60 transition hover:opacity-100" src="<?php echo pmx_h('assets/images/proxmox/logo-kvm.png'); ?>" alt="KVM — virtualisation complète" loading="lazy">
            <img class="h-9 w-auto opacity-60 transition hover:opacity-100" src="<?php echo pmx_h('assets/images/proxmox/logo-lxc.png'); ?>" alt="LXC — conteneurs Linux" loading="lazy">
          </div>
        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500">Proxmox VE — vue résumée d’un hôte</span>
          </div>
          <img class="block w-full" src="<?php echo pmx_h('assets/images/proxmox/proxmox-backup-server-dashboard.png'); ?>" alt="Interface web de Proxmox Virtual Environment" loading="lazy">
        </div>
      </div>

      <?php pmx_render_tabs( 've', $pmx_ve_tabs ); ?>
    </div>
  </section>

  <!-- ===================== CEPH ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <img class="h-12 w-auto" src="<?php echo pmx_h('assets/images/proxmox/logo-ceph.png'); ?>" alt="Ceph" loading="lazy">
        <div>
          <h3 class="text-2xl font-black">Stockage distribué Ceph, intégré à l’interface Proxmox.</h3>
          <p class="mt-3 text-sm leading-7 text-white/80">Auto-réparateur et sans point unique de défaillance, un cluster Ceph se déploie sur du matériel standard et grandit avec vos besoins — idéal pour des infrastructures hyperconvergées.</p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="https://pve.proxmox.com/wiki/Deploy_Hyper-Converged_Ceph_Cluster" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700">Guide cluster hyperconvergé</a>
          <a href="https://www.proxmox.com/en/downloads/item/proxmox-ve-ceph-benchmark-2020-09" target="_blank" rel="noopener" class="inline-flex rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Benchmark Ceph 2020/09</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== PROXMOX BACKUP SERVER ===================== -->
  <section id="proxmox-backup" class="relative overflow-hidden bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-20" src="<?php echo pmx_h('assets/images/proxmox-backup.jpg'); ?>" alt="Protection des données">
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Proxmox Backup Server</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">Des sauvegardes dédupliquées, chiffrées et restaurées en un temps record.</h2>
        <div class="mt-6 grid max-w-3xl gap-4 text-base leading-8 text-white/85">
          <p>Proxmox Backup Server protège machines virtuelles, conteneurs et hôtes physiques. Ses sauvegardes incrémentales dédupliquées réduisent fortement le trafic réseau et l’espace de stockage nécessaire, tout en accélérant la vérification et la restauration.</p>
          <p>Chez IKA SOLUTION, nous le couplons systématiquement à Proxmox VE : rétention pilotée par politiques, réplication hors site et restauration à chaud relancent une VM en quelques minutes, pas en heures.</p>
        </div>
        <a href="#contact" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Sécuriser mes sauvegardes</a>
      </div>
      <div class="hidden lg:block">
        <img class="h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo pmx_h('assets/images/proxmox-backup.jpg'); ?>" alt="Protection des données avec Proxmox Backup Server">
      </div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Fonctionnalités</p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Sauvegarder, vérifier, restaurer : le cycle complet.</h2>
        <p class="mt-5 text-base leading-8 text-slate-600">Parcourez les capacités de Proxmox Backup Server : déduplication, architecture, intégrité des données, restauration, administration, intégration à Proxmox VE et archivage sur bande.</p>
      </div>

      <div class="reveal mt-10 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-500"></span>
          <span class="ml-3 text-xs font-bold text-slate-500">Proxmox Backup Server — tableau de bord</span>
        </div>
        <img class="block w-full" src="<?php echo pmx_h('assets/images/proxmox/proxmox-backup-server-dashboard.png'); ?>" alt="Tableau de bord de Proxmox Backup Server" loading="lazy">
      </div>

      <?php pmx_render_tabs( 'pbs', $pmx_pbs_tabs ); ?>
    </div>
  </section>

  <!-- ===================== PROXMOX MAIL GATEWAY ===================== -->
  <section id="proxmox-mail-gateway" class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Proxmox Mail Gateway</p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Un bouclier open source devant votre messagerie.</h2>
          <div class="mt-5 grid gap-4 text-base leading-8 text-slate-600">
            <p>Proxmox Mail Gateway inspecte l’ensemble des emails entrants et sortants avant qu’ils n’atteignent vos utilisateurs : spams, virus, phishing et chevaux de Troie sont bloqués à la frontière du réseau.</p>
            <p>La passerelle s’administre depuis une interface web claire et se déploie en cluster pour suivre la volumétrie de votre organisation.</p>
          </div>
          <div class="mt-6 flex flex-wrap gap-3">
            <span class="rounded-full bg-ikaSoft px-4 py-2 text-xs font-black text-ikaBlue">Postfix MTA</span>
            <span class="rounded-full bg-ikaSoft px-4 py-2 text-xs font-black text-ikaBlue">ClamAV</span>
            <span class="rounded-full bg-ikaSoft px-4 py-2 text-xs font-black text-ikaBlue">SpamAssassin</span>
            <span class="rounded-full bg-ikaSoft px-4 py-2 text-xs font-black text-ikaBlue">Cluster HA</span>
          </div>
          <a href="https://pmg.proxmox.com/pmg-docs/pmg-admin-guide.html#chapter_mailfilter" target="_blank" rel="noopener" class="mt-7 inline-flex items-center gap-2 text-sm font-black text-ikaRed transition hover:text-red-700">Documentation du filtrage PMG <span aria-hidden="true">→</span></a>
        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500">Positionnement de la passerelle dans le réseau</span>
          </div>
          <img class="block w-full" src="<?php echo pmx_h('assets/images/proxmox/proxmox-mail-gateway-infrastructure.png'); ?>" alt="Schéma d’architecture : Proxmox Mail Gateway entre le pare-feu et le serveur de messagerie" loading="lazy">
        </div>
      </div>

      <?php pmx_render_tabs( 'pmg', $pmx_pmg_tabs ); ?>
    </div>
  </section>

  <!-- ===================== VOTRE PROJET PROXMOX ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 lg:grid-cols-3">
        <article class="reveal flex h-full flex-col rounded-2xl bg-white p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">01</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Audit & dimensionnement</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Inventaire de vos serveurs, estimation des ressources et architecture cible : nous posons des fondations réalistes avant toute migration.</p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-white p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-lg font-black text-white">02</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Déploiement & migration</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Installation du cluster, migration des machines existantes, configuration du stockage, des sauvegardes et de la messagerie, sans coupure majeure.</p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-white p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">03</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Exploitation & formation</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Supervision, mises à jour, documentation et transfert de compétences pour que vos équipes pilotent la plateforme en autonomie.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ===================== CONTACT ===================== -->
  <section id="contact" class="bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Contact</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">Parlez-nous de votre projet Proxmox.</h2>
        <p class="mt-5 max-w-xl text-base leading-8 text-white/85">Virtualisation des serveurs, sauvegardes dédupliquées ou protection de la messagerie : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.</p>
      </div>
      <form class="relative grid gap-4 rounded-[2rem] bg-white p-7 text-ikaInk shadow-premium sm:p-8" action="contact-submit.php" method="post">
        <input type="hidden" name="type" value="contact">
        <input type="hidden" name="redirect" value="proxmox.php#contact">
        <input type="hidden" name="page" value="Proxmox">
        <input type="hidden" name="form_time" value="<?= time() ?>">
        <div class="absolute left-[-9999px] top-auto h-px w-px overflow-hidden" aria-hidden="true">
          <label>Ne pas remplir ce champ <input type="text" name="site_web" tabindex="-1" autocomplete="off" value=""></label>
        </div>
        <?php if (isset($_GET['mail'], $_GET['notice'])): ?>
          <div class="rounded-2xl <?= $_GET['mail'] === 'success' ? 'bg-green-50 text-green-800' : 'bg-red-50 text-red-800' ?> p-4 text-sm font-bold">
            <?= htmlspecialchars((string) $_GET['notice'], ENT_QUOTES, 'UTF-8') ?>
          </div>
        <?php endif; ?>
        <div class="grid gap-4 sm:grid-cols-2">
          <label class="grid gap-2 text-sm font-bold text-slate-700">Nom
            <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="nom" type="text" placeholder="Votre nom" required>
          </label>
          <label class="grid gap-2 text-sm font-bold text-slate-700">Téléphone
            <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="telephone" type="tel" placeholder="+226">
          </label>
        </div>
        <label class="grid gap-2 text-sm font-bold text-slate-700">Email
          <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="email" type="email" placeholder="vous@entreprise.com" required>
        </label>
        <label class="grid gap-2 text-sm font-bold text-slate-700">Solution concernée
          <select class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="besoin">
            <option>Proxmox Virtual Environment (virtualisation)</option>
            <option>Proxmox Backup Server (sauvegarde)</option>
            <option>Proxmox Mail Gateway (sécurité messagerie)</option>
            <option>Autre demande liée à Proxmox</option>
          </select>
        </label>
        <label class="grid gap-2 text-sm font-bold text-slate-700">Message
          <textarea class="min-h-28 rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="message" placeholder="Décrivez votre projet" required></textarea>
        </label>
        <button class="h-10 w-fit whitespace-nowrap rounded-full bg-ikaRed px-4 text-xs font-extrabold text-white shadow-clean transition hover:bg-red-700" type="submit">Envoyer la demande</button>
      </form>
    </div>
  </section>

</main>

<?php include 'footer.php'; ?>
