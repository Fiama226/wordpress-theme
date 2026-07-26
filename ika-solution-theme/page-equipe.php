<?php /* Template Name: Equipe */ ?>
<?php
  get_header();
?>

<main>
  <section class="relative overflow-hidden bg-ikaBlueDark pt-36 text-white sm:pt-40">
    <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image:url('<?php echo ika_asset('images/presentation.jpg'); ?>')" aria-hidden="true"></div>
    <div class="absolute inset-0 bg-ikaBlueDark/92" aria-hidden="true"></div>
    <div class="relative mx-auto max-w-7xl px-4 pb-20 sm:px-6 lg:px-8">
      <div class="max-w-4xl">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Retour à l'accueil</a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200">Notre équipe</p>
        <h1 class="mt-5 text-4xl font-black leading-[1.05] tracking-normal sm:text-5xl lg:text-6xl">Des experts passionnés au service de votre transformation digitale.</h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/80 sm:text-xl">Ingénieurs, développeurs, consultants et techniciens réunis autour d'une même mission : vous offrir des solutions fiables, adaptées et durables.</p>
      </div>
    </div>
  </section>

  <section class="bg-white py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Profil</p>
        <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Une équipe pluridisciplinaire pour des projets exigeants.</h2>
        <p class="mt-6 text-base leading-8 text-slate-600">IKA SOLUTION réunit des compétences variées en développement, infrastructures, cybersécurité, réseaux et conseil. Chaque membre apporte son expertise pour garantir des livrables de qualité, dans les délais et en phase avec vos besoins.</p>
      </div>
    </div>
  </section>

 <section class="bg-ikaSoft py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal text-center">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Équipe</p>
        <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Les talents qui font IKA SOLUTION.</h2>
      </div>
      <div class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        <?php
        $ika_membres = get_posts(
          array(
            'post_type'      => 'ika_membre',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
          )
        );
        foreach ( $ika_membres as $ika_membre ) :
          $ika_role = get_post_meta( $ika_membre->ID, 'ika_membre_role', true );
          $ika_bio  = has_excerpt( $ika_membre->ID ) ? get_the_excerpt( $ika_membre ) : $ika_membre->post_content;
        ?>
        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo esc_url( ika_post_image( $ika_membre->ID, 'ika_membre_image', 'images/logo.png' ) ); ?>" alt="<?php echo esc_attr( get_the_title( $ika_membre ) ); ?>" loading="lazy">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( get_the_title( $ika_membre ) ); ?></h3>
          <?php if ( $ika_role ) : ?>
          <p class="mt-1 text-sm font-bold text-ikaRed"><?php echo esc_html( $ika_role ); ?></p>
          <?php endif; ?>
          <?php if ( $ika_bio ) : ?>
          <p class="mt-4 text-sm leading-7 text-slate-600"><?php echo esc_html( wp_strip_all_tags( $ika_bio ) ); ?></p>
          <?php endif; ?>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Valeurs</p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Une culture d'entreprise tournée vers l'impact.</h2>
        </div>
        <div class="reveal grid gap-5">
          <div class="flex gap-5 rounded-2xl border border-slate-100 bg-ikaSoft p-6">
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-ikaBlue text-lg font-black text-white">01</span>
            <div>
              <h3 class="font-black text-ikaBlue">Exigence technique</h3>
              <p class="mt-2 text-sm leading-7 text-slate-600">Nous concevons chaque solution avec rigueur, en respectant les normes, les délais et les engagements.</p>
            </div>
          </div>
          <div class="flex gap-5 rounded-2xl border border-slate-100 bg-ikaSoft p-6">
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-ikaRed text-lg font-black text-white">02</span>
            <div>
              <h3 class="font-black text-ikaBlue">Proximité client</h3>
              <p class="mt-2 text-sm leading-7 text-slate-600">Nous travaillons main dans la main avec nos clients pour comprendre leurs contraintes et y répondre avec des solutions adaptées.</p>
            </div>
          </div>
          <div class="flex gap-5 rounded-2xl border border-slate-100 bg-ikaSoft p-6">
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-ikaBlue text-lg font-black text-white">03</span>
            <div>
              <h3 class="font-black text-ikaBlue">Innovation continue</h3>
              <p class="mt-2 text-sm leading-7 text-slate-600">Nos équipes se forment en permanence pour maîtriser les technologies les plus récentes et vous offrir le meilleur.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
