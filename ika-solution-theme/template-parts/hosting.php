<?php
/**
 * Template part : hébergement, cloud et domaines (section « hosting »).
 *
 * Tous les textes et liens sont éditables depuis
 * Personnaliser > Contenu IKA Solution > Accueil — Hébergement.
 * Le filtre ika_hosting_offers reste honoré s'il est utilisé
 * (rétro-compatibilité avec les thèmes enfants).
 *
 * @package ika-solution
 */

$ika_offer_defaults = array(
	array(
		'num'   => '01',
		'title' => ika_opt( 'ika_hosting_offer_1_title' ),
		'text'  => ika_opt( 'ika_hosting_offer_1_text' ),
		'url'   => ika_opt( 'ika_hosting_offer_1_url' ),
		'class' => 'border border-slate-100 bg-ikaSoft p-7 transition hover:-translate-y-1 hover:shadow-clean',
	),
	array(
		'num'   => '02',
		'title' => ika_opt( 'ika_hosting_offer_2_title' ),
		'text'  => ika_opt( 'ika_hosting_offer_2_text' ),
		'url'   => ika_opt( 'ika_hosting_offer_2_url' ),
		'class' => 'border border-slate-100 bg-white p-7 shadow-clean transition hover:-translate-y-1 hover:shadow-premium',
	),
	array(
		'num'   => '03',
		'title' => ika_opt( 'ika_hosting_offer_3_title' ),
		'text'  => ika_opt( 'ika_hosting_offer_3_text' ),
		'url'   => ika_opt( 'ika_hosting_offer_3_url' ),
		'class' => 'border border-slate-100 bg-white p-7 shadow-clean transition hover:-translate-y-1 hover:shadow-premium',
	),
);

$ika_offers = has_filter( 'ika_hosting_offers' )
	? apply_filters( 'ika_hosting_offers', array() )
	: $ika_offer_defaults;
?>
    <section id="hosting" class="bg-white py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.9fr_1.1fr] lg:items-center">
          <div class="reveal">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_hosting_eyebrow' ) ); ?></p>
            <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php echo esc_html( ika_opt( 'ika_hosting_title' ) ); ?></h2>
            <p class="mt-6 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_hosting_text' ) ); ?></p>
            <a href="<?php echo esc_url( ika_opt( 'ika_hosting_url' ) ); ?>" target="_blank" rel="noopener" class="mt-8 inline-flex rounded-full bg-ikaBlue px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-ikaBlueDark"><?php echo esc_html( ika_opt( 'ika_hosting_cta' ) ); ?></a>
          </div>
          <div class="grid gap-5 sm:grid-cols-2">
            <?php foreach ( $ika_offers as $ika_offer ) : ?>
            <a href="<?php echo esc_url( $ika_offer['url'] ); ?>" target="_blank" rel="noopener" class="reveal block rounded-2xl <?php echo esc_attr( $ika_offer['class'] ); ?> focus:outline-none focus:ring-4 focus:ring-ikaRed/25" aria-label="<?php echo esc_attr( $ika_offer['title'] ); ?>">
              <span class="text-sm font-black text-ikaRed"><?php echo esc_html( $ika_offer['num'] ); ?></span>
              <h3 class="mt-5 text-2xl font-black text-ikaBlue"><?php echo esc_html( $ika_offer['title'] ); ?></h3>
              <p class="mt-4 text-sm leading-7 text-slate-600"><?php echo esc_html( $ika_offer['text'] ); ?></p>
            </a>
            <?php endforeach; ?>
            <a id="bf" href="<?php echo esc_url( ika_opt( 'ika_hosting_domain_url' ) ); ?>" target="_blank" rel="noopener" class="reveal block scroll-mt-32 rounded-2xl bg-ikaRed p-7 text-white shadow-clean transition hover:-translate-y-1 hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-ikaRed/25" aria-label="<?php echo esc_attr( ika_opt( 'ika_hosting_domain_label' ) ); ?>">
              <span class="text-sm font-black text-white/80"><?php echo esc_html( ika_opt( 'ika_hosting_domain_chip' ) ); ?></span>
              <h3 class="mt-5 text-2xl font-black"><?php echo esc_html( ika_opt( 'ika_hosting_domain_title' ) ); ?></h3>
              <p class="mt-4 text-sm leading-7 text-white/85"><?php echo esc_html( ika_opt( 'ika_hosting_domain_text' ) ); ?></p>
            </a>
          </div>
        </div>
      </div>
    </section>
