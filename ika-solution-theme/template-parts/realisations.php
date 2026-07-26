<?php
/**
 * Template part : dernières réalisations (section « realisations »).
 * Alimenté par le CPT ika_realisation, éditable depuis l'administration.
 *
 * @package ika-solution
 */

$ika_realisations = get_posts(
	array(
		'post_type'      => 'ika_realisation',
		'posts_per_page' => 3,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	)
);

if ( ! $ika_realisations ) {
	return;
}
?>
    <section id="realisations" class="bg-white py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
          <div class="max-w-3xl">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php esc_html_e( 'Réalisations', 'ika-solution' ); ?></p>
            <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php esc_html_e( 'Dernières réalisations.', 'ika-solution' ); ?></h2>
          </div>
          <a href="<?php echo esc_url( ika_page_url( 'realisations' ) ); ?>" class="inline-flex w-fit rounded-full border border-slate-200 px-6 py-3 text-sm font-black text-ikaBlue transition hover:border-ikaBlue"><?php esc_html_e( 'Voir toutes les réalisations', 'ika-solution' ); ?></a>
        </div>
        <div class="mt-12 grid gap-6 lg:grid-cols-3">
          <?php foreach ( $ika_realisations as $ika_item ) : ?>
          <article class="reveal overflow-hidden rounded-2xl bg-ikaSoft shadow-clean">
            <img class="h-56 w-full object-cover" src="<?php echo esc_url( ika_post_image( $ika_item->ID, 'ika_realisation_image' ) ); ?>" alt="<?php echo esc_attr( get_the_title( $ika_item ) ); ?>" loading="lazy">
            <div class="p-7">
              <p class="text-sm font-black text-ikaRed"><?php echo esc_html( get_post_meta( $ika_item->ID, 'ika_realisation_client', true ) ); ?></p>
              <h3 class="mt-3 text-2xl font-black text-ikaBlue"><?php echo esc_html( get_the_title( $ika_item ) ); ?></h3>
              <p class="mt-4 text-sm leading-7 text-slate-600"><?php echo esc_html( get_the_excerpt( $ika_item ) ); ?></p>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
