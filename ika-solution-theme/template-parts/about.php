<?php
/**
 * Template part: About / "Qui sommes-nous" (section "societe")
 */
?>
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
