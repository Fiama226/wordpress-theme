/**
 * Animations du thème IKA Solution Pro.
 *
 * Slider du hero, onglets produits, menu mobile et révélation au défilement.
 * Les données du hero sont injectées par wp_localize_script (ikaHero.slides).
 */
(function () {
  'use strict';

  var heroData = (window.ikaHero && window.ikaHero.slides) || [];

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
  /* Slider du hero                                                      */
  /* ------------------------------------------------------------------ */
  var slides = document.querySelectorAll('#accueil .slide');
  var dots = document.querySelectorAll('.hero-dot');
  var heroCopy = document.getElementById('heroCopyPanel');
  var heroVisual = document.getElementById('heroVisualImage');
  var heroTitle = document.getElementById('heroTitle');
  var heroEyebrow = document.getElementById('heroEyebrow');
  var heroText = document.getElementById('heroText');
  var heroPrimary = document.getElementById('heroPrimary');
  var heroSecondary = document.getElementById('heroSecondary');
  var heroMetricLabel = document.getElementById('heroMetricLabel');
  var heroMetric = document.getElementById('heroMetric');
  var heroMetricText = document.getElementById('heroMetricText');

  var currentSlide = 0;
  var slideInterval = null;

  function setText(el, value) {
    if (el && typeof value === 'string') {
      el.textContent = value;
    }
  }

  function setHeroContent(index) {
    var data = heroData[index];
    if (!data || !heroCopy || !heroVisual) {
      return;
    }

    heroCopy.classList.add('is-changing');
    heroVisual.classList.add('is-changing');

    setTimeout(function () {
      setText(heroEyebrow, data.eyebrow);
      if (heroTitle && data.titleHtml) {
        heroTitle.innerHTML = data.titleHtml;
      }
      setText(heroText, data.text);

      if (heroPrimary && data.primary) {
        setText(heroPrimary, data.primary.text);
        if (data.primary.href) {
          heroPrimary.setAttribute('href', data.primary.href);
        }
      }
      if (heroSecondary && data.secondary) {
        setText(heroSecondary, data.secondary.text);
        if (data.secondary.href) {
          heroSecondary.setAttribute('href', data.secondary.href);
        }
      }
      if (data.image) {
        heroVisual.setAttribute('src', data.image);
      }
      if (data.metric) {
        setText(heroMetricLabel, data.metric.label);
        setText(heroMetric, data.metric.value);
        setText(heroMetricText, data.metric.text);
      }

      heroCopy.classList.remove('is-changing');
      heroVisual.classList.remove('is-changing');
    }, 320);
  }

  function goToSlide(index) {
    if (!slides.length) {
      return;
    }

    slides[currentSlide].classList.remove('active');
    slides[currentSlide].classList.add('leaving');

    (function (leaving) {
      setTimeout(function () {
        leaving.classList.remove('leaving');
      }, 900);
    })(slides[currentSlide]);

    if (dots[currentSlide]) {
      dots[currentSlide].classList.remove('bg-ikaRed');
      dots[currentSlide].classList.add('bg-white/35');
    }

    currentSlide = index;

    slides[currentSlide].classList.add('active');
    if (dots[currentSlide]) {
      dots[currentSlide].classList.remove('bg-white/35');
      dots[currentSlide].classList.add('bg-ikaRed');
    }

    setHeroContent(currentSlide);
  }

  function nextSlide() {
    if (slides.length > 1) {
      goToSlide((currentSlide + 1) % slides.length);
    }
  }

  function startAutoplay() {
    // Respecte la préférence système « animations réduites ».
    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      return;
    }
    if (slides.length > 1) {
      slideInterval = setInterval(nextSlide, 5500);
    }
  }

  Array.prototype.forEach.call(dots, function (dot, idx) {
    dot.addEventListener('click', function () {
      clearInterval(slideInterval);
      goToSlide(idx);
      startAutoplay();
    });
  });

  startAutoplay();

  /* ------------------------------------------------------------------ */
  /* Onglets des produits                                                */
  /* ------------------------------------------------------------------ */
  var productTabs = document.querySelectorAll('.product-tab');
  var productSlides = document.querySelectorAll('.product-slide');

  Array.prototype.forEach.call(productTabs, function (tab) {
    tab.addEventListener('click', function () {
      var target = tab.getAttribute('data-target');

      Array.prototype.forEach.call(productTabs, function (t) {
        t.classList.remove('bg-ikaBlue', 'text-white', 'shadow-clean');
        t.classList.add('bg-ikaSoft', 'text-slate-700');
      });
      tab.classList.remove('bg-ikaSoft', 'text-slate-700');
      tab.classList.add('bg-ikaBlue', 'text-white', 'shadow-clean');

      Array.prototype.forEach.call(productSlides, function (s) {
        s.classList.remove('active');
      });

      var el = document.getElementById(target);
      if (el) {
        el.classList.add('active');
      }
    });
  });

  /* ------------------------------------------------------------------ */
  /* Révélation au défilement                                            */
  /* ------------------------------------------------------------------ */
  var reveals = document.querySelectorAll('.reveal');

  if (!('IntersectionObserver' in window)) {
    // Repli : tout est visible si l'API n'existe pas.
    Array.prototype.forEach.call(reveals, function (r) {
      r.classList.add('visible');
    });
    return;
  }

  var observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12 }
  );

  Array.prototype.forEach.call(reveals, function (r) {
    observer.observe(r);
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
