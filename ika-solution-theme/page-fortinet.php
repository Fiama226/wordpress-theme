<?php /* Template Name: Fortinet */ ?>
<?php
/**
 * Page Fortinet — reproduction fidèle de la page statique fortinet.php.
 *
 * Rendu par défaut strictement identique au site statique : structure,
 * textes, images et onglets. Chaque texte reste éditable dans
 * Apparence > Personnaliser > Contenu IKA Solution > Page Fortinet, et les onglets
 * dans le menu « Onglets Partenaires » (CPT ika_partner_tab).
 *
 * @package ika-solution
 */

if ( ! function_exists( 'ika_fortinet_contact_subjects' ) ) {
	/**
	 * Sujets du formulaire de contact propres à la page Fortinet.
	 *
	 * @return string[]
	 */
	function ika_fortinet_contact_subjects() {
		return array(
			__( 'FortiGate pare-feu NGFW', 'ika-solution' ),
			__( 'Secure SD-WAN multi-sites', 'ika-solution' ),
			__( 'VPN & accès distants sécurisés', 'ika-solution' ),
			__( 'FortiManager / FortiAnalyzer', 'ika-solution' ),
			__( 'Protection des postes (FortiClient)', 'ika-solution' ),
			__( 'Audit / supervision de la sécurité', 'ika-solution' ),
			__( 'Autre demande liée à Fortinet', 'ika-solution' ),
		);
	}
}

// Onglets édités depuis l'administration, avec repli sur le contenu d'origine.
$forti_fortigate_tabs = ika_partner_tabs_for( 'fortinet', 'gate' );
$forti_eco_tabs = ika_partner_tabs_for( 'fortinet', 'eco' );

get_header();
?>


<main class="bg-white pt-32">

  <!-- ===================== HERO ===================== -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-25" src="<?php echo esc_url( ika_asset( 'images/infrastructure.jpg' ) ); ?>" alt="Sécurité réseau Fortinet">
      <div class="absolute inset-0 bg-ikaBlueDark/80" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo esc_url( home_url( '/#expertises' ) ); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg><?php echo esc_html( ika_opt( 'ika_forti_hero_back', 'Retour aux expertises' ) ); ?></a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_forti_hero_eyebrow', 'Cybersécurité réseau' ) ); ?></p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl"><?php echo esc_html( ika_opt( 'ika_forti_hero_title', 'Fortinet : une sécurité réseau unifiée, du pare-feu au cloud.' ) ); ?></h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85"><?php echo esc_html( ika_opt( 'ika_forti_hero_text', 'IKA SOLUTION, partenaire Fortinet, déploie et administre FortiGate, FortiManager, FortiAnalyzer et FortiClient pour sécuriser votre périmètre, vos sites, vos accès distants et vos postes, avec une supervision locale.' ) ); ?></p>
        <div class="mt-8 flex flex-wrap gap-3">
          <?php foreach ( ika_list_option( 'ika_forti_hero_badges', 'FortiGate NGFW, Secure SD-WAN, FortiManager, FortiAnalyzer' ) as $ika_badge ) : ?>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue"><?php echo esc_html( $ika_badge ); ?></span>
          <?php endforeach; ?>
        </div>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="#contact" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_forti_hero_cta_primary', 'Parler à un expert Fortinet' ) ); ?></a>
          <a href="#fortigate" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_forti_hero_cta_secondary', 'Découvrir l’écosystème' ) ); ?></a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( 'images/infrastructure.jpg' ) ); ?>" alt="Infrastructure sécurisée Fortinet">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_forti_hero_stat_label', 'FortiGate' ) ); ?></p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark"><?php echo esc_html( ika_opt( 'ika_forti_hero_stat_value', 'NGFW & SD-WAN' ) ); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== FORTIGATE ===================== -->
  <section id="fortigate" class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_forti_gate_eyebrow', 'FortiGate NGFW' ) ); ?></p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_forti_gate_title', 'Le pare-feu nouvelle génération qui protège tout le réseau.' ) ); ?></h2>
          <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_forti_gate_text1', 'FortiGate intègre pare-feu, IPS, antivirus, contrôle applicatif, filtrage web, VPN et SD-WAN dans un seul équipement. Les flux chiffrés sont inspectés et les politiques appliquées selon l’application, l’utilisateur et le niveau de confiance.' ) ); ?></p>
          <p class="mt-4 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_forti_gate_text2', 'Chez IKA SOLUTION, nous concevons votre architecture FortiGate : segmentation, accès distants, interconnexion de sites et supervision continue.' ) ); ?></p>
        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_forti_gate_caption', 'FortiGate — sécurité unifiée du réseau' ) ); ?></span>
          </div>
          <img class="block w-full" src="<?php echo esc_url( ika_asset( 'images/fotigate.jpg' ) ); ?>" alt="FortiGate : pare-feu nouvelle génération" loading="lazy">
        </div>
      </div>

      <?php ika_partner_render_tabs( 'forti-gate', $forti_fortigate_tabs ); ?>
    </div>
  </section>

  <!-- ===================== SECURITY FABRIC ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <img class="h-12 w-auto" src="<?php echo esc_url( ika_asset( 'images/fortinet.png' ) ); ?>" alt="Fortinet" loading="lazy">
        <div>
          <h3 class="text-2xl font-black"><?php echo esc_html( ika_opt( 'ika_forti_fabric_title', 'Une protection coordonnée, du réseau au cloud.' ) ); ?></h3>
          <p class="mt-3 text-sm leading-7 text-white/80"><?php echo esc_html( ika_opt( 'ika_forti_fabric_text', 'FortiGate agit au cœur du Security Fabric de Fortinet : il partage l’intelligence et l’automatisation avec FortiManager, FortiAnalyzer, FortiClient et les services FortiGuard pour une réponse cohérente aux menaces.' ) ); ?></p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="<?php echo esc_url( ika_opt( 'ika_forti_fabric_link1_url', 'https://www.fortinet.com/products' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_forti_fabric_link1_label', 'Gamme Fortinet' ) ); ?></a>
          <a href="<?php echo esc_url( ika_opt( 'ika_forti_fabric_link2_url', 'https://www.fortinet.com/support' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_forti_fabric_link2_label', 'Support & services' ) ); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== ÉCOSYSTÈME ===================== -->
  <section id="ecosysteme" class="relative overflow-hidden bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-20" src="<?php echo esc_url( ika_asset( 'images/securite.jpg' ) ); ?>" alt="Écosystème Fortinet">
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_forti_eco_eyebrow', 'Gestion & supervision' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl"><?php echo esc_html( ika_opt( 'ika_forti_eco_title', 'Piloter, analyser, protéger les postes.' ) ); ?></h2>
        <div class="mt-6 grid max-w-3xl gap-4 text-base leading-8 text-white/85">
          <p><?php echo esc_html( ika_opt( 'ika_forti_eco_text1', 'FortiManager centralise la configuration de tous vos équipements, FortiAnalyzer corrèle les journaux pour la détection et les rapports, et FortiClient protège vos postes. Les services FortiGuard alimentent l’ensemble avec une intelligence des menaces à jour.' ) ); ?></p>
          <p><?php echo esc_html( ika_opt( 'ika_forti_eco_text2', 'Chez IKA SOLUTION, nous intégrons ces briques dans une démarche complète : durcissement, segmentation, supervision et réponse aux incidents.' ) ); ?></p>
        </div>
        <a href="#contact" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_forti_eco_cta', 'Auditer ma sécurité réseau' ) ); ?></a>
      </div>
      <div class="hidden lg:block">
        <img class="h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( 'images/securite.jpg' ) ); ?>" alt="Supervision de la sécurité Fortinet">
      </div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_forti_eco_feat_eyebrow', 'Écosystème Fortinet' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_forti_eco_feat_title', 'Gérer, analyser, sécuriser, se renseigner.' ) ); ?></h2>
        <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_forti_eco_feat_text', 'Parcourez les composants qui entourent FortiGate : gestion centralisée, journalisation, protection des postes et intelligence des menaces.' ) ); ?></p>
      </div>

      <div class="reveal mt-10 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-500"></span>
          <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_forti_eco_feat_caption', 'Fortinet Security Fabric — vue d’ensemble' ) ); ?></span>
        </div>
        <img class="block w-full" src="<?php echo esc_url( ika_asset( 'images/dashboar_fortinet.png' ) ); ?>" alt="Écosystème Fortinet" loading="lazy">
      </div>

      <?php ika_partner_render_tabs( 'forti-eco', $forti_eco_tabs ); ?>
    </div>
  </section>

  <!-- ===================== VOTRE PROJET FORTINET ===================== -->
  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 lg:grid-cols-3">
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">01</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_forti_proj_1_title', 'Audit & architecture' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_forti_proj_1_text', 'Analyse de votre exposition, dimensionnement des équipements et conception de la segmentation : nous posons les bases d’une défense cohérente.' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-lg font-black text-white">02</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_forti_proj_2_title', 'Déploiement & migration' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_forti_proj_2_text', 'Installation des FortiGate, politiques de sécurité, VPN et SD-WAN, intégration de FortiManager et FortiAnalyzer, sans interrompre les services.' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">03</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_forti_proj_3_title', 'Exploitation & supervision' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_forti_proj_3_text', 'Mises à jour FortiGuard, veille sur les journaux, gestion des incidents et rapports : votre sécurité reste pilotée et documentée.' ) ); ?></p>
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
  	'title' => ika_opt( 'ika_forti_contact_title', 'Sécurisez votre réseau avec Fortinet.' ),
  	'text'  => ika_opt( 'ika_forti_contact_text', 'Pare-feu, accès distants, SD-WAN ou supervision : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.' ),
  );
  add_filter( 'ika_contact_subjects', 'ika_fortinet_contact_subjects' );
  get_template_part( 'template-parts/contact-partner' );
  remove_filter( 'ika_contact_subjects', 'ika_fortinet_contact_subjects' );
  unset( $GLOBALS['ika_partner_contact'] );
  ?>

</main>

<?php get_footer(); ?>
