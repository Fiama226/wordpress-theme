/**
 * Animations du thème IKA Solution Pro.
 *
 * Reproduction fidèle du script du site statique d'origine :
 *  - menu mobile ;
 *  - surlignage de la navigation selon l'ancre courante (applyNavHash) ;
 *  - retour en haut fluide sur les liens « #top » ;
 *  - slider du hero (mêmes temporisations : 220 ms de bascule, 5,6 s d'auto-rotation,
 *    1,3 s de nettoyage de la slide sortante) ;
 *  - onglets produits (rotation 6 s) ;
 *  - révélation au défilement : ajout automatique de .reveal sur les sections,
 *    articles, formulaires, iframes, images et blocs arrondis, variantes
 *    (gauche/droite/haut/bas/zoom/tilt) en rotation, délais en cascade et
 *    ré-apparition à chaque entrée dans le viewport (threshold 0.14).
 *
 * Les données du hero sont injectées par wp_localize_script (ikaHero.slides).
 */
(function () {
  'use strict';

  /* ------------------------------------------------------------------ */
  /* Menu mobile                                                         */
  /* ------------------------------------------------------------------ */
  var menuButton = document.getElementById('menuButton');
  var mobileMenu = document.getElementById('mobileMenu');

  if (menuButton && mobileMenu) {
    menuButton.addEventListener('click', function () {
      var expanded = menuButton.getAttribute('aria-expanded') === 'true';
      menuButton.setAttribute('aria-expanded', String(!expanded));
      mobileMenu.classList.toggle('hidden');
    });
  }

  /* ------------------------------------------------------------------ */
  /* Surlignage de la navigation selon l'ancre courante                  */
  /* (identique au site statique, page d'accueil détectée via body.home) */
  /* ------------------------------------------------------------------ */
  function applyNavHash(hash) {
    var dCls = ['text-ikaBlue', 'underline', 'decoration-2', 'underline-offset-4', 'decoration-ikaBlue'];
    var mCls = ['bg-ikaSoft/80', 'font-black', 'text-ikaBlue'];
    var tracked = ['#expertises', '#produits', '#contact'];
    var isIndex = document.body.classList.contains('home');

    Array.prototype.forEach.call(document.querySelectorAll('header nav a, #mobileMenu a'), function (link) {
      var href = link.getAttribute('href') || '';
      if (link.classList.contains('rounded-full')) {
        return;
      }
      var idx = href.indexOf('#');
      if (idx < 1) {
        return;
      }
      var linkHash = href.substring(idx);
      var isMobile = !!link.closest('#mobileMenu');
      var cls = isMobile ? mCls : dCls;
      if (linkHash === '#top') {
        cls.forEach(function (c) { link.classList.toggle(c, isIndex && tracked.indexOf(hash) === -1); });
      } else {
        cls.forEach(function (c) { link.classList.toggle(c, hash === linkHash); });
      }
    });
  }

  applyNavHash(window.location.hash);
  window.addEventListener('hashchange', function () {
    applyNavHash(window.location.hash);
  });
  Array.prototype.forEach.call(document.querySelectorAll('header nav a, #mobileMenu a'), function (link) {
    link.addEventListener('click', function () {
      var href = link.getAttribute('href') || '';
      var idx = href.indexOf('#');
      if (idx > 0) {
        window.setTimeout(function () { applyNavHash(href.substring(idx)); }, 10);
      }
    });
  });

  /* ------------------------------------------------------------------ */
  /* Liens « #top » : retour en haut fluide (comme le site statique)     */
  /* ------------------------------------------------------------------ */
  Array.prototype.forEach.call(document.querySelectorAll('a[href$="#top"]'), function (link) {
    link.addEventListener('click', function (event) {
      if (!document.body.classList.contains('home')) {
        return; // hors accueil : le lien mène à la page d'accueil (#top).
      }

      event.preventDefault();
      window.history.pushState(null, '', '#top');
      window.scrollTo({ top: 0, behavior: 'smooth' });

      if (mobileMenu && menuButton && !mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.add('hidden');
        menuButton.setAttribute('aria-expanded', 'false');
      }
    });
  });

  /* ------------------------------------------------------------------ */
  /* Slider du hero                                                      */
  /* ------------------------------------------------------------------ */
  var heroData = (window.ikaHero && window.ikaHero.slides) || [];
  var heroSlides = document.querySelectorAll('#accueil .slide');
  var heroDots = document.querySelectorAll('.hero-dot');
  var heroCopyPanel = document.getElementById('heroCopyPanel');
  var heroVisualImage = document.getElementById('heroVisualImage');
  var heroSection = document.getElementById('accueil');
  var heroTitle = document.getElementById('heroTitle');
  var heroIndex = 0;
  var heroTimer = null;

  function setText(el, value) {
    if (el && typeof value === 'string') {
      el.textContent = value;
    }
  }

  function runHeroIntro() {
    if (!heroSection || !heroTitle || heroSection.dataset.introPlayed === 'true') {
      return 0;
    }

    heroSection.dataset.introPlayed = 'true';
    heroSection.classList.add('hero-intro');

    var words = heroTitle.textContent.trim().split(/\s+/);
    var charIndex = 0;
    heroTitle.innerHTML = words.map(function (word) {
      var chars = word.split('').map(function (char) {
        var delay = 0.28 + (charIndex * 0.035);
        charIndex++;
        return '<span class="hero-char" style="animation-delay:' + delay + 's">' + char + '</span>';
      }).join('');
      return '<span class="hero-word">' + chars + '</span>';
    }).join(' ');

    window.setTimeout(function () {
      heroSection.classList.remove('hero-intro');
      if (heroData[heroIndex] && heroData[heroIndex].titleHtml) {
        heroTitle.innerHTML = heroData[heroIndex].titleHtml;
      }
    }, 2600);

    return 2800;
  }

  function showHero(index) {
    var previousIndex = Array.prototype.findIndex.call(heroSlides, function (slide) {
      return slide.classList.contains('active');
    });

    heroCopyPanel.classList.add('is-changing');
    heroVisualImage.classList.add('is-changing');

    window.setTimeout(function () {
      var data = heroData[index];
      if (!data) {
        return;
      }

      Array.prototype.forEach.call(heroSlides, function (slide, i) {
        var isIncoming = i === index;
        var isLeaving = i === previousIndex && previousIndex !== index;
        slide.classList.toggle('active', isIncoming);
        slide.classList.toggle('leaving', isLeaving);
      });

      setText(document.getElementById('heroEyebrow'), data.eyebrow);
      if (heroTitle && data.titleHtml) {
        heroTitle.innerHTML = data.titleHtml;
      }
      setText(document.getElementById('heroText'), data.text);

      var heroPrimary = document.getElementById('heroPrimary');
      if (heroPrimary && data.primary) {
        setText(heroPrimary, data.primary.text);
        if (data.primary.href) {
          heroPrimary.setAttribute('href', data.primary.href);
        }
      }
      var heroSecondary = document.getElementById('heroSecondary');
      if (heroSecondary && data.secondary) {
        setText(heroSecondary, data.secondary.text);
        if (data.secondary.href) {
          heroSecondary.setAttribute('href', data.secondary.href);
        }
      }

      if (data.image && heroVisualImage) {
        heroVisualImage.setAttribute('src', data.image);
      }
      if (data.metric) {
        setText(document.getElementById('heroMetricLabel'), data.metric.label);
        setText(document.getElementById('heroMetric'), data.metric.value);
        setText(document.getElementById('heroMetricText'), data.metric.text);
      }

      Array.prototype.forEach.call(heroDots, function (dot, i) {
        dot.classList.toggle('bg-ikaRed', i === index);
        dot.classList.toggle('bg-white/35', i !== index);
      });

      heroCopyPanel.classList.remove('is-changing');
      heroVisualImage.classList.remove('is-changing');

      window.setTimeout(function () {
        Array.prototype.forEach.call(heroSlides, function (slide) {
          slide.classList.remove('leaving');
        });
      }, 1300);
    }, 220);
  }

  function startHeroSlider() {
    window.clearInterval(heroTimer);
    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      return; // respecte la préférence système « animations réduites ».
    }
    if (heroSlides.length > 1) {
      heroTimer = window.setInterval(function () {
        heroIndex = (heroIndex + 1) % heroData.length;
        showHero(heroIndex);
      }, 5600);
    }
  }

  if (heroSlides.length && heroDots.length && heroCopyPanel && heroVisualImage) {
    Array.prototype.forEach.call(heroDots, function (dot) {
      dot.addEventListener('click', function () {
        heroIndex = Number(dot.getAttribute('data-hero'));
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

  /* ------------------------------------------------------------------ */
  /* Onglets des produits (rotation automatique 6 s)                     */
  /* ------------------------------------------------------------------ */
  var productTabs = document.querySelectorAll('.product-tab');
  var productSlides = document.querySelectorAll('.product-slide');
  var productTimer = null;

  function showProduct(index) {
    Array.prototype.forEach.call(productSlides, function (slide, i) {
      slide.classList.toggle('active', i === index);
    });
    Array.prototype.forEach.call(productTabs, function (tab, i) {
      tab.classList.toggle('bg-white', i === index);
      tab.classList.toggle('text-ikaBlue', i === index);
      tab.classList.toggle('border', i !== index);
      tab.classList.toggle('border-white/25', i !== index);
      tab.classList.toggle('text-white', i !== index);
    });
  }

  function startProductSlider() {
    window.clearInterval(productTimer);
    if (!productSlides.length) {
      return;
    }
    productTimer = window.setInterval(function () {
      var current = Array.prototype.findIndex.call(productSlides, function (slide) {
        return slide.classList.contains('active');
      });
      showProduct((current + 1) % productSlides.length);
    }, 6000);
  }

  Array.prototype.forEach.call(productTabs, function (tab) {
    tab.addEventListener('click', function () {
      var idx = Number(tab.getAttribute('data-product'));
      if (!isNaN(idx)) {
        showProduct(idx);
      }
      startProductSlider();
    });
  });

  if (productTabs.length && productSlides.length) {
    startProductSlider();
  }

  /* ------------------------------------------------------------------ */
  /* Révélation au défilement — identique au site statique               */
  /* ------------------------------------------------------------------ */

  // 1. Ajouter automatiquement .reveal aux éléments structurels.
  var revealTargets = [
    'main > section',
    'main article',
    'main form',
    'main iframe',
    'main img:not(#heroVisualImage)',
    'main a[class*="rounded-2xl"]',
    'main div[class*="rounded-2xl"]',
    'main div[class*="rounded-[2rem]"]'
  ];

  Array.prototype.forEach.call(document.querySelectorAll(revealTargets.join(',')), function (element) {
    var isDecorativeLayer =
      element.getAttribute('aria-hidden') === 'true' ||
      element.classList.contains('absolute') ||
      element.classList.contains('fixed') ||
      element.className.includes('inset-0');

    if (!isDecorativeLayer && !element.classList.contains('reveal') && !element.closest('#accueil')) {
      element.classList.add('reveal');
    }
  });

  // 2. Variantes en rotation + délais en cascade.
  var revealVariants = ['reveal-up', 'reveal-left', 'reveal-right', 'reveal-zoom', 'reveal-tilt', 'reveal-down'];
  var revealElements = document.querySelectorAll('.reveal');
  Array.prototype.forEach.call(revealElements, function (element, index) {
    var hasVariant = revealVariants.some(function (variant) {
      return element.classList.contains(variant);
    });
    if (!hasVariant) {
      element.classList.add(revealVariants[index % revealVariants.length]);
    }
    element.style.transitionDelay = (Math.min(index % 4, 3) * 70) + 'ms';
  });

  // 3. Observation : apparition à l'entrée, disparition à la sortie (réversible).
  if (!('IntersectionObserver' in window)) {
    // Repli : tout est visible si l'API n'existe pas.
    Array.prototype.forEach.call(revealElements, function (element) {
      element.classList.add('visible');
    });
    return;
  }

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      } else {
        entry.target.classList.remove('visible');
      }
    });
  }, { threshold: 0.14 });

  Array.prototype.forEach.call(revealElements, function (element) {
    observer.observe(element);
  });
})();

/**
 * Filtres de la page Réalisations.
 */
(function () {
  'use strict';

  var btns = document.querySelectorAll('.filter-btn');
  var cards = document.querySelectorAll('.realisation-card');

  if (!btns.length || !cards.length) {
    return;
  }

  Array.prototype.forEach.call(btns, function (btn) {
    btn.addEventListener('click', function () {
      Array.prototype.forEach.call(btns, function (b) {
        b.classList.remove('bg-ikaRed', 'text-white');
        b.classList.add('border', 'border-slate-200', 'bg-white', 'text-ikaBlue');
        b.setAttribute('aria-pressed', 'false');
      });

      btn.classList.remove('border', 'border-slate-200', 'bg-white', 'text-ikaBlue');
      btn.classList.add('bg-ikaRed', 'text-white');
      btn.setAttribute('aria-pressed', 'true');

      var filter = btn.getAttribute('data-filter');

      Array.prototype.forEach.call(cards, function (card) {
        var show = filter === 'all' || card.getAttribute('data-type') === filter;
        card.style.display = show ? '' : 'none';
      });
    });
  });
})();
