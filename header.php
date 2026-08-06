<?php
  $pageTitle = $pageTitle ?? 'IKA SOLUTION LTD - La solution qui vous convient';
  $pageDescription = $pageDescription ?? 'IKA SOLUTION LTD est un partenaire digital specialise en conseil, ingenierie, reseaux, logiciels metier, licences, cloud et securite.';
  $sectionBase = (basename($_SERVER['SCRIPT_NAME'] ?? 'index.php') === 'index.php') ? '' : 'index.php';
  $currentPage = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
  function navActive($page, $current, $mobile = false) {
    if ($page !== $current) return '';
    return $mobile ? 'bg-ikaSoft/80 font-black text-ikaBlue' : 'text-ikaBlue underline decoration-2 underline-offset-4 decoration-ikaBlue';
  }
?>
<!doctype html>
<html lang="fr" class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
  <link rel="icon" type="image/jpeg" href="assets/images/logo.png">
  <link rel="shortcut icon" type="image/jpeg" href="assets/images/logo.png">
  <link rel="apple-touch-icon" href="assets/images/logo.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            ikaBlue: '#1270b8',
            ikaBlueDark: '#0d4a7e',
            ikaRed: '#e51a37',
            ikaInk: '#111827',
            ikaSoft: '#f4f7fb'
          },
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif', 'system-ui', 'Segoe UI', 'Arial']
          },
          boxShadow: {
            premium: '0 24px 70px rgba(4, 31, 77, 0.14)',
            clean: '0 12px 40px rgba(17, 24, 39, 0.10)'
          },
          animation: {
            float: 'float 7s ease-in-out infinite',
            reveal: 'reveal .8s ease forwards',
            marquee: 'marquee 26s linear infinite'
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-16px)' }
            },
            reveal: {
              '0%': { opacity: '0', transform: 'translateY(24px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' }
            },
            marquee: {
              '0%': { transform: 'translateX(0)' },
              '100%': { transform: 'translateX(-50%)' }
            }
          }
        }
      }
    };
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    body { font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
    .slide {
      opacity: 0;
      overflow: hidden;
      pointer-events: none;
      background-position: center;
      transform: scale(1.08) rotate(.6deg);
      filter: saturate(.75) blur(6px);
      transition: opacity .9s ease, transform 1.35s cubic-bezier(.2,.85,.18,1), clip-path 1.25s cubic-bezier(.2,.85,.18,1), background-position 1.45s cubic-bezier(.2,.85,.18,1), filter .9s ease;
      will-change: opacity, transform, clip-path, background-position, filter;
    }
    .slide.active {
      opacity: 1;
      pointer-events: auto;
      transform: scale(1) rotate(0);
      filter: saturate(1) blur(0);
    }
    .slide.leaving { opacity: 0; filter: saturate(.65) blur(10px); }
    .slide.effect-orbit { clip-path: circle(0% at 8% 88%); transform-origin: 8% 88%; }
    .slide.effect-orbit.active { clip-path: circle(145% at 8% 88%); }
    .slide.effect-orbit.leaving { clip-path: circle(0% at 86% 14%); transform: scale(1.14) rotate(-3deg); }
    .slide.effect-decompose { clip-path: inset(0); transform: scale(1.12); }
    .slide.effect-decompose::before,
    .slide.effect-decompose::after {
      content: "";
      position: absolute;
      inset: 0;
      background: inherit;
      background-size: cover;
      background-position: center;
      opacity: 0;
      pointer-events: none;
    }
    .slide.effect-decompose.active { transform: scale(1); animation: decompose-base 1.05s cubic-bezier(.2,.85,.18,1) both; }
    .slide.effect-decompose.active::before { opacity: 1; clip-path: inset(0 0 64% 0); animation: decompose-top 1.05s cubic-bezier(.2,.85,.18,1) both; }
    .slide.effect-decompose.active::after { opacity: 1; clip-path: inset(64% 0 0 0); animation: decompose-bottom 1.05s cubic-bezier(.2,.85,.18,1) both; }
    .slide.effect-decompose.leaving { clip-path: polygon(0 0, 100% 7%, 91% 100%, 9% 93%); transform: scale(1.12); }
    .slide.effect-parallax { clip-path: inset(0); background-position: 28% center; transform: translateX(8%) scale(1.18); transform-origin: center; }
    .slide.effect-parallax.active { background-position: 64% center; transform: translateX(0) scale(1); }
    .slide.effect-parallax.leaving { background-position: 86% center; transform: translateX(-8%) scale(1.12); }
    .slide.effect-hosting { clip-path: inset(0 50% 0 50%); transform: scale(1.1); transform-origin: center; }
    .slide.effect-hosting.active { clip-path: inset(0); transform: scale(1); }
    .slide.effect-hosting.leaving { clip-path: inset(0 0 0 100%); transform: scale(1.12); }
    @keyframes decompose-base {
      0% { opacity: .2; transform: scale(1.16) translateY(22px); filter: blur(12px) saturate(.55); }
      55% { opacity: .85; transform: scale(1.04) translateY(0); }
      100% { opacity: 1; transform: scale(1); filter: blur(0) saturate(1); }
    }
    @keyframes decompose-top {
      0% { transform: translate(-9%, -22%) scale(1.08); opacity: .2; }
      100% { transform: translate(0, 0) scale(1); opacity: 0; }
    }
    @keyframes decompose-bottom {
      0% { transform: translate(9%, 20%) scale(1.08); opacity: .22; }
      100% { transform: translate(0, 0) scale(1); opacity: 0; }
    }
    #heroCopyPanel { transition: opacity .42s ease, transform .55s cubic-bezier(.2,.85,.18,1), filter .42s ease; }
    #heroCopyPanel.is-changing { opacity: 0; transform: translateY(22px) rotateX(10deg); filter: blur(8px); }
    #heroVisualImage { transform-origin: 70% 30%; }
    #heroVisualImage.is-changing { opacity: .2; transform: scale(.94) rotate(-2deg); filter: blur(8px) saturate(.7); }
    #accueil.hero-intro #heroEyebrow,
    #accueil.hero-intro #heroText,
    #accueil.hero-intro #heroPrimary,
    #accueil.hero-intro #heroSecondary,
    #accueil.hero-intro .hero-dot,
    #accueil.hero-intro #heroMetricLabel,
    #accueil.hero-intro #heroMetric,
    #accueil.hero-intro #heroMetricText {
      opacity: 0;
      transform: translateY(18px);
      animation: heroIntroRise .8s cubic-bezier(.2,.85,.18,1) forwards;
    }
    #accueil.hero-intro #heroText { animation-delay: 1.35s; }
    #accueil.hero-intro #heroPrimary { animation-delay: 1.62s; }
    #accueil.hero-intro #heroSecondary { animation-delay: 1.74s; }
    #accueil.hero-intro .hero-dot { animation-delay: 1.96s; }
    #accueil.hero-intro #heroMetricLabel { animation-delay: 1.22s; }
    #accueil.hero-intro #heroMetric { animation-delay: 1.38s; }
    #accueil.hero-intro #heroMetricText { animation-delay: 1.54s; }
    #accueil.hero-intro #heroVisualImage {
      animation: heroIntroImage 1.25s cubic-bezier(.2,.85,.18,1) .35s both;
    }
    #accueil.hero-intro #heroTitle .hero-word {
      display: inline-block;
      white-space: nowrap;
    }
    #accueil.hero-intro #heroTitle .hero-char {
      display: inline-block;
      opacity: 0;
      transform: translateY(34px) rotateX(70deg) scale(.82);
      filter: blur(8px);
      transform-origin: 50% 100%;
      animation: heroCharIn .68s cubic-bezier(.2,.85,.18,1) forwards;
    }
    @keyframes heroCharIn {
      0% { opacity: 0; transform: translateY(34px) rotateX(70deg) scale(.82); filter: blur(8px); }
      70% { opacity: 1; transform: translateY(-4px) rotateX(0) scale(1.04); filter: blur(0); }
      100% { opacity: 1; transform: translateY(0) rotateX(0) scale(1); filter: blur(0); }
    }
    @keyframes heroIntroRise {
      0% { opacity: 0; transform: translateY(18px); filter: blur(6px); }
      100% { opacity: 1; transform: translateY(0); filter: blur(0); }
    }
    @keyframes heroIntroImage {
      0% { opacity: 0; transform: translateY(34px) scale(.88) rotate(-3deg); filter: blur(14px) saturate(.72); }
      65% { opacity: 1; transform: translateY(-6px) scale(1.03) rotate(.8deg); filter: blur(0) saturate(1.05); }
      100% { opacity: 1; transform: translateY(0) scale(1) rotate(0); filter: blur(0) saturate(1); }
    }
    .expertise-card {
      isolation: isolate;
      overflow: hidden;
    }
    .expertise-card::before {
      content: "";
      position: absolute;
      inset: auto -24px -42px auto;
      height: 96px;
      width: 96px;
      border-radius: 999px;
      background: rgba(229, 26, 55, .1);
      z-index: -1;
    }
    .expertise-visual {
      position: relative;
      height: 12rem;
      margin: -1.75rem -1.75rem 1.5rem;
      overflow: hidden;
      background: #0d4a7e;
    }
    .expertise-visual img {
      height: 100%;
      width: 100%;
      object-fit: cover;
      transform: scale(1.06);
      transition: transform .7s cubic-bezier(.2,.85,.18,1), filter .7s ease;
    }
    .expertise-card:hover .expertise-visual img {
      transform: scale(1.16) rotate(1.5deg);
      filter: saturate(1.12) contrast(1.04);
    }
    .expertise-visual::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(18,112,184,.2), rgba(229,26,55,.32));
      mix-blend-mode: multiply;
    }
    .expertise-cut-a { clip-path: polygon(0 0, 100% 0, 88% 78%, 16% 100%, 0 72%); }
    .expertise-cut-b { clip-path: ellipse(88% 72% at 68% 24%); }
    .expertise-cut-c { clip-path: polygon(12% 0, 100% 0, 100% 82%, 72% 100%, 0 74%, 0 16%); }
    .expertise-cut-d { clip-path: polygon(0 18%, 22% 0, 100% 0, 92% 100%, 0 84%); }
    .expertise-cut-e { clip-path: circle(76% at 24% 42%); }
    .expertise-cut-f { clip-path: polygon(0 0, 78% 0, 100% 34%, 82% 100%, 8% 92%); }
    .expertise-cut-g { clip-path: polygon(0 0, 100% 14%, 100% 100%, 28% 88%, 0 100%); }
    .expertise-cut-h { clip-path: polygon(16% 0, 100% 0, 100% 70%, 58% 100%, 0 78%, 0 20%); }
    @media (prefers-reduced-motion: reduce) {
      .slide, #heroCopyPanel, #heroVisualImage { transition: none; }
      .slide, .slide.active, .slide.leaving { clip-path: none; transform: none; filter: none; }
      .slide.effect-decompose.active { animation: none; }
      .slide.effect-decompose::before, .slide.effect-decompose::after { display: none; }
    }
    .product-slide { display: none; }
    .product-slide.active { display: grid; }
    .reveal {
      opacity: 0;
      transform: translateY(24px);
      transition: opacity .76s ease, transform .82s cubic-bezier(.2,.85,.18,1), filter .76s ease;
      will-change: opacity, transform, filter;
    }
    .reveal.reveal-left { transform: translateX(-42px); }
    .reveal.reveal-right { transform: translateX(42px); }
    .reveal.reveal-up { transform: translateY(34px); }
    .reveal.reveal-down { transform: translateY(-30px); }
    .reveal.reveal-zoom { transform: scale(.94); filter: blur(8px); }
    .reveal.reveal-tilt { transform: translateY(30px) rotate(-1.4deg); }
    .reveal.visible {
      opacity: 1;
      transform: translate(0, 0) scale(1) rotate(0);
      filter: blur(0);
    }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    /* Onglets (pages partenaires & Proxmox) : l'attribut `hidden` doit
       primer sur `display:grid` (le .grid de Tailwind l'écraserait sinon,
       ce qui afficherait tous les panneaux à la fois et rendrait le filtre
       par onglets inopérant). Spécificité supérieure au .grid. */
    .pmx-panel[hidden] { display: none !important; }
    main > section {
      position: relative;
      transition: background-color .45s ease, box-shadow .45s ease, filter .45s ease;
    }
    main > section:hover {
      box-shadow: inset 0 1px 0 rgba(255,255,255,.18), inset 0 -1px 0 rgba(18,112,184,.08);
    }
    main article,
    main a.rounded-2xl,
    main .rounded-\[2rem\] {
      transition-property: transform, box-shadow, border-color, background-color, filter;
      transition-duration: .45s;
      transition-timing-function: cubic-bezier(.2,.85,.18,1);
    }
    main article:hover,
    main a.rounded-2xl:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 54px rgba(4, 31, 77, 0.13);
    }
    main section img:not(#heroVisualImage) {
      transition: transform .72s cubic-bezier(.2,.85,.18,1), filter .72s ease;
    }
    main article:hover > img,
    main a:hover img,
    main .rounded-\[2rem\]:hover > img {
      transform: scale(1.06);
      filter: saturate(1.08) contrast(1.04);
    }
    @keyframes whatsappPulse {
      0%, 100% { transform: scale(1); box-shadow: 0 18px 44px rgba(18,112,184,.18); }
      50% { transform: scale(1.045); box-shadow: 0 22px 58px rgba(37,211,102,.26); }
    }
    @keyframes whatsappMessage {
      0%, 27% { opacity: 1; transform: translateY(0); }
      33%, 100% { opacity: 0; transform: translateY(-10px); }
    }
    .whatsapp-widget { animation: whatsappPulse 3.4s ease-in-out infinite; }
    .whatsapp-message span { animation: whatsappMessage 9s ease-in-out infinite; }
    .whatsapp-message span:nth-child(2) { animation-delay: 3s; }
    .whatsapp-message span:nth-child(3) { animation-delay: 6s; }
    .about-image-card img,
    .about-stat-card {
      transition: transform .55s cubic-bezier(.2,.85,.18,1), box-shadow .55s ease, filter .55s ease;
    }
    .about-image-card:hover img {
      transform: translateY(-10px) scale(1.035);
      filter: saturate(1.08) contrast(1.04);
    }
    .about-showcase:has(.about-image-card:hover) .about-stat-card {
      transform: translateY(-18px);
      box-shadow: 0 18px 44px rgba(4, 31, 77, 0.14);
    }
    .about-showcase:has(.about-image-card:hover) .about-stat-card:nth-child(2) {
      transition-delay: .05s;
    }
    .about-showcase:has(.about-image-card:hover) .about-stat-card:nth-child(3) {
      transition-delay: .1s;
    }
    @supports not selector(:has(*)) {
      .about-stat-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 18px 44px rgba(4, 31, 77, 0.14);
      }
    }
    @media (prefers-reduced-motion: reduce) {
      .reveal,
      main > section,
      main article,
      main a.rounded-2xl,
      main section img,
      .whatsapp-widget,
      .whatsapp-message span {
        animation: none;
        transition: none;
        transform: none;
        filter: none;
      }
    }
  </style>
</head>
<body class="bg-white text-ikaInk antialiased">
  <header id="top" class="fixed inset-x-0 top-0 z-50 border-b border-slate-100 bg-white shadow-[0_10px_35px_rgba(4,31,77,0.08)] backdrop-blur">
    <div class="bg-ikaBlueDark text-white">
      <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-2 text-xs font-semibold sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <span class="inline-flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-ikaRed"></span>Avenue de la Dignité, Ouagadougou, Burkina Faso</span>
        <div class="flex flex-wrap gap-x-5 gap-y-2">
          <a class="hover:text-red-200 transition" href="tel:+22672089090">+226 72 08 90 90</a>
          <a class="hover:text-red-200 transition" href="tel:+22625655954">+226 25 65 59 54</a>
          <a class="hover:text-red-200 transition" href="mailto:infos@ikasolution.com">infos@ikasolution.com</a>
        </div>
      </div>
    </div>
    <nav class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
      <a href="index.php#top" class="flex items-center gap-3" aria-label="IKA SOLUTION">
        <img class="h-20 w-auto" src="assets/images/logo.png" alt="IKA SOLUTION">
      </a>
      <div class="hidden items-center gap-6 text-sm font-bold text-slate-700 xl:flex">
        <a class="transition hover:text-ikaBlue <?= navActive('index.php', $currentPage) ?>" href="index.php#top">Accueil</a>
        <a class="transition hover:text-ikaBlue <?= navActive('presentation.php', $currentPage) ?>" href="presentation.php">Société</a>
        <a class="transition hover:text-ikaBlue <?= navActive('equipe.php', $currentPage) ?>" href="equipe.php">Équipe</a>
        <a class="transition hover:text-ikaBlue" href="index.php#expertises">Expertise</a>
        <a class="transition hover:text-ikaBlue <?= navActive('realisations.php', $currentPage) ?>" href="realisations.php">Réalisations</a>
        <a class="transition hover:text-ikaBlue" href="index.php#produits">Solutions</a>
        <a class="transition hover:text-ikaBlue <?= navActive('actualites.php', $currentPage) ?>" href="actualites.php">Actualités</a>
        <a class="rounded-full bg-ikaRed px-5 py-3 text-white shadow-clean transition hover:bg-red-700" href="index.php#contact">Demander un devis</a>
        <a class="transition hover:text-ikaBlue" href="index.php#contact">Contact</a>
      </div>
      <div class="hidden items-center gap-3 md:flex xl:hidden">
        <a href="index.php#contact" class="rounded-full border border-slate-200 px-4 py-3 text-sm font-semibold text-ikaBlue transition hover:border-ikaBlue">Devis</a>
        <a href="tel:+22625330000" class="rounded-full bg-ikaRed px-5 py-3 text-sm font-bold text-white shadow-clean transition hover:bg-red-700">Appeler</a>
      </div>
      <button id="menuButton" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 text-ikaBlue xl:hidden" aria-label="Menu" aria-expanded="false">
        <span class="h-0.5 w-5 bg-current before:relative before:-top-1.5 before:block before:h-0.5 before:w-5 before:bg-current after:relative after:top-1 after:block after:h-0.5 after:w-5 after:bg-current"></span>
      </button>
    </nav>
    <div id="mobileMenu" class="hidden border-t border-slate-100 bg-white px-4 py-4 xl:hidden">
      <div class="mx-auto grid max-w-7xl gap-2 text-sm font-semibold text-slate-700">
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft <?= navActive('index.php', $currentPage, true) ?>" href="index.php#top">Accueil</a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft <?= navActive('presentation.php', $currentPage, true) ?>" href="presentation.php">Société</a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft <?= navActive('equipe.php', $currentPage, true) ?>" href="equipe.php">Équipe</a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft" href="index.php#expertises">Expertise</a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft <?= navActive('realisations.php', $currentPage, true) ?>" href="realisations.php">Réalisations</a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft" href="index.php#produits">Solutions</a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft <?= navActive('actualites.php', $currentPage, true) ?>" href="actualites.php">Actualités</a>
        <a class="rounded-xl px-3 py-3 text-ikaRed hover:bg-ikaSoft" href="index.php#contact">Demander un devis</a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft" href="index.php#contact">Contact</a>
        <div class="mt-2 rounded-2xl bg-ikaSoft p-4 text-slate-700">
          <p class="font-black text-ikaBlue">Ouagadougou, Burkina Faso</p>
          <a class="mt-2 block" href="tel:+22625330000">+226 25 33 00 00</a>
          <a class="mt-1 block break-all" href="mailto:contact@ikasolution.bf">contact@ikasolution.bf</a>
        </div>
      </div>
    </div>
  </header>
