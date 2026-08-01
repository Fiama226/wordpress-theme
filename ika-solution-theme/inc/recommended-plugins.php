<?php
/**
 * Extensions recommandées — installation en un clic et configuration
 * automatique par le thème.
 *
 * Page « Apparence ▸ Extensions IKA » qui permet à l'équipe (non technique)
 * d'installer et d'activer les extensions gratuites recommandées, puis
 * applique automatiquement les réglages par défaut utiles au site :
 *
 *  - Simple Custom Post Order : glisser-déposer activé sur les contenus IKA ;
 *  - UpdraftPlus : sauvegarde hebdomadaire des fichiers et de la base.
 *
 * Les extensions sont téléchargées depuis wordpress.org : le serveur doit
 * donc avoir accès à Internet. Aucune extension n'est embarquée dans le
 * thème (conformité wordpress.org, poids du ZIP maîtrisé).
 *
 * Un réglage déjà personnalisé n'est jamais écrasé : la configuration
 * automatique ne complète que les valeurs absentes.
 *
 * @package ika-solution
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ------------------------------------------------------------------------- *
 * 1. Catalogue des extensions recommandées
 * ------------------------------------------------------------------------- */

/**
 * Extensions gratuites recommandées (slugs wordpress.org).
 *
 * Champs : file (fichier principal attendu), name, priorite
 * (essentiel|recommande|optionnel), role, settings (URL relative de la page
 * de réglages, une fois active), conseil (réglages conseillés pour le guide).
 *
 * @return array<string,array<string,string>>
 */
function ika_ext_list() {
	return array(
		'simple-custom-post-order' => array(
			'file'     => 'simple-custom-post-order/simple-custom-post-order.php',
			'name'     => 'Simple Custom Post Order',
			'priorite' => 'essentiel',
			'role'     => __( 'Réordonner les contenus du site (réalisations, membres de l’équipe, partenaires, clients, slides, solutions, expertises) par glisser-déposer dans l’administration — sans toucher au champ « Ordre ».', 'ika-solution' ),
			'settings' => 'options-general.php?page=scporder-settings',
			'conseil'  => __( 'Le thème coche automatiquement les types de contenus IKA. Glissez-déposez ensuite directement dans les listes (ex. Réalisations ▸ Toutes les réalisations).', 'ika-solution' ),
		),
		'updraftplus'              => array(
			'file'     => 'updraftplus/updraftplus.php',
			'name'     => 'UpdraftPlus',
			'priorite' => 'essentiel',
			'role'     => __( 'Sauvegardes automatiques du site (fichiers + base de données) et restauration en un clic.', 'ika-solution' ),
			'settings' => 'options-general.php?page=updraftplus',
			'conseil'  => __( 'Le thème règle une sauvegarde hebdomadaire (4 exemplaires conservés). Connectez ensuite un espace distant (Google Drive, FTP…) dans l’onglet Réglages du plugin et lancez une première sauvegarde manuelle.', 'ika-solution' ),
		),
		'wordfence'                => array(
			'file'     => 'wordfence/wordfence.php',
			'name'     => 'Wordfence Security',
			'priorite' => 'recommande',
			'role'     => __( 'Pare-feu applicatif, scan antivirus et alertes de connexion suspecte.', 'ika-solution' ),
			'settings' => 'admin.php?page=Wordfence',
			'conseil'  => __( 'À l’activation, suivez l’assistant (licence gratuite) puis laissez le pare-feu passer en « protection étendue » quand il le propose.', 'ika-solution' ),
		),
		'wordpress-seo'            => array(
			'file'     => 'wordpress-seo/wp-seo.php',
			'name'     => 'Yoast SEO',
			'priorite' => 'recommande',
			'role'     => __( 'Titres et descriptions Google, sitemap XML, aperçu des résultats de recherche — sans toucher au code.', 'ika-solution' ),
			'settings' => 'admin.php?page=wpseo_dashboard',
			'conseil'  => __( 'Lancez l’« assistant de première configuration » depuis le tableau de bord Yoast SEO (organisation : Entreprise, logo, réseaux sociaux).', 'ika-solution' ),
		),
		'wp-smushit'               => array(
			'file'     => 'wp-smushit/wp-smushit.php',
			'name'     => 'Smush',
			'priorite' => 'recommande',
			'role'     => __( 'Compresse automatiquement les images envoyées dans la médiathèque (site plus rapide).', 'ika-solution' ),
			'settings' => 'admin.php?page=smush',
			'conseil'  => __( 'Laissez la compression automatique activée et activez le « lazy load » (chargement différé) dans les réglages du plugin.', 'ika-solution' ),
		),
		'duplicate-page'           => array(
			'file'     => 'duplicate-page/duplicatepage.php',
			'name'     => 'Duplicate Page',
			'priorite' => 'recommande',
			'role'     => __( 'Ajoute un bouton « Dupliquer » sur chaque page, article, réalisation… Pratique pour créer une nouvelle fiche en partant d’une existante.', 'ika-solution' ),
			'settings' => 'options-general.php?page=duplicate_page_settings',
			'conseil'  => __( 'Les réglages par défaut conviennent : la copie est créée en brouillon, puis vous la publiez.', 'ika-solution' ),
		),
		'contact-form-7'           => array(
			'file'     => 'contact-form-7/wp-contact-form-7.php',
			'name'     => 'Contact Form 7',
			'priorite' => 'optionnel',
			'role'     => __( 'Constructeur de formulaires — utile uniquement pour créer d’autres formulaires : le formulaire de contact de la page d’accueil est déjà intégré au thème.', 'ika-solution' ),
			'settings' => 'admin.php?page=wpcf7',
			'conseil'  => __( 'Le formulaire d’accueil du thème reste le canal principal (compatibilité stricte avec le site statique).', 'ika-solution' ),
		),
	);
}

/**
 * Types de contenus IKA triables par glisser-déposer (SCPOrder).
 *
 * Ce sont exactement les types dont l'affichage public suit `menu_order`.
 *
 * @return array<int,string>
 */
function ika_ext_sortable_post_types() {
	return apply_filters(
		'ika_ext_sortable_post_types',
		array(
			'ika_realisation',
			'ika_membre',
			'ika_partenaire',
			'ika_client',
			'ika_solution',
			'ika_expertise',
			'ika_slide',
		)
	);
}

/* ------------------------------------------------------------------------- *
 * 2. Statuts et chemins des extensions
 * ------------------------------------------------------------------------- */

/**
 * Retrouve le fichier principal d'une extension du catalogue (ou null).
 *
 * Gère le cas où le fichier principal porterait un nom différent de celui
 * attendu (fallback : premier fichier du dossier de l'extension).
 *
 * @param string $slug Slug wordpress.org de l'extension.
 * @return string|null Chemin relatif du fichier (ex. « dossier/fichier.php »).
 */
function ika_ext_plugin_file( $slug ) {
	$plugins = ika_ext_list();
	if ( ! isset( $plugins[ $slug ] ) ) {
		return null;
	}

	$file = $plugins[ $slug ]['file'];
	if ( file_exists( WP_PLUGIN_DIR . '/' . $file ) ) {
		return $file;
	}

	if ( ! function_exists( 'get_plugins' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}
	foreach ( array_keys( get_plugins() ) as $candidate ) {
		if ( 0 === strpos( $candidate, $slug . '/' ) ) {
			return $candidate;
		}
	}
	return null;
}

/**
 * Statut d'une extension : absent | installe | actif.
 *
 * @param string $slug Slug wordpress.org de l'extension.
 * @return string
 */
function ika_ext_status( $slug ) {
	if ( ! function_exists( 'is_plugin_active' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}
	$file = ika_ext_plugin_file( $slug );
	if ( null === $file ) {
		return 'absent';
	}
	return is_plugin_active( $file ) ? 'actif' : 'installe';
}

/* ------------------------------------------------------------------------- *
 * 3. Messages de retour (flash) par utilisateur
 * ------------------------------------------------------------------------- */

/**
 * Stocke un message à afficher sur la page Extensions IKA après redirection.
 *
 * @param string $type    success | error.
 * @param string $message Message affiché.
 */
function ika_ext_flash( $type, $message ) {
	set_transient(
		'ika_ext_flash_' . get_current_user_id(),
		array(
			'type'    => in_array( $type, array( 'success', 'error' ), true ) ? $type : 'success',
			'message' => $message,
		),
		60
	);
}

/**
 * Lit puis efface le message flash de l'utilisateur courant.
 *
 * @return array{type:string,message:string}|null
 */
function ika_ext_consume_flash() {
	$key   = 'ika_ext_flash_' . get_current_user_id();
	$flash = get_transient( $key );
	if ( is_array( $flash ) && isset( $flash['message'], $flash['type'] ) ) {
		delete_transient( $key );
		return $flash;
	}
	return null;
}

/* ------------------------------------------------------------------------- *
 * 4. Page d'administration (Apparence ▸ Extensions IKA)
 * ------------------------------------------------------------------------- */

/**
 * Enregistre la page dans le menu Apparence.
 */
function ika_ext_admin_menu() {
	add_theme_page(
		__( 'Extensions recommandées — IKA Solution', 'ika-solution' ),
		__( 'Extensions IKA', 'ika-solution' ),
		'manage_options',
		'ika-extensions',
		'ika_ext_page_render'
	);
}
add_action( 'admin_menu', 'ika_ext_admin_menu' );

/**
 * Rendu de la page Extensions IKA.
 */
function ika_ext_page_render() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$plugins   = ika_ext_list();
	$statuts   = array();
	$nb_actifs = 0;
	foreach ( $plugins as $slug => $plugin ) {
		$statuts[ $slug ] = ika_ext_status( $slug );
		if ( 'actif' === $statuts[ $slug ] ) {
			++$nb_actifs;
		}
	}

	$flash     = ika_ext_consume_flash();
	$priorites = array(
		'essentiel'  => __( 'Essentiel', 'ika-solution' ),
		'recommande' => __( 'Recommandé', 'ika-solution' ),
		'optionnel'  => __( 'Optionnel', 'ika-solution' ),
	);
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Extensions recommandées — IKA Solution', 'ika-solution' ); ?></h1>
		<p class="description" style="max-width:820px;">
			<?php
			printf(
				/* translators: 1: nombre d'extensions actives, 2: nombre total d'extensions recommandées */
				esc_html__( '%1$d / %2$d extensions actives. Installez et activez chaque extension en un clic ci-dessous : le thème applique ensuite automatiquement les réglages utiles au site. L’installation télécharge l’extension depuis wordpress.org (le serveur doit avoir accès à Internet).', 'ika-solution' ),
				(int) $nb_actifs,
				(int) count( $plugins )
			);
			?>
		</p>

		<?php if ( $flash ) : ?>
			<div class="notice <?php echo 'error' === $flash['type'] ? 'notice-error' : 'notice-success'; ?> is-dismissible">
				<p><?php echo esc_html( $flash['message'] ); ?></p>
			</div>
		<?php endif; ?>

		<table class="widefat striped" style="max-width:1100px;">
			<thead>
				<tr>
					<th scope="col"><?php esc_html_e( 'Extension', 'ika-solution' ); ?></th>
					<th scope="col" style="width:38%;"><?php esc_html_e( 'Utilité', 'ika-solution' ); ?></th>
					<th scope="col"><?php esc_html_e( 'Priorité', 'ika-solution' ); ?></th>
					<th scope="col"><?php esc_html_e( 'Statut', 'ika-solution' ); ?></th>
					<th scope="col"><?php esc_html_e( 'Actions', 'ika-solution' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $plugins as $slug => $plugin ) : ?>
					<tr>
						<td><strong><?php echo esc_html( $plugin['name'] ); ?></strong></td>
						<td><?php echo esc_html( $plugin['role'] ); ?></td>
						<td><?php echo esc_html( $priorites[ $plugin['priorite'] ] ?? '' ); ?></td>
						<td>
							<?php if ( 'actif' === $statuts[ $slug ] ) : ?>
								<span style="color:#00a32a;font-weight:600;">&#10004; <?php esc_html_e( 'Actif', 'ika-solution' ); ?></span>
							<?php elseif ( 'installe' === $statuts[ $slug ] ) : ?>
								<span style="color:#dba617;font-weight:600;">&#9679; <?php esc_html_e( 'Installé (inactif)', 'ika-solution' ); ?></span>
							<?php else : ?>
								<span style="color:#787c82;">&#9675; <?php esc_html_e( 'Non installé', 'ika-solution' ); ?></span>
							<?php endif; ?>
						</td>
						<td>
							<?php if ( 'actif' === $statuts[ $slug ] ) : ?>
								<a class="button button-small" href="<?php echo esc_url( admin_url( $plugin['settings'] ) ); ?>">
									<?php esc_html_e( 'Réglages', 'ika-solution' ); ?>
								</a>
							<?php elseif ( 'installe' === $statuts[ $slug ] ) : ?>
								<?php if ( current_user_can( 'activate_plugins' ) ) : ?>
									<a class="button button-primary button-small" href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=ika_ext_action&ext_do=activate&ext_plugin=' . $slug ), 'ika_ext_activate_' . $slug ) ); ?>">
										<?php esc_html_e( 'Activer', 'ika-solution' ); ?>
									</a>
								<?php else : ?>
									&mdash;
								<?php endif; ?>
							<?php else : ?>
								<?php if ( current_user_can( 'install_plugins' ) ) : ?>
									<a class="button button-primary button-small" href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=ika_ext_action&ext_do=install&ext_plugin=' . $slug ), 'ika_ext_install_' . $slug ) ); ?>">
										<?php esc_html_e( 'Installer et activer', 'ika-solution' ); ?>
									</a>
								<?php endif; ?>
								<a href="<?php echo esc_url( 'https://wordpress.org/plugins/' . $slug . '/' ); ?>" target="_blank" rel="noopener">
									<?php esc_html_e( 'fiche wordpress.org', 'ika-solution' ); ?>
								</a>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<p class="description" style="max-width:820px;">
			<?php esc_html_e( 'Si un hébergeur bloque le téléchargement depuis wordpress.org, installez l’extension manuellement via Extensions ▸ Ajouter (cherchez exactement le même nom), puis revenez sur cette page : l’activation et la configuration automatique restent possibles ici.', 'ika-solution' ); ?>
		</p>

		<h2 style="margin-top:28px;"><?php esc_html_e( 'Configuration automatique du thème', 'ika-solution' ); ?></h2>
		<div class="card" style="max-width:820px;">
			<p><?php esc_html_e( 'Dès qu’une des extensions suivantes est active, le thème complète ses réglages par défaut (sans jamais écraser un réglage déjà personnalisé) :', 'ika-solution' ); ?></p>
			<ul style="list-style:disc;padding-left:22px;">
				<li><strong>Simple Custom Post Order</strong> — <?php esc_html_e( 'glisser-déposer activé pour les 7 types de contenus du site (réalisations, membres, partenaires, clients, solutions, expertises, slides).', 'ika-solution' ); ?></li>
				<li><strong>UpdraftPlus</strong> — <?php esc_html_e( 'sauvegarde hebdomadaire des fichiers et de la base de données, 4 exemplaires conservés.', 'ika-solution' ); ?></li>
			</ul>
			<p>
				<?php esc_html_e( 'La vérification se fait automatiquement après chaque installation et régulièrement en tâche de fond. Utilisez ce bouton pour l’appliquer immédiatement :', 'ika-solution' ); ?>
			</p>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="ika_ext_defaults">
				<?php wp_nonce_field( 'ika_ext_defaults' ); ?>
				<?php submit_button( __( 'Appliquer les réglages recommandés maintenant', 'ika-solution' ), 'secondary', 'submit', false ); ?>
			</form>
		</div>

		<h2 style="margin-top:28px;"><?php esc_html_e( 'Réglages conseillés (guide)', 'ika-solution' ); ?></h2>
		<ul style="list-style:disc;padding-left:22px;max-width:820px;">
			<?php foreach ( $plugins as $slug => $plugin ) : ?>
				<li>
					<strong><?php echo esc_html( $plugin['name'] ); ?></strong> — <?php echo esc_html( $plugin['conseil'] ); ?>
					<?php if ( 'actif' === $statuts[ $slug ] ) : ?>
						<a href="<?php echo esc_url( admin_url( $plugin['settings'] ) ); ?>"><?php esc_html_e( 'Ouvrir les réglages', 'ika-solution' ); ?></a>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>

		<div class="notice notice-warning inline" style="max-width:820px;">
			<p>
				<strong><?php esc_html_e( 'Emails :', 'ika-solution' ); ?></strong>
				<?php
				printf(
					/* translators: %s: URL de la page Réglages ▸ Email (SMTP) du thème */
					wp_kses_post( __( 'n’installez <strong>pas</strong> « WP Mail SMTP » : le thème possède déjà ses propres réglages dans <a href="%s">Réglages ▸ Email (SMTP)</a>. Utiliser les deux en même temps provoquerait des conflits d’envoi.', 'ika-solution' ) ),
					esc_url( admin_url( 'options-general.php?page=ika-smtp' ) )
				);
				?>
			</p>
		</div>
	</div>
	<?php
}

/* ------------------------------------------------------------------------- *
 * 5. Installation / activation en un clic
 * ------------------------------------------------------------------------- */

/**
 * Télécharge et installe une extension depuis wordpress.org.
 *
 * @param string $slug Slug wordpress.org.
 * @return true|WP_Error
 */
function ika_ext_download_and_install( $slug ) {
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
	require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
	require_once ABSPATH . 'wp-admin/includes/plugin.php';

	$api = plugins_api(
		'plugin_information',
		array(
			'slug'   => $slug,
			'fields' => array(
				'sections' => false,
				'tags'     => false,
				'rating'   => false,
				'icons'    => false,
				'banners'  => false,
			),
		)
	);
	if ( is_wp_error( $api ) ) {
		return new WP_Error(
			'ika_ext_api',
			sprintf(
				/* translators: %s: détail technique de l'erreur wordpress.org */
				__( 'wordpress.org est injoignable depuis le serveur (%s). Réessayez, ou installez l’extension via Extensions ▸ Ajouter.', 'ika-solution' ),
				$api->get_error_message()
			)
		);
	}
	if ( empty( $api->download_link ) ) {
		return new WP_Error( 'ika_ext_api', __( 'Lien de téléchargement introuvable sur wordpress.org.', 'ika-solution' ) );
	}

	if ( ! class_exists( 'IKA_Solution_Quiet_Upgrader_Skin' ) ) {
		/**
		 * Skin silencieux pour Plugin_Upgrader : n'affiche rien pendant
		 * l'installation (la page redirige ensuite avec un message flash).
		 */
		class IKA_Solution_Quiet_Upgrader_Skin extends WP_Upgrader_Skin {
			/** @var array<int,string> Journal des messages internes. */
			public $messages = array();

			/** Constructeur sans paramètres d'affichage. */
			public function __construct() {
				parent::__construct(
					array(
						'url'   => '',
						'nonce' => '',
						'title' => '',
					)
				);
			}

			/** N'affiche pas d'en-tête HTML. */
			public function header() {}

			/** N'affiche pas de pied de page HTML. */
			public function footer() {}

			/** Ne demande jamais les identifiants FTP : échoue proprement. */
			public function request_filesystem_credentials( $error = false, $context = false, $allow_relaxed_file_ownership = false ) {
				return false;
			}

			/**
			 * Mémorise les messages techniques au lieu de les afficher.
			 *
			 * @param string $feedback Code ou message.
			 * @param mixed  ...$args  Arguments de formatage.
			 */
			public function feedback( $feedback, ...$args ) {
				if ( isset( $this->upgrader->strings[ $feedback ] ) ) {
					$this->messages[] = $this->upgrader->strings[ $feedback ];
				} elseif ( is_string( $feedback ) ) {
					$this->messages[] = $feedback;
				}
			}

			/**
			 * Mémorise les erreurs au lieu de les afficher.
			 *
			 * @param string|WP_Error $errors Erreur rencontrée.
			 */
			public function error( $errors ) {
				if ( is_wp_error( $errors ) ) {
					$this->messages[] = $errors->get_error_message();
				} elseif ( is_string( $errors ) ) {
					$this->messages[] = $errors;
				}
			}
		}
	}

	$skin     = new IKA_Solution_Quiet_Upgrader_Skin();
	$upgrader = new Plugin_Upgrader( $skin );
	$result   = $upgrader->install( $api->download_link );

	if ( is_wp_error( $result ) ) {
		return $result;
	}
	if ( true !== $result ) {
		$detail = $skin->messages ? ' ' . implode( ' ', array_map( 'wp_strip_all_tags', $skin->messages ) ) : '';
		return new WP_Error(
			'ika_ext_install',
			__( 'L’installation a échoué (droits d’écriture sur wp-content/plugins ? espace disque ?). Installez l’extension via Extensions ▸ Ajouter.', 'ika-solution' ) . $detail
		);
	}
	return true;
}

/**
 * Traite les actions « Installer et activer » / « Activer » (liste blanche
 * du catalogue, nonces et capacités vérifiés).
 */
function ika_ext_handle_action() {
	$do      = isset( $_GET['ext_do'] ) ? sanitize_key( wp_unslash( $_GET['ext_do'] ) ) : '';
	$slug    = isset( $_GET['ext_plugin'] ) ? sanitize_key( wp_unslash( $_GET['ext_plugin'] ) ) : '';
	$plugins = ika_ext_list();

	if ( ! isset( $plugins[ $slug ] ) || ! in_array( $do, array( 'install', 'activate' ), true ) ) {
		wp_die( esc_html__( 'Requête invalide.', 'ika-solution' ) );
	}

	$cap = 'install' === $do ? 'install_plugins' : 'activate_plugins';
	if ( ! current_user_can( $cap ) || ! check_admin_referer( 'ika_ext_' . $do . '_' . $slug ) ) {
		wp_die( esc_html__( 'Action non autorisée.', 'ika-solution' ) );
	}

	$name     = $plugins[ $slug ]['name'];
	$redirect = admin_url( 'themes.php?page=ika-extensions' );

	if ( 'install' === $do && null === ika_ext_plugin_file( $slug ) ) {
		$result = ika_ext_download_and_install( $slug );
		if ( is_wp_error( $result ) ) {
			ika_ext_flash(
				'error',
				sprintf(
					/* translators: 1: nom de l'extension, 2: détail de l'erreur */
					__( 'Installation de « %1$s » impossible : %2$s', 'ika-solution' ),
					$name,
					$result->get_error_message()
				)
			);
			wp_safe_redirect( $redirect );
			exit;
		}
	}

	$file = ika_ext_plugin_file( $slug );
	if ( null === $file ) {
		ika_ext_flash(
			'error',
			sprintf(
				/* translators: %s: nom de l'extension */
				__( '« %s » est introuvable après l’installation. Installez-la via Extensions ▸ Ajouter.', 'ika-solution' ),
				$name
			)
		);
		wp_safe_redirect( $redirect );
		exit;
	}

	if ( ! function_exists( 'activate_plugin' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}
	$activated = activate_plugin( $file, '', false, true );
	if ( is_wp_error( $activated ) ) {
		ika_ext_flash(
			'error',
			sprintf(
				/* translators: 1: nom de l'extension, 2: détail de l'erreur */
				__( 'Activation de « %1$s » impossible : %2$s', 'ika-solution' ),
				$name,
				$activated->get_error_message()
			)
		);
		wp_safe_redirect( $redirect );
		exit;
	}

	// Réglages par défaut du thème dès l'activation.
	delete_transient( 'ika_ext_defaults_check' );
	$rapport = ika_ext_apply_recommended_defaults();

	ika_ext_flash(
		'success',
		$rapport
			? sprintf(
				/* translators: 1: nom de l'extension, 2: liste des réglages appliqués */
				__( '« %1$s » est installée et active. %2$s', 'ika-solution' ),
				$name,
				implode( ' ', $rapport )
			)
			: sprintf(
				/* translators: %s: nom de l'extension */
				__( '« %s » est installée et active.', 'ika-solution' ),
				$name
			)
	);
	wp_safe_redirect( $redirect );
	exit;
}
add_action( 'admin_post_ika_ext_action', 'ika_ext_handle_action' );

/* ------------------------------------------------------------------------- *
 * 6. Configuration automatique des extensions
 * ------------------------------------------------------------------------- */

/**
 * Applique les réglages par défaut recommandés pour les extensions actives.
 *
 * Ne complète que les valeurs absentes : un réglage déjà personnalisé (par
 * l'équipe ou par l'extension elle-même) n'est jamais écrasé.
 *
 * @return array<int,string> Résumé en français des réglages appliqués.
 */
function ika_ext_apply_recommended_defaults() {
	if ( ! function_exists( 'is_plugin_active' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}
	$rapport = array();

	// Simple Custom Post Order : glisser-déposer sur les contenus IKA.
	if ( 'actif' === ika_ext_status( 'simple-custom-post-order' ) ) {
		$options = get_option( 'scporder_options', array() );
		$options = is_array( $options ) ? $options : array();
		$objets  = ( isset( $options['objects'] ) && is_array( $options['objects'] ) ) ? $options['objects'] : array();
		$manque  = array_diff( ika_ext_sortable_post_types(), $objets );
		if ( $manque ) {
			$options['objects'] = array_values( array_unique( array_merge( $objets, ika_ext_sortable_post_types() ) ) );
			update_option( 'scporder_options', $options );
			$rapport[] = __( 'Simple Custom Post Order : glisser-déposer activé pour les contenus du site.', 'ika-solution' );
		}
	}

	// UpdraftPlus : sauvegarde hebdomadaire fichiers + base (si rien n'est planifié).
	if ( 'actif' === ika_ext_status( 'updraftplus' ) ) {
		$planifie = false;
		if ( false === get_option( 'updraft_interval', false ) ) {
			add_option( 'updraft_interval', 'weekly', '', 'no' );
			$planifie = true;
		}
		if ( false === get_option( 'updraft_interval_database', false ) ) {
			add_option( 'updraft_interval_database', 'weekly', '', 'no' );
			$planifie = true;
		}
		if ( false === get_option( 'updraft_retain', false ) ) {
			add_option( 'updraft_retain', 4, '', 'no' );
		}
		if ( false === get_option( 'updraft_retain_db', false ) ) {
			add_option( 'updraft_retain_db', 4, '', 'no' );
		}
		if ( $planifie ) {
			// Planifie réellement les événements cron d'UpdraftPlus.
			global $updraftplus;
			if ( isset( $updraftplus ) && is_object( $updraftplus ) ) {
				if ( method_exists( $updraftplus, 'schedule_backup' ) ) {
					$updraftplus->schedule_backup( 'weekly' );
				}
				if ( method_exists( $updraftplus, 'schedule_backup_database' ) ) {
					$updraftplus->schedule_backup_database( 'weekly' );
				}
			}
			$rapport[] = __( 'UpdraftPlus : sauvegarde hebdomadaire réglée (fichiers + base de données, 4 exemplaires conservés). Pensez à connecter un espace distant (Google Drive, FTP…).', 'ika-solution' );
		}
	}

	return $rapport;
}

/**
 * Bouton « Appliquer les réglages recommandés maintenant ».
 */
function ika_ext_handle_apply_defaults() {
	if ( ! current_user_can( 'manage_options' ) || ! check_admin_referer( 'ika_ext_defaults' ) ) {
		wp_die( esc_html__( 'Action non autorisée.', 'ika-solution' ) );
	}
	$rapport = ika_ext_apply_recommended_defaults();
	ika_ext_flash(
		'success',
		$rapport
			? implode( ' ', $rapport )
			: __( 'Rien à appliquer : tout est déjà configuré (ou aucune extension concernée n’est active).', 'ika-solution' )
	);
	wp_safe_redirect( admin_url( 'themes.php?page=ika-extensions' ) );
	exit;
}
add_action( 'admin_post_ika_ext_defaults', 'ika_ext_handle_apply_defaults' );

/**
 * Après activation du thème : applique tout de suite les réglages si des
 * extensions recommandées sont déjà actives.
 */
function ika_ext_after_switch_theme() {
	delete_transient( 'ika_ext_defaults_check' );
	ika_ext_apply_recommended_defaults();
}
add_action( 'after_switch_theme', 'ika_ext_after_switch_theme' );

/**
 * Vérification silencieuse régulière (max 2 fois / jour) : couvre le cas où
 * une extension serait installée en dehors de la page Extensions IKA
 * (Extensions ▸ Ajouter, FTP, restauration…).
 */
function ika_ext_maybe_apply_defaults() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	if ( false !== get_transient( 'ika_ext_defaults_check' ) ) {
		return;
	}
	set_transient( 'ika_ext_defaults_check', 1, 12 * HOUR_IN_SECONDS );
	ika_ext_apply_recommended_defaults();
}
add_action( 'admin_init', 'ika_ext_maybe_apply_defaults' );

/* ------------------------------------------------------------------------- *
 * 7. Notification d'accompagnement dans l'administration
 * ------------------------------------------------------------------------- */

/**
 * Notification douce (masquable) invitant à utiliser la page Extensions IKA.
 * Disparaît d'elle-même quand toutes les extensions sont actives.
 */
function ika_ext_admin_notice() {
	if ( get_option( 'ika_ext_notice_dismissed' ) ) {
		return;
	}
	if ( ! current_user_can( 'install_plugins' ) ) {
		return;
	}
	$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
	if ( $screen && 'appearance_page_ika-extensions' === $screen->id ) {
		return;
	}

	$plugins   = ika_ext_list();
	$nb_actifs = 0;
	foreach ( array_keys( $plugins ) as $slug ) {
		if ( 'actif' === ika_ext_status( $slug ) ) {
			++$nb_actifs;
		}
	}
	if ( $nb_actifs >= count( $plugins ) ) {
		// Tout est installé : on ne dérange plus l'équipe.
		update_option( 'ika_ext_notice_dismissed', 1, false );
		return;
	}
	?>
	<div class="notice notice-info">
		<p>
			<?php esc_html_e( 'Le thème IKA Solution Pro peut installer et configurer pour vous ses extensions gratuites recommandées (tri des contenus, sauvegardes, sécurité, référencement).', 'ika-solution' ); ?>
			<a class="button button-primary" style="margin-left:8px;vertical-align:middle;" href="<?php echo esc_url( admin_url( 'themes.php?page=ika-extensions' ) ); ?>">
				<?php esc_html_e( 'Voir les extensions', 'ika-solution' ); ?>
			</a>
			<a class="button" style="margin-left:4px;vertical-align:middle;" href="<?php echo esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=ika_ext_dismiss' ), 'ika_ext_dismiss' ) ); ?>">
				<?php esc_html_e( 'Ignorer', 'ika-solution' ); ?>
			</a>
		</p>
	</div>
	<?php
}
add_action( 'admin_notices', 'ika_ext_admin_notice' );

/**
 * Bouton « Ignorer » de la notification d'accompagnement.
 */
function ika_ext_handle_dismiss() {
	if ( ! current_user_can( 'manage_options' ) || ! check_admin_referer( 'ika_ext_dismiss' ) ) {
		wp_die( esc_html__( 'Action non autorisée.', 'ika-solution' ) );
	}
	update_option( 'ika_ext_notice_dismissed', 1, false );

	$retour = wp_get_referer();
	wp_safe_redirect( $retour ? $retour : admin_url() );
	exit;
}
add_action( 'admin_post_ika_ext_dismiss', 'ika_ext_handle_dismiss' );
