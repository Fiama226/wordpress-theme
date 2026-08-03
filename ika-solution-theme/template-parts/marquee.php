<?php
/**
 * Template part : bandeau défilant de mots-clés (entre expertises et produits).
 *
 * Mots-clés éditables depuis Personnaliser > Contenu IKA Solution >
 * Accueil — Bandeau défilant (séparés par des virgules).
 * Le filtre ika_marquee_keywords reste honoré (rétro-compatibilité).
 *
 * @package ika-solution
 */

if ( has_filter( 'ika_marquee_keywords' ) ) {
	$ika_keywords = apply_filters( 'ika_marquee_keywords', array() );
} else {
	$ika_keywords = array_values( array_filter( array_map( 'trim', explode( ',', (string) ika_opt( 'ika_marquee_keywords' ) ) ) ) );
}

if ( ! $ika_keywords ) {
	return;
}
?>
    <section class="overflow-hidden bg-white py-6" aria-label="<?php esc_attr_e( 'Nos domaines', 'ika-solution' ); ?>">
      <div class="flex w-max animate-marquee">
        <?php for ( $group = 0; $group < 2; $group++ ) : ?>
        <div class="flex gap-4 px-2"<?php echo $group ? ' aria-hidden="true"' : ''; ?>>
          <?php
          // Le motif d'origine répète deux fois la liste par groupe.
          for ( $repeat = 0; $repeat < 2; $repeat++ ) :
            foreach ( $ika_keywords as $i => $keyword ) :
              $bg = ( $i % 2 === 0 ) ? 'bg-ikaBlue' : 'bg-ikaRed';
          ?>
          <span class="rounded-full <?php echo esc_attr( $bg ); ?> px-6 py-3 text-sm font-black text-white"><?php echo esc_html( $keyword ); ?></span>
          <?php
            endforeach;
          endfor;
          ?>
        </div>
        <?php endfor; ?>
      </div>
    </section>
