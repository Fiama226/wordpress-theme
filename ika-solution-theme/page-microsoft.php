<?php /* Template Name: Microsoft */ ?>
<?php
/**
 * Page Microsoft — reproduction fidèle de la page statique microsoft.php.
 *
 * Rendu par défaut strictement identique au site statique : structure,
 * textes, images et onglets. Chaque texte reste éditable dans
 * Apparence > Personnaliser > Contenu IKA Solution > Page Microsoft, et les onglets
 * dans le menu « Onglets Partenaires » (CPT ika_partner_tab).
 *
 * @package ika-solution
 */

if ( ! function_exists( 'ika_microsoft_contact_subjects' ) ) {
	/**
	 * Sujets du formulaire de contact propres à la page Microsoft.
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
$ms_plans_tabs = ika_partner_tabs_for( 'microsoft', 'plans' );

get_header();
?>


<main class="bg-white pt-32">

  <!-- ===================== HERO ===================== -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full  opacity-25" src="<?php echo esc_url( ika_asset( 'images/ms365_backgroundImage.jpg' ) ); ?>" alt="Productivité et collaboration avec Microsoft 365">
      <div class="absolute inset-0 bg-ikaBlueDark/80" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo esc_url( home_url( '/#expertises' ) ); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg><?php echo esc_html( ika_opt( 'ika_ms_hero_back', 'Retour aux expertises' ) ); ?></a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_ms_hero_eyebrow', 'Productivité & collaboration' ) ); ?></p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl"><?php echo esc_html( ika_opt( 'ika_ms_hero_title', 'Microsoft 365 : la plateforme de travail de vos équipes.' ) ); ?></h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85"><?php echo esc_html( ika_opt( 'ika_ms_hero_text', 'IKA SOLUTION, partenaire Microsoft, accompagne la fourniture, le déploiement et l’administration de Microsoft 365 — messagerie, collaboration, sécurité et licences — pour des équipes efficaces et protégées.' ) ); ?></p>
        <div class="mt-8 flex flex-wrap gap-3">
          <?php foreach ( ika_list_option( 'ika_ms_hero_badges', 'Exchange, Teams, SharePoint, OneDrive' ) as $ika_badge ) : ?>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue"><?php echo esc_html( $ika_badge ); ?></span>
          <?php endforeach; ?>
        </div>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="#contact" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_ms_hero_cta_primary', 'Parler à un expert Microsoft' ) ); ?></a>
          <a href="#m365" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_ms_hero_cta_secondary', 'Découvrir Microsoft 365' ) ); ?></a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem]  shadow-premium" src="<?php echo esc_url( ika_asset( 'images/ms365_backgroundImage.jpg' ) ); ?>" alt="Vos équipes au travail avec Microsoft 365">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_ms_hero_stat_label', 'Microsoft 365' ) ); ?></p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark"><?php echo esc_html( ika_opt( 'ika_ms_hero_stat_value', 'Collaboration & sécurité' ) ); ?></p>
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
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_ms_suite_eyebrow', 'Microsoft 365' ) ); ?></p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_ms_suite_title', 'Une seule suite pour collaborer, produire et sécuriser.' ) ); ?></h2>
          <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_ms_suite_text1', 'Microsoft 365 réunit messagerie, réunions, stockage, partage et applications Office dans une suite cohérente. Vos équipes travaillent ensemble, où qu’elles soient, avec des outils qui s’intègrent les uns aux autres.' ) ); ?></p>
          <p class="mt-4 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_ms_suite_text2', 'Chez IKA SOLUTION, nous vous conseillons la bonne formule, migrons vos données et administrons l’environnement pour que vos collaborateurs adoptent la suite sereinement.' ) ); ?></p>

        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_ms_suite_caption', 'Microsoft 365 — applications reliées' ) ); ?></span>
          </div>
          <img class="block w-full" src="<?php echo esc_url( ika_asset( 'images/Microsoft_365_app.jpg' ) ); ?>" alt="Microsoft 365 : messagerie, collaboration et sécurité" loading="lazy">
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
          <h3 class="text-2xl font-black"><?php echo esc_html( ika_opt( 'ika_ms_sec_title', 'Une sécurité intégrée, du compte au poste de travail.' ) ); ?></h3>
          <p class="mt-3 text-sm leading-7 text-white/80"><?php echo esc_html( ika_opt( 'ika_ms_sec_text', 'Authentification multi-facteur, accès conditionnel, protection de la messagerie et des postes : Microsoft 365 embarque les fondations de la sécurité de vos équipes.' ) ); ?></p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="<?php echo esc_url( ika_opt( 'ika_ms_sec_link1_url', 'https://www.microsoft.com/fr-fr/microsoft-365' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_ms_sec_link1_label', 'Découvrir Microsoft 365' ) ); ?></a>
          <a href="<?php echo esc_url( ika_opt( 'ika_ms_sec_link2_url', 'https://www.microsoft.com/fr-fr/microsoft-365/compare-microsoft-365-business-plans' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_ms_sec_link2_label', 'Comparer les offres' ) ); ?></a>
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
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_ms_plans_eyebrow', 'Plans & licences' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl"><?php echo esc_html( ika_opt( 'ika_ms_plans_title', 'Choisir la bonne formule, sans surpayer.' ) ); ?></h2>
        <div class="mt-6 grid max-w-3xl gap-4 text-base leading-8 text-white/85">
          <p><?php echo esc_html( ika_opt( 'ika_ms_plans_text1', 'Des plans Business (Basic, Standard, Premium) aux plans Enterprise (E3, E5), les licences Microsoft 365 se choisissent selon vos usages : collaboration, applications Office, sécurité et conformité.' ) ); ?></p>
          <p><?php echo esc_html( ika_opt( 'ika_ms_plans_text2', 'Chez IKA SOLUTION, nous réalisons une revue de vos licences pour éviter les doublons, aligner les droits sur les besoins et maîtriser vos coûts de renouvellement.' ) ); ?></p>
        </div>
        <a href="#contact" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_ms_plans_cta', 'Optimiser mes licences' ) ); ?></a>
      </div>
      <div class="hidden lg:block">
        <img class="h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( 'images/support2.png' ) ); ?>" alt="Administration de Microsoft 365">
      </div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_ms_plans_feat_eyebrow', 'Plans & licences' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_ms_plans_feat_title', 'Comprendre les offres, administrer simplement.' ) ); ?></h2>
        <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_ms_plans_feat_text', 'Parcourez les familles de plans Microsoft 365 et les services d’administration que nous mettons en place pour vous.' ) ); ?></p>
      </div>

      <div class="reveal mt-10 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-500"></span>
          <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_ms_plans_feat_caption', 'Microsoft 365 — vue d’ensemble des plans' ) ); ?></span>
        </div>
        <img class="block w-full h-full" src="<?php echo esc_url( ika_asset( 'images/Microsoft-365-Business-Compare.jpg' ) ); ?>" alt="Plans Microsoft 365" loading="lazy">
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
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_ms_proj_1_title', 'Conseil & revue des licences' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_ms_proj_1_text', 'Analyse de vos usages, choix des plans et optimisation des licences existantes pour aligner vos coûts sur vos besoins réels.' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-lg font-black text-white">02</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_ms_proj_2_title', 'Déploiement & migration' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_ms_proj_2_text', 'Création des comptes, migration des boîtes mail et des documents, configuration de Teams et des politiques de sécurité, sans coupure majeure.' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">03</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_ms_proj_3_title', 'Administration & formation' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_ms_proj_3_text', 'Gestion quotidienne, support utilisateur, supervision et formation pour que vos équipes adoptent la suite en autonomie.' ) ); ?></p>
        </article>
      </div>
    </div>
  </section>

  <!-- ===================== CONTACT ===================== -->
  <?php
  // Section contact identique à la page statique (fond bleu foncé, textes
  // propres à ce partenaire, mêmes champs) ; traitement par le thème
  // (nonce + anti-spam + wp_mail) au lieu de l'ancien contact-submit.php.
  $GLOBALS['ika_partner_contact'] = array(
  	'title' => ika_opt( 'ika_ms_contact_title', 'Équipez vos équipes avec Microsoft 365.' ),
  	'text'  => ika_opt( 'ika_ms_contact_text', 'Licences, migration, collaboration ou sécurité : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.' ),
  );
  add_filter( 'ika_contact_subjects', 'ika_microsoft_contact_subjects' );
  get_template_part( 'template-parts/contact-partner' );
  remove_filter( 'ika_contact_subjects', 'ika_microsoft_contact_subjects' );
  unset( $GLOBALS['ika_partner_contact'] );
  ?>

</main>

<?php get_footer(); ?>
