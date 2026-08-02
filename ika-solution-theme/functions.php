<?php
/**
 * IKA Solution Pro Theme Functions
 * 100% Open Source - WordPress Professional Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Version des données de démonstration importées depuis le site statique.
if ( ! defined( 'IKA_SOLUTION_SEED_VERSION' ) ) {
    define( 'IKA_SOLUTION_SEED_VERSION', '2026-08-01-static-v7' );
}

/**
 * Theme Setup
 */
function ika_solution_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add support for custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Register Navigation Menus
    register_nav_menus( array(
        'header-menu'     => __( 'Menu Principal (Header)', 'ika-solution' ),
        'footer-company'  => __( 'Menu Footer - Société', 'ika-solution' ),
        'footer-solutions'=> __( 'Menu Footer - Solutions', 'ika-solution' ),
    ) );
}
add_action( 'after_setup_theme', 'ika_solution_setup' );

/**
 * Enqueue Styles and Scripts
 */
function ika_solution_scripts() {
    $theme   = wp_get_theme();
    $version = $theme->get( 'Version' );
    $dir     = get_template_directory();
    $uri     = get_template_directory_uri();

    // Police Inter hébergée localement si présente, sinon Google Fonts.
    if ( file_exists( $dir . '/assets/fonts/inter.css' ) ) {
        wp_enqueue_style( 'ika-fonts', $uri . '/assets/fonts/inter.css', array(), $version );
    } else {
        wp_enqueue_style(
            'ika-fonts',
            'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap',
            array(),
            null
        );
    }

    // Tailwind compilé localement (plus de CDN : pas de FOUC, pas de tiers).
    $tailwind = $dir . '/assets/css/tailwind.css';
    if ( file_exists( $tailwind ) ) {
        wp_enqueue_style(
            'ika-tailwind',
            $uri . '/assets/css/tailwind.css',
            array( 'ika-fonts' ),
            (string) filemtime( $tailwind )
        );
    }

    // Feuille de style du thème.
    wp_enqueue_style( 'ika-solution-style', get_stylesheet_uri(), array( 'ika-tailwind' ), $version );

    // Scripts du thème.
    $script = $dir . '/assets/js/theme.js';
    if ( file_exists( $script ) ) {
        wp_enqueue_script(
            'ika-theme',
            $uri . '/assets/js/theme.js',
            array(),
            (string) filemtime( $script ),
            true
        );
        wp_localize_script( 'ika-theme', 'ikaHero', array( 'slides' => ika_get_hero_slides() ) );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'ika_solution_scripts' );

/**
 * Enqueue admin scripts for media library upload in meta boxes.
 */
function ika_solution_admin_scripts( $hook ) {
    global $post_type, $ika_meta_config;
    if ( ! isset( $ika_meta_config[ $post_type ] ) ) {
        return;
    }
    wp_enqueue_media();
    $script = get_template_directory() . '/assets/js/admin.js';
    if ( file_exists( $script ) ) {
        wp_enqueue_script(
            'ika-admin',
            get_template_directory_uri() . '/assets/js/admin.js',
            array( 'jquery' ),
            (string) filemtime( $script ),
            true
        );
    }
}
add_action( 'admin_enqueue_scripts', 'ika_solution_admin_scripts' );

/**
 * Custom Post Types for Dynamic Management (Réalisations, Équipe, Actualités)
 */
function ika_solution_custom_post_types() {
    // Réalisations CPT
    register_post_type( 'ika_realisation', array(
        'labels' => array(
            'name'               => __( 'Réalisations', 'ika-solution' ),
            'singular_name'      => __( 'Réalisation', 'ika-solution' ),
            'add_new'            => __( 'Ajouter une réalisation', 'ika-solution' ),
            'add_new_item'       => __( 'Ajouter une nouvelle réalisation', 'ika-solution' ),
            'edit_item'          => __( 'Modifier la réalisation', 'ika-solution' ),
            'new_item'           => __( 'Nouvelle réalisation', 'ika-solution' ),
            'view_item'          => __( 'Voir la réalisation', 'ika-solution' ),
            'search_items'       => __( 'Rechercher des réalisations', 'ika-solution' ),
            'not_found'          => __( 'Aucune réalisation trouvée', 'ika-solution' ),
        ),
        'public'      => true,
        'has_archive' => true,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'   => 'dashicons-portfolio',
        'show_in_rest'=> true,
    ) );

    // Équipe CPT
    register_post_type( 'ika_membre', array(
        'labels' => array(
            'name'               => __( 'Membres d\'équipe', 'ika-solution' ),
            'singular_name'      => __( 'Membre', 'ika-solution' ),
            'add_new'            => __( 'Ajouter un membre', 'ika-solution' ),
            'add_new_item'       => __( 'Ajouter un nouveau membre', 'ika-solution' ),
            'edit_item'          => __( 'Modifier le membre', 'ika-solution' ),
            'new_item'           => __( 'Nouveau membre', 'ika-solution' ),
            'view_item'          => __( 'Voir le membre', 'ika-solution' ),
            'search_items'       => __( 'Rechercher un membre', 'ika-solution' ),
            'not_found'          => __( 'Aucun membre trouvé', 'ika-solution' ),
        ),
        'public'      => true,
        'has_archive' => true,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'   => 'dashicons-id',
        'show_in_rest'=> true,
    ) );

    // Partenaires CPT
    register_post_type( 'ika_partenaire', array(
        'labels' => array(
            'name'          => __( 'Partenaires', 'ika-solution' ),
            'singular_name' => __( 'Partenaire', 'ika-solution' ),
            'add_new'       => __( 'Ajouter un partenaire', 'ika-solution' ),
            'edit_item'     => __( 'Modifier le partenaire', 'ika-solution' ),
        ),
        'public'       => true,
        'has_archive'  => false,
        'supports'     => array( 'title' ),
        'menu_icon'    => 'dashicons-awards',
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'ika_solution_custom_post_types' );

/**
 * Helper function to get asset URL.
 *
 * Accepte trois formats :
 * - URL complète (ex: https://...)  → retournée telle quelle
 * - ID d'attachment numérique       → wp_get_attachment_url()
 * - Chemin relatif (ex: images/...) → préfixé par le dossier assets/ du thème
 *
 * @param string|int $path Chemin, URL ou ID d'attachment.
 * @return string
 */
function ika_asset( $path ) {
    $path = trim( (string) $path );

    // Vide → retourne une chaîne vide.
    if ( '' === $path ) {
        return '';
    }

    // URL complète.
    if ( preg_match( '#^https?://#i', $path ) ) {
        return $path;
    }

    // ID d'attachment (média WordPress).
    if ( is_numeric( $path ) && (int) $path > 0 ) {
        $url = wp_get_attachment_url( (int) $path );
        if ( $url ) {
            return $url;
        }
        // Fallback : on essaie comme chemin relatif.
    }

    // Chemin relatif : si le fichier a été importé dans la médiathèque
    // (à l'activation du thème), on sert la copie WordPress.
    $rel = ltrim( $path, '/' );
    $map = ika_get_media_map();
    if ( isset( $map[ $rel ] ) ) {
        $url = wp_get_attachment_url( (int) $map[ $rel ] );
        if ( $url ) {
            return $url;
        }
    }

    return get_template_directory_uri() . '/assets/' . $rel;
}

/**
 * Charge les modules du thème.
 */
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/contact-form.php';
require_once get_template_directory() . '/inc/smtp-settings.php';
require_once get_template_directory() . '/inc/recommended-plugins.php';

/**
 * Classes « élément courant » du menu de repli, fidèles au site statique :
 * l'entrée de la page en cours est soulignée et colorée en bleu.
 *
 * @param string $target Identifiant d'entrée (accueil, presentation, equipe…).
 * @param bool   $mobile Vrai pour la variante menu mobile.
 * @return string Classes CSS ou chaîne vide si l'entrée n'est pas courante.
 */
function ika_nav_active( $target, $mobile = false ) {
    $active = false;

    switch ( $target ) {
        case 'accueil':
            $active = is_front_page();
            break;
        case 'presentation':
            $active = is_page( 'presentation' );
            break;
        case 'equipe':
            $active = is_page( 'equipe' );
            break;
        case 'expertises':
            $active = is_singular( 'ika_expertise' ) || is_page( 'proxmox' );
            break;
        case 'realisations':
            $active = is_page( 'realisations' ) || is_singular( 'ika_realisation' ) || is_post_type_archive( 'ika_realisation' );
            break;
        case 'solutions':
            $active = is_singular( 'ika_solution' ) || is_post_type_archive( 'ika_solution' );
            break;
        case 'actualites':
            $active = is_page( 'actualites' )
                || ( is_single() && 'post' === get_post_type() )
                || is_category()
                || is_home();
            break;
        case 'contact':
            $active = false; // ancre d'accueil gérée en JavaScript (applyNavHash).
            break;
    }

    /**
     * Filtre l'état actif d'une entrée du menu de repli.
     *
     * @param bool   $active État courant.
     * @param string $target Identifiant d'entrée.
     */
    $active = (bool) apply_filters( 'ika_nav_active', $active, $target );

    if ( ! $active ) {
        return '';
    }

    return $mobile
        ? 'bg-ikaSoft/80 font-black text-ikaBlue'
        : 'text-ikaBlue underline decoration-2 underline-offset-4 decoration-ikaBlue';
}

/**
 * URL d'une page du thème à partir de son slug, avec repli sur home_url().
 *
 * Évite les liens « realisations.php » codés en dur, invalides sous WordPress.
 *
 * @param string $slug Slug de la page.
 * @return string
 */
function ika_page_url( $slug ) {
    $page = get_page_by_path( $slug );
    return $page ? get_permalink( $page ) : home_url( '/' . ltrim( $slug, '/' ) );
}

/**
 * URL d'une expertise : lien personnalisé saisi en meta, sinon permalien.
 *
 * @param WP_Post $post Contenu de type ika_expertise.
 * @return string
 */
function ika_expertise_url( $post ) {
    $link = get_post_meta( $post->ID, 'ika_expertise_link', true );
    if ( $link ) {
        return esc_url( $link );
    }
    return esc_url( get_permalink( $post ) );
}

/**
 * Badges affichés sur les cartes de la section « produits » de l'accueil.
 *
 * Sur le site statique, ces libellés courts (ex : « Entrées / sorties »)
 * sont propres à l'accueil et différents de la liste « benefits » des pages
 * détail. Priorité au meta ika_home_tags ; repli sur benefits/features.
 *
 * @param int $post_id Identifiant de la solution.
 * @param int $count   Nombre de badges retournés.
 * @return array<int,string>
 */
function ika_get_first_benefits( $post_id, $count = 3 ) {
    $home_tags = ika_get_list_meta( $post_id, 'ika_home_tags' );
    if ( ! empty( $home_tags ) ) {
        return array_slice( $home_tags, 0, $count );
    }

    $benefits = ika_get_list_meta( $post_id, 'ika_benefits' );
    $features = ika_get_list_meta( $post_id, 'ika_features' );
    $items    = ! empty( $benefits ) ? $benefits : $features;
    return array_slice( $items, 0, $count );
}

/**
 * URL d'illustration d'un contenu : image mise en avant, puis meta, puis repli.
 *
 * @param int    $post_id  Identifiant du contenu.
 * @param string $meta_key Clé meta contenant un chemin relatif d'asset.
 * @param string $fallback Chemin d'asset de repli.
 * @return string
 */
function ika_post_image( $post_id, $meta_key = '', $fallback = 'images/slide1.jpg' ) {
    if ( has_post_thumbnail( $post_id ) ) {
        $url = get_the_post_thumbnail_url( $post_id, 'large' );
        if ( $url ) {
            return $url;
        }
    }

    if ( $meta_key ) {
        $meta = get_post_meta( $post_id, $meta_key, true );
        if ( $meta ) {
            return ika_asset( $meta );
        }
    }

    return ika_asset( $fallback );
}

/**
 * Données des slides du hero, transmises au JS via wp_localize_script.
 *
 * @return array<int,array<string,mixed>>
 */
function ika_get_hero_slides() {
    $slides = get_posts( array(
        'post_type'      => 'ika_slide',
        'posts_per_page' => 10,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ) );

    $data = array();
    foreach ( $slides as $slide ) {
        $lines = preg_split( '/\R/', (string) get_the_title( $slide ) );
        $html  = '<span class="block">' . implode( '</span> <span class="block">', array_map( 'esc_html', $lines ) ) . '</span>';

        $data[] = array(
            'eyebrow'   => get_post_meta( $slide->ID, 'ika_slide_eyebrow', true ),
            'titleHtml' => $html,
            'text'      => get_post_meta( $slide->ID, 'ika_slide_text', true ),
            'primary'   => array(
                'text' => get_post_meta( $slide->ID, 'ika_slide_primary_text', true ),
                'href' => ika_slide_url( get_post_meta( $slide->ID, 'ika_slide_primary_url', true ) ),
            ),
            'secondary' => array(
                'text' => get_post_meta( $slide->ID, 'ika_slide_secondary_text', true ),
                'href' => ika_slide_url( get_post_meta( $slide->ID, 'ika_slide_secondary_url', true ) ),
            ),
            'image'     => ika_asset( get_post_meta( $slide->ID, 'ika_slide_image', true ) ),
            'metric'    => array(
                'label' => get_post_meta( $slide->ID, 'ika_slide_metric_label', true ),
                'value' => get_post_meta( $slide->ID, 'ika_slide_metric_value', true ),
                'text'  => get_post_meta( $slide->ID, 'ika_slide_metric_text', true ),
            ),
        );
    }

    return $data;
}

/**
 * Normalise une URL de slide : ancre, URL absolue ou ancien lien « page.php ».
 *
 * @param string $url Valeur saisie dans l'administration.
 * @return string
 */
function ika_slide_url( $url ) {
    $url = trim( (string) $url );

    if ( '' === $url ) {
        return '#';
    }
    if ( '#' === $url[0] || preg_match( '#^https?://#i', $url ) ) {
        return $url;
    }
    // Ancien format hérité du site statique : « presentation.php ».
    if ( substr( $url, -4 ) === '.php' ) {
        return ika_page_url( basename( $url, '.php' ) );
    }

    return home_url( '/' . ltrim( $url, '/' ) );
}

/**
 * Create / repair the theme's default pages.
 *
 * Les pages du site statique sont recréées automatiquement et reliées au bon
 * template. Si une page existe déjà mais n'a pas le bon modèle, elle est
 * corrigée afin que l'activation du thème affiche immédiatement le site attendu.
 */
function ika_solution_create_default_pages() {
    $default_pages = array(
        'Société'      => array(
            'template' => 'page-presentation.php',
            'slug'     => 'presentation',
        ),
        'Équipe'       => array(
            'template' => 'page-equipe.php',
            'slug'     => 'equipe',
        ),
        'Réalisations' => array(
            'template' => 'page-realisations.php',
            'slug'     => 'realisations',
        ),
        'Actualités'   => array(
            'template' => 'page-actualites.php',
            'slug'     => 'actualites',
        ),
        'Proxmox'      => array(
            'template' => 'page-proxmox.php',
            'slug'     => 'proxmox',
        ),
    );

    foreach ( $default_pages as $title => $args ) {
        $page_id = ika_solution_find_page_id( $args['slug'], $title );

        if ( $page_id ) {
            wp_update_post( array(
                'ID'          => $page_id,
                'post_title'  => $title,
                'post_name'   => $args['slug'],
                'post_status' => 'publish',
            ) );
        } else {
            $page_id = wp_insert_post( array(
                'post_title'   => $title,
                'post_name'    => $args['slug'],
                'post_content' => '',
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ) );
        }

        if ( $page_id && ! is_wp_error( $page_id ) ) {
            update_post_meta( $page_id, '_wp_page_template', $args['template'] );
        }
    }
}
add_action( 'after_switch_theme', 'ika_solution_create_default_pages' );

/**
 * Helper: find a page by slug first, then by title.
 */
function ika_solution_find_page_id( $slug, $title = '' ) {
    $page = get_page_by_path( $slug, OBJECT, 'page' );
    if ( $page ) {
        return (int) $page->ID;
    }

    if ( '' === $title ) {
        return 0;
    }

    $query = new WP_Query( array(
        'post_type'              => 'page',
        'title'                  => $title,
        'post_status'            => 'any',
        'posts_per_page'         => 1,
        'fields'                 => 'ids',
        'no_found_rows'          => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false,
    ) );

    return ! empty( $query->posts ) ? (int) $query->posts[0] : 0;
}

/**
 * Helper: check whether a published page with the given title already exists.
 */
function ika_solution_page_exists( $title ) {
    return (bool) ika_solution_find_page_id( sanitize_title( $title ), $title );
}

/**
 * ----------------------------------------------------------------------------
 * Editable content infrastructure (CPTs + meta boxes)
 * Makes the previously hard-coded theme content editable from the WordPress
 * admin: product solutions, expertises, client logos and hero slides.
 * ----------------------------------------------------------------------------
 */

global $ika_meta_config;
$ika_meta_config = array(
    'ika_solution' => array(
        'box'    => 'Contenu de la solution',
        'fields' => array(
            'ika_eyebrow'   => array( 'label' => 'Surtitre (eyebrow)', 'type' => 'text' ),
            'ika_image'     => array( 'label' => 'Image (chemin relatif, ex: images/ikavisite.jpg)', 'type' => 'text' ),
            'ika_benefits'  => array( 'label' => 'Bénéfices (un par ligne)', 'type' => 'list' ),
            'ika_use_cases' => array( 'label' => 'Cas d’usage (un par ligne)', 'type' => 'list' ),
            'ika_features'  => array( 'label' => 'Fonctionnalités (un par ligne)', 'type' => 'list' ),
            'ika_brochure'  => array( 'label' => 'Brochure à télécharger (chemin relatif, ex: images/brochures/A5-visite.png)', 'type' => 'text' ),
        ),
    ),
    'ika_expertise' => array(
        'box'    => 'Contenu de l’expertise',
        'fields' => array(
            'ika_expertise_image'      => array( 'label' => 'Image (chemin relatif, ex: images/development2.jpg)', 'type' => 'text' ),
            'ika_expertise_eyebrow'    => array( 'label' => 'Surtitre (eyebrow)', 'type' => 'text' ),
            'ika_expertise_link'       => array( 'label' => 'Lien de la carte (optionnel, vide = page de l’expertise)', 'type' => 'text' ),
            'ika_expertise_card_text'  => array( 'label' => 'Texte de la carte sur l’accueil (vide = extrait)', 'type' => 'textarea' ),
            'ika_expertise_highlights' => array( 'label' => 'Points forts (un par ligne)', 'type' => 'list' ),
            'ika_expertise_capabilities' => array( 'label' => 'Capacités / actions (un par ligne)', 'type' => 'list' ),
            'ika_expertise_process'    => array( 'label' => 'Étapes du process (un par ligne)', 'type' => 'list' ),
            'ika_expertise_deliverables' => array( 'label' => 'Livrables (un par ligne)', 'type' => 'list' ),
        ),
    ),
    'ika_slide' => array(
        'box'    => 'Contenu du slide hero',
        'fields' => array(
            'ika_slide_eyebrow'       => array( 'label' => 'Surtitre', 'type' => 'text' ),
            'ika_slide_title'        => array( 'label' => 'Titre (une ligne par bloc visuel, ex: Ligne 1 / Ligne 2)', 'type' => 'textarea' ),
            'ika_slide_text'         => array( 'label' => 'Texte', 'type' => 'textarea' ),
            'ika_slide_primary_text' => array( 'label' => 'Bouton principal – texte', 'type' => 'text' ),
            'ika_slide_primary_url'  => array( 'label' => 'Bouton principal – lien', 'type' => 'text' ),
            'ika_slide_secondary_text' => array( 'label' => 'Bouton secondaire – texte', 'type' => 'text' ),
            'ika_slide_secondary_url'  => array( 'label' => 'Bouton secondaire – lien', 'type' => 'text' ),
            'ika_slide_image'        => array( 'label' => 'Image (chemin relatif, ex: images/slide11.jpg)', 'type' => 'text' ),
            'ika_slide_metric_label' => array( 'label' => 'Métrique – label', 'type' => 'text' ),
            'ika_slide_metric_value' => array( 'label' => 'Métrique – valeur', 'type' => 'text' ),
            'ika_slide_metric_text'  => array( 'label' => 'Métrique – texte', 'type' => 'text' ),
        ),
    ),
    'ika_membre' => array(
        'box'    => 'Fiche du membre',
        'fields' => array(
            'ika_membre_role'    => array( 'label' => 'Poste / fonction', 'type' => 'text' ),
            'ika_membre_image'   => array( 'label' => 'Photo (chemin relatif, ex: images/yaya.jpg) — ou utilisez l’image mise en avant', 'type' => 'text' ),
            'ika_membre_email'   => array( 'label' => 'Email (optionnel)', 'type' => 'text' ),
            'ika_membre_linkedin'=> array( 'label' => 'Profil LinkedIn (optionnel)', 'type' => 'text' ),
        ),
    ),
    'ika_realisation' => array(
        'box'    => 'Détails de la réalisation',
        'fields' => array(
            'ika_realisation_client' => array( 'label' => 'Client (ex: SONATUR)', 'type' => 'text' ),
            'ika_realisation_image'  => array( 'label' => 'Image (chemin relatif) — ou utilisez l’image mise en avant', 'type' => 'text' ),
            'ika_realisation_url'    => array( 'label' => 'Lien du projet (optionnel)', 'type' => 'text' ),
        ),
    ),
    'ika_partenaire' => array(
        'box'    => 'Logo du partenaire',
        'fields' => array(
            'ika_partenaire_image'  => array( 'label' => 'Logo (chemin relatif, ex: images/odoo.png). Vide = le nom s’affiche en texte.', 'type' => 'text' ),
            'ika_partenaire_height' => array( 'label' => 'Hauteur max (classe Tailwind : max-h-14, max-h-16, max-h-20)', 'type' => 'text' ),
            'ika_partenaire_url'    => array( 'label' => 'Lien du logo (optionnel : vide = non cliquable, ex : proxmox ou https://exemple.com)', 'type' => 'text' ),
        ),
    ),
    'ika_client' => array(
        'box'    => 'Logo du client',
        'fields' => array(
            'ika_client_image' => array( 'label' => 'Logo (chemin relatif, ex: images/clients/APEC.png)', 'type' => 'text' ),
            'ika_client_url'   => array( 'label' => 'Lien du logo (optionnel : vide = non cliquable, ex : https://exemple.com)', 'type' => 'text' ),
        ),
    ),
);

/**
 * Register the editable-content custom post types.
 */
function ika_solution_post_types() {
    register_post_type( 'ika_solution', array(
        'labels'       => array(
            'name'          => __( 'Solutions IKA', 'ika-solution' ),
            'singular_name' => __( 'Solution IKA', 'ika-solution' ),
            'add_new'       => __( 'Ajouter une solution', 'ika-solution' ),
            'edit_item'     => __( 'Modifier la solution', 'ika-solution' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'    => 'dashicons-lightbulb',
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'solutions' ),
    ) );

    register_post_type( 'ika_expertise', array(
        'labels'       => array(
            'name'          => __( 'Expertises', 'ika-solution' ),
            'singular_name' => __( 'Expertise', 'ika-solution' ),
            'add_new'       => __( 'Ajouter une expertise', 'ika-solution' ),
            'edit_item'     => __( 'Modifier l’expertise', 'ika-solution' ),
        ),
        'public'       => true,
        'has_archive'  => false,
        'supports'     => array( 'title', 'editor' ),
        'menu_icon'    => 'dashicons-admin-tools',
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'expertises' ),
    ) );

    register_post_type( 'ika_client', array(
        'labels'       => array(
            'name'          => __( 'Clients', 'ika-solution' ),
            'singular_name' => __( 'Client', 'ika-solution' ),
            'add_new'       => __( 'Ajouter un client', 'ika-solution' ),
            'edit_item'     => __( 'Modifier le client', 'ika-solution' ),
        ),
        'public'       => true,
        'has_archive'  => false,
        'supports'     => array( 'title' ),
        'menu_icon'    => 'dashicons-businessman',
        'show_in_rest' => true,
    ) );

    register_post_type( 'ika_slide', array(
        'labels'       => array(
            'name'          => __( 'Slides hero', 'ika-solution' ),
            'singular_name' => __( 'Slide hero', 'ika-solution' ),
            'add_new'       => __( 'Ajouter un slide', 'ika-solution' ),
            'edit_item'     => __( 'Modifier le slide', 'ika-solution' ),
        ),
        'public'       => true,
        'has_archive'  => false,
        'supports'     => array( 'title' ),
        'menu_icon'    => 'dashicons-images-alt2',
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'ika_solution_post_types' );

/**
 * Register the meta boxes for the configured post types.
 */
function ika_solution_add_meta_boxes() {
    global $ika_meta_config;
    foreach ( array_keys( $ika_meta_config ) as $post_type ) {
        add_meta_box(
            'ika_meta_' . $post_type,
            $ika_meta_config[ $post_type ]['box'],
            'ika_solution_meta_box_render',
            $post_type,
            'normal',
            'default'
        );
    }
}
add_action( 'add_meta_boxes', 'ika_solution_add_meta_boxes' );

/**
 * Render a configured meta box.
 */
function ika_solution_meta_box_render( $post ) {
    global $ika_meta_config;
    $post_type = get_post_type( $post );
    if ( empty( $ika_meta_config[ $post_type ] ) ) {
        return;
    }
    wp_nonce_field( 'ika_meta_box_' . $post_type, 'ika_meta_box_nonce' );
    foreach ( $ika_meta_config[ $post_type ]['fields'] as $key => $field ) {
        $value     = get_post_meta( $post->ID, $key, true );
        $list      = is_array( $value ) ? implode( "\n", $value ) : $value;
        $is_media  = ( false !== strpos( $key, 'image' ) || false !== strpos( $key, 'brochure' ) || false !== strpos( $key, 'photo' ) );

        echo '<p style="margin:1em 0"><label class="ika-meta-label" for="' . esc_attr( $key ) . '" style="display:block;font-weight:700;margin-bottom:.4em">' . esc_html( $field['label'] ) . '</label>';

        if ( 'list' === $field['type'] ) {
            echo '<textarea id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" rows="5" style="width:100%">' . esc_textarea( $list ) . '</textarea>';
        } elseif ( 'textarea' === $field['type'] ) {
            echo '<textarea id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" rows="3" style="width:100%">' . esc_textarea( $list ) . '</textarea>';
        } else {
            echo '<input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" value="' . esc_attr( $list ) . '" style="width:100%">';
        }

        // Bouton "Choisir depuis la médiathèque" pour les champs image/logo/brochure.
        if ( $is_media ) {
            echo '<button type="button" class="button ika-media-upload" data-field="' . esc_attr( $key ) . '" style="margin-top:6px;">' . esc_html__( 'Choisir depuis la médiathèque', 'ika-solution' ) . '</button> ';
            echo '<button type="button" class="button ika-media-remove" data-field="' . esc_attr( $key ) . '" style="margin-top:6px;">' . esc_html__( 'Supprimer', 'ika-solution' ) . '</button>';
            echo '<div id="' . esc_attr( $key ) . '_preview" style="margin-top:6px;">';
            if ( $value && ! is_array( $value ) ) {
                $preview_url = ika_asset( $value );
                echo '<img src="' . esc_url( $preview_url ) . '" style="max-width:200px;max-height:120px;border-radius:8px;">';
            }
            echo '</div>';
        }

        echo '</p>';
    }
}

/**
 * Save the configured meta values.
 */
function ika_solution_meta_box_save( $post_id ) {
    global $ika_meta_config;
    $post_type = get_post_type( $post_id );
    if ( empty( $ika_meta_config[ $post_type ] ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( ! isset( $_POST['ika_meta_box_nonce'] ) || ! wp_verify_nonce( wp_unslash( $_POST['ika_meta_box_nonce'] ), 'ika_meta_box_' . $post_type ) ) {
        return;
    }
    foreach ( $ika_meta_config[ $post_type ]['fields'] as $key => $field ) {
        if ( ! isset( $_POST[ $key ] ) ) {
            continue;
        }
        if ( 'list' === $field['type'] ) {
            $items = array_filter( array_map( 'trim', explode( "\n", wp_unslash( $_POST[ $key ] ) ) ), 'strlen' );
            update_post_meta( $post_id, $key, array_values( $items ) );
        } elseif ( 'textarea' === $field['type'] ) {
            update_post_meta( $post_id, $key, sanitize_textarea_field( wp_unslash( $_POST[ $key ] ) ) );
        } else {
            update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
        }
    }
}
add_action( 'save_post', 'ika_solution_meta_box_save' );

/**
 * Helper: read a list-type meta value as an array.
 */
function ika_get_list_meta( $post_id, $key ) {
    $value = get_post_meta( $post_id, $key, true );
    return is_array( $value ) ? $value : array();
}

/**
 * Helper: check whether a CPT post already exists for a given slug.
 */
function ika_solution_cpt_exists( $post_type, $slug ) {
    $query = new WP_Query( array(
        'post_type'      => $post_type,
        'name'           => $slug,
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'no_found_rows'  => true,
    ) );
    return $query->have_posts();
}


/**
 * Helper: retourne l'identifiant d'un contenu par slug et type.
 */
function ika_solution_get_post_id_by_slug( $post_type, $slug ) {
    $post = get_page_by_path( $slug, OBJECT, $post_type );
    return $post ? (int) $post->ID : 0;
}

/**
 * Helper: met à jour un champ standard uniquement s'il est vide.
 * Ainsi le thème répare les données manquantes sans écraser les modifications
 * faites ensuite dans l'administration.
 */
function ika_solution_update_post_field_if_empty( $post_id, $field, $value ) {
    if ( '' === (string) $value ) {
        return;
    }

    $post = get_post( $post_id );
    if ( ! $post || ! property_exists( $post, $field ) ) {
        return;
    }

    if ( '' !== trim( (string) $post->{$field} ) ) {
        return;
    }

    wp_update_post( array(
        'ID'   => $post_id,
        $field => $value,
    ) );
}

/**
 * Helper: met à jour une meta uniquement si elle est absente/vide.
 */
function ika_solution_update_meta_if_empty( $post_id, $key, $value ) {
    $current        = get_post_meta( $post_id, $key, true );
    $is_empty_array = is_array( $current ) && empty( $current );
    if ( '' === $current || null === $current || $is_empty_array ) {
        update_post_meta( $post_id, $key, $value );
    }
}

/**
 * Seed the editable content from the previously hard-coded theme data.
 * Idempotent: it only creates items that do not already exist.
 */
function ika_seed_solutions() {
    $brochures = array(
        'ika-visite'   => 'images/brochures/A5-visite.png',
        'ika-courrier' => 'images/brochures/A5courier.png',
        'ika-archive'  => 'images/brochures/A5-archive.png',
        'ika-portail'  => 'images/brochures/A5-portail.png',
    );
    $solutions = array(
        'ika-visite' => array(
            'title'       => 'IKA VISITE',
            'eyebrow'     => 'Accueil et sécurité',
            'image'       => 'images/ikavisite.jpg',
            'home_tags'   => array( 'Accès sécurisés', 'Identification', 'Entrées / sorties' ),
            'intro'       => 'IKA VISITE permet de gérer, suivre et optimiser vos visites en toute simplicité. La solution sécurise les accès, identifie les visiteurs, suit les heures d\'entrée et de sortie et propose des interfaces ergonomiques pour les agents d\'accueil.',
            'description' => 'IKA VISITE simplifie la gestion des visiteurs tout en renforçant la sécurité des accès. La solution permet d’identifier les visiteurs, suivre les heures d’entrée et de sortie, organiser les passages et offrir aux agents une interface claire pour mieux piloter l’accueil.',
            'features'    => array(
                'Gestion et sécurisation des accès pour mieux contrôler les entrées dans vos locaux.',
                'Identification des visiteurs avec les informations utiles au suivi de chaque passage.',
                'Suivi des heures d’entrée et de sortie pour garder une traçabilité claire des visites.',
                'Interfaces ergonomiques pour une prise en main rapide par les agents d’accueil.',
                'Historique des visites pour consulter les passages et retrouver rapidement une information.',
                'Organisation des flux visiteurs afin de simplifier l’accueil et renforcer l’image professionnelle.',
            ),
            'benefits'    => array( 'Visites simplifiées', 'Accès sécurisés', 'Traçabilité complète', 'Interface ergonomique' ),
            'use_cases'   => array( 'Institutions publiques', 'Entreprises privées', 'ONG et projets', 'Sites avec contrôle d’accès' ),
        ),
        'ika-courrier' => array(
            'title'       => 'IKA COURRIER',
            'eyebrow'     => 'Gestion administrative',
            'image'       => 'images/ikacourrier.jpg',
            'home_tags'   => array( 'Documents', 'Utilisateurs & rôles', 'Workflows' ),
            'intro'       => 'IKA COURRIER met fin aux recherches interminables avec une gestion intelligente des documents, des utilisateurs et des rôles. La solution facilite l\'intégration de nouveaux modules et personnalise les workflows pour automatiser vos processus.',
            'description' => 'IKA COURRIER facilite la gestion intelligente des documents et automatise les processus administratifs. La solution intègre la gestion des utilisateurs et des rôles, l’ajout de nouveaux modules et la personnalisation des workflows selon vos circuits internes.',
            'features'    => array(
                'Gestion intelligente des documents pour classer, retrouver et suivre les informations sans recherches interminables.',
                'Gestion des utilisateurs et des rôles afin de contrôler les accès et responsabilités.',
                'Intégration facile de nouveaux modules pour faire évoluer la plateforme selon les besoins.',
                'Workflows personnalisés pour automatiser les processus de validation et de traitement.',
                'Suivi des dossiers et documents à chaque étape du circuit administratif.',
                'Centralisation des échanges pour réduire les pertes, doublons et retards.',
            ),
            'benefits'    => array( 'Documents centralisés', 'Rôles maîtrisés', 'Modules évolutifs', 'Workflows automatisés' ),
            'use_cases'   => array( 'Directions générales', 'Secrétariats', 'Administrations', 'Services courrier' ),
        ),
        'ika-archive' => array(
            'title'       => 'IKA ARCHIVE',
            'eyebrow'     => 'Gestion documentaire',
            'image'       => 'images/ikaarchive.jpg',
            'home_tags'   => array( 'Indexation', 'Recherche', 'Conservation' ),
            'intro'       => 'IKA ARCHIVE facilite le classement, la conservation et la recherche de documents sensibles ou volumineux. Indexation, filtres, accès contrôlés et organisation par dossiers permettent de retrouver rapidement l\'information et de mieux sécuriser le patrimoine documentaire.',
            'description' => 'IKA ARCHIVE facilite la conservation et l’exploitation des documents importants. La solution aide à structurer les dossiers, indexer les documents, contrôler les accès et retrouver rapidement l’information utile sans dépendre uniquement des armoires physiques ou de dossiers dispersés.',
            'features'    => array(
                'Classement par dossiers, catégories, services, années, types de documents et mots-clés.',
                'Indexation des documents avec métadonnées pour accélérer la recherche.',
                'Recherche multicritère, filtres avancés et consultation rapide des pièces numérisées.',
                'Gestion des droits d’accès selon les profils, services et niveaux de confidentialité.',
                'Suivi des mouvements, consultations, ajouts et modifications pour renforcer la traçabilité.',
                'Organisation du cycle de vie documentaire : conservation, consultation, export et sécurisation.',
            ),
            'benefits'    => array( 'Recherche rapide', 'Documents sécurisés', 'Classement normalisé', 'Mémoire préservée' ),
            'use_cases'   => array( 'Archives administratives', 'Dossiers RH', 'Documents juridiques', 'Patrimoine documentaire' ),
        ),
        'ika-portail' => array(
            'title'       => 'IKA PORTAIL',
            'eyebrow'     => 'Portail digital sécurisé',
            'image'       => 'images/ikaportail.jpg',
            'home_tags'   => array( 'Accès', 'Circuit de validation', 'Tableaux de bord' ),
            'intro'       => 'IKA PORTAIL crée un espace digital sécurisé pour connecter clients, agents, partenaires et services internes. La plateforme centralise les demandes, circuits de validation, tableaux de bord et notifications afin de simplifier les échanges et améliorer le pilotage.',
            'description' => 'IKA PORTAIL crée un espace digital adapté aux échanges entre clients, usagers, agents, partenaires et services internes. Il permet de centraliser les demandes, suivre les traitements, automatiser les circuits de validation et offrir une interface claire à chaque profil utilisateur.',
            'features'    => array(
                'Espace sécurisé avec authentification, profils utilisateurs et droits d’accès.',
                'Dépôt et suivi de demandes, dossiers, formulaires ou services en ligne.',
                'Circuits de validation paramétrables selon les rôles et les niveaux de responsabilité.',
                'Notifications, suivi des statuts et historique des actions pour chaque dossier.',
                'Tableaux de bord pour piloter les volumes, délais, demandes en attente et performances.',
                'Intégration possible avec applications métiers, bases de données ou services existants.',
            ),
            'benefits'    => array( 'Services centralisés', 'Suivi transparent', 'Validation accélérée', 'Expérience utilisateur claire' ),
            'use_cases'   => array( 'Portails clients', 'Portails agents', 'Services en ligne', 'Suivi de dossiers' ),
        ),
    );

    foreach ( $solutions as $slug => $data ) {
        $id = ika_solution_get_post_id_by_slug( 'ika_solution', $slug );

        if ( ! $id ) {
            $id = wp_insert_post( array(
                'post_type'    => 'ika_solution',
                'post_name'    => $slug,
                'post_title'   => $data['title'],
                'post_excerpt' => $data['intro'],
                'post_content' => $data['description'],
                'post_status'  => 'publish',
            ) );
        } else {
            ika_solution_update_post_field_if_empty( $id, 'post_excerpt', $data['intro'] );
            ika_solution_update_post_field_if_empty( $id, 'post_content', $data['description'] );
        }

        if ( $id && ! is_wp_error( $id ) ) {
            ika_solution_update_meta_if_empty( $id, 'ika_eyebrow', $data['eyebrow'] );
            ika_solution_update_meta_if_empty( $id, 'ika_image', $data['image'] );
            ika_solution_update_meta_if_empty( $id, 'ika_features', $data['features'] );
            if ( isset( $brochures[ $slug ] ) ) {
                ika_solution_update_meta_if_empty( $id, 'ika_brochure', $brochures[ $slug ] );
            }
            ika_solution_update_meta_if_empty( $id, 'ika_home_tags', $data['home_tags'] );
            ika_solution_update_meta_if_empty( $id, 'ika_benefits', $data['benefits'] );
            ika_solution_update_meta_if_empty( $id, 'ika_use_cases', $data['use_cases'] );
        }
    }
}

/**
 * Données par défaut des expertises = contenu EXACT du site statique.
 *
 * - 'intro' : phrase d'accroche de la page détail (extrait WordPress) ;
 * - 'card'  : texte de la carte sur la page d'accueil (différent de l'intro,
 *             comme sur le site statique) — meta ika_expertise_card_text ;
 * - le reste alimente les sections « Capacités / Process / Livrables ».
 *
 * @return array<string,array<string,mixed>>
 */
function ika_get_default_expertises() {
    return array(
        'developpement-app' => array(
            'title'       => "Développement & intégration d’applications",
            'image'       => 'images/development2.jpg',
            'eyebrow'     => 'Applications métier',
            'intro'       => 'Des applications web, mobiles et portails conçus pour automatiser vos processus, connecter vos équipes et fiabiliser vos opérations.',
            'card'        => "Applications web, mobiles, portails et intégrations adaptées à vos processus métier.",
            'description' => "IKA SOLUTION conçoit des solutions digitales adaptées à votre organisation : plateformes de gestion, portails clients, espaces internes, workflows de validation, tableaux de bord et connexions avec vos outils existants. L’objectif est simple : transformer vos méthodes de travail en applications fiables, sécurisées et faciles à utiliser.",
            'highlights'  => array('Applications web et mobiles', 'Portails sécurisés', 'Intégrations API et métiers'),
            'capabilities' => array(
                'Analyse des besoins, cartographie des processus et rédaction des spécifications fonctionnelles.',
                "Développement d’applications web, mobiles, intranet, extranet et portails métiers.",
                "Intégration avec bases de données, services tiers, outils internes, API et systèmes existants.",
                "Mise en place de rôles utilisateurs, circuits de validation, notifications et tableaux de bord.",
                "Sécurisation des accès, sauvegarde, journalisation et gestion des droits.",
                'Recette, formation, documentation et accompagnement après mise en production.',
            ),
            'process'     => array('Cadrage du besoin', 'Prototype fonctionnel', 'Développement itératif', 'Déploiement et support'),
            'deliverables' => array("Application prête à l’usage", 'Documentation technique et utilisateur', 'Formation des administrateurs', 'Plan de maintenance évolutive'),
        ),
        'infrastructures-serveurs-reseaux' => array(
            'title'       => 'Infrastructures serveurs & réseaux',
            'image'       => 'images/slide4.jpg',
            'eyebrow'     => 'Socle technique',
            'intro'       => "Premier fournisseur de services d’hébergement avec des datacenters locaux au Burkina Faso, IKA SOLUTION garantit une infrastructure de pointe sur le sol national.",
            'card'        => "Premier fournisseur de services d’hébergement avec des datacenters locaux au Burkina Faso. Une infrastructure de pointe sur le sol national.",
            'description' => "Avec IKA Cloud, nous accompagnons les entreprises et institutions dans l’hébergement local, la vente de noms de domaine, les serveurs dédiés, les VPS, les réseaux et la continuité de service. Nos datacenters au Burkina Faso permettent de rapprocher vos données de vos utilisateurs, de renforcer la souveraineté numérique et de garantir un socle technique fiable pour vos applications critiques.",
            'highlights'  => array('Datacenters locaux', 'Hébergement IKA Cloud', 'Noms de domaine'),
            'capabilities' => array(
                "Audit de l’existant, inventaire des équipements et identification des points de risque.",
                "Hébergement local via IKA Cloud : sites web, applications, VPS, serveurs dédiés et sauvegardes.",
                'Vente, configuration et gestion de noms de domaine, DNS, certificats SSL et messagerie associée.',
                "Conception d’architectures LAN, Wi-Fi, interconnexion de sites et segmentation réseau.",
                "Installation et configuration de serveurs physiques, virtuels, systèmes Linux et Windows.",
                "Câblage, brassage, baie informatique, documentation réseau et plan d’adressage.",
                'Maintenance préventive, suivi des performances et assistance aux équipes techniques.',
            ),
            'process'     => array('Audit terrain', 'Architecture cible', 'Hébergement et domaines', 'Supervision continue'),
            'deliverables' => array('Hébergement IKA Cloud opérationnel', 'Noms de domaine configurés', 'Schéma réseau', 'Plan de maintenance'),
        ),
        'solutions-cloud-licences' => array(
            'title'       => 'Solutions cloud & licences logicielles',
            'image'       => 'images/cloud2.jpg',
            'eyebrow'     => 'Cloud et productivité',
            'intro'       => 'Des solutions Microsoft 365, Fortinet, Odoo, cloud et licences logicielles sélectionnées pour vos besoins réels.',
            'card'        => "Microsoft 365, Fortinet, Odoo, cloud, licences professionnelles et solutions logicielles pour vos équipes.",
            'description' => "IKA SOLUTION vous accompagne dans le choix, la fourniture, la configuration et l’administration de solutions cloud et licences professionnelles : Microsoft 365 pour la collaboration et la messagerie, Fortinet pour la sécurité réseau, Odoo pour la gestion d’entreprise, ainsi que les services cloud, VPS, sauvegarde et outils de productivité adaptés à vos équipes.",
            'highlights'  => array('Microsoft 365', 'Fortinet', 'Odoo'),
            'capabilities' => array(
                'Conseil sur le choix des offres cloud, licences, serveurs virtuels et solutions SaaS.',
                'Fourniture, configuration et administration de Microsoft 365 : messagerie, comptes, collaboration et sécurité.',
                "Déploiement de solutions Fortinet pour firewall, protection réseau, VPN et sécurisation des accès.",
                "Intégration et paramétrage d’Odoo pour CRM, ventes, facturation, stock, RH et processus métiers.",
                'Configuration de noms de domaine, DNS, certificats, messagerie et hébergement web.',
                "Gestion du cycle de vie des licences, renouvellements et conformité d’usage.",
                'Support local pour l’administration, la migration et l’évolution des services.',
            ),
            'process'     => array('Choix de solution', 'Activation des licences', 'Configuration et migration', 'Administration suivie'),
            'deliverables' => array('Microsoft 365 configuré', 'Solutions Fortinet déployées', 'Odoo paramétré', 'Support de gestion'),
        ),
        'conseil-audit-strategie-it' => array(
            'title'       => 'Conseil, audit & stratégie IT',
            'image'       => 'images/conseil2.jpg',
            'eyebrow'     => 'Pilotage digital',
            'intro'       => 'Un accompagnement clair pour diagnostiquer votre système d’information, prioriser vos projets et sécuriser vos choix techniques.',
            'card'        => "Diagnostic, cadrage, feuille de route, choix techniques et accompagnement à la décision.",
            'description' => "Avant d’investir dans un logiciel, un réseau ou une infrastructure, il faut comprendre les enjeux, les dépendances et les risques. IKA SOLUTION vous aide à poser un diagnostic fiable, définir une feuille de route réaliste et choisir les solutions qui servent réellement vos objectifs.",
            'highlights'  => array('Audit SI', 'Feuille de route digitale', 'Aide à la décision'),
            'capabilities' => array(
                'Audit des applications, équipements, pratiques utilisateurs, données et procédures.',
                'Identification des risques, irritants opérationnels, doublons et faiblesses de sécurité.',
                "Définition d’une stratégie IT alignée avec les priorités métiers et le budget.",
                "Rédaction de cahiers des charges, termes de référence et dossiers de consultation.",
                "Assistance au choix de solutions, prestataires, architectures et méthodes de déploiement.",
                'Suivi de projet, gouvernance, indicateurs et accompagnement au changement.',
            ),
            'process'     => array('Diagnostic', 'Priorisation', 'Feuille de route', 'Accompagnement'),
            'deliverables' => array("Rapport d’audit", 'Plan d’action priorisé', 'Cahier des charges', 'Recommandations budgétaires'),
        ),
        'cybersecurite-donnees' => array(
            'title'       => "Cybersécurité & protection des données",
            'image'       => 'images/securite.jpg',
            'eyebrow'     => 'Protection numérique',
            'intro'       => 'Des mesures concrètes pour protéger vos accès, vos données, vos sauvegardes et la continuité de vos services.',
            'card'        => "Contrôle d’accès, sauvegarde, continuité de service et sécurisation des systèmes critiques.",
            'description' => "La sécurité numérique doit être intégrée dans les usages quotidiens : comptes utilisateurs, sauvegardes, postes de travail, serveurs, applications, messagerie et procédures de reprise. Nous mettons en place une protection pragmatique, adaptée à votre niveau de risque.",
            'highlights'  => array("Contrôle d’accès", 'Sauvegarde et reprise', 'Durcissement des systèmes'),
            'capabilities' => array(
                "Évaluation des risques, contrôle des accès et revue des pratiques de sécurité.",
                "Mise en place de politiques de mots de passe, profils utilisateurs et droits applicatifs.",
                'Sauvegardes automatisées, tests de restauration et plans de continuité.',
                "Sécurisation des serveurs, postes, messagerie, réseau et services exposés.",
                "Sensibilisation des utilisateurs aux risques courants et aux bons réflexes.",
                "Suivi des incidents, journalisation et recommandations d’amélioration continue.",
            ),
            'process'     => array("Évaluation", "Priorisation des risques", "Mise en sécurité", 'Contrôle régulier'),
            'deliverables' => array('Rapport de sécurité', 'Plan de sauvegarde', 'Politiques d’accès', 'Guide de bonnes pratiques'),
        ),
        'support-technique-infogerance' => array(
            'title'       => 'Support technique & infogérance',
            'image'       => 'images/support2.png',
            'eyebrow'     => 'Exploitation IT',
            'intro'       => 'Une assistance réactive pour maintenir vos postes, serveurs, réseaux, applications et services numériques en bon état.',
            'card'        => "Assistance, supervision, maintenance préventive et suivi opérationnel des plateformes.",
            'description' => "IKA SOLUTION prend en charge le suivi quotidien de vos environnements techniques : support utilisateur, maintenance préventive, surveillance des services, gestion des incidents et amélioration continue. L’objectif est de réduire les interruptions et de garder vos équipes concentrées sur leur métier.",
            'highlights'  => array('Support utilisateur', 'Maintenance préventive', 'Supervision technique'),
            'capabilities' => array(
                'Assistance aux utilisateurs sur postes, logiciels, messagerie, accès et périphériques.',
                'Maintenance préventive des serveurs, réseaux, sauvegardes et équipements critiques.',
                "Gestion des incidents, qualification, résolution, escalade et compte rendu.",
                'Supervision des services essentiels et suivi des indicateurs de disponibilité.',
                'Administration courante des comptes, droits, licences, mises à jour et configurations.',
                "Documentation des interventions et recommandations pour améliorer la fiabilité.",
            ),
            'process'     => array('Prise en charge', 'Diagnostic', 'Résolution', 'Suivi préventif'),
            'deliverables' => array("Rapports d’intervention", 'Tableau de suivi', 'Plan de maintenance', 'Support continu'),
        ),
        'equipements-services-energetiques' => array(
            'title'       => "Équipements & services énergétiques",
            'image'       => 'images/energie2.jpg',
            'eyebrow'     => 'Continuité énergétique',
            'intro'       => 'Des solutions pour protéger vos équipements informatiques contre les coupures, variations électriques et interruptions de service.',
            'card'        => "Onduleurs, groupes électrogènes, solutions solaires et continuité énergétique.",
            'description' => "La performance informatique dépend aussi de la qualité de l’alimentation électrique. Nous accompagnons les organisations dans le choix et la mise en place d’onduleurs, groupes électrogènes, solutions solaires et dispositifs de continuité adaptés aux serveurs, réseaux et postes critiques.",
            'highlights'  => array('Onduleurs', 'Groupes et solaire', 'Protection des équipements'),
            'capabilities' => array(
                'Analyse des besoins électriques des postes, serveurs, baies réseau et équipements sensibles.',
                "Conseil sur le choix d’onduleurs, batteries, groupes électrogènes et solutions solaires.",
                'Installation, raccordement, tests de charge et vérification de l’autonomie.',
                'Protection contre les variations, surtensions et interruptions imprévues.',
                'Maintenance préventive, remplacement de batteries et suivi de l’état des équipements.',
                "Documentation des capacités, consignes d’usage et procédures de bascule.",
            ),
            'process'     => array('Dimensionnement', 'Choix équipement', 'Installation', 'Tests et maintenance'),
            'deliverables' => array('Plan de continuité énergétique', 'Équipements installés', "Fiche d’autonomie", "Consignes d’exploitation"),
        ),
        'formation-utilisateurs' => array(
            'title'       => 'Formation & accompagnement utilisateurs',
            'image'       => 'images/formation2.jpg',
            'eyebrow'     => 'Adoption digitale',
            'intro'       => 'Des formations pratiques pour aider vos équipes à adopter les outils numériques et à travailler avec plus d’autonomie.',
            'card'        => "Prise en main, documentation, transfert de compétences et adoption des outils.",
            'description' => "Un projet digital réussit quand les utilisateurs comprennent l’outil, savent l’exploiter et adoptent les bons réflexes. IKA SOLUTION prépare vos équipes à l’usage quotidien des applications, plateformes, services cloud, procédures de sécurité et méthodes de travail associées.",
            'highlights'  => array('Prise en main', 'Documentation', 'Transfert de compétences'),
            'capabilities' => array(
                'Conception de modules de formation adaptés aux profils utilisateurs et administrateurs.',
                'Sessions pratiques sur applications métiers, portails, messagerie, cloud et outils internes.',
                "Création de guides utilisateurs, supports de formation et procédures simples.",
                "Accompagnement lors du démarrage, assistance terrain et suivi des difficultés.",
                "Formation aux bonnes pratiques de sécurité, sauvegarde, accès et gestion documentaire.",
                "Évaluation de la prise en main et recommandations pour renforcer l’adoption.",
            ),
            'process'     => array('Analyse des profils', 'Supports adaptés', 'Formation pratique', 'Suivi post-formation'),
            'deliverables' => array('Supports de cours', 'Guides utilisateurs', 'Sessions pratiques', 'Bilan de formation'),
        ),
    );
}

function ika_seed_expertises() {
    $expertises = ika_get_default_expertises();
    $order = 0;
    foreach ( $expertises as $slug => $data ) {
        $order++;
        $id = ika_solution_get_post_id_by_slug( 'ika_expertise', $slug );

        if ( ! $id ) {
            $id = wp_insert_post( array(
                'post_type'    => 'ika_expertise',
                'post_name'    => $slug,
                'post_title'   => $data['title'],
                'post_content' => $data['description'],
                'post_excerpt' => $data['intro'],
                'menu_order'   => $order,
                'post_status'  => 'publish',
            ) );
        } else {
            wp_update_post( array(
                'ID'         => $id,
                'menu_order' => $order,
            ) );
            ika_solution_update_post_field_if_empty( $id, 'post_excerpt', $data['intro'] );
            ika_solution_update_post_field_if_empty( $id, 'post_content', $data['description'] );
        }

        if ( $id && ! is_wp_error( $id ) ) {
            ika_solution_update_meta_if_empty( $id, 'ika_expertise_image', $data['image'] );
            ika_solution_update_meta_if_empty( $id, 'ika_expertise_eyebrow', $data['eyebrow'] );
            ika_solution_update_meta_if_empty( $id, 'ika_expertise_card_text', $data['card'] );
            ika_solution_update_meta_if_empty( $id, 'ika_expertise_highlights', $data['highlights'] );
            ika_solution_update_meta_if_empty( $id, 'ika_expertise_capabilities', $data['capabilities'] );
            ika_solution_update_meta_if_empty( $id, 'ika_expertise_process', $data['process'] );
            ika_solution_update_meta_if_empty( $id, 'ika_expertise_deliverables', $data['deliverables'] );
        }
    }
}

function ika_seed_clients() {
    // Ordre et libellés strictement identiques au site statique.
    $clients = array(
        'sonatur'  => array( 'title' => 'SONATUR', 'image' => 'images/clients/Sonatur.png' ),
        'sonabhy'  => array( 'title' => 'SONABHY', 'image' => 'images/clients/sonabhy.png' ),
        'onea'     => array( 'title' => 'ONEA', 'image' => 'images/clients/ONEA.jpg' ),
        'lonab'    => array( 'title' => 'LONAB', 'image' => 'images/clients/Lonab.png' ),
        'coris'    => array( 'title' => 'CORIS BANK', 'image' => 'images/clients/coris.jpg' ),
        'apec'     => array( 'title' => 'APEC', 'image' => 'images/clients/APEC.png' ),
    );
    $order = 0;
    foreach ( $clients as $slug => $data ) {
        $order++;
        $id = ika_solution_get_post_id_by_slug( 'ika_client', $slug );

        if ( ! $id ) {
            $id = wp_insert_post( array(
                'post_type'   => 'ika_client',
                'post_name'   => $slug,
                'post_title'  => $data['title'],
                'menu_order'  => $order,
                'post_status' => 'publish',
            ) );
        } else {
            wp_update_post( array(
                'ID'         => $id,
                'menu_order' => $order,
            ) );
        }

        if ( $id && ! is_wp_error( $id ) ) {
            ika_solution_update_meta_if_empty( $id, 'ika_client_image', $data['image'] );
        }
    }
}

function ika_seed_slides() {
    $slides = array(
        'slide-1' => array(
            'title'       => "Votre transformation digitale\ncommence ici !",
            'eyebrow'     => 'La solution qui vous convient | Depuis 2014',
            'text'        => 'Nous analysons vos besoins, structurons vos priorités et mettons en place les outils numériques qui rendent vos opérations plus simples, plus fiables et mieux suivies.',
            'primary_text'=> 'Découvrir nos expertises', 'primary_url' => '#expertises',
            'secondary_text'=> 'Parler à un expert', 'secondary_url' => '#contact',
            'image'       => 'images/slide11.jpg',
            'metric_label'=> 'Depuis 2014', 'metric_value' => 'Expert digital', 'metric_text' => 'Conseil, logiciels, réseaux, cloud et sécurité.',
        ),
        'slide-2' => array(
            'title'       => "Nous boostons votre\nproductivité !",
            'eyebrow'     => 'Performance opérationnelle | Automatisation et pilotage',
            'text'        => 'Nous supprimons les tâches répétitives, automatisons vos circuits de validation et connectons vos outils pour aider vos équipes à travailler plus vite, avec moins d\'erreurs.',
            'primary_text'=> 'Voir nos solutions', 'primary_url' => '#produits',
            'secondary_text'=> 'Nos réalisations', 'secondary_url' => '#realisations',
            'image'       => 'images/slide2.jpg',
            'metric_label'=> 'Suites opérationnelles', 'metric_value' => 'Vite et bien', 'metric_text' => 'Vous serez surement le prochain partenaire satisfaits !',
        ),
        'slide-3' => array(
            'title'       => "Nos solutions métiers\nsur mesure",
            'eyebrow'     => 'Logiciels IKA | Applications, portails et intégrations',
            'text'        => 'Chaque métier a ses contraintes. Nous concevons des portails, workflows, applications et intégrations adaptés à vos règles internes et à votre manière de travailler.',
            'primary_text'=> 'Découvrir nos solutions', 'primary_url' => '#produits',
            'secondary_text'=> 'Lancer un projet', 'secondary_url' => '#contact',
            'image'       => 'images/slide3.jpg',
            'metric_label'=> 'Sur mesure', 'metric_value' => 'Solutions métier', 'metric_text' => 'Visite, courrier, archive et portail sécurisé.',
        ),
        'slide-4' => array(
            'title'       => "Hébergement local\nau Burkina Faso",
            'eyebrow'     => 'Cloud local | VPS, domaine .bf, sauvegarde et support',
            'text'        => 'Hébergez vos sites, applications et données plus près de vos utilisateurs avec une infrastructure locale, un support réactif et une meilleure maîtrise de vos environnements critiques.',
            'primary_text'=> 'Voir l\'hébergement', 'primary_url' => '#hosting',
            'secondary_text'=> 'Demander un devis', 'secondary_url' => '#contact',
            'image'       => 'images/slide4.jpg',
            'metric_label'=> 'Local', 'metric_value' => 'VPS & cloud', 'metric_text' => 'Hébergement, sauvegarde, supervision et domaines .bf.',
        ),
    );
    $order = 0;
    foreach ( $slides as $slug => $data ) {
        $order++;
        $id = ika_solution_get_post_id_by_slug( 'ika_slide', $slug );

        if ( ! $id ) {
            $id = wp_insert_post( array(
                'post_type'   => 'ika_slide',
                'post_name'   => $slug,
                'post_title'  => $data['title'],
                'menu_order'  => $order,
                'post_status' => 'publish',
            ) );
        } else {
            wp_update_post( array(
                'ID'         => $id,
                'menu_order' => $order,
            ) );
        }

        if ( $id && ! is_wp_error( $id ) ) {
            foreach ( $data as $k => $v ) {
                if ( in_array( $k, array( 'title' ), true ) ) {
                    continue;
                }
                ika_solution_update_meta_if_empty( $id, 'ika_slide_' . $k, $v );
            }
        }
    }
}


/**
 * Données par défaut : membres de l'équipe (identiques au site statique).
 */
function ika_get_default_membres() {
    return array(
        'yaya-ouattara' => array(
            'name'  => 'Yaya OUATTARA',
            'role'  => 'Directeur Général',
            'image' => 'images/yaya.jpg',
            'bio'   => "Définit la vision stratégique de l'entreprise et accompagne les clients dans la transformation de leurs enjeux digitaux.",
        ),
        'serge-gedeon-oue' => array(
            'name'  => 'SERGE GEDEON OUE',
            'role'  => 'Développeur Full-Stack',
            'image' => 'images/Serge.jpg',
            'bio'   => 'Conçoit et développe des solutions web et mobiles sur mesure, garantissant des architectures robustes et des expériences fluides.',
        ),
        'roukiatou-ouedraogo' => array(
            'name'  => 'Roukiatou OUEDRAOGO',
            'role'  => 'Commerciale',
            'image' => 'images/roukiatou.jpg',
            'bio'   => "Identifie les besoins des clients, propose nos solutions d'hébergement et d'infrastructures cloud, et fidélise le portefeuille.",
        ),
        'victorine-bazemo' => array(
            'name'  => 'Victorine BAZEMO',
            'role'  => 'Assistante Commerciale',
            'image' => 'images/victorine.jpg',
            'bio'   => "Accompagne l'équipe dans le suivi des prospects, la rédaction des propositions et assure une relation client de qualité.",
        ),
        'martin-yameogo' => array(
            'name'  => 'Tegawende Martin Junior YAMEOGO',
            'role'  => 'Développeur Junior',
            'image' => 'images/Martin.jpg',
            'bio'   => "Participe au développement des interfaces et fonctionnalités web, tout en assurant la maintenance et l'optimisation de nos applications.",
        ),
        'daouda-dao' => array(
            'name'  => 'Daouda DAO',
            'role'  => 'Développeur Front End',
            'image' => 'images/daouda.jpg',
            'bio'   => "Transforme les maquettes en interfaces web interactives et responsives, en plaçant l'expérience utilisateur au cœur de son code.",
        ),
        'landry-kabore' => array(
            'name'  => 'KABORE Pawendtaore Landry',
            'role'  => 'Développeur Full-Stack',
            'image' => 'images/landry.jpg',
            'bio'   => "Développe des applications complètes, de la base de données à l'interface, pour répondre aux besoins métiers spécifiques de nos clients.",
        ),
        'williams-woba' => array(
            'name'  => 'Williams woba',
            'role'  => 'Technicien, helpdesk',
            'image' => 'images/willi.jpg',
            'bio'   => 'Premier point de contact pour le support technique, il résout les incidents, assiste les utilisateurs et assure la maintenance du parc.',
        ),
        'sandrine-kini' => array(
            'name'  => 'Sandrine Tiahoun KINI',
            'role'  => 'Assistante de Direction',
            'image' => 'images/Sandrine.jpg',
            'bio'   => "Organise le quotidien de la direction, gère l'administration générale et facilite la communication interne et externe.",
        ),
        'aminata-hema' => array(
            'name'  => 'Aminata HEMA',
            'role'  => 'Comptable',
            'image' => 'images/ami.jpg',
            'bio'   => "Gère la comptabilité générale, établit les états financiers et veille au respect des obligations fiscales et légales de l'entreprise.",
        ),
        'nouriatou-ouedraogo' => array(
            'name'  => 'Nouriatou OUEDRAOGO',
            'role'  => 'Gestionnaire de Projet',
            'image' => 'images/Nouriatou.jpg',
            'bio'   => 'Pilote le planning, coordonne les équipes techniques et veille au respect des délais, du budget et de la qualité des livrables.',
        ),
    );
}

/**
 * Seed : membres de l'équipe (CPT ika_membre).
 */
function ika_seed_membres() {
    $membres = ika_get_default_membres();
    $order   = 0;

    foreach ( $membres as $slug => $data ) {
        $order++;
        $id = ika_solution_get_post_id_by_slug( 'ika_membre', $slug );

        if ( ! $id ) {
            $id = wp_insert_post( array(
                'post_type'    => 'ika_membre',
                'post_name'    => $slug,
                'post_title'   => $data['name'],
                'post_content' => $data['bio'],
                'post_excerpt' => $data['bio'],
                'menu_order'   => $order,
                'post_status'  => 'publish',
            ) );
        } else {
            wp_update_post( array(
                'ID'         => $id,
                'menu_order' => $order,
            ) );
            ika_solution_update_post_field_if_empty( $id, 'post_content', $data['bio'] );
            ika_solution_update_post_field_if_empty( $id, 'post_excerpt', $data['bio'] );
        }

        if ( $id && ! is_wp_error( $id ) ) {
            ika_solution_update_meta_if_empty( $id, 'ika_membre_role', $data['role'] );
            ika_solution_update_meta_if_empty( $id, 'ika_membre_image', $data['image'] );
        }
    }
}

/**
 * Seed : réalisations (CPT ika_realisation).
 */
function ika_seed_realisations() {
    $images = array( 'images/sonatur.png', 'images/intranetsonatur.png', 'images/sitesonatur.png' );
    $realisations = array(
        'gestion-des-requetes-sous-sharepoint-2016' => array(
            'title'    => 'Gestion des requêtes sous SharePoint 2016',
            'client'   => 'Coris Bank International Burkina Faso',
            'category' => 'Banque',
            'type'     => 'app',
            'excerpt'  => 'Automatisation du processus métier de gestion des requêtes dans SharePoint 2016 au profit de Coris Bank International Burkina Faso.',
            'tags'     => array( 'SharePoint 2016', 'Workflow', 'Banque' ),
        ),
        'fiches-d-engagement-de-depense' => array(
            'title'    => 'Fiches d’engagement de dépense',
            'client'   => 'Fondation 2iE Burkina Faso',
            'category' => 'Fondation',
            'type'     => 'app',
            'excerpt'  => 'Automatisation du processus métier de gestion des fiches d’engagement de dépense dans SharePoint 2016.',
            'tags'     => array( 'SharePoint 2016', 'Dépenses', 'Validation' ),
        ),
        'suivi-des-recommandations' => array(
            'title'    => 'Suivi des recommandations',
            'client'   => 'CorisBank Burkina Faso',
            'category' => 'Banque',
            'type'     => 'app',
            'excerpt'  => 'Automatisation du processus métier de gestion et suivi des recommandations dans SharePoint 2016.',
            'tags'     => array( 'SharePoint 2016', 'Suivi', 'Reporting' ),
        ),
        'ika-portail-sous-sharepoint-foundation-2013' => array(
            'title'    => 'IKA PORTAIL sous SharePoint Foundation 2013',
            'client'   => 'PME',
            'category' => 'Portail collaboratif',
            'type'     => 'intranet',
            'excerpt'  => 'Création d’une plateforme de partage de documents et d’information pour les PME sous SharePoint Foundation 2013.',
            'tags'     => array( 'IKA PORTAIL', 'Documents', 'Collaboration' ),
        ),
        'design-et-presentation-de-l-intranet' => array(
            'title'    => 'Design et présentation de l’intranet',
            'client'   => 'CorisBank International Burkina Faso',
            'category' => 'Intranet',
            'type'     => 'intranet',
            'excerpt'  => 'Création du design et de la présentation de l’intranet CorisBank International Burkina Faso sous SharePoint Server 2016.',
            'tags'     => array( 'SharePoint Server 2016', 'Intranet', 'UX' ),
        ),
        'mise-a-jour-de-l-intranet-sharepoint-2013' => array(
            'title'    => 'Mise à jour de l’intranet SharePoint 2013',
            'client'   => 'SONATUR',
            'category' => 'Intranet',
            'type'     => 'intranet',
            'excerpt'  => 'Mise à jour de l’intranet SharePoint 2013 de la SONATUR.',
            'tags'     => array( 'SharePoint 2013', 'Maintenance', 'Intranet' ),
        ),
        'intranets-de-coris-holding-coris-banque-coris-mesofinan' => array(
            'title'    => 'Intranets de Coris Holding, Coris Banque, Coris Mésofinance et Coris Baraka.',
            'client'   => 'Coris Group',
            'category' => 'Banque',
            'type'     => 'intranet',
            'excerpt'  => 'Conception, structuration et accompagnement sur des intranets et plateformes collaboratives pour le groupe.',
            'tags'     => array( 'Intranet', 'Collaboration', 'Banque' ),
        ),
        'intranet-sonabhy' => array(
            'title'    => 'Intranet SONABHY',
            'client'   => 'SONABHY',
            'category' => 'Énergie',
            'type'     => 'intranet',
            'excerpt'  => 'Mise en place d’un intranet pour centraliser les informations internes, fluidifier la communication et accompagner les équipes.',
            'tags'     => array( 'Intranet', 'Communication', 'Énergie' ),
        ),
        'gestion-des-vols-passagers-hotels-et-application-mobile' => array(
            'title'    => 'Gestion des vols, passagers, hôtels et application mobile.',
            'client'   => 'Plateformes nationales',
            'category' => 'Aéroports & hôtels',
            'type'     => 'app',
            'excerpt'  => 'Plateformes nationales pour les aéroports, plateforme officielle des hôtels et application mobile des gérants d’hôtel.',
            'tags'     => array( 'Application mobile', 'Aéroport', 'Hôtellerie' ),
        ),
        'plateforme-bons-factures' => array(
            'title'    => 'Plateforme bons & factures',
            'client'   => 'SONABHY',
            'category' => 'Énergie',
            'type'     => 'app',
            'excerpt'  => 'Plateforme web et application mobile qui dématérialisent la gestion des bons d’enlèvement de la SONABHY.',
            'tags'     => array( 'Application mobile', 'Factures', 'Énergie' ),
        ),
        'dematerialisation-administrative-et-parcelles' => array(
            'title'    => 'Dématérialisation administrative et parcelles',
            'client'   => 'SONATUR',
            'category' => 'Foncier',
            'type'     => 'app',
            'excerpt'  => 'Site web, portail de dématérialisation administrative, souscription officielle de parcelle, DevOps et conformité ANSSI.',
            'tags'     => array( 'Portail', 'Dématérialisation', 'Foncier' ),
        ),
        'recherche-de-services-bancaires' => array(
            'title'    => 'Recherche de services bancaires',
            'client'   => 'FasoFinVenen',
            'category' => 'Services financiers',
            'type'     => 'app',
            'excerpt'  => 'Plateforme et application mobile de recherche de services bancaires, DevOps FasoFinVenen et validation ANSSI.',
            'tags'     => array( 'Application mobile', 'Banque', 'DevOps' ),
        ),
        'gestion-d-agrement' => array(
            'title'    => 'Gestion d’agrément',
            'client'   => 'MEBF',
            'category' => 'Services publics',
            'type'     => 'app',
            'excerpt'  => 'Plateforme de gestion d’agrément des entreprises et des particuliers du Burkina Faso.',
            'tags'     => array( 'Gestion', 'Agrément', 'Services publics' ),
        ),
        'validation-securite-reco' => array(
            'title'    => 'Validation sécurité Reco',
            'client'   => 'Reco',
            'category' => 'Services publics',
            'type'     => 'infra',
            'excerpt'  => 'Accompagnement et validation sécurité de la plateforme Reco pour renforcer la conformité et la fiabilité du service.',
            'tags'     => array( 'Sécurité', 'Conformité', 'Audit' ),
        ),
        'audits-internes-et-qualite' => array(
            'title'    => 'Audits internes et qualité',
            'client'   => 'ONEA',
            'category' => 'Eau & assainissement',
            'type'     => 'app',
            'excerpt'  => 'Plateforme de gestion des audits internes et qualité de l’ONEA.',
            'tags'     => array( 'Audit', 'Qualité', 'Eau' ),
        ),
    );
    $order = 0;
    foreach ( $realisations as $slug => $data ) {
        $order++;
        $id = ika_solution_get_post_id_by_slug( 'ika_realisation', $slug );

        if ( ! $id ) {
            $id = wp_insert_post( array(
                'post_type'    => 'ika_realisation',
                'post_name'    => $slug,
                'post_title'   => $data['title'],
                'post_excerpt' => $data['excerpt'],
                'post_content' => $data['excerpt'],
                'menu_order'   => $order,
                'post_status'  => 'publish',
            ) );
        } else {
            wp_update_post( array(
                'ID'         => $id,
                'menu_order' => $order,
            ) );
            ika_solution_update_post_field_if_empty( $id, 'post_excerpt', $data['excerpt'] );
            ika_solution_update_post_field_if_empty( $id, 'post_content', $data['excerpt'] );
        }

        if ( $id && ! is_wp_error( $id ) ) {
            ika_solution_update_meta_if_empty( $id, 'ika_realisation_client', $data['client'] );
            ika_solution_update_meta_if_empty( $id, 'ika_realisation_image', $images[ ( $order - 1 ) % count( $images ) ] );
            ika_solution_update_meta_if_empty( $id, 'ika_realisation_category', $data['category'] );
            ika_solution_update_meta_if_empty( $id, 'ika_realisation_type', $data['type'] );
            ika_solution_update_meta_if_empty( $id, 'ika_realisation_tags', $data['tags'] );
        }
    }
}

/**
 * Seed : partenaires (CPT ika_partenaire).
 *
 * Liste strictement identique au site statique : Microsoft, Odoo, Palo Alto,
 * Fortinet et Proxmox — ce dernier renvoie vers la page /proxmox, comme sur
 * le site d'origine (lien optionnel : vide = logo non cliquable).
 */
function ika_seed_partenaires() {
    $partenaires = array(
        'microsoft' => array( 'name' => 'Microsoft', 'image' => 'images/microsoft.png', 'height' => 'max-h-14', 'url' => '' ),
        'odoo'      => array( 'name' => 'Odoo', 'image' => 'images/odoo.png', 'height' => 'max-h-14', 'url' => '' ),
        'palo-alto' => array( 'name' => 'Palo Alto', 'image' => 'images/paloalto.svg', 'height' => 'max-h-16', 'url' => '' ),
        'fortinet'  => array( 'name' => 'Fortinet', 'image' => 'images/fortinet.png', 'height' => 'max-h-20', 'url' => '' ),
        'proxmox'   => array( 'name' => 'Proxmox', 'image' => 'images/Proxmox.png', 'height' => 'max-h-20', 'url' => 'proxmox' ),
    );
    $order = 0;
    foreach ( $partenaires as $slug => $data ) {
        $order++;
        $id = ika_solution_get_post_id_by_slug( 'ika_partenaire', $slug );

        if ( ! $id ) {
            $id = wp_insert_post( array(
                'post_type'   => 'ika_partenaire',
                'post_name'   => $slug,
                'post_title'  => $data['name'],
                'menu_order'  => $order,
                'post_status' => 'publish',
            ) );
        } else {
            wp_update_post( array(
                'ID'         => $id,
                'menu_order' => $order,
            ) );
        }

        if ( $id && ! is_wp_error( $id ) ) {
            ika_solution_update_meta_if_empty( $id, 'ika_partenaire_image', $data['image'] );
            ika_solution_update_meta_if_empty( $id, 'ika_partenaire_height', $data['height'] );
            ika_solution_update_meta_if_empty( $id, 'ika_partenaire_url', $data['url'] );
        }
    }
}

/**
 * Données par défaut : actualités (identiques au site statique).
 */
function ika_get_default_actualites() {
    return array(
        'pourquoi-rapprocher-hebergement-operations-critiques' => array(
            'title'    => 'Pourquoi rapprocher l’hébergement des opérations critiques',
            'category' => 'Cloud',
            'image'    => 'images/slide4.jpg',
            'excerpt'  => 'Disponibilité, latence, support local et meilleure maîtrise des environnements applicatifs.',
            'intro'    => 'L’hébergement local permet aux organisations de gagner en disponibilité, en réactivité et en maîtrise technique.',
            'content'  => array(
                'Pour une entreprise, une institution ou une organisation qui utilise des applications métiers au quotidien, l’hébergement n’est pas seulement une question technique. Il influence directement la vitesse d’accès, la continuité de service, la confidentialité des données et la capacité à obtenir une assistance rapide.',
                'En rapprochant les serveurs des utilisateurs et des équipes de support, les temps de réponse deviennent plus prévisibles. Les incidents peuvent être diagnostiqués plus vite, les sauvegardes sont mieux suivies et les environnements critiques restent sous contrôle.',
                'IKA SOLUTION accompagne ses clients dans le choix, la configuration et la supervision de solutions d’hébergement adaptées : sites web, applications métiers, VPS, domaines, sauvegardes et support local.',
            ),
        ),
        'digitaliser-sans-fragiliser-acces-donnees' => array(
            'title'    => 'Digitaliser sans fragiliser les accès et les données',
            'category' => 'Sécurité',
            'image'    => 'images/securite.jpg',
            'excerpt'  => 'Contrôle d’accès, sauvegarde, supervision et continuité de service dès la conception.',
            'intro'    => 'La digitalisation doit améliorer la productivité sans exposer les systèmes, les utilisateurs et les données sensibles.',
            'content'  => array(
                'Chaque nouveau portail, application ou service connecté augmente la surface d’exposition. C’est pourquoi la sécurité doit être intégrée dès la conception du projet, et non ajoutée à la fin.',
                'Une approche sérieuse combine contrôle d’accès, sauvegarde, journalisation, supervision, formation des utilisateurs et procédures de reprise. Ce socle réduit les risques d’interruption, de perte de données ou d’accès non autorisé.',
                'IKA SOLUTION aide les organisations à structurer cette protection avec des choix techniques cohérents, des politiques d’accès claires et un accompagnement durable.',
            ),
        ),
        'renforcer-identite-numerique-domaine-local' => array(
            'title'    => 'Renforcer son identité numérique avec un domaine local',
            'category' => '.bf',
            'image'    => 'images/conseil.jpg',
            'excerpt'  => 'Nom de domaine, DNS, messagerie et maintenance technique pour une présence crédible.',
            'intro'    => 'Un nom de domaine local renforce la crédibilité, la proximité et la visibilité numérique d’une organisation.',
            'content'  => array(
                'L’identité numérique commence souvent par une adresse claire, stable et reconnue. Un domaine local permet de mieux affirmer son ancrage, de professionnaliser ses adresses email et de centraliser ses services numériques.',
                'Au-delà de l’achat du domaine, la qualité de la configuration DNS, de la messagerie, des certificats et du suivi technique joue un rôle important dans la fiabilité de la présence en ligne.',
                'IKA SOLUTION accompagne les organisations dans l’acquisition, la configuration et la maintenance de leurs domaines, avec un support orienté continuité et simplicité d’usage.',
            ),
        ),
    );
}

/**
 * Seed : actualités (articles WordPress natifs).
 */
function ika_seed_actualites() {
    $articles = ika_get_default_actualites();
    $order    = 0;

    foreach ( $articles as $slug => $data ) {
        $order++;
        $content = implode( "\n\n", $data['content'] );
        $id      = ika_solution_get_post_id_by_slug( 'post', $slug );

        if ( ! $id ) {
            $id = wp_insert_post( array(
                'post_type'    => 'post',
                'post_name'    => $slug,
                'post_title'   => $data['title'],
                'post_excerpt' => $data['excerpt'],
                'post_content' => $content,
                'menu_order'   => $order,
                'post_status'  => 'publish',
            ) );
        } else {
            wp_update_post( array(
                'ID'           => $id,
                'post_title'   => $data['title'],
                'post_excerpt' => $data['excerpt'],
                'post_content' => $content,
                'menu_order'   => $order,
                'post_status'  => 'publish',
            ) );
        }

        if ( ! $id || is_wp_error( $id ) ) {
            continue;
        }

        $term = term_exists( $data['category'], 'category' );
        if ( ! $term ) {
            $term = wp_insert_term( $data['category'], 'category' );
        }
        if ( ! is_wp_error( $term ) ) {
            wp_set_post_categories( $id, array( (int) $term['term_id'] ) );
        }
        update_post_meta( $id, 'ika_post_image', $data['image'] );
        update_post_meta( $id, '_ika_seeded_actualite', 1 );
        update_post_meta( $id, '_ika_static_intro', $data['intro'] );
    }
}

/**
 * Supprime uniquement les contenus d'exemple livrés par une installation
 * WordPress vierge afin que le rendu corresponde au site statique dès le départ.
 */
function ika_solution_remove_default_wp_sample_content() {
    $sample_titles = array( 'Hello world!', 'Bonjour tout le monde !' );
    $query = new WP_Query( array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 5,
        'post_name__in'  => array( 'hello-world', 'bonjour-tout-le-monde' ),
        'no_found_rows'  => true,
    ) );

    foreach ( $query->posts as $post ) {
        if ( in_array( $post->post_title, $sample_titles, true ) ) {
            $content = wp_strip_all_tags( $post->post_content );
            if ( false !== stripos( $content, 'Welcome to WordPress' ) || false !== stripos( $content, 'Bienvenue sur WordPress' ) ) {
                wp_trash_post( $post->ID );
            }
        }
    }
}

/**
 * Détecte si l'installation a besoin d'être (ré)hydratée avec les données du
 * site statique. Après une hydratation réussie, on ne relance plus ce processus
 * automatiquement afin de laisser l'administrateur modifier librement le site.
 */
function ika_solution_has_seed_gaps() {
    return get_option( 'ika_solution_seed_version' ) !== IKA_SOLUTION_SEED_VERSION;
}

/* ------------------------------------------------------------------------ */
/* Import des visuels du thème dans la médiathèque WordPress                 */
/* ------------------------------------------------------------------------ */

/**
 * Correspondance « chemin relatif d'asset → ID d'attachment ».
 *
 * Remplie par ika_import_theme_media() à l'activation du thème : toutes les
 * images utilisées par le site sont alors visibles (et remplaçables) dans
 * Médiathèque, et ika_asset() sert automatiquement ces copies.
 *
 * @return array<string,int>
 */
function ika_get_media_map() {
    $map = get_option( 'ika_media_map', array() );
    return is_array( $map ) ? $map : array();
}

/**
 * Type MIME minimal pour l'import (inclut les SVG, non couverts par les
 * mimes autorisés par défaut de WordPress).
 *
 * @param string $ext Extension de fichier en minuscules.
 * @return string
 */
function ika_media_mime( $ext ) {
    $mimes = array(
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png'  => 'image/png',
        'gif'  => 'image/gif',
        'webp' => 'image/webp',
        'svg'  => 'image/svg+xml',
        'pdf'  => 'application/pdf',
    );
    return isset( $mimes[ $ext ] ) ? $mimes[ $ext ] : 'application/octet-stream';
}

/**
 * Retrouve un attachment déjà importé pour un chemin d'asset donné.
 *
 * @param string $rel Chemin relatif (ex : images/logo.png).
 * @return int ID d'attachment ou 0.
 */
function ika_find_attachment_by_source( $rel ) {
    $query = new WP_Query(
        array(
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'posts_per_page' => 1,
            'fields'         => 'ids',
            'meta_key'       => '_ika_source_path',
            'meta_value'     => $rel,
            'no_found_rows'  => true,
        )
    );
    return ! empty( $query->posts ) ? (int) $query->posts[0] : 0;
}

/**
 * Importe toutes les images (et le PDF de la brochure) du dossier assets/ du
 * thème dans la médiathèque WordPress.
 *
 * Idempotent : un meta `_ika_source_path` mémorise la correspondance, donc un
 * second passage ne crée ni doublon ni nouvelle copie. Les templates utilisent
 * ensuite automatiquement les URL des pièces jointes via ika_asset().
 */
function ika_import_theme_media() {
    $dirs    = array( 'images', 'pdf' );
    $allowed = array( 'jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'pdf' );

    $uploads = wp_upload_dir();
    if ( ! empty( $uploads['error'] ) ) {
        return;
    }

    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    @set_time_limit( 300 ); // phpcs:ignore — import unique à l'activation.

    $map = ika_get_media_map();

    foreach ( $dirs as $dir ) {
        $base = trailingslashit( get_template_directory() . '/assets/' . $dir );
        if ( ! is_dir( $base ) ) {
            continue;
        }

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator( $base, FilesystemIterator::SKIP_DOTS )
        );

        foreach ( $iterator as $file ) {
            if ( ! $file->isFile() ) {
                continue;
            }
            $ext = strtolower( pathinfo( $file->getFilename(), PATHINFO_EXTENSION ) );
            if ( ! in_array( $ext, $allowed, true ) ) {
                continue;
            }

            // Chemin relatif canonique, ex : images/clients/ONEA.jpg.
            $within = str_replace( '\\', '/', substr( $file->getPathname(), strlen( $base ) ) );
            $rel    = $dir . '/' . ltrim( $within, '/' );

            // Déjà importé lors d'un passage précédent ?
            if ( isset( $map[ $rel ] ) && get_post( (int) $map[ $rel ] ) ) {
                continue;
            }
            $found = ika_find_attachment_by_source( $rel );
            if ( $found ) {
                $map[ $rel ] = $found;
                continue;
            }

            // Copie physique dans le dossier uploads de WordPress.
            $filename = wp_unique_filename( $uploads['path'], $file->getFilename() );
            $dest     = trailingslashit( $uploads['path'] ) . $filename;
            if ( ! @copy( $file->getPathname(), $dest ) ) {
                continue;
            }

            $attachment_id = wp_insert_attachment(
                array(
                    'guid'           => trailingslashit( $uploads['url'] ) . $filename,
                    'post_mime_type' => ika_media_mime( $ext ),
                    'post_title'     => preg_replace( '/\.[^.]+$/', '', $file->getFilename() ),
                    'post_content'   => '',
                    'post_status'    => 'inherit',
                ),
                $dest
            );

            if ( ! $attachment_id || is_wp_error( $attachment_id ) ) {
                continue;
            }

            // Tailles d'image + métadonnées (la génération peut échouer pour
            // les SVG/PDF selon l'hébergement : ce n'est pas bloquant).
            $metadata = @wp_generate_attachment_metadata( $attachment_id, $dest ); // phpcs:ignore
            if ( $metadata && ! is_wp_error( $metadata ) ) {
                wp_update_attachment_metadata( $attachment_id, $metadata );
            }

            update_post_meta( $attachment_id, '_ika_source_path', $rel );
            $map[ $rel ] = $attachment_id;
            update_option( 'ika_media_map', $map, false );
        }
    }

    update_option( 'ika_media_map', $map, false );
}

/**
 * Import + marqueur de version : ne se relance que si la version des données
 * du thème a changé.
 */
function ika_import_theme_media_versioned() {
    ika_import_theme_media();
    update_option( 'ika_media_import_version', IKA_SOLUTION_SEED_VERSION, false );
}
add_action( 'after_switch_theme', 'ika_import_theme_media_versioned' );

/**
 * Auto-réparation : si le thème était déjà actif avant cette version, l'import
 * se fait au prochain passage dans l'administration (jamais en front-office,
 * pour ne pas pénaliser les visiteurs). En attendant, ika_asset() continue de
 * servir les fichiers du thème : rien ne s'affiche cassé.
 */
function ika_solution_ensure_media_imported() {
    if ( get_option( 'ika_media_import_version' ) === IKA_SOLUTION_SEED_VERSION ) {
        return;
    }
    ika_import_theme_media_versioned();
}
add_action( 'admin_init', 'ika_solution_ensure_media_imported' );

/**
 * Migration v7 : aligne le contenu déjà seedé sur le site statique.
 *
 * Ne met à jour un champ QUE si sa valeur actuelle est vide ou égale à
 * l'ancienne valeur seedée : toute modification faite dans l'administration
 * est préservée.
 */
function ika_solution_migrate_to_v7() {
    $expertises = ika_get_default_expertises();

    // Anciennes valeurs seedées (version v6) qui divergeaient du statique.
    $old_intro = array(
        'developpement-app' => 'Applications web, mobiles, portails et intégrations adaptées à vos processus métier.',
        'infrastructures-serveurs-reseaux' => 'Premier fournisseur de services d’hébergement avec des datacenters locaux au Burkina Faso. Une infrastructure de pointe sur le sol national.',
        'solutions-cloud-licences' => 'Microsoft 365, Fortinet, Odoo, cloud, licences professionnelles et solutions logicielles pour vos équipes.',
        'conseil-audit-strategie-it' => 'Diagnostic, cadrage, feuille de route, choix techniques et accompagnement à la décision.',
        'cybersecurite-donnees' => 'Contrôle d’accès, sauvegarde, continuité de service et sécurisation des systèmes critiques.',
        'support-technique-infogerance' => 'Assistance, supervision, maintenance préventive et suivi opérationnel des plateformes.',
        'equipements-services-energetiques' => 'Onduleurs, groupes électrogènes, solutions solaires et continuité énergétique.',
        'formation-utilisateurs' => 'Prise en main, documentation, transfert de compétences et adoption des outils.',
    );
    $old_equipements = array(
        'ika_expertise_eyebrow'    => 'Infrastructure physique',
        'ika_expertise_highlights' => array( 'Matériel informatique', 'Onduleurs et UPS', 'Énergie solaire' ),
        'ika_expertise_capabilities' => array(
            'Fourniture d’ordinateurs, imprimantes, équipements réseau et accessoires informatiques.',
            'Installation d’onduleurs, UPS et alimentation de secours pour salles serveurs.',
            'Déploiement de solutions énergétiques solaires pour sites isolés ou à faible connectivité.',
            'Câblage, baie informatique, climatisation technique et aménagement de salles serveurs.',
            'Livraison, installation et configuration sur site avec documentation.',
            'Maintenance des équipements, suivi des pannes et renouvellement du parc.',
        ),
        'ika_expertise_process'    => array( 'Diagnostic terrain', 'Choix équipements', 'Installation', 'Maintenance' ),
        'ika_expertise_deliverables' => array( 'Équipements livrés et installés', 'Schéma d’infrastructure', 'Documentation site', 'Contrat de maintenance' ),
        'post_content' => 'IKA SOLUTION fournit les équipements informatiques et les solutions énergétiques adaptées aux contraintes locales : ordinateurs, onduleurs, énergie solaire, baies de brassage, climatisation technique et alimentation de secours pour garantir la disponibilité continue de vos systèmes.',
    );
    $old_support = array(
        'ika_expertise_capabilities' => array(
            'Assistance aux utilisateurs sur postes, logiciels, messagerie, accès et périphériques.',
            'Maintenance préventive des serveurs, réseaux, sauvegardes et équipements critiques.',
            'Gestion des incidents, qualification, résolution, escalade et compte rendu.',
            'Supervision des services essentiels et suivi des indicateurs de disponibilité.',
            'Administration courante des comptes, droits, licences, mises à jour et configurations.',
            'Rapports mensuels, bilans techniques et recommandations d’optimisation.',
        ),
        'ika_expertise_process'    => array( 'Audit initial', 'Contrat de service', 'Maintenance et supervision', 'Bilan et amélioration' ),
        'ika_expertise_deliverables' => array( 'Contrat de maintenance', 'Rapports mensuels', 'Suivi des incidents', 'Plan d’optimisation' ),
    );

    foreach ( $expertises as $slug => $data ) {
        $id = ika_solution_get_post_id_by_slug( 'ika_expertise', $slug );
        if ( ! $id ) {
            continue;
        }
        $post = get_post( $id );
        if ( ! $post ) {
            continue;
        }

        // Extrait = intro de la page détail (les cartes d'accueil utilisent
        // désormais la meta ika_expertise_card_text, remplie par le seeder).
        if ( isset( $old_intro[ $slug ] )
            && ( '' === trim( $post->post_excerpt ) || $old_intro[ $slug ] === $post->post_excerpt )
            && $post->post_excerpt !== $data['intro'] ) {
            wp_update_post( array( 'ID' => $id, 'post_excerpt' => $data['intro'] ) );
        }

        // Champs « Équipements & services énergétiques » réalignés sur le statique.
        if ( 'equipements-services-energetiques' === $slug ) {
            foreach ( $old_equipements as $field => $old_value ) {
                if ( 'post_content' === $field ) {
                    if ( '' === trim( $post->post_content ) || $old_value === $post->post_content ) {
                        wp_update_post( array( 'ID' => $id, 'post_content' => $data['description'] ) );
                    }
                    continue;
                }
                $new_value = array(
                    'ika_expertise_eyebrow'      => $data['eyebrow'],
                    'ika_expertise_highlights'   => $data['highlights'],
                    'ika_expertise_capabilities' => $data['capabilities'],
                    'ika_expertise_process'      => $data['process'],
                    'ika_expertise_deliverables' => $data['deliverables'],
                );
                $current = get_post_meta( $id, $field, true );
                $empty   = ( '' === $current ) || ( is_array( $current ) && empty( $current ) );
                if ( $empty || $current === $old_value ) {
                    update_post_meta( $id, $field, $new_value[ $field ] );
                }
            }
        }

        // Champs « Support technique & infogérance » réalignés sur le statique.
        if ( 'support-technique-infogerance' === $slug ) {
            foreach ( $old_support as $field => $old_value ) {
                $new_value = array(
                    'ika_expertise_capabilities' => $data['capabilities'],
                    'ika_expertise_process'      => $data['process'],
                    'ika_expertise_deliverables' => $data['deliverables'],
                );
                $current = get_post_meta( $id, $field, true );
                $empty   = ( '' === $current ) || ( is_array( $current ) && empty( $current ) );
                if ( $empty || $current === $old_value ) {
                    update_post_meta( $id, $field, $new_value[ $field ] );
                }
            }
        }
    }

    // Coquille « Technicien , helpdesk » corrigée (membre seedé).
    $williams = ika_solution_get_post_id_by_slug( 'ika_membre', 'williams-woba' );
    if ( $williams && 'Technicien , helpdesk' === get_post_meta( $williams, 'ika_membre_role', true ) ) {
        update_post_meta( $williams, 'ika_membre_role', 'Technicien, helpdesk' );
    }

    // Libellé client « Coris Bank » → « CORIS BANK » (comme sur le statique).
    $coris = ika_solution_get_post_id_by_slug( 'ika_client', 'coris' );
    if ( $coris && 'Coris Bank' === get_the_title( $coris ) ) {
        wp_update_post( array( 'ID' => $coris, 'post_title' => 'CORIS BANK' ) );
    }

    // Partenaires ajoutés par l'ancien seeder mais absents du site statique :
    // ABDI, ARCEP et Coris sont retirés pour une parité stricte.
    foreach ( array( 'abdi', 'arcep', 'coris' ) as $stale_slug ) {
        $stale_id = ika_solution_get_post_id_by_slug( 'ika_partenaire', $stale_slug );
        if ( $stale_id ) {
            wp_delete_post( $stale_id, true );
        }
    }
}

/**
 * Seed all editable content (idempotent).
 */
function ika_solution_seed_content() {
    // Assure que les CPT existent avant l'import et le flush, même pendant after_switch_theme.
    ika_solution_custom_post_types();
    ika_solution_post_types();

    if ( ika_solution_has_seed_gaps() ) {
        ika_solution_migrate_to_v7();
    }

    ika_solution_create_default_pages();
    ika_solution_remove_default_wp_sample_content();
    ika_seed_solutions();
    ika_seed_expertises();
    ika_seed_clients();
    ika_seed_slides();
    ika_seed_membres();
    ika_seed_realisations();
    ika_seed_partenaires();
    ika_seed_actualites();
    update_option( 'ika_solution_seed_version', IKA_SOLUTION_SEED_VERSION, false );
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'ika_solution_seed_content' );

/**
 * Auto-réparation : utile si le thème était déjà actif avant cette correction
 * ou si l'activation précédente a créé des contenus partiels/vides.
 */
function ika_solution_ensure_static_site_content() {
    if ( ika_solution_has_seed_gaps() ) {
        ika_solution_seed_content();
    }
}
add_action( 'init', 'ika_solution_ensure_static_site_content', 30 );
