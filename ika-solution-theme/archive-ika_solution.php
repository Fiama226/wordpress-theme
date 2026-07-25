<?php
/**
 * Archive template for IKA Solutions (product listing page).
 * Lists every ika_solution CPT entry; content is editable from the admin.
 */
get_header();
?>
<main class="bg-white pt-32 py-16">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Nos solutions</p>
    <h1 class="mt-4 text-4xl font-black text-ikaBlueDark sm:text-5xl">Solutions logicielles métiers</h1>
    <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        $image = get_post_meta( get_the_ID(), 'ika_image', true );
      ?>
        <a href="<?php the_permalink(); ?>" class="group overflow-hidden rounded-2xl bg-ikaSoft shadow-clean transition hover:-translate-y-1 hover:shadow-premium">
          <img class="h-48 w-full object-cover transition duration-500 group-hover:scale-105" src="<?php echo esc_url( ika_asset( $image ) ); ?>" alt="<?php the_title_attribute(); ?>">
          <div class="p-6">
            <h2 class="text-xl font-black text-ikaBlueDark"><?php the_title(); ?></h2>
            <p class="mt-3 text-sm leading-7 text-slate-600"><?php echo esc_html( get_the_excerpt() ); ?></p>
          </div>
        </a>
      <?php endwhile; endif; ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>
