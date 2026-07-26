<?php
/**
 * Template part: Expertises (section "expertises")
 * Expertises are driven by the ika_expertise CPT (editable from the WordPress admin).
 */
$expertises = get_posts( array(
    'post_type'      => 'ika_expertise',
    'posts_per_page' => 20,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );
?>
    <section id="expertises" class="bg-ikaSoft py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal flex flex-col justify-between gap-6 md:flex-row md:items-end">
          <div class="max-w-2xl">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Domaines d'intervention</p>
            <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Nos expertises au service de votre croissance</h2>
          </div>
          <a href="<?php echo esc_url( ika_asset('pdf/brochure.pdf') ); ?>" target="_blank" class="inline-flex w-fit shrink-0 rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white shadow-clean transition hover:bg-red-700">Voir la brochure</a>
        </div>

        <div class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
          <?php foreach ( $expertises as $i => $exp ) :
              $exp_img  = get_post_meta( $exp->ID, 'ika_expertise_image', true );
              $exp_link = get_post_meta( $exp->ID, 'ika_expertise_link', true );
              $cut      = 'expertise-cut-' . chr( ord( 'a' ) + ( $i % 8 ) );
          ?>
          <article class="expertise-card reveal rounded-3xl bg-white p-7 shadow-clean">
            <div class="expertise-visual <?php echo esc_attr( $cut ); ?>">
              <img src="<?php echo esc_url( ika_asset( $exp_img ) ); ?>" alt="<?php echo esc_attr( get_the_title( $exp ) ); ?>">
            </div>
            <h3 class="text-xl font-black text-ikaBlueDark"><?php echo esc_html( get_the_title( $exp ) ); ?></h3>
            <p class="mt-3 text-sm leading-7 text-slate-600"><?php echo wp_kses_post( wp_trim_words( $exp->post_content, 24, '…' ) ); ?></p>
            <a href="<?php echo esc_url( $exp_link ?: '#' ); ?>" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-ikaRed transition hover:translate-x-1">En savoir plus &rarr;</a>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
