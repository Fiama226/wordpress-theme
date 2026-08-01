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
	return array(
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
		'ika_about_eyebrow'  => 'Qui sommes-nous',
		'ika_about_title'    => 'La solution qui vous convient.',
		'ika_about_text1'    => 'Créée en 2014, IKA SOLUTION LTD accompagne les entreprises, institutions et organisations dans leurs besoins en ingénierie informatique, digitalisation, réseaux, logiciels, cloud et sécurité.',
		'ika_about_text2'    => 'Basée au Burkina Faso, l’entreprise intervient localement et accompagne aussi des missions ponctuelles dans la sous-région, notamment en Côte d’Ivoire, au Mali et au Niger.',
		'ika_about_image'    => 'images/equipe.jpg',

		// --- Chiffres clés ---
		'ika_stat1_value'    => '12 ans',
		'ika_stat1_label'    => "d'expérience",
		'ika_stat2_value'    => '+300',
		'ika_stat2_label'    => 'clients accompagnés',
		'ika_stat3_value'    => '+500',
		'ika_stat3_label'    => 'projets réalisés',

		// --- Section contact ---
		'ika_contact_title'  => 'Parlons de votre prochain projet numérique.',
		'ika_contact_text'   => 'Présentez-nous votre besoin en digitalisation, hébergement, portail métier, infrastructure ou sécurité opérationnelle.',
		'ika_contact_form'   => '',

		// --- Section hébergement ---
		'ika_hosting_url'    => 'https://ikacloud.bf',

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
	);
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
				'ika_about_eyebrow' => array( __( 'Surtitre', 'ika-solution' ), 'text' ),
				'ika_about_title'   => array( __( 'Titre', 'ika-solution' ), 'text' ),
				'ika_about_text1'   => array( __( 'Paragraphe 1', 'ika-solution' ), 'textarea' ),
				'ika_about_text2'   => array( __( 'Paragraphe 2', 'ika-solution' ), 'textarea' ),
				'ika_about_image'   => array( __( 'Image (chemin relatif, ex : images/equipe.jpg)', 'ika-solution' ), 'text' ),
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
			'title'  => __( 'Section contact & hébergement', 'ika-solution' ),
			'fields' => array(
				'ika_contact_title' => array( __( 'Titre du bloc contact', 'ika-solution' ), 'text' ),
				'ika_contact_text'  => array( __( 'Texte du bloc contact', 'ika-solution' ), 'textarea' ),
				'ika_contact_form'  => array( __( 'Shortcode du formulaire (ex : [contact-form-7 id="123"])', 'ika-solution' ), 'text' ),
				'ika_hosting_url'   => array( __( 'Lien « Découvrir nos offres »', 'ika-solution' ), 'url' ),
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
				'ika_pres_hero_title' => array( __( 'Titre', 'ika-solution' ), 'text' ),
				'ika_pres_hero_text1' => array( __( 'Paragraphe 1', 'ika-solution' ), 'textarea' ),
				'ika_pres_hero_text2' => array( __( 'Paragraphe 2', 'ika-solution' ), 'textarea' ),
				'ika_pres_hero_image' => array( __( 'Image (chemin relatif)', 'ika-solution' ), 'text' ),
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
	);

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
