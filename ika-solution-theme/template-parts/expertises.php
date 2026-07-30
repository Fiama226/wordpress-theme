<?php
/**
 * Template part: Expertises (section "expertises")
 * Expertises pilotées par le CPT ika_expertise, éditables depuis l'administration.
 * Reproduction fidèle du site statique : 8 cartes en grille 4 colonnes,
 * clips visuels alternés, fonds blanc/bleu alternés, décalages verticaux,
 * cartes cliquables avec redirection.
 *
 * @package ika-solution
 */

$expertises = get_posts( array(
    'post_type'      => 'ika_expertise',
    'posts_per_page' => 20,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );

if ( ! $expertises ) {
    return;
}

// Alternance des couleurs de fond comme dans le site statique :
// indices 0-3 → fond blanc ; indices 4-7 → fond bleu nuit.
$dark_indices = array( 4, 5, 6, 7 );
?>
    <section id="expertises" class="bg-ikaSoft py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
          <div class="max-w-3xl">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php esc_html_e( 'Nos domaines d\'expertise', 'ika-solution' ); ?></p>
            <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php esc_html_e( 'Votre partenaire d\'expertise et d\'innovation.', 'ika-solution' ); ?></h2>
          </div>
          <a href="<?php echo esc_url( ika_asset( 'pdf/brochure.pdf' ) ); ?>" target="_blank" class="inline-flex w-fit shrink-0 rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white shadow-clean transition hover:bg-red-700"><?php esc_html_e( 'Voir la brochure', 'ika-solution' ); ?></a>
        </div>

        <div class="mt-12 grid gap-7 md:grid-cols-2 lg:grid-cols-4">
          <?php
          // Décalages verticaux alternés — reproduits à l'identique du site
          // statique (la 2e carte, « Infrastructures », n'a aucun décalage).
          $translate_classes = array(
              'lg:-translate-y-4',
              '',
              'lg:translate-y-6',
              'lg:-translate-y-2',
              'lg:translate-y-2',
              'lg:-translate-y-6',
              'lg:translate-y-8',
              'lg:-translate-y-1',
          );

          foreach ( $expertises as $i => $exp ) :
              $exp_img      = get_post_meta( $exp->ID, 'ika_expertise_image', true );
              $exp_url      = ika_expertise_url( $exp );
              $cut          = 'expertise-cut-' . chr( ord( 'a' ) + ( $i % 8 ) );
              $is_dark      = in_array( $i, $dark_indices, true );
              $translate    = isset( $translate_classes[ $i ] ) ? $translate_classes[ $i ] : '';
              $card_class   = $is_dark
                  ? 'bg-ikaBlueDark p-7 text-white shadow-clean'
                  : 'bg-white p-7 shadow-clean';
              $title_class  = $is_dark
                  ? 'text-xl font-black leading-tight transition group-hover:text-red-200'
                  : 'text-xl font-black leading-tight text-ikaBlue transition group-hover:text-ikaRed';
              $text_class   = $is_dark
                  ? 'text-sm leading-7 text-white/75'
                  : 'text-sm leading-7 text-slate-600';
          ?>
          <div onclick="window.location.href='<?php echo $exp_url; ?>'" class="expertise-card reveal group relative flex h-full flex-col rounded-2xl <?php echo esc_attr( trim( $card_class . ' ' . $translate ) ); ?> transition hover:-translate-y-2 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25 cursor-pointer" role="link" tabindex="0">
            <div class="expertise-visual <?php echo esc_attr( $cut ); ?>">
              <img src="<?php echo esc_url( ika_asset( $exp_img ) ); ?>" alt="<?php echo esc_attr( get_the_title( $exp ) ); ?>">
            </div>
            <h3 class="mt-6 <?php echo esc_attr( $title_class ); ?>"><?php echo esc_html( get_the_title( $exp ) ); ?></h3>
            <p class="mt-4 flex-1 <?php echo esc_attr( $text_class ); ?>"><?php echo esc_html( get_the_excerpt( $exp ) ); ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
