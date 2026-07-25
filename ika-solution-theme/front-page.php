<?php
/**
 * The front page template file
 */
get_header();
?>

  <main>
    <?php get_template_part( 'template-parts/hero' ); ?>

    <?php get_template_part( 'template-parts/about' ); ?>

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

    <?php get_template_part( 'template-parts/solutions' ); ?>

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
