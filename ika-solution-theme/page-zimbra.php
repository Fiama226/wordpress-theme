<?php /* Template Name: Zimbra */ ?>
<?php
/**
 * Page Zimbra — reproduction fidèle de la page statique zimbra.php.
 *
 * Rendu par défaut strictement identique au site statique : structure,
 * textes, images et onglets. Chaque texte reste éditable dans
 * Apparence > Personnaliser > Contenu IKA Solution > Page Zimbra, et les onglets
 * dans le menu « Onglets Partenaires » (CPT ika_partner_tab).
 *
 * @package ika-solution
 */

if ( ! function_exists( 'ika_zimbra_contact_subjects' ) ) {
	/**
	 * Sujets du formulaire de contact propres à la page Zimbra.
	 *
	 * @return string[]
	 */
	function ika_zimbra_contact_subjects() {
		return array(
			__( 'Messagerie Zimbra (email & calendrier)', 'ika-solution' ),
			__( 'Chat & collaboration', 'ika-solution' ),
			__( 'Briefcase & bureautique', 'ika-solution' ),
			__( 'Édition Standard', 'ika-solution' ),
			__( 'Édition Professional', 'ika-solution' ),
			__( 'Migration depuis Exchange / autre messagerie', 'ika-solution' ),
			__( 'Hébergement local / souveraineté des données', 'ika-solution' ),
			__( 'Autre demande liée à Zimbra', 'ika-solution' ),
		);
	}
}

// Onglets édités depuis l'administration, avec repli sur le contenu d'origine.
$zim_collab_tabs = ika_partner_tabs_for( 'zimbra', 'collab' );
$zim_plans_tabs = ika_partner_tabs_for( 'zimbra', 'plans' );

get_header();
?>


<main class="bg-white pt-32">

  <!-- ===================== HERO ===================== -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full  opacity-25" src="<?php echo esc_url( ika_asset( 'images/zimbra_background.jpg' ) ); ?>" alt="Messagerie et collaboration avec Zimbra">
      <div class="absolute inset-0 bg-ikaBlueDark/80" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo esc_url( home_url( '/#expertises' ) ); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg><?php echo esc_html( ika_opt( 'ika_zim_hero_back', 'Retour aux expertises' ) ); ?></a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_zim_hero_eyebrow', 'Messagerie & collaboration' ) ); ?></p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl"><?php echo esc_html( ika_opt( 'ika_zim_hero_title', 'Zimbra : votre messagerie, vos données, vos règles.' ) ); ?></h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85"><?php echo esc_html( ika_opt( 'ika_zim_hero_text', 'IKA SOLUTION, partenaire Zimbra, déploie et administre Zimbra — messagerie, calendrier, chat, fichiers et bureautique — en local, en cloud privé ou en hybride, pour une souveraineté complète de vos communications.' ) ); ?></p>
        <div class="mt-8 flex flex-wrap gap-3">
          <?php foreach ( ika_list_option( 'ika_zim_hero_badges', 'Email, Calendrier, Chat, Briefcase' ) as $ika_badge ) : ?>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue"><?php echo esc_html( $ika_badge ); ?></span>
          <?php endforeach; ?>
        </div>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="#contact" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_zim_hero_cta_primary', 'Parler à un expert Zimbra' ) ); ?></a>
          <a href="#zimbra-suite" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_zim_hero_cta_secondary', 'Découvrir Zimbra' ) ); ?></a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem]  shadow-premium" src="<?php echo esc_url( ika_asset( 'images/zimbra_background.jpg' ) ); ?>" alt="Vos équipes collaborent avec Zimbra">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_zim_hero_stat_label', 'Souveraineté' ) ); ?></p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark"><?php echo esc_html( ika_opt( 'ika_zim_hero_stat_value', 'Vos données, vos règles' ) ); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== ZIMBRA COLLABORATION ===================== -->
  <section id="zimbra-suite" class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_zim_suite_eyebrow', 'Zimbra Collaboration' ) ); ?></p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_zim_suite_title', 'Email, calendrier, chat et fichiers dans une seule plateforme.' ) ); ?></h2>
          <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_zim_suite_text1', 'Zimbra réunit messagerie, calendrier, contacts, chat, Briefcase et bureautique dans une interface unique. Construit sur des standards ouverts, il s’intègre à vos outils existants sans vous enfermer dans un écosystème propriétaire.' ) ); ?></p>
          <p class="mt-4 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_zim_suite_text2', 'Chez IKA SOLUTION, nous déployons Zimbra là où vos données doivent rester : serveur local, cloud privé ou architecture hybride, avec un accompagnement de la migration jusqu’à l’exploitation.' ) ); ?></p>
        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_zim_suite_caption', 'Zimbra — client web de collaboration' ) ); ?></span>
          </div>
          <img class="block w-full" src="<?php echo esc_url( ika_asset( 'images/zimbra_webclient.png' ) ); ?>" alt="Zimbra : messagerie, calendrier et collaboration" loading="lazy">
        </div>
      </div>

      <?php ika_partner_render_tabs( 'zim-collab', $zim_collab_tabs ); ?>
    </div>
  </section>

  <!-- ===================== SOUVERAINETÉ ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <img class="h-12 w-auto" src="<?php echo esc_url( ika_asset( 'images/zimbra.png' ) ); ?>" alt="Zimbra" loading="lazy">
        <div>
          <h3 class="text-2xl font-black"><?php echo esc_html( ika_opt( 'ika_zim_oss_title', 'Open source, standards ouverts, zéro enfermement.' ) ); ?></h3>
          <p class="mt-3 text-sm leading-7 text-white/80"><?php echo esc_html( ika_opt( 'ika_zim_oss_text', 'Le code de Zimbra est ouvert et auditable. Vous choisissez où vivent vos boîtes mail — on-premises, cloud privé ou datacenter régional — pour rester maître de la conformité, de la résidence des données et des coûts de licence.' ) ); ?></p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="<?php echo esc_url( ika_opt( 'ika_zim_oss_link1_url', 'https://www.zimbra.com/' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_zim_oss_link1_label', 'Découvrir Zimbra' ) ); ?></a>
          <a href="<?php echo esc_url( ika_opt( 'ika_zim_oss_link2_url', 'https://www.zimbra.com/product/edition-comparison/' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_zim_oss_link2_label', 'Comparer les éditions' ) ); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== ÉDITIONS ===================== -->
  <section id="editions" class="relative overflow-hidden bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-20" src="<?php echo esc_url( ika_asset( 'images/zimbra_background.jpg' ) ); ?>" alt="Éditions Zimbra">
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_zim_plans_eyebrow', 'Éditions Standard & Professional' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl"><?php echo esc_html( ika_opt( 'ika_zim_plans_title', 'Choisir le bon niveau, selon vos usages.' ) ); ?></h2>
        <div class="mt-6 grid max-w-3xl gap-4 text-base leading-8 text-white/85">
          <p><?php echo esc_html( ika_opt( 'ika_zim_plans_text1', 'Zimbra Daffodil (v10) se décline en Standard et Professional. Les deux partagent le même socle collaboratif ; Professional ajoute l’interopérabilité Exchange, des options de sécurité avancées et une administration plus fine.' ) ); ?></p>
          <p><?php echo esc_html( ika_opt( 'ika_zim_plans_text2', 'Chez IKA SOLUTION, nous cadrons le volume, les contraintes réglementaires et les outils existants pour que vous ne payiez que ce dont vos équipes ont réellement besoin.' ) ); ?></p>
        </div>
        <a href="#contact" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_zim_plans_cta', 'Évaluer mes besoins Zimbra' ) ); ?></a>
      </div>
      <div class="hidden lg:block">
        <img class="h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( 'images/zimbra_background.jpg' ) ); ?>" alt="Accompagnement Zimbra par IKA SOLUTION">
      </div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_zim_plans_feat_eyebrow', 'Éditions & administration' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_zim_plans_feat_title', 'Standard, Professional, et une console claire.' ) ); ?></h2>
        <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_zim_plans_feat_text', 'Parcourez les éditions Zimbra et les services d’administration que nous mettons en place pour vous.' ) ); ?></p>
      </div>

      <div class="reveal mt-10 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-500"></span>
          <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_zim_plans_feat_caption', 'Zimbra — vue d’ensemble des éditions' ) ); ?></span>
        </div>
        <img class="block w-full h-full" src="<?php echo esc_url( ika_asset( 'images/zimbra_editions.png' ) ); ?>" alt="Éditions Zimbra Standard et Professional" loading="lazy">
      </div>

      <?php ika_partner_render_tabs( 'zim-plans', $zim_plans_tabs ); ?>
    </div>
  </section>

  <!-- ===================== VOTRE PROJET ZIMBRA ===================== -->
  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 lg:grid-cols-3">
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">01</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_zim_proj_1_title', 'Audit & architecture' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_zim_proj_1_text', 'Volume de boîtes, contraintes de résidence des données et choix Standard/Professional : nous posons une architecture réaliste avant toute installation.' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-lg font-black text-white">02</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_zim_proj_2_title', 'Déploiement & migration' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_zim_proj_2_text', 'Installation, import des boîtes existantes, DNS, certificats et politiques de sécurité : la bascule se prépare pour limiter l’interruption de service.' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">03</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_zim_proj_3_title', 'Exploitation & formation' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_zim_proj_3_text', 'Supervision, sauvegardes, montées de version et formation des utilisateurs : vos équipes pilotent Zimbra en autonomie et en confiance.' ) ); ?></p>
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
  	'title' => ika_opt( 'ika_zim_contact_title', 'Parlez-nous de votre projet Zimbra.' ),
  	'text'  => ika_opt( 'ika_zim_contact_text', 'Messagerie, calendrier, migration ou hébergement local : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.' ),
  );
  add_filter( 'ika_contact_subjects', 'ika_zimbra_contact_subjects' );
  get_template_part( 'template-parts/contact-partner' );
  remove_filter( 'ika_contact_subjects', 'ika_zimbra_contact_subjects' );
  unset( $GLOBALS['ika_partner_contact'] );
  ?>

</main>

<?php get_footer(); ?>
