<?php
/**
 * Template part : méthode en 3 étapes (bandeau bleu foncé).
 *
 * Contenu éditable depuis Personnaliser > Contenu IKA Solution >
 * Accueil — Méthode. Le filtre ika_methode_steps reste honoré
 * (rétro-compatibilité avec les thèmes enfants).
 *
 * @package ika-solution
 */

if ( has_filter( 'ika_methode_steps' ) ) {
	$ika_steps = apply_filters( 'ika_methode_steps', array() );
} else {
	$ika_steps = array(
		array( '01', ika_opt( 'ika_methode_1_title' ), ika_opt( 'ika_methode_1_text' ) ),
		array( '02', ika_opt( 'ika_methode_2_title' ), ika_opt( 'ika_methode_2_text' ) ),
		array( '03', ika_opt( 'ika_methode_3_title' ), ika_opt( 'ika_methode_3_text' ) ),
	);
}
?>
    <section class="relative overflow-hidden bg-ikaBlueDark py-20 text-white sm:py-28">
      <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image:url('<?php echo esc_url( ika_asset( 'images/presentation.jpg' ) ); ?>')" aria-hidden="true"></div>
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
      <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[1fr_.9fr] lg:items-center">
          <div class="reveal">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-red-300"><?php echo esc_html( ika_opt( 'ika_methode_eyebrow' ) ); ?></p>
            <h2 class="mt-4 text-4xl font-black tracking-normal sm:text-5xl"><?php echo esc_html( ika_opt( 'ika_methode_title' ) ); ?></h2>
          </div>
          <div class="reveal grid gap-4">
            <?php foreach ( $ika_steps as $i => $ika_step ) :
              $badge = ( $i % 2 === 0 ) ? 'bg-ikaRed' : 'bg-white text-ikaBlue';
            ?>
            <div class="flex gap-5 rounded-2xl border border-white/15 bg-white/10 p-5">
              <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full <?php echo esc_attr( $badge ); ?> text-sm font-black"><?php echo esc_html( $ika_step[0] ); ?></span>
              <div>
                <h3 class="font-black"><?php echo esc_html( $ika_step[1] ); ?></h3>
                <p class="mt-1 text-sm leading-7 text-white/75"><?php echo esc_html( $ika_step[2] ); ?></p>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
