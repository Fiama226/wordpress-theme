<?php
/**
 * Template part: Hero slider (section "accueil")
 * Modularised from front-page.php — keep markup in sync with front-page.php <script>.
 */
?>
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
