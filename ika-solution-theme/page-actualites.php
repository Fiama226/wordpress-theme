<?php /* Template Name: Actualites */ ?>
<?php get_header(); ?>

  <main>
    <section class="relative overflow-hidden bg-ikaBlueDark pt-36 text-white sm:pt-40">
      <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image:url('<?php echo ika_asset('images/slide3.jpg'); ?>')" aria-hidden="true"></div>
      <div class="absolute inset-0 bg-ikaBlueDark/92" aria-hidden="true"></div>
      <div class="relative mx-auto max-w-7xl px-4 pb-20 sm:px-6 lg:px-8">
        <div class="reveal max-w-3xl">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Actualités</p>
          <h1 class="mt-5 text-4xl font-black leading-[1.05] tracking-normal sm:text-5xl lg:text-6xl">Toutes nos actualités</h1>
          <p class="mt-6 text-lg leading-8 text-white/80 sm:text-xl">Retrouvez les sujets qui structurent la transformation digitale locale : cloud, sécurité, présence numérique, outils métier et continuité de service.</p>
        </div>
      </div>
    </section>

    <section class="bg-ikaSoft py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
          <?php
          $ika_query = new WP_Query(
            array(
              'post_type'      => 'post',
              'posts_per_page' => 12,
              'post_status'    => 'publish',
            )
          );
          if ( $ika_query->have_posts() ) :
            $ika_i = 0;
            while ( $ika_query->have_posts() ) :
              $ika_query->the_post();
              $ika_cats  = get_the_category();
              $ika_tag   = $ika_cats ? $ika_cats[0]->name : '';
              $ika_color = ( $ika_i % 2 === 0 ) ? 'bg-ikaBlue' : 'bg-ikaRed';
              $ika_i++;
          ?>
            <article class="reveal flex h-full flex-col overflow-hidden rounded-2xl bg-white shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
              <img class="h-64 w-full object-cover" src="<?php echo esc_url( ika_post_image( get_the_ID(), 'ika_post_image' ) ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
              <div class="flex flex-1 flex-col p-7">
                <?php if ( $ika_tag ) : ?>
                <span class="<?php echo esc_attr( $ika_color ); ?> w-fit rounded-full px-4 py-2 text-xs font-black uppercase tracking-[0.14em] text-white"><?php echo esc_html( $ika_tag ); ?></span>
                <?php endif; ?>
                <h2 class="mt-6 text-2xl font-black leading-tight text-ikaBlue"><?php the_title(); ?></h2>
                <p class="mt-4 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( get_the_excerpt() ); ?></p>
                <a href="<?php the_permalink(); ?>" class="mt-6 inline-flex w-fit rounded-full bg-ikaRed px-5 py-3 text-sm font-black text-white transition hover:bg-red-700"><?php esc_html_e( 'Lire la suite', 'ika-solution' ); ?></a>
              </div>
            </article>
          <?php
            endwhile;
            wp_reset_postdata();
          else :
          ?>
            <p class="text-slate-600"><?php esc_html_e( 'Aucune actualité pour le moment.', 'ika-solution' ); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>
