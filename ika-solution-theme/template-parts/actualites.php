<?php
/**
 * Template part : dernières actualités (section « actualites »).
 * Alimenté par les articles WordPress natifs.
 *
 * @package ika-solution
 */

$ika_posts = get_posts(
	array(
		'post_type'      => 'post',
		'posts_per_page'      => 3,
		'post_status'         => 'publish',
		'orderby'             => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
		'ignore_sticky_posts' => true,
	)
);

if ( ! $ika_posts ) {
	return;
}
?>
    <section id="actualites" class="bg-ikaSoft py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal max-w-3xl">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php esc_html_e( 'Actualités', 'ika-solution' ); ?></p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php esc_html_e( 'Les sujets qui structurent la transformation digitale locale.', 'ika-solution' ); ?></h2>
        </div>
        <div class="mt-12 grid gap-6 md:grid-cols-3">
          <?php foreach ( $ika_posts as $i => $ika_post ) :
            $ika_cat   = get_the_category( $ika_post->ID );
            $ika_tag   = $ika_cat ? $ika_cat[0]->name : '';
            $ika_color = ( $i % 2 === 0 ) ? 'bg-ikaBlue' : 'bg-ikaRed';
          ?>
          <article class="reveal flex h-full flex-col overflow-hidden rounded-2xl bg-white shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
            <img class="h-56 w-full object-cover" src="<?php echo esc_url( ika_post_image( $ika_post->ID, 'ika_post_image' ) ); ?>" alt="<?php echo esc_attr( get_the_title( $ika_post ) ); ?>" loading="lazy">
            <div class="flex flex-1 flex-col p-7">
              <?php if ( $ika_tag ) : ?>
              <span class="w-fit rounded-full <?php echo esc_attr( $ika_color ); ?> px-4 py-2 text-xs font-black uppercase tracking-[0.14em] text-white"><?php echo esc_html( $ika_tag ); ?></span>
              <?php endif; ?>
              <h3 class="mt-6 text-2xl font-black text-ikaBlue"><?php echo esc_html( get_the_title( $ika_post ) ); ?></h3>
              <p class="mt-4 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( get_the_excerpt( $ika_post ) ); ?></p>
              <a href="<?php echo esc_url( get_permalink( $ika_post ) ); ?>" class="mt-6 inline-flex w-fit rounded-full bg-ikaRed px-5 py-3 text-sm font-black text-white transition hover:bg-red-700"><?php esc_html_e( 'Lire la suite', 'ika-solution' ); ?></a>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
