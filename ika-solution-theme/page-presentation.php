<?php
/**
 * Template Name: Presentation
 *
 * Contenu éditable depuis Personnaliser > Contenu IKA Solution >
 * « Page Société — … ». Toutes les valeurs par défaut reproduisent le
 * texte d'origine du site statique : rien ne change tant que le client
 * n'a rien modifié dans le Customizer.
 */
?>
<?php get_header(); ?>

  <main>
    <section id="societe" class="relative overflow-hidden bg-ikaBlueDark pt-36 text-white sm:pt-40">
      <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image:url('<?php echo esc_url( ika_asset( ika_opt( 'ika_pres_hero_image' ) ) ); ?>')" aria-hidden="true"></div>
      <div class="absolute inset-0 bg-ikaBlueDark/88" aria-hidden="true"></div>
      <div class="relative mx-auto grid min-h-[76svh] max-w-7xl items-center gap-12 px-4 pb-16 sm:px-6 lg:grid-cols-[1fr_.9fr] lg:px-8">
        <div class="reveal max-w-3xl">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">IKA SOLUTION LTD</p>
          <h1 class="mt-5 text-4xl font-black leading-[1.05] tracking-normal sm:text-5xl lg:text-6xl"><?php echo esc_html( ika_opt( 'ika_pres_hero_title' ) ); ?></h1>
          <p class="mt-6 text-lg leading-8 text-white/85 sm:text-xl"><?php echo esc_html( ika_opt( 'ika_pres_hero_text1' ) ); ?></p>
          <p class="mt-4 text-base leading-8 text-white/75"><?php echo esc_html( ika_opt( 'ika_pres_hero_text2' ) ); ?></p>
          <div class="mt-8 grid gap-4 sm:grid-cols-3">
            <div class="rounded-2xl bg-white/10 p-5 backdrop-blur">
              <p class="text-3xl font-black text-white"><?php echo esc_html( ika_opt( 'ika_stat1_value' ) ); ?></p>
              <p class="mt-2 text-sm font-bold text-white/75"><?php echo esc_html( ika_opt( 'ika_stat1_label' ) ); ?></p>
            </div>
            <div class="rounded-2xl bg-white/10 p-5 backdrop-blur">
              <p class="text-3xl font-black text-red-200"><?php echo esc_html( ika_opt( 'ika_stat2_value' ) ); ?></p>
              <p class="mt-2 text-sm font-bold text-white/75"><?php echo esc_html( ika_opt( 'ika_stat2_label' ) ); ?></p>
            </div>
            <div class="rounded-2xl bg-white/10 p-5 backdrop-blur">
              <p class="text-3xl font-black text-white"><?php echo esc_html( ika_opt( 'ika_stat3_value' ) ); ?></p>
              <p class="mt-2 text-sm font-bold text-white/75"><?php echo esc_html( ika_opt( 'ika_stat3_label' ) ); ?></p>
            </div>
          </div>
        </div>
        <div class="reveal relative hidden lg:block">
          <div class="absolute -right-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[540px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( ika_opt( 'ika_pres_hero_image' ) ) ); ?>" alt="Equipe IKA SOLUTION">
        </div>
      </div>
    </section>

    <section class="bg-white py-20 sm:py-28">
      <div class="mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:px-8">
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_pres_identity_eyebrow' ) ); ?></p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php echo esc_html( ika_opt( 'ika_pres_identity_title' ) ); ?></h2>
        </div>
        <div class="reveal grid gap-5 text-base leading-8 text-slate-600">
          <p><?php echo esc_html( ika_opt( 'ika_pres_identity_text1' ) ); ?></p>
          <p><?php echo esc_html( ika_opt( 'ika_pres_identity_text2' ) ); ?></p>
        </div>
      </div>
    </section>

    <section id="vision" class="bg-ikaSoft py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal max-w-3xl">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_pres_vision_eyebrow' ) ); ?></p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php echo esc_html( ika_opt( 'ika_pres_vision_title' ) ); ?></h2>
        </div>
        <div class="mt-12 grid gap-6 lg:grid-cols-3">
          <article class="reveal rounded-[2rem] bg-ikaBlue p-8 text-white shadow-clean">
            <span class="text-sm font-black uppercase tracking-[0.18em] text-red-200">Vision</span>
            <h3 class="mt-5 text-3xl font-black"><?php echo esc_html( ika_opt( 'ika_pres_vision_1_title' ) ); ?></h3>
            <p class="mt-5 text-sm leading-7 text-white/80"><?php echo esc_html( ika_opt( 'ika_pres_vision_1_text' ) ); ?></p>
          </article>
          <article class="reveal rounded-[2rem] bg-white p-8 shadow-clean">
            <span class="text-sm font-black uppercase tracking-[0.18em] text-ikaRed">Mission</span>
            <h3 class="mt-5 text-3xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_pres_mission_title' ) ); ?></h3>
            <p class="mt-5 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_pres_mission_text' ) ); ?></p>
          </article>
          <article class="reveal rounded-[2rem] bg-ikaRed p-8 text-white shadow-clean">
            <span class="text-sm font-black uppercase tracking-[0.18em] text-white/75">Valeurs</span>
            <h3 class="mt-5 text-3xl font-black"><?php echo esc_html( ika_opt( 'ika_pres_values_title' ) ); ?></h3>
            <p class="mt-5 text-sm leading-7 text-white/85"><?php echo esc_html( ika_opt( 'ika_pres_values_text' ) ); ?></p>
          </article>
        </div>
      </div>
    </section>

    <section class="relative overflow-hidden bg-ikaBlueDark py-20 text-white sm:py-28">
      <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image:url('<?php echo esc_url( ika_asset( ika_opt( 'ika_pres_dg_image' ) ) ); ?>')" aria-hidden="true"></div>
      <div class="absolute inset-0 bg-ikaBlueDark/90" aria-hidden="true"></div>
      <div class="relative mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[.85fr_1.15fr] lg:items-center lg:px-8">
        <div class="reveal">
          <div class="overflow-hidden rounded-[2rem] border border-white/15 bg-white/10 p-4 shadow-premium">
            <img class="h-[460px] w-full rounded-[1.5rem] object-cover" src="<?php echo esc_url( ika_asset( ika_opt( 'ika_pres_dg_image' ) ) ); ?>" alt="<?php echo esc_attr( sprintf( __( 'Photo du Directeur Général %s', 'ika-solution' ), ika_opt( 'ika_pres_dg_name' ) ) ); ?>">
          </div>
        </div>
        <div class="reveal">
          <h2 class="mt-4 text-4xl font-black tracking-normal sm:text-5xl"><?php echo esc_html( ika_opt( 'ika_pres_dg_name' ) ); ?></h2>
          <p class="mt-2 text-base font-bold text-white/70"><?php echo esc_html( ika_opt( 'ika_pres_dg_role' ) ); ?></p>
          <div class="mt-8 grid gap-5 text-base leading-8 text-white/80">
            <p><?php echo esc_html( ika_opt( 'ika_pres_dg_text1' ) ); ?></p>
            <p><?php echo esc_html( ika_opt( 'ika_pres_dg_text2' ) ); ?></p>
            <p><?php echo esc_html( ika_opt( 'ika_pres_dg_text3' ) ); ?></p>
          </div>
          <div class="mt-8 flex flex-col gap-3 sm:flex-row">
            <a href="<?php echo esc_url( home_url( '/#expertises' ) ); ?>" class="inline-flex justify-center rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Nos expertises</a>
            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="inline-flex justify-center rounded-full border border-white/35 px-7 py-4 text-sm font-extrabold text-white transition hover:bg-white hover:text-ikaBlue">Nous contacter</a>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-white py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal max-w-3xl">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_pres_guide_eyebrow' ) ); ?></p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php echo esc_html( ika_opt( 'ika_pres_guide_title' ) ); ?></h2>
        </div>
        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
          <article class="reveal rounded-2xl border border-slate-100 bg-ikaSoft p-7">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-sm font-black text-white">01</span>
            <h3 class="mt-5 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_pres_guide_1_title' ) ); ?></h3>
            <p class="mt-4 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_pres_guide_1_text' ) ); ?></p>
          </article>
          <article class="reveal rounded-2xl border border-slate-100 bg-white p-7 shadow-clean">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-sm font-black text-white">02</span>
            <h3 class="mt-5 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_pres_guide_2_title' ) ); ?></h3>
            <p class="mt-4 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_pres_guide_2_text' ) ); ?></p>
          </article>
          <article class="reveal rounded-2xl border border-slate-100 bg-white p-7 shadow-clean">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-sm font-black text-white">03</span>
            <h3 class="mt-5 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_pres_guide_3_title' ) ); ?></h3>
            <p class="mt-4 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_pres_guide_3_text' ) ); ?></p>
          </article>
          <article class="reveal rounded-2xl border border-slate-100 bg-ikaSoft p-7">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-sm font-black text-white">04</span>
            <h3 class="mt-5 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_pres_guide_4_title' ) ); ?></h3>
            <p class="mt-4 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_pres_guide_4_text' ) ); ?></p>
          </article>
        </div>
      </div>
    </section>

  </main>

<?php get_footer(); ?>
