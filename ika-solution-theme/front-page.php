<?php
/**
 * The front page template file
 */
get_header();
?>

  <main>
    <section id="accueil" class="relative min-h-[96svh] overflow-hidden pt-32 text-white">
      <div class="absolute inset-0">
        <div class="slide active effect-orbit absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo ika_asset('images/slide11.jpg'); ?>')"></div>
        <div class="slide effect-decompose absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo ika_asset('images/slide2.jpg'); ?>')"></div>
        <div class="slide effect-parallax absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo ika_asset('images/slide3.jpg'); ?>')"></div>
        <div class="slide effect-hosting absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo ika_asset('images/slide4.jpg'); ?>')"></div>
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
            <img id="heroVisualImage" class="h-[520px] w-full rounded-[1.5rem] object-cover transition duration-700" src="<?php echo ika_asset('images/slide11.jpg'); ?>" alt="Transformation digitale IKA SOLUTION">
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
          <img class="relative h-[520px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo ika_asset('images/equipe.jpg'); ?>" alt="Présentation IKA SOLUTION">
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
          <a href="<?php echo esc_url( home_url( '/presentation' ) ); ?>" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">En savoir plus</a>
        </div>
      </div>
    </section>

    <section id="pourquoi" class="relative overflow-hidden bg-ikaBlueDark py-20 text-white sm:py-28">
      <div class="absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo ika_asset('images/slide3.jpg'); ?>'); opacity:.12;" aria-hidden="true"></div>
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
            <h3 class="mt-5 text-xl font-black">Fiabilité</h3>
            <p class="mt-4 text-sm leading-7 text-white/75">Des infrastructures sécurisées, des logiciels robustes et des méthodologies éprouvées depuis 2014.</p>
          </article>
          <article class="reveal rounded-2xl border border-white/15 bg-white/10 p-7">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-sm font-black">03</span>
            <h3 class="mt-5 text-xl font-black">Réactivité</h3>
            <p class="mt-4 text-sm leading-7 text-white/75">Un support technique à l'écoute et des interventions rapides pour garantir la continuité de vos services.</p>
          </article>
          <article class="reveal rounded-2xl border border-white/15 bg-white/10 p-7">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-sm font-black text-ikaBlue">04</span>
            <h3 class="mt-5 text-xl font-black">Sur-mesure</h3>
            <p class="mt-4 text-sm leading-7 text-white/75">Des solutions adaptées à vos contraintes budgétaires, réglementaires et opérationnelles.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="expertises" class="bg-ikaSoft py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal flex flex-col justify-between gap-6 md:flex-row md:items-end">
          <div class="max-w-2xl">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Domaines d'intervention</p>
            <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Nos expertises au service de votre croissance</h2>
          </div>
          <a href="assets/pdf/brochure.pdf" target="_blank" class="inline-flex w-fit shrink-0 rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white shadow-clean transition hover:bg-red-700">Voir la brochure</a>
        </div>

        <div class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
          <article class="expertise-card reveal rounded-3xl bg-white p-7 shadow-clean">
            <div class="expertise-visual expertise-cut-a">
              <img src="<?php echo ika_asset('images/development2.jpg'); ?>" alt="Développement d'applications">
            </div>
            <h3 class="text-xl font-black text-ikaBlueDark">Développement d'applications</h3>
            <p class="mt-3 text-sm leading-7 text-slate-600">Conception de logiciels sur mesure, portails web et applications mobiles adaptés à vos métiers.</p>
            <a href="developpement-app.php" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-ikaRed transition hover:translate-x-1">En savoir plus &rarr;</a>
          </article>

          <article class="expertise-card reveal rounded-3xl bg-white p-7 shadow-clean">
            <div class="expertise-visual expertise-cut-b">
              <img src="<?php echo ika_asset('images/slide4.jpg'); ?>" alt="Infrastructure serveur et réseau">
            </div>
            <h3 class="text-xl font-black text-ikaBlueDark">Infrastructure serveur et réseau</h3>
            <p class="mt-3 text-sm leading-7 text-slate-600">Installation, câblage, interconnexion de sites, déploiement de serveurs et administration réseau.</p>
            <a href="infrastructures-serveurs-reseaux.php" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-ikaRed transition hover:translate-x-1">En savoir plus &rarr;</a>
          </article>

          <article class="expertise-card reveal rounded-3xl bg-white p-7 shadow-clean">
            <div class="expertise-visual expertise-cut-c">
              <img src="<?php echo ika_asset('images/cloud2.jpg'); ?>" alt="Solutions cloud et licences">
            </div>
            <h3 class="text-xl font-black text-ikaBlueDark">Solutions cloud et licences</h3>
            <p class="mt-3 text-sm leading-7 text-slate-600">Hébergement cloud sécurisé, messagerie professionnelle et fourniture de licences logicielles officielles.</p>
            <a href="solutions-cloud-licences.php" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-ikaRed transition hover:translate-x-1">En savoir plus &rarr;</a>
          </article>

          <article class="expertise-card reveal rounded-3xl bg-white p-7 shadow-clean">
            <div class="expertise-visual expertise-cut-d">
              <img src="<?php echo ika_asset('images/conseil2.jpg'); ?>" alt="Conseil et stratégie IT">
            </div>
            <h3 class="text-xl font-black text-ikaBlueDark">Conseil et stratégie IT</h3>
            <p class="mt-3 text-sm leading-7 text-slate-600">Audit des systèmes d'information, accompagnement au choix technologique et schémas directeurs.</p>
            <a href="conseil-audit-strategie-it.php" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-ikaRed transition hover:translate-x-1">En savoir plus &rarr;</a>
          </article>

          <article class="expertise-card reveal rounded-3xl bg-white p-7 shadow-clean">
            <div class="expertise-visual expertise-cut-e">
              <img src="<?php echo ika_asset('images/securite.jpg'); ?>" alt="Cybersécurité et données">
            </div>
            <h3 class="text-xl font-black text-ikaBlueDark">Cybersécurité et données</h3>
            <p class="mt-3 text-sm leading-7 text-slate-600">Protection des réseaux, sécurisation des accès, pare-feu et politiques de sauvegarde et conformité.</p>
            <a href="cybersecurite-donnees.php" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-ikaRed transition hover:translate-x-1">En savoir plus &rarr;</a>
          </article>

          <article class="expertise-card reveal rounded-3xl bg-white p-7 shadow-clean">
            <div class="expertise-visual expertise-cut-f">
              <img src="<?php echo ika_asset('images/support2.png'); ?>" alt="Support technique et infogérance">
            </div>
            <h3 class="text-xl font-black text-ikaBlueDark">Support technique & infogérance</h3>
            <p class="mt-3 text-sm leading-7 text-slate-600">Contrats de maintenance préventive et curative, assistance aux utilisateurs et infogérance globale.</p>
            <a href="support-technique-infogerance.php" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-ikaRed transition hover:translate-x-1">En savoir plus &rarr;</a>
          </article>

          <article class="expertise-card reveal rounded-3xl bg-white p-7 shadow-clean">
            <div class="expertise-visual expertise-cut-g">
              <img src="<?php echo ika_asset('images/energie2.jpg'); ?>" alt="Équipements et services énergétiques">
            </div>
            <h3 class="text-xl font-black text-ikaBlueDark">Équipements & énergie</h3>
            <p class="mt-3 text-sm leading-7 text-slate-600">Fourniture de matériels informatiques, onduleurs, solutions solaires pour salles serveurs et sites isolés.</p>
            <a href="equipements-services-energetiques.php" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-ikaRed transition hover:translate-x-1">En savoir plus &rarr;</a>
          </article>

          <article class="expertise-card reveal rounded-3xl bg-white p-7 shadow-clean">
            <div class="expertise-visual expertise-cut-h">
              <img src="<?php echo ika_asset('images/formation2.jpg'); ?>" alt="Formation et accompagnement">
            </div>
            <h3 class="text-xl font-black text-ikaBlueDark">Formation utilisateurs</h3>
            <p class="mt-3 text-sm leading-7 text-slate-600">Programmes de formation sur mesure pour maîtriser vos outils logiciels, progiciels et bonnes pratiques IT.</p>
            <a href="formation-utilisateurs.php" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-ikaRed transition hover:translate-x-1">En savoir plus &rarr;</a>
          </article>
        </div>
      </div>
    </section>

    <section id="produits" class="bg-white py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal text-center max-w-3xl mx-auto">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Logiciels phares</p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Nos solutions logicielles métiers</h2>
          <p class="mt-4 text-base text-slate-600">Des progiciels conçus et développés pour automatiser vos processus administratifs, sécuriser vos accueils et valoriser vos archives.</p>
        </div>

        <div class="mt-14 flex flex-wrap justify-center gap-3">
          <button class="product-tab rounded-full px-7 py-3 text-sm font-black transition bg-ikaBlue text-white shadow-clean" data-target="visite">IKA Visite</button>
          <button class="product-tab rounded-full px-7 py-3 text-sm font-black transition bg-ikaSoft text-slate-700 hover:bg-slate-200" data-target="courrier">IKA Courrier</button>
          <button class="product-tab rounded-full px-7 py-3 text-sm font-black transition bg-ikaSoft text-slate-700 hover:bg-slate-200" data-target="archive">IKA Archive</button>
          <button class="product-tab rounded-full px-7 py-3 text-sm font-black transition bg-ikaSoft text-slate-700 hover:bg-slate-200" data-target="portail">IKA Portail</button>
        </div>

        <div class="mt-12 rounded-[2.5rem] bg-ikaSoft p-6 sm:p-10 lg:p-14">
          <div id="visite" class="product-slide active grid gap-10 lg:grid-cols-2 lg:items-center">
            <div class="reveal">
              <span class="inline-flex rounded-full bg-ikaBlue/10 px-4 py-1.5 text-xs font-black text-ikaBlue">Gestion d'accueil</span>
              <h3 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl">IKA Visite : Contrôle et traçabilité des accès</h3>
              <p class="mt-4 text-base leading-7 text-slate-600">Solution intelligente d'enregistrement et de suivi des visiteurs en entreprise ou administration. Badges, notifications d'arrivée, registre numérique sécurisé et statistiques en temps réel.</p>
              <ul class="mt-6 grid gap-3 text-sm font-semibold text-slate-700">
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Enregistrement rapide des visiteurs</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Édition de badges temporaires</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Historique et rapports d'affluence</li>
              </ul>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="ika-visite.php" class="rounded-full bg-ikaBlue px-7 py-4 text-sm font-bold text-white transition hover:bg-ikaBlueDark">Découvrir IKA Visite</a>
                <a href="<?php echo ika_asset('images/brochures/A5-visite.png'); ?>" download="Brochure_IKA_VISITE.png" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:text-ikaBlue hover:bg-ikaSoft">Télécharger la brochure</a>
              </div>
            </div>
            <div class="reveal relative">
              <img class="h-80 w-full object-cover rounded-[1.5rem] shadow-premium lg:h-[520px]" src="<?php echo ika_asset('images/ikavisite.jpg'); ?>" alt="Accueil professionnel">
            </div>
          </div>

          <div id="courrier" class="product-slide grid gap-10 lg:grid-cols-2 lg:items-center">
            <div class="reveal">
              <span class="inline-flex rounded-full bg-ikaBlue/10 px-4 py-1.5 text-xs font-black text-ikaBlue">Courrier & Workflow</span>
              <h3 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl">IKA Courrier : Gestion électronique du courrier</h3>
              <p class="mt-4 text-base leading-7 text-slate-600">Optimisez la circulation des courriers arrivés, départs et internes. Traçabilité des imputations, alertes de délais, signature électronique et archivage sécurisé.</p>
              <ul class="mt-6 grid gap-3 text-sm font-semibold text-slate-700">
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Numérisation et indexation instantanée</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Workflow de validation personnalisable</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Recherche multicritère et traçabilité</li>
              </ul>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="ika-courrier.php" class="rounded-full bg-ikaBlue px-7 py-4 text-sm font-bold text-white transition hover:bg-ikaBlueDark">Découvrir IKA Courrier</a>
                <a href="<?php echo ika_asset('images/brochures/A5courier.png'); ?>" download="Brochure_IKA_COURRIER.png" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:text-ikaBlue hover:bg-ikaSoft">Télécharger la brochure</a>
              </div>
            </div>
            <div class="reveal relative">
              <img class="h-80 w-full object-cover rounded-[1.5rem] shadow-premium lg:h-[520px]" src="<?php echo ika_asset('images/ikacourrier.jpg'); ?>" alt="Traitement administratif">
            </div>
          </div>

          <div id="archive" class="product-slide grid gap-10 lg:grid-cols-2 lg:items-center">
            <div class="reveal">
              <span class="inline-flex rounded-full bg-ikaBlue/10 px-4 py-1.5 text-xs font-black text-ikaBlue">Archivage numérique</span>
              <h3 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl">IKA Archive : Gestion et conservation documentaire</h3>
              <p class="mt-4 text-base leading-7 text-slate-600">Solution professionnelle d'archivage électronique (SAE). Classement par plans de classement, gestion des droits d'accès, conservation à long terme et recherche instantanée.</p>
              <ul class="mt-6 grid gap-3 text-sm font-semibold text-slate-700">
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Plan de classement structuré</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Sécurité et confidentialité des fonds</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Cycle de vie et élimination réglementaire</li>
              </ul>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="ika-archive.php" class="rounded-full bg-ikaBlue px-7 py-4 text-sm font-bold text-white transition hover:bg-ikaBlueDark">Découvrir IKA Archive</a>
                <a href="<?php echo ika_asset('images/brochures/A5-archive.png'); ?>" download="Brochure_IKA_ARCHIVE.png" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:text-ikaBlue hover:bg-ikaSoft">Télécharger la brochure</a>
              </div>
            </div>
            <div class="reveal relative">
              <img class="h-80 w-full object-cover rounded-[1.5rem] shadow-premium lg:h-[520px]" src="<?php echo ika_asset('images/ikaarchive.jpg'); ?>" alt="Archivage documentaire">
            </div>
          </div>

          <div id="portail" class="product-slide grid gap-10 lg:grid-cols-2 lg:items-center">
            <div class="reveal">
              <span class="inline-flex rounded-full bg-ikaBlue/10 px-4 py-1.5 text-xs font-black text-ikaBlue">Portail citoyen & institutionnel</span>
              <h3 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl">IKA Portail : Services en ligne et e-gouvernance</h3>
              <p class="mt-4 text-base leading-7 text-slate-600">Plateforme web unifiée pour administrations et grandes entreprises. Espaces usagers, formulaires dynamiques, paiements en ligne et suivi des démarches.</p>
              <ul class="mt-6 grid gap-3 text-sm font-semibold text-slate-700">
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Démarches en ligne unifiées</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Tableau de bord de suivi</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Intégration sécurisée</li>
              </ul>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="ika-portail.php" class="rounded-full bg-ikaBlue px-7 py-4 text-sm font-bold text-white transition hover:bg-ikaBlueDark">Découvrir IKA Portail</a>
                <a href="<?php echo ika_asset('images/brochures/A5-portail.png'); ?>" download="Brochure_IKA_PORTAIL.png" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:text-ikaBlue hover:bg-ikaSoft">Télécharger la brochure</a>
              </div>
            </div>
            <div class="reveal relative">
              <img class="h-80 w-full object-cover rounded-[1.5rem] shadow-premium lg:h-[520px]" src="<?php echo ika_asset('images/ikaportail.jpg'); ?>" alt="Portail digital sécurisé">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Client Marquee & References Section -->
    <section class="bg-ikaSoft py-16 overflow-hidden">
      <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
        <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-500">Ils nous font confiance</p>
        <div class="mt-10 overflow-hidden relative">
          <div class="animate-marquee flex gap-12 items-center">
            <div class="flex items-center gap-12 shrink-0">
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo ika_asset('images/clients/APEC.png'); ?>" alt="APEC"></div>
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo ika_asset('images/clients/coris.jpg'); ?>" alt="Coris Bank"></div>
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo ika_asset('images/clients/Lonab.png'); ?>" alt="LONAB"></div>
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo ika_asset('images/clients/ONEA.jpg'); ?>" alt="ONEA"></div>
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo ika_asset('images/clients/Sonatur.png'); ?>" alt="SONATUR"></div>
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo ika_asset('images/clients/sonabhy.png'); ?>" alt="SONABHY"></div>
            </div>
            <div class="flex items-center gap-12 shrink-0" aria-hidden="true">
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo ika_asset('images/clients/APEC.png'); ?>" alt="APEC"></div>
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo ika_asset('images/clients/coris.jpg'); ?>" alt="Coris Bank"></div>
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo ika_asset('images/clients/Lonab.png'); ?>" alt="LONAB"></div>
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo ika_asset('images/clients/ONEA.jpg'); ?>" alt="ONEA"></div>
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo ika_asset('images/clients/Sonatur.png'); ?>" alt="SONATUR"></div>
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo ika_asset('images/clients/sonabhy.png'); ?>" alt="SONABHY"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <script>
    // Hero Slider & Animations Script
    const slides = document.querySelectorAll('#accueil .slide');
    const dots = document.querySelectorAll('.hero-dot');
    const heroCopy = document.getElementById('heroCopyPanel');
    const heroVisual = document.getElementById('heroVisualImage');
    const heroTitle = document.getElementById('heroTitle');
    const heroEyebrow = document.getElementById('heroEyebrow');
    const heroText = document.getElementById('heroText');
    const heroPrimary = document.getElementById('heroPrimary');
    const heroSecondary = document.getElementById('heroSecondary');
    const heroMetricLabel = document.getElementById('heroMetricLabel');
    const heroMetric = document.getElementById('heroMetric');
    const heroMetricText = document.getElementById('heroMetricText');

    const heroContentData = [
      {
        eyebrow: "La solution qui vous convient | Depuis 2014",
        titleHtml: '<span class="block">Votre transformation digitale</span> <span class="block">commence ici !</span>',
        text: "Nous analysons vos besoins, structurons vos priorités et mettons en place les outils numériques qui rendent vos opérations plus simples, plus fiables et mieux suivies.",
        primary: { text: "Découvrir nos expertises", href: "#expertises" },
        secondary: { text: "Parler à un expert", href: "#contact" },
        image: "<?php echo ika_asset('images/slide11.jpg'); ?>",
        metric: { label: "Depuis 2014", value: "Expert digital", text: "Conseil, logiciels, réseaux, cloud et sécurité." }
      },
      {
        eyebrow: "Ingénierie & Progiciels Métiers",
        titleHtml: '<span class="block">Logiciels sur mesure</span> <span class="block">et automatisation</span>',
        text: "Développez des solutions performantes adaptées à vos spécificités métiers : gestion d'accueil, courrier, archives et portails citoyens.",
        primary: { text: "Explorer nos logiciels", href: "#produits" },
        secondary: { text: "Demander une démo", href: "#contact" },
        image: "<?php echo ika_asset('images/slide2.jpg'); ?>",
        metric: { label: "Progiciels", value: "IKA Suite", text: "Visite, Courrier, Archive, Portail." }
      },
      {
        eyebrow: "Infrastructures & Réseaux Sécurisés",
        titleHtml: '<span class="block">Réseaux robustes</span> <span class="block">et hébergement cloud</span>',
        text: "Sécurisez vos données et interconnectez vos sites avec nos expertises en infrastructure serveur, pare-feu, cloud et énergie.",
        primary: { text: "Nos infrastructures", href: "#expertises" },
        secondary: { text: "Audit réseau", href: "#contact" },
        image: "<?php echo ika_asset('images/slide3.jpg'); ?>",
        metric: { label: "Sécurité", value: "Haute Disponibilité", text: "Protection des données et continuité." }
      },
      {
        eyebrow: "Partenaire de Confiance au Burkina Faso",
        titleHtml: '<span class="block">Accompagnement global</span> <span class="block">et infogérance IT</span>',
        text: "Bénéficiez d'un support technique réactif, de conseils stratégiques et d'une assistance quotidienne pour tous vos équipements informatiques.",
        primary: { text: "Contacter l'équipe", href: "#contact" },
        secondary: { text: "En savoir plus", href: "presentation.php" },
        image: "<?php echo ika_asset('images/slide4.jpg'); ?>",
        metric: { label: "Support", value: "24/7 & Proximité", text: "Intervention rapide à Ouagadougou et sous-région." }
      }
    ];

    let currentSlide = 0;
    let slideInterval = setInterval(nextSlide, 5500);

    function setHeroContent(index) {
      const data = heroContentData[index];
      if (!heroCopy || !heroVisual) return;
      heroCopy.classList.add('is-changing');
      heroVisual.classList.add('is-changing');
      setTimeout(() => {
        heroEyebrow.textContent = data.eyebrow;
        heroTitle.innerHTML = data.titleHtml;
        heroText.textContent = data.text;
        heroPrimary.textContent = data.primary.text;
        heroPrimary.setAttribute('href', data.primary.href);
        heroSecondary.textContent = data.secondary.text;
        heroSecondary.setAttribute('href', data.secondary.href);
        heroVisual.setAttribute('src', data.image);
        heroMetricLabel.textContent = data.metric.label;
        heroMetric.textContent = data.metric.value;
        heroMetricText.textContent = data.metric.text;

        heroCopy.classList.remove('is-changing');
        heroVisual.classList.remove('is-changing');
      }, 320);
    }

    function goToSlide(index) {
      slides[currentSlide].classList.remove('active');
      slides[currentSlide].classList.add('leaving');
      setTimeout(() => slides[currentSlide].classList.remove('leaving'), 900);

      dots[currentSlide].classList.remove('bg-ikaRed', 'w-10');
      dots[currentSlide].classList.add('bg-white/35', 'w-10');

      currentSlide = index;

      slides[currentSlide].classList.add('active');
      dots[currentSlide].classList.remove('bg-white/35', 'w-10');
      dots[currentSlide].classList.add('bg-ikaRed', 'w-10');

      setHeroContent(currentSlide);
    }

    function nextSlide() {
      const nextIndex = (currentSlide + 1) % slides.length;
      goToSlide(nextIndex);
    }

    dots.forEach((dot, idx) => {
      dot.addEventListener('click', () => {
        clearInterval(slideInterval);
        goToSlide(idx);
        slideInterval = setInterval(nextSlide, 5500);
      });
    });

    // Product Tabs
    const productTabs = document.querySelectorAll('.product-tab');
    const productSlides = document.querySelectorAll('.product-slide');
    productTabs.forEach(tab => {
      tab.addEventListener('click', () => {
        const target = tab.getAttribute('data-target');
        productTabs.forEach(t => {
          t.classList.remove('bg-ikaBlue', 'text-white', 'shadow-clean');
          t.classList.add('bg-ikaSoft', 'text-slate-700');
        });
        tab.classList.remove('bg-ikaSoft', 'text-slate-700');
        tab.classList.add('bg-ikaBlue', 'text-white', 'shadow-clean');

        productSlides.forEach(s => s.classList.remove('active'));
        document.getElementById(target).classList.add('active');
      });
    });

    // Scroll Reveal Observer
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, { threshold: 0.12 });
    reveals.forEach(r => observer.observe(r));
  </script>

<?php get_footer(); ?>
