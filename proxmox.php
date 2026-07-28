<?php
  $pageTitle = 'Proxmox | IKA SOLUTION LTD';
  $pageDescription = 'Proxmox Virtual Environment et Proxmox Backup Server : virtualisation d\'entreprise open source, KVM, conteneurs LXC, cluster haute disponibilité, stockage défini par logiciel et sauvegarde dédupliquée.';

  function p($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
  }

  // --- Proxmox Virtual Environment : onglets de fonctionnalités ---
  $veTabs = [
    [
      'id' => 'kvm',
      'label' => 'KVM & Conteneurs',
      'icon' => '▢',
      'items' => [
        [
          'title' => 'Virtualisation de serveur',
          'text' => 'Proxmox VE est basé sur Debian GNU/Linux et utilise un noyau Linux personnalisé. Le code source est libre, publié sous la licence publique générale GNU Affero, v3 (GNU AGPL, v3) : vous êtes libre d\'utiliser le logiciel, d\'inspecter le code source à tout moment et de contribuer au projet. L\'open source garantit un accès complet à toutes les fonctionnalités, ainsi qu\'un haut niveau de fiabilité et de sécurité.'
        ],
        [
          'title' => 'Machine virtuelle basée sur le noyau (KVM)',
          'text' => 'KVM est la technologie de virtualisation Linux leader de l\'industrie pour une virtualisation complète. Ce module de noyau s\'exécute avec des performances quasi natives sur tout matériel x86 compatible (Intel VT-x ou AMD-V). Vous pouvez exécuter Windows et Linux sur des VM dotées d\'un matériel privé virtualisé (carte réseau, disque, carte graphique). Proxmox VE inclut le support KVM depuis 2008.'
        ],
        [
          'title' => 'Conteneurs Linux (LXC)',
          'text' => 'La virtualisation basée sur conteneurs est une alternative légère à la virtualisation complète car elle partage le noyau du système hôte. LXC est un environnement de virtualisation au niveau du système d\'exploitation permettant d\'exécuter plusieurs systèmes Linux isolés sur un seul hôte, via une API puissante et des outils simples.'
        ]
      ]
    ],
    [
      'id' => 'management',
      'label' => 'Gestion',
      'icon' => '⚙',
      'items' => [
        [
          'title' => 'Gestion centrale',
          'text' => 'Vous pouvez démarrer avec un seul nœud, puis évoluer vers un grand nombre de nœuds en cluster. La pile de cluster est entièrement intégrée et livrée avec l\'installation par défaut. Toutes les tâches du centre de données virtuel se gèrent depuis l\'interface Web centrale.'
        ],
        [
          'title' => 'Interface de gestion basée sur le Web',
          'text' => 'Effectuez toutes les tâches via l\'interface graphique (GUI) intégrée, sans outil séparé. Basée sur le framework JavaScript ExtJS, accessible depuis n\'importe quel navigateur moderne. Elle fournit l\'historique des tâches et les journaux système de chaque nœud (sauvegardes, migration en direct, stockage défini par logiciel, activités de haute disponibilité).'
        ],
        [
          'title' => 'Interface de ligne de commande (CLI)',
          'text' => 'Pour les utilisateurs avancés habitués au shell Unix ou à Windows PowerShell, Proxmox VE fournit une CLI pour gérer tous les composants, avec complétion intelligente des onglets et documentation complète sous forme de pages de manuel UNIX.'
        ],
        [
          'title' => 'Proxmox VE Mobile',
          'text' => 'Accédez à Proxmox VE sur mobile via l\'application Android (framework Flutter) ou la version mobile HTML5 de l\'interface Web. Gérez votre cluster, vos nœuds, vos VM et vos conteneurs en déplacement, y compris l\'accès à la console SPICE et HTML5.'
        ],
        [
          'title' => 'Conception multi-maître unique',
          'text' => 'Effectuez des tâches de maintenance à l\'échelle du cluster depuis n\'importe quel nœud. L\'interface Web vous donne un aperçu clair de tous vos invités KVM et conteneurs Linux. Aucun besoin d\'installer un serveur de gestion séparé, complexe et coûteux.'
        ],
        [
          'title' => 'Système de fichiers de cluster (pmxcfs)',
          'text' => 'Proxmox VE utilise le système de fichiers de cluster unique (pmxcfs), basé sur une base de données. Il synchronise les fichiers de configuration via Corosync, répliqués en temps réel sur tous les nœuds. Stockage jusqu\'à 30 Mo en RAM — largement suffisant pour des milliers de VM. Proxmox VE est la seule plate-forme utilisant ce système.'
        ],
        [
          'title' => 'Migration en direct / en ligne',
          'text' => 'Déplacez des machines virtuelles en cours d\'exécution d\'un nœud à un autre, sans aucun temps d\'arrêt ni effet notable pour l\'utilisateur final. Lancée depuis l\'interface Web ou la CLI, elle minimise les interruptions lors des maintenances.'
        ],
        [
          'title' => 'API REST',
          'text' => 'Proxmox VE utilise une API RESTful avec JSON comme format principal, formellement définie via le schéma JSON. Cela permet une intégration rapide et facile pour les outils de gestion tiers, tels que les environnements d\'hébergement personnalisés.'
        ],
        [
          'title' => 'Administration basée sur les rôles',
          'text' => 'Définissez un accès granulaire à tous les objets (VM, stockage, nœuds) via le système d\'autorisations basé sur les rôles (ACL). Chaque autorisation spécifie un sujet (groupe d\'utilisateurs ou jeton d\'API) et un rôle sur un chemin précis.'
        ],
        [
          'title' => 'Domaines d\'authentification',
          'text' => 'Proxmox VE prend en charge plusieurs sources d\'authentification : Linux PAM, serveur d\'authentification Proxmox VE intégré, LDAP, Microsoft Active Directory et OpenID Connect.'
        ]
      ]
    ],
    [
      'id' => 'ha',
      'label' => 'Cluster HA',
      'icon' => '⟳',
      'items' => [
        [
          'title' => 'Cluster haute disponibilité (HA)',
          'text' => 'Un cluster Proxmox VE multi-nœuds permet de créer des serveurs virtuels hautement disponibles. Le cluster HA repose sur des technologies Linux HA éprouvées, fournissant un service HA stable et fiable.'
        ],
        [
          'title' => 'Gestionnaire Proxmox VE HA',
          'text' => 'Le gestionnaire de ressources surveille toutes les VM et tous les conteneurs du cluster et entre automatiquement en action si l\'un d\'entre eux tombe en panne. Prêt à l\'emploi, sans configuration. La clôture basée sur le chien de garde simplifie le déploiement. L\'ensemble du cluster HA se configure depuis l\'interface Web.'
        ],
        [
          'title' => 'Simulateur Proxmox VE HA',
          'text' => 'Proxmox VE inclut un simulateur HA pour tester le comportement d\'un cluster réel à 3 nœuds avec 6 machines virtuelles. Prêt à l\'emploi, il aide à apprendre et comprendre le fonctionnement de Proxmox VE HA.'
        ]
      ]
    ],
    [
      'id' => 'network',
      'label' => 'Réseau',
      'icon' => '⇄',
      'items' => [
        [
          'title' => 'Réseau ponté',
          'text' => 'Proxmox VE utilise un modèle de réseau ponté : chaque hôte peut avoir jusqu\'à 4 094 ponts, comme des commutateurs physiques implémentés dans le logiciel. Les VM partagent un pont comme si leurs câbles étaient branchés sur le même commutateur. Pour plus de flexibilité, les VLAN (IEEE 802.1q) et la liaison/agrégation de réseau sont possibles.'
        ],
        [
          'title' => 'Open vSwitch (OVS)',
          'text' => 'Pour des besoins plus spécifiques, Proxmox VE prend en charge Open vSwitch comme alternative aux ponts, liens et interfaces VLAN Linux. OVS fournit des fonctionnalités avancées : support RSTP, VXLAN, OpenFlow, et plusieurs VLAN sur un seul pont.'
        ]
      ]
    ],
    [
      'id' => 'storage',
      'label' => 'Stockage',
      'icon' => '▤',
      'items' => [
        [
          'title' => 'Options de stockage flexibles',
          'text' => 'Le modèle de stockage est très flexible : les images de VM peuvent être stockées sur un ou plusieurs stockages locaux ou partagés (NFS, SAN), sans limite. Vous pouvez configurer autant de stockages que souhaité et utiliser toutes les technologies Debian. L\'avantage du stockage partagé est la migration en direct sans temps d\'arrêt.'
        ],
        [
          'title' => 'Stockage réseau pris en charge',
          'text' => 'Groupe LVM (avec cibles iSCSI), cible iSCSI, partage NFS, SMB/CIFS, Ceph RBD, directement vers iSCSI LUN, GlusterFS, CephFS.'
        ],
        [
          'title' => 'Stockage local pris en charge',
          'text' => 'Groupe LVM, répertoire (sur un système de fichiers existant) et ZFS.'
        ]
      ]
    ],
    [
      'id' => 'backup',
      'label' => 'Sauvegarde',
      'icon' => '↺',
      'items' => [
        [
          'title' => 'Restauration de sauvegarde',
          'text' => 'Les sauvegardes sont une exigence de base. Proxmox VE fournit une solution entièrement intégrée exploitant chaque stockage et chaque type d\'invité. Les sauvegardes se lancent via l\'interface graphique ou l\'outil vzdump (CLI). Ce sont toujours des sauvegardes complètes : configuration des VM/conteneurs et toutes les données.'
        ],
        [
          'title' => 'Sauvegarde planifiée',
          'text' => 'Les tâches de sauvegarde peuvent être planifiées pour s\'exécuter automatiquement à des jours et heures spécifiques, pour des nœuds et systèmes invités sélectionnables.'
        ],
        [
          'title' => 'Stockage de sauvegarde',
          'text' => 'La sauvegarde en direct KVM fonctionne pour tous les types de stockage (NFS, iSCSI LUN, Ceph RBD). Le format de sauvegarde Proxmox VE est optimisé pour stocker rapidement et efficacement (fichiers clairsemés, données hors service, E/S minimisées).'
        ],
        [
          'title' => 'Restauration de fichier unique',
          'text' => 'Recherchez et restaurez en toute sécurité des fichiers ou répertoires individuels à partir d\'une sauvegarde de VM ou de conteneur, directement depuis l\'interface Web.'
        ],
        [
          'title' => 'Restauration en direct',
          'text' => 'Pour les sauvegardes de VM stockées sur Proxmox Backup Server, la restauration en direct minimise le temps d\'arrêt : la VM démarre dès que la restauration commence, les données étant copiées en arrière-plan en priorisant les blocs activement accédés.'
        ]
      ]
    ],
    [
      'id' => 'firewall',
      'label' => 'Pare-feu',
      'icon' => '🛡',
      'items' => [
        [
          'title' => 'Pare-feu Proxmox VE',
          'text' => 'Le pare-feu intégré offre un moyen simple de protéger votre infrastructure. Entièrement personnalisable via l\'interface graphique ou la CLI. Configurez des règles pour tous les hôtes d\'un cluster ou pour les VM et conteneurs uniquement. Fonctionnalités : macros de pare-feu, groupes de sécurité, ensembles d\'adresses IP et alias.'
        ],
        [
          'title' => 'Pare-feu distribué',
          'text' => 'Toute la configuration est stockée dans le système de fichiers du cluster ; le pare-feu basé sur iptables s\'exécute sur chaque nœud, assurant une isolation complète entre les machines virtuelles. Sa nature distribuée offre une bande passante bien supérieure à une solution centralisée.'
        ],
        [
          'title' => 'IPv4 et IPv6',
          'text' => 'Le pare-feu prend entièrement en charge IPv4 et IPv6. La prise en charge d\'IPv6 est entièrement transparente et le trafic des deux protocoles est filtré par défaut : aucun besoin de maintenir un ensemble de règles différent pour IPv6.'
        ]
      ]
    ]
  ];

  // --- Proxmox Backup Server : onglets de fonctionnalités ---
  $pbsTabs = [
    [
      'id' => 'pbs-backup',
      'label' => 'Sauvegarde',
      'icon' => '↺',
      'items' => [
        [
          'title' => 'Open source',
          'text' => 'Proxmox Backup est une solution autonome. La nature open source de la pile garantit un produit sécurisé et flexible auquel vous pouvez faire confiance. Le code source est libre, sous licence GNU Affero General Public License, v3 (GNU AGPL, v3).'
        ],
        [
          'title' => 'Incrémental et déduplication',
          'text' => 'Les sauvegardes sont envoyées de manière incrémentielle, puis dédupliquées. Seules les modifications sont lues et envoyées, réduisant l\'espace de stockage et l\'impact réseau. La couche de déduplication réduit les données dupliquées et supporte les blocs de taille fixe ou variable selon le type de données.'
        ],
        [
          'title' => 'Performance',
          'text' => 'Toute la pile logicielle est écrite en Rust, un langage moderne, rapide et économe en mémoire. Rust offre une vitesse élevée et une efficacité mémoire, grâce notamment à l\'absence d\'exécution et de ramasse-miettes, avec sécurité de la mémoire et des threads.'
        ],
        [
          'title' => 'Compression',
          'text' => 'Proxmox utilise la compression ultra-rapide Zstandard (ZSTD), capable de compresser plusieurs giga-octets de données par seconde. ZSTD se caractérise par un taux de compression élevé et une vitesse de compression très rapide.'
        ]
      ]
    ],
    [
      'id' => 'pbs-architecture',
      'label' => 'Architecture',
      'icon' => '▦',
      'items' => [
        [
          'title' => 'Modèle client-serveur',
          'text' => 'La solution utilise un modèle client-serveur, permettant à plusieurs hôtes non liés d\'utiliser le même serveur. Le serveur stocke les données et fournit une API pour créer et gérer les magasins de données. Le client fonctionne avec la plupart des distributions Linux modernes et chiffre les données côté client avant qu\'elles n\'atteignent le serveur.'
        ],
        [
          'title' => 'Synchronisation à distance',
          'text' => 'Proxmox Backup Server permet d\'extraire ou de synchroniser des banques de données vers d\'autres emplacements pour la redondance — une méthode efficace hors site. Seules les modifications depuis la synchronisation précédente sont transférées, via les Remotes et les Sync Jobs (planifiables ou manuels).'
        ]
      ]
    ],
    [
      'id' => 'pbs-security',
      'label' => 'Intégrité & Sécurité',
      'icon' => '🛡',
      'items' => [
        [
          'title' => 'Chiffrement',
          'text' => 'Tout le trafic client-serveur peut être chiffré. Pour des performances élevées, le chiffrement authentifié est effectué côté client avec AES-256 en mode Galois/Counter (GCM). Les données sont chiffrées avant d\'atteindre le serveur. Une clé principale (paire RSA publique/privée) sécurise les clés de sauvegarde, et la clé secrète peut être imprimée pour être à l\'abri d\'un sinistre.'
        ],
        [
          'title' => 'Protection contre les rançongiciels',
          'text' => 'Une attaque de rançongiciel est un désastre pour toute entreprise. Des sauvegardes fiables et une récupération rapide limitent les dégâts. PBS inclut un contrôle d\'accès précis, la vérification de l\'intégrité des données et la création de sauvegardes hors site via la synchronisation à distance et la sauvegarde sur bande.'
        ],
        [
          'title' => 'Rôles utilisateurs et autorisations',
          'text' => 'PBS protège les données contre les accès non autorisés et limite chaque utilisateur au seul niveau d\'accès nécessaire. Domaines d\'authentification : Linux PAM, OpenID Connect et serveur d\'authentification Proxmox Backup. Un large éventail de rôles définit exactement ce que chaque utilisateur peut faire.'
        ],
        [
          'title' => 'Algorithme de somme de contrôle',
          'text' => 'PBS utilise SHA-256 pour garantir l\'exactitude et la cohérence des données. Chaque sauvegarde crée un fichier manifeste (index.json) listant les fichiers, leurs tailles et sommes de contrôle. Une vérification régulière détecte la pourriture des bits. La somme de contrôle sert aussi à la déduplication entre machines.'
        ]
      ]
    ],
    [
      'id' => 'pbs-restore',
      'label' => 'Restauration',
      'icon' => '⤓',
      'items' => [
        [
          'title' => 'Restauration rapide',
          'text' => 'PBS est ultra-rapide : en cas de catastrophe, vous récupérez une machine virtuelle, une archive ou même un seul fichier en quelques secondes. La restauration simple et rapide via l\'interface graphique atténue tout stress lors d\'un incident.'
        ],
        [
          'title' => 'Récupération granulaire',
          'text' => 'Pourquoi restaurer toutes les données si seules certaines sont nécessaires ? PBS fournit un catalogue d\'instantanés pour la navigation : restaurer des fichiers, répertoires ou archives uniques, un shell de récupération interactif pour quelques fichiers, et une récupération de place régulière pour libérer de l\'espace.'
        ]
      ]
    ],
    [
      'id' => 'pbs-management',
      'label' => 'Gestion',
      'icon' => '⚙',
      'items' => [
        [
          'title' => 'Gestion centrale',
          'text' => 'L\'administration est si simple qu\'aucun administrateur de sauvegarde dédié n\'est nécessaire. Le centre Web permet de configurer et déployer les sauvegardes, surveiller les tâches, journaux et ressources, et gérer utilisateurs, autorisations et banques de données. Intuitif : même le service d\'assistance peut effectuer des récupérations.'
        ],
        [
          'title' => 'Interface utilisateur Web',
          'text' => 'Effectuez toutes les tâches d\'administration via votre navigateur (https://votre-adresse:8007). Le tableau de bord offre un aperçu rapide, gère les banques de données, parcourt les sauvegardes de fichiers, surveille les tâches, gère utilisateurs et abonnements, et fournit une console HTML5 sécurisée.'
        ],
        [
          'title' => 'Interface de ligne de commande (CLI)',
          'text' => 'Pour les utilisateurs avancés, Proxmox fournit une CLI pour accomplir des tâches spéciales ou très avancées, avec complétion intelligente des onglets et documentation complète sous forme de pages de manuel UNIX.'
        ],
        [
          'title' => 'API REST',
          'text' => 'Proxmox Backup Server utilise une API RESTful avec JSON comme format principal, formellement définie via le schéma JSON. Cela permet une intégration rapide et facile pour les outils de gestion tiers.'
        ]
      ]
    ],
    [
      'id' => 'pbs-integration',
      'label' => 'Intégration Proxmox VE',
      'icon' => '⇄',
      'items' => [
        [
          'title' => 'Intégration étroite avec Proxmox VE',
          'text' => 'L\'intégration étroite avec Proxmox VE fait de PBS un excellent choix pour des sauvegardes transparentes des VM (bitmaps sales QEMU) et des conteneurs, même entre sites distants. Après l\'installation de PBS sur un hôte dédié, ajoutez le stockage de sauvegarde comme nouvelle cible de stockage sur le nœud PVE (minimum pve-manager 6.2-9). La sécurité est assurée par une empreinte du certificat.'
        ],
        [
          'title' => 'Restauration en direct',
          'text' => 'Restaurez des fichiers uniques depuis une sauvegarde de VM ou de conteneur, ou démarrez une VM dès que la restauration commence grâce à la fonctionnalité de restauration en direct.'
        ]
      ]
    ],
    [
      'id' => 'pbs-tape',
      'label' => 'Bande',
      'icon' => '▤',
      'items' => [
        [
          'title' => 'Sauvegarde sur bande',
          'text' => 'Le système de sauvegarde sur bande offre un moyen simple de copier le contenu d\'une banque de données sur des bandes et de le restaurer avec la granularité du jeu de supports. La bande magnétique numérique reste un moyen simple et économique d\'archiver de grandes quantités de données — un élément logique de tout plan de sauvegarde d\'entreprise.'
        ],
        [
          'title' => 'Avantages du stockage sur bande',
          'text' => 'Prise en charge de LTO-5 et versions ultérieures (support optimal de LTO-4), avec chiffrement matériel. Politiques de conservation flexibles (toujours/nunca recycler, ou après un événement du calendrier). Support de divers chargeurs automatiques via l\'outil pmtx (mtx réécrit en Rust). Paramétrage complet via l\'interface Web.'
        ],
        [
          'title' => 'Générateur de codes-barres LTO',
          'text' => 'Pour identifier facilement les cartouches de bande, notamment dans une bibliothèque, une petite application Web permet d\'imprimer les étiquettes de codes à barres : le Proxmox LTO Barcode Generator.'
        ]
      ]
    ]
  ];

  include 'header.php';
?>

<main class="bg-white pt-32">

  <!-- HERO -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-25" src="assets/images/proxmox-hero.jpg" alt="Virtualisation Proxmox">
      <div class="absolute inset-0 bg-ikaBlueDark/80"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="index.php#expertises" class="inline-flex rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Retour aux expertises</a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200">Virtualisation open source d'entreprise</p>
        <h1 class="mt-4 text-5xl font-black leading-tight tracking-normal sm:text-6xl">Proxmox</h1>
        <p class="mt-4 text-2xl font-black leading-tight text-white/90">Calcul, réseau et stockage dans une seule solution.</p>
        <p class="mt-6 max-w-3xl text-base leading-8 text-white/80">Proxmox Virtual Environment et Proxmox Backup Server : une plate-forme complète, 100 % logicielle et open source, pour virtualiser votre infrastructure, optimiser vos ressources et sécuriser vos données — de la machine virtuelle à la sauvegarde dédupliquée.</p>
        <div class="mt-8 flex flex-wrap gap-3">
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">KVM & LXC</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Cluster HA</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Stockage Ceph</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Backup Server</span>
        </div>
        <div class="mt-9 flex flex-wrap gap-4">
          <a href="#proxmox-ve" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Découvrir Proxmox VE</a>
          <a href="#contact" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-extrabold text-white transition hover:bg-white hover:text-ikaBlue">Demander une présentation</a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem] object-cover shadow-premium" src="assets/images/proxmox-hero.jpg" alt="Infrastructure virtualisée Proxmox">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed">Open source</p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark">GNU AGPL, v3</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- INTRO PROXMOX VE -->
  <section id="proxmox-ve" class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-[.85fr_1.15fr] lg:items-start">
        <div>
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Proxmox Virtual Environment</p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Une plate-forme de gestion de serveur open source, complète.</h2>
          <div class="mt-8 flex flex-wrap gap-3">
            <span class="rounded-2xl bg-ikaSoft px-5 py-3 text-sm font-black text-ikaBlue">Hyperviseur KVM</span>
            <span class="rounded-2xl bg-ikaSoft px-5 py-3 text-sm font-black text-ikaBlue">Conteneurs LXC</span>
            <span class="rounded-2xl bg-ikaSoft px-5 py-3 text-sm font-black text-ikaBlue">Réseau & stockage SDS</span>
          </div>
          <div class="mt-8">
            <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-400">Technologies intégrées</p>
            <div class="mt-4 flex flex-wrap items-center gap-6">
              <img class="h-8 w-auto opacity-60 transition hover:opacity-100" src="https://proxmox.com/images/proxmox/logos/debian-logo-100.png" alt="Debian GNU/Linux" loading="lazy">
              <img class="h-11 w-auto opacity-60 transition hover:opacity-100" src="https://proxmox.com/images/proxmox/logos/kvm-logo-200.png" alt="KVM (Kernel-based Virtual Machine)" loading="lazy">
              <img class="h-9 w-auto opacity-60 transition hover:opacity-100" src="https://proxmox.com/images/proxmox/logos/lxc-containers-logo-170.png" alt="LXC — Linux Containers" loading="lazy">
            </div>
          </div>
        </div>
        <div class="space-y-5 text-base leading-8 text-slate-600">
          <p>Proxmox VE est une plate-forme de gestion de serveur open source complète pour la virtualisation d'entreprise. Elle intègre étroitement l'hyperviseur KVM et les conteneurs Linux (LXC), ainsi que des fonctionnalités de stockage et de mise en réseau définies par logiciel, sur une plate-forme unique. Grâce à l'interface utilisateur Web intégrée, vous gérez facilement vos machines virtuelles et conteneurs, la haute disponibilité des clusters et les outils de reprise après sinistre.</p>
          <p>Les fonctionnalités de classe entreprise et l'orientation 100 % logicielle en font le choix idéal pour virtualiser votre infrastructure, optimiser les ressources existantes et augmenter l'efficacité avec un minimum de dépenses. Virtualisez même les charges de travail Linux et Windows les plus exigeantes, et faites évoluer dynamiquement le calcul et le stockage à mesure que vos besoins augmentent.</p>
        </div>
      </div>
      <!-- Capture : tableau de bord Proxmox VE -->
      <figure class="mt-4 overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-clean">
        <figcaption class="flex items-center gap-1.5 border-b border-slate-100 bg-ikaSoft px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-400"></span>
          <span class="ml-3 text-xs font-bold text-slate-500">Proxmox VE — Tableau de bord de l'hôte</span>
        </figcaption>
        <img class="block w-full" src="https://www.proxmox.com/images/proxmox/screenshots/Proxmox-VE-8-1-Host-Summary-Secure-Boot.png#joomlaImage://local-images/proxmox/screenshots/Proxmox-VE-8-1-Host-Summary-Secure-Boot.png?width=1920&height=1080" alt="Tableau de bord Proxmox Virtual Environment (résumé de l'hôte)" loading="lazy">
      </figure>
    </div>
  </section>

  <!-- FONCTIONNALITÉS PROXMOX VE (ONGLETS) -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Liste des fonctionnalités</p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Tout ce que Proxmox VE met à votre disposition.</h2>
        <p class="mt-5 text-base leading-8 text-slate-600">Sélectionnez un domaine pour parcourir les fonctionnalités détaillées : virtualisation, gestion, haute disponibilité, réseau, stockage, sauvegarde et pare-feu.</p>
      </div>

      <!-- Navigation par onglets -->
      <div class="mt-10 flex flex-wrap gap-2.5" role="tablist" aria-label="Fonctionnalités Proxmox VE">
        <?php foreach ($veTabs as $index => $tab): ?>
          <button type="button" class="ve-tab rounded-full px-5 py-3 text-sm font-extrabold transition focus:outline-none focus:ring-4 focus:ring-ikaRed/25 <?= $index === 0 ? 'bg-ikaBlueDark text-white shadow-clean' : 'bg-white text-ikaBlueDark hover:bg-ikaBlueDark hover:text-white' ?>" data-ve-tab="<?= p($tab['id']) ?>" role="tab" aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
            <span class="mr-1.5"><?= p($tab['icon']) ?></span><?= p($tab['label']) ?>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- Contenu des onglets -->
      <?php foreach ($veTabs as $index => $tab): ?>
        <div id="ve-panel-<?= p($tab['id']) ?>" class="ve-panel mt-10 <?= $index === 0 ? '' : 'hidden' ?>" role="tabpanel">
          <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($tab['items'] as $i => $item): ?>
              <article class="rounded-2xl bg-white p-7 shadow-clean">
                <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-ikaBlue text-sm font-black text-white"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                <h3 class="mt-5 text-lg font-black leading-snug text-ikaBlueDark"><?= p($item['title']) ?></h3>
                <p class="mt-3 text-sm leading-7 text-slate-600"><?= p($item['text']) ?></p>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- CEPH -->
  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="overflow-hidden rounded-[2rem] bg-ikaBlueDark text-white shadow-premium">
        <div class="grid gap-0 lg:grid-cols-2">
          <div class="p-8 sm:p-12">
            <div class="flex items-center gap-4">
              <img class="h-12 w-auto" src="https://proxmox.com/images/proxmox/logos/Ceph_logo_stacked_220.png" alt="Ceph" loading="lazy">
              <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Stockage défini par logiciel</p>
            </div>
            <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">Ceph, intégré nativement à Proxmox VE.</h2>
            <p class="mt-5 text-base leading-8 text-white/80">Ceph est un magasin d'objets distribué open source et un système de fichiers conçu pour d'excellentes performances, fiabilité et évolutivité. Proxmox VE intègre entièrement Ceph : exécutez et gérez le stockage Ceph directement depuis n'importe quel nœud de cluster.</p>
            <p class="mt-4 text-base leading-8 text-white/80">Ceph fournit deux types de stockage : <strong class="text-white">RADOS Block Device (RBD)</strong> pour le stockage au niveau des blocs (images de disque, instantanés) et <strong class="text-white">CephFS</strong>, un système de fichiers compatible POSIX.</p>
          </div>
          <div class="bg-white/5 p-8 sm:p-12">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Avantages de Ceph</p>
            <div class="mt-6 grid gap-4">
              <?php
                $cephBenefits = [
                  'Configuration et gestion faciles via l\'interface graphique et la CLI',
                  'Auto-guérison des données en cas de panne d\'un disque ou d\'un nœud',
                  'Évolutif au niveau de l\'exaoctet',
                  'Pools configurables avec différentes performances et redondance',
                  'Fonctionne sur du matériel de base économique'
                ];
                foreach ($cephBenefits as $benefit):
              ?>
                <div class="flex items-start gap-3 rounded-2xl border border-white/15 bg-white/10 p-5">
                  <span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-ikaRed text-sm font-black text-white">✓</span>
                  <p class="text-sm font-semibold leading-7 text-white/90"><?= p($benefit) ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PROXMOX BACKUP SERVER -->
  <section id="proxmox-backup" class="relative overflow-hidden bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-20" src="assets/images/proxmox-backup.jpg" alt="Proxmox Backup Server">
      <div class="absolute inset-0 bg-ikaBlueDark/85"></div>
    </div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.1fr_.9fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Proxmox Backup Server</p>
        <h2 class="mt-4 text-4xl font-black leading-tight sm:text-5xl">Solution de sauvegarde d'entreprise open source.</h2>
        <div class="mt-6 space-y-4 text-base leading-8 text-white/85">
          <p>Proxmox Backup Server est une solution de sauvegarde d'entreprise pour la sauvegarde et la restauration de machines virtuelles, de conteneurs et d'hôtes physiques. Grâce aux sauvegardes incrémentielles entièrement dédupliquées, il réduit considérablement la charge du réseau et économise un espace de stockage précieux.</p>
          <p>Avec un cryptage fort et des méthodes garantissant l'intégrité des données, vous sauvegardez en toute sécurité, même sur des cibles qui ne sont pas entièrement fiables. Dans les centres de données modernes, un logiciel de sauvegarde fiable fait partie des composants d'infrastructure les plus essentiels.</p>
        </div>
        <div class="mt-8 flex flex-wrap gap-3">
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Déduplication</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">AES-256 GCM</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Anti-rançongiciel</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Sauvegarde sur bande</span>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -right-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="assets/images/proxmox-backup.jpg" alt="Protection des données Proxmox Backup Server">
        </div>
      </div>
    </div>
  </section>

  <!-- FONCTIONNALITÉS PROXMOX BACKUP SERVER (ONGLETS) -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Liste des fonctionnalités</p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Sauvegarde, restauration et sécurité de bout en bout.</h2>
        <p class="mt-5 text-base leading-8 text-slate-600">Parcourez les capacités de Proxmox Backup Server : sauvegarde dédupliquée, architecture, intégrité et sécurité, restauration, gestion, intégration Proxmox VE et sauvegarde sur bande.</p>
      </div>

      <!-- Capture : tableau de bord Proxmox Backup Server -->
      <figure class="mt-8 overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-clean">
        <figcaption class="flex items-center gap-1.5 border-b border-slate-100 bg-white px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-400"></span>
          <span class="ml-3 text-xs font-bold text-slate-500">Proxmox Backup Server — Tableau de bord</span>
        </figcaption>
        <img class="block w-full" src="https://www.nktek-holding.com/web/image/1254-08506d31/Proxmox-Backup-Server-2-3-dashboard.svg" alt="Tableau de bord Proxmox Backup Server" loading="lazy">
      </figure>

      <div class="mt-10 flex flex-wrap gap-2.5" role="tablist" aria-label="Fonctionnalités Proxmox Backup Server">
        <?php foreach ($pbsTabs as $index => $tab): ?>
          <button type="button" class="pbs-tab rounded-full px-5 py-3 text-sm font-extrabold transition focus:outline-none focus:ring-4 focus:ring-ikaRed/25 <?= $index === 0 ? 'bg-ikaBlueDark text-white shadow-clean' : 'bg-white text-ikaBlueDark hover:bg-ikaBlueDark hover:text-white' ?>" data-pbs-tab="<?= p($tab['id']) ?>" role="tab" aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
            <span class="mr-1.5"><?= p($tab['icon']) ?></span><?= p($tab['label']) ?>
          </button>
        <?php endforeach; ?>
      </div>

      <?php foreach ($pbsTabs as $index => $tab): ?>
        <div id="pbs-panel-<?= p($tab['id']) ?>" class="pbs-panel mt-10 <?= $index === 0 ? '' : 'hidden' ?>" role="tabpanel">
          <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($tab['items'] as $i => $item): ?>
              <article class="rounded-2xl bg-white p-7 shadow-clean">
                <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-ikaBlue text-sm font-black text-white"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                <h3 class="mt-5 text-lg font-black leading-snug text-ikaBlueDark"><?= p($item['title']) ?></h3>
                <p class="mt-3 text-sm leading-7 text-slate-600"><?= p($item['text']) ?></p>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- POURQUOI CHOISIR -->
  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Pourquoi Proxmox</p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Open source, classe entreprise, sans dépendance propriétaire.</h2>
      </div>
      <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        <?php
          $reasons = [
            ['icon' => '⬚', 'title' => '100 % open source', 'text' => 'Sous licence GNU AGPL, v3. Code source inspectable, contributions ouvertes, aucune dépendance propriétaire.'],
            ['icon' => '⇄', 'title' => 'KVM + LXC unifiés', 'text' => 'Hyperviseur KVM et conteneurs Linux gérés depuis une seule interface Web, sur la même plate-forme.'],
            ['icon' => '⟳', 'title' => 'Haute disponibilité', 'text' => 'Cluster HA prêt à l\'emploi, migration en direct sans interruption et reprise après sinistre intégrée.'],
            ['icon' => '↺', 'title' => 'Sauvegarde intégrée', 'text' => 'Déduplication, chiffrement AES-256, restauration en direct et sauvegarde sur bande pour vos données critiques.']
          ];
          foreach ($reasons as $reason):
        ?>
          <article class="rounded-2xl border border-slate-100 bg-white p-7 shadow-clean">
            <span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-ikaSoft text-2xl text-ikaBlue"><?= p($reason['icon']) ?></span>
            <h3 class="mt-5 text-lg font-black leading-snug text-ikaBlueDark"><?= p($reason['title']) ?></h3>
            <p class="mt-3 text-sm leading-7 text-slate-600"><?= p($reason['text']) ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- FORMULAIRE DE CONTACT -->
  <section id="contact" class="bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.85fr_1.15fr] lg:items-start lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Prêt à construire votre datacenter ?</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">Construisons un centre de données ouvert et évolutif avec Proxmox.</h2>
        <p class="mt-5 text-base leading-8 text-white/75">Laissez vos coordonnées et décrivez votre besoin de virtualisation ou de sauvegarde. L'équipe IKA SOLUTION vous oriente sur la mise en place, l'intégration et l'accompagnement de votre environnement Proxmox.</p>
        <div class="mt-8 grid gap-3 text-sm font-semibold text-white/85">
          <a class="hover:text-red-200 transition" href="tel:+22672089090">📞 +226 72 08 90 90</a>
          <a class="break-all hover:text-red-200 transition" href="mailto:infos@ikasolution.com">✉ infos@ikasolution.com</a>
          <p>📍 Avenue de la Dignité, Ouagadougou, Burkina Faso</p>
        </div>
      </div>
      <form class="rounded-[2rem] bg-white p-7 text-ikaInk shadow-premium sm:p-8" action="contact-submit.php" method="post">
        <input type="hidden" name="type" value="solution">
        <input type="hidden" name="page" value="Proxmox">
        <input type="hidden" name="redirect" value="proxmox.php#contact">
        <?php if (isset($_GET['mail'], $_GET['notice'])): ?>
          <div class="mb-5 rounded-2xl <?= $_GET['mail'] === 'success' ? 'bg-green-50 text-green-800' : 'bg-red-50 text-red-800' ?> p-4 text-sm font-bold">
            <?= p((string) $_GET['notice']) ?>
          </div>
        <?php endif; ?>
        <div class="grid gap-4 sm:grid-cols-2">
          <label class="grid gap-2 text-sm font-bold text-slate-700">Nom et prénom(s) *
            <input class="min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="nom" type="text" placeholder="Votre nom" required>
          </label>
          <label class="grid gap-2 text-sm font-bold text-slate-700">Numéro de téléphone *
            <input class="min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="telephone" type="tel" placeholder="+226" required>
          </label>
        </div>
        <label class="mt-5 grid gap-2 text-sm font-bold text-slate-700">Email *
          <input class="min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="email" type="email" placeholder="vous@entreprise.com" required>
        </label>
        <label class="mt-5 grid gap-2 text-sm font-bold text-slate-700">Société
          <input class="min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="societe" type="text" placeholder="Nom de votre organisation">
        </label>
        <label class="mt-5 grid gap-2 text-sm font-bold text-slate-700">Solution Proxmox souhaitée *
          <select class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-ikaSoft px-4 py-3 font-bold text-ikaBlueDark outline-none transition focus:border-ikaBlue" name="solution_label" required>
            <option value="" selected disabled>Choisir une solution</option>
            <option value="Proxmox Virtual Environment">Proxmox Virtual Environment</option>
            <option value="Proxmox Backup Server">Proxmox Backup Server</option>
            <option value="Proxmox Mail Gateway">Proxmox Mail Gateway</option>
          </select>
        </label>
        <label class="mt-5 grid gap-2 text-sm font-bold text-slate-700">Objet *
          <input class="min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="objet" type="text" placeholder="Objet de votre demande" required>
        </label>
        <label class="mt-5 grid gap-2 text-sm font-bold text-slate-700">Votre message *
          <textarea class="min-h-32 rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="message" placeholder="Expliquez votre besoin : nombre de serveurs, VM, contraintes de sauvegarde ou contexte." required></textarea>
        </label>
        <button class="mt-6 rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700" type="submit">Soumettre la demande</button>
      </form>
    </div>
  </section>

  <!-- RETOUR -->
  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Continuer l'exploration</p>
          <h2 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl">Découvrir nos autres expertises.</h2>
        </div>
        <a href="index.php#expertises" class="inline-flex rounded-full border border-slate-200 px-6 py-3 text-sm font-black text-ikaBlue transition hover:border-ikaBlue">Toutes les expertises</a>
      </div>
      <div class="mt-10 grid gap-6 md:grid-cols-3">
        <?php
          $related = [
            ['file' => 'infrastructures-serveurs-reseaux.php', 'image' => 'assets/images/slide4.jpg', 'title' => 'Infrastructures serveurs & réseaux', 'intro' => 'Hébergement local, VPS, serveurs dédiés et continuité de service au Burkina Faso.'],
            ['file' => 'solutions-cloud-licences.php', 'image' => 'assets/images/cloud2.jpg', 'title' => 'Solutions cloud & licences', 'intro' => 'Microsoft 365, Fortinet, Odoo, cloud et licences logicielles pour vos équipes.'],
            ['file' => 'cybersecurite-donnees.php', 'image' => 'assets/images/securite.jpg', 'title' => 'Cybersécurité & données', 'intro' => 'Protection des accès, sauvegardes et continuité de vos services numériques.']
          ];
          foreach ($related as $item):
        ?>
          <a href="<?= p($item['file']) ?>" class="group overflow-hidden rounded-2xl bg-ikaSoft shadow-clean transition hover:-translate-y-1 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25">
            <img class="h-44 w-full object-cover transition duration-500 group-hover:scale-105" src="<?= p($item['image']) ?>" alt="<?= p($item['title']) ?>">
            <div class="p-6">
              <h3 class="text-lg font-black text-ikaBlueDark transition group-hover:text-ikaRed"><?= p($item['title']) ?></h3>
              <p class="mt-3 text-sm leading-7 text-slate-600"><?= p($item['intro']) ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

</main>

<script>
  // Onglets Proxmox VE
  (function () {
    var veTabs = document.querySelectorAll('.ve-tab');
    var vePanels = document.querySelectorAll('.ve-panel');
    veTabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        var id = tab.getAttribute('data-ve-tab');
        veTabs.forEach(function (t) {
          var active = t === tab;
          t.classList.toggle('bg-ikaBlueDark', active);
          t.classList.toggle('text-white', active);
          t.classList.toggle('shadow-clean', active);
          t.classList.toggle('bg-white', !active);
          t.classList.toggle('text-ikaBlueDark', !active);
          t.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        vePanels.forEach(function (panel) {
          panel.classList.toggle('hidden', panel.id !== 've-panel-' + id);
        });
        if (window.scrollY > tab.getBoundingClientRect().top + window.scrollY) {
          tab.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
      });
    });
  })();

  // Onglets Proxmox Backup Server
  (function () {
    var pbsTabs = document.querySelectorAll('.pbs-tab');
    var pbsPanels = document.querySelectorAll('.pbs-panel');
    pbsTabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        var id = tab.getAttribute('data-pbs-tab');
        pbsTabs.forEach(function (t) {
          var active = t === tab;
          t.classList.toggle('bg-ikaBlueDark', active);
          t.classList.toggle('text-white', active);
          t.classList.toggle('shadow-clean', active);
          t.classList.toggle('bg-white', !active);
          t.classList.toggle('text-ikaBlueDark', !active);
          t.setAttribute('aria-selected', active ? 'true' : 'false');
        });
        pbsPanels.forEach(function (panel) {
          panel.classList.toggle('hidden', panel.id !== 'pbs-panel-' + id);
        });
      });
    });
  })();
</script>

<?php include 'footer.php'; ?>
