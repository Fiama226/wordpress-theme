<?php
/**
 * Template part: Solutions / Produits logiciels (section "produits")
 * Products are driven by the ika_solution CPT (editable from the WordPress admin).
 */
$solutions = get_posts( array(
    'post_type'      => 'ika_solution',
    'posts_per_page' => 20,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );
?>
    <section id="produits" class="bg-white py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal text-center max-w-3xl mx-auto">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Logiciels phares</p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Nos solutions logicielles métiers</h2>
          <p class="mt-4 text-base text-slate-600">Des progiciels conçus et développés pour automatiser vos processus administratifs, sécuriser vos accueils et valoriser vos archives.</p>
        </div>

        <?php if ( $solutions ) : ?>
        <div class="mt-14 flex flex-wrap justify-center gap-3">
          <?php foreach ( $solutions as $i => $sol ) : ?>
            <button class="product-tab rounded-full px-7 py-3 text-sm font-black transition <?php echo $i === 0 ? 'bg-ikaBlue text-white shadow-clean' : 'bg-ikaSoft text-slate-700 hover:bg-slate-200'; ?>" data-target="<?php echo esc_attr( $sol->post_name ); ?>"><?php echo esc_html( get_the_title( $sol ) ); ?></button>
          <?php endforeach; ?>
        </div>

        <div class="mt-12 rounded-[2.5rem] bg-ikaSoft p-6 sm:p-10 lg:p-14">
          <?php foreach ( $solutions as $i => $sol ) :
            $sol_img      = ika_asset( get_post_meta( $sol->ID, 'ika_image', true ) );
            $sol_eyebrow  = get_post_meta( $sol->ID, 'ika_eyebrow', true );
            $sol_features = ika_get_list_meta( $sol->ID, 'ika_features' );
            $sol_brochure = get_post_meta( $sol->ID, 'ika_brochure', true );
          ?>
          <div id="<?php echo esc_attr( $sol->post_name ); ?>" class="product-slide <?php echo $i === 0 ? 'active' : ''; ?> grid gap-10 lg:grid-cols-2 lg:items-center">
            <div class="reveal">
              <span class="inline-flex rounded-full bg-ikaBlue/10 px-4 py-1.5 text-xs font-black text-ikaBlue"><?php echo esc_html( $sol_eyebrow ); ?></span>
              <h3 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl"><?php echo esc_html( get_the_title( $sol ) ); ?></h3>
              <p class="mt-4 text-base leading-7 text-slate-600"><?php echo esc_html( get_the_excerpt( $sol ) ); ?></p>
              <ul class="mt-6 grid gap-3 text-sm font-semibold text-slate-700">
                <?php foreach ( $sol_features as $feature ) : ?>
                  <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> <?php echo esc_html( $feature ); ?></li>
                <?php endforeach; ?>
              </ul>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="<?php echo esc_url( get_permalink( $sol ) ); ?>" class="rounded-full bg-ikaBlue px-7 py-4 text-sm font-bold text-white transition hover:bg-ikaBlueDark"><?php
                  /* translators: %s: nom de la solution */
                  printf( esc_html__( 'Découvrir %s', 'ika-solution' ), esc_html( get_the_title( $sol ) ) );
                ?></a>
                <?php if ( $sol_brochure ) : ?>
                <a href="<?php echo esc_url( ika_asset( $sol_brochure ) ); ?>" download="<?php echo esc_attr( 'Brochure_' . sanitize_file_name( get_the_title( $sol ) ) . '.' . pathinfo( $sol_brochure, PATHINFO_EXTENSION ) ); ?>" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:bg-ikaSoft hover:text-ikaBlue"><?php esc_html_e( 'Télécharger la brochure', 'ika-solution' ); ?></a>
                <?php endif; ?>
              </div>
            </div>
            <div class="reveal relative">
              <img class="h-80 w-full object-cover rounded-[1.5rem] shadow-premium lg:h-[520px]" src="<?php echo esc_url( $sol_img ); ?>" alt="<?php echo esc_attr( get_the_title( $sol ) ); ?>">
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
    </section>
