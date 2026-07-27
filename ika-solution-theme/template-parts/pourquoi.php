<?php
/**
 * Template part: Pourquoi nous choisir (section "pourquoi")
 * Contenu éditable depuis Personnaliser > Contenu IKA Solution >
 * « Accueil — Pourquoi nous choisir ».
 */
?>
    <section id="pourquoi" class="relative overflow-hidden bg-ikaBlueDark py-20 text-white sm:py-28">
      <div class="absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo esc_url( ika_asset('images/slide3.jpg') ); ?>'); opacity:.12;" aria-hidden="true"></div>
      <div class="absolute inset-0" style="background:rgba(13, 74, 126, .84);" aria-hidden="true"></div>
      <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal max-w-3xl">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_why_eyebrow' ) ); ?></p>
          <h2 class="mt-4 text-4xl font-black tracking-normal sm:text-5xl"><?php echo esc_html( ika_opt( 'ika_why_title' ) ); ?></h2>
        </div>
        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
          <article class="reveal rounded-2xl border border-white/15 bg-white/10 p-7">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-sm font-black">01</span>
            <h3 class="mt-5 text-xl font-black"><?php echo esc_html( ika_opt( 'ika_why_1_title' ) ); ?></h3>
            <p class="mt-4 text-sm leading-7 text-white/75"><?php echo esc_html( ika_opt( 'ika_why_1_text' ) ); ?></p>
          </article>
          <article class="reveal rounded-2xl border border-white/15 bg-white/10 p-7">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-sm font-black text-ikaBlue">02</span>
            <h3 class="mt-5 text-xl font-black"><?php echo esc_html( ika_opt( 'ika_why_2_title' ) ); ?></h3>
            <p class="mt-4 text-sm leading-7 text-white/75"><?php echo esc_html( ika_opt( 'ika_why_2_text' ) ); ?></p>
          </article>
          <article class="reveal rounded-2xl border border-white/15 bg-white/10 p-7">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-sm font-black">03</span>
            <h3 class="mt-5 text-xl font-black"><?php echo esc_html( ika_opt( 'ika_why_3_title' ) ); ?></h3>
            <p class="mt-4 text-sm leading-7 text-white/75"><?php echo esc_html( ika_opt( 'ika_why_3_text' ) ); ?></p>
          </article>
          <article class="reveal rounded-2xl border border-white/15 bg-white/10 p-7">
            <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-sm font-black text-ikaBlue">04</span>
            <h3 class="mt-5 text-xl font-black"><?php echo esc_html( ika_opt( 'ika_why_4_title' ) ); ?></h3>
            <p class="mt-4 text-sm leading-7 text-white/75"><?php echo esc_html( ika_opt( 'ika_why_4_text' ) ); ?></p>
          </article>
        </div>
      </div>
    </section>
