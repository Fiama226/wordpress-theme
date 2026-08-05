<?php /* Template Name: Microsoft */ ?>
<?php
/**
 * Page Microsoft — contenu rédigé en propre par IKA SOLUTION (août 2026).
 *
 * Page partenaire présentant Microsoft 365 (messagerie, collaboration,
 * sécurité, licences) et l'accompagnement IKA SOLUTION.
 * Reprend le design de la page Proxmox. Onglets édités via ika_partner_tab.
 *
 * @package ika-solution
 */

if ( ! function_exists( 'ika_microsoft_contact_subjects' ) ) {
	/**
	 * Sujets du formulaire de contact propres à la page Microsoft 365.
	 *
	 * @return string[]
	 */
	function ika_microsoft_contact_subjects() {
		return array(
			__( 'Microsoft 365 — plans Business', 'ika-solution' ),
			__( 'Microsoft 365 — plans Enterprise', 'ika-solution' ),
			__( 'Migration / déploiement Microsoft 365', 'ika-solution' ),
			__( 'Messagerie Exchange & Teams', 'ika-solution' ),
			__( 'SharePoint / intranet', 'ika-solution' ),
			__( 'Sécurité & conformité (Defender, Entra ID)', 'ika-solution' ),
			__( 'Revue & optimisation des licences', 'ika-solution' ),
			__( 'Autre demande liée à Microsoft', 'ika-solution' ),
		);
	}
}

// Onglets édités depuis l'administration, avec repli sur le contenu d'origine.
$ms_collab_tabs = ika_partner_tabs_for( 'microsoft', 'collab' );
$ms_plans_tabs  = ika_partner_tabs_for( 'microsoft', 'plans' );

get_header();
?>

<main class="bg-white pt-32">

  <!-- ===================== HERO ===================== -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-25" src="<?php echo esc_url( ika_asset( 'images/equipe.jpg' ) ); ?>" alt="Productivité et collaboration avec Microsoft 365">
      <div class="absolute inset-0 bg-ikaBlueDark/80" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo esc_url( home_url( '/#expertises' ) ); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg><?php echo esc_html( ika_opt( 'ika_ms_hero_back' ) ); ?></a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_ms_hero_eyebrow' ) ); ?></p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl"><?php echo esc_html( ika_opt( 'ika_ms_hero_title' ) ); ?></h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85"><?php echo esc_html( ika_opt( 'ika_ms_hero_text' ) ); ?></p>
        <div class="mt-8 flex flex-wrap gap-3">
          <?php foreach ( ika_list_option( 'ika_ms_hero_badges' ) as $ika_badge ) : ?>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue"><?php echo esc_html( $ika_badge ); ?></span>
          <?php endforeach; ?>
        </div>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="#contact" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_ms_hero_cta_primary' ) ); ?></a>
          <a href="#m365" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_ms_hero_cta_secondary' ) ); ?></a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( 'images/equipe.jpg' ) ); ?>" alt="Vos équipes au travail avec Microsoft 365">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_ms_hero_stat_label' ) ); ?></p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark"><?php echo esc_html( ika_opt( 'ika_ms_hero_stat_value' ) ); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== MICROSOFT 365 ===================== -->
  <section id="m365" class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_ms_suite_eyebrow' ) ); ?></p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_ms_suite_title' ) ); ?></h2>
          <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_ms_suite_text1' ) ); ?></p>
          <p class="mt-4 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_ms_suite_text2' ) ); ?></p>
          <div class="mt-6 flex flex-wrap items-center gap-6">
            <img class="h-10 w-auto opacity-70 transition hover:opacity-100" src="<?php echo esc_url( ika_asset( 'images/microsoft.png' ) ); ?>" alt="Microsoft" loading="lazy">
            <img class="h-8 w-auto opacity-60 transition hover:opacity-100" src="<?php echo esc_url( ika_asset( 'images/partenaires/Microsoft_logo.svg' ) ); ?>" alt="Logo Microsoft" loading="lazy">
          </div>
        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_ms_suite_caption' ) ); ?></span>
          </div>
          <img class="block w-full" src="<?php echo esc_url( ika_asset( 'images/microsoft.png' ) ); ?>" alt="Microsoft 365 : messagerie, collaboration et sécurité" loading="lazy">
        </div>
      </div>

      <?php ika_partner_render_tabs( 'ms-collab', $ms_collab_tabs ); ?>
    </div>
  </section>

  <!-- ===================== SÉCURITÉ ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <img class="h-12 w-auto" src="<?php echo esc_url( ika_asset( 'images/microsoft.png' ) ); ?>" alt="Microsoft" loading="lazy">
        <div>
          <h3 class="text-2xl font-black"><?php echo esc_html( ika_opt( 'ika_ms_sec_title' ) ); ?></h3>
          <p class="mt-3 text-sm leading-7 text-white/80"><?php echo esc_html( ika_opt( 'ika_ms_sec_text' ) ); ?></p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="<?php echo esc_url( ika_opt( 'ika_ms_sec_link1_url' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_ms_sec_link1_label' ) ); ?></a>
          <a href="<?php echo esc_url( ika_opt( 'ika_ms_sec_link2_url' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_ms_sec_link2_label' ) ); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== PLANS & LICENCES ===================== -->
  <section id="plans" class="relative overflow-hidden bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-20" src="<?php echo esc_url( ika_asset( 'images/support2.png' ) ); ?>" alt="Licences Microsoft 365">
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_ms_plans_eyebrow' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl"><?php echo esc_html( ika_opt( 'ika_ms_plans_title' ) ); ?></h2>
        <div class="mt-6 grid max-w-3xl gap-4 text-base leading-8 text-white/85">
          <p><?php echo esc_html( ika_opt( 'ika_ms_plans_text1' ) ); ?></p>
          <p><?php echo esc_html( ika_opt( 'ika_ms_plans_text2' ) ); ?></p>
        </div>
        <a href="#contact" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_ms_plans_cta' ) ); ?></a>
      </div>
      <div class="hidden lg:block">
        <img class="h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( 'images/support2.png' ) ); ?>" alt="Administration de Microsoft 365">
      </div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_ms_plans_feat_eyebrow' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_ms_plans_feat_title' ) ); ?></h2>
        <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_ms_plans_feat_text' ) ); ?></p>
      </div>

      <div class="reveal mt-10 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-500"></span>
          <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_ms_plans_feat_caption' ) ); ?></span>
        </div>
        <img class="block w-full" src="<?php echo esc_url( ika_asset( 'images/microsoft.png' ) ); ?>" alt="Plans Microsoft 365" loading="lazy">
      </div>

      <?php ika_partner_render_tabs( 'ms-plans', $ms_plans_tabs ); ?>
    </div>
  </section>

  <!-- ===================== VOTRE PROJET MICROSOFT ===================== -->
  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 lg:grid-cols-3">
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">01</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_ms_proj_1_title' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_ms_proj_1_text' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-lg font-black text-white">02</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_ms_proj_2_title' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_ms_proj_2_text' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">03</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_ms_proj_3_title' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_ms_proj_3_text' ) ); ?></p>
        </article>
      </div>
    </div>
  </section>

  <?php
  $GLOBALS['ika_contact_hide_map'] = true;
  add_filter( 'ika_contact_subjects', 'ika_microsoft_contact_subjects' );
  get_template_part( 'template-parts/contact' );
  remove_filter( 'ika_contact_subjects', 'ika_microsoft_contact_subjects' );
  unset( $GLOBALS['ika_contact_hide_map'] );
  ?>

</main>

<?php get_footer(); ?>
