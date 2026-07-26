<?php
/**
 * Traitement du formulaire de contact natif du thème.
 *
 * Utilisé uniquement lorsqu'aucun shortcode (Contact Form 7, WPForms…)
 * n'est renseigné dans le Customizer. Remplace l'ancien contact-submit.php
 * du site statique : nonce, validation, honeypot anti-spam et wp_mail().
 *
 * @package ika-solution
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Liste des sujets proposés dans le formulaire.
 *
 * @return string[]
 */
function ika_contact_subjects() {
	return apply_filters(
		'ika_contact_subjects',
		array(
			__( "Développement & intégration d'applications", 'ika-solution' ),
			__( 'Infrastructures serveurs & réseaux', 'ika-solution' ),
			__( 'Solutions cloud & licences logicielles', 'ika-solution' ),
			__( 'Conseil, audit & stratégie IT', 'ika-solution' ),
			__( 'Cybersécurité & protection des données', 'ika-solution' ),
			__( 'Support technique & infogérance', 'ika-solution' ),
			__( 'Équipements & services énergétiques', 'ika-solution' ),
			__( 'Formation & accompagnement utilisateurs', 'ika-solution' ),
		)
	);
}

/**
 * Traite l'envoi du formulaire avant l'affichage de la page.
 */
function ika_handle_contact_form() {
	if ( ! isset( $_POST['action'] ) || 'ika_contact' !== $_POST['action'] ) {
		return;
	}

	// Nonce.
	if ( ! isset( $_POST['ika_contact_nonce'] )
		|| ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['ika_contact_nonce'] ) ), 'ika_contact' ) ) {
		ika_set_contact_notice( 'error', __( 'Session expirée, merci de renvoyer le formulaire.', 'ika-solution' ) );
		return;
	}

	// Honeypot : un robot remplit ce champ caché.
	if ( ! empty( $_POST['ika_website'] ) ) {
		ika_set_contact_notice( 'success', __( 'Merci, votre message a bien été envoyé.', 'ika-solution' ) );
		return;
	}

	$nom       = sanitize_text_field( wp_unslash( $_POST['nom'] ?? '' ) );
	$email     = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$telephone = sanitize_text_field( wp_unslash( $_POST['telephone'] ?? '' ) );
	$besoin    = sanitize_text_field( wp_unslash( $_POST['besoin'] ?? '' ) );
	$message   = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );
	$page      = sanitize_text_field( wp_unslash( $_POST['ika_page'] ?? '' ) );

	if ( '' === $nom || '' === $message || ! is_email( $email ) ) {
		ika_set_contact_notice( 'error', __( 'Merci de renseigner votre nom, un email valide et un message.', 'ika-solution' ) );
		return;
	}

	$to      = apply_filters( 'ika_contact_recipient', get_option( 'admin_email' ) );
	$subject = sprintf(
		/* translators: %s: nom de l'expéditeur */
		__( '[Site web] Nouvelle demande de %s', 'ika-solution' ),
		$nom
	);

	$lines = array(
		__( 'Nom', 'ika-solution' ) . ' : ' . $nom,
		__( 'Email', 'ika-solution' ) . ' : ' . $email,
		__( 'Téléphone', 'ika-solution' ) . ' : ' . ( $telephone ? $telephone : '—' ),
		__( 'Besoin', 'ika-solution' ) . ' : ' . ( $besoin ? $besoin : '—' ),
		__( 'Page', 'ika-solution' ) . ' : ' . ( $page ? $page : '—' ),
		'',
		__( 'Message', 'ika-solution' ) . ' :',
		$message,
	);

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		sprintf( 'Reply-To: %s <%s>', $nom, $email ),
	);

	$sent = wp_mail( $to, $subject, implode( "\n", $lines ), $headers );

	if ( $sent ) {
		ika_set_contact_notice( 'success', __( 'Merci, votre message a bien été envoyé. Nous revenons vers vous rapidement.', 'ika-solution' ) );
	} else {
		ika_set_contact_notice(
			'error',
			sprintf(
				/* translators: %s: adresse email de contact */
				__( 'L’envoi a échoué. Vous pouvez nous écrire directement à %s.', 'ika-solution' ),
				ika_opt( 'ika_email' )
			)
		);
	}
}
add_action( 'template_redirect', 'ika_handle_contact_form' );

/**
 * Mémorise le message à afficher après traitement.
 *
 * @param string $type    'success' ou 'error'.
 * @param string $message Message affiché.
 */
function ika_set_contact_notice( $type, $message ) {
	$GLOBALS['ika_contact_notice'] = array(
		'type'    => $type,
		'message' => $message,
	);
}

/**
 * Récupère le message de retour du formulaire.
 *
 * @return array{type:string,message:string}|null
 */
function ika_get_contact_notice() {
	return isset( $GLOBALS['ika_contact_notice'] ) ? $GLOBALS['ika_contact_notice'] : null;
}
