<?php
/**
 * Template part: About / "Qui sommes-nous" (section "societe")
 */
?>
    <section id="societe" class="bg-white py-10 sm:py-18">
      <div class="about-showcase mx-auto grid max-w-7xl gap-12 px-4 sm:px-6 lg:grid-cols-[.95fr_1.05fr] lg:items-center lg:px-8">
        <div class="about-image-card reveal relative">
          <div class="absolute -left-4 -top-4 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[520px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( ika_opt( 'ika_about_image' ) ) ); ?>" alt="<?php echo esc_attr( ika_opt( 'ika_about_image_alt' ) ); ?>">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 shadow-premium">
            <p class="text-sm font-black text-ikaRed"><?php echo esc_html( ika_opt( 'ika_about_badge_title' ) ); ?></p>
            <p class="mt-1 text-2xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_about_badge_subtitle' ) ); ?></p>
          </div>
        </div>
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_about_eyebrow' ) ); ?></p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl"><?php echo esc_html( ika_opt( 'ika_about_title' ) ); ?></h2>
          <p class="mt-6 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_about_text1' ) ); ?></p>
          <p class="mt-4 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_about_text2' ) ); ?></p>
          <div class="mt-8 grid gap-4 sm:grid-cols-3">
            <div class="about-stat-card rounded-2xl bg-ikaSoft p-5">
              <p class="text-3xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_stat1_value' ) ); ?></p>
              <p class="mt-2 text-sm font-bold text-slate-700"><?php echo esc_html( ika_opt( 'ika_stat1_label' ) ); ?></p>
            </div>
            <div class="about-stat-card rounded-2xl bg-ikaSoft p-5">
              <p class="text-3xl font-black text-ikaRed"><?php echo esc_html( ika_opt( 'ika_stat2_value' ) ); ?></p>
              <p class="mt-2 text-sm font-bold text-slate-700"><?php echo esc_html( ika_opt( 'ika_stat2_label' ) ); ?></p>
            </div>
            <div class="about-stat-card rounded-2xl bg-ikaSoft p-5">
              <p class="text-3xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_stat3_value' ) ); ?></p>
              <p class="mt-2 text-sm font-bold text-slate-700"><?php echo esc_html( ika_opt( 'ika_stat3_label' ) ); ?></p>
            </div>
          </div>
          <a href="<?php echo esc_url( ika_page_url( 'presentation' ) ); ?>" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_about_cta' ) ); ?></a>
        </div>
      </div>
    </section>
