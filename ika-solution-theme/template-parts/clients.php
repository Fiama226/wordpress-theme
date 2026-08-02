<?php
/**
 * Template part : clients (section « clients »).
 * Carrousel infini pleine largeur, alimenté par le CPT ika_client.
 *
 * Chaque client peut avoir un lien (meta ika_client_url) :
 * renseigné → le logo est cliquable (nouvel onglet pour les URL externes) ;
 * vide      → le logo s'affiche sans lien.
 *
 * @package ika-solution
 */

$ika_clients = get_posts(
	array(
		'post_type'      => 'ika_client',
		'posts_per_page' => 20,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	)
);

if ( ! $ika_clients ) {
	return;
}

update_postmeta_cache( wp_list_pluck( $ika_clients, 'ID' ) );
?>
<section id="clients" class="bg-white py-20 sm:py-28 overflow-hidden">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="reveal flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
      <div class="max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php esc_html_e( 'Nos clients', 'ika-solution' ); ?></p>
        <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php esc_html_e( 'Ils ont choisi IKA Solutions', 'ika-solution' ); ?></h2>
      </div>
      <p class="max-w-sm text-sm leading-7 text-slate-600"><?php esc_html_e( 'Entreprises, institutions et organisations qui nous confient leurs projets numériques.', 'ika-solution' ); ?></p>
    </div>
  </div>

  <!-- Carrousel infini, pleine largeur, fondu sur les bords -->
  <div class="clients-marquee reveal mt-12">
    <div class="clients-track">
      <?php for ( $ika_group = 0; $ika_group < 2; $ika_group++ ) : ?>
      <div class="clients-group"<?php echo $ika_group ? ' aria-hidden="true"' : ''; ?>>
        <?php
        foreach ( $ika_clients as $ika_client ) :
          $ika_logo = get_post_meta( $ika_client->ID, 'ika_client_image', true );
          if ( ! $ika_logo ) {
            continue;
          }
          $ika_link = trim( (string) get_post_meta( $ika_client->ID, 'ika_client_url', true ) );
          $ika_url  = $ika_link ? ika_slide_url( $ika_link ) : '';
          $ika_img  = '<img src="' . esc_url( ika_asset( $ika_logo ) ) . '" alt="' . esc_attr( get_the_title( $ika_client ) ) . '" loading="lazy">';
        ?>
        <?php if ( $ika_url ) : ?>
        <a class="client-logo" href="<?php echo esc_url( $ika_url ); ?>"<?php echo preg_match( '#^https?://#i', $ika_url ) ? ' target="_blank" rel="noopener"' : ''; ?><?php echo $ika_group ? ' tabindex="-1"' : ''; ?>><?php echo $ika_img; // phpcs:ignore -- contenu déjà échappé. ?></a>
        <?php else : ?>
        <div class="client-logo"><?php echo $ika_img; // phpcs:ignore -- contenu déjà échappé. ?></div>
        <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>
