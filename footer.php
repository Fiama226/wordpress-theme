<?php
  $sectionBase = $sectionBase ?? ((basename($_SERVER['SCRIPT_NAME'] ?? 'index.php') === 'index.php') ? '' : 'index.php');
?>
  <footer class="border-t border-slate-100 bg-white text-slate-700">
    <div class="relative overflow-hidden bg-ikaBlueDark">
      <div class="absolute inset-0 opacity-20" aria-hidden="true" style="background-image: linear-gradient(135deg, transparent 0 18px, rgba(255,255,255,.45) 18px 21px, transparent 21px 42px), linear-gradient(45deg, transparent 0 18px, rgba(229,26,55,.65) 18px 21px, transparent 21px 42px); background-size: 42px 42px;"></div>
      <div class="relative mx-auto flex max-w-7xl flex-col gap-2 px-4 py-3 text-[11px] font-bold text-white/80 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <span>IKA SOLUTION. La solution qui vous convient.</span>
      </div>
    </div>
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 md:grid-cols-2 lg:grid-cols-[1.25fr_.7fr_.7fr_.85fr] lg:px-8">
      <div>
        <img class="h-20 w-auto" src="assets/images/logo.png" alt="IKA SOLUTION">
        <p class="mt-4 max-w-md text-sm leading-7 text-slate-600">Partenaire digital créé en 2014, IKA SOLUTION LTD accompagne les organisations en conseil, ingénierie, réseaux, logiciels métier, cloud et sécurité.</p>
      </div>
      <div>
        <h3 class="text-sm font-black uppercase tracking-[0.18em] text-ikaRed">Société</h3>
        <div class="mt-5 grid gap-3 text-sm font-semibold text-slate-600">
          <a class="hover:text-ikaBlue" href="<?= $sectionBase ?>#societe">À propos de nous</a>
          <a class="hover:text-ikaBlue" href="<?= $sectionBase ?>#pourquoi">Pourquoi nous choisir</a>
          <a class="hover:text-ikaBlue" href="<?= $sectionBase ?>#vision">Vision, mission, valeurs</a>
          <a class="hover:text-ikaBlue" href="realisations.php">Réalisations</a>
          <a class="hover:text-ikaBlue" href="actualites.php">Actualités</a>
        </div>
      </div>
      <div>
        <h3 class="text-sm font-black uppercase tracking-[0.18em] text-ikaRed">Nos solutions</h3>
        <div class="mt-5 grid gap-3 text-sm font-semibold text-slate-600">
          <a class="hover:text-ikaBlue" href="<?= $sectionBase ?>#produits">IKA Visite</a>
          <a class="hover:text-ikaBlue" href="<?= $sectionBase ?>#produits">IKA Courier</a>
          <a class="hover:text-ikaBlue" href="<?= $sectionBase ?>#produits">IKA Archive</a>
          <a class="hover:text-ikaBlue" href="<?= $sectionBase ?>#produits">IKA Portail</a>
        </div>
      </div>
      <div>
        <h3 class="text-sm font-black uppercase tracking-[0.18em] text-ikaRed">Contact</h3>
        <div class="mt-5 grid gap-4 text-sm font-semibold text-slate-600">
          <p>Ouagadougou, Burkina Faso</p>
          <a class="hover:text-ikaBlue" href="tel:+22672089090">+226 72 08 90 90</a>
          <a class="hover:text-ikaBlue" href="tel:+22625655954">+226 25 65 59 54</a>
          <a class="break-all hover:text-ikaBlue" href="mailto:infos@ikasolution.com">infos@ikasolution.com</a>
        </div>
      </div>
    </div>
    <div class="bg-ikaBlueDark">
      <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-5 text-xs font-semibold text-white/70 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <span>© 2026 IKA SOLUTION. Tous droits réservés.</span>
        <span>Solutions digitales, cloud, infrastructure et sécurité.</span>
      </div>
    </div>
  </footer>

  <a
    href="https://wa.me/22672089090?text=Bonjour%20IKA%20SOLUTION%2C%20je%20souhaite%20avoir%20des%20informations%20sur%20vos%20services."
    class="whatsapp-widget fixed bottom-4 right-3 z-50 flex max-w-[calc(100vw-1.5rem)] items-center gap-2 rounded-full border border-white/70 bg-white px-3 py-2 text-ikaBlueDark shadow-premium transition hover:-translate-y-1 hover:shadow-[0_22px_60px_rgba(37,211,102,.28)] sm:bottom-5 sm:right-6 sm:gap-3 sm:px-4 sm:py-3"
    target="_blank"
    rel="noopener"
    aria-label="Contacter IKA SOLUTION sur WhatsApp"
  >
    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#25D366] sm:h-12 sm:w-12">
      <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
    </span>
    <span class="grid min-w-0 gap-0.5 sm:gap-1">
      <span class="text-[10px] font-black uppercase tracking-[0.12em] text-ikaRed sm:text-xs sm:tracking-[0.16em]">Support IKASOLUTION</span>
      <span class="whatsapp-message relative block h-5 min-w-[155px] overflow-hidden text-xs font-black text-ikaBlueDark sm:min-w-[270px] sm:text-sm">
        <span class="absolute inset-0">Contactez-nous maintenant</span>
        <span class="absolute inset-0 opacity-0">Besoin d’un devis rapide ?</span>
        <span class="absolute inset-0 opacity-0">Parlez à un expert IKA</span>
      </span>
    </span>
  </a>

  <script>
    const menuButton = document.querySelector('#menuButton');
    const mobileMenu = document.querySelector('#mobileMenu');
    menuButton.addEventListener('click', () => {
      const isOpen = !mobileMenu.classList.contains('hidden');
      mobileMenu.classList.toggle('hidden');
      menuButton.setAttribute('aria-expanded', String(!isOpen));
    });

    function applyNavHash(hash) {
      const dCls = ['text-ikaBlue','underline','decoration-2','underline-offset-4','decoration-ikaBlue'];
      const mCls = ['bg-ikaSoft/80','font-black','text-ikaBlue'];
      const tracked = ['#expertises','#produits','#contact'];
      const isIndex = window.location.pathname.match(/\/(index\.php)?$/);
      document.querySelectorAll('header nav a, #mobileMenu a').forEach(link => {
        const href = link.getAttribute('href') || '';
        if (link.classList.contains('rounded-full')) return;
        const idx = href.indexOf('#');
        if (idx < 1) return;
        const linkHash = href.substring(idx);
        const isMobile = !!link.closest('#mobileMenu');
        const cls = isMobile ? mCls : dCls;
        if (linkHash === '#top') {
          cls.forEach(c => link.classList.toggle(c, isIndex && !tracked.includes(hash)));
        } else {
          cls.forEach(c => link.classList.toggle(c, hash === linkHash));
        }
      });
    }
    applyNavHash(window.location.hash);
    window.addEventListener('hashchange', () => applyNavHash(window.location.hash));
    document.querySelectorAll('header nav a, #mobileMenu a').forEach(link => {
      link.addEventListener('click', () => {
        const href = link.getAttribute('href') || '';
        const idx = href.indexOf('#');
        if (idx > 0) setTimeout(() => applyNavHash(href.substring(idx)), 10);
      });
    });

    document.querySelectorAll('a[href$="#top"]').forEach(link => {
      link.addEventListener('click', (event) => {
        const target = new URL(link.href, window.location.href);
        const isIndexPage = window.location.pathname.endsWith('/index.php') || window.location.pathname.endsWith('/');
        const sameIndexTarget = target.pathname.endsWith('/index.php') || target.pathname.endsWith('/');

        if (!isIndexPage || !sameIndexTarget) {
          return;
        }

        event.preventDefault();
        window.history.pushState(null, '', 'index.php#top');
        window.scrollTo({ top: 0, behavior: 'smooth' });

        if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
          mobileMenu.classList.add('hidden');
          menuButton.setAttribute('aria-expanded', 'false');
        }
      });
    });

    const heroSlides = [...document.querySelectorAll('.slide')];
    const heroDots = [...document.querySelectorAll('.hero-dot')];
    const heroCopyPanel = document.querySelector('#heroCopyPanel');
    const heroVisualImage = document.querySelector('#heroVisualImage');
    const heroData = [
      {
        eyebrow: 'La solution qui vous convient | Depuis 2014',
        title: 'Votre transformation digitale commence ici !',
        titleHtml: '<span class="block">Votre transformation digitale</span> <span class="block">commence ici !</span>',
        text: "Nous analysons vos besoins, structurons vos priorités et mettons en place les outils numériques qui rendent vos opérations plus simples, plus fiables et mieux suivies.",
        primary: 'Découvrir nos expertises',
        primaryHref: '#expertises',
        secondary: 'Parler à un expert',
        secondaryHref: '#contact',
        visual: 'assets/images/slide11.jpg',
        metricLabel: 'Depuis 2014',
        metric: 'Expert digital',
        metricText: 'Conseil, logiciels, réseaux, cloud et sécurité.'
      },
      {
        eyebrow: 'Performance opérationnelle | Automatisation et pilotage',
        title: 'Nous boostons votre productivité !',
        text: 'Nous supprimons les tâches répétitives, automatisons vos circuits de validation et connectons vos outils pour aider vos équipes à travailler plus vite, avec moins d’erreurs.',
        primary: 'Voir nos solutions',
        primaryHref: '#produits',
        secondary: 'Nos réalisations',
        secondaryHref: '#realisations',
        visual: 'assets/images/slide2.jpg',
        metricLabel: 'Suites opérationnelles',
        metric: 'Vite et bien',
        metricText: 'Vous serez surement le prochain partenaire satisfaits !'
      },
      {
        eyebrow: 'Logiciels IKA | Applications, portails et intégrations',
        title: 'Nos solutions métiers sur mesure',
        text: 'Chaque métier a ses contraintes. Nous concevons des portails, workflows, applications et intégrations adaptés à vos règles internes et à votre manière de travailler.',
        primary: 'Découvrir nos solutions',
        primaryHref: '#produits',
        secondary: 'Lancer un projet',
        secondaryHref: '#contact',
        visual: 'assets/images/slide3.jpg',
        metricLabel: 'Sur mesure',
        metric: 'Solutions métier',
        metricText: 'Visite, courrier, archive et portail sécurisé.'
      },
      {
        eyebrow: 'Cloud local | VPS, domaine .bf, sauvegarde et support',
        title: 'Hébergement local au Burkina Faso',
        text: 'Hébergez vos sites, applications et données plus près de vos utilisateurs avec une infrastructure locale, un support réactif et une meilleure maîtrise de vos environnements critiques.',
        primary: 'Voir l’hébergement',
        primaryHref: '#hosting',
        secondary: 'Demander un devis',
        secondaryHref: '#contact',
        visual: 'assets/images/slide4.jpg',
        metricLabel: 'Local',
        metric: 'VPS & cloud',
        metricText: 'Hébergement, sauvegarde, supervision et domaines .bf.'
      }
    ];

    if (heroSlides.length && heroDots.length && heroCopyPanel && heroVisualImage) {
      let heroIndex = 0;
      let heroTimer;
      const heroSection = document.querySelector('#accueil');
      const heroTitle = document.querySelector('#heroTitle');

      function runHeroIntro() {
        if (!heroSection || !heroTitle || heroSection.dataset.introPlayed === 'true') {
          return 0;
        }

        heroSection.dataset.introPlayed = 'true';
        heroSection.classList.add('hero-intro');

        const words = heroTitle.textContent.trim().split(/\s+/);
        let charIndex = 0;
        heroTitle.innerHTML = words.map((word) => {
          const chars = [...word].map((char) => {
            const delay = 0.28 + (charIndex * 0.035);
            charIndex++;
            return `<span class="hero-char" style="animation-delay:${delay}s">${char}</span>`;
          }).join('');
          return `<span class="hero-word">${chars}</span>`;
        }).join(' ');

        window.setTimeout(() => {
          heroSection.classList.remove('hero-intro');
          const data = heroData[heroIndex];
          if (data.titleHtml) {
            heroTitle.innerHTML = data.titleHtml;
          } else {
            heroTitle.textContent = data.title;
          }
        }, 2600);

        return 2800;
      }

      function showHero(index) {
        const previousIndex = heroSlides.findIndex(slide => slide.classList.contains('active'));
        heroCopyPanel.classList.add('is-changing');
        heroVisualImage.classList.add('is-changing');
        setTimeout(() => {
          const data = heroData[index];
          heroSlides.forEach((slide, i) => {
            const isIncoming = i === index;
            const isLeaving = i === previousIndex && previousIndex !== index;
            slide.classList.toggle('active', isIncoming);
            slide.classList.toggle('leaving', isLeaving);
          });
          document.querySelector('#heroEyebrow').textContent = data.eyebrow;
          const heroTitle = document.querySelector('#heroTitle');
          if (data.titleHtml) {
            heroTitle.innerHTML = data.titleHtml;
          } else {
            heroTitle.textContent = data.title;
          }
          document.querySelector('#heroText').textContent = data.text;
          document.querySelector('#heroPrimary').textContent = data.primary;
          document.querySelector('#heroPrimary').href = data.primaryHref;
          document.querySelector('#heroSecondary').textContent = data.secondary;
          document.querySelector('#heroSecondary').href = data.secondaryHref;
          heroVisualImage.src = data.visual;
          document.querySelector('#heroMetricLabel').textContent = data.metricLabel;
          document.querySelector('#heroMetric').textContent = data.metric;
          document.querySelector('#heroMetricText').textContent = data.metricText;
          heroDots.forEach((dot, i) => {
            dot.classList.toggle('bg-ikaRed', i === index);
            dot.classList.toggle('bg-white/35', i !== index);
          });
          heroCopyPanel.classList.remove('is-changing');
          heroVisualImage.classList.remove('is-changing');
          window.setTimeout(() => {
            heroSlides.forEach(slide => slide.classList.remove('leaving'));
          }, 1300);
        }, 220);
      }

      function startHeroSlider() {
        clearInterval(heroTimer);
        heroTimer = setInterval(() => {
          heroIndex = (heroIndex + 1) % heroData.length;
          showHero(heroIndex);
        }, 5600);
      }

      heroDots.forEach(dot => {
        dot.addEventListener('click', () => {
          heroIndex = Number(dot.dataset.hero);
          if (heroSection) {
            heroSection.classList.remove('hero-intro');
            heroSection.dataset.introPlayed = 'true';
          }
          showHero(heroIndex);
          startHeroSlider();
        });
      });
      window.setTimeout(startHeroSlider, runHeroIntro());
    }

    const productTabs = [...document.querySelectorAll('.product-tab')];
    const productSlides = [...document.querySelectorAll('.product-slide')];
    let productTimer;

    function showProduct(index) {
      productSlides.forEach((slide, i) => slide.classList.toggle('active', i === index));
      productTabs.forEach((tab, i) => {
        tab.classList.toggle('bg-white', i === index);
        tab.classList.toggle('text-ikaBlue', i === index);
        tab.classList.toggle('border', i !== index);
        tab.classList.toggle('border-white/25', i !== index);
        tab.classList.toggle('text-white', i !== index);
      });
    }

    if (productTabs.length && productSlides.length) {
      function startProductSlider() {
        clearInterval(productTimer);
        productTimer = setInterval(() => {
          const current = productSlides.findIndex(slide => slide.classList.contains('active'));
          showProduct((current + 1) % productSlides.length);
        }, 6000);
      }

      productTabs.forEach(tab => {
        tab.addEventListener('click', () => {
          showProduct(Number(tab.dataset.product));
          startProductSlider();
        });
      });
      startProductSlider();
    }

    const revealTargets = [
      'main > section',
      'main article',
      'main form',
      'main iframe',
      'main img:not(#heroVisualImage)',
      'main a[class*="rounded-2xl"]',
      'main div[class*="rounded-2xl"]',
      'main div[class*="rounded-[2rem]"]'
    ];

    document.querySelectorAll(revealTargets.join(',')).forEach(element => {
      const isDecorativeLayer =
        element.getAttribute('aria-hidden') === 'true' ||
        element.classList.contains('absolute') ||
        element.classList.contains('fixed') ||
        element.className.includes('inset-0');

      if (!isDecorativeLayer && !element.classList.contains('reveal') && !element.closest('#accueil')) {
        element.classList.add('reveal');
      }
    });

    const revealVariants = ['reveal-up', 'reveal-left', 'reveal-right', 'reveal-zoom', 'reveal-tilt', 'reveal-down'];
    const revealElements = [...document.querySelectorAll('.reveal')];
    revealElements.forEach((element, index) => {
      if (!revealVariants.some(variant => element.classList.contains(variant))) {
        element.classList.add(revealVariants[index % revealVariants.length]);
      }
      element.style.transitionDelay = `${Math.min(index % 4, 3) * 70}ms`;
    });

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        } else {
          entry.target.classList.remove('visible');
        }
      });
    }, { threshold: 0.14 });

    revealElements.forEach(element => observer.observe(element));

    // Onglets accessibles (Proxmox + pages partenaires).
    // Boutons .pmx-tab (data-pmx-target = id du panneau) → .pmx-panel.
    document.querySelectorAll('[data-pmx-tabs]').forEach(group => {
      const tabs = [...group.querySelectorAll('.pmx-tab')];
      const panels = [...group.querySelectorAll('.pmx-panel')];
      if (!tabs.length || !panels.length) return;
      const activate = targetId => {
        tabs.forEach(tab => {
          const isActive = tab.getAttribute('data-pmx-target') === targetId;
          tab.classList.toggle('bg-ikaBlue', isActive);
          tab.classList.toggle('text-white', isActive);
          tab.classList.toggle('border-ikaBlue', isActive);
          tab.classList.toggle('border', !isActive);
          tab.classList.toggle('border-slate-200', !isActive);
          tab.classList.toggle('bg-white', !isActive);
          tab.classList.toggle('text-ikaBlue', !isActive);
          tab.setAttribute('aria-selected', String(isActive));
          tab.setAttribute('tabindex', isActive ? '0' : '-1');
        });
        panels.forEach(panel => { panel.hidden = panel.id !== targetId; });
      };
      tabs.forEach(tab => tab.addEventListener('click', () => activate(tab.getAttribute('data-pmx-target'))));
      activate(tabs[0].getAttribute('data-pmx-target'));
    });
  </script>
</body>
</html>
