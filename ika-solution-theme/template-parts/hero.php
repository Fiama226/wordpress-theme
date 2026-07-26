<?php
/**
 * Template part: Hero slider (section "accueil")
 * Slides are driven by the ika_slide CPT (editable from the WordPress admin).
 */
$ika_slides = get_posts( array(
    'post_type'      => 'ika_slide',
    'posts_per_page' => 10,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );

// Contenu initial rendu côté serveur : visible sans JavaScript et indexable.
$ika_first = $ika_slides ? $ika_slides[0] : null;
$ika_m     = static function ( $key, $fallback = '' ) use ( $ika_first ) {
    if ( ! $ika_first ) {
        return $fallback;
    }
    $value = get_post_meta( $ika_first->ID, $key, true );
    return '' !== $value ? $value : $fallback;
};
$ika_title_html = '<span class="block">Votre transformation digitale</span> <span class="block">commence ici !</span>';
if ( $ika_first ) {
    $ika_lines      = preg_split( '/\R/', (string) get_the_title( $ika_first ) );
    $ika_title_html = '<span class="block">' . implode( '</span> <span class="block">', array_map( 'esc_html', $ika_lines ) ) . '</span>';
}
?>
    <section id="accueil" class="relative min-h-[96svh] overflow-hidden pt-32 text-white">
      <div class="absolute inset-0">
        <?php foreach ( $ika_slides as $i => $slide ) :
            $img = ika_asset( get_post_meta( $slide->ID, 'ika_slide_image', true ) );
            $cls = $i === 0 ? 'slide active effect-orbit' : 'slide effect-decompose';
        ?>
        <div class="<?php echo esc_attr( $cls ); ?> absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo esc_url( $img ); ?>')"></div>
        <?php endforeach; ?>
        <div class="absolute inset-0 bg-ikaBlueDark/90"></div>
      </div>

      <div class="relative mx-auto grid min-h-[calc(96svh-128px)] max-w-7xl items-center gap-10 px-4 py-12 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:px-8">
        <div id="heroCopyPanel" class="max-w-3xl transition duration-500">
          <div class="mb-6 inline-flex items-center gap-3 rounded-full border border-white/25 bg-white/10 px-4 py-2 text-sm font-semibold backdrop-blur">
            <span class="h-2.5 w-2.5 rounded-full bg-ikaRed"></span>
            <span id="heroEyebrow"><?php echo esc_html( $ika_m( 'ika_slide_eyebrow', 'La solution qui vous convient | Depuis 2014' ) ); ?></span>
          </div>
          <h1 id="heroTitle" class="text-3xl font-black leading-[1.05] tracking-normal sm:text-4xl lg:text-6xl"><?php echo wp_kses_post( $ika_title_html ); ?></h1>
          <p id="heroText" class="mt-6 max-w-2xl text-lg leading-8 text-white/90 sm:text-xl">
            <?php echo esc_html( $ika_m( 'ika_slide_text', 'Nous analysons vos besoins, structurons vos priorités et mettons en place les outils numériques qui rendent vos opérations plus simples, plus fiables et mieux suivies.' ) ); ?>
          </p>
          <div class="mt-9 flex flex-col gap-3 sm:flex-row">
            <a id="heroPrimary" href="<?php echo esc_url( ika_slide_url( $ika_m( 'ika_slide_primary_url', '#expertises' ) ) ); ?>" class="inline-flex items-center justify-center rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( $ika_m( 'ika_slide_primary_text', 'Découvrir nos expertises' ) ); ?></a>
            <a id="heroSecondary" href="<?php echo esc_url( ika_slide_url( $ika_m( 'ika_slide_secondary_url', '#contact' ) ) ); ?>" class="inline-flex items-center justify-center rounded-full border border-white/35 px-7 py-4 text-sm font-extrabold text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( $ika_m( 'ika_slide_secondary_text', 'Parler à un expert' ) ); ?></a>
          </div>
          <div class="mt-8 flex gap-3" aria-label="Navigation du hero">
            <?php foreach ( $ika_slides as $i => $slide ) : ?>
            <button class="hero-dot h-2.5 w-10 rounded-full <?php echo $i === 0 ? 'bg-ikaRed' : 'bg-white/35'; ?> transition" data-hero="<?php echo (int) $i; ?>" aria-label="Slide <?php echo (int) $i + 1; ?>"></button>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="relative hidden lg:block">
          <div class="absolute -left-5 top-10 h-28 w-28 rounded-full border-[18px] border-ikaRed/90"></div>
          <div class="animate-float rounded-[2rem] border border-white/20 bg-white p-4 shadow-premium">
            <img id="heroVisualImage" class="h-[520px] w-full rounded-[1.5rem] object-cover transition duration-700" src="<?php echo esc_url( ika_asset( $ika_m( 'ika_slide_image', 'images/slide11.jpg' ) ) ); ?>" alt="Transformation digitale IKA SOLUTION">
          </div>
          <div class="absolute -bottom-8 -left-8 w-64 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p id="heroMetricLabel" class="text-sm font-bold text-ikaRed"><?php echo esc_html( $ika_m( 'ika_slide_metric_label', 'Depuis 2014' ) ); ?></p>
            <p id="heroMetric" class="mt-2 text-3xl font-black text-ikaBlue"><?php echo esc_html( $ika_m( 'ika_slide_metric_value', 'Expert digital' ) ); ?></p>
            <p id="heroMetricText" class="mt-1 text-sm text-slate-600"><?php echo esc_html( $ika_m( 'ika_slide_metric_text', 'Conseil, logiciels, réseaux, cloud et sécurité.' ) ); ?></p>
          </div>
        </div>
      </div>
    </section>
