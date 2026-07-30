<?php
/**
 * Template part : « Dernières réalisations » (section « realisations » de l'accueil).
 *
 * Comme sur le site statique, ce sont 3 cartes teaser propres à l'accueil
 * (distinctes de la page Réalisations alimentée par le CPT ika_realisation).
 * Chaque carte est éditable dans Apparence > Personnaliser > Contenu IKA Solution >
 * « Accueil — Dernières réalisations » ; les valeurs par défaut reproduisent
 * exactement le contenu du site statique (images sonatur).
 *
 * @package ika-solution
 */
?>
    <section id="realisations" class="bg-white py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
          <div class="max-w-3xl">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php esc_html_e( 'Réalisations', 'ika-solution' ); ?></p>
            <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php esc_html_e( 'Dernières réalisations.', 'ika-solution' ); ?></h2>
          </div>
          <a href="<?php echo esc_url( ika_page_url( 'realisations' ) ); ?>" class="inline-flex w-fit rounded-full border border-slate-200 px-6 py-3 text-sm font-black text-ikaBlue transition hover:border-ikaBlue"><?php esc_html_e( 'Voir toutes les réalisations', 'ika-solution' ); ?></a>
        </div>
        <div class="mt-12 grid gap-6 lg:grid-cols-3">
          <?php for ( $ika_i = 1; $ika_i <= 3; $ika_i++ ) : ?>
          <article class="reveal overflow-hidden rounded-2xl bg-ikaSoft shadow-clean">
            <img class="h-56 w-full object-cover" src="<?php echo esc_url( ika_asset( ika_opt( "ika_home_real_{$ika_i}_image" ) ) ); ?>" alt="<?php echo esc_attr( ika_opt( "ika_home_real_{$ika_i}_title" ) ); ?>" loading="lazy">
            <div class="p-7">
              <p class="text-sm font-black text-ikaRed"><?php echo esc_html( ika_opt( "ika_home_real_{$ika_i}_client" ) ); ?></p>
              <h3 class="mt-3 text-2xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( "ika_home_real_{$ika_i}_title" ) ); ?></h3>
              <p class="mt-4 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( "ika_home_real_{$ika_i}_text" ) ); ?></p>
            </div>
          </article>
          <?php endfor; ?>
        </div>
      </div>
    </section>
