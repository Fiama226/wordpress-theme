<?php /* Template Name: Equipe */ ?>
<?php
  get_header();
?>

<main>
  <section class="relative overflow-hidden bg-ikaBlueDark pt-36 text-white sm:pt-40">
    <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image:url('<?php echo esc_url( ika_asset( ika_opt( 'ika_equipe_hero_image' ) ) ); ?>')" aria-hidden="true"></div>
    <div class="absolute inset-0 bg-ikaBlueDark/92" aria-hidden="true"></div>
    <div class="relative mx-auto max-w-7xl px-4 pb-20 sm:px-6 lg:px-8">
      <div class="max-w-4xl">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg><?php echo esc_html( ika_opt( 'ika_equipe_hero_back' ) ); ?></a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_equipe_hero_eyebrow' ) ); ?></p>
        <h1 class="mt-5 text-4xl font-black leading-[1.05] tracking-normal sm:text-5xl lg:text-6xl"><?php echo esc_html( ika_opt( 'ika_equipe_hero_title' ) ); ?></h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/80 sm:text-xl"><?php echo esc_html( ika_opt( 'ika_equipe_hero_text' ) ); ?></p>
      </div>
    </div>
  </section>

  <section class="bg-white py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_equipe_profil_eyebrow' ) ); ?></p>
        <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php echo esc_html( ika_opt( 'ika_equipe_profil_title' ) ); ?></h2>
        <p class="mt-6 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_equipe_profil_text' ) ); ?></p>
      </div>
    </div>
  </section>

 <section class="bg-ikaSoft py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal text-center">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_equipe_team_eyebrow' ) ); ?></p>
        <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php echo esc_html( ika_opt( 'ika_equipe_team_title' ) ); ?></h2>
      </div>
      <div class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        <?php
        $ika_membres = get_posts(
          array(
            'post_type'      => 'ika_membre',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
          )
        );
        foreach ( $ika_membres as $ika_membre ) :
          $ika_role = get_post_meta( $ika_membre->ID, 'ika_membre_role', true );
          $ika_bio  = has_excerpt( $ika_membre->ID ) ? get_the_excerpt( $ika_membre ) : $ika_membre->post_content;
        ?>
        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo esc_url( ika_post_image( $ika_membre->ID, 'ika_membre_image', 'images/logo.png' ) ); ?>" alt="<?php echo esc_attr( get_the_title( $ika_membre ) ); ?>" loading="lazy">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( get_the_title( $ika_membre ) ); ?></h3>
          <?php if ( $ika_role ) : ?>
          <p class="mt-1 text-sm font-bold text-ikaRed"><?php echo esc_html( $ika_role ); ?></p>
          <?php endif; ?>
          <?php if ( $ika_bio ) : ?>
          <p class="mt-4 text-sm leading-7 text-slate-600"><?php echo esc_html( wp_strip_all_tags( $ika_bio ) ); ?></p>
          <?php endif; ?>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_equipe_values_eyebrow' ) ); ?></p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php echo esc_html( ika_opt( 'ika_equipe_values_title' ) ); ?></h2>
        </div>
        <div class="reveal grid gap-5">
          <div class="flex gap-5 rounded-2xl border border-slate-100 bg-ikaSoft p-6">
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-ikaBlue text-lg font-black text-white">01</span>
            <div>
              <h3 class="font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_equipe_value_1_title' ) ); ?></h3>
              <p class="mt-2 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_equipe_value_1_text' ) ); ?></p>
            </div>
          </div>
          <div class="flex gap-5 rounded-2xl border border-slate-100 bg-ikaSoft p-6">
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-ikaRed text-lg font-black text-white">02</span>
            <div>
              <h3 class="font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_equipe_value_2_title' ) ); ?></h3>
              <p class="mt-2 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_equipe_value_2_text' ) ); ?></p>
            </div>
          </div>
          <div class="flex gap-5 rounded-2xl border border-slate-100 bg-ikaSoft p-6">
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-ikaBlue text-lg font-black text-white">03</span>
            <div>
              <h3 class="font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_equipe_value_3_title' ) ); ?></h3>
              <p class="mt-2 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_equipe_value_3_text' ) ); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
