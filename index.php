
<?php include 'header.php'; ?>
  
  <main>
    <section id="accueil" class="relative min-h-[96svh] overflow-hidden pt-32 text-white">
      <div class="absolute inset-0">
        <div class="slide active effect-orbit absolute inset-0 bg-cover bg-center" style="background-image:url('assets/images/slide11.jpg')"></div>
        <div class="slide effect-decompose absolute inset-0 bg-cover bg-center" style="background-image:url('assets/images/slide2.jpg')"></div>
        <div class="slide effect-parallax absolute inset-0 bg-cover bg-center" style="background-image:url('assets/images/slide3.jpg')"></div>
        <div class="slide effect-hosting absolute inset-0 bg-cover bg-center" style="background-image:url('assets/images/slide4.jpg')"></div>
        <div class="absolute inset-0 bg-ikaBlueDark/90"></div>
      </div>

      <div class="relative mx-auto grid min-h-[calc(96svh-128px)] max-w-7xl items-center gap-10 px-4 py-12 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:px-8">
        <div id="heroCopyPanel" class="max-w-3xl transition duration-500">
          <div class="mb-6 inline-flex items-center gap-3 rounded-full border border-white/25 bg-white/10 px-4 py-2 text-sm font-semibold backdrop-blur">
            <span class="h-2.5 w-2.5 rounded-full bg-ikaRed"></span>
            <span id="heroEyebrow">La solution qui vous convient | Depuis 2014</span>
          </div>
          <h1 id="heroTitle" class="text-3xl font-black leading-[1.05] tracking-normal sm:text-4xl lg:text-6xl"><span class="block">Votre transformation digitale</span> <span class="block">commence ici !</span></h1>
          <p id="heroText" class="mt-6 max-w-2xl text-lg leading-8 text-white/90 sm:text-xl">
            Nous analysons vos besoins, structurons vos priorités et mettons en place les outils numériques qui rendent vos opérations plus simples, plus fiables et mieux suivies.
          </p>
          <div class="mt-9 flex flex-col gap-3 sm:flex-row">
            <a id="heroPrimary" href="#expertises" class="inline-flex items-center justify-center rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Découvrir nos expertises</a>
            <a id="heroSecondary" href="#contact" class="inline-flex items-center justify-center rounded-full border border-white/35 px-7 py-4 text-sm font-extrabold text-white transition hover:bg-white hover:text-ikaBlue">Parler à un expert</a>
          </div>
          <div class="mt-8 flex gap-3" aria-label="Navigation du hero">
            <button class="hero-dot h-2.5 w-10 rounded-full bg-ikaRed transition" data-hero="0" aria-label="Slide 1"></button>
            <button class="hero-dot h-2.5 w-10 rounded-full bg-white/35 transition" data-hero="1" aria-label="Slide 2"></button>
            <button class="hero-dot h-2.5 w-10 rounded-full bg-white/35 transition" data-hero="2" aria-label="Slide 3"></button>
            <button class="hero-dot h-2.5 w-10 rounded-full bg-white/35 transition" data-hero="3" aria-label="Slide 4"></button>
          </div>
        </div>

        <div class="relative hidden lg:block">
          <div class="absolute -left-5 top-10 h-28 w-28 rounded-full border-[18px] border-ikaRed/90"></div>
          <div class="animate-float rounded-[2rem] border border-white/20 bg-white p-4 shadow-premium">
            <img id="heroVisualImage" class="h-[520px] w-full rounded-[1.5rem] object-cover transition duration-700" src="assets/images/slide11.jpg" alt="Transformation digitale IKA SOLUTION">
          </div>
          <div class="absolute -bottom-8 -left-8 w-64 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p id="heroMetricLabel" class="text-sm font-bold text-ikaRed">Depuis 2014</p>
            <p id="heroMetric" class="mt-2 text-3xl font-black text-ikaBlue">Expert digital</p>
            <p id="heroMetricText" class="mt-1 text-sm text-slate-600">Conseil, logiciels, réseaux, cloud et sécurité.</p>
          </div>
        </div>
      </div>

    </section>

    <section id="societe" class="bg-white py-20 sm:py-28">
      <div class="about-showcase mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[.95fr_1.05fr] lg:items-center lg:px-8">
        <div class="about-image-card reveal relative">
          <div class="absolute -left-4 -top-4 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[520px] w-full rounded-[2rem] object-cover shadow-premium" src="assets/images/equipe.jpg" alt="Présentation IKA SOLUTION">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 shadow-premium">
            <p class="text-sm font-black text-ikaRed">IKA SOLUTION</p>
            <p class="mt-1 text-2xl font-black text-ikaBlue">Transformation digitale</p>
          </div>
        </div>
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Qui sommes-nous</p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">La solution qui vous convient.</h2>
          <p class="mt-6 text-base leading-8 text-slate-600">Créée en 2014, IKA SOLUTION LTD accompagne les entreprises, institutions et organisations dans leurs besoins en ingénierie informatique, digitalisation, réseaux, logiciels, cloud et sécurité.</p>
          <p class="mt-4 text-base leading-8 text-slate-600">Basée au Burkina Faso, l’entreprise intervient localement et accompagne aussi des missions ponctuelles dans la sous-région, notamment en Côte d’Ivoire, au Mali et au Niger.</p>
          <div class="mt-8 grid gap-4 sm:grid-cols-3">
            <div class="about-stat-card rounded-2xl bg-ikaSoft p-5">
              <p class="text-3xl font-black text-ikaBlue">12 ans</p>
              <p class="mt-2 text-sm font-bold text-slate-700">d'expérience</p>
            </div>
            <div class="about-stat-card rounded-2xl bg-ikaSoft p-5">
              <p class="text-3xl font-black text-ikaRed">+300</p>
              <p class="mt-2 text-sm font-bold text-slate-700">clients accompagnés</p>
            </div>
            <div class="about-stat-card rounded-2xl bg-ikaSoft p-5">
              <p class="text-3xl font-black text-ikaBlue">+500</p>
              <p class="mt-2 text-sm font-bold text-slate-700">projets réalisés</p>
            </div>
          </div>
          <a href="presentation.php" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">En savoir plus</a>
        </div>
      </div>
    </section>

    <section id="pourquoi" class="relative overflow-hidden bg-ikaBlueDark py-20 text-white sm:py-28">
      <div class="absolute inset-0 bg-cover bg-center" style="background-image:url('assets/images/slide3.jpg'); opacity:.12;" aria-hidden="true"></div>
      <div class="absolute inset-0" style="background:rgba(13, 74, 126, .84);" aria-hidden="true"></div>
      <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal max-w-3xl">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Pourquoi nous choisir</p>
          <h2 class="mt-4 text-4xl font-black tracking-normal sm:text-5xl">Une expertise pensée pour optimiser votre rendement.</h2>
        </div>
        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
          <article class="reveal rounded-2xl border border-white/15 bg-white/10 p-7">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-sm font-black">01</span>
            <h3 class="mt-5 text-xl font-black">Proximité</h3>
            <p class="mt-4 text-sm leading-7 text-white/75">Une équipe disponible à Ouagadougou pour analyser vos besoins, cadrer vos projets et assurer le suivi.</p>
          </article>
          <article class="reveal rounded-2xl border border-white/15 bg-white/10 p-7">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-sm font-black text-ikaBlue">02</span>
            <h3 class="mt-5 text-xl font-black">Sécurité</h3>
            <p class="mt-4 text-sm leading-7 text-white/75">Des choix techniques orientés sauvegarde, contrôle d’accès, disponibilité et traçabilité.</p>
          </article>
          <article class="reveal rounded-2xl border border-white/15 bg-white/10 p-7">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-sm font-black">03</span>
            <h3 class="mt-5 text-xl font-black">Productivité</h3>
            <p class="mt-4 text-sm leading-7 text-white/75">Des solutions conçues pour simplifier le travail, accélérer les processus et améliorer le pilotage.</p>
          </article>
          <article class="reveal rounded-2xl border border-white/15 bg-white/10 p-7">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-sm font-black text-ikaBlue">04</span>
            <h3 class="mt-5 text-xl font-black">Accompagnement</h3>
            <p class="mt-4 text-sm leading-7 text-white/75">Formation, documentation, support et amélioration continue après la mise en service.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="expertises" class="bg-ikaSoft py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
          <div class="max-w-3xl">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Nos domaines d'expertise</p>
            <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Votre partenaire d'expertise et d'innovation.</h2>
          </div>
          <a href="assets/pdf/brochure.pdf" target="_blank" class="inline-flex w-fit shrink-0 rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white shadow-clean transition hover:bg-red-700">Voir la brochure</a>
        </div>

        <div class="mt-12 grid gap-7 md:grid-cols-2 lg:grid-cols-4">
          <div onclick="window.location.href='developpement-app.php'" class="expertise-card reveal group relative flex h-full flex-col rounded-2xl bg-white p-7 shadow-clean transition hover:-translate-y-2 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25 lg:-translate-y-4 cursor-pointer" role="link" tabindex="0">
            <div class="expertise-visual expertise-cut-a">
              <img src="assets/images/development2.jpg" alt="Développement d'applications">
            </div>
            <h3 class="mt-6 text-xl font-black leading-tight text-ikaBlue transition group-hover:text-ikaRed">Développement & intégration d'applications</h3>
            <p class="mt-4 flex-1 text-sm leading-7 text-slate-600">Applications web, mobiles, portails et intégrations adaptées à vos processus métier.</p>
          </div>
          <div onclick="window.location.href='infrastructures-serveurs-reseaux.php'" class="expertise-card reveal group relative flex h-full flex-col rounded-2xl bg-white p-7 shadow-clean transition hover:-translate-y-2 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25 cursor-pointer" role="link" tabindex="0">
            <div class="expertise-visual expertise-cut-b">
              <img src="assets/images/slide4.jpg" alt="Infrastructure serveur et réseau">
            </div>
            <h3 class="mt-6 text-xl font-black leading-tight text-ikaBlue transition group-hover:text-ikaRed">Infrastructures serveurs & réseaux</h3>
            <p class="mt-4 flex-1 text-sm leading-7 text-slate-600">Premier fournisseur de services d'hébergement avec des datacenters locaux au Burkina Faso. Une infrastructure de pointe sur le sol national.</p>
          </div>
          <div onclick="window.location.href='solutions-cloud-licences.php'" class="expertise-card reveal group relative flex h-full flex-col rounded-2xl bg-white p-7 shadow-clean transition hover:-translate-y-2 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25 lg:translate-y-6 cursor-pointer" role="link" tabindex="0">
            <div class="expertise-visual expertise-cut-c">
              <img src="assets/images/cloud2.jpg" alt="Solutions cloud">
            </div>
            <h3 class="mt-6 text-xl font-black leading-tight text-ikaBlue transition group-hover:text-ikaRed">Solutions cloud & licences logicielles</h3>
            <p class="mt-4 flex-1 text-sm leading-7 text-slate-600">Microsoft 365, Fortinet, Odoo, cloud, licences professionnelles et solutions logicielles pour vos équipes.</p>
          </div>
          <div onclick="window.location.href='conseil-audit-strategie-it.php'" class="expertise-card reveal group relative flex h-full flex-col rounded-2xl bg-white p-7 shadow-clean transition hover:-translate-y-2 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25 lg:-translate-y-2 cursor-pointer" role="link" tabindex="0">
            <div class="expertise-visual expertise-cut-d">
              <img src="assets/images/conseil2.jpg" alt="Conseil et stratégie IT">
            </div>
            <h3 class="mt-6 text-xl font-black leading-tight text-ikaBlue transition group-hover:text-ikaRed">Conseil, audit & stratégie IT</h3>
            <p class="mt-4 flex-1 text-sm leading-7 text-slate-600">Diagnostic, cadrage, feuille de route, choix techniques et accompagnement à la décision.</p>
          </div>
          <div onclick="window.location.href='cybersecurite-donnees.php'" class="expertise-card reveal group relative flex h-full flex-col rounded-2xl bg-ikaBlueDark p-7 text-white shadow-clean transition hover:-translate-y-2 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25 lg:translate-y-2 cursor-pointer" role="link" tabindex="0">
            <div class="expertise-visual expertise-cut-e">
              <img src="assets/images/securite.jpg" alt="Cybersécurité">
            </div>
            <h3 class="mt-6 text-xl font-black leading-tight transition group-hover:text-red-200">Cybersécurité & protection des données</h3>
            <p class="mt-4 flex-1 text-sm leading-7 text-white/75">Contrôle d'accès, sauvegarde, continuité de service et sécurisation des systèmes critiques.</p>
          </div>
          <div onclick="window.location.href='support-technique-infogerance.php'" class="expertise-card reveal group relative flex h-full flex-col rounded-2xl bg-ikaBlueDark p-7 text-white shadow-clean transition hover:-translate-y-2 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25 lg:-translate-y-6 cursor-pointer" role="link" tabindex="0">
            <div class="expertise-visual expertise-cut-f">
              <img src="assets/images/support2.png" alt="Support technique">
            </div>
            <h3 class="mt-6 text-xl font-black leading-tight transition group-hover:text-red-200">Support technique & infogérance</h3>
            <p class="mt-4 flex-1 text-sm leading-7 text-white/75">Assistance, supervision, maintenance préventive et suivi opérationnel des plateformes.</p>
          </div>
          <div onclick="window.location.href='equipements-services-energetiques.php'" class="expertise-card reveal group relative flex h-full flex-col rounded-2xl bg-ikaBlueDark p-7 text-white shadow-clean transition hover:-translate-y-2 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25 lg:translate-y-8 cursor-pointer" role="link" tabindex="0">
            <div class="expertise-visual expertise-cut-g">
              <img src="assets/images/energie2.jpg" alt="Services énergétiques">
            </div>
            <h3 class="mt-6 text-xl font-black leading-tight transition group-hover:text-red-200">Équipements & services énergétiques</h3>
            <p class="mt-4 flex-1 text-sm leading-7 text-white/75">Onduleurs, groupes électrogènes, solutions solaires et continuité énergétique.</p>
          </div>
          <div onclick="window.location.href='formation-utilisateurs.php'" class="expertise-card reveal group relative flex h-full flex-col rounded-2xl bg-ikaBlueDark p-7 text-white shadow-clean transition hover:-translate-y-2 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25 lg:-translate-y-1 cursor-pointer" role="link" tabindex="0">
            <div class="expertise-visual expertise-cut-h">
              <img src="assets/images/formation2.jpg" alt="Formation utilisateurs">
            </div>
            <h3 class="mt-6 text-xl font-black leading-tight transition group-hover:text-red-200">Formation & accompagnement utilisateurs</h3>
            <p class="mt-4 flex-1 text-sm leading-7 text-white/75">Prise en main, documentation, transfert de compétences et adoption des outils.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="overflow-hidden bg-white py-6">
      <div class="flex w-max animate-marquee">
        <div class="flex gap-4 px-2">
          <span class="rounded-full bg-ikaBlue px-6 py-3 text-sm font-black text-white">Audit digital</span>
          <span class="rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white">Applications métier</span>
          <span class="rounded-full bg-ikaBlue px-6 py-3 text-sm font-black text-white">Hébergement web</span>
          <span class="rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white">VPS local</span>
          <span class="rounded-full bg-ikaBlue px-6 py-3 text-sm font-black text-white">Cybersécurité</span>
          <span class="rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white">Portails sécurisés</span>
          <span class="rounded-full bg-ikaBlue px-6 py-3 text-sm font-black text-white">Audit digital</span>
          <span class="rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white">Applications métier</span>
          <span class="rounded-full bg-ikaBlue px-6 py-3 text-sm font-black text-white">Hébergement web</span>
          <span class="rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white">VPS local</span>
          <span class="rounded-full bg-ikaBlue px-6 py-3 text-sm font-black text-white">Cybersécurité</span>
          <span class="rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white">Portails sécurisés</span>
        </div>
        <div class="flex gap-4 px-2" aria-hidden="true">
          <span class="rounded-full bg-ikaBlue px-6 py-3 text-sm font-black text-white">Audit digital</span>
          <span class="rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white">Applications métier</span>
          <span class="rounded-full bg-ikaBlue px-6 py-3 text-sm font-black text-white">Hébergement web</span>
          <span class="rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white">VPS local</span>
          <span class="rounded-full bg-ikaBlue px-6 py-3 text-sm font-black text-white">Cybersécurité</span>
          <span class="rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white">Portails sécurisés</span>
          <span class="rounded-full bg-ikaBlue px-6 py-3 text-sm font-black text-white">Audit digital</span>
          <span class="rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white">Applications métier</span>
          <span class="rounded-full bg-ikaBlue px-6 py-3 text-sm font-black text-white">Hébergement web</span>
          <span class="rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white">VPS local</span>
          <span class="rounded-full bg-ikaBlue px-6 py-3 text-sm font-black text-white">Cybersécurité</span>
          <span class="rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white">Portails sécurisés</span>
        </div>
      </div>
    </section>

    <section id="produits" class="bg-ikaBlueDark py-20 text-white sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[.85fr_1.15fr] lg:items-end">
          <div class="reveal">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-red-300">Nos solutions</p>
            <h2 class="mt-4 text-4xl font-black tracking-normal sm:text-5xl">Des solutions prêtes pour vos opérations.</h2>
            <p class="mt-5 max-w-xl text-base leading-8 text-white/75">Des logiciels IKA pensés pour améliorer l’accueil, le courrier, l’archivage et les services numériques métiers.</p>
          </div>
          <div class="reveal flex gap-3 overflow-x-auto no-scrollbar lg:justify-end">
            <button class="product-tab whitespace-nowrap rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue" data-product="0">IKA VISITE</button>
            <button class="product-tab whitespace-nowrap rounded-full border border-white/25 px-5 py-3 text-sm font-black text-white" data-product="1">IKA COURRIER</button>
            <button class="product-tab whitespace-nowrap rounded-full border border-white/25 px-5 py-3 text-sm font-black text-white" data-product="2">IKA ARCHIVE</button>
            <button class="product-tab whitespace-nowrap rounded-full border border-white/25 px-5 py-3 text-sm font-black text-white" data-product="3">IKA PORTAIL</button>
          </div>
        </div>

        <div class="mt-12 overflow-hidden rounded-[2rem] bg-white text-ikaInk shadow-premium">
          <article class="product-slide active grid-cols-1 lg:grid-cols-2">
            <img class="h-80 w-full object-cover lg:h-[520px]" src="assets/images/ikavisite.jpg" alt="Accueil professionnel">
            <div class="flex flex-col justify-center p-8 sm:p-12">
              <h3 class="mt-4 text-4xl font-black text-ikaBlue">IKA VISITE</h3>
              <p class="mt-5 text-lg leading-8 text-slate-600">IKA VISITE permet de gérer, suivre et optimiser vos visites en toute simplicité. La solution sécurise les accès, identifie les visiteurs, suit les heures d’entrée et de sortie et propose des interfaces ergonomiques pour les agents d’accueil.</p>
              <div class="mt-8 grid gap-3 sm:grid-cols-3">
                <span class="rounded-xl bg-ikaSoft px-4 py-3 text-sm font-bold">Accès sécurisés</span>
                <span class="rounded-xl bg-ikaSoft px-4 py-3 text-sm font-bold">Identification</span>
                <span class="rounded-xl bg-ikaSoft px-4 py-3 text-sm font-bold">Entrées / sorties</span>
              </div>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="ika-visite.php" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">En savoir plus</a>
                <a href="assets/images/brochures/A5-visite.png" download="Brochure_IKA_VISITE.png" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:text-ikaBlue hover:bg-ikaSoft">Télécharger la brochure</a>
              </div>
            </div>
          </article>
          <article class="product-slide grid-cols-1 lg:grid-cols-2">
            <img class="h-80 w-full object-cover lg:h-[520px]" src="assets/images/ikacourrier.jpg" alt="Traitement administratif">
            <div class="flex flex-col justify-center p-8 sm:p-12">
              <h3 class="mt-4 text-4xl font-black text-ikaBlue">IKA COURRIER</h3>
              <p class="mt-5 text-lg leading-8 text-slate-600">IKA COURRIER met fin aux recherches interminables avec une gestion intelligente des documents, des utilisateurs et des rôles. La solution facilite l’intégration de nouveaux modules et personnalise les workflows pour automatiser vos processus.</p>
              <div class="mt-8 grid gap-3 sm:grid-cols-3">
                <span class="rounded-xl bg-ikaSoft px-4 py-3 text-sm font-bold">Documents</span>
                <span class="rounded-xl bg-ikaSoft px-4 py-3 text-sm font-bold">Utilisateurs & rôles</span>
                <span class="rounded-xl bg-ikaSoft px-4 py-3 text-sm font-bold">Workflows</span>
              </div>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="ika-courrier.php" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">En savoir plus</a>
                <a href="assets/images/brochures/A5courier.png" download="Brochure_IKA_COURRIER.png" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:text-ikaBlue hover:bg-ikaSoft">Télécharger la brochure</a>
              </div>
            </div>
          </article>
          <article class="product-slide grid-cols-1 lg:grid-cols-2">
            <img class="h-80 w-full object-cover lg:h-[520px]" src="assets/images/ikaarchive.jpg" alt="Archivage documentaire">
            <div class="flex flex-col justify-center p-8 sm:p-12">
              <h3 class="mt-4 text-4xl font-black text-ikaBlue">IKA ARCHIVE</h3>
              <p class="mt-5 text-lg leading-8 text-slate-600">IKA ARCHIVE facilite le classement, la conservation et la recherche de documents sensibles ou volumineux. Indexation, filtres, accès contrôlés et organisation par dossiers permettent de retrouver rapidement l’information et de mieux sécuriser le patrimoine documentaire.</p>
              <div class="mt-8 grid gap-3 sm:grid-cols-3">
                <span class="rounded-xl bg-ikaSoft px-4 py-3 text-sm font-bold">Indexation</span>
                <span class="rounded-xl bg-ikaSoft px-4 py-3 text-sm font-bold">Recherche</span>
                <span class="rounded-xl bg-ikaSoft px-4 py-3 text-sm font-bold">Conservation</span>
              </div>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="ika-archive.php" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">En savoir plus</a>
                <a href="assets/images/brochures/A5-archive.png" download="Brochure_IKA_ARCHIVE.png" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:text-ikaBlue hover:bg-ikaSoft">Télécharger la brochure</a>
              </div>
            </div>
          </article>
          <article class="product-slide grid-cols-1 lg:grid-cols-2">
            <img class="h-80 w-full object-cover lg:h-[520px]" src="assets/images/ikaportail.jpg" alt="Portail digital sécurisé">
            <div class="flex flex-col justify-center p-8 sm:p-12">
              <h3 class="mt-4 text-4xl font-black text-ikaBlue">IKA PORTAIL</h3>
              <p class="mt-5 text-lg leading-8 text-slate-600">IKA PORTAIL crée un espace digital sécurisé pour connecter clients, agents, partenaires et services internes. La plateforme centralise les demandes, circuits de validation, tableaux de bord et notifications afin de simplifier les échanges et améliorer le pilotage.</p>
              <div class="mt-8 grid gap-3 sm:grid-cols-3">
                <span class="rounded-xl bg-ikaSoft px-4 py-3 text-sm font-bold">Accès</span>
                <span class="rounded-xl bg-ikaSoft px-4 py-3 text-sm font-bold">Circuit de validation</span>
                <span class="rounded-xl bg-ikaSoft px-4 py-3 text-sm font-bold">Tableaux de bord</span>
              </div>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="ika-portail.php" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">En savoir plus</a>
                <a href="assets/images/brochures/A5-portail.png" download="Brochure_IKA_PORTAIL.png" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:text-ikaBlue hover:bg-ikaSoft">Télécharger la brochure</a>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section id="realisations" class="bg-white py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
          <div class="max-w-3xl">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Réalisations</p>
            <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Dernières réalisations.</h2>
          </div>
          <a href="realisations.php" class="inline-flex w-fit rounded-full border border-slate-200 px-6 py-3 text-sm font-black text-ikaBlue transition hover:border-ikaBlue">Voir toutes les réalisations</a>
        </div>
        <div class="mt-12 grid gap-6 lg:grid-cols-3">
          <article class="reveal overflow-hidden rounded-2xl bg-ikaSoft shadow-clean">
            <img class="h-56 w-full object-cover" src="assets/images/sonatur.png" alt="Plateforme Sonatur">
            <div class="p-7">
              <p class="text-sm font-black text-ikaRed">SONATUR</p>
              <h3 class="mt-3 text-2xl font-black text-ikaBlue">Plateforme Sonatur</h3>
              <p class="mt-4 text-sm leading-7 text-slate-600">Plateforme de souscription officielle de parcelle de la Sonatur.</p>
            </div>
          </article>
          <article class="reveal overflow-hidden rounded-2xl bg-ikaSoft shadow-clean">
            <img class="h-56 w-full object-cover" src="assets/images/intranetsonatur.png" alt="SONATUR Intranet">
            <div class="p-7">
              <p class="text-sm font-black text-ikaRed">SONATUR</p>
              <h3 class="mt-3 text-2xl font-black text-ikaBlue">SONABHY Sonatur</h3>
              <p class="mt-4 text-sm leading-7 text-slate-600">Intranet pour centraliser les informations internes et accompagner les équipes métier.</p>
            </div>
          </article>
          <article class="reveal overflow-hidden rounded-2xl bg-ikaSoft shadow-clean">
            <img class="h-56 w-full object-cover" src="assets/images/sitesonatur.png" alt="Site web Sonatur">
            <div class="p-7">
              <p class="text-sm font-black text-ikaRed">SONATUR</p>
              <h3 class="mt-3 text-2xl font-black text-ikaBlue">Site web Sonatur</h3>
              <p class="mt-4 text-sm leading-7 text-slate-600">Site web institutionnel pour valoriser les services, les informations et les démarches en ligne.</p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section id="hosting" class="bg-white py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[.9fr_1.1fr] lg:items-center">
          <div class="reveal">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Web, cloud et domaines</p>
            <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Une infrastructure solide pour vos sites, portails et applications.</h2>
            <p class="mt-6 text-base leading-8 text-slate-600">Hébergement, VPS, domaine et administration technique pour garder vos services disponibles, rapides et alignés avec votre marché.</p>
            <a href="https://ikacloud.bf" target="_blank" rel="noopener" class="mt-8 inline-flex rounded-full bg-ikaBlue px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-ikaBlueDark">Decouvrir nos offres</a>
          </div>
          <div class="grid gap-5 sm:grid-cols-2">
            <a href="https://www.ikacloud.bf/shared-hosting.php" target="_blank" rel="noopener" class="reveal block rounded-2xl border border-slate-100 bg-ikaSoft p-7 transition hover:-translate-y-1 hover:shadow-clean focus:outline-none focus:ring-4 focus:ring-ikaRed/25" aria-label="Voir les offres d'hébergement web">
              <span class="text-sm font-black text-ikaRed">01</span>
              <h3 class="mt-5 text-2xl font-black text-ikaBlue">Hébergement web</h3>
              <p class="mt-4 text-sm leading-7 text-slate-600">Sites vitrines, portails, back-offices et applications métier.</p>
            </a>
            <a href="https://www.ikacloud.bf/vps-server.php" target="_blank" rel="noopener" class="reveal block rounded-2xl border border-slate-100 bg-white p-7 shadow-clean transition hover:-translate-y-1 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25" aria-label="Voir les offres VPS local">
              <span class="text-sm font-black text-ikaRed">02</span>
              <h3 class="mt-5 text-2xl font-black text-ikaBlue">VPS local</h3>
              <p class="mt-4 text-sm leading-7 text-slate-600">Serveurs privés pour projets critiques et environnements applicatifs.</p>
            </a>
            <a href="https://www.ikacloud.bf/ssl-certificates.php" target="_blank" rel="noopener" class="reveal block rounded-2xl border border-slate-100 bg-white p-7 shadow-clean transition hover:-translate-y-1 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25" aria-label="Voir les certificats de sécurité SSL">
              <span class="text-sm font-black text-ikaRed">03</span>
              <h3 class="mt-5 text-2xl font-black text-ikaBlue">Sécurité SSL</h3>
              <p class="mt-4 text-sm leading-7 text-slate-600">Certificats SSL pour protéger vos sites, portails et transactions en ligne.</p>
            </a>
            <a id="bf" href="https://www.ikacloud.bf/domain-search.php" target="_blank" rel="noopener" class="reveal block scroll-mt-32 rounded-2xl bg-ikaRed p-7 text-white shadow-clean transition hover:-translate-y-1 hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-ikaRed/25" aria-label="Acheter un nom de domaine .bf">
              <span class="text-sm font-black text-white/80">.bf</span>
              <h3 class="mt-5 text-2xl font-black">Nom de domaine</h3>
              <p class="mt-4 text-sm leading-7 text-white/85">Achat, configuration DNS, messagerie et maintenance technique.</p>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="relative overflow-hidden bg-ikaBlueDark py-20 text-white sm:py-28">
      <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image:url('assets/images/presentation.jpg')" aria-hidden="true"></div>
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
      <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[1fr_.9fr] lg:items-center">
          <div class="reveal">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-red-300">Méthode</p>
            <h2 class="mt-4 text-4xl font-black tracking-normal sm:text-5xl">Des projets cadrés, livrés et maintenus avec exigence.</h2>
          </div>
          <div class="reveal grid gap-4">
            <div class="flex gap-5 rounded-2xl border border-white/15 bg-white/10 p-5">
              <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-ikaRed text-sm font-black">01</span>
              <div>
                <h3 class="font-black">Comprendre</h3>
                <p class="mt-1 text-sm leading-7 text-white/75">Audit, objectifs, risques, priorités et feuille de route.</p>
              </div>
            </div>
            <div class="flex gap-5 rounded-2xl border border-white/15 bg-white/10 p-5">
              <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white text-sm font-black text-ikaBlue">02</span>
              <div>
                <h3 class="font-black">Construire</h3>
                <p class="mt-1 text-sm leading-7 text-white/75">Design, développement, intégration, déploiement et documentation.</p>
              </div>
            </div>
            <div class="flex gap-5 rounded-2xl border border-white/15 bg-white/10 p-5">
              <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-ikaRed text-sm font-black">03</span>
              <div>
                <h3 class="font-black">Maintenir</h3>
                <p class="mt-1 text-sm leading-7 text-white/75">Support, supervision, sécurité, sauvegarde et amélioration continue.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="actualites" class="bg-ikaSoft py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal max-w-3xl">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Actualités</p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Les sujets qui structurent la transformation digitale locale.</h2>
        </div>
        <div class="mt-12 grid gap-6 md:grid-cols-3">
          <article class="reveal flex h-full flex-col overflow-hidden rounded-2xl bg-white shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
            <img class="h-56 w-full object-cover" src="assets/images/slide4.jpg" alt="Hébergement cloud local">
            <div class="flex flex-1 flex-col p-7">
              <span class="rounded-full bg-ikaBlue px-4 py-2 text-xs font-black uppercase tracking-[0.14em] text-white">Cloud</span>
              <h3 class="mt-6 text-2xl font-black text-ikaBlue">Pourquoi rapprocher l’hébergement des opérations critiques</h3>
              <p class="mt-4 flex-1 text-sm leading-7 text-slate-600">Disponibilité, latence, support local et meilleure maîtrise des environnements applicatifs.</p>
              <a href="detail-actualite.php?article=cloud" class="mt-6 inline-flex w-fit rounded-full bg-ikaRed px-5 py-3 text-sm font-black text-white transition hover:bg-red-700">Lire la suite</a>
            </div>
          </article>
          <article class="reveal flex h-full flex-col overflow-hidden rounded-2xl bg-white shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
            <img class="h-56 w-full object-cover" src="assets/images/securite.jpg" alt="Sécurité des accès et des données">
            <div class="flex flex-1 flex-col p-7">
              <span class="rounded-full bg-ikaRed px-4 py-2 text-xs font-black uppercase tracking-[0.14em] text-white">Sécurité</span>
              <h3 class="mt-6 text-2xl font-black text-ikaBlue">Digitaliser sans fragiliser les accès et les données</h3>
              <p class="mt-4 flex-1 text-sm leading-7 text-slate-600">Contrôle d’accès, sauvegarde, supervision et continuité de service dès la conception.</p>
              <a href="detail-actualite.php?article=securite" class="mt-6 inline-flex w-fit rounded-full bg-ikaRed px-5 py-3 text-sm font-black text-white transition hover:bg-red-700">Lire la suite</a>
            </div>
          </article>
          <article class="reveal flex h-full flex-col overflow-hidden rounded-2xl bg-white shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
            <img class="h-56 w-full object-cover" src="assets/images/conseil2.jpg" alt="Identité numérique locale">
            <div class="flex flex-1 flex-col p-7">
              <span class="rounded-full bg-ikaBlue px-4 py-2 text-xs font-black uppercase tracking-[0.14em] text-white">.bf</span>
              <h3 class="mt-6 text-2xl font-black text-ikaBlue">Renforcer son identité numérique avec un domaine local</h3>
              <p class="mt-4 flex-1 text-sm leading-7 text-slate-600">Nom de domaine, DNS, messagerie et maintenance technique pour une présence crédible.</p>
              <a href="detail-actualite.php?article=domaine" class="mt-6 inline-flex w-fit rounded-full bg-ikaRed px-5 py-3 text-sm font-black text-white transition hover:bg-red-700">Lire la suite</a>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section id="vision" class="bg-white py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal max-w-3xl">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Vision, mission et valeurs</p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Construire un numérique fiable, utile et durable pour les organisations.</h2>
        </div>
        <div class="mt-12 grid gap-6 lg:grid-cols-3">
          <article class="reveal rounded-[2rem] bg-ikaBlue p-8 text-white shadow-clean">
            <span class="text-sm font-black uppercase tracking-[0.18em] text-red-200">Vision</span>
            <h3 class="mt-5 text-3xl font-black">Être la solution qui convient à vos ambitions.</h3>
            <p class="mt-5 text-sm leading-7 text-white/80">Aider les organisations du Burkina Faso et de la sous-région à bâtir des systèmes informatiques solides, utiles et évolutifs.</p>
          </article>
          <article class="reveal rounded-[2rem] bg-ikaSoft p-8 shadow-clean">
            <span class="text-sm font-black uppercase tracking-[0.18em] text-ikaRed">Mission</span>
            <h3 class="mt-5 text-3xl font-black text-ikaBlue">Fournir le meilleur service pour optimiser votre rendement.</h3>
            <p class="mt-5 text-sm leading-7 text-slate-600">Conseiller, développer, intégrer, héberger et maintenir des solutions informatiques qui renforcent réellement la productivité des équipes.</p>
          </article>
          <article class="reveal rounded-[2rem] bg-ikaRed p-8 text-white shadow-clean">
            <span class="text-sm font-black uppercase tracking-[0.18em] text-white/75">Valeurs</span>
            <h3 class="mt-5 text-3xl font-black">Rigueur, confiance, innovation et proximité.</h3>
            <p class="mt-5 text-sm leading-7 text-white/85">Nous privilégions la clarté, la qualité d’exécution, la sécurité et l’accompagnement durable de nos clients.</p>
          </article>
        </div>
      </div>
    </section>

<section id="partenaires" class="bg-ikaSoft py-20 sm:py-28">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="reveal flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
      <div class="max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Nos partenaires</p>
        <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Ils nous font confiance.</h2>
      </div>
      <p class="max-w-sm text-sm leading-7 text-slate-600">Solutions logicielles, systèmes, paiement, infrastructure et services numériques.</p>
    </div>
    <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6">
         <div class="reveal flex h-32 items-center justify-center rounded-2xl bg-white p-6 shadow-clean">
        <img class="max-h-14 max-w-full object-contain" src="assets/images/microsoft.png" alt="Microsoft">
      </div>
      <div class="reveal flex h-32 items-center justify-center rounded-2xl bg-white p-6 shadow-clean">
        <img class="max-h-14 max-w-full object-contain" src="assets/images/odoo.png" alt="Odoo">
      </div>
      <div class="reveal flex h-32 items-center justify-center rounded-2xl bg-white p-6 shadow-clean">
        <img class="max-h-16 max-w-full object-contain" src="assets/images/paloalto.svg" alt="Palo Alto">
      </div>

      <div class="reveal flex h-32 items-center justify-center rounded-2xl bg-white p-6 shadow-clean">
        <img class="max-h-20 max-w-full object-contain" src="assets/images/fortinet.png" alt="Fortinet">
      </div>
      <div class="reveal flex h-32 items-center justify-center rounded-2xl bg-white p-6 shadow-clean">
        <a href="proxmox.php">
        <img class="max-h-20 max-w-full object-contain" src="assets/images/Proxmox.png" alt="Proxmox">
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ===================== CLIENTS ===================== -->
<section id="clients" class="bg-white py-20 sm:py-28 overflow-hidden">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="reveal flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
      <div class="max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Nos clients</p>
        <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Ils ont choisi IKA Solutions</h2>
      </div>
      <p class="max-w-sm text-sm leading-7 text-slate-600">Entreprises, institutions et organisations qui nous confient leurs projets numériques.</p>
    </div>
  </div>

  <!-- Carrousel infini, pleine largeur, fondu sur les bords -->
  <div class="clients-marquee reveal mt-12">
    <div class="clients-track">
      <!-- Groupe 1 -->
      <div class="clients-group">
        <div class="client-logo"><img src="assets/images/clients/Sonatur.png" alt="SONATUR"></div>
        <div class="client-logo"><img src="assets/images/clients/sonabhy.png" alt="SONABHY"></div>
        <div class="client-logo"><img src="assets/images/clients/ONEA.jpg" alt="ONEA"></div>
        <div class="client-logo"><img src="assets/images/clients/Lonab.png" alt="LONAB"></div>
        <div class="client-logo"><img src="assets/images/clients/coris.jpg" alt="CORIS BANK"></div>
        <div class="client-logo"><img src="assets/images/clients/APEC.png" alt="APEC"></div>
      </div>
      <!-- Groupe 2 (copie identique, pour la boucle infinie) -->
      <div class="clients-group">
        <div class="client-logo"><img src="assets/images/clients/Sonatur.png" alt="SONATUR"></div>
        <div class="client-logo"><img src="assets/images/clients/sonabhy.png" alt="SONABHY"></div>
        <div class="client-logo"><img src="assets/images/clients/ONEA.jpg" alt="ONEA"></div>
        <div class="client-logo"><img src="assets/images/clients/Lonab.png" alt="LONAB"></div>
        <div class="client-logo"><img src="assets/images/clients/coris.jpg" alt="CORIS BANK"></div>
        <div class="client-logo"><img src="assets/images/clients/APEC.png" alt="APEC"></div>
      </div>
    </div>
  </div>
</section>


<style>
  .clients-marquee {
    position: relative;
    width: 100%;
    overflow: hidden;
    -webkit-mask-image: linear-gradient(to right, transparent 0, black 8%, black 92%, transparent 100%);
            mask-image: linear-gradient(to right, transparent 0, black 8%, black 92%, transparent 100%);
  }

  .clients-track {
    display: flex;
    width: max-content;
    animation: clients-scroll 28s linear infinite;
  }

  .clients-marquee:hover .clients-track {
    animation-play-state: paused;
  }

  .clients-group {
    display: flex;
    flex-shrink: 0;
  }

  .client-logo {
    flex-shrink: 0;
    width: 11rem;
    height: 8rem;
    margin: 0 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 1rem;
    background: #F5F6FA;
    box-shadow: 0 1px 3px rgba(15, 23, 42, 0.06), 0 8px 24px -12px rgba(15, 23, 42, 0.10);
  }

  .client-logo img {
    max-height: 3.5rem;
    max-width: 80%;
    object-fit: contain;
    filter: grayscale(100%);
    opacity: 0.7;
    transition: filter 0.3s ease, opacity 0.3s ease;
  }

  .client-logo:hover img {
    filter: grayscale(0%);
    opacity: 1;
  }

  @keyframes clients-scroll {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
  }

  @media (prefers-reduced-motion: reduce) {
    .clients-track { animation: none; }
    .clients-marquee { overflow-x: auto; }
  }
</style>

    <section id="contact" class="bg-white py-14 sm:py-20">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium lg:grid-cols-[.85fr_1.15fr]">
          <div class="reveal bg-ikaBlue p-6 text-white sm:p-8">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Contact</p>
            <h2 class="mt-4 text-3xl font-black tracking-normal sm:text-4xl">Parlons de votre prochain projet numérique.</h2>
            <p class="mt-4 text-sm leading-7 text-white/80">Présentez-nous votre besoin en digitalisation, hébergement, portail métier, infrastructure ou sécurité opérationnelle.</p>
            <div class="mt-6 grid gap-3">
              <a class="rounded-2xl bg-white p-4 text-ikaBlue transition hover:bg-ikaSoft" href="tel:+22672089090">
                <span class="block text-xs font-black uppercase tracking-[0.16em] text-ikaRed">Téléphone</span>
                <span class="mt-1 block text-lg font-black">+226 72 08 90 90</span>
              </a>
              <a class="rounded-2xl bg-white p-4 text-ikaBlue transition hover:bg-ikaSoft" href="tel:+22625655954">
                <span class="block text-xs font-black uppercase tracking-[0.16em] text-ikaRed">Téléphone</span>
                <span class="mt-1 block text-lg font-black">+226 25 65 59 54</span>
              </a>
              <a class="rounded-2xl bg-white p-4 text-ikaBlue transition hover:bg-ikaSoft" href="mailto:infos@ikasolution.com">
                <span class="block text-xs font-black uppercase tracking-[0.16em] text-ikaRed">Email</span>
                <span class="mt-1 block text-lg font-black break-all">infos@ikasolution.com</span>
              </a>
              <div class="rounded-2xl bg-white p-4 text-ikaBlue">
                <span class="block text-xs font-black uppercase tracking-[0.16em] text-ikaRed">Adresse</span>
                <span class="mt-1 block text-lg font-black">Avenue de la Dignité, Ouagadougou, Burkina Faso</span>
              </div>
            </div>
          </div>
          <form class="relative reveal grid gap-4 p-6 sm:p-8" action="contact-submit.php" method="post">
        <input type="hidden" name="form_time" value="<?= htmlspecialchars((string) time(), ENT_QUOTES, 'UTF-8') ?>">
        <div class="absolute left-[-9999px] top-auto h-px w-px overflow-hidden" aria-hidden="true">
          <label>Ne pas remplir ce champ <input type="text" name="site_web" tabindex="-1" autocomplete="off"></label>
        </div>
            <input type="hidden" name="type" value="contact">
            <input type="hidden" name="page" value="Accueil - Contact">
            <input type="hidden" name="redirect" value="index.php#contact">
            <?php if (isset($_GET['mail'], $_GET['notice'])): ?>
              <div class="rounded-2xl <?= $_GET['mail'] === 'success' ? 'bg-green-50 text-green-800' : 'bg-red-50 text-red-800' ?> p-4 text-sm font-bold">
                <?= htmlspecialchars((string) $_GET['notice'], ENT_QUOTES, 'UTF-8') ?>
              </div>
            <?php endif; ?>
            <div class="grid gap-4 sm:grid-cols-2">
              <label class="grid gap-2 text-sm font-bold text-slate-700">Nom
                <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="nom" type="text" placeholder="Votre nom" required>
              </label>
              <label class="grid gap-2 text-sm font-bold text-slate-700">Téléphone
                <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="telephone" type="tel" placeholder="+226">
              </label>
            </div>
            <label class="grid gap-2 text-sm font-bold text-slate-700">Email
              <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="email" type="email" placeholder="vous@entreprise.com" required>
            </label>
            <label class="grid gap-2 text-sm font-bold text-slate-700">Besoin
              <select class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="besoin">
                <option>Développement & intégration d'applications</option>
                <option>Infrastructures serveurs & réseaux</option>
                <option>Solutions cloud & licences logicielles</option>
                <option>Conseil, audit & stratégie IT</option>
                <option>Cybersécurité & protection des données</option>
                <option>Support technique & infogérance</option>
                <option>Équipements & services énergétiques</option>
                <option>Formation & accompagnement utilisateurs</option>
              </select>
            </label>
            <label class="grid gap-2 text-sm font-bold text-slate-700">Message
              <textarea class="min-h-28 rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="message" placeholder="Décrivez votre projet" required></textarea>
            </label>
            <button class="h-10 w-fit whitespace-nowrap rounded-full bg-ikaRed px-4 text-xs font-extrabold text-white shadow-clean transition hover:bg-red-700" type="submit">Envoyer la demande</button>
          </form>
        </div>
        <div class="reveal mt-8 overflow-hidden rounded-[2rem] bg-white shadow-premium">
          <iframe class="h-[360px] w-full sm:h-[420px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3897.813956935869!2d-1.5510319!3d12.3283057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2e97959a8cca5d%3A0xf30ca6cdfc799f34!2sIKA%20SOLUTION!5e0!3m2!1sfr!2sci!4v1780451050715!5m2!1sfr!2sci" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Localisation IKA SOLUTION"></iframe>
        </div>
      </div>
    </section>
  </main>


<?php include 'footer.php'; ?>   
