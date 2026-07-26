<?php
/**
 * Template part : partenaires (section « partenaires »).
 * Alimenté par le CPT ika_partenaire, éditable depuis l'administration.
 *
 * @package ika-solution
 */

$ika_partners = get_posts(
	array(
		'post_type'      => 'ika_partenaire',
		'posts_per_page' => 12,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	)
);

if ( ! $ika_partners ) {
	return;
}
?>
<section id="partenaires" class="bg-ikaSoft py-20 sm:py-28">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="reveal flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
      <div class="max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php esc_html_e( 'Nos partenaires', 'ika-solution' ); ?></p>
        <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php esc_html_e( 'Ils nous font confiance.', 'ika-solution' ); ?></h2>
      </div>
      <p class="max-w-sm text-sm leading-7 text-slate-600"><?php esc_html_e( 'Solutions logicielles, systèmes, paiement, infrastructure et services numériques.', 'ika-solution' ); ?></p>
    </div>
    <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6">
      <?php
      foreach ( $ika_partners as $ika_partner ) :
        $ika_logo   = get_post_meta( $ika_partner->ID, 'ika_partenaire_image', true );
        $ika_height = get_post_meta( $ika_partner->ID, 'ika_partenaire_height', true );
        $ika_height = $ika_height ? $ika_height : 'max-h-16';
      ?>
      <div class="reveal flex h-32 items-center justify-center rounded-2xl bg-white p-6 shadow-clean">
        <?php if ( $ika_logo ) : ?>
          <img class="<?php echo esc_attr( $ika_height ); ?> max-w-full object-contain" src="<?php echo esc_url( ika_asset( $ika_logo ) ); ?>" alt="<?php echo esc_attr( get_the_title( $ika_partner ) ); ?>" loading="lazy">
        <?php else : ?>
          <span class="text-xl font-black text-ikaBlue"><?php echo esc_html( get_the_title( $ika_partner ) ); ?></span>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
