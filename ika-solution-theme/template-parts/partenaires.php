<?php
/**
 * Template part : partenaires (section « partenaires »).
 * Alimenté par le CPT ika_partenaire, éditable depuis l'administration.
 *
 * Chaque partenaire peut avoir un lien (meta ika_partenaire_url) :
 * renseigné → le logo est cliquable (ex : Proxmox → page /proxmox) ;
 * vide      → le logo s'affiche sans lien, comme sur le site statique.
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

// Pré-charge les métas de tous les partenaires en une passe.
update_postmeta_cache( wp_list_pluck( $ika_partners, 'ID' ) );
?>
<section id="partenaires" class="bg-ikaSoft py-10 sm:py-18">
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
        $ika_link   = trim( (string) get_post_meta( $ika_partner->ID, 'ika_partenaire_url', true ) );
        $ika_url    = $ika_link ? ika_slide_url( $ika_link ) : '';

        $ika_card_content = $ika_logo
          ? '<img class="' . esc_attr( $ika_height ) . ' max-w-full object-contain" src="' . esc_url( ika_asset( $ika_logo ) ) . '" alt="' . esc_attr( get_the_title( $ika_partner ) ) . '" loading="lazy">'
          : '<span class="text-xl font-black text-ikaBlue">' . esc_html( get_the_title( $ika_partner ) ) . '</span>';
      ?>
      <?php if ( $ika_url ) : ?>
      <a class="reveal flex h-32 items-center justify-center rounded-2xl bg-white p-6 shadow-clean" href="<?php echo esc_url( $ika_url ); ?>"<?php echo preg_match( '#^https?://#i', $ika_url ) ? ' target="_blank" rel="noopener"' : ''; ?>>
        <?php echo $ika_card_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- contenu déjà échappé ci-dessus. ?>
      </a>
      <?php else : ?>
      <div class="reveal flex h-32 items-center justify-center rounded-2xl bg-white p-6 shadow-clean">
        <?php echo $ika_card_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- contenu déjà échappé ci-dessus. ?>
      </div>
      <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
