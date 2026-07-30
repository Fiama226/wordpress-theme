<?php /* Template Name: Realisations */ ?>
<?php
  get_header();

  $typeLabels = array(
    'app'       => __( 'Application web & mobile', 'ika-solution' ),
    'site'      => __( 'Site web', 'ika-solution' ),
    'intranet'  => __( 'Intranet', 'ika-solution' ),
    'formation' => __( 'Formations', 'ika-solution' ),
    'licence'   => __( 'Licences', 'ika-solution' ),
    'infra'     => __( 'Infrastructure serveur', 'ika-solution' ),
  );

  // Réalisations éditables depuis l'administration (CPT ika_realisation).
  $ika_posts    = get_posts(
    array(
      'post_type'      => 'ika_realisation',
      'posts_per_page' => -1,
      'orderby'        => 'menu_order',
      'order'          => 'ASC',
    )
  );
  $realisations = array();
  foreach ( $ika_posts as $ika_p ) {
    $tags = get_post_meta( $ika_p->ID, 'ika_realisation_tags', true );
    $realisations[] = array(
      'type'        => get_post_meta( $ika_p->ID, 'ika_realisation_type', true ),
      'client'      => get_post_meta( $ika_p->ID, 'ika_realisation_client', true ),
      'category'    => get_post_meta( $ika_p->ID, 'ika_realisation_category', true ),
      'title'       => get_the_title( $ika_p ),
      'description' => get_the_excerpt( $ika_p ),
      'tags'        => is_array( $tags ) ? $tags : array(),
      'color'       => ( count( $realisations ) % 2 === 0 ) ? 'bg-ikaBlue' : 'bg-ikaRed',
    );
  }

  // Comme sur le site statique : les 6 boutons de type sont toujours affichés
  // (même ceux sans projet pour l'instant), dans l'ordre d'origine.
?>

  <main>
    <section class="relative overflow-hidden bg-ikaBlueDark pt-36 text-white sm:pt-40">
      <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image:url('<?php echo ika_asset('images/infrastructure.jpg'); ?>')" aria-hidden="true"></div>
      <div class="absolute inset-0 bg-ikaBlueDark/92" aria-hidden="true"></div>
      <div class="relative mx-auto max-w-7xl px-4 pb-20 sm:px-6 lg:px-8">
        <div class="max-w-4xl">
          <a href="<?php echo esc_url( home_url( '/#realisations' ) ); ?>" class="inline-flex rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Retour à l’accueil</a>
          <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200">Réalisations</p>
          <h1 class="mt-5 text-4xl font-black leading-[1.05] tracking-normal sm:text-5xl lg:text-6xl">Des projets métiers, intranets et plateformes livrés pour des organisations exigeantes.</h1>
          <p class="mt-6 max-w-3xl text-lg leading-8 text-white/80 sm:text-xl">IKA SOLUTION accompagne banques, institutions, services publics, plateformes nationales et entreprises dans la digitalisation de leurs processus critiques.</p>
        </div>
      </div>
    </section>

    <section id="realisations" class="bg-white py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
          <div class="max-w-3xl">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Réalisations</p>
            <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Des projets concrets pour des besoins réels.</h2>
          </div>
          <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="inline-flex w-fit shrink-0 rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white shadow-clean transition hover:bg-red-700">Discuter d’un projet</a>
        </div>

        <div id="filterBar" class="mt-8 flex flex-wrap gap-2">
          <button class="filter-btn rounded-full bg-ikaRed px-5 py-3 text-sm font-black text-white transition hover:bg-red-700" data-filter="all">Toutes</button>
          <?php foreach ($typeLabels as $key => $label): ?>
            <button class="filter-btn rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-black text-ikaBlue transition hover:border-ikaBlue hover:bg-ikaBlue hover:text-white" data-filter="<?= $key ?>"><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?></button>
          <?php endforeach; ?>
        </div>

        <div id="realisationGrid" class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
          <?php foreach ($realisations as $i => $realisation): ?>
            <article class="realisation-card flex h-full flex-col rounded-2xl bg-ikaSoft p-7 shadow-clean transition hover:-translate-y-1 hover:shadow-premium" data-type="<?= htmlspecialchars($realisation['type'], ENT_QUOTES, 'UTF-8') ?>">
              <div class="flex items-center gap-2">
                <span class="rounded-full bg-ikaBlue px-4 py-2 text-xs font-black uppercase tracking-[0.14em] text-white"><?= htmlspecialchars($typeLabels[$realisation['type']] ?? $realisation['category'], ENT_QUOTES, 'UTF-8') ?></span>
              </div>
              <h3 class="mt-6 text-2xl font-black leading-tight text-ikaBlue"><?= htmlspecialchars($realisation['title'], ENT_QUOTES, 'UTF-8') ?></h3>
              <p class="mt-3 text-sm font-black text-ikaRed"><?= htmlspecialchars($realisation['client'], ENT_QUOTES, 'UTF-8') ?></p>
              <p class="mt-4 flex-1 text-sm leading-7 text-slate-600"><?= htmlspecialchars($realisation['description'], ENT_QUOTES, 'UTF-8') ?></p>
              <div class="mt-6 flex flex-wrap items-center justify-between gap-2">
                <div class="flex flex-wrap gap-2">
                  <?php foreach ($realisation['tags'] as $tag): ?>
                    <span class="rounded-full bg-white px-3 py-2 text-xs font-bold text-slate-600"><?= htmlspecialchars($tag, ENT_QUOTES, 'UTF-8') ?></span>
                  <?php endforeach; ?>
                </div>
                <span class="<?= htmlspecialchars($realisation['color'], ENT_QUOTES, 'UTF-8') ?> shrink-0 rounded-full px-4 py-2 text-xs font-black uppercase tracking-[0.14em] text-white"><?= htmlspecialchars($realisation['category'], ENT_QUOTES, 'UTF-8') ?></span>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

  </main>

<?php get_footer(); ?>
