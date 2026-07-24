<?php
/**
 * The template for displaying single posts (news/articles)
 */
get_header();
?>
<main class="pt-32 pb-20">
  <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
    <?php while ( have_posts() ) : the_post(); ?>
      <article>
        <div class="mb-6 flex items-center gap-3 text-sm font-semibold text-ikaRed">
          <span><?php echo get_the_date(); ?></span>
          <span>•</span>
          <span><?php the_category(', '); ?></span>
        </div>
        <h1 class="text-4xl font-black text-ikaBlueDark sm:text-5xl mb-8"><?php the_title(); ?></h1>
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="mb-10 overflow-hidden rounded-3xl h-[420px] shadow-premium">
            <?php the_post_thumbnail( 'full', array( 'class' => 'h-full w-full object-cover' ) ); ?>
          </div>
        <?php endif; ?>
        <div class="text-slate-700 leading-8 space-y-6 text-lg">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</main>
<?php get_footer(); ?>
