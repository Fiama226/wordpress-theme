<?php
/**
 * Template part : bandeau défilant de mots-clés (entre expertises et produits).
 *
 * @package ika-solution
 */

$ika_keywords = apply_filters(
	'ika_marquee_keywords',
	array(
		'Audit digital',
		'Applications métier',
		'Hébergement web',
		'VPS local',
		'Cybersécurité',
		'Portails sécurisés',
	)
);
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
