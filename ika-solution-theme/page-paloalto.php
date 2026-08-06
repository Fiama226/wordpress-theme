<?php /* Template Name: Palo Alto */ ?>
<?php
/**
 * Page Palo Alto — reproduction fidèle de la page statique paloalto.php.
 *
 * Rendu par défaut strictement identique au site statique : structure,
 * textes, images et onglets. Chaque texte reste éditable dans
 * Apparence > Personnaliser > Contenu IKA Solution > Page Palo Alto, et les onglets
 * dans le menu « Onglets Partenaires » (CPT ika_partner_tab).
 *
 * @package ika-solution
 */

if ( ! function_exists( 'ika_paloalto_contact_subjects' ) ) {
	/**
	 * Sujets du formulaire de contact propres à la page Palo Alto.
	 *
	 * @return string[]
	 */
	function ika_paloalto_contact_subjects() {
		return array(
			__( 'Pare-feu Strata (PAN-OS)', 'ika-solution' ),
			__( 'GlobalProtect & accès distant', 'ika-solution' ),
			__( 'Prisma Access (SASE)', 'ika-solution' ),
			__( 'Sécurité cloud (Prisma Cloud)', 'ika-solution' ),
			__( 'Détection & réponse (Cortex)', 'ika-solution' ),
			__( 'Audit / supervision de la sécurité', 'ika-solution' ),
			__( 'Autre demande liée à Palo Alto', 'ika-solution' ),
		);
	}
}

// Onglets édités depuis l'administration, avec repli sur le contenu d'origine.
$palo_ngfw_tabs = ika_partner_tabs_for( 'paloalto', 'ngfw' );
$palo_cloud_tabs = ika_partner_tabs_for( 'paloalto', 'cloud' );

get_header();
?>


<main class="bg-white pt-32">

  <!-- ===================== HERO ===================== -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-25" src="<?php echo esc_url( ika_asset( 'images/securite.jpg' ) ); ?>" alt="Cybersécurité Palo Alto Networks">
      <div class="absolute inset-0 bg-ikaBlueDark/80" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo esc_url( home_url( '/#expertises' ) ); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg><?php echo esc_html( ika_opt( 'ika_palo_hero_back', 'Retour aux expertises' ) ); ?></a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_palo_hero_eyebrow', 'Cybersécurité nouvelle génération' ) ); ?></p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl"><?php echo esc_html( ika_opt( 'ika_palo_hero_title', 'Palo Alto Networks : une sécurité pilotée par les applications.' ) ); ?></h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85"><?php echo esc_html( ika_opt( 'ika_palo_hero_text', 'IKA SOLUTION, partenaire Palo Alto Networks, déploie et administre les pare-feux Strata (PAN-OS), les solutions Prisma (SASE et cloud) et Cortex pour protéger votre réseau, vos accès et vos environnements cloud.' ) ); ?></p>
        <div class="mt-8 flex flex-wrap gap-3">
          <?php foreach ( ika_list_option( 'ika_palo_hero_badges', 'Strata NGFW, Prisma Access, Cortex, GlobalProtect' ) as $ika_badge ) : ?>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue"><?php echo esc_html( $ika_badge ); ?></span>
          <?php endforeach; ?>
        </div>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="#contact" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_palo_hero_cta_primary', 'Parler à un expert Palo Alto' ) ); ?></a>
          <a href="#strata" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_palo_hero_cta_secondary', 'Découvrir la plateforme' ) ); ?></a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( 'images/securite.jpg' ) ); ?>" alt="Pare-feu nouvelle génération Palo Alto Networks">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_palo_hero_stat_label', 'PAN-OS' ) ); ?></p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark"><?php echo esc_html( ika_opt( 'ika_palo_hero_stat_value', 'NGFW & cloud' ) ); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== STRATA ===================== -->
  <section id="strata" class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_palo_strata_eyebrow', 'Strata NGFW' ) ); ?></p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_palo_strata_title', 'Un pare-feu qui comprend le trafic applicatif.' ) ); ?></h2>
          <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_palo_strata_text1', 'Les pare-feux Palo Alto identifient le trafic par application, utilisateur et contenu grâce à App-ID, User-ID et Content-ID. Les menaces connues et inconnues sont bloquées, y compris dans le trafic chiffré.' ) ); ?></p>
          <p class="mt-4 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_palo_strata_text2', 'Chez IKA SOLUTION, nous déployons ces équipements avec une segmentation cohérente et une supervision continue pour protéger vos accès et vos données.' ) ); ?></p>

        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_palo_strata_caption', 'Palo Alto Networks — sécurité pilotée par les applications' ) ); ?></span>
          </div>
          <img class="block w-full" src="<?php echo esc_url( ika_asset( 'images/Paronama.webp' ) ); ?>" alt="Strata : pare-feu nouvelle génération" loading="lazy">
        </div>
      </div>

      <?php ika_partner_render_tabs( 'palo-ngfw', $palo_ngfw_tabs ); ?>
    </div>
  </section>

  <!-- ===================== PRISMA / CORTEX ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <img class="h-12 w-auto" src="<?php echo esc_url( ika_asset( 'images/paloalto.svg' ) ); ?>" alt="Palo Alto Networks" loading="lazy">
        <div>
          <h3 class="text-2xl font-black"><?php echo esc_html( ika_opt( 'ika_palo_platform_title', 'Du réseau au cloud, jusqu’aux opérations de sécurité.' ) ); ?></h3>
          <p class="mt-3 text-sm leading-7 text-white/80"><?php echo esc_html( ika_opt( 'ika_palo_platform_text', 'Prisma Access sécurise les accès et le cloud, Prisma Cloud protège les workloads et Cortex automatise la détection et la réponse. La plateforme couvre tout le périmètre digital.' ) ); ?></p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="<?php echo esc_url( ika_opt( 'ika_palo_platform_link1_url', 'https://www.paloaltonetworks.com/products' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_palo_platform_link1_label', 'Gamme Palo Alto' ) ); ?></a>
          <a href="<?php echo esc_url( ika_opt( 'ika_palo_platform_link2_url', 'https://www.paloaltonetworks.com/support' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_palo_platform_link2_label', 'Support & services' ) ); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== CLOUD & OPÉRATIONS ===================== -->
  <section id="cloud-operations" class="relative overflow-hidden bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-20" src="<?php echo esc_url( ika_asset( 'images/cloud2.jpg' ) ); ?>" alt="Cloud et opérations de sécurité">
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_palo_cloud_eyebrow', 'Cloud & opérations' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl"><?php echo esc_html( ika_opt( 'ika_palo_cloud_title', 'Sécuriser le cloud, analyser et répondre.' ) ); ?></h2>
        <div class="mt-6 grid max-w-3xl gap-4 text-base leading-8 text-white/85">
          <p><?php echo esc_html( ika_opt( 'ika_palo_cloud_text1', 'Prisma Access apporte une protection SASE aux utilisateurs et aux sites, Prisma Cloud protège les workloads et les environnements multi-cloud, et Cortex automatise la détection et la réponse aux incidents.' ) ); ?></p>
          <p><?php echo esc_html( ika_opt( 'ika_palo_cloud_text2', 'Chez IKA SOLUTION, nous intégrons ces solutions selon votre maturité : renforcer le pare-feu, sécuriser le cloud ou moderniser vos opérations de sécurité.' ) ); ?></p>
        </div>
        <a href="#contact" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_palo_cloud_cta', 'Renforcer ma cybersécurité' ) ); ?></a>
      </div>
      <div class="hidden lg:block">
        <img class="h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( 'images/cloud2.jpg' ) ); ?>" alt="Sécurité cloud Palo Alto Networks">
      </div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_palo_cloud_feat_eyebrow', 'Cloud & opérations' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_palo_cloud_feat_title', 'Accéder, protéger, répondre.' ) ); ?></h2>
        <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_palo_cloud_feat_text', 'Parcourez les briques qui étendent le pare-feu : SASE, sécurité cloud-native et opérations de sécurité pilotées par les données.' ) ); ?></p>
      </div>

      <div class="reveal mt-10 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-500"></span>
          <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_palo_cloud_feat_caption', 'Plateforme Palo Alto Networks — vue d’ensemble' ) ); ?></span>
        </div>
        <img class="block w-full" src="<?php echo esc_url( ika_asset( 'images/paloaltonetworkscloud.jpg' ) ); ?>" alt="Plateforme Palo Alto Networks" loading="lazy">
      </div>

      <?php ika_partner_render_tabs( 'palo-cloud', $palo_cloud_tabs ); ?>
    </div>
  </section>

  <!-- ===================== VOTRE PROJET PALO ALTO ===================== -->
  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 lg:grid-cols-3">
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">01</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_palo_proj_1_title', 'Audit & design' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_palo_proj_1_text', 'Analyse de votre exposition, cartographie des applications et dimensionnement des pare-feux : nous concevons une architecture cohérente.' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-lg font-black text-white">02</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_palo_proj_2_title', 'Déploiement & configuration' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_palo_proj_2_text', 'Installation des équipements, politiques de sécurité, GlobalProtect et Panorama, avec intégration de vos annuaires, sans coupure des services.' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">03</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_palo_proj_3_title', 'Exploitation & supervision' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_palo_proj_3_text', 'Veille, mise à jour des signatures, gestion des incidents et formation de vos équipes : la plateforme reste performante et documentée.' ) ); ?></p>
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
  	'title' => ika_opt( 'ika_palo_contact_title', 'Protégez votre réseau et votre cloud avec Palo Alto.' ),
  	'text'  => ika_opt( 'ika_palo_contact_text', 'Pare-feu, accès distant, cloud ou opérations de sécurité : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.' ),
  );
  add_filter( 'ika_contact_subjects', 'ika_paloalto_contact_subjects' );
  get_template_part( 'template-parts/contact-partner' );
  remove_filter( 'ika_contact_subjects', 'ika_paloalto_contact_subjects' );
  unset( $GLOBALS['ika_partner_contact'] );
  ?>

</main>

<?php get_footer(); ?>
