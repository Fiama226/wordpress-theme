<?php
/**
 * Réglages SMTP administrables (Réglages ▸ Email (SMTP)).
 *
 * Permet de configurer l'envoi des emails du site (formulaires de contact,
 * notifications) depuis l'administration WordPress, sans fichier à éditer.
 * Les paramètres sont stockés en base de données (options), pas dans le code.
 *
 * Un email de test peut être envoyé depuis la page de réglages pour vérifier
 * la configuration. Alternative possible : le plugin gratuit « WP Mail SMTP »
 * (les deux ne doivent pas être actifs en même temps).
 *
 * @package ika-solution
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Valeurs par défaut des réglages SMTP.
 *
 * @return array<string,string>
 */
function ika_smtp_defaults() {
	return array(
		'enabled'    => '0',
		'host'       => '',
		'port'       => '587',
		'encryption' => 'tls', // none | ssl | tls
		'auth'       => '1',
		'username'   => '',
		'password'   => '',
		'from_email' => '',
		'from_name'  => '',
	);
}

/**
 * Lit les réglages SMTP (valeurs par défaut fusionnées).
 *
 * @return array<string,string>
 */
function ika_smtp_settings() {
	$saved = get_option( 'ika_smtp_settings', array() );
	if ( ! is_array( $saved ) ) {
		$saved = array();
	}
	return array_merge( ika_smtp_defaults(), $saved );
}

/**
 * Vrai si les envois doivent passer par le SMTP configuré.
 *
 * @return bool
 */
function ika_smtp_is_enabled() {
	$settings = ika_smtp_settings();
	return '1' === $settings['enabled'] && '' !== trim( $settings['host'] );
}

/**
 * Enregistre la page d'options dans le menu Réglages.
 */
function ika_smtp_admin_menu() {
	add_options_page(
		__( 'Email (SMTP) — IKA Solution', 'ika-solution' ),
		__( 'Email (SMTP)', 'ika-solution' ),
		'manage_options',
		'ika-smtp',
		'ika_smtp_settings_page_render'
	);
}
add_action( 'admin_menu', 'ika_smtp_admin_menu' );

/**
 * Déclare le groupe de réglages (Settings API) et les champs.
 */
function ika_smtp_register_settings() {
	register_setting(
		'ika_smtp_group',
		'ika_smtp_settings',
		array(
			'type'              => 'array',
			'sanitize_callback' => 'ika_smtp_sanitize',
			'default'           => ika_smtp_defaults(),
		)
	);
}
add_action( 'admin_init', 'ika_smtp_register_settings' );

/**
 * Nettoie les valeurs saisies (appelé par la Settings API).
 *
 * @param array<string,mixed> $input Valeurs brutes du formulaire.
 * @return array<string,string>
 */
function ika_smtp_sanitize( $input ) {
	$input = is_array( $input ) ? $input : array();
	$clean = ika_smtp_defaults();

	$clean['enabled']    = ! empty( $input['enabled'] ) ? '1' : '0';
	$clean['auth']       = ! empty( $input['auth'] ) ? '1' : '0';
	$clean['host']       = sanitize_text_field( $input['host'] ?? '' );
	$clean['port']       = (string) absint( $input['port'] ?? '587' );
	if ( '0' === $clean['port'] ) {
		$clean['port'] = '587';
	}
	$enc                 = sanitize_key( $input['encryption'] ?? 'tls' );
	$clean['encryption'] = in_array( $enc, array( 'none', 'ssl', 'tls' ), true ) ? $enc : 'tls';
	$clean['username']   = sanitize_text_field( $input['username'] ?? '' );
	$clean['password']   = trim( (string) ( $input['password'] ?? '' ) );
	$clean['from_email'] = sanitize_email( $input['from_email'] ?? '' );
	$clean['from_name']  = sanitize_text_field( $input['from_name'] ?? '' );

	// Champ mot de passe laissé vide : conserve l'existant.
	if ( '' === $clean['password'] ) {
		$previous         = ika_smtp_settings();
		$clean['password'] = $previous['password'];
	}

	add_settings_error(
		'ika_smtp_messages',
		'ika_smtp_saved',
		__( 'Réglages enregistrés.', 'ika-solution' ),
		'success'
	);

	return $clean;
}

/**
 * Rendu de la page de réglages.
 */
function ika_smtp_settings_page_render() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$settings = ika_smtp_settings();
	$test     = isset( $_GET['ika_smtp_test'] ) ? sanitize_key( wp_unslash( $_GET['ika_smtp_test'] ) ) : '';
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Email (SMTP)', 'ika-solution' ); ?></h1>
		<p class="description">
			<?php esc_html_e( 'Ces réglages contrôlent l’envoi des emails du site (formulaires de contact, notifications). Ils sont stockés en base de données : plus rien n’est codé en dur dans un fichier. Si vous utilisez déjà le plugin WP Mail SMTP, laissez cette fonction désactivée.', 'ika-solution' ); ?>
		</p>

		<?php if ( 'success' === $test ) : ?>
			<div class="notice notice-success is-dismissible"><p><?php esc_html_e( 'Email de test envoyé à l’adresse administrateur du site. Vérifiez votre boîte (et les spams).', 'ika-solution' ); ?></p></div>
		<?php elseif ( 'error' === $test ) : ?>
			<div class="notice notice-error is-dismissible"><p><?php esc_html_e( 'L’envoi de l’email de test a échoué. Vérifiez l’hôte, le port, le chiffrement et les identifiants.', 'ika-solution' ); ?></p></div>
		<?php endif; ?>

		<?php settings_errors( 'ika_smtp_messages' ); ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'ika_smtp_group' ); ?>
			<table class="form-table" role="presentation">
				<tr>
					<th scope="row"><?php esc_html_e( 'Activer le SMTP', 'ika-solution' ); ?></th>
					<td>
						<label>
							<input type="checkbox" name="ika_smtp_settings[enabled]" value="1" <?php checked( '1', $settings['enabled'] ); ?>>
							<?php esc_html_e( 'Envoyer les emails via le serveur SMTP ci-dessous', 'ika-solution' ); ?>
						</label>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="ika_smtp_host"><?php esc_html_e( 'Hôte SMTP', 'ika-solution' ); ?></label></th>
					<td><input class="regular-text" type="text" id="ika_smtp_host" name="ika_smtp_settings[host]" value="<?php echo esc_attr( $settings['host'] ); ?>" placeholder="ex : smtp.office365.com"></td>
				</tr>
				<tr>
					<th scope="row"><label for="ika_smtp_port"><?php esc_html_e( 'Port', 'ika-solution' ); ?></label></th>
					<td><input class="small-text" type="number" min="1" max="65535" id="ika_smtp_port" name="ika_smtp_settings[port]" value="<?php echo esc_attr( $settings['port'] ); ?>"></td>
				</tr>
				<tr>
					<th scope="row"><label for="ika_smtp_encryption"><?php esc_html_e( 'Chiffrement', 'ika-solution' ); ?></label></th>
					<td>
						<select id="ika_smtp_encryption" name="ika_smtp_settings[encryption]">
							<option value="tls" <?php selected( 'tls', $settings['encryption'] ); ?>><?php esc_html_e( 'TLS (recommandé)', 'ika-solution' ); ?></option>
							<option value="ssl" <?php selected( 'ssl', $settings['encryption'] ); ?>>SSL</option>
							<option value="none" <?php selected( 'none', $settings['encryption'] ); ?>><?php esc_html_e( 'Aucun', 'ika-solution' ); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php esc_html_e( 'Authentification', 'ika-solution' ); ?></th>
					<td>
						<label>
							<input type="checkbox" name="ika_smtp_settings[auth]" value="1" <?php checked( '1', $settings['auth'] ); ?>>
							<?php esc_html_e( 'Le serveur exige un identifiant et un mot de passe', 'ika-solution' ); ?>
						</label>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="ika_smtp_username"><?php esc_html_e( 'Identifiant SMTP', 'ika-solution' ); ?></label></th>
					<td><input class="regular-text" type="text" id="ika_smtp_username" name="ika_smtp_settings[username]" value="<?php echo esc_attr( $settings['username'] ); ?>" autocomplete="username"></td>
				</tr>
				<tr>
					<th scope="row"><label for="ika_smtp_password"><?php esc_html_e( 'Mot de passe SMTP', 'ika-solution' ); ?></label></th>
					<td>
						<input class="regular-text" type="password" id="ika_smtp_password" name="ika_smtp_settings[password]" value="" autocomplete="new-password" placeholder="<?php echo $settings['password'] ? esc_attr__( '••••••••  (déjà enregistré, laisser vide pour conserver)', 'ika-solution' ) : ''; ?>">
						<p class="description"><?php esc_html_e( 'Stocké en base de données (comme le fait le plugin WP Mail SMTP). Laissez vide pour conserver le mot de passe actuel.', 'ika-solution' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="ika_smtp_from_email"><?php esc_html_e( 'Email d’expédition', 'ika-solution' ); ?></label></th>
					<td><input class="regular-text" type="email" id="ika_smtp_from_email" name="ika_smtp_settings[from_email]" value="<?php echo esc_attr( $settings['from_email'] ); ?>" placeholder="ex : noreply@votredomaine.bf"></td>
				</tr>
				<tr>
					<th scope="row"><label for="ika_smtp_from_name"><?php esc_html_e( 'Nom d’expédition', 'ika-solution' ); ?></label></th>
					<td><input class="regular-text" type="text" id="ika_smtp_from_name" name="ika_smtp_settings[from_name]" value="<?php echo esc_attr( $settings['from_name'] ); ?>" placeholder="ex : IKA SOLUTION"></td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>

		<h2><?php esc_html_e( 'Tester la configuration', 'ika-solution' ); ?></h2>
		<p>
			<?php esc_html_e( 'Enregistrez d’abord vos réglages, puis envoyez un email de test à l’adresse administrateur du site.', 'ika-solution' ); ?>
		</p>
		<a class="button button-secondary" href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=ika_smtp_test' ), 'ika_smtp_test' ) ); ?>">
			<?php esc_html_e( 'Envoyer un email de test', 'ika-solution' ); ?>
		</a>
	</div>
	<?php
}

/**
 * Configure PHPMailer à chaque envoi si le SMTP du thème est activé.
 *
 * @param PHPMailer\PHPMailer\PHPMailer $phpmailer Instance de PHPMailer.
 */
function ika_smtp_configure_phpmailer( $phpmailer ) {
	if ( ! ika_smtp_is_enabled() ) {
		return;
	}
	$settings = ika_smtp_settings();

	$phpmailer->isSMTP();
	$phpmailer->Host       = $settings['host'];
	$phpmailer->Port       = (int) $settings['port'];
	$phpmailer->SMTPAuth   = '1' === $settings['auth'];
	$phpmailer->Username   = $settings['username'];
	$phpmailer->Password   = $settings['password'];
	$phpmailer->SMTPSecure = 'none' === $settings['encryption'] ? '' : $settings['encryption'];
	$phpmailer->SMTPAutoTLS = 'tls' === $settings['encryption'];
}
add_action( 'phpmailer_init', 'ika_smtp_configure_phpmailer' );

/**
 * Email d'expédition personnalisé (si renseigné).
 *
 * @param string $original Adresse d'origine.
 * @return string
 */
function ika_smtp_mail_from( $original ) {
	$settings = ika_smtp_settings();
	return '' !== $settings['from_email'] ? $settings['from_email'] : $original;
}
add_filter( 'wp_mail_from', 'ika_smtp_mail_from' );

/**
 * Nom d'expédition personnalisé (si renseigné).
 *
 * @param string $original Nom d'origine.
 * @return string
 */
function ika_smtp_mail_from_name( $original ) {
	$settings = ika_smtp_settings();
	return '' !== $settings['from_name'] ? $settings['from_name'] : $original;
}
add_filter( 'wp_mail_from_name', 'ika_smtp_mail_from_name' );

/**
 * Envoie l'email de test (bouton de la page de réglages).
 */
function ika_smtp_send_test_email() {
	if ( ! current_user_can( 'manage_options' ) || ! check_admin_referer( 'ika_smtp_test' ) ) {
		wp_die( esc_html__( 'Action non autorisée.', 'ika-solution' ) );
	}

	$sent = wp_mail(
		get_option( 'admin_email' ),
		__( '[IKA SOLUTION] Email de test SMTP', 'ika-solution' ),
		sprintf(
			/* translators: %s: date et heure du test */
			__( 'Ceci est un email de test envoyé par le thème IKA Solution le %s. Si vous le recevez, la configuration SMTP fonctionne.', 'ika-solution' ),
			wp_date( 'd/m/Y H:i:s' )
		)
	);

	wp_safe_redirect(
		add_query_arg(
			array(
				'page'          => 'ika-smtp',
				'ika_smtp_test' => $sent ? 'success' : 'error',
			),
			admin_url( 'options-general.php' )
		)
	);
	exit;
}
add_action( 'admin_post_ika_smtp_test', 'ika_smtp_send_test_email' );
