<?php
/**
 * The main template file
 */
get_header();
?>
<main class="pt-32 pb-20">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-black text-ikaBlueDark mb-8"><?php single_post_title(); ?></h1>
    <?php if ( have_posts() ) : ?>
      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        <?php while ( have_posts() ) : the_post(); ?>
          <article class="rounded-2xl bg-white p-6 shadow-clean border border-slate-100">
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="mb-4 overflow-hidden rounded-xl h-48">
                <?php the_post_thumbnail( 'large', array( 'class' => 'h-full w-full object-cover' ) ); ?>
              </div>
            <?php endif; ?>
            <h2 class="text-xl font-bold text-ikaBlueDark mb-2">
              <a href="<?php the_permalink(); ?>" class="hover:text-ikaBlue"><?php the_title(); ?></a>
            </h2>
            <div class="text-sm text-slate-600 mb-4"><?php the_excerpt(); ?></div>
            <a href="<?php the_permalink(); ?>" class="text-sm font-extrabold text-ikaRed hover:underline">Lire la suite &rarr;</a>
          </article>
        <?php endwhile; ?>
      </div>
    <?php else : ?>
      <p class="text-slate-600">Aucun contenu trouvé.</p>
    <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>
