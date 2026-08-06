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
 * Pagination instantanée des grilles (Réalisations et Actualités).
 *
 * - Nombre d'éléments par page lu dans l'attribut data-per-page de la grille
 *   (réglable dans Apparence > Personnaliser > Contenu IKA Solution >
 *   Pagination ; 0 = tout afficher).
 * - 100 % côté navigateur : aucun rechargement, les filtres de la page
 *   Réalisations restent actifs sur l'ensemble des projets (la pagination
 *   suit le filtre courant et revient en page 1).
 * - Sans JavaScript, toutes les cartes restent affichées (dégradation douce).
 */
(function () {
  'use strict';

  function ikaPageBtn(label, opts) {
    opts = opts || {};
    var btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'ika-page-btn' + (opts.current ? ' is-current' : '');
    btn.textContent = label;
    if (opts.ariaLabel) {
      btn.setAttribute('aria-label', opts.ariaLabel);
    }
    if (opts.current) {
      btn.setAttribute('aria-current', 'page');
    }
    if (opts.disabled) {
      btn.disabled = true;
    }
    return btn;
  }

  function ikaSetupGrid(grid) {
    var perPage = parseInt(grid.getAttribute('data-per-page'), 10);
    if (isNaN(perPage) || perPage < 0) {
      perPage = 0;
    }
    var slot = document.querySelector('[data-pagination-for="' + grid.id + '"]');
    var items = Array.prototype.slice.call(grid.children);
    var state = { page: 1, filter: 'all' };

    function visibleItems() {
      if (state.filter === 'all') {
        return items;
      }
      return items.filter(function (item) {
        return item.getAttribute('data-type') === state.filter;
      });
    }

    function apply(scroll) {
      var shown = visibleItems();
      var effectivePerPage = perPage > 0 ? perPage : shown.length || 1;
      var pages = Math.max(1, Math.ceil(shown.length / effectivePerPage));
      if (state.page > pages) {
        state.page = pages;
      }

      items.forEach(function (item) {
        item.style.display = 'none';
      });
      shown
        .slice((state.page - 1) * effectivePerPage, state.page * effectivePerPage)
        .forEach(function (item) {
          item.style.display = '';
        });

      renderNav(pages);

      if (scroll) {
        var top = grid.getBoundingClientRect().top + window.pageYOffset - 140;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    }

    function renderNav(pages) {
      if (!slot) {
        return;
      }
      slot.innerHTML = '';
      if (pages <= 1) {
        slot.hidden = true;
        return;
      }
      slot.hidden = false;

      var prev = ikaPageBtn('‹', { ariaLabel: 'Page précédente', disabled: state.page === 1 });
      prev.addEventListener('click', function () {
        state.page = Math.max(1, state.page - 1);
        apply(true);
      });
      slot.appendChild(prev);

      for (var p = 1; p <= pages; p++) {
        (function (pageNumber) {
          var btn = ikaPageBtn(String(pageNumber), {
            current: pageNumber === state.page,
            ariaLabel: 'Page ' + pageNumber,
          });
          btn.addEventListener('click', function () {
            state.page = pageNumber;
            apply(true);
          });
          slot.appendChild(btn);
        })(p);
      }

      var next = ikaPageBtn('›', { ariaLabel: 'Page suivante', disabled: state.page === pages });
      next.addEventListener('click', function () {
        state.page = Math.min(pages, state.page + 1);
        apply(true);
      });
      slot.appendChild(next);
    }

    // Filtres de la page Réalisations : re-filtre la grille sans recharger.
    var filterBarId = grid.getAttribute('data-filter-bar');
    if (filterBarId) {
      var bar = document.getElementById(filterBarId);
      if (bar) {
        var btns = bar.querySelectorAll('.filter-btn');
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

            state.filter = btn.getAttribute('data-filter') || 'all';
            state.page = 1;
            apply(false);
          });
        });
      }
    }

    apply(false);
  }

  Array.prototype.forEach.call(document.querySelectorAll('[data-per-page]'), function (grid) {
    if (grid.id) {
      ikaSetupGrid(grid);
    }
  });
})();

/**
 * Onglets accessibles de la page Proxmox et des pages partenaires (Odoo,
 * Fortinet, Palo Alto, Microsoft). Boutons .pmx-tab (attribut
 * data-pmx-target = id du panneau) → .pmx-panel.
 *
 * Implémentation robuste par DÉLÉGATION d'événement sur `document` :
 * - fonctionne quel que soit l'ordre de chargement / le cache du script ;
 * - fonctionne aussi si les onglets sont (re)rendus après ce script ;
 * - un clic sur un élément imbriqué (icône, libellé) dans le bouton est pris
 *   en compte ;
 * - l'initialisation est différée jusqu'à ce que le DOM soit prêt et réactive
 *   le premier onglet (ou celui déjà marqué aria-selected="true").
 */
(function () {
  'use strict';

  function ikaPmxItems(group) {
    return {
      tabs: Array.prototype.slice.call(group.querySelectorAll('.pmx-tab')),
      panels: Array.prototype.slice.call(group.querySelectorAll('.pmx-panel')),
    };
  }

  function ikaPmxActivate(group, targetId) {
    var items = ikaPmxItems(group);
    if (!targetId || !items.tabs.length || !items.panels.length) {
      return;
    }
    Array.prototype.forEach.call(items.tabs, function (tab) {
      var isActive = tab.getAttribute('data-pmx-target') === targetId;
      tab.classList.toggle('bg-ikaBlue', isActive);
      tab.classList.toggle('text-white', isActive);
      tab.classList.toggle('border-ikaBlue', isActive);
      tab.classList.toggle('border', !isActive);
      tab.classList.toggle('border-slate-200', !isActive);
      tab.classList.toggle('bg-white', !isActive);
      tab.classList.toggle('text-ikaBlue', !isActive);
      tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
      tab.setAttribute('tabindex', isActive ? '0' : '-1');
    });
    Array.prototype.forEach.call(items.panels, function (panel) {
      panel.hidden = panel.id !== targetId;
    });
  }

  function ikaPmxInit() {
    Array.prototype.forEach.call(document.querySelectorAll('[data-pmx-tabs]'), function (group) {
      var items = ikaPmxItems(group);
      if (!items.tabs.length) {
        return;
      }
      var active = items.tabs[0];
      Array.prototype.some.call(items.tabs, function (tab) {
        if (tab.getAttribute('aria-selected') === 'true') {
          active = tab;
          return true;
        }
        return false;
      });
      ikaPmxActivate(group, active.getAttribute('data-pmx-target'));
    });
  }

  // Délégation : aucun attachement direct, insensible à l'ordre de rendu.
  document.addEventListener('click', function (event) {
    var target = event.target;
    if (!target || typeof target.closest !== 'function') {
      return;
    }
    var tab = target.closest('.pmx-tab');
    if (!tab) {
      return;
    }
    var group = tab.closest('[data-pmx-tabs]');
    var targetId = tab.getAttribute('data-pmx-target');
    if (group && targetId) {
      ikaPmxActivate(group, targetId);
    }
  });

  // Initialisation idempotente : exécutée immédiatement si le DOM est déjà
  // prêt, et de nouveau à DOMContentLoaded pour couvrir tous les cas
  // (re-réactiver le même onglet est sans effet).
  ikaPmxInit();
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ikaPmxInit);
  }
})();
