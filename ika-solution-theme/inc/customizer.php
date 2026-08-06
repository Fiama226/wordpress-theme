<?php
/**
 * Customizer : rend éditables les contenus qui étaient codés en dur
 * (coordonnées, chiffres clés, textes des sections statiques).
 *
 * Toutes les valeurs sont lues via ika_opt() qui applique un repli sur le
 * texte d'origine du site : le thème reste identique au site statique tant
 * que le client n'a rien modifié.
 *
 * @package ika-solution
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Valeurs par défaut = contenu exact du site statique d'origine.
 *
 * @return array<string,string>
 */
function ika_default_options() {
	return array_merge( array(
		// --- Coordonnées ---
		'ika_address'        => 'Avenue de la Dignité, Ouagadougou, Burkina Faso',
		'ika_city'           => 'Ouagadougou, Burkina Faso',
		'ika_phone1'         => '+226 72 08 90 90',
		'ika_phone2'         => '+226 25 65 59 54',
		'ika_email'          => 'infos@ikasolution.com',
		'ika_whatsapp'       => '22672089090',
		'ika_whatsapp_text'  => 'Bonjour IKA SOLUTION, je souhaite avoir des informations sur vos services.',
		'ika_maps_embed'     => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3897.813956935869!2d-1.5510319!3d12.3283057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2e97959a8cca5d%3A0xf30ca6cdfc799f34!2sIKA%20SOLUTION!5e0!3m2!1sfr!2sci!4v1780451050715!5m2!1sfr!2sci',

		// --- Baseline / footer ---
		'ika_baseline'       => 'IKA SOLUTION. La solution qui vous convient.',
		'ika_footer_about'   => 'Partenaire digital créé en 2014, IKA SOLUTION LTD accompagne les organisations en conseil, ingénierie, réseaux, logiciels métier, cloud et sécurité.',
		'ika_footer_tagline' => 'Solutions digitales, cloud, infrastructure et sécurité.',

		// --- Section « Qui sommes-nous » ---
		'ika_about_eyebrow'    => 'Qui sommes-nous',
		'ika_about_title'      => 'La solution qui vous convient.',
		'ika_about_text1'      => 'Créée en 2014, IKA SOLUTION LTD accompagne les entreprises, institutions et organisations dans leurs besoins en ingénierie informatique, digitalisation, réseaux, logiciels, cloud et sécurité.',
		'ika_about_text2'      => 'Basée au Burkina Faso, l’entreprise intervient localement et accompagne aussi des missions ponctuelles dans la sous-région, notamment en Côte d’Ivoire, au Mali et au Niger.',
		'ika_about_image'      => 'images/equipe.jpg',
		'ika_about_image_alt'  => 'Présentation IKA SOLUTION',
		'ika_about_badge_title'    => 'IKA SOLUTION',
		'ika_about_badge_subtitle' => 'Transformation digitale',
		'ika_about_cta'        => 'En savoir plus',

		// --- Chiffres clés ---
		'ika_stat1_value'    => '12 ans',
		'ika_stat1_label'    => "d'expérience",
		'ika_stat2_value'    => '+30',
		'ika_stat2_label'    => 'clients accompagnés',
		'ika_stat3_value'    => '+70',
		'ika_stat3_label'    => 'projets réalisés',

		// --- Section contact ---
		'ika_contact_title'  => 'Parlons de votre prochain projet numérique.',
		'ika_contact_text'   => 'Présentez-nous votre besoin en digitalisation, hébergement, portail métier, infrastructure ou sécurité opérationnelle.',
		'ika_contact_form'   => '',

		// --- Section hébergement ---
		'ika_hosting_url'             => 'https://ikacloud.bf',
		'ika_hosting_eyebrow'         => 'Web, cloud et domaines',
		'ika_hosting_title'           => 'Une infrastructure solide pour vos sites, portails et applications.',
		'ika_hosting_text'            => 'Hébergement, VPS, domaine et administration technique pour garder vos services disponibles, rapides et alignés avec votre marché.',
		'ika_hosting_cta'             => 'Decouvrir nos offres',
		'ika_hosting_offer_1_title'   => 'Hébergement web',
		'ika_hosting_offer_1_text'    => 'Sites vitrines, portails, back-offices et applications métier.',
		'ika_hosting_offer_1_url'     => 'https://www.ikacloud.bf/shared-hosting.php',
		'ika_hosting_offer_2_title'   => 'VPS local',
		'ika_hosting_offer_2_text'    => 'Serveurs privés pour projets critiques et environnements applicatifs.',
		'ika_hosting_offer_2_url'     => 'https://www.ikacloud.bf/vps-server.php',
		'ika_hosting_offer_3_title'   => 'Sécurité SSL',
		'ika_hosting_offer_3_text'    => 'Certificats SSL pour protéger vos sites, portails et transactions en ligne.',
		'ika_hosting_offer_3_url'     => 'https://www.ikacloud.bf/ssl-certificates.php',
		'ika_hosting_domain_chip'     => '.bf',
		'ika_hosting_domain_title'    => 'Nom de domaine',
		'ika_hosting_domain_text'     => 'Achat, configuration DNS, messagerie et maintenance technique.',
		'ika_hosting_domain_url'      => 'https://www.ikacloud.bf/domain-search.php',
		'ika_hosting_domain_label'    => 'Acheter un nom de domaine .bf',

		// --- Bandeau défilant (mots-clés) ---
		'ika_marquee_keywords'  => 'Audit digital, Applications métier, Hébergement web, VPS local, Cybersécurité, Portails sécurisés',

		// --- Section « Méthode » (accueil) ---
		'ika_methode_eyebrow'   => 'Méthode',
		'ika_methode_title'     => 'Des projets cadrés, livrés et maintenus avec exigence.',
		'ika_methode_1_title'   => 'Comprendre',
		'ika_methode_1_text'    => 'Audit, objectifs, risques, priorités et feuille de route.',
		'ika_methode_2_title'   => 'Construire',
		'ika_methode_2_text'    => 'Design, développement, intégration, déploiement et documentation.',
		'ika_methode_3_title'   => 'Maintenir',
		'ika_methode_3_text'    => 'Support, supervision, sécurité, sauvegarde et amélioration continue.',

		// --- Pagination (pages Réalisations & Actualités) ---
		'ika_realisations_per_page' => '9',
		'ika_actualites_per_page'   => '9',

		// --- Accueil : « Dernières réalisations » (3 cartes teaser) ---
		// Contenu exact du site statique d'origine : ces cartes sont des teasers
		// propres à l'accueil, distincts de la page Réalisations (CPT).
		'ika_home_real_1_image'  => 'images/sonatur.png',
		'ika_home_real_1_client' => 'SONATUR',
		'ika_home_real_1_title'  => 'Plateforme Sonatur',
		'ika_home_real_1_text'   => 'Plateforme de souscription officielle de parcelle de la Sonatur.',
		'ika_home_real_2_image'  => 'images/intranetsonatur.png',
		'ika_home_real_2_client' => 'SONATUR',
		'ika_home_real_2_title'  => 'SONABHY Sonatur',
		'ika_home_real_2_text'   => 'Intranet pour centraliser les informations internes et accompagner les équipes métier.',
		'ika_home_real_3_image'  => 'images/sitesonatur.png',
		'ika_home_real_3_client' => 'SONATUR',
		'ika_home_real_3_title'  => 'Site web Sonatur',
		'ika_home_real_3_text'   => 'Site web institutionnel pour valoriser les services, les informations et les démarches en ligne.',

		// --- Page « Société » : hero ---
		'ika_pres_hero_title' => 'Qui sommes-nous ?',
		'ika_pres_hero_text1' => 'IKA SOLUTION LTD est une entreprise burkinabè spécialisée dans l’ingénierie informatique, la digitalisation, les réseaux, les logiciels métier, le cloud, les licences et la sécurité des systèmes d’information.',
		'ika_pres_hero_text2' => 'Depuis 2014, nous aidons les entreprises, institutions et organisations à transformer leurs opérations avec des solutions utiles, fiables et adaptées à leurs réalités métier.',
		'ika_pres_hero_image' => 'images/equipe.jpg',

		// --- Page « Société » : notre identité ---
		'ika_pres_identity_eyebrow' => 'Notre identité',
		'ika_pres_identity_title'   => 'Un partenaire technologique proche, rigoureux et orienté résultat.',
		'ika_pres_identity_text1'   => 'IKA SOLUTION accompagne les organisations dans la conception, le déploiement et la maintenance de solutions numériques. Notre approche part toujours du besoin métier : comprendre les contraintes, prioriser les impacts, choisir les bons outils, puis assurer un suivi durable.',
		'ika_pres_identity_text2'   => 'Nos interventions couvrent le conseil IT, le développement d’applications, l’intégration de logiciels, les infrastructures serveurs et réseaux, l’hébergement cloud, la cybersécurité, le support technique et la formation des utilisateurs.',

		// --- Page « Société » : vision, mission, valeurs ---
		'ika_pres_vision_eyebrow'  => 'Vision, mission et valeurs',
		'ika_pres_vision_title'    => 'Construire un numérique fiable, utile et durable.',
		'ika_pres_vision_1_title'  => 'Être une référence régionale de la transformation digitale.',
		'ika_pres_vision_1_text'   => 'Nous voulons contribuer à un écosystème numérique africain plus solide, plus sécurisé et mieux adapté aux besoins réels des organisations.',
		'ika_pres_mission_title'   => 'Fournir des solutions qui améliorent le rendement.',
		'ika_pres_mission_text'    => 'Nous conseillons, développons, intégrons, hébergeons et maintenons des systèmes qui simplifient le travail, renforcent le pilotage et sécurisent les opérations.',
		'ika_pres_values_title'    => 'Rigueur, confiance, innovation et proximité.',
		'ika_pres_values_text'     => 'Nous privilégions la qualité d’exécution, la transparence, la sécurité, le respect des engagements et l’accompagnement continu de nos clients.',

		// --- Page « Société » : mot du Directeur Général ---
		'ika_pres_dg_name'  => 'Yaya OUATTARA',
		'ika_pres_dg_role'  => 'Directeur Général, IKA SOLUTION LTD',
		'ika_pres_dg_image' => 'images/yaya.jpg',
		'ika_pres_dg_text1' => 'Notre ambition est simple : mettre la technologie au service de la performance réelle des organisations. Chez IKA SOLUTION, nous ne considérons pas le numérique comme une fin en soi, mais comme un levier pour gagner en efficacité, en sécurité et en maîtrise opérationnelle.',
		'ika_pres_dg_text2' => 'Chaque projet que nous conduisons doit répondre à une attente claire : faciliter le travail des équipes, protéger les données, améliorer le suivi des activités et créer de la valeur durable pour nos clients.',
		'ika_pres_dg_text3' => 'Je remercie nos partenaires, nos clients et nos collaborateurs pour la confiance accordée depuis 2014. Nous continuerons à avancer avec rigueur, proximité et sens du service.',

		// --- Page « Société » : ce qui nous guide ---
		'ika_pres_guide_eyebrow' => 'Ce qui nous guide',
		'ika_pres_guide_title'   => 'Des engagements concrets au service de vos projets.',
		'ika_pres_guide_1_title' => 'Comprendre',
		'ika_pres_guide_1_text'  => 'Nous analysons le contexte, les objectifs, les risques et les priorités avant toute proposition technique.',
		'ika_pres_guide_2_title' => 'Concevoir',
		'ika_pres_guide_2_text'  => 'Nous construisons des solutions évolutives, documentées et adaptées aux usages des équipes.',
		'ika_pres_guide_3_title' => 'Sécuriser',
		'ika_pres_guide_3_text'  => 'Nous intégrons la sécurité, les sauvegardes et la traçabilité dès la conception des projets.',
		'ika_pres_guide_4_title' => 'Accompagner',
		'ika_pres_guide_4_text'  => 'Nous assurons le support, la formation, la maintenance et l’amélioration continue après livraison.',

		// --- Section « Pourquoi nous choisir » (page d'accueil) ---
		'ika_why_eyebrow' => 'Pourquoi nous choisir',
		'ika_why_title'   => 'Une expertise pensée pour optimiser votre rendement.',
		'ika_why_1_title' => 'Proximité',
		'ika_why_1_text'  => 'Une équipe disponible à Ouagadougou pour analyser vos besoins, cadrer vos projets et assurer le suivi.',
		'ika_why_2_title' => 'Sécurité',
		'ika_why_2_text'  => 'Des choix techniques orientés sauvegarde, contrôle d\'accès, disponibilité et traçabilité.',
		'ika_why_3_title' => 'Productivité',
		'ika_why_3_text'  => 'Des solutions conçues pour simplifier le travail, accélérer les processus et améliorer le pilotage.',
		'ika_why_4_title' => 'Accompagnement',
		'ika_why_4_text'  => 'Formation, documentation, support et amélioration continue après la mise en service.',

		// --- Page Équipe ---
		'ika_equipe_hero_back' => 'Retour à l\'accueil',
		'ika_equipe_hero_eyebrow' => 'Notre équipe',
		'ika_equipe_hero_title' => 'Des experts passionnés au service de votre transformation digitale.',
		'ika_equipe_hero_text' => 'Ingénieurs, développeurs, consultants et techniciens réunis autour d\'une même mission : vous offrir des solutions fiables, adaptées et durables.',
		'ika_equipe_hero_image' => 'images/presentation.jpg',
		'ika_equipe_profil_eyebrow' => 'Profil',
		'ika_equipe_profil_title' => 'Une équipe pluridisciplinaire pour des projets exigeants.',
		'ika_equipe_profil_text' => 'IKA SOLUTION réunit des compétences variées en développement, infrastructures, cybersécurité, réseaux et conseil. Chaque membre apporte son expertise pour garantir des livrables de qualité, dans les délais et en phase avec vos besoins.',
		'ika_equipe_team_eyebrow' => 'Équipe',
		'ika_equipe_team_title' => 'Les talents qui font IKA SOLUTION.',
		'ika_equipe_values_eyebrow' => 'Valeurs',
		'ika_equipe_values_title' => 'Une culture d\'entreprise tournée vers l\'impact.',
		'ika_equipe_value_1_title' => 'Exigence technique',
		'ika_equipe_value_1_text' => 'Nous concevons chaque solution avec rigueur, en respectant les normes, les délais et les engagements.',
		'ika_equipe_value_2_title' => 'Proximité client',
		'ika_equipe_value_2_text' => 'Nous travaillons main dans la main avec nos clients pour comprendre leurs contraintes et y répondre avec des solutions adaptées.',
		'ika_equipe_value_3_title' => 'Innovation continue',
		'ika_equipe_value_3_text' => 'Nos équipes se forment en permanence pour maîtriser les technologies les plus récentes et vous offrir le meilleur.',
		'ika_pres_hero_eyebrow' => 'IKA SOLUTION LTD',
		'ika_pres_vision_label' => 'Vision',
		'ika_pres_mission_label' => 'Mission',
		'ika_pres_values_label' => 'Valeurs',
		'ika_pres_hero_image_alt' => 'Equipe IKA SOLUTION',
		'ika_realisations_hero_back' => 'Retour à l’accueil',
		'ika_realisations_hero_eyebrow' => 'Réalisations',
		'ika_realisations_hero_title' => 'Des projets métiers, intranets et plateformes livrés pour des organisations exigeantes.',
		'ika_realisations_hero_text' => 'IKA SOLUTION accompagne banques, institutions, services publics, plateformes nationales et entreprises dans la digitalisation de leurs processus critiques.',
		'ika_realisations_section_title' => 'Des projets concrets pour des besoins réels.',
		'ika_realisations_section_cta' => 'Discuter d’un projet',
		'ika_realisations_filter_all' => 'Toutes',
		'ika_actualites_hero_eyebrow' => 'Actualités',
		'ika_actualites_hero_title' => 'Toutes nos actualités',
		'ika_actualites_hero_text' => 'Retrouvez les sujets qui structurent la transformation digitale locale : cloud, sécurité, présence numérique, outils métier et continuité de service.',
		'ika_solutions_archive_eyebrow' => 'Nos solutions',
		'ika_solutions_archive_title' => 'Solutions logicielles métiers',
		'ika_support_label' => 'Support IKASOLUTION',
		'ika_support_line1' => 'Contactez-nous maintenant',
		'ika_support_line2' => 'Besoin d’un devis rapide ?',
		'ika_support_line3' => 'Parlez à un expert IKA',
		'ika_index_read_more' => 'Lire la suite',
		'ika_index_empty' => 'Aucun contenu trouvé.',
		'ika_pmx_hero_back' => 'Retour aux expertises',
		'ika_pmx_hero_eyebrow' => 'Virtualisation open source',
		'ika_pmx_hero_title' => 'Proxmox : la plateforme de virtualisation sans coûts de licence.',
		'ika_pmx_hero_text' => 'IKA SOLUTION déploie et maintient la suite Proxmox — Virtual Environment, Backup Server et Mail Gateway — pour consolider vos serveurs, sécuriser vos sauvegardes et filtrer votre messagerie, avec des briques 100 % open source et un accompagnement local.',
		'ika_pmx_hero_badges' => 'Virtual Environment, Backup Server, Mail Gateway',
		'ika_pmx_hero_cta_primary' => 'Parler à un expert Proxmox',
		'ika_pmx_hero_cta_secondary' => 'Découvrir la suite',
		'ika_pmx_hero_stat_label' => 'Open source',
		'ika_pmx_hero_stat_value' => '0 FCFA de licence',
		'ika_pmx_ve_eyebrow' => 'Proxmox Virtual Environment',
		'ika_pmx_ve_title' => 'Tout votre datacenter virtuel dans une seule interface.',
		'ika_pmx_ve_text1' => 'Proxmox VE réunit sur une même plateforme deux technologies complémentaires : la virtualisation complète KVM et les conteneurs LXC. Machines virtuelles, réseaux, stockage, sauvegardes et haute disponibilité se gèrent depuis une interface web unique, sans agent à installer.',
		'ika_pmx_ve_text2' => 'Chez IKA SOLUTION, nous l’utilisons pour consolider les serveurs de nos clients : moins de matériel, des ressources mutualisées et une administration simple à reprendre en main.',
		'ika_pmx_ve_caption' => 'Proxmox VE — vue résumée d’un hôte',
		'ika_pmx_ceph_title' => 'Stockage distribué Ceph, intégré à l’interface Proxmox.',
		'ika_pmx_ceph_text' => 'Auto-réparateur et sans point unique de défaillance, un cluster Ceph se déploie sur du matériel standard et grandit avec vos besoins — idéal pour des infrastructures hyperconvergées.',
		'ika_pmx_ceph_link1_label' => 'Guide cluster hyperconvergé',
		'ika_pmx_ceph_link1_url' => 'https://pve.proxmox.com/wiki/Deploy_Hyper-Converged_Ceph_Cluster',
		'ika_pmx_ceph_link2_label' => 'Benchmark Ceph 2020/09',
		'ika_pmx_ceph_link2_url' => 'https://www.proxmox.com/en/downloads/item/proxmox-ve-ceph-benchmark-2020-09',
		'ika_pmx_pbs_eyebrow' => 'Proxmox Backup Server',
		'ika_pmx_pbs_title' => 'Des sauvegardes dédupliquées, chiffrées et restaurées en un temps record.',
		'ika_pmx_pbs_text1' => 'Proxmox Backup Server protège machines virtuelles, conteneurs et hôtes physiques. Ses sauvegardes incrémentales dédupliquées réduisent fortement le trafic réseau et l’espace de stockage nécessaire, tout en accélérant la vérification et la restauration.',
		'ika_pmx_pbs_text2' => 'Chez IKA SOLUTION, nous le couplons systématiquement à Proxmox VE : rétention pilotée par politiques, réplication hors site et restauration à chaud relancent une VM en quelques minutes, pas en heures.',
		'ika_pmx_pbs_cta' => 'Sécuriser mes sauvegardes',
		'ika_pmx_pbs_feat_eyebrow' => 'Fonctionnalités',
		'ika_pmx_pbs_feat_title' => 'Sauvegarder, vérifier, restaurer : le cycle complet.',
		'ika_pmx_pbs_feat_text' => 'Parcourez les capacités de Proxmox Backup Server : déduplication, architecture, intégrité des données, restauration, administration, intégration à Proxmox VE et archivage sur bande.',
		'ika_pmx_pbs_feat_caption' => 'Proxmox Backup Server — tableau de bord',
		'ika_pmx_pmg_eyebrow' => 'Proxmox Mail Gateway',
		'ika_pmx_pmg_title' => 'Un bouclier open source devant votre messagerie.',
		'ika_pmx_pmg_text1' => 'Proxmox Mail Gateway inspecte l’ensemble des emails entrants et sortants avant qu’ils n’atteignent vos utilisateurs : spams, virus, phishing et chevaux de Troie sont bloqués à la frontière du réseau.',
		'ika_pmx_pmg_text2' => 'La passerelle s’administre depuis une interface web claire et se déploie en cluster pour suivre la volumétrie de votre organisation.',
		'ika_pmx_pmg_badges' => 'Postfix MTA, ClamAV, SpamAssassin, Cluster HA',
		'ika_pmx_pmg_doc_label' => 'Documentation du filtrage PMG',
		'ika_pmx_pmg_doc_url' => 'https://pmg.proxmox.com/pmg-docs/pmg-admin-guide.html#chapter_mailfilter',
		'ika_pmx_pmg_caption' => 'Positionnement de la passerelle dans le réseau',
		'ika_pmx_proj_1_title' => 'Audit & dimensionnement',
		'ika_pmx_proj_1_text' => 'Inventaire de vos serveurs, estimation des ressources et architecture cible : nous posons des fondations réalistes avant toute migration.',
		'ika_pmx_proj_2_title' => 'Déploiement & migration',
		'ika_pmx_proj_2_text' => 'Installation du cluster, migration des machines existantes, configuration du stockage, des sauvegardes et de la messagerie, sans coupure majeure.',
		'ika_pmx_proj_3_title' => 'Exploitation & formation',
		'ika_pmx_proj_3_text' => 'Supervision, mises à jour, documentation et transfert de compétences pour que vos équipes pilotent la plateforme en autonomie.',
		'ika_pmx_repo_title' => 'Libre et gratuit, avec un Repository Enterprise pour les entreprises.',
		'ika_pmx_repo_text' => 'Proxmox est un logiciel libre et gratuit : aucune licence à payer, un code ouvert et auditable. Pour la production, Proxmox propose une souscription au Repository Enterprise qui offre des paquets stables et testés, ainsi qu\'un support d\'assistance dédié pour les entreprises.',
		'ika_pmx_contact_title' => 'Parlez-nous de votre projet Proxmox.',
		'ika_pmx_contact_text' => 'Virtualisation des serveurs, sauvegardes dédupliquées ou protection de la messagerie : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.',
		'ika_pmx_repo_link_label' => 'Découvrir les abonnements',
		'ika_pmx_repo_link_url' => 'https://www.proxmox.com/en/proxmox-virtual-environment/pricing',

		// --- Page Réalisations (surtitre) + pages détail Solution / Expertise ---
		'ika_realisations_section_eyebrow' => 'Réalisations',
		'ika_solution_hero_back' => 'Retour aux solutions',
		'ika_solution_pres_eyebrow' => 'Présentation',
		'ika_solution_pres_title' => 'Une solution pensée pour vos opérations quotidiennes.',
		'ika_solution_feat_eyebrow' => 'Fonctionnalités',
		'ika_solution_feat_title' => 'Ce que %s apporte à vos équipes.',
		'ika_solution_cases_eyebrow' => 'Cas d’usage',
		'ika_solution_cases_title' => 'Pour quels contextes ?',
		'ika_solution_benefits_eyebrow' => 'Bénéfices',
		'ika_solution_benefits_title' => 'Pourquoi choisir cette solution ?',
		'ika_solution_cta_eyebrow' => 'Intéressé par %s ?',
		'ika_solution_cta_title' => 'Contactez IKA SOLUTION pour une présentation ou un devis.',
		'ika_solution_cta_text' => 'Laissez vos coordonnées et décrivez votre besoin. L’équipe IKA SOLUTION pourra vous orienter sur la mise en place, l’adaptation et l’accompagnement de la solution.',
		'ika_solution_cta_cf7_note' => 'Installez Contact Form 7 pour activer le formulaire de demande.',
		'ika_solution_cta_button' => 'Contacter IKA SOLUTION',
		'ika_solution_other_eyebrow' => 'Autres solutions',
		'ika_solution_other_title' => 'Découvrir les autres produits IKA.',
		'ika_solution_other_link' => 'Toutes les solutions',
		'ika_expertise_hero_back' => 'Retour aux expertises',
		'ika_expertise_badge_title' => 'IKA SOLUTION',
		'ika_expertise_badge_subtitle' => 'Expertise dédiée',
		'ika_expertise_intervention_eyebrow' => 'Notre intervention',
		'ika_expertise_intervention_title' => 'Une prestation structurée pour un résultat exploitable.',
		'ika_expertise_cap_eyebrow' => 'Ce que nous mettons en place',
		'ika_expertise_cap_title' => 'Des actions concrètes, documentées et suivies.',
		'ika_expertise_cap_cta' => 'Demander un devis',
		'ika_expertise_process_eyebrow' => 'Méthode',
		'ika_expertise_process_title' => 'Un déroulement clair du cadrage au suivi.',
		'ika_expertise_process_note' => 'Chaque étape est validée avec vos équipes afin de garder une trajectoire réaliste, mesurable et adaptée à vos priorités.',
		'ika_expertise_deliv_eyebrow' => 'Livrables',
		'ika_expertise_deliv_title' => 'Ce que vous obtenez.',
		'ika_expertise_cta_eyebrow' => 'Lancer un projet',
		'ika_expertise_cta_title' => 'Parlons de votre besoin et du niveau d\'accompagnement nécessaire.',
		'ika_expertise_cta_button' => 'Contacter IKA SOLUTION',
		'ika_expertise_other_eyebrow' => 'Autres expertises',
		'ika_expertise_other_title' => 'Explorer nos domaines complémentaires.',
		'ika_expertise_other_link' => 'Toutes les expertises',
	), ika_partner_default_options() );
}

/**
 * Valeurs par défaut des pages partenaires (Odoo, Fortinet, Palo Alto,
 * Microsoft) = contenu exact rédigé en propre par IKA SOLUTION pour le
 * site statique. Chaque clé est éditable dans Apparence > Personnaliser.
 *
 * @return array<string,string>
 */
function ika_partner_default_options() {
	// Valeurs par défaut = contenu exact du site statique, par partenaire.
	$map = array(
		'odoo' => array(
			'prefix' => 'ika_odoo',
			'fields' => array(
				'hero_back'          => 'Retour aux expertises',
				'hero_eyebrow'       => 'ERP & gestion d’entreprise',
				'hero_title'         => 'Odoo : une suite open source qui unifie vos processus métier.',
				'hero_text'          => 'IKA SOLUTION, partenaire Odoo, déploie et maintient Odoo Community et Enterprise pour piloter ventes, CRM, comptabilité, stock, production et ressources humaines depuis une seule plateforme, avec un accompagnement local.',
				'hero_cta_primary'   => 'Parler à un expert Odoo',
				'hero_cta_secondary' => 'Découvrir la suite',
				'hero_stat_label'    => 'Community',
				'hero_stat_value'    => 'Logiciel gratuit',
				'suite_eyebrow'      => 'Odoo Community',
				'suite_title'        => 'Une plateforme unique, des modules qui s’emboîtent.',
				'suite_text1'        => 'Odoo réunit CRM, ventes, comptabilité, stock, achats, production, projets et ressources humaines dans un même socle. Les modules partagent une base de données unique : une vente validée met à jour le stock, la facture et le reporting en temps réel.',
				'suite_text2'        => 'Chez IKA SOLUTION, nous conseillons Odoo pour remplacer des outils dispersés par une solution cohérente, évolutive et maîtrisée — avec des licences Community gratuites ou des abonnements Enterprise selon vos besoins.',
				'suite_caption'      => 'Odoo — applications reliées sur un socle commun',
				'oss_title'          => 'Odoo Community : libre, gratuit et auditable.',
				'oss_text'           => 'Le code est publié sous licence LGPL : aucune fonctionnalité cachée, aucun coût de licence. Vous ne payez que l’hébergement et l’accompagnement. L’abonnement Enterprise ajoute les modules avancés, le support avec SLA et les services officiels.',
				'oss_link1_url'      => 'https://www.odoo.com/fr_FR/pricing',
				'oss_link1_label'    => 'Éditions & tarifs',
				'oss_link2_url'      => 'https://www.odoo.com/fr_FR/app/applications',
				'oss_link2_label'    => 'Catalogue d’applications',
				'ent_eyebrow'        => 'Odoo Enterprise',
				'ent_title'          => 'Les modules avancés, le support et la sérénité.',
				'ent_text1'          => 'Odoo Enterprise ajoute plus de 40 modules métiers (Studio, Field Service, Subscriptions, Sign, Helpdesk, applications mobiles officielles…) et des services : support avec SLA, mises à niveau gérées et hébergement maîtrisé.',
				'ent_text2'          => 'Chez IKA SOLUTION, nous évaluons avec vous le bon compromis entre Community et Enterprise pour que le coût serve réellement vos usages, sans payer de fonctionnalités inutilisées.',
				'ent_cta'            => 'Évaluer mes besoins Odoo',
				'ent_feat_eyebrow'   => 'Odoo Enterprise',
				'ent_feat_title'     => 'Personnaliser, sécuriser, faire évoluer.',
				'ent_feat_text'      => 'Parcourez les atouts de l’édition Enterprise : modules avancés, personnalisation Studio, support contractuel et modes d’hébergement.',
				'ent_feat_caption'   => 'Odoo Enterprise — vue d’ensemble',
				'proj_1_title'       => 'Audit & cadrage',
				'proj_1_text'        => 'Cartographie de vos processus, choix des modules et arbitrage Community/Enterprise : nous posons des fondations réalistes avant tout paramétrage.',
				'proj_2_title'       => 'Paramétrage & migration',
				'proj_2_text'        => 'Configuration des modules, import des données existantes, intégration avec vos outils et recette : la mise en route se fait sans interrompre l’activité.',
				'proj_3_title'       => 'Formation & support',
				'proj_3_text'        => 'Formation des équipes, documentation, sauvegardes et montées de version : vos collaborateurs pilotent Odoo en autonomie et en confiance.',
				'contact_title'      => 'Parlez-nous de votre projet Odoo.',
				'contact_text'       => 'CRM, comptabilité, stock, production ou ressources humaines : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.',
				'hero_badges'        => 'CRM & Ventes, Comptabilité, Stock & Achats, eCommerce',
			),
		),
		'fortinet' => array(
			'prefix' => 'ika_forti',
			'fields' => array(
				'hero_back'          => 'Retour aux expertises',
				'hero_eyebrow'       => 'Cybersécurité réseau',
				'hero_title'         => 'Fortinet : une sécurité réseau unifiée, du pare-feu au cloud.',
				'hero_text'          => 'IKA SOLUTION, partenaire Fortinet, déploie et administre FortiGate, FortiManager, FortiAnalyzer et FortiClient pour sécuriser votre périmètre, vos sites, vos accès distants et vos postes, avec une supervision locale.',
				'hero_cta_primary'   => 'Parler à un expert Fortinet',
				'hero_cta_secondary' => 'Découvrir l’écosystème',
				'hero_stat_label'    => 'FortiGate',
				'hero_stat_value'    => 'NGFW & SD-WAN',
				'gate_eyebrow'       => 'FortiGate NGFW',
				'gate_title'         => 'Le pare-feu nouvelle génération qui protège tout le réseau.',
				'gate_text1'         => 'FortiGate intègre pare-feu, IPS, antivirus, contrôle applicatif, filtrage web, VPN et SD-WAN dans un seul équipement. Les flux chiffrés sont inspectés et les politiques appliquées selon l’application, l’utilisateur et le niveau de confiance.',
				'gate_text2'         => 'Chez IKA SOLUTION, nous concevons votre architecture FortiGate : segmentation, accès distants, interconnexion de sites et supervision continue.',
				'gate_caption'       => 'FortiGate — sécurité unifiée du réseau',
				'fabric_title'       => 'Une protection coordonnée, du réseau au cloud.',
				'fabric_text'        => 'FortiGate agit au cœur du Security Fabric de Fortinet : il partage l’intelligence et l’automatisation avec FortiManager, FortiAnalyzer, FortiClient et les services FortiGuard pour une réponse cohérente aux menaces.',
				'fabric_link1_url'   => 'https://www.fortinet.com/products',
				'fabric_link1_label' => 'Gamme Fortinet',
				'fabric_link2_url'   => 'https://www.fortinet.com/support',
				'fabric_link2_label' => 'Support & services',
				'eco_eyebrow'        => 'Gestion & supervision',
				'eco_title'          => 'Piloter, analyser, protéger les postes.',
				'eco_text1'          => 'FortiManager centralise la configuration de tous vos équipements, FortiAnalyzer corrèle les journaux pour la détection et les rapports, et FortiClient protège vos postes. Les services FortiGuard alimentent l’ensemble avec une intelligence des menaces à jour.',
				'eco_text2'          => 'Chez IKA SOLUTION, nous intégrons ces briques dans une démarche complète : durcissement, segmentation, supervision et réponse aux incidents.',
				'eco_cta'            => 'Auditer ma sécurité réseau',
				'eco_feat_eyebrow'   => 'Écosystème Fortinet',
				'eco_feat_title'     => 'Gérer, analyser, sécuriser, se renseigner.',
				'eco_feat_text'      => 'Parcourez les composants qui entourent FortiGate : gestion centralisée, journalisation, protection des postes et intelligence des menaces.',
				'eco_feat_caption'   => 'Fortinet Security Fabric — vue d’ensemble',
				'proj_1_title'       => 'Audit & architecture',
				'proj_1_text'        => 'Analyse de votre exposition, dimensionnement des équipements et conception de la segmentation : nous posons les bases d’une défense cohérente.',
				'proj_2_title'       => 'Déploiement & migration',
				'proj_2_text'        => 'Installation des FortiGate, politiques de sécurité, VPN et SD-WAN, intégration de FortiManager et FortiAnalyzer, sans interrompre les services.',
				'proj_3_title'       => 'Exploitation & supervision',
				'proj_3_text'        => 'Mises à jour FortiGuard, veille sur les journaux, gestion des incidents et rapports : votre sécurité reste pilotée et documentée.',
				'contact_title'      => 'Sécurisez votre réseau avec Fortinet.',
				'contact_text'       => 'Pare-feu, accès distants, SD-WAN ou supervision : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.',
				'hero_badges'        => 'FortiGate NGFW, Secure SD-WAN, FortiManager, FortiAnalyzer',
			),
		),
		'paloalto' => array(
			'prefix' => 'ika_palo',
			'fields' => array(
				'hero_back'            => 'Retour aux expertises',
				'hero_eyebrow'         => 'Cybersécurité nouvelle génération',
				'hero_title'           => 'Palo Alto Networks : une sécurité pilotée par les applications.',
				'hero_text'            => 'IKA SOLUTION, partenaire Palo Alto Networks, déploie et administre les pare-feux Strata (PAN-OS), les solutions Prisma (SASE et cloud) et Cortex pour protéger votre réseau, vos accès et vos environnements cloud.',
				'hero_cta_primary'     => 'Parler à un expert Palo Alto',
				'hero_cta_secondary'   => 'Découvrir la plateforme',
				'hero_stat_label'      => 'PAN-OS',
				'hero_stat_value'      => 'NGFW & cloud',
				'strata_eyebrow'       => 'Strata NGFW',
				'strata_title'         => 'Un pare-feu qui comprend le trafic applicatif.',
				'strata_text1'         => 'Les pare-feux Palo Alto identifient le trafic par application, utilisateur et contenu grâce à App-ID, User-ID et Content-ID. Les menaces connues et inconnues sont bloquées, y compris dans le trafic chiffré.',
				'strata_text2'         => 'Chez IKA SOLUTION, nous déployons ces équipements avec une segmentation cohérente et une supervision continue pour protéger vos accès et vos données.',
				'strata_caption'       => 'Palo Alto Networks — sécurité pilotée par les applications',
				'platform_title'       => 'Du réseau au cloud, jusqu’aux opérations de sécurité.',
				'platform_text'        => 'Prisma Access sécurise les accès et le cloud, Prisma Cloud protège les workloads et Cortex automatise la détection et la réponse. La plateforme couvre tout le périmètre digital.',
				'platform_link1_url'   => 'https://www.paloaltonetworks.com/products',
				'platform_link1_label' => 'Gamme Palo Alto',
				'platform_link2_url'   => 'https://www.paloaltonetworks.com/support',
				'platform_link2_label' => 'Support & services',
				'cloud_eyebrow'        => 'Cloud & opérations',
				'cloud_title'          => 'Sécuriser le cloud, analyser et répondre.',
				'cloud_text1'          => 'Prisma Access apporte une protection SASE aux utilisateurs et aux sites, Prisma Cloud protège les workloads et les environnements multi-cloud, et Cortex automatise la détection et la réponse aux incidents.',
				'cloud_text2'          => 'Chez IKA SOLUTION, nous intégrons ces solutions selon votre maturité : renforcer le pare-feu, sécuriser le cloud ou moderniser vos opérations de sécurité.',
				'cloud_cta'            => 'Renforcer ma cybersécurité',
				'cloud_feat_eyebrow'   => 'Cloud & opérations',
				'cloud_feat_title'     => 'Accéder, protéger, répondre.',
				'cloud_feat_text'      => 'Parcourez les briques qui étendent le pare-feu : SASE, sécurité cloud-native et opérations de sécurité pilotées par les données.',
				'cloud_feat_caption'   => 'Plateforme Palo Alto Networks — vue d’ensemble',
				'proj_1_title'         => 'Audit & design',
				'proj_1_text'          => 'Analyse de votre exposition, cartographie des applications et dimensionnement des pare-feux : nous concevons une architecture cohérente.',
				'proj_2_title'         => 'Déploiement & configuration',
				'proj_2_text'          => 'Installation des équipements, politiques de sécurité, GlobalProtect et Panorama, avec intégration de vos annuaires, sans coupure des services.',
				'proj_3_title'         => 'Exploitation & supervision',
				'proj_3_text'          => 'Veille, mise à jour des signatures, gestion des incidents et formation de vos équipes : la plateforme reste performante et documentée.',
				'contact_title'        => 'Protégez votre réseau et votre cloud avec Palo Alto.',
				'contact_text'         => 'Pare-feu, accès distant, cloud ou opérations de sécurité : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.',
				'hero_badges'          => 'Strata NGFW, Prisma Access, Cortex, GlobalProtect',
			),
		),
		'microsoft' => array(
			'prefix' => 'ika_ms',
			'fields' => array(
				'hero_back'          => 'Retour aux expertises',
				'hero_eyebrow'       => 'Productivité & collaboration',
				'hero_title'         => 'Microsoft 365 : la plateforme de travail de vos équipes.',
				'hero_text'          => 'IKA SOLUTION, partenaire Microsoft, accompagne la fourniture, le déploiement et l’administration de Microsoft 365 — messagerie, collaboration, sécurité et licences — pour des équipes efficaces et protégées.',
				'hero_cta_primary'   => 'Parler à un expert Microsoft',
				'hero_cta_secondary' => 'Découvrir Microsoft 365',
				'hero_stat_label'    => 'Microsoft 365',
				'hero_stat_value'    => 'Collaboration & sécurité',
				'suite_eyebrow'      => 'Microsoft 365',
				'suite_title'        => 'Une seule suite pour collaborer, produire et sécuriser.',
				'suite_text1'        => 'Microsoft 365 réunit messagerie, réunions, stockage, partage et applications Office dans une suite cohérente. Vos équipes travaillent ensemble, où qu’elles soient, avec des outils qui s’intègrent les uns aux autres.',
				'suite_text2'        => 'Chez IKA SOLUTION, nous vous conseillons la bonne formule, migrons vos données et administrons l’environnement pour que vos collaborateurs adoptent la suite sereinement.',
				'suite_caption'      => 'Microsoft 365 — applications reliées',
				'sec_title'          => 'Une sécurité intégrée, du compte au poste de travail.',
				'sec_text'           => 'Authentification multi-facteur, accès conditionnel, protection de la messagerie et des postes : Microsoft 365 embarque les fondations de la sécurité de vos équipes.',
				'sec_link1_url'      => 'https://www.microsoft.com/fr-fr/microsoft-365',
				'sec_link1_label'    => 'Découvrir Microsoft 365',
				'sec_link2_url'      => 'https://www.microsoft.com/fr-fr/microsoft-365/compare-microsoft-365-business-plans',
				'sec_link2_label'    => 'Comparer les offres',
				'plans_eyebrow'      => 'Plans & licences',
				'plans_title'        => 'Choisir la bonne formule, sans surpayer.',
				'plans_text1'        => 'Des plans Business (Basic, Standard, Premium) aux plans Enterprise (E3, E5), les licences Microsoft 365 se choisissent selon vos usages : collaboration, applications Office, sécurité et conformité.',
				'plans_text2'        => 'Chez IKA SOLUTION, nous réalisons une revue de vos licences pour éviter les doublons, aligner les droits sur les besoins et maîtriser vos coûts de renouvellement.',
				'plans_cta'          => 'Optimiser mes licences',
				'plans_feat_eyebrow' => 'Plans & licences',
				'plans_feat_title'   => 'Comprendre les offres, administrer simplement.',
				'plans_feat_text'    => 'Parcourez les familles de plans Microsoft 365 et les services d’administration que nous mettons en place pour vous.',
				'plans_feat_caption' => 'Microsoft 365 — vue d’ensemble des plans',
				'proj_1_title'       => 'Conseil & revue des licences',
				'proj_1_text'        => 'Analyse de vos usages, choix des plans et optimisation des licences existantes pour aligner vos coûts sur vos besoins réels.',
				'proj_2_title'       => 'Déploiement & migration',
				'proj_2_text'        => 'Création des comptes, migration des boîtes mail et des documents, configuration de Teams et des politiques de sécurité, sans coupure majeure.',
				'proj_3_title'       => 'Administration & formation',
				'proj_3_text'        => 'Gestion quotidienne, support utilisateur, supervision et formation pour que vos équipes adoptent la suite en autonomie.',
				'contact_title'      => 'Équipez vos équipes avec Microsoft 365.',
				'contact_text'       => 'Licences, migration, collaboration ou sécurité : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.',
				'hero_badges'        => 'Exchange, Teams, SharePoint, OneDrive',
			),
		),
	);

	$out = array();
	foreach ( $map as $cfg ) {
		foreach ( $cfg['fields'] as $k => $v ) {
			$out[ $cfg['prefix'] . '_' . $k ] = $v;
		}
	}
	return $out;
}

/**
 * Définit les champs éditables des pages partenaires (personnalisateur).
 *
 * @return array<string,array>
 */
function ika_partner_sections() {
	$defs = array(
		'odoo' => array(
			'id'     => 'ika_sec_odoo',
			'title'  => 'Page Odoo',
			'prefix' => 'ika_odoo',
		),
		'fortinet' => array(
			'id'     => 'ika_sec_fortinet',
			'title'  => 'Page Fortinet',
			'prefix' => 'ika_forti',
		),
		'paloalto' => array(
			'id'     => 'ika_sec_paloalto',
			'title'  => 'Page Palo Alto',
			'prefix' => 'ika_palo',
		),
		'microsoft' => array(
			'id'     => 'ika_sec_microsoft',
			'title'  => 'Page Microsoft',
			'prefix' => 'ika_ms',
		),
	);

	// Familles de champs avec libellés (suffixe => (libellé, type)).
	$labels = array(
		'hero_back' => array( 'Hero — libellé du bouton retour', 'text' ),
		'hero_eyebrow' => array( 'Hero — surtitre', 'text' ),
		'hero_title' => array( 'Hero — titre', 'text' ),
		'hero_text' => array( 'Hero — texte', 'textarea' ),
		'hero_badges' => array( 'Hero — badges (séparés par des virgules)', 'textarea' ),
		'hero_cta_primary' => array( 'Hero — bouton principal', 'text' ),
		'hero_cta_secondary' => array( 'Hero — bouton secondaire', 'text' ),
		'hero_stat_label' => array( 'Hero — pastille (libellé)', 'text' ),
		'hero_stat_value' => array( 'Hero — pastille (valeur)', 'text' ),
	);

	$sections = array();
	foreach ( $defs as $partner => $cfg ) {
		$fields  = array();
		$defaults = ika_partner_default_options();
		foreach ( $defaults as $key => $v ) {
			if ( 0 !== strpos( $key, $cfg['prefix'] . '_' ) ) {
				continue;
			}
			$suffix = substr( $key, strlen( $cfg['prefix'] ) + 1 );
			$fields[ $key ] = ika_partner_field_label( $suffix, $labels );
		}
		$sections[ $cfg['id'] ] = array(
			'title'  => $cfg['title'],
			'fields' => $fields,
		);
	}
	return $sections;
}

/**
 * Libellé et type de contrôle d'un champ de page partenaire.
 *
 * @param string $suffix Suffixe du champ (ex : hero_title, ent_text1).
 * @param array  $labels Libellés explicites (suffixe => (libellé, type)).
 * @return array (libellé, type)
 */
function ika_partner_field_label( $suffix, $labels = array() ) {
	if ( isset( $labels[ $suffix ] ) ) {
		return $labels[ $suffix ];
	}
	static $families = array(
		'suite' => 'Section 1', 'gate' => 'Section 1', 'strata' => 'Section 1',
		'oss' => 'Bande', 'fabric' => 'Bande', 'platform' => 'Bande', 'sec' => 'Bande',
		'ent' => 'Section 2', 'eco' => 'Section 2', 'cloud' => 'Section 2', 'plans' => 'Section 2',
		'ent_feat' => 'Fonctionnalités 2', 'eco_feat' => 'Fonctionnalités 2',
		'cloud_feat' => 'Fonctionnalités 2', 'plans_feat' => 'Fonctionnalités 2',
	);
	foreach ( $families as $fam => $fname ) {
		$prefix = $fam . '_';
		if ( 0 !== strpos( $suffix, $prefix ) ) {
			continue;
		}
		$rest = substr( $suffix, strlen( $prefix ) );
		switch ( $rest ) {
			case 'eyebrow':  return array( $fname . ' — surtitre', 'text' );
			case 'title':    return array( $fname . ' — titre', 'text' );
			case 'text':     return array( $fname . ' — texte', 'textarea' );
			case 'text1':    return array( $fname . ' — paragraphe 1', 'textarea' );
			case 'text2':    return array( $fname . ' — paragraphe 2', 'textarea' );
			case 'caption':  return array( $fname . ' — légende de l’image', 'text' );
			case 'cta':      return array( $fname . ' — bouton', 'text' );
			case 'link1_label': return array( $fname . ' — lien 1 (libellé)', 'text' );
			case 'link1_url':   return array( $fname . ' — lien 1 (URL)', 'url' );
			case 'link2_label': return array( $fname . ' — lien 2 (libellé)', 'text' );
			case 'link2_url':   return array( $fname . ' — lien 2 (URL)', 'url' );
		}
	}
	if ( preg_match( '/^proj_(\d)_(title|text)$/', $suffix, $m ) ) {
		return array( 'Projet — étape ' . $m[1] . ( 'title' === $m[2] ? ' (titre)' : ' (texte)' ), 'title' === $m[2] ? 'text' : 'textarea' );
	}
	if ( 'contact_title' === $suffix ) { return array( 'Contact — titre', 'text' ); }
	if ( 'contact_text' === $suffix ) { return array( 'Contact — texte', 'textarea' ); }
	return array( $suffix, 'text' );
}


/**
 * Lit une option du thème avec repli sur la valeur d'origine du site statique.
 *
 * @param string $key     Clé de l'option.
 * @param string $default Repli explicite éventuel.
 * @return string
 */
function ika_opt( $key, $default = null ) {
	$defaults = ika_default_options();
	if ( null === $default ) {
		$default = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	}
	return get_theme_mod( $key, $default );
}

/**
 * Lit une option « liste » (valeurs séparées par des virgules) en tableau.
 *
 * @param string $key     Clé de l'option.
 * @param string $default Repli explicite éventuel.
 * @return string[]
 */
function ika_list_option( $key, $default = null ) {
	$raw = trim( (string) ika_opt( $key, $default ) );
	if ( '' === $raw ) {
		return array();
	}
	return array_values( array_filter( array_map( 'trim', explode( ',', $raw ) ), 'strlen' ) );
}

/**
 * Numéro de téléphone au format lien tel: (sans espaces).
 *
 * @param string $key Clé de l'option téléphone.
 * @return string
 */
function ika_tel( $key = 'ika_phone1' ) {
	return preg_replace( '/[^0-9+]/', '', ika_opt( $key ) );
}

/**
 * Enregistre les réglages du Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Gestionnaire du Customizer.
 */
function ika_customize_register( $wp_customize ) {
	$defaults = ika_default_options();

	$panel = 'ika_panel';
	$wp_customize->add_panel(
		$panel,
		array(
			'title'       => __( 'Contenu IKA Solution', 'ika-solution' ),
			'description' => __( 'Modifiez ici les textes et coordonnées affichés sur l’ensemble du site.', 'ika-solution' ),
			'priority'    => 20,
		)
	);

	$sections = array(
		'ika_sec_contact' => array(
			'title'  => __( 'Coordonnées', 'ika-solution' ),
			'fields' => array(
				'ika_address'       => array( __( 'Adresse (bandeau haut)', 'ika-solution' ), 'text' ),
				'ika_city'          => array( __( 'Ville (footer / menu mobile)', 'ika-solution' ), 'text' ),
				'ika_phone1'        => array( __( 'Téléphone principal', 'ika-solution' ), 'text' ),
				'ika_phone2'        => array( __( 'Téléphone secondaire', 'ika-solution' ), 'text' ),
				'ika_email'         => __( 'Email', 'ika-solution' ),
				'ika_whatsapp'      => array( __( 'Numéro WhatsApp (chiffres uniquement)', 'ika-solution' ), 'text' ),
				'ika_whatsapp_text' => array( __( 'Message WhatsApp pré-rempli', 'ika-solution' ), 'textarea' ),
				'ika_maps_embed'    => array( __( 'URL d’intégration Google Maps', 'ika-solution' ), 'url' ),
			),
		),
		'ika_sec_about'   => array(
			'title'  => __( 'Section « Qui sommes-nous »', 'ika-solution' ),
			'fields' => array(
				'ika_about_eyebrow'       => array( __( 'Surtitre', 'ika-solution' ), 'text' ),
				'ika_about_title'         => array( __( 'Titre', 'ika-solution' ), 'text' ),
				'ika_about_text1'         => array( __( 'Paragraphe 1', 'ika-solution' ), 'textarea' ),
				'ika_about_text2'         => array( __( 'Paragraphe 2', 'ika-solution' ), 'textarea' ),
				'ika_about_image'         => array( __( 'Image (chemin relatif, ex : images/equipe.jpg)', 'ika-solution' ), 'text' ),
				'ika_about_image_alt'     => array( __( 'Texte alternatif de l’image', 'ika-solution' ), 'text' ),
				'ika_about_badge_title'   => array( __( 'Badge sur l’image — ligne 1', 'ika-solution' ), 'text' ),
				'ika_about_badge_subtitle'=> array( __( 'Badge sur l’image — ligne 2', 'ika-solution' ), 'text' ),
				'ika_about_cta'           => array( __( 'Libellé du bouton « En savoir plus »', 'ika-solution' ), 'text' ),
			),
		),
		'ika_sec_stats'   => array(
			'title'  => __( 'Chiffres clés', 'ika-solution' ),
			'fields' => array(
				'ika_stat1_value' => array( __( 'Chiffre 1 — valeur', 'ika-solution' ), 'text' ),
				'ika_stat1_label' => array( __( 'Chiffre 1 — libellé', 'ika-solution' ), 'text' ),
				'ika_stat2_value' => array( __( 'Chiffre 2 — valeur', 'ika-solution' ), 'text' ),
				'ika_stat2_label' => array( __( 'Chiffre 2 — libellé', 'ika-solution' ), 'text' ),
				'ika_stat3_value' => array( __( 'Chiffre 3 — valeur', 'ika-solution' ), 'text' ),
				'ika_stat3_label' => array( __( 'Chiffre 3 — libellé', 'ika-solution' ), 'text' ),
			),
		),
		'ika_sec_footer'  => array(
			'title'  => __( 'Pied de page', 'ika-solution' ),
			'fields' => array(
				'ika_baseline'       => array( __( 'Baseline (bandeau haut du footer)', 'ika-solution' ), 'text' ),
				'ika_footer_about'   => array( __( 'Texte de présentation', 'ika-solution' ), 'textarea' ),
				'ika_footer_tagline' => array( __( 'Mention bas de page', 'ika-solution' ), 'text' ),
			),
		),
		'ika_sec_home'    => array(
			'title'  => __( 'Section contact', 'ika-solution' ),
			'fields' => array(
				'ika_contact_title' => array( __( 'Titre du bloc contact', 'ika-solution' ), 'text' ),
				'ika_contact_text'  => array( __( 'Texte du bloc contact', 'ika-solution' ), 'textarea' ),
				'ika_contact_form'  => array( __( 'Shortcode du formulaire (ex : [contact-form-7 id="123"])', 'ika-solution' ), 'text' ),
			),
		),
		'ika_sec_home_real' => array(
			'title'  => __( 'Accueil — Dernières réalisations', 'ika-solution' ),
			'fields' => array(
				'ika_home_real_1_image'  => array( __( 'Carte 1 — image (chemin relatif, ex : images/sonatur.png)', 'ika-solution' ), 'text' ),
				'ika_home_real_1_client' => array( __( 'Carte 1 — client', 'ika-solution' ), 'text' ),
				'ika_home_real_1_title'  => array( __( 'Carte 1 — titre', 'ika-solution' ), 'text' ),
				'ika_home_real_1_text'   => array( __( 'Carte 1 — texte', 'ika-solution' ), 'textarea' ),
				'ika_home_real_2_image'  => array( __( 'Carte 2 — image (chemin relatif)', 'ika-solution' ), 'text' ),
				'ika_home_real_2_client' => array( __( 'Carte 2 — client', 'ika-solution' ), 'text' ),
				'ika_home_real_2_title'  => array( __( 'Carte 2 — titre', 'ika-solution' ), 'text' ),
				'ika_home_real_2_text'   => array( __( 'Carte 2 — texte', 'ika-solution' ), 'textarea' ),
				'ika_home_real_3_image'  => array( __( 'Carte 3 — image (chemin relatif)', 'ika-solution' ), 'text' ),
				'ika_home_real_3_client' => array( __( 'Carte 3 — client', 'ika-solution' ), 'text' ),
				'ika_home_real_3_title'  => array( __( 'Carte 3 — titre', 'ika-solution' ), 'text' ),
				'ika_home_real_3_text'   => array( __( 'Carte 3 — texte', 'ika-solution' ), 'textarea' ),
			),
		),
		'ika_sec_hosting' => array(
			'title'  => __( 'Accueil — Hébergement, cloud et domaines', 'ika-solution' ),
			'fields' => array(
				'ika_hosting_eyebrow'       => array( __( 'Surtitre', 'ika-solution' ), 'text' ),
				'ika_hosting_title'         => array( __( 'Titre', 'ika-solution' ), 'text' ),
				'ika_hosting_text'          => array( __( 'Paragraphe', 'ika-solution' ), 'textarea' ),
				'ika_hosting_cta'           => array( __( 'Libellé du bouton « Découvrir nos offres »', 'ika-solution' ), 'text' ),
				'ika_hosting_url'           => array( __( 'Lien du bouton « Découvrir nos offres »', 'ika-solution' ), 'url' ),
				'ika_hosting_offer_1_title' => array( __( 'Offre 1 — titre', 'ika-solution' ), 'text' ),
				'ika_hosting_offer_1_text'  => array( __( 'Offre 1 — texte', 'ika-solution' ), 'textarea' ),
				'ika_hosting_offer_1_url'   => array( __( 'Offre 1 — lien', 'ika-solution' ), 'url' ),
				'ika_hosting_offer_2_title' => array( __( 'Offre 2 — titre', 'ika-solution' ), 'text' ),
				'ika_hosting_offer_2_text'  => array( __( 'Offre 2 — texte', 'ika-solution' ), 'textarea' ),
				'ika_hosting_offer_2_url'   => array( __( 'Offre 2 — lien', 'ika-solution' ), 'url' ),
				'ika_hosting_offer_3_title' => array( __( 'Offre 3 — titre', 'ika-solution' ), 'text' ),
				'ika_hosting_offer_3_text'  => array( __( 'Offre 3 — texte', 'ika-solution' ), 'textarea' ),
				'ika_hosting_offer_3_url'   => array( __( 'Offre 3 — lien', 'ika-solution' ), 'url' ),
				'ika_hosting_domain_chip'   => array( __( 'Carte domaine — pastille (ex : .bf)', 'ika-solution' ), 'text' ),
				'ika_hosting_domain_title'  => array( __( 'Carte domaine — titre', 'ika-solution' ), 'text' ),
				'ika_hosting_domain_text'   => array( __( 'Carte domaine — texte', 'ika-solution' ), 'textarea' ),
				'ika_hosting_domain_url'    => array( __( 'Carte domaine — lien', 'ika-solution' ), 'url' ),
				'ika_hosting_domain_label'  => array( __( 'Carte domaine — libellé d’accessibilité', 'ika-solution' ), 'text' ),
			),
		),
		'ika_sec_marquee' => array(
			'title'  => __( 'Accueil — Bandeau défilant', 'ika-solution' ),
			'fields' => array(
				'ika_marquee_keywords' => array( __( 'Mots-clés séparés par des virgules', 'ika-solution' ), 'textarea' ),
			),
		),
		'ika_sec_methode' => array(
			'title'  => __( 'Accueil — Méthode', 'ika-solution' ),
			'fields' => array(
				'ika_methode_eyebrow' => array( __( 'Surtitre', 'ika-solution' ), 'text' ),
				'ika_methode_title'   => array( __( 'Titre', 'ika-solution' ), 'text' ),
				'ika_methode_1_title' => array( __( 'Étape 1 — titre', 'ika-solution' ), 'text' ),
				'ika_methode_1_text'  => array( __( 'Étape 1 — texte', 'ika-solution' ), 'textarea' ),
				'ika_methode_2_title' => array( __( 'Étape 2 — titre', 'ika-solution' ), 'text' ),
				'ika_methode_2_text'  => array( __( 'Étape 2 — texte', 'ika-solution' ), 'textarea' ),
				'ika_methode_3_title' => array( __( 'Étape 3 — titre', 'ika-solution' ), 'text' ),
				'ika_methode_3_text'  => array( __( 'Étape 3 — texte', 'ika-solution' ), 'textarea' ),
			),
		),
		'ika_sec_pagination' => array(
			'title'  => __( 'Pagination (Réalisations & Actualités)', 'ika-solution' ),
			'fields' => array(
				'ika_realisations_per_page' => array( __( 'Réalisations affichées par page (0 = tout afficher)', 'ika-solution' ), 'number' ),
				'ika_actualites_per_page'   => array( __( 'Actualités affichées par page (0 = tout afficher)', 'ika-solution' ), 'number' ),
			),
		),
		'ika_sec_why'     => array(
			'title'  => __( 'Accueil — Pourquoi nous choisir', 'ika-solution' ),
			'fields' => array(
				'ika_why_eyebrow' => array( __( 'Surtitre', 'ika-solution' ), 'text' ),
				'ika_why_title'   => array( __( 'Titre', 'ika-solution' ), 'text' ),
				'ika_why_1_title' => array( __( 'Pilier 1 — titre', 'ika-solution' ), 'text' ),
				'ika_why_1_text'  => array( __( 'Pilier 1 — texte', 'ika-solution' ), 'textarea' ),
				'ika_why_2_title' => array( __( 'Pilier 2 — titre', 'ika-solution' ), 'text' ),
				'ika_why_2_text'  => array( __( 'Pilier 2 — texte', 'ika-solution' ), 'textarea' ),
				'ika_why_3_title' => array( __( 'Pilier 3 — titre', 'ika-solution' ), 'text' ),
				'ika_why_3_text'  => array( __( 'Pilier 3 — texte', 'ika-solution' ), 'textarea' ),
				'ika_why_4_title' => array( __( 'Pilier 4 — titre', 'ika-solution' ), 'text' ),
				'ika_why_4_text'  => array( __( 'Pilier 4 — texte', 'ika-solution' ), 'textarea' ),
			),
		),
		'ika_sec_pres_hero' => array(
			'title'  => __( 'Page Société — Introduction', 'ika-solution' ),
			'fields' => array(
				'ika_pres_hero_eyebrow' => array( __( 'Surtitre', 'ika-solution' ), 'text' ),
				'ika_pres_hero_title' => array( __( 'Titre', 'ika-solution' ), 'text' ),
				'ika_pres_hero_text1' => array( __( 'Paragraphe 1', 'ika-solution' ), 'textarea' ),
				'ika_pres_hero_text2' => array( __( 'Paragraphe 2', 'ika-solution' ), 'textarea' ),
				'ika_pres_hero_image' => array( __( 'Image (chemin relatif)', 'ika-solution' ), 'text' ),
				'ika_pres_hero_image_alt' => array( __( 'Texte alternatif de l\'image', 'ika-solution' ), 'text' ),
			),
		),
		'ika_sec_pres_identity' => array(
			'title'  => __( 'Page Société — Notre identité', 'ika-solution' ),
			'fields' => array(
				'ika_pres_identity_eyebrow' => array( __( 'Surtitre', 'ika-solution' ), 'text' ),
				'ika_pres_identity_title'   => array( __( 'Titre', 'ika-solution' ), 'text' ),
				'ika_pres_identity_text1'   => array( __( 'Paragraphe 1', 'ika-solution' ), 'textarea' ),
				'ika_pres_identity_text2'   => array( __( 'Paragraphe 2', 'ika-solution' ), 'textarea' ),
			),
		),
		'ika_sec_pres_vision' => array(
			'title'  => __( 'Page Société — Vision, mission, valeurs', 'ika-solution' ),
			'fields' => array(
				'ika_pres_vision_eyebrow' => array( __( 'Surtitre', 'ika-solution' ), 'text' ),
				'ika_pres_vision_label'  => array( __( 'Libellé de la carte Vision', 'ika-solution' ), 'text' ),
				'ika_pres_mission_label' => array( __( 'Libellé de la carte Mission', 'ika-solution' ), 'text' ),
				'ika_pres_values_label'  => array( __( 'Libellé de la carte Valeurs', 'ika-solution' ), 'text' ),
				'ika_pres_vision_title'   => array( __( 'Titre', 'ika-solution' ), 'text' ),
				'ika_pres_vision_1_title' => array( __( 'Vision — titre', 'ika-solution' ), 'text' ),
				'ika_pres_vision_1_text'  => array( __( 'Vision — texte', 'ika-solution' ), 'textarea' ),
				'ika_pres_mission_title'  => array( __( 'Mission — titre', 'ika-solution' ), 'text' ),
				'ika_pres_mission_text'   => array( __( 'Mission — texte', 'ika-solution' ), 'textarea' ),
				'ika_pres_values_title'   => array( __( 'Valeurs — titre', 'ika-solution' ), 'text' ),
				'ika_pres_values_text'    => array( __( 'Valeurs — texte', 'ika-solution' ), 'textarea' ),
			),
		),
		'ika_sec_pres_dg' => array(
			'title'  => __( 'Page Société — Mot du Directeur Général', 'ika-solution' ),
			'fields' => array(
				'ika_pres_dg_name'  => array( __( 'Nom', 'ika-solution' ), 'text' ),
				'ika_pres_dg_role'  => array( __( 'Fonction', 'ika-solution' ), 'text' ),
				'ika_pres_dg_image' => array( __( 'Photo (chemin relatif)', 'ika-solution' ), 'text' ),
				'ika_pres_dg_text1' => array( __( 'Paragraphe 1', 'ika-solution' ), 'textarea' ),
				'ika_pres_dg_text2' => array( __( 'Paragraphe 2', 'ika-solution' ), 'textarea' ),
				'ika_pres_dg_text3' => array( __( 'Paragraphe 3', 'ika-solution' ), 'textarea' ),
			),
		),
		'ika_sec_pres_guide' => array(
			'title'  => __( 'Page Société — Ce qui nous guide', 'ika-solution' ),
			'fields' => array(
				'ika_pres_guide_eyebrow' => array( __( 'Surtitre', 'ika-solution' ), 'text' ),
				'ika_pres_guide_title'   => array( __( 'Titre', 'ika-solution' ), 'text' ),
				'ika_pres_guide_1_title' => array( __( 'Engagement 1 — titre', 'ika-solution' ), 'text' ),
				'ika_pres_guide_1_text'  => array( __( 'Engagement 1 — texte', 'ika-solution' ), 'textarea' ),
				'ika_pres_guide_2_title' => array( __( 'Engagement 2 — titre', 'ika-solution' ), 'text' ),
				'ika_pres_guide_2_text'  => array( __( 'Engagement 2 — texte', 'ika-solution' ), 'textarea' ),
				'ika_pres_guide_3_title' => array( __( 'Engagement 3 — titre', 'ika-solution' ), 'text' ),
				'ika_pres_guide_3_text'  => array( __( 'Engagement 3 — texte', 'ika-solution' ), 'textarea' ),
				'ika_pres_guide_4_title' => array( __( 'Engagement 4 — titre', 'ika-solution' ), 'text' ),
				'ika_pres_guide_4_text'  => array( __( 'Engagement 4 — texte', 'ika-solution' ), 'textarea' ),
			),
		),
		'ika_sec_equipe' => array(
			'title'  => 'Page Équipe',
			'fields' => array(
				'ika_equipe_hero_back' => array( 'Hero — libellé du bouton retour', 'text' ),
				'ika_equipe_hero_eyebrow' => array( 'Hero — surtitre', 'text' ),
				'ika_equipe_hero_title' => array( 'Hero — titre', 'text' ),
				'ika_equipe_hero_text' => array( 'Hero — texte', 'textarea' ),
				'ika_equipe_hero_image' => array( 'Hero — image de fond (chemin relatif)', 'text' ),
				'ika_equipe_profil_eyebrow' => array( 'Section Profil — surtitre', 'text' ),
				'ika_equipe_profil_title' => array( 'Section Profil — titre', 'text' ),
				'ika_equipe_profil_text' => array( 'Section Profil — texte', 'textarea' ),
				'ika_equipe_team_eyebrow' => array( 'Section Équipe — surtitre', 'text' ),
				'ika_equipe_team_title' => array( 'Section Équipe — titre', 'text' ),
				'ika_equipe_values_eyebrow' => array( 'Section Valeurs — surtitre', 'text' ),
				'ika_equipe_values_title' => array( 'Section Valeurs — titre', 'text' ),
				'ika_equipe_value_1_title' => array( 'Valeur 1 — titre', 'text' ),
				'ika_equipe_value_1_text' => array( 'Valeur 1 — texte', 'textarea' ),
				'ika_equipe_value_2_title' => array( 'Valeur 2 — titre', 'text' ),
				'ika_equipe_value_2_text' => array( 'Valeur 2 — texte', 'textarea' ),
				'ika_equipe_value_3_title' => array( 'Valeur 3 — titre', 'text' ),
				'ika_equipe_value_3_text' => array( 'Valeur 3 — texte', 'textarea' ),
			),
		),
		'ika_sec_realisations' => array(
			'title'  => 'Page Réalisations',
			'fields' => array(
				'ika_realisations_hero_back' => array( 'Hero — libellé du bouton retour', 'text' ),
				'ika_realisations_hero_eyebrow' => array( 'Hero — surtitre', 'text' ),
				'ika_realisations_hero_title' => array( 'Hero — titre', 'text' ),
				'ika_realisations_hero_text' => array( 'Hero — texte', 'textarea' ),
				'ika_realisations_section_title' => array( 'Section — titre', 'text' ),
				'ika_realisations_section_cta' => array( 'Section — libellé du bouton', 'text' ),
				'ika_realisations_filter_all' => array( 'Filtre — libellé « Toutes »', 'text' ),
			),
		),
		'ika_sec_actualites' => array(
			'title'  => 'Page Actualités',
			'fields' => array(
				'ika_actualites_hero_eyebrow' => array( 'Hero — surtitre', 'text' ),
				'ika_actualites_hero_title' => array( 'Hero — titre', 'text' ),
				'ika_actualites_hero_text' => array( 'Hero — texte', 'textarea' ),
			),
		),
		'ika_sec_solutions_archive' => array(
			'title'  => 'Archive des solutions',
			'fields' => array(
				'ika_solutions_archive_eyebrow' => array( 'Surtitre', 'text' ),
				'ika_solutions_archive_title' => array( 'Titre', 'text' ),
			),
		),
		'ika_sec_support' => array(
			'title'  => 'Footer — bandeau support',
			'fields' => array(
				'ika_support_label' => array( 'Libellé (ex : Support IKASOLUTION)', 'text' ),
				'ika_support_line1' => array( 'Message 1 (affiché en premier)', 'text' ),
				'ika_support_line2' => array( 'Message 2 (alterné)', 'text' ),
				'ika_support_line3' => array( 'Message 3 (alterné)', 'text' ),
			),
		),
		'ika_sec_misc' => array(
			'title'  => 'Textes divers',
			'fields' => array(
				'ika_index_read_more' => array( 'Listes — libellé « Lire la suite »', 'text' ),
				'ika_index_empty' => array( 'Listes — message « aucun contenu »', 'text' ),
			),
		),
		'ika_sec_pmx' => array(
			'title'  => 'Page Proxmox',
			'fields' => array(
				'ika_pmx_hero_back' => array( 'Hero — libellé du bouton retour', 'text' ),
				'ika_pmx_hero_eyebrow' => array( 'Hero — surtitre', 'text' ),
				'ika_pmx_hero_title' => array( 'Hero — titre', 'text' ),
				'ika_pmx_hero_text' => array( 'Hero — texte', 'textarea' ),
				'ika_pmx_hero_badges' => array( 'Hero — badges (séparés par des virgules)', 'textarea' ),
				'ika_pmx_hero_cta_primary' => array( 'Hero — bouton principal', 'text' ),
				'ika_pmx_hero_cta_secondary' => array( 'Hero — bouton secondaire', 'text' ),
				'ika_pmx_hero_stat_label' => array( 'Hero — pastille statistique (libellé)', 'text' ),
				'ika_pmx_hero_stat_value' => array( 'Hero — pastille statistique (valeur)', 'text' ),
				'ika_pmx_ve_eyebrow' => array( 'Virtual Environment — surtitre', 'text' ),
				'ika_pmx_ve_title' => array( 'Virtual Environment — titre', 'text' ),
				'ika_pmx_ve_text1' => array( 'Virtual Environment — paragraphe 1', 'textarea' ),
				'ika_pmx_ve_text2' => array( 'Virtual Environment — paragraphe 2', 'textarea' ),
				'ika_pmx_ve_caption' => array( 'Virtual Environment — légende de l\'écran', 'text' ),
				'ika_pmx_ceph_title' => array( 'Ceph — titre', 'text' ),
				'ika_pmx_ceph_text' => array( 'Ceph — texte', 'textarea' ),
				'ika_pmx_ceph_link1_label' => array( 'Ceph — lien 1 (libellé)', 'text' ),
				'ika_pmx_ceph_link1_url' => array( 'Ceph — lien 1 (URL)', 'url' ),
				'ika_pmx_ceph_link2_label' => array( 'Ceph — lien 2 (libellé)', 'text' ),
				'ika_pmx_ceph_link2_url' => array( 'Ceph — lien 2 (URL)', 'url' ),
				'ika_pmx_pbs_eyebrow' => array( 'Backup Server — surtitre', 'text' ),
				'ika_pmx_pbs_title' => array( 'Backup Server — titre', 'text' ),
				'ika_pmx_pbs_text1' => array( 'Backup Server — paragraphe 1', 'textarea' ),
				'ika_pmx_pbs_text2' => array( 'Backup Server — paragraphe 2', 'textarea' ),
				'ika_pmx_pbs_cta' => array( 'Backup Server — bouton', 'text' ),
				'ika_pmx_pbs_feat_eyebrow' => array( 'Fonctionnalités PBS — surtitre', 'text' ),
				'ika_pmx_pbs_feat_title' => array( 'Fonctionnalités PBS — titre', 'text' ),
				'ika_pmx_pbs_feat_text' => array( 'Fonctionnalités PBS — texte', 'textarea' ),
				'ika_pmx_pbs_feat_caption' => array( 'Fonctionnalités PBS — légende de l\'écran', 'text' ),
				'ika_pmx_pmg_eyebrow' => array( 'Mail Gateway — surtitre', 'text' ),
				'ika_pmx_pmg_title' => array( 'Mail Gateway — titre', 'text' ),
				'ika_pmx_pmg_text1' => array( 'Mail Gateway — paragraphe 1', 'textarea' ),
				'ika_pmx_pmg_text2' => array( 'Mail Gateway — paragraphe 2', 'textarea' ),
				'ika_pmx_pmg_badges' => array( 'Mail Gateway — badges (séparés par des virgules)', 'textarea' ),
				'ika_pmx_pmg_doc_label' => array( 'Mail Gateway — libellé du lien documentation', 'text' ),
				'ika_pmx_pmg_doc_url' => array( 'Mail Gateway — URL de la documentation', 'url' ),
				'ika_pmx_pmg_caption' => array( 'Mail Gateway — légende du schéma', 'text' ),
				'ika_pmx_proj_1_title' => array( 'Projet — étape 1 (titre)', 'text' ),
				'ika_pmx_proj_1_text' => array( 'Projet — étape 1 (texte)', 'textarea' ),
				'ika_pmx_proj_2_title' => array( 'Projet — étape 2 (titre)', 'text' ),
				'ika_pmx_proj_2_text' => array( 'Projet — étape 2 (texte)', 'textarea' ),
				'ika_pmx_proj_3_title' => array( 'Projet — étape 3 (titre)', 'text' ),
				'ika_pmx_proj_3_text' => array( 'Projet — étape 3 (texte)', 'textarea' ),
				'ika_pmx_repo_title' => array( 'Open source + Repo Enterprise — titre', 'text' ),
				'ika_pmx_repo_text' => array( 'Open source + Repo Enterprise — texte', 'textarea' ),
				'ika_pmx_repo_link_label' => array( 'Open source + Repo Enterprise — libellé du lien', 'text' ),
				'ika_pmx_repo_link_url' => array( 'Open source + Repo Enterprise — URL du lien', 'url' ),
				'ika_pmx_contact_title' => array( 'Contact — titre', 'text' ),
				'ika_pmx_contact_text' => array( 'Contact — texte', 'textarea' ),
			),
		),
	);

	// Sections des pages partenaires (Odoo, Fortinet, Palo Alto, Microsoft).
	$sections = array_merge( $sections, ika_partner_sections() );

	$priority = 10;
	foreach ( $sections as $section_id => $section ) {
		$wp_customize->add_section(
			$section_id,
			array(
				'title'    => $section['title'],
				'panel'    => $panel,
				'priority' => $priority++,
			)
		);

		foreach ( $section['fields'] as $key => $conf ) {
			$label = is_array( $conf ) ? $conf[0] : $conf;
			$type  = is_array( $conf ) && isset( $conf[1] ) ? $conf[1] : 'text';

			$sanitize = 'sanitize_text_field';
			if ( 'textarea' === $type ) {
				$sanitize = 'sanitize_textarea_field';
			} elseif ( 'url' === $type ) {
				$sanitize = 'esc_url_raw';
			} elseif ( 'number' === $type ) {
				$sanitize = 'absint';
			} elseif ( 'ika_email' === $key ) {
				$sanitize = 'sanitize_email';
				$type     = 'email';
			}

			$wp_customize->add_setting(
				$key,
				array(
					'default'           => isset( $defaults[ $key ] ) ? $defaults[ $key ] : '',
					'sanitize_callback' => $sanitize,
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				$key,
				array(
					'label'   => $label,
					'section' => $section_id,
					'type'    => $type,
				)
			);
		}
	}
}
add_action( 'customize_register', 'ika_customize_register' );
