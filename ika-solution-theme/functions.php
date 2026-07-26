<?php
/**
 * IKA Solution Pro Theme Functions
 * 100% Open Source - WordPress Professional Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
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
    // Tailwind CSS via CDN (matching original site)
    wp_enqueue_script( 'tailwindcss', 'https://cdn.tailwindcss.com', array(), '3.4.0', false );

    // Custom Tailwind Config inline script
    wp_add_inline_script( 'tailwindcss', "
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              ikaBlue: '#1270b8',
              ikaBlueDark: '#0d4a7e',
              ikaRed: '#e51a37',
              ikaInk: '#111827',
              ikaSoft: '#f4f7fb'
            },
            fontFamily: {
              sans: ['Inter', 'ui-sans-serif', 'system-ui', 'Segoe UI', 'Arial']
            },
            boxShadow: {
              premium: '0 24px 70px rgba(4, 31, 77, 0.14)',
              clean: '0 12px 40px rgba(17, 24, 39, 0.10)'
            },
            animation: {
              float: 'float 7s ease-in-out infinite',
              reveal: 'reveal .8s ease forwards',
              marquee: 'marquee 26s linear infinite'
            },
            keyframes: {
              float: {
                '0%, 100%': { transform: 'translateY(0)' },
                '50%': { transform: 'translateY(-16px)' }
              },
              reveal: {
                '0%': { opacity: '0', transform: 'translateY(20px)' },
                '100%': { opacity: '1', transform: 'translateY(0)' }
              },
              marquee: {
                '0%': { transform: 'translateX(0)' },
                '100%': { transform: 'translateX(-50%)' }
              }
            }
          }
        }
      };
    " );

    // Theme Custom Stylesheet
    wp_enqueue_style( 'ika-solution-style', get_stylesheet_uri(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'ika_solution_scripts' );

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
}
add_action( 'init', 'ika_solution_custom_post_types' );

/**
 * Helper function to get asset URL
 */
function ika_asset( $path ) {
    return get_template_directory_uri() . '/assets/' . ltrim( $path, '/' );
}

/**
 * Create the theme's default pages on activation.
 *
 * Pages created (only if they don't already exist):
 *  - Société       -> page-presentation.php
 *  - Équipe        -> page-equipe.php
 *  - Réalisations  -> page-realisations.php
 *  - Actualités    -> page-actualites.php
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
    );

    foreach ( $default_pages as $title => $args ) {
        if ( ika_solution_page_exists( $title ) ) {
            continue;
        }

        wp_insert_post( array(
            'post_title'    => $title,
            'post_name'     => $args['slug'],
            'post_content'  => '',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'page_template' => $args['template'],
        ) );
    }
}
add_action( 'after_switch_theme', 'ika_solution_create_default_pages' );

/**
 * Helper: check whether a published page with the given title already exists.
 */
function ika_solution_page_exists( $title ) {
    if ( function_exists( 'get_page_by_title' ) ) {
        $page = get_page_by_title( $title, OBJECT, 'page' );
        return ! empty( $page );
    }

    $query = new WP_Query( array(
        'post_type'      => 'page',
        'title'          => $title,
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'no_found_rows'  => true,
    ) );

    return $query->have_posts();
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
        ),
    ),
    'ika_expertise' => array(
        'box'    => 'Contenu de l’expertise',
        'fields' => array(
            'ika_expertise_image' => array( 'label' => 'Image (chemin relatif, ex: images/development2.jpg)', 'type' => 'text' ),
            'ika_expertise_link'  => array( 'label' => 'Lien “En savoir plus” (ex: developpement-app.php)', 'type' => 'text' ),
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
        $value = get_post_meta( $post->ID, $key, true );
        $list  = is_array( $value ) ? implode( "\n", $value ) : $value;
        echo '<p style="margin:1em 0"><label class="ika-meta-label" for="' . esc_attr( $key ) . '" style="display:block;font-weight:700;margin-bottom:.4em">' . esc_html( $field['label'] ) . '</label>';
        if ( 'textarea' === $field['type'] ) {
            echo '<textarea id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" rows="3" style="width:100%">' . esc_textarea( $list ) . '</textarea>';
        } else {
            echo '<input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" value="' . esc_attr( is_array( $value ) ? '' : $value ) . '" style="width:100%">';
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
 * Seed the editable content from the previously hard-coded theme data.
 * Idempotent: it only creates items that do not already exist.
 */
function ika_seed_solutions() {
    $solutions = array(
        'ika-visite' => array(
            'title'       => 'IKA VISITE',
            'eyebrow'     => 'Accueil et sécurité',
            'image'       => 'images/ikavisite.jpg',
            'intro'       => 'Gérez, suivez et optimisez vos visites avec une solution simple, sécurisée et ergonomique.',
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
            'intro'       => 'Fini les recherches interminables : centralisez vos documents, rôles, modules et workflows.',
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
            'intro'       => 'Classez, recherchez et sécurisez vos documents avec une archive numérique organisée et contrôlée.',
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
            'intro'       => 'Centralisez demandes, accès, validations et tableaux de bord dans un portail web sécurisé.',
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
        if ( ika_solution_cpt_exists( 'ika_solution', $slug ) ) {
            continue;
        }
        $id = wp_insert_post( array(
            'post_type'    => 'ika_solution',
            'post_name'    => $slug,
            'post_title'   => $data['title'],
            'post_excerpt' => $data['intro'],
            'post_content' => $data['description'],
            'post_status'  => 'publish',
        ) );
        if ( $id ) {
            update_post_meta( $id, 'ika_eyebrow', $data['eyebrow'] );
            update_post_meta( $id, 'ika_image', $data['image'] );
            update_post_meta( $id, 'ika_features', $data['features'] );
            update_post_meta( $id, 'ika_benefits', $data['benefits'] );
            update_post_meta( $id, 'ika_use_cases', $data['use_cases'] );
        }
    }
}

function ika_seed_expertises() {
    $expertises = array(
        'developpement-app'              => array( 'title' => 'Développement d’applications', 'image' => 'images/development2.jpg', 'link' => 'developpement-app.php', 'desc' => 'Conception de logiciels sur mesure, portails web et applications mobiles adaptés à vos métiers.' ),
        'infrastructures-serveurs-reseaux' => array( 'title' => 'Infrastructure serveur et réseau', 'image' => 'images/slide4.jpg', 'link' => 'infrastructures-serveurs-reseaux.php', 'desc' => 'Installation, câblage, interconnexion de sites, déploiement de serveurs et administration réseau.' ),
        'solutions-cloud-licences'      => array( 'title' => 'Solutions cloud et licences', 'image' => 'images/cloud2.jpg', 'link' => 'solutions-cloud-licences.php', 'desc' => 'Hébergement cloud sécurisé, messagerie professionnelle et fourniture de licences logicielles officielles.' ),
        'conseil-audit-strategie-it'    => array( 'title' => 'Conseil et stratégie IT', 'image' => 'images/conseil2.jpg', 'link' => 'conseil-audit-strategie-it.php', 'desc' => 'Audit des systèmes d’information, accompagnement au choix technologique et schémas directeurs.' ),
        'cybersecurite-donnees'         => array( 'title' => 'Cybersécurité et données', 'image' => 'images/securite.jpg', 'link' => 'cybersecurite-donnees.php', 'desc' => 'Protection des réseaux, sécurisation des accès, pare-feu et politiques de sauvegarde et conformité.' ),
        'support-technique-infogerance' => array( 'title' => 'Support technique & infogérance', 'image' => 'images/support2.png', 'link' => 'support-technique-infogerance.php', 'desc' => 'Contrats de maintenance préventive et curative, assistance aux utilisateurs et infogérance globale.' ),
        'equipements-services-energetiques' => array( 'title' => 'Équipements & énergie', 'image' => 'images/energie2.jpg', 'link' => 'equipements-services-energetiques.php', 'desc' => 'Fourniture de matériels informatiques, onduleurs, solutions solaires pour salles serveurs et sites isolés.' ),
        'formation-utilisateurs'        => array( 'title' => 'Formation utilisateurs', 'image' => 'images/formation2.jpg', 'link' => 'formation-utilisateurs.php', 'desc' => 'Programmes de formation sur mesure pour maîtriser vos outils logiciels, progiciels et bonnes pratiques IT.' ),
    );
    $order = 0;
    foreach ( $expertises as $slug => $data ) {
        $order++;
        if ( ika_solution_cpt_exists( 'ika_expertise', $slug ) ) {
            continue;
        }
        $id = wp_insert_post( array(
            'post_type'    => 'ika_expertise',
            'post_name'    => $slug,
            'post_title'   => $data['title'],
            'post_content' => $data['desc'],
            'menu_order'   => $order,
            'post_status'  => 'publish',
        ) );
        if ( $id ) {
            update_post_meta( $id, 'ika_expertise_image', $data['image'] );
            update_post_meta( $id, 'ika_expertise_link', $data['link'] );
        }
    }
}

function ika_seed_clients() {
    $clients = array(
        'apec'     => array( 'title' => 'APEC', 'image' => 'images/clients/APEC.png' ),
        'coris'    => array( 'title' => 'Coris Bank', 'image' => 'images/clients/coris.jpg' ),
        'lonab'    => array( 'title' => 'LONAB', 'image' => 'images/clients/Lonab.png' ),
        'onea'     => array( 'title' => 'ONEA', 'image' => 'images/clients/ONEA.jpg' ),
        'sonatur'  => array( 'title' => 'SONATUR', 'image' => 'images/clients/Sonatur.png' ),
        'sonabhy'  => array( 'title' => 'SONABHY', 'image' => 'images/clients/sonabhy.png' ),
    );
    foreach ( $clients as $slug => $data ) {
        if ( ika_solution_cpt_exists( 'ika_client', $slug ) ) {
            continue;
        }
        $id = wp_insert_post( array(
            'post_type'   => 'ika_client',
            'post_name'   => $slug,
            'post_title'  => $data['title'],
            'post_status' => 'publish',
        ) );
        if ( $id ) {
            update_post_meta( $id, 'ika_client_image', $data['image'] );
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
            'title'       => "Logiciels sur mesure\net automatisation",
            'eyebrow'     => 'Ingénierie & Progiciels Métiers',
            'text'        => 'Développez des solutions performantes adaptées à vos spécificités métiers : gestion d’accueil, courrier, archives et portails citoyens.',
            'primary_text'=> 'Explorer nos logiciels', 'primary_url' => '#produits',
            'secondary_text'=> 'Demander une démo', 'secondary_url' => '#contact',
            'image'       => 'images/slide2.jpg',
            'metric_label'=> 'Progiciels', 'metric_value' => 'IKA Suite', 'metric_text' => 'Visite, Courrier, Archive, Portail.',
        ),
        'slide-3' => array(
            'title'       => "Réseaux robustes\net hébergement cloud",
            'eyebrow'     => 'Infrastructures & Réseaux Sécurisés',
            'text'        => 'Sécurisez vos données et interconnectez vos sites avec nos expertises en infrastructure serveur, pare-feu, cloud et énergie.',
            'primary_text'=> 'Nos infrastructures', 'primary_url' => '#expertises',
            'secondary_text'=> 'Audit réseau', 'secondary_url' => '#contact',
            'image'       => 'images/slide3.jpg',
            'metric_label'=> 'Sécurité', 'metric_value' => 'Haute Disponibilité', 'metric_text' => 'Protection des données et continuité.',
        ),
        'slide-4' => array(
            'title'       => "Accompagnement global\net infogérance IT",
            'eyebrow'     => 'Partenaire de Confiance au Burkina Faso',
            'text'        => 'Bénéficiez d’un support technique réactif, de conseils stratégiques et d’une assistance quotidienne pour tous vos équipements informatiques.',
            'primary_text'=> 'Contacter l’équipe', 'primary_url' => '#contact',
            'secondary_text'=> 'En savoir plus', 'secondary_url' => 'presentation.php',
            'image'       => 'images/slide4.jpg',
            'metric_label'=> 'Support', 'metric_value' => '24/7 & Proximité', 'metric_text' => 'Intervention rapide à Ouagadougou et sous-région.',
        ),
    );
    $order = 0;
    foreach ( $slides as $slug => $data ) {
        $order++;
        if ( ika_solution_cpt_exists( 'ika_slide', $slug ) ) {
            continue;
        }
        $id = wp_insert_post( array(
            'post_type'   => 'ika_slide',
            'post_name'   => $slug,
            'post_title'  => $data['title'],
            'menu_order'  => $order,
            'post_status' => 'publish',
        ) );
        if ( $id ) {
            foreach ( $data as $k => $v ) {
                if ( in_array( $k, array( 'title' ), true ) ) {
                    continue;
                }
                update_post_meta( $id, 'ika_slide_' . $k, $v );
            }
        }
    }
}

/**
 * Seed all editable content on theme activation (idempotent).
 */
function ika_solution_seed_content() {
    ika_seed_solutions();
    ika_seed_expertises();
    ika_seed_clients();
    ika_seed_slides();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'ika_solution_seed_content' );
