<?php
/**
 * Page Odoo — contenu rédigé en propre par IKA SOLUTION (août 2026).
 *
 * Page partenaire présentant Odoo (Community et Enterprise), l’ERP open
 * source unifié, et l’accompagnement IKA SOLUTION (audit, paramétrage,
 * intégration, formation). Reprend strictement le design de la page Proxmox.
 */

require __DIR__ . '/_partner-common.php';

/* ---------------------------------------------------------------------------
 * Odoo Community — onglets de fonctionnalités (textes originaux)
 * ------------------------------------------------------------------------- */
$odoo_comm_tabs = array(
	array(
		'id'    => 'ventes-crm',
		'label' => 'Ventes & CRM',
		'icon'  => '▢',
		'items' => array(
			array(
				'title' => 'CRM : piloter votre pipeline',
				'text'  => 'Suivez chaque opportunité, organisez les activités commerciales, automatisez les relances et analysez vos taux de conversion dans une interface unique et simple.',
			),
			array(
				'title' => 'Ventes & commandes',
				'text'  => 'Devis, commandes, tarifs par client, remises et abonnements : la chaîne de vente est suivie de bout en bout, avec des états et des rapports toujours à jour.',
			),
			array(
				'title' => 'Point de vente (POS)',
				'text'  => 'Encaissez en caisse, tablette ou mobile, gérez plusieurs boutiques et suivez vos ventes en temps réel, reliées automatiquement à la comptabilité et au stock.',
			),
		),
	),
	array(
		'id'    => 'comptabilite',
		'label' => 'Comptabilité',
		'icon'  => '▤',
		'items' => array(
			array(
				'title' => 'Écritures et facturation',
				'text'  => 'Factures clients, notes de frais, paiements et rapprochement : les opérations comptables s’alimentent automatiquement depuis les ventes, achats et dépenses.',
			),
			array(
				'title' => 'Plan comptable local',
				'text'  => 'Odoo propose des plans comptables adaptés à de nombreux pays, avec les règles de TVA, les libellés et les états attendus par votre contexte réglementaire.',
			),
			array(
				'title' => 'États financiers',
				'text'  => 'Bilan, compte de résultat, balance âgée et journaux sont générés et exportables, pour un suivi comptable clair et un partage simple avec votre expert.',
			),
		),
	),
	array(
		'id'    => 'stock-achats',
		'label' => 'Stock & Achats',
		'icon'  => '⇄',
		'items' => array(
			array(
				'title' => 'Gestion de stock multi-entrepôts',
				'text'  => 'Multi-entrepôts, lots, emplacements, traçabilité et alertes de réapprovisionnement : gardez une visibilité exacte sur vos marchandises.',
			),
			array(
				'title' => 'Achats et fournisseurs',
				'text'  => 'Demandes de prix, commandes fournisseurs, réceptions et factures d’achat s’enchaînent avec des règles automatiques et un historique fiable.',
			),
			array(
				'title' => 'Code-barres',
				'text'  => 'Les mouvements de stock se traitent au scan : réceptions, inventaires et expéditions deviennent rapides et moins sujets aux erreurs de saisie.',
			),
		),
	),
	array(
		'id'    => 'rh',
		'label' => 'Ressources humaines',
		'icon'  => '⚙',
		'items' => array(
			array(
				'title' => 'Employés et organigramme',
				'text'  => 'Centralisez les fiches employés, contrats, documents, congés et absences dans un espace unique, avec un organigramme clair et des droits d’accès.',
			),
			array(
				'title' => 'Recrutement',
				'text'  => 'Publiez des offres, collectez les candidatures et suivez le processus de recrutement avec des pipelines visuels et des emails automatisés.',
			),
			array(
				'title' => 'Congés & pointage',
				'text'  => 'Demandes de congés en ligne, validation, solde disponible et suivi du temps de travail : les équipes gagnent en autonomie et la gestion RH en lisibilité.',
			),
		),
	),
	array(
		'id'    => 'production',
		'label' => 'Production (MRP)',
		'icon'  => '⟳',
		'items' => array(
			array(
				'title' => 'Nomenclatures et ordres de fabrication',
				'text'  => 'Composez vos gammes, lancez des ordres de fabrication et déclarez la consommation de matières : la production est pilotée au plus près.',
			),
			array(
				'title' => 'Planification des besoins',
				'text'  => 'Le MRP calcule automatiquement les besoins en matières et déclenche les ordres d’achat et de fabrication pour éviter les ruptures.',
			),
			array(
				'title' => 'Qualité & maintenance',
				'text'  => 'Contrôles qualité aux étapes clés, équipements et maintenances planifiées : la production reste tracée et préventive.',
			),
		),
	),
	array(
		'id'    => 'projets-services',
		'label' => 'Projets & services',
		'icon'  => '🏗',
		'items' => array(
			array(
				'title' => 'Projets et tâches',
				'text'  => 'Kanban, listes, jalons et dépendances : pilotez vos projets, affectez vos équipes et suivez l’avancement dans des vues adaptées à votre méthode.',
			),
			array(
				'title' => 'Temps & feuilles de temps',
				'text'  => 'Les feuilles de temps alimentent la facturation au temps passé et le suivi de rentabilité par projet, pour un pilotage précis de vos services.',
			),
			array(
				'title' => 'Helpdesk & contrats',
				'text'  => 'Tickets, priorités, SLA et base de connaissances : structurez votre support interne ou client avec des réponses rapides et tracées.',
			),
		),
	),
	array(
		'id'    => 'site-ecommerce',
		'label' => 'Site web & eCommerce',
		'icon'  => '⇄',
		'items' => array(
			array(
				'title' => 'Constructeur de site web',
				'text'  => 'Créez et éditez votre site en glisser-déposer : pages vitrines, formulaires, blog et menu se gèrent sans coder, dans la même plateforme.',
			),
			array(
				'title' => 'Boutique en ligne',
				'text'  => 'Catalogue, panier, paiements et livraison s’intègrent au stock et à la comptabilité : votre eCommerce partage les mêmes données que l’ERP.',
			),
			array(
				'title' => 'Marketing & événements',
				'text'  => 'Emails de masse, ventes d’événements et suivi des inscriptions : développez votre audience avec des outils reliés au CRM.',
			),
		),
	),
	array(
		'id'    => 'pilotage',
		'label' => 'Pilotage & rapports',
		'icon'  => '📈',
		'items' => array(
			array(
				'title' => 'Tableaux de bord',
				'text'  => 'Chaque module propose des indicateurs et des graphiques configurables : ventes, trésorerie, stock et activité en un coup d’œil.',
			),
			array(
				'title' => 'Rapports personnalisés',
				'text'  => 'Créez vos analyses, exportez en Excel/PDF et planifiez des envois réguliers pour diffuser les bons chiffres aux bonnes personnes.',
			),
			array(
				'title' => 'Une base de données unique',
				'text'  => 'Tous les modules partagent PostgreSQL : une saisie dans un module met à jour automatiquement les autres, sans double encodage.',
			),
		),
	),
);

/* ---------------------------------------------------------------------------
 * Odoo Enterprise — onglets (textes originaux)
 * ------------------------------------------------------------------------- */
$odoo_ent_tabs = array(
	array(
		'id'    => 'modules-avances',
		'label' => 'Modules avancés',
		'icon'  => '⚙',
		'items' => array(
			array(
				'title' => 'Studio',
				'text'  => 'Personnalisez formulaires, champs et rapports en glisser-déposer, sans développement : vos écrans évoluent au rythme de votre métier.',
			),
			array(
				'title' => 'Applications mobiles officielles',
				'text'  => 'Odoo Enterprise offre des applications mobiles Android/iOS pour travailler sur vos données, vos tâches et votre messagerie depuis le terrain.',
			),
			array(
				'title' => 'Modules métiers étendus',
				'text'  => 'Field Service, Subscriptions, Sign (signature électronique), Appointments, Helpdesk avec SLA : des briques avancées couvrent les processus exigeants.',
			),
		),
	),
	array(
		'id'    => 'support-hebergement',
		'label' => 'Support & hébergement',
		'icon'  => '🛡',
		'items' => array(
			array(
				'title' => 'Support avec SLA',
				'text'  => 'L’abonnement Enterprise inclut un support officiel d’Odoo SA avec des niveaux de service contractuels, pour sécuriser votre exploitation.',
			),
			array(
				'title' => 'Mises à niveau gérées',
				'text'  => 'Les mises à jour et montées de version sont préparées et sécurisées, avec sauvegarde et tests, afin de limiter les risques de régression.',
			),
			array(
				'title' => 'Hébergement flexible',
				'text'  => 'Odoo Online, Odoo.sh ou un serveur local : nous vous conseillons le mode d’hébergement adapté à votre volume, vos contraintes et votre budget.',
			),
		),
	),
	array(
		'id'    => 'licences',
		'label' => 'Licences & coûts',
		'icon'  => '▤',
		'items' => array(
			array(
				'title' => 'Community : libre et gratuit',
				'text'  => 'Odoo Community est publié sous licence LGPL : le logiciel est gratuit, son code est ouvert et auditable, et seuls les coûts d’hébergement et d’accompagnement s’appliquent.',
			),
			array(
				'title' => 'Enterprise : par utilisateur',
				'text'  => 'L’édition Enterprise se souscrit par utilisateur et par mois, avec l’ensemble des modules officiels, le support et les services Odoo.',
			),
			array(
				'title' => 'Un choix progressif',
				'text'  => 'Vous pouvez démarrer sur Community puis migrer vers Enterprise sans perdre vos données : nous vous aidons à arbitrer selon vos besoins réels.',
			),
		),
	),
);

$pageTitle = 'Odoo | IKA SOLUTION LTD';
$pageDescription = 'Odoo : suite ERP open source pour la vente, le CRM, la comptabilité, le stock, la production et les RH. IKA SOLUTION, partenaire Odoo, assure audit, paramétrage et support.';
include 'header.php';
?>

<main class="bg-white pt-32">

  <!-- ===================== HERO ===================== -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-25" src="<?php echo ika_h('assets/images/cloud2.jpg'); ?>" alt="Gestion d’entreprise avec Odoo">
      <div class="absolute inset-0 bg-ikaBlueDark/80" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo ika_h('index.php#expertises'); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>Retour aux expertises</a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200">ERP &amp; gestion d’entreprise</p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl">Odoo : une suite open source qui unifie vos processus métier.</h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85">IKA SOLUTION, partenaire Odoo, déploie et maintient Odoo Community et Enterprise pour piloter ventes, CRM, comptabilité, stock, production et ressources humaines depuis une seule plateforme, avec un accompagnement local.</p>
        <div class="mt-8 flex flex-wrap gap-3">
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">CRM &amp; Ventes</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Comptabilité</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Stock &amp; Achats</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">eCommerce</span>
        </div>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="#contact" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Parler à un expert Odoo</a>
          <a href="#odoo-suite" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Découvrir la suite</a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo ika_h('assets/images/cloud2.jpg'); ?>" alt="Suite ERP Odoo pour votre entreprise">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed">Community</p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark">Logiciel gratuit</p>
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
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Odoo Community</p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Une plateforme unique, des modules qui s’emboîtent.</h2>
          <p class="mt-5 text-base leading-8 text-slate-600">Odoo réunit CRM, ventes, comptabilité, stock, achats, production, projets et ressources humaines dans un même socle. Les modules partagent une base de données unique : une vente validée met à jour le stock, la facture et le reporting en temps réel.</p>
          <p class="mt-4 text-base leading-8 text-slate-600">Chez IKA SOLUTION, nous conseillons Odoo pour remplacer des outils dispersés par une solution cohérente, évolutive et maîtrisée — avec des licences Community gratuites ou des abonnements Enterprise selon vos besoins.</p>
          <div class="mt-6 flex flex-wrap items-center gap-6">
            <img class="h-10 w-auto opacity-70 transition hover:opacity-100" src="<?php echo ika_h('assets/images/odoo.png'); ?>" alt="Odoo" loading="lazy">
            <img class="h-8 w-auto opacity-60 transition hover:opacity-100" src="<?php echo ika_h('assets/images/debian.png'); ?>" alt="Logiciel libre et open source" loading="lazy">
          </div>
        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500">Odoo — applications reliées sur un socle commun</span>
          </div>
          <img class="block w-full" src="<?php echo ika_h('assets/images/odoo.png'); ?>" alt="Odoo : modules métiers unifiés" loading="lazy">
        </div>
      </div>

      <?php ika_partner_render_tabs( 'odoo-comm', $odoo_comm_tabs ); ?>
    </div>
  </section>

  <!-- ===================== OPEN SOURCE ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <img class="h-12 w-auto" src="<?php echo ika_h('assets/images/odoo.png'); ?>" alt="Odoo" loading="lazy">
        <div>
          <h3 class="text-2xl font-black">Odoo Community : libre, gratuit et auditable.</h3>
          <p class="mt-3 text-sm leading-7 text-white/80">Le code est publié sous licence LGPL : aucune fonctionnalité cachée, aucun coût de licence. Vous ne payez que l’hébergement et l’accompagnement. L’abonnement Enterprise ajoute les modules avancés, le support avec SLA et les services officiels.</p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="https://www.odoo.com/fr_FR/pricing" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700">Éditions &amp; tarifs</a>
          <a href="https://www.odoo.com/fr_FR/app/applications" target="_blank" rel="noopener" class="inline-flex rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Catalogue d’applications</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== ODOO ENTERPRISE ===================== -->
  <section id="odoo-enterprise" class="relative overflow-hidden bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-20" src="<?php echo ika_h('assets/images/development2.jpg'); ?>" alt="Odoo Enterprise">
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Odoo Enterprise</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">Les modules avancés, le support et la sérénité.</h2>
        <div class="mt-6 grid max-w-3xl gap-4 text-base leading-8 text-white/85">
          <p>Odoo Enterprise ajoute plus de 40 modules métiers (Studio, Field Service, Subscriptions, Sign, Helpdesk, applications mobiles officielles…) et des services : support avec SLA, mises à niveau gérées et hébergement maîtrisé.</p>
          <p>Chez IKA SOLUTION, nous évaluons avec vous le bon compromis entre Community et Enterprise pour que le coût serve réellement vos usages, sans payer de fonctionnalités inutilisées.</p>
        </div>
        <a href="#contact" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Évaluer mes besoins Odoo</a>
      </div>
      <div class="hidden lg:block">
        <img class="h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo ika_h('assets/images/development2.jpg'); ?>" alt="Accompagnement Odoo Enterprise par IKA SOLUTION">
      </div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Odoo Enterprise</p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Personnaliser, sécuriser, faire évoluer.</h2>
        <p class="mt-5 text-base leading-8 text-slate-600">Parcourez les atouts de l’édition Enterprise : modules avancés, personnalisation Studio, support contractuel et modes d’hébergement.</p>
      </div>

      <div class="reveal mt-10 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-500"></span>
          <span class="ml-3 text-xs font-bold text-slate-500">Odoo Enterprise — vue d’ensemble</span>
        </div>
        <img class="block w-full" src="<?php echo ika_h('assets/images/odoo.png'); ?>" alt="Odoo Enterprise" loading="lazy">
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
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Audit &amp; cadrage</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Cartographie de vos processus, choix des modules et arbitrage Community/Enterprise : nous posons des fondations réalistes avant tout paramétrage.</p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-lg font-black text-white">02</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Paramétrage &amp; migration</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Configuration des modules, import des données existantes, intégration avec vos outils et recette : la mise en route se fait sans interrompre l’activité.</p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">03</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Formation &amp; support</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Formation des équipes, documentation, sauvegardes et montées de version : vos collaborateurs pilotent Odoo en autonomie et en confiance.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ===================== CONTACT ===================== -->
  <section id="contact" class="bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Contact</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">Parlez-nous de votre projet Odoo.</h2>
        <p class="mt-5 max-w-xl text-base leading-8 text-white/85">CRM, comptabilité, stock, production ou ressources humaines : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.</p>
      </div>
      <form class="relative grid gap-4 rounded-[2rem] bg-white p-7 text-ikaInk shadow-premium sm:p-8" action="contact-submit.php" method="post">
        <input type="hidden" name="type" value="contact">
        <input type="hidden" name="redirect" value="odoo.php#contact">
        <input type="hidden" name="page" value="Odoo">
        <input type="hidden" name="form_time" value="<?= time() ?>">
        <div class="absolute left-[-9999px] top-auto h-px w-px overflow-hidden" aria-hidden="true">
          <label>Ne pas remplir ce champ <input type="text" name="site_web" tabindex="-1" autocomplete="off" value=""></label>
        </div>
        <?php if (isset($_GET['mail'], $_GET['notice'])): ?>
          <div class="rounded-2xl <?= $_GET['mail'] === 'success' ? 'bg-green-50 text-green-800' : 'bg-red-50 text-red-800' ?> p-4 text-sm font-bold">
            <?= htmlspecialchars((string) $_GET['notice'], ENT_QUOTES, 'UTF-8') ?>
          </div>
        <?php endif; ?>
        <div class="grid gap-4 sm:grid-cols-2">
          <label class="grid gap-2 text-sm font-bold text-slate-700">Nom
            <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="nom" type="text" placeholder="Votre nom" required>
          </label>
          <label class="grid gap-2 text-sm font-bold text-slate-700">Téléphone
            <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="telephone" type="tel" placeholder="+226">
          </label>
        </div>
        <label class="grid gap-2 text-sm font-bold text-slate-700">Email
          <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="email" type="email" placeholder="vous@entreprise.com" required>
        </label>
        <label class="grid gap-2 text-sm font-bold text-slate-700">Solution concernée
          <select class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="besoin">
            <option>Odoo CRM &amp; ventes</option>
            <option>Odoo comptabilité &amp; finances</option>
            <option>Odoo stock, achats &amp; production</option>
            <option>Odoo RH, projets &amp; services</option>
            <option>Odoo eCommerce &amp; site web</option>
            <option>Audit / migration vers Odoo</option>
            <option>Autre demande liée à Odoo</option>
          </select>
        </label>
        <label class="grid gap-2 text-sm font-bold text-slate-700">Message
          <textarea class="min-h-28 rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="message" placeholder="Décrivez votre projet" required></textarea>
        </label>
        <button class="h-10 w-fit whitespace-nowrap rounded-full bg-ikaRed px-4 text-xs font-extrabold text-white shadow-clean transition hover:bg-red-700" type="submit">Envoyer la demande</button>
      </form>
    </div>
  </section>

</main>

<?php include 'footer.php'; ?>
