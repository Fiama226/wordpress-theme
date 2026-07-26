<?php
/**
 * Template for a single IKA Solution (product detail page).
 * All content is driven by the ika_solution CPT + its meta fields,
 * so it can be edited from the WordPress admin without touching code.
 */
get_header();

if ( ! function_exists( 'ika_h' ) ) {
    function ika_h( $value ) {
        return htmlspecialchars( (string) $value, ENT_QUOTES, 'UTF-8' );
    }
}

$post_id   = get_the_ID();
$name      = get_the_title();
$eyebrow   = get_post_meta( $post_id, 'ika_eyebrow', true );
$image     = get_post_meta( $post_id, 'ika_image', true );
$intro     = get_the_excerpt();
$features  = ika_get_list_meta( $post_id, 'ika_features' );
$benefits  = ika_get_list_meta( $post_id, 'ika_benefits' );
$use_cases = ika_get_list_meta( $post_id, 'ika_use_cases' );
?>
<main class="bg-white pt-32">
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo esc_url( home_url( '/#produits' ) ); ?>" class="inline-flex rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Retour aux solutions</a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo ika_h( $eyebrow ); ?></p>
        <h1 class="mt-4 text-5xl font-black leading-tight tracking-normal sm:text-6xl"><?php echo ika_h( $name ); ?></h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85"><?php echo ika_h( $intro ); ?></p>
        <div class="mt-8 flex flex-wrap gap-3">
          <?php foreach ( $benefits as $benefit ) : ?>
            <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue"><?php echo ika_h( $benefit ); ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -right-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( $image ) ); ?>" alt="<?php echo ika_h( $name ); ?>">
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.85fr_1.15fr] lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Présentation</p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Une solution pensée pour vos opérations quotidiennes.</h2>
      </div>
      <div class="text-base leading-8 text-slate-600"><?php the_content(); ?></div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr]">
        <div>
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Fonctionnalités</p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Ce que <?php echo ika_h( $name ); ?> apporte à vos équipes.</h2>
        </div>
        <div class="grid gap-5 sm:grid-cols-2">
          <?php foreach ( $features as $index => $feature ) : ?>
            <article class="rounded-2xl bg-white p-6 shadow-clean">
              <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-ikaBlue text-sm font-black text-white"><?php echo str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ); ?></span>
              <p class="mt-5 text-sm leading-7 text-slate-600"><?php echo ika_h( $feature ); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
      <div class="rounded-[2rem] bg-ikaBlueDark p-7 text-white shadow-premium sm:p-10">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Cas d’usage</p>
        <h2 class="mt-4 text-3xl font-black">Pour quels contextes ?</h2>
        <div class="mt-8 grid gap-4 sm:grid-cols-2">
          <?php foreach ( $use_cases as $use_case ) : ?>
            <div class="rounded-2xl border border-white/15 bg-white/10 p-5"><p class="font-black"><?php echo ika_h( $use_case ); ?></p></div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="rounded-[2rem] bg-ikaSoft p-7 sm:p-10">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Bénéfices</p>
        <h2 class="mt-4 text-3xl font-black text-ikaBlueDark">Pourquoi choisir cette solution ?</h2>
        <div class="mt-8 grid gap-4">
          <?php foreach ( $benefits as $benefit ) : ?>
            <div class="rounded-2xl bg-white p-5 shadow-clean"><p class="font-black text-ikaBlue"><?php echo ika_h( $benefit ); ?></p></div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="interesse" class="bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.85fr_1.15fr] lg:items-start lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Intéressé par <?php echo ika_h( $name ); ?> ?</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">Contactez IKA SOLUTION pour une présentation ou un devis.</h2>
        <p class="mt-5 text-base leading-8 text-white/75">Laissez vos coordonnées et décrivez votre besoin. L’équipe IKA SOLUTION pourra vous orienter sur la mise en place, l’adaptation et l’accompagnement de la solution.</p>
      </div>
      <form class="rounded-[2rem] bg-white p-7 text-ikaInk shadow-premium sm:p-8" action="contact-submit.php" method="post">
        <input type="hidden" name="type" value="solution">
        <input type="hidden" name="page" value="<?php echo ika_h( $name ); ?>">
        <input type="hidden" name="solution" value="<?php echo ika_h( $name ); ?>">
        <div class="grid gap-4 sm:grid-cols-2">
          <label class="grid gap-2 text-sm font-bold text-slate-700">Nom
            <input class="min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="nom" type="text" placeholder="Votre nom" required>
          </label>
          <label class="grid gap-2 text-sm font-bold text-slate-700">Téléphone
            <input class="min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="telephone" type="tel" placeholder="+226">
          </label>
        </div>
        <label class="mt-5 grid gap-2 text-sm font-bold text-slate-700">Email
          <input class="min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="email" type="email" placeholder="vous@entreprise.com" required>
        </label>
        <label class="mt-5 grid gap-2 text-sm font-bold text-slate-700">Solution souhaitée
          <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-ikaSoft px-4 py-3 font-bold text-ikaBlueDark outline-none" name="solution_label" type="text" value="<?php echo ika_h( $name ); ?>" readonly>
        </label>
        <label class="mt-5 grid gap-2 text-sm font-bold text-slate-700">Message
          <textarea class="min-h-32 rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="message" placeholder="Expliquez votre besoin, le nombre d’utilisateurs ou le contexte de votre organisation." required></textarea>
        </label>
        <button class="mt-6 rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700" type="submit">Envoyer la demande</button>
      </form>
    </div>
  </section>

  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Autres solutions</p>
          <h2 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl">Découvrir les autres produits IKA.</h2>
        </div>
        <a href="<?php echo esc_url( home_url( '/#produits' ) ); ?>" class="inline-flex rounded-full border border-slate-200 px-6 py-3 text-sm font-black text-ikaBlue transition hover:border-ikaBlue">Toutes les solutions</a>
      </div>
      <div class="mt-10 grid gap-6 md:grid-cols-3">
        <?php
        $others = get_posts( array(
            'post_type'      => 'ika_solution',
            'posts_per_page' => 4,
            'post__not_in'   => array( get_the_ID() ),
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ) );
        foreach ( $others as $item ) :
        ?>
          <a href="<?php echo esc_url( get_permalink( $item ) ); ?>" class="group overflow-hidden rounded-2xl bg-ikaSoft shadow-clean transition hover:-translate-y-1 hover:shadow-premium focus:outline-none focus:ring-4 focus:ring-ikaRed/25">
            <img class="h-44 w-full object-cover transition duration-500 group-hover:scale-105" src="<?php echo esc_url( ika_asset( get_post_meta( $item->ID, 'ika_image', true ) ) ); ?>" alt="<?php echo ika_h( get_the_title( $item ) ); ?>">
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
