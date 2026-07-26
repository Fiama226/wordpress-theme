<?php
/**
 * Template part : vision, mission et valeurs (section « vision »).
 *
 * @package ika-solution
 */

$ika_cards = apply_filters(
	'ika_vision_cards',
	array(
		array(
			'eyebrow'       => __( 'Vision', 'ika-solution' ),
			'title'         => __( 'Être la solution qui convient à vos ambitions.', 'ika-solution' ),
			'text'          => __( 'Aider les organisations du Burkina Faso et de la sous-région à bâtir des systèmes informatiques solides, utiles et évolutifs.', 'ika-solution' ),
			'card_class'    => 'bg-ikaBlue text-white',
			'eyebrow_class' => 'text-red-200',
			'title_class'   => '',
			'text_class'    => 'text-white/80',
		),
		array(
			'eyebrow'       => __( 'Mission', 'ika-solution' ),
			'title'         => __( 'Fournir le meilleur service pour optimiser votre rendement.', 'ika-solution' ),
			'text'          => __( 'Conseiller, développer, intégrer, héberger et maintenir des solutions informatiques qui renforcent réellement la productivité des équipes.', 'ika-solution' ),
			'card_class'    => 'bg-ikaSoft',
			'eyebrow_class' => 'text-ikaRed',
			'title_class'   => 'text-ikaBlue',
			'text_class'    => 'text-slate-600',
		),
		array(
			'eyebrow'       => __( 'Valeurs', 'ika-solution' ),
			'title'         => __( 'Rigueur, confiance, innovation et proximité.', 'ika-solution' ),
			'text'          => __( 'Nous privilégions la clarté, la qualité d’exécution, la sécurité et l’accompagnement durable de nos clients.', 'ika-solution' ),
			'card_class'    => 'bg-ikaRed text-white',
			'eyebrow_class' => 'text-white/75',
			'title_class'   => '',
			'text_class'    => 'text-white/85',
		),
	)
);
?>
    <section id="vision" class="bg-white py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal max-w-3xl">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php esc_html_e( 'Vision, mission et valeurs', 'ika-solution' ); ?></p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php esc_html_e( 'Construire un numérique fiable, utile et durable pour les organisations.', 'ika-solution' ); ?></h2>
        </div>
        <div class="mt-12 grid gap-6 lg:grid-cols-3">
          <?php foreach ( $ika_cards as $ika_card ) : ?>
          <article class="reveal rounded-[2rem] <?php echo esc_attr( $ika_card['card_class'] ); ?> p-8 shadow-clean">
            <span class="text-sm font-black uppercase tracking-[0.18em] <?php echo esc_attr( $ika_card['eyebrow_class'] ); ?>"><?php echo esc_html( $ika_card['eyebrow'] ); ?></span>
            <h3 class="mt-5 text-3xl font-black <?php echo esc_attr( $ika_card['title_class'] ); ?>"><?php echo esc_html( $ika_card['title'] ); ?></h3>
            <p class="mt-5 text-sm leading-7 <?php echo esc_attr( $ika_card['text_class'] ); ?>"><?php echo esc_html( $ika_card['text'] ); ?></p>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
