<?php
  $typeLabels = [
    'app'     => 'Application web & mobile',
    'site'    => 'Site web',
    'intranet'=> 'Intranet',
    'formation'=> 'Formations',
    'licence' => 'Licences',
    'infra'   => 'Infrastructure serveur',
  ];

  $realisations = [
    [
      'type' => 'app',
      'client' => 'Coris Bank International Burkina Faso',
      'category' => 'Banque',
      'title' => 'Gestion des requêtes sous SharePoint 2016',
      'description' => 'Automatisation du processus métier de gestion des requêtes dans SharePoint 2016 au profit de Coris Bank International Burkina Faso.',
      'tags' => ['SharePoint 2016', 'Workflow', 'Banque'],
      'color' => 'bg-ikaBlue',
    ],
    [
      'type' => 'app',
      'client' => 'Fondation 2iE Burkina Faso',
      'category' => 'Fondation',
      'title' => 'Fiches d’engagement de dépense',
      'description' => 'Automatisation du processus métier de gestion des fiches d’engagement de dépense dans SharePoint 2016.',
      'tags' => ['SharePoint 2016', 'Dépenses', 'Validation'],
      'color' => 'bg-ikaRed',
    ],
    [
      'type' => 'app',
      'client' => 'CorisBank Burkina Faso',
      'category' => 'Banque',
      'title' => 'Suivi des recommandations',
      'description' => 'Automatisation du processus métier de gestion et suivi des recommandations dans SharePoint 2016.',
      'tags' => ['SharePoint 2016', 'Suivi', 'Reporting'],
      'color' => 'bg-ikaBlue',
    ],
    [
      'type' => 'intranet',
      'client' => 'PME',
      'category' => 'Portail collaboratif',
      'title' => 'IKA PORTAIL sous SharePoint Foundation 2013',
      'description' => 'Création d’une plateforme de partage de documents et d’information pour les PME sous SharePoint Foundation 2013.',
      'tags' => ['IKA PORTAIL', 'Documents', 'Collaboration'],
      'color' => 'bg-ikaRed',
    ],
    [
      'type' => 'intranet',
      'client' => 'CorisBank International Burkina Faso',
      'category' => 'Intranet',
      'title' => 'Design et présentation de l’intranet',
      'description' => 'Création du design et de la présentation de l’intranet CorisBank International Burkina Faso sous SharePoint Server 2016.',
      'tags' => ['SharePoint Server 2016', 'Intranet', 'UX'],
      'color' => 'bg-ikaBlue',
    ],
    [
      'type' => 'intranet',
      'client' => 'SONATUR',
      'category' => 'Intranet',
      'title' => 'Mise à jour de l’intranet SharePoint 2013',
      'description' => 'Mise à jour de l’intranet SharePoint 2013 de la SONATUR.',
      'tags' => ['SharePoint 2013', 'Maintenance', 'Intranet'],
      'color' => 'bg-ikaRed',
    ],
    [
      'type' => 'intranet',
      'client' => 'Coris Group',
      'category' => 'Banque',
      'title' => 'Intranets de Coris Holding, Coris Banque, Coris Mésofinance et Coris Baraka.',
      'description' => 'Conception, structuration et accompagnement sur des intranets et plateformes collaboratives pour le groupe.',
      'tags' => ['Intranet', 'Collaboration', 'Banque'],
      'color' => 'bg-ikaBlue',
    ],
    [
      'type' => 'intranet',
      'client' => 'SONABHY',
      'category' => 'Énergie',
      'title' => 'Intranet SONABHY',
      'description' => 'Mise en place d’un intranet pour centraliser les informations internes, fluidifier la communication et accompagner les équipes.',
      'tags' => ['Intranet', 'Communication', 'Énergie'],
      'color' => 'bg-ikaRed',
    ],
    [
      'type' => 'app',
      'client' => 'Plateformes nationales',
      'category' => 'Aéroports & hôtels',
      'title' => 'Gestion des vols, passagers, hôtels et application mobile.',
      'description' => 'Plateformes nationales pour les aéroports, plateforme officielle des hôtels et application mobile des gérants d’hôtel.',
      'tags' => ['Application mobile', 'Aéroport', 'Hôtellerie'],
      'color' => 'bg-ikaBlue',
    ],
    [
      'type' => 'app',
      'client' => 'SONABHY',
      'category' => 'Énergie',
      'title' => 'Plateforme bons & factures',
      'description' => 'Plateforme web et application mobile qui dématérialisent la gestion des bons d’enlèvement de la SONABHY.',
      'tags' => ['Application mobile', 'Factures', 'Énergie'],
      'color' => 'bg-ikaRed',
    ],
    [
      'type' => 'app',
      'client' => 'SONATUR',
      'category' => 'Foncier',
      'title' => 'Dématérialisation administrative et parcelles',
      'description' => 'Site web, portail de dématérialisation administrative, souscription officielle de parcelle, DevOps et conformité ANSSI.',
      'tags' => ['Portail', 'Dématérialisation', 'Foncier'],
      'color' => 'bg-ikaBlue',
    ],
    [
      'type' => 'app',
      'client' => 'FasoFinVenen',
      'category' => 'Services financiers',
      'title' => 'Recherche de services bancaires',
      'description' => 'Plateforme et application mobile de recherche de services bancaires, DevOps FasoFinVenen et validation ANSSI.',
      'tags' => ['Application mobile', 'Banque', 'DevOps'],
      'color' => 'bg-ikaRed',
    ],
    [
      'type' => 'app',
      'client' => 'MEBF',
      'category' => 'Services publics',
      'title' => 'Gestion d’agrément',
      'description' => 'Plateforme de gestion d’agrément des entreprises et des particuliers du Burkina Faso.',
      'tags' => ['Gestion', 'Agrément', 'Services publics'],
      'color' => 'bg-ikaBlue',
    ],
    [
      'type' => 'infra',
      'client' => 'Reco',
      'category' => 'Services publics',
      'title' => 'Validation sécurité Reco',
      'description' => 'Accompagnement et validation sécurité de la plateforme Reco pour renforcer la conformité et la fiabilité du service.',
      'tags' => ['Sécurité', 'Conformité', 'Audit'],
      'color' => 'bg-ikaRed',
    ],
    [
      'type' => 'app',
      'client' => 'ONEA',
      'category' => 'Eau & assainissement',
      'title' => 'Audits internes et qualité',
      'description' => 'Plateforme de gestion des audits internes et qualité de l’ONEA.',
      'tags' => ['Audit', 'Qualité', 'Eau'],
      'color' => 'bg-ikaBlue',
    ],
  ];

  get_header();
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

    <script>
    (function(){
      const btns = document.querySelectorAll('.filter-btn');
      const cards = document.querySelectorAll('.realisation-card');
      btns.forEach(btn => {
        btn.addEventListener('click', function(){
          btns.forEach(b => {
            b.classList.remove('bg-ikaRed','text-white');
            b.classList.add('border','border-slate-200','bg-white','text-ikaBlue');
          });
          this.classList.remove('border','border-slate-200','bg-white','text-ikaBlue');
          this.classList.add('bg-ikaRed','text-white');
          const filter = this.getAttribute('data-filter');
          cards.forEach(card => {
            if (filter === 'all' || card.getAttribute('data-type') === filter) {
              card.style.display = '';
            } else {
              card.style.display = 'none';
            }
          });
        });
      });
    })();
    </script>
  </main>

<?php get_footer(); ?>
