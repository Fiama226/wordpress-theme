<?php
/**
 * The template for displaying all pages
 */
get_header();
?>
<main class="pt-32 pb-20">
  <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
    <?php while ( have_posts() ) : the_post(); ?>
      <article class="prose max-w-none">
        <h1 class="text-4xl font-black text-ikaBlueDark mb-6"><?php the_title(); ?></h1>
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="mb-8 overflow-hidden rounded-2xl h-80">
            <?php the_post_thumbnail( 'full', array( 'class' => 'h-full w-full object-cover' ) ); ?>
          </div>
        <?php endif; ?>
        <div class="text-slate-700 leading-8">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</main>
<?php get_footer(); ?>
