<?php
/**
 * Template for a single IKA Expertise page.
 * All content is driven by the ika_expertise CPT + its meta fields,
 * editable from the WordPress admin without touching code.
 */
get_header();

if ( ! function_exists( 'ika_h' ) ) {
    function ika_h( $value ) {
        return htmlspecialchars( (string) $value, ENT_QUOTES, 'UTF-8' );
    }
}

$post_id      = get_the_ID();
$title        = get_the_title();
$eyebrow      = get_post_meta( $post_id, 'ika_expertise_eyebrow', true );
$image        = get_post_meta( $post_id, 'ika_expertise_image', true );
$intro        = get_the_excerpt();
$description  = has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 40 );
$full_desc    = get_the_content();
$highlights   = ika_get_list_meta( $post_id, 'ika_expertise_highlights' );
$capabilities = ika_get_list_meta( $post_id, 'ika_expertise_capabilities' );
$process      = ika_get_list_meta( $post_id, 'ika_expertise_process' );
$deliverables = ika_get_list_meta( $post_id, 'ika_expertise_deliverables' );
?>

<main class="bg-white pt-32">
  <!-- Hero Section -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-25" src="<?php echo esc_url( ika_asset( $image ) ); ?>" alt="<?php echo ika_h( $title ); ?>">
      <div class="absolute inset-0 bg-ikaBlueDark/80"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo esc_url( home_url( '/#expertises' ) ); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>Retour aux expertises</a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo ika_h( $eyebrow ); ?></p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl"><?php echo ika_h( $title ); ?></h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85"><?php echo ika_h( $intro ); ?></p>
        <?php if ( $highlights ) : ?>
        <div class="mt-8 flex flex-wrap gap-3">
          <?php foreach ( $highlights as $highlight ) : ?>
            <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue"><?php echo ika_h( $highlight ); ?></span>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( $image ) ); ?>" alt="<?php echo ika_h( $title ); ?>">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed">IKA SOLUTION</p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark">Expertise dédiée</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Description Section -->
  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.85fr_1.15fr] lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Notre intervention</p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Une prestation structurée pour un résultat exploitable.</h2>
      </div>
      <div class="text-base leading-8 text-slate-600"><?php echo wp_kses_post( $full_desc ); ?></div>
    </div>
  </section>

  <!-- Capabilities Section -->
  <?php if ( $capabilities ) : ?>
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr]">
        <div>
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Ce que nous mettons en place</p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Des actions concrètes, documentées et suivies.</h2>
          <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Demander un devis</a>
        </div>
        <div class="grid gap-5 sm:grid-cols-2">
          <?php foreach ( $capabilities as $index => $capability ) : ?>
            <article class="rounded-2xl bg-white p-6 shadow-clean">
              <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-ikaBlue text-sm font-black text-white"><?php echo str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ); ?></span>
              <p class="mt-5 text-sm leading-7 text-slate-600"><?php echo ika_h( $capability ); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- Process & Deliverables Section -->
  <?php if ( $process || $deliverables ) : ?>
  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-2 lg:items-start">
        <?php if ( $process ) : ?>
        <div>
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Méthode</p>
          <h2 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl">Un déroulement clair du cadrage au suivi.</h2>
          <div class="mt-8 grid gap-4">
            <?php foreach ( $process as $index => $step ) : ?>
              <div class="flex gap-4 rounded-2xl border border-slate-100 bg-white p-5 shadow-clean">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-ikaRed text-sm font-black text-white"><?php echo $index + 1; ?></span>
                <div>
                  <h3 class="text-lg font-black text-ikaBlue"><?php echo ika_h( $step ); ?></h3>
                  <p class="mt-2 text-sm leading-7 text-slate-600">Chaque étape est validée avec vos équipes afin de garder une trajectoire réaliste, mesurable et adaptée à vos priorités.</p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

        <?php if ( $deliverables ) : ?>
        <div class="rounded-[2rem] bg-ikaBlueDark p-7 text-white shadow-premium sm:p-10">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Livrables</p>
          <h2 class="mt-4 text-3xl font-black">Ce que vous obtenez.</h2>
          <div class="mt-8 grid gap-4">
            <?php foreach ( $deliverables as $deliverable ) : ?>
              <div class="rounded-2xl border border-white/15 bg-white/10 p-5">
                <p class="font-black"><?php echo ika_h( $deliverable ); ?></p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- CTA Section -->
  <section class="bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-[1fr_auto] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Lancer un projet</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">Parlons de votre besoin et du niveau d'accompagnement nécessaire.</h2>
      </div>
      <?php if ( function_exists( 'wpcf7_contact_form' ) ) : ?>
        <?php echo do_shortcode( '[contact-form-7 id="ika-expertise" title="Contact Expertise"]' ); ?>
      <?php else : ?>
        <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="inline-flex justify-center rounded-full bg-ikaRed px-8 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Contacter IKA SOLUTION</a>
      <?php endif; ?>
    </div>
  </section>

  <!-- Related Expertises -->
  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Autres expertises</p>
          <h2 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl">Explorer nos domaines complémentaires.</h2>
        </div>
        <a href="<?php echo esc_url( home_url( '/#expertises' ) ); ?>" class="inline-flex rounded-full border border-slate-200 px-6 py-3 text-sm font-black text-ikaBlue transition hover:border-ikaBlue">Toutes les expertises</a>
      </div>
      <div class="mt-10 grid gap-6 md:grid-cols-3">
        <?php
        $others = get_posts( array(
            'post_type'      => 'ika_expertise',
            'posts_per_page' => 3,
            'post__not_in'   => array( get_the_ID() ),
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ) );
        foreach ( $others as $item ) :
            $other_img = get_post_meta( $item->ID, 'ika_expertise_image', true );
        ?>
          <a href="<?php echo esc_url( get_permalink( $item ) ); ?>" class="group overflow-hidden rounded-2xl bg-ikaSoft shadow-clean transition hover:-translate-y-1 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25">
            <img class="h-44 w-full object-cover transition duration-500 group-hover:scale-105" src="<?php echo esc_url( ika_asset( $other_img ) ); ?>" alt="<?php echo ika_h( get_the_title( $item ) ); ?>">
            <div class="p-6">
              <h3 class="text-lg font-black text-ikaBlueDark transition group-hover:text-ikaRed"><?php echo ika_h( get_the_title( $item ) ); ?></h3>
              <p class="mt-3 text-sm leading-7 text-slate-600"><?php echo ika_h( get_the_excerpt( $item ) ); ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
