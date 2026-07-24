<?php
  $solutions = [
    'ika-visite' => [
      'file' => 'ika-visite.php',
      'name' => 'IKA VISITE',
      'eyebrow' => 'Accueil et sécurité',
      'image' => 'assets/images/ikavisite.jpg',
      'intro' => 'Gérez, suivez et optimisez vos visites avec une solution simple, sécurisée et ergonomique.',
      'description' => 'IKA VISITE simplifie la gestion des visiteurs tout en renforçant la sécurité des accès. La solution permet d’identifier les visiteurs, suivre les heures d’entrée et de sortie, organiser les passages et offrir aux agents une interface claire pour mieux piloter l’accueil.',
      'features' => [
        'Gestion et sécurisation des accès pour mieux contrôler les entrées dans vos locaux.',
        'Identification des visiteurs avec les informations utiles au suivi de chaque passage.',
        'Suivi des heures d’entrée et de sortie pour garder une traçabilité claire des visites.',
        'Interfaces ergonomiques pour une prise en main rapide par les agents d’accueil.',
        'Historique des visites pour consulter les passages et retrouver rapidement une information.',
        'Organisation des flux visiteurs afin de simplifier l’accueil et renforcer l’image professionnelle.'
      ],
      'benefits' => ['Visites simplifiées', 'Accès sécurisés', 'Traçabilité complète', 'Interface ergonomique'],
      'useCases' => ['Institutions publiques', 'Entreprises privées', 'ONG et projets', 'Sites avec contrôle d’accès']
    ],
    'ika-courrier' => [
      'file' => 'ika-courrier.php',
      'name' => 'IKA COURRIER',
      'eyebrow' => 'Gestion administrative',
      'image' => 'assets/images/ikacourrier.jpg',
      'intro' => 'Fini les recherches interminables : centralisez vos documents, rôles, modules et workflows.',
      'description' => 'IKA COURRIER facilite la gestion intelligente des documents et automatise les processus administratifs. La solution intègre la gestion des utilisateurs et des rôles, l’ajout de nouveaux modules et la personnalisation des workflows selon vos circuits internes.',
      'features' => [
        'Gestion intelligente des documents pour classer, retrouver et suivre les informations sans recherches interminables.',
        'Gestion des utilisateurs et des rôles afin de contrôler les accès et responsabilités.',
        'Intégration facile de nouveaux modules pour faire évoluer la plateforme selon les besoins.',
        'Workflows personnalisés pour automatiser les processus de validation et de traitement.',
        'Suivi des dossiers et documents à chaque étape du circuit administratif.',
        'Centralisation des échanges pour réduire les pertes, doublons et retards.'
      ],
      'benefits' => ['Documents centralisés', 'Rôles maîtrisés', 'Modules évolutifs', 'Workflows automatisés'],
      'useCases' => ['Directions générales', 'Secrétariats', 'Administrations', 'Services courrier']
    ],
    'ika-archive' => [
      'file' => 'ika-archive.php',
      'name' => 'IKA ARCHIVE',
      'eyebrow' => 'Gestion documentaire',
      'image' => 'assets/images/ikaarchive.jpg',
      'intro' => 'Classez, recherchez et sécurisez vos documents avec une archive numérique organisée et contrôlée.',
      'description' => 'IKA ARCHIVE facilite la conservation et l’exploitation des documents importants. La solution aide à structurer les dossiers, indexer les documents, contrôler les accès et retrouver rapidement l’information utile sans dépendre uniquement des armoires physiques ou de dossiers dispersés.',
      'features' => [
        'Classement par dossiers, catégories, services, années, types de documents et mots-clés.',
        'Indexation des documents avec métadonnées pour accélérer la recherche.',
        'Recherche multicritère, filtres avancés et consultation rapide des pièces numérisées.',
        'Gestion des droits d’accès selon les profils, services et niveaux de confidentialité.',
        'Suivi des mouvements, consultations, ajouts et modifications pour renforcer la traçabilité.',
        'Organisation du cycle de vie documentaire : conservation, consultation, export et sécurisation.'
      ],
      'benefits' => ['Recherche rapide', 'Documents sécurisés', 'Classement normalisé', 'Mémoire préservée'],
      'useCases' => ['Archives administratives', 'Dossiers RH', 'Documents juridiques', 'Patrimoine documentaire']
    ],
    'ika-portail' => [
      'file' => 'ika-portail.php',
      'name' => 'IKA PORTAIL',
      'eyebrow' => 'Portail digital sécurisé',
      'image' => 'assets/images/ikaportail.jpg',
      'intro' => 'Centralisez demandes, accès, validations et tableaux de bord dans un portail web sécurisé.',
      'description' => 'IKA PORTAIL crée un espace digital adapté aux échanges entre clients, usagers, agents, partenaires et services internes. Il permet de centraliser les demandes, suivre les traitements, automatiser les circuits de validation et offrir une interface claire à chaque profil utilisateur.',
      'features' => [
        'Espace sécurisé avec authentification, profils utilisateurs et droits d’accès.',
        'Dépôt et suivi de demandes, dossiers, formulaires ou services en ligne.',
        'Circuits de validation paramétrables selon les rôles et les niveaux de responsabilité.',
        'Notifications, suivi des statuts et historique des actions pour chaque dossier.',
        'Tableaux de bord pour piloter les volumes, délais, demandes en attente et performances.',
        'Intégration possible avec applications métiers, bases de données ou services existants.'
      ],
      'benefits' => ['Services centralisés', 'Suivi transparent', 'Validation accélérée', 'Expérience utilisateur claire'],
      'useCases' => ['Portails clients', 'Portails agents', 'Services en ligne', 'Suivi de dossiers']
    ],
  ];

  $solutionKey = $solutionKey ?? 'ika-visite';
  $solution = $solutions[$solutionKey] ?? $solutions['ika-visite'];
  $pageTitle = $solution['name'] . ' | IKA SOLUTION LTD';
  $pageDescription = $solution['intro'];

  function h($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
  }

  include 'header.php';
?>

<main class="bg-white pt-32">
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="index.php#produits" class="inline-flex rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Retour aux solutions</a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200"><?= h($solution['eyebrow']) ?></p>
        <h1 class="mt-4 text-5xl font-black leading-tight tracking-normal sm:text-6xl"><?= h($solution['name']) ?></h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85"><?= h($solution['intro']) ?></p>
        <div class="mt-8 flex flex-wrap gap-3">
          <?php foreach ($solution['benefits'] as $benefit): ?>
            <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue"><?= h($benefit) ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -right-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem] object-cover shadow-premium" src="<?= h($solution['image']) ?>" alt="<?= h($solution['name']) ?>">
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.85fr_1.15fr] lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Présentation</p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Une solution pensée pour vos opérations quotidiennes.</h2>
      </div>
      <p class="text-base leading-8 text-slate-600"><?= h($solution['description']) ?></p>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr]">
        <div>
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Fonctionnalités</p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Ce que <?= h($solution['name']) ?> apporte à vos équipes.</h2>
        </div>
        <div class="grid gap-5 sm:grid-cols-2">
          <?php foreach ($solution['features'] as $index => $feature): ?>
            <article class="rounded-2xl bg-white p-6 shadow-clean">
              <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-ikaBlue text-sm font-black text-white"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
              <p class="mt-5 text-sm leading-7 text-slate-600"><?= h($feature) ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
      <div class="rounded-[2rem] bg-ikaBlueDark p-7 text-white shadow-premium sm:p-10">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Cas d’usage</p>
        <h2 class="mt-4 text-3xl font-black">Pour quels contextes ?</h2>
        <div class="mt-8 grid gap-4 sm:grid-cols-2">
          <?php foreach ($solution['useCases'] as $useCase): ?>
            <div class="rounded-2xl border border-white/15 bg-white/10 p-5">
              <p class="font-black"><?= h($useCase) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="rounded-[2rem] bg-ikaSoft p-7 sm:p-10">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Bénéfices</p>
        <h2 class="mt-4 text-3xl font-black text-ikaBlueDark">Pourquoi choisir cette solution ?</h2>
        <div class="mt-8 grid gap-4">
          <?php foreach ($solution['benefits'] as $benefit): ?>
            <div class="rounded-2xl bg-white p-5 shadow-clean">
              <p class="font-black text-ikaBlue"><?= h($benefit) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="interesse" class="bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.85fr_1.15fr] lg:items-start lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Intéressé par <?= h($solution['name']) ?> ?</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">Contactez IKA SOLUTION pour une présentation ou un devis.</h2>
        <p class="mt-5 text-base leading-8 text-white/75">Laissez vos coordonnées et décrivez votre besoin. L’équipe IKA SOLUTION pourra vous orienter sur la mise en place, l’adaptation et l’accompagnement de la solution.</p>
      </div>
      <form class="rounded-[2rem] bg-white p-7 text-ikaInk shadow-premium sm:p-8" action="contact-submit.php" method="post">
        <input type="hidden" name="type" value="solution">
        <input type="hidden" name="page" value="<?= h($solution['name']) ?>">
        <input type="hidden" name="redirect" value="<?= h($solution['file']) ?>#interesse">
        <input type="hidden" name="solution" value="<?= h($solution['name']) ?>">
        <?php if (isset($_GET['mail'], $_GET['notice'])): ?>
          <div class="mb-5 rounded-2xl <?= $_GET['mail'] === 'success' ? 'bg-green-50 text-green-800' : 'bg-red-50 text-red-800' ?> p-4 text-sm font-bold">
            <?= h((string) $_GET['notice']) ?>
          </div>
        <?php endif; ?>
        <div class="grid gap-4 sm:grid-cols-2">
          <label class="grid gap-2 text-sm font-bold text-slate-700">Nom
            <input class="min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="nom" type="text" placeholder="Votre nom" required>
          </label>
          <label class="grid gap-2 text-sm font-bold text-slate-700">Téléphone
            <input class="min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="telephone" type="tel" placeholder="+226">
          </label>
        </div>
        <label class="mt-5 grid gap-2 text-sm font-bold text-slate-700">Email
          <input class="min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="email" type="email" placeholder="vous@entreprise.com" required>
        </label>
        <label class="mt-5 grid gap-2 text-sm font-bold text-slate-700">Solution souhaitée
          <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-ikaSoft px-4 py-3 font-bold text-ikaBlueDark outline-none" name="solution_label" type="text" value="<?= h($solution['name']) ?>" readonly>
        </label>
        <label class="mt-5 grid gap-2 text-sm font-bold text-slate-700">Message
          <textarea class="min-h-32 rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="message" placeholder="Expliquez votre besoin, le nombre d’utilisateurs ou le contexte de votre organisation." required></textarea>
        </label>
        <button class="mt-6 rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700" type="submit">Envoyer la demande</button>
      </form>
    </div>
  </section>

  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Autres solutions</p>
          <h2 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl">Découvrir les autres produits IKA.</h2>
        </div>
        <a href="index.php#produits" class="inline-flex rounded-full border border-slate-200 px-6 py-3 text-sm font-black text-ikaBlue transition hover:border-ikaBlue">Toutes les solutions</a>
      </div>
      <div class="mt-10 grid gap-6 md:grid-cols-3">
        <?php
          $shown = 0;
          foreach ($solutions as $key => $item):
            if ($key === $solutionKey || $shown >= 3) {
              continue;
            }
            $shown++;
        ?>
          <a href="<?= h($item['file']) ?>" class="group overflow-hidden rounded-2xl bg-ikaSoft shadow-clean transition hover:-translate-y-1 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25">
            <img class="h-44 w-full object-cover transition duration-500 group-hover:scale-105" src="<?= h($item['image']) ?>" alt="<?= h($item['name']) ?>">
            <div class="p-6">
              <h3 class="text-lg font-black text-ikaBlueDark transition group-hover:text-ikaRed"><?= h($item['name']) ?></h3>
              <p class="mt-3 text-sm leading-7 text-slate-600"><?= h($item['intro']) ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php include 'footer.php'; ?>
