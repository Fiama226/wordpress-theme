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
        'height'      : 80,
        'width'       : 200,
        'flex-height' : true,
        'flex-width'  : true,
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
