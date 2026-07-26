<?php
/**
 * Modèle de la page d'accueil.
 *
 * Assemble les sections dans l'ordre exact du site statique d'origine.
 * Aucun contenu n'est codé ici : tout provient des CPT et du Customizer.
 * Le JavaScript est chargé via wp_enqueue_script (assets/js/theme.js).
 *
 * @package ika-solution
 */

get_header();
?>

  <main>
    <?php
    get_template_part( 'template-parts/hero' );
    get_template_part( 'template-parts/about' );
    get_template_part( 'template-parts/pourquoi' );
    get_template_part( 'template-parts/expertises' );
    get_template_part( 'template-parts/marquee' );
    get_template_part( 'template-parts/solutions' );
    get_template_part( 'template-parts/realisations' );
    get_template_part( 'template-parts/hosting' );
    get_template_part( 'template-parts/methode' );
    get_template_part( 'template-parts/actualites' );
    get_template_part( 'template-parts/vision' );
    get_template_part( 'template-parts/partenaires' );
    get_template_part( 'template-parts/clients' );
    get_template_part( 'template-parts/contact' );
    ?>
  </main>

<?php get_footer(); ?>
