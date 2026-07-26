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
		'ika_whatsapp_text'  => 'Bonjour IKA SOLUTION, je souhaite en savoir plus sur vos services.',
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
