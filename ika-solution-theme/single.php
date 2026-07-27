<?php
/**
 * The template for displaying single posts (news/articles).
 * Le rendu reprend la page détail du site statique avec image, chapeau et contenu.
 */
get_header();
?>
<main class="bg-ikaSoft pt-36">
  <article class="mx-auto max-w-5xl px-4 pb-20 sm:px-6 lg:px-8">
    <a href="<?php echo esc_url( ika_page_url( 'actualites' ) ); ?>" class="inline-flex rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-black text-ikaBlue transition hover:border-ikaBlue"><?php esc_html_e( 'Retour aux actualités', 'ika-solution' ); ?></a>

    <?php while ( have_posts() ) : the_post(); ?>
      <?php
      $ika_cats  = get_the_category();
      $ika_tag   = $ika_cats ? $ika_cats[0]->name : '';
      $ika_intro = get_post_meta( get_the_ID(), '_ika_static_intro', true );
      if ( ! $ika_intro ) {
          $ika_intro = get_the_excerpt();
      }
      ?>
      <div class="mt-8 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <img class="h-[320px] w-full object-cover sm:h-[460px]" src="<?php echo esc_url( ika_post_image( get_the_ID(), 'ika_post_image', 'images/slide4.jpg' ) ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
        <div class="p-7 sm:p-10">
          <?php if ( $ika_tag ) : ?>
          <span class="rounded-full bg-ikaRed px-4 py-2 text-xs font-black uppercase tracking-[0.14em] text-white"><?php echo esc_html( $ika_tag ); ?></span>
          <?php endif; ?>
          <h1 class="mt-6 text-4xl font-black leading-tight text-ikaBlueDark sm:text-5xl"><?php the_title(); ?></h1>
          <?php if ( $ika_intro ) : ?>
          <p class="mt-5 text-lg leading-8 text-slate-600"><?php echo esc_html( wp_strip_all_tags( $ika_intro ) ); ?></p>
          <?php endif; ?>

          <div class="mt-10 grid gap-5 text-base leading-8 text-slate-700">
            <?php the_content(); ?>
          </div>
        </div>
      </div>

      <?php if ( comments_open() || get_comments_number() ) : ?>
      <section class="mt-10 rounded-[2rem] bg-white p-7 shadow-clean sm:p-8">
        <?php comments_template(); ?>
      </section>
      <?php endif; ?>
    <?php endwhile; ?>
  </article>
</main>
<?php get_footer(); ?>
