<?php
/**
 * Template part: Solutions / Produits logiciels (section "produits")
 * Produits pilotés par le CPT ika_solution, éditables depuis l'administration.
 * Reproduction fidèle du site statique : fond bleu nuit, onglets blancs,
 * carte blanche avec image à gauche et contenu à droite.
 *
 * @package ika-solution
 */

$solutions = get_posts( array(
    'post_type'      => 'ika_solution',
    'posts_per_page' => 20,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );

if ( ! $solutions ) {
    return;
}
?>
    <section id="produits" class="bg-ikaBlueDark py-20 text-white sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[.85fr_1.15fr] lg:items-end">
          <div class="reveal">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-red-300"><?php esc_html_e( 'Nos solutions', 'ika-solution' ); ?></p>
            <h2 class="mt-4 text-4xl font-black tracking-normal sm:text-5xl"><?php esc_html_e( 'Des solutions prêtes pour vos opérations.', 'ika-solution' ); ?></h2>
            <p class="mt-5 max-w-xl text-base leading-8 text-white/75"><?php esc_html_e( 'Des logiciels IKA pensés pour améliorer l’accueil, le courrier, l’archivage et les services numériques métiers.', 'ika-solution' ); ?></p>
          </div>
          <div class="reveal flex gap-3 overflow-x-auto no-scrollbar lg:justify-end">
            <?php foreach ( $solutions as $i => $sol ) : ?>
            <button class="product-tab whitespace-nowrap rounded-full px-5 py-3 text-sm font-black transition <?php echo $i === 0 ? 'bg-white text-ikaBlue' : 'border border-white/25 text-white'; ?>" data-product="<?php echo (int) $i; ?>"><?php echo esc_html( get_the_title( $sol ) ); ?></button>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="mt-12 overflow-hidden rounded-[2rem] bg-white text-ikaInk shadow-premium">
          <?php foreach ( $solutions as $i => $sol ) :
              $sol_image    = ika_asset( get_post_meta( $sol->ID, 'ika_image', true ) );
              $sol_brochure = get_post_meta( $sol->ID, 'ika_brochure', true );
              $sol_badges   = ika_get_first_benefits( $sol->ID );
              $brochure_ext = $sol_brochure ? pathinfo( $sol_brochure, PATHINFO_EXTENSION ) : 'png';
              $brochure_name = $sol_brochure ? 'Brochure_' . sanitize_file_name( get_the_title( $sol ) ) . '.' . $brochure_ext : '';
          ?>
          <article class="product-slide grid-cols-1 lg:grid-cols-2 <?php echo $i === 0 ? 'active' : ''; ?>">
            <img class="h-80 w-full object-cover lg:h-[520px]" src="<?php echo esc_url( $sol_image ); ?>" alt="<?php echo esc_attr( get_the_title( $sol ) ); ?>">
            <div class="flex flex-col justify-center p-8 sm:p-12">
              <h3 class="mt-4 text-4xl font-black text-ikaBlue"><?php echo esc_html( get_the_title( $sol ) ); ?></h3>
              <p class="mt-5 text-lg leading-8 text-slate-600"><?php echo esc_html( get_the_excerpt( $sol ) ); ?></p>
              <?php if ( $sol_badges ) : ?>
              <div class="mt-8 grid gap-3 sm:grid-cols-3">
                <?php foreach ( $sol_badges as $badge ) : ?>
                <span class="rounded-xl bg-ikaSoft px-4 py-3 text-sm font-bold"><?php echo esc_html( $badge ); ?></span>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="<?php echo esc_url( get_permalink( $sol ) ); ?>" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php esc_html_e( 'En savoir plus', 'ika-solution' ); ?></a>
                <?php if ( $sol_brochure ) : ?>
                <a href="<?php echo esc_url( ika_asset( $sol_brochure ) ); ?>" download="<?php echo esc_attr( $brochure_name ); ?>" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:text-ikaBlue hover:bg-ikaSoft"><?php esc_html_e( 'Télécharger la brochure', 'ika-solution' ); ?></a>
                <?php endif; ?>
              </div>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
