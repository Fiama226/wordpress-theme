<?php
/**
 * The front page template file.
 * Hero slides, expertises, product solutions and client logos are all
 * driven by editable Custom Post Types (ika_slide, ika_expertise,
 * ika_solution, ika_client) — no content is hard-coded here.
 */
get_header();

$ika_slides = get_posts( array(
    'post_type'      => 'ika_slide',
    'posts_per_page' => 10,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );
$hero_data = array();
if ( $ika_slides ) {
    foreach ( $ika_slides as $slide ) {
        $slide_title = get_the_title( $slide );
        $title_lines = preg_split( '/\R/', $slide_title );
        $title_html  = '<span class="block">' . implode( '</span> <span class="block">', array_map( 'esc_html', $title_lines ) ) . '</span>';
        $hero_data[] = array(
            'eyebrow'   => get_post_meta( $slide->ID, 'ika_slide_eyebrow', true ),
            'titleHtml' => $title_html,
            'text'      => get_post_meta( $slide->ID, 'ika_slide_text', true ),
            'primary'   => array(
                'text' => get_post_meta( $slide->ID, 'ika_slide_primary_text', true ),
                'href' => get_post_meta( $slide->ID, 'ika_slide_primary_url', true ),
            ),
            'secondary' => array(
                'text' => get_post_meta( $slide->ID, 'ika_slide_secondary_text', true ),
                'href' => get_post_meta( $slide->ID, 'ika_slide_secondary_url', true ),
            ),
            'image'     => ika_asset( get_post_meta( $slide->ID, 'ika_slide_image', true ) ),
            'metric'    => array(
                'label' => get_post_meta( $slide->ID, 'ika_slide_metric_label', true ),
                'value' => get_post_meta( $slide->ID, 'ika_slide_metric_value', true ),
                'text'  => get_post_meta( $slide->ID, 'ika_slide_metric_text', true ),
            ),
        );
    }
}
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
          <?php
          $expertises = get_posts( array(
              'post_type'      => 'ika_expertise',
              'posts_per_page' => 20,
              'orderby'        => 'menu_order',
              'order'          => 'ASC',
          ) );
          foreach ( $expertises as $i => $exp ) :
              $exp_img  = get_post_meta( $exp->ID, 'ika_expertise_image', true );
              $exp_link = get_post_meta( $exp->ID, 'ika_expertise_link', true );
              $cut      = 'expertise-cut-' . chr( ord( 'a' ) + ( $i % 8 ) );
          ?>
          <article class="expertise-card reveal rounded-3xl bg-white p-7 shadow-clean">
            <div class="expertise-visual <?php echo esc_attr( $cut ); ?>">
              <img src="<?php echo esc_url( ika_asset( $exp_img ) ); ?>" alt="<?php echo esc_attr( get_the_title( $exp ) ); ?>">
            </div>
            <h3 class="text-xl font-black text-ikaBlueDark"><?php echo esc_html( get_the_title( $exp ) ); ?></h3>
            <p class="mt-3 text-sm leading-7 text-slate-600"><?php echo wp_kses_post( wp_trim_words( $exp->post_content, 24, '…' ) ); ?></p>
            <a href="<?php echo esc_url( $exp_link ?: '#' ); ?>" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-ikaRed transition hover:translate-x-1">En savoir plus &rarr;</a>
          </article>
          <?php endforeach; ?>
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

        <?php
        $solutions = get_posts( array(
            'post_type'      => 'ika_solution',
            'posts_per_page' => 20,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ) );
        if ( $solutions ) :
        ?>
        <div class="mt-14 flex flex-wrap justify-center gap-3">
          <?php foreach ( $solutions as $i => $sol ) : ?>
            <button class="product-tab rounded-full px-7 py-3 text-sm font-black transition <?php echo $i === 0 ? 'bg-ikaBlue text-white shadow-clean' : 'bg-ikaSoft text-slate-700 hover:bg-slate-200'; ?>" data-target="<?php echo esc_attr( $sol->post_name ); ?>"><?php echo esc_html( get_the_title( $sol ) ); ?></button>
          <?php endforeach; ?>
        </div>

        <div class="mt-12 rounded-[2.5rem] bg-ikaSoft p-6 sm:p-10 lg:p-14">
          <?php foreach ( $solutions as $i => $sol ) :
            $sol_img      = ika_asset( get_post_meta( $sol->ID, 'ika_image', true ) );
            $sol_eyebrow  = get_post_meta( $sol->ID, 'ika_eyebrow', true );
            $sol_features = ika_get_list_meta( $sol->ID, 'ika_features' );
          ?>
          <div id="<?php echo esc_attr( $sol->post_name ); ?>" class="product-slide <?php echo $i === 0 ? 'active' : ''; ?> grid gap-10 lg:grid-cols-2 lg:items-center">
            <div class="reveal">
              <span class="inline-flex rounded-full bg-ikaBlue/10 px-4 py-1.5 text-xs font-black text-ikaBlue"><?php echo esc_html( $sol_eyebrow ); ?></span>
              <h3 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl"><?php echo esc_html( get_the_title( $sol ) ); ?></h3>
              <p class="mt-4 text-base leading-7 text-slate-600"><?php echo esc_html( get_the_excerpt( $sol ) ); ?></p>
              <ul class="mt-6 grid gap-3 text-sm font-semibold text-slate-700">
                <?php foreach ( $sol_features as $feature ) : ?>
                  <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> <?php echo esc_html( $feature ); ?></li>
                <?php endforeach; ?>
              </ul>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="<?php echo esc_url( get_permalink( $sol ) ); ?>" class="rounded-full bg-ikaBlue px-7 py-4 text-sm font-bold text-white transition hover:bg-ikaBlueDark">Découvrir <?php echo esc_html( get_the_title( $sol ) ); ?></a>
              </div>
            </div>
            <div class="reveal relative">
              <img class="h-80 w-full object-cover rounded-[1.5rem] shadow-premium lg:h-[520px]" src="<?php echo esc_url( $sol_img ); ?>" alt="<?php echo esc_attr( get_the_title( $sol ) ); ?>">
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
    </section>

    <!-- Client Marquee & References Section -->
    <section class="bg-ikaSoft py-16 overflow-hidden">
      <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
        <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-500">Ils nous font confiance</p>
        <div class="mt-10 overflow-hidden relative">
          <div class="animate-marquee flex gap-12 items-center">
            <?php
            $clients = get_posts( array(
                'post_type'      => 'ika_client',
                'posts_per_page' => 20,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ) );
            if ( $clients ) :
              foreach ( $clients as $c ) :
                $logo = ika_asset( get_post_meta( $c->ID, 'ika_client_image', true ) );
            ?>
            <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_the_title( $c ) ); ?>"></div>
            <?php endforeach; ?>
            <div class="flex items-center gap-12 shrink-0" aria-hidden="true">
              <?php foreach ( $clients as $c ) :
                $logo = ika_asset( get_post_meta( $c->ID, 'ika_client_image', true ) );
              ?>
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_the_title( $c ) ); ?>"></div>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

  </main>

  <script>
    // Hero Slider & Animations Script
    const heroContentData = <?php echo wp_json_encode( $hero_data ); ?>;
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

    let currentSlide = 0;
    let slideInterval = setInterval(nextSlide, 5500);

    function setHeroContent(index) {
      const data = heroContentData[index];
      if (!data || !heroCopy || !heroVisual) return;
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
        const el = document.getElementById(target);
        if (el) el.classList.add('active');
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
