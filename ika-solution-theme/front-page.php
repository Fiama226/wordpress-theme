<?php
/**
 * The front page template file.
 * Uses modular template-parts for each section:
 *   - hero, about, pourquoi, expertises, solutions, clients
 * All dynamic content is driven by CPTs (ika_slide, ika_expertise,
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
    <?php get_template_part( 'template-parts/pourquoi' ); ?>
    <?php get_template_part( 'template-parts/expertises' ); ?>
    <?php get_template_part( 'template-parts/solutions' ); ?>
    <?php get_template_part( 'template-parts/clients' ); ?>
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
