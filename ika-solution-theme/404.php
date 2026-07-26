<?php
/**
 * Modèle affiché lorsqu'une page est introuvable.
 *
 * @package ika-solution
 */

get_header();
?>
<main class="pt-32 pb-20">
  <div class="mx-auto max-w-3xl px-4 py-16 text-center sm:px-6 lg:px-8">
    <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php esc_html_e( 'Erreur 404', 'ika-solution' ); ?></p>
    <h1 class="mt-5 text-4xl font-black text-ikaBlueDark sm:text-5xl"><?php esc_html_e( 'Cette page est introuvable.', 'ika-solution' ); ?></h1>
    <p class="mt-6 text-base leading-8 text-slate-600"><?php esc_html_e( 'La page demandée a peut-être été déplacée ou supprimée. Vous pouvez revenir à l’accueil ou lancer une recherche.', 'ika-solution' ); ?></p>

    <div class="mx-auto mt-8 max-w-md"><?php get_search_form(); ?></div>

    <div class="mt-8 flex flex-wrap justify-center gap-3">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php esc_html_e( 'Retour à l’accueil', 'ika-solution' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-ikaBlue transition hover:border-ikaBlue"><?php esc_html_e( 'Nous contacter', 'ika-solution' ); ?></a>
    </div>
  </div>
</main>
<?php get_footer(); ?>
