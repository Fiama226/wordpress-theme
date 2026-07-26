<?php
/**
 * Template part : hébergement, cloud et domaines (section « hosting »).
 *
 * @package ika-solution
 */

$ika_offers = apply_filters(
	'ika_hosting_offers',
	array(
		array(
			'num'   => '01',
			'title' => __( 'Hébergement web', 'ika-solution' ),
			'text'  => __( 'Sites vitrines, portails, back-offices et applications métier.', 'ika-solution' ),
			'url'   => 'https://www.ikacloud.bf/shared-hosting.php',
			'label' => __( "Voir les offres d'hébergement web", 'ika-solution' ),
			'class' => 'border border-slate-100 bg-ikaSoft p-7 transition hover:-translate-y-1 hover:shadow-clean',
		),
		array(
			'num'   => '02',
			'title' => __( 'VPS local', 'ika-solution' ),
			'text'  => __( 'Serveurs privés pour projets critiques et environnements applicatifs.', 'ika-solution' ),
			'url'   => 'https://www.ikacloud.bf/vps-server.php',
			'label' => __( 'Voir les offres VPS local', 'ika-solution' ),
			'class' => 'border border-slate-100 bg-white p-7 shadow-clean transition hover:-translate-y-1 hover:shadow-premium',
		),
		array(
			'num'   => '03',
			'title' => __( 'Sécurité SSL', 'ika-solution' ),
			'text'  => __( 'Certificats SSL pour protéger vos sites, portails et transactions en ligne.', 'ika-solution' ),
			'url'   => 'https://www.ikacloud.bf/ssl-certificates.php',
			'label' => __( 'Voir les certificats de sécurité SSL', 'ika-solution' ),
			'class' => 'border border-slate-100 bg-white p-7 shadow-clean transition hover:-translate-y-1 hover:shadow-premium',
		),
	)
);
?>
    <section id="hosting" class="bg-white py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.9fr_1.1fr] lg:items-center">
          <div class="reveal">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php esc_html_e( 'Web, cloud et domaines', 'ika-solution' ); ?></p>
            <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php esc_html_e( 'Une infrastructure solide pour vos sites, portails et applications.', 'ika-solution' ); ?></h2>
            <p class="mt-6 text-base leading-8 text-slate-600"><?php esc_html_e( 'Hébergement, VPS, domaine et administration technique pour garder vos services disponibles, rapides et alignés avec votre marché.', 'ika-solution' ); ?></p>
            <a href="<?php echo esc_url( ika_opt( 'ika_hosting_url' ) ); ?>" target="_blank" rel="noopener" class="mt-8 inline-flex rounded-full bg-ikaBlue px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-ikaBlueDark"><?php esc_html_e( 'Découvrir nos offres', 'ika-solution' ); ?></a>
          </div>
          <div class="grid gap-5 sm:grid-cols-2">
            <?php foreach ( $ika_offers as $ika_offer ) : ?>
            <a href="<?php echo esc_url( $ika_offer['url'] ); ?>" target="_blank" rel="noopener" class="reveal block rounded-2xl <?php echo esc_attr( $ika_offer['class'] ); ?> focus:outline-none focus:ring-4 focus:ring-ikaRed/25" aria-label="<?php echo esc_attr( $ika_offer['label'] ); ?>">
              <span class="text-sm font-black text-ikaRed"><?php echo esc_html( $ika_offer['num'] ); ?></span>
              <h3 class="mt-5 text-2xl font-black text-ikaBlue"><?php echo esc_html( $ika_offer['title'] ); ?></h3>
              <p class="mt-4 text-sm leading-7 text-slate-600"><?php echo esc_html( $ika_offer['text'] ); ?></p>
            </a>
            <?php endforeach; ?>
            <a id="bf" href="https://www.ikacloud.bf/domain-search.php" target="_blank" rel="noopener" class="reveal block scroll-mt-32 rounded-2xl bg-ikaRed p-7 text-white shadow-clean transition hover:-translate-y-1 hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-ikaRed/25" aria-label="<?php esc_attr_e( 'Acheter un nom de domaine .bf', 'ika-solution' ); ?>">
              <span class="text-sm font-black text-white/80">.bf</span>
              <h3 class="mt-5 text-2xl font-black"><?php esc_html_e( 'Nom de domaine', 'ika-solution' ); ?></h3>
              <p class="mt-4 text-sm leading-7 text-white/85"><?php esc_html_e( 'Achat, configuration DNS, messagerie et maintenance technique.', 'ika-solution' ); ?></p>
            </a>
          </div>
        </div>
      </div>
    </section>
