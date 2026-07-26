<?php
/**
 * Modèle générique des archives (catégories, étiquettes, dates, CPT).
 *
 * @package ika-solution
 */

get_header();
?>
<main class="pt-32 pb-20">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-black text-ikaBlueDark sm:text-5xl"><?php the_archive_title(); ?></h1>
    <?php if ( get_the_archive_description() ) : ?>
      <div class="mt-4 max-w-3xl text-base leading-8 text-slate-600"><?php the_archive_description(); ?></div>
    <?php endif; ?>

    <?php if ( have_posts() ) : ?>
      <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        <?php while ( have_posts() ) : the_post(); ?>
          <article class="rounded-2xl border border-slate-100 bg-white p-6 shadow-clean">
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="mb-4 h-48 overflow-hidden rounded-xl">
                <?php the_post_thumbnail( 'large', array( 'class' => 'h-full w-full object-cover' ) ); ?>
              </div>
            <?php endif; ?>
            <h2 class="mb-2 text-xl font-bold text-ikaBlueDark">
              <a href="<?php the_permalink(); ?>" class="hover:text-ikaBlue"><?php the_title(); ?></a>
            </h2>
            <div class="mb-4 text-sm text-slate-600"><?php the_excerpt(); ?></div>
            <a href="<?php the_permalink(); ?>" class="text-sm font-extrabold text-ikaRed hover:underline"><?php esc_html_e( 'Lire la suite', 'ika-solution' ); ?> &rarr;</a>
          </article>
        <?php endwhile; ?>
      </div>
      <div class="mt-12"><?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?></div>
    <?php else : ?>
      <p class="mt-10 text-slate-600"><?php esc_html_e( 'Aucun contenu pour le moment.', 'ika-solution' ); ?></p>
    <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>
