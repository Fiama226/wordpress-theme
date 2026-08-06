<?php /* Template Name: Odoo */ ?>
<?php
/**
 * Page Odoo — reproduction fidèle de la page statique odoo.php.
 *
 * Rendu par défaut strictement identique au site statique : structure,
 * textes, images et onglets. Chaque texte reste éditable dans
 * Apparence > Personnaliser > Contenu IKA Solution > Page Odoo, et les onglets
 * dans le menu « Onglets Partenaires » (CPT ika_partner_tab).
 *
 * @package ika-solution
 */

if ( ! function_exists( 'ika_odoo_contact_subjects' ) ) {
	/**
	 * Sujets du formulaire de contact propres à la page Odoo.
	 *
	 * @return string[]
	 */
	function ika_odoo_contact_subjects() {
		return array(
			__( 'Odoo CRM & ventes', 'ika-solution' ),
			__( 'Odoo comptabilité & finances', 'ika-solution' ),
			__( 'Odoo stock, achats & production', 'ika-solution' ),
			__( 'Odoo RH, projets & services', 'ika-solution' ),
			__( 'Odoo eCommerce & site web', 'ika-solution' ),
			__( 'Audit / migration vers Odoo', 'ika-solution' ),
			__( 'Autre demande liée à Odoo', 'ika-solution' ),
		);
	}
}

// Onglets édités depuis l'administration, avec repli sur le contenu d'origine.
$odoo_comm_tabs = ika_partner_tabs_for( 'odoo', 'comm' );
$odoo_ent_tabs = ika_partner_tabs_for( 'odoo', 'ent' );

get_header();
?>


<main class="bg-white pt-32">

  <!-- ===================== HERO ===================== -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full  opacity-25" src="<?php echo esc_url( ika_asset( 'images/OdooBackgound.png' ) ); ?>" alt="Gestion d’entreprise avec Odoo">
      <div class="absolute inset-0 bg-ikaBlueDark/80" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo esc_url( home_url( '/#expertises' ) ); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg><?php echo esc_html( ika_opt( 'ika_odoo_hero_back', 'Retour aux expertises' ) ); ?></a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_odoo_hero_eyebrow', 'ERP & gestion d’entreprise' ) ); ?></p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl"><?php echo esc_html( ika_opt( 'ika_odoo_hero_title', 'Odoo : une suite open source qui unifie vos processus métier.' ) ); ?></h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85"><?php echo esc_html( ika_opt( 'ika_odoo_hero_text', 'IKA SOLUTION, partenaire Odoo, déploie et maintient Odoo Community et Enterprise pour piloter ventes, CRM, comptabilité, stock, production et ressources humaines depuis une seule plateforme, avec un accompagnement local.' ) ); ?></p>
        <div class="mt-8 flex flex-wrap gap-3">
          <?php foreach ( ika_list_option( 'ika_odoo_hero_badges', 'CRM & Ventes, Comptabilité, Stock & Achats, eCommerce' ) as $ika_badge ) : ?>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue"><?php echo esc_html( $ika_badge ); ?></span>
          <?php endforeach; ?>
        </div>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="#contact" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_odoo_hero_cta_primary', 'Parler à un expert Odoo' ) ); ?></a>
          <a href="#odoo-suite" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_odoo_hero_cta_secondary', 'Découvrir la suite' ) ); ?></a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem] object-contain shadow-premium" src="<?php echo esc_url( ika_asset( 'images/Odoo_apps_page.png' ) ); ?>" alt="Suite ERP Odoo pour votre entreprise">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_odoo_hero_stat_label', 'Community' ) ); ?></p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark"><?php echo esc_html( ika_opt( 'ika_odoo_hero_stat_value', 'Logiciel gratuit' ) ); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== ODOO — L’ERP UNIFIÉ ===================== -->
  <section id="odoo-suite" class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-10 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_odoo_suite_eyebrow', 'Odoo Community' ) ); ?></p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_odoo_suite_title', 'Une plateforme unique, des modules qui s’emboîtent.' ) ); ?></h2>
          <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_odoo_suite_text1', 'Odoo réunit CRM, ventes, comptabilité, stock, achats, production, projets et ressources humaines dans un même socle. Les modules partagent une base de données unique : une vente validée met à jour le stock, la facture et le reporting en temps réel.' ) ); ?></p>
          <p class="mt-4 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_odoo_suite_text2', 'Chez IKA SOLUTION, nous conseillons Odoo pour remplacer des outils dispersés par une solution cohérente, évolutive et maîtrisée — avec des licences Community gratuites ou des abonnements Enterprise selon vos besoins.' ) ); ?></p>
        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_odoo_suite_caption', 'Odoo — applications reliées sur un socle commun' ) ); ?></span>
          </div>
          <img class="block w-full" src="<?php echo esc_url( ika_asset( 'images/shémaodoo.webp' ) ); ?>" alt="Odoo : modules métiers unifiés" loading="lazy">
        </div>
      </div>

      <?php ika_partner_render_tabs( 'odoo-comm', $odoo_comm_tabs ); ?>
    </div>
  </section>

  <!-- ===================== OPEN SOURCE ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <img class="h-12 w-auto" src="<?php echo esc_url( ika_asset( 'images/odoo.png' ) ); ?>" alt="Odoo" loading="lazy">
        <div>
          <h3 class="text-2xl font-black"><?php echo esc_html( ika_opt( 'ika_odoo_oss_title', 'Odoo Community : libre, gratuit et auditable.' ) ); ?></h3>
          <p class="mt-3 text-sm leading-7 text-white/80"><?php echo esc_html( ika_opt( 'ika_odoo_oss_text', 'Le code est publié sous licence LGPL : aucune fonctionnalité cachée, aucun coût de licence. Vous ne payez que l’hébergement et l’accompagnement. L’abonnement Enterprise ajoute les modules avancés, le support avec SLA et les services officiels.' ) ); ?></p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="<?php echo esc_url( ika_opt( 'ika_odoo_oss_link1_url', 'https://www.odoo.com/fr_FR/pricing' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_odoo_oss_link1_label', 'Éditions & tarifs' ) ); ?></a>
          <a href="<?php echo esc_url( ika_opt( 'ika_odoo_oss_link2_url', 'https://www.odoo.com/fr_FR/app/applications' ) ); ?>" target="_blank" rel="noopener" class="inline-flex rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_odoo_oss_link2_label', 'Catalogue d’applications' ) ); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== ODOO ENTERPRISE ===================== -->
  <section id="odoo-enterprise" class="relative overflow-hidden bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-20" src="<?php echo esc_url( ika_asset( 'images/development2.jpg' ) ); ?>" alt="Odoo Enterprise">
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php echo esc_html( ika_opt( 'ika_odoo_ent_eyebrow', 'Odoo Enterprise' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl"><?php echo esc_html( ika_opt( 'ika_odoo_ent_title', 'Les modules avancés, le support et la sérénité.' ) ); ?></h2>
        <div class="mt-6 grid max-w-3xl gap-4 text-base leading-8 text-white/85">
          <p><?php echo esc_html( ika_opt( 'ika_odoo_ent_text1', 'Odoo Enterprise ajoute plus de 40 modules métiers (Studio, Field Service, Subscriptions, Sign, Helpdesk, applications mobiles officielles…) et des services : support avec SLA, mises à niveau gérées et hébergement maîtrisé.' ) ); ?></p>
          <p><?php echo esc_html( ika_opt( 'ika_odoo_ent_text2', 'Chez IKA SOLUTION, nous évaluons avec vous le bon compromis entre Community et Enterprise pour que le coût serve réellement vos usages, sans payer de fonctionnalités inutilisées.' ) ); ?></p>
        </div>
        <a href="#contact" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700"><?php echo esc_html( ika_opt( 'ika_odoo_ent_cta', 'Évaluer mes besoins Odoo' ) ); ?></a>
      </div>
      <div class="hidden lg:block">
        <img class="h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo esc_url( ika_asset( 'images/development2.jpg' ) ); ?>" alt="Accompagnement Odoo Enterprise par IKA SOLUTION">
      </div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed"><?php echo esc_html( ika_opt( 'ika_odoo_ent_feat_eyebrow', 'Odoo Enterprise' ) ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_odoo_ent_feat_title', 'Personnaliser, sécuriser, faire évoluer.' ) ); ?></h2>
        <p class="mt-5 text-base leading-8 text-slate-600"><?php echo esc_html( ika_opt( 'ika_odoo_ent_feat_text', 'Parcourez les atouts de l’édition Enterprise : modules avancés, personnalisation Studio, support contractuel et modes d’hébergement.' ) ); ?></p>
      </div>

      <div class="reveal mt-10 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-500"></span>
          <span class="ml-3 text-xs font-bold text-slate-500"><?php echo esc_html( ika_opt( 'ika_odoo_ent_feat_caption', 'Odoo Enterprise — vue d’ensemble' ) ); ?></span>
        </div>
        <img class="block w-full" src="<?php echo esc_url( ika_asset( 'images/Odoo_entreprise.png' ) ); ?>" alt="Odoo Enterprise" loading="lazy">
      </div>

      <?php ika_partner_render_tabs( 'odoo-ent', $odoo_ent_tabs ); ?>
    </div>
  </section>

  <!-- ===================== VOTRE PROJET ODOO ===================== -->
  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 lg:grid-cols-3">
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">01</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_odoo_proj_1_title', 'Audit & cadrage' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_odoo_proj_1_text', 'Cartographie de vos processus, choix des modules et arbitrage Community/Enterprise : nous posons des fondations réalistes avant tout paramétrage.' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-lg font-black text-white">02</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_odoo_proj_2_title', 'Paramétrage & migration' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_odoo_proj_2_text', 'Configuration des modules, import des données existantes, intégration avec vos outils et recette : la mise en route se fait sans interrompre l’activité.' ) ); ?></p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">03</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_odoo_proj_3_title', 'Formation & support' ) ); ?></h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_odoo_proj_3_text', 'Formation des équipes, documentation, sauvegardes et montées de version : vos collaborateurs pilotent Odoo en autonomie et en confiance.' ) ); ?></p>
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
  	'title' => ika_opt( 'ika_odoo_contact_title', 'Parlez-nous de votre projet Odoo.' ),
  	'text'  => ika_opt( 'ika_odoo_contact_text', 'CRM, comptabilité, stock, production ou ressources humaines : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.' ),
  );
  add_filter( 'ika_contact_subjects', 'ika_odoo_contact_subjects' );
  get_template_part( 'template-parts/contact-partner' );
  remove_filter( 'ika_contact_subjects', 'ika_odoo_contact_subjects' );
  unset( $GLOBALS['ika_partner_contact'] );
  ?>

</main>

<?php get_footer(); ?>
