<?php
/**
 * Page Fortinet — contenu rédigé en propre par IKA SOLUTION (août 2026).
 *
 * Page partenaire présentant l’écosystème de sécurité Fortinet (FortiGate,
 * FortiManager, FortiAnalyzer, FortiClient, FortiGuard) et l’accompagnement
 * IKA SOLUTION (audit, déploiement, administration, supervision).
 * Reprend strictement le design de la page Proxmox.
 */

require __DIR__ . '/_partner-common.php';

/* ---------------------------------------------------------------------------
 * FortiGate — onglets de fonctionnalités (textes originaux)
 * ------------------------------------------------------------------------- */
$forti_fortigate_tabs = array(
	array(
		'id'    => 'parefeu',
		'label' => 'Pare-feu nouvelle génération',
		'icon'  => '⛨',
		'items' => array(
			array(
				'title' => 'Un NGFW haute performance',
				'text'  => 'FortiGate combine filtrage étatique, IPS, antivirus, contrôle applicatif et inspection SSL dans un seul équipement, accéléré par du matériel dédié pour conserver un haut débit.',
			),
			array(
				'title' => 'IPS & antivirus',
				'text'  => 'Le système de prévention d’intrusion détecte et bloque les exploits connus et émergents, tandis que l’antivirus scanne le trafic à la recherche de malwares.',
			),
			array(
				'title' => 'Inspection SSL',
				'text'  => 'La majorité du trafic étant chiffrée, FortiGate décrypte et inspecte les flux HTTPS pour empêcher les menaces de se cacher dans les tunnels de navigation.',
			),
		),
	),
	array(
		'id'    => 'applications',
		'label' => 'Applications & utilisateurs',
		'icon'  => '▢',
		'items' => array(
			array(
				'title' => 'Contrôle applicatif',
				'text'  => 'Identifiez des milliers d’applications et autorisez, bloquez ou limitez le débit selon leur usage, indépendamment des ports et du chiffrement.',
			),
			array(
				'title' => 'Filtrage web',
				'text'  => 'Catégories de sites, liste noire, contrôle des téléchargements et profils par groupe d’utilisateurs : l’accès Internet est maîtrisé et tracé.',
			),
			array(
				'title' => 'ZTNA',
				'text'  => 'Le Zero Trust Network Access accorde un accès contextuel aux applications selon l’utilisateur, l’appareil et son niveau de conformité, sans exposer tout le réseau.',
			),
		),
	),
	array(
		'id'    => 'acces',
		'label' => 'Accès distant',
		'icon'  => '⇄',
		'items' => array(
			array(
				'title' => 'VPN SSL & IPsec',
				'text'  => 'FortiGate offre des tunnels SSL-VPN et IPsec pour les télétravailleurs et les interconnexions de sites, avec authentification et contrôle d’accès.',
			),
			array(
				'title' => 'FortiClient',
				'text'  => 'Le client de sécurité gère le VPN, la conformité de l’appareil et la protection du poste dans un seul outil, simple à déployer à grande échelle.',
			),
			array(
				'title' => 'Accès réseau Zero Trust',
				'text'  => 'Chaque requête est vérifiée avant accès, qu’elle vienne du bureau, du domicile ou du cloud : la même politique s’applique partout.',
			),
		),
	),
	array(
		'id'    => 'sdwan',
		'label' => 'Secure SD-WAN',
		'icon'  => '⟳',
		'items' => array(
			array(
				'title' => 'Des liaisons intelligentes',
				'text'  => 'Le SD-WAN sélectionne dynamiquement la meilleure liaison selon la santé du lien et les besoins des applications, pour un débit optimal.',
			),
			array(
				'title' => 'Priorisation applicative',
				'text'  => 'Les applications critiques sont prioritaires, les flux sensibles chiffrés, et les liaisons de secours utilisées automatiquement en cas de panne.',
			),
			array(
				'title' => 'Une sécurité intégrée',
				'text'  => 'NGFW, SD-WAN et routage avancé dans un même équipement : pas de boîtier séparé, une politique unique et une gestion simplifiée.',
			),
		),
	),
);

/* ---------------------------------------------------------------------------
 * Écosystème Fortinet — onglets (textes originaux)
 * ------------------------------------------------------------------------- */
$forti_eco_tabs = array(
	array(
		'id'    => 'gestion',
		'label' => 'FortiManager',
		'icon'  => '⚙',
		'items' => array(
			array(
				'title' => 'Administration centralisée',
				'text'  => 'FortiManager déploie des configurations, politiques et mises à jour sur l’ensemble de vos FortiGate depuis une console unique.',
			),
			array(
				'title' => 'Modèles & automatisation',
				'text'  => 'Des modèles réutilisables garantissent une configuration cohérente sur tous les sites, avec des scripts et des APIs pour automatiser les tâches.',
			),
			array(
				'title' => 'Contrôle des accès administrateurs',
				'text'  => 'Rôles et délégations précises permettent à chaque équipe d’agir sur son périmètre sans compromettre l’ensemble du réseau.',
			),
		),
	),
	array(
		'id'    => 'analyse',
		'label' => 'FortiAnalyzer',
		'icon'  => '📈',
		'items' => array(
			array(
				'title' => 'Journalisation centralisée',
				'text'  => 'FortiAnalyzer collecte et corrèle les journaux de sécurité et de trafic pour offrir une visibilité complète sur l’activité du réseau.',
			),
			array(
				'title' => 'Rapports & tableaux de bord',
				'text'  => 'Des rapports réglementaires et opérationnels sont générés pour suivre les incidents, les usages et la conformité.',
			),
			array(
				'title' => 'Détection et analyse',
				'text'  => 'Les anomalies sont mises en évidence et les données d’investigation conservées pour comprendre et répondre rapidement à un incident.',
			),
		),
	),
	array(
		'id'    => 'endpoint',
		'label' => 'FortiClient',
		'icon'  => '🔐',
		'items' => array(
			array(
				'title' => 'Sécurité du poste',
				'text'  => 'Antivirus, contrôle d’applications et protection web sur chaque poste, coordonnés avec la politique réseau globale.',
			),
			array(
				'title' => 'VPN intégré',
				'text'  => 'Le client unique gère l’accès distant et la sécurité de l’appareil, avec une expérience simple pour l’utilisateur.',
			),
			array(
				'title' => 'Conformité des appareils',
				'text'  => 'FortiClient vérifie l’état des postes avant l’accès au réseau et applique les correctifs nécessaires.',
			),
		),
	),
	array(
		'id'    => 'intelligence',
		'label' => 'FortiGuard',
		'icon'  => '🛡',
		'items' => array(
			array(
				'title' => 'Renseignements sur les menaces',
				'text'  => 'FortiGuard Labs met à jour en continu les signatures antivirus, IPS, antispam et les catégories de sites.',
			),
			array(
				'title' => 'Protection contre les menaces zero-day',
				'text'  => 'Les flux d’intelligence sont intégrés au NGFW pour détecter les menaces nouvelles et les variantes connues.',
			),
			array(
				'title' => 'Un service par abonnement',
				'text'  => 'Les services FortiGuard se souscrivent par équipement et par an ; nous vous conseillons le bon niveau selon votre exposition.',
			),
		),
	),
);

$pageTitle = 'Fortinet | IKA SOLUTION LTD';
$pageDescription = 'Fortinet : pare-feu nouvelle génération FortiGate, SD-WAN, gestion centralisée, supervision et sécurité des postes. IKA SOLUTION, partenaire Fortinet, assure audit, déploiement et administration.';
include 'header.php';
?>

<main class="bg-white pt-32">

  <!-- ===================== HERO ===================== -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-25" src="<?php echo ika_h('assets/images/infrastructure.jpg'); ?>" alt="Sécurité réseau Fortinet">
      <div class="absolute inset-0 bg-ikaBlueDark/80" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo ika_h('index.php#expertises'); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>Retour aux expertises</a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200">Cybersécurité réseau</p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl">Fortinet : une sécurité réseau unifiée, du pare-feu au cloud.</h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85">IKA SOLUTION, partenaire Fortinet, déploie et administre FortiGate, FortiManager, FortiAnalyzer et FortiClient pour sécuriser votre périmètre, vos sites, vos accès distants et vos postes, avec une supervision locale.</p>
        <div class="mt-8 flex flex-wrap gap-3">
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">FortiGate NGFW</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Secure SD-WAN</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">FortiManager</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">FortiAnalyzer</span>
        </div>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="#contact" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Parler à un expert Fortinet</a>
          <a href="#fortigate" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Découvrir l’écosystème</a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo ika_h('assets/images/infrastructure.jpg'); ?>" alt="Infrastructure sécurisée Fortinet">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed">FortiGate</p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark">NGFW &amp; SD-WAN</p>
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
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">FortiGate NGFW</p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Le pare-feu nouvelle génération qui protège tout le réseau.</h2>
          <p class="mt-5 text-base leading-8 text-slate-600">FortiGate intègre pare-feu, IPS, antivirus, contrôle applicatif, filtrage web, VPN et SD-WAN dans un seul équipement. Les flux chiffrés sont inspectés et les politiques appliquées selon l’application, l’utilisateur et le niveau de confiance.</p>
          <p class="mt-4 text-base leading-8 text-slate-600">Chez IKA SOLUTION, nous concevons votre architecture FortiGate : segmentation, accès distants, interconnexion de sites et supervision continue.</p>
          <div class="mt-6 flex flex-wrap items-center gap-6">
            <img class="h-10 w-auto opacity-70 transition hover:opacity-100" src="<?php echo ika_h('assets/images/fortinet.png'); ?>" alt="Fortinet" loading="lazy">
            <img class="h-8 w-auto opacity-60 transition hover:opacity-100" src="<?php echo ika_h('assets/images/partenaires/Fortinet_logo.svg'); ?>" alt="Logo Fortinet" loading="lazy">
          </div>
        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500">FortiGate — sécurité unifiée du réseau</span>
          </div>
          <img class="block w-full" src="<?php echo ika_h('assets/images/fortinet.png'); ?>" alt="FortiGate : pare-feu nouvelle génération" loading="lazy">
        </div>
      </div>

      <?php ika_partner_render_tabs( 'forti-gate', $forti_fortigate_tabs ); ?>
    </div>
  </section>

  <!-- ===================== SECURITY FABRIC ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <img class="h-12 w-auto" src="<?php echo ika_h('assets/images/fortinet.png'); ?>" alt="Fortinet" loading="lazy">
        <div>
          <h3 class="text-2xl font-black">Une protection coordonnée, du réseau au cloud.</h3>
          <p class="mt-3 text-sm leading-7 text-white/80">FortiGate agit au cœur du Security Fabric de Fortinet : il partage l’intelligence et l’automatisation avec FortiManager, FortiAnalyzer, FortiClient et les services FortiGuard pour une réponse cohérente aux menaces.</p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="https://www.fortinet.com/products" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700">Gamme Fortinet</a>
          <a href="https://www.fortinet.com/support" target="_blank" rel="noopener" class="inline-flex rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Support &amp; services</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== ÉCOSYSTÈME ===================== -->
  <section id="ecosysteme" class="relative overflow-hidden bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-20" src="<?php echo ika_h('assets/images/securite.jpg'); ?>" alt="Écosystème Fortinet">
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Gestion &amp; supervision</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">Piloter, analyser, protéger les postes.</h2>
        <div class="mt-6 grid max-w-3xl gap-4 text-base leading-8 text-white/85">
          <p>FortiManager centralise la configuration de tous vos équipements, FortiAnalyzer corrèle les journaux pour la détection et les rapports, et FortiClient protège vos postes. Les services FortiGuard alimentent l’ensemble avec une intelligence des menaces à jour.</p>
          <p>Chez IKA SOLUTION, nous intégrons ces briques dans une démarche complète : durcissement, segmentation, supervision et réponse aux incidents.</p>
        </div>
        <a href="#contact" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Auditer ma sécurité réseau</a>
      </div>
      <div class="hidden lg:block">
        <img class="h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo ika_h('assets/images/securite.jpg'); ?>" alt="Supervision de la sécurité Fortinet">
      </div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Écosystème Fortinet</p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Gérer, analyser, sécuriser, se renseigner.</h2>
        <p class="mt-5 text-base leading-8 text-slate-600">Parcourez les composants qui entourent FortiGate : gestion centralisée, journalisation, protection des postes et intelligence des menaces.</p>
      </div>

      <div class="reveal mt-10 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-500"></span>
          <span class="ml-3 text-xs font-bold text-slate-500">Fortinet Security Fabric — vue d’ensemble</span>
        </div>
        <img class="block w-full" src="<?php echo ika_h('assets/images/fortinet.png'); ?>" alt="Écosystème Fortinet" loading="lazy">
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
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Audit &amp; architecture</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Analyse de votre exposition, dimensionnement des équipements et conception de la segmentation : nous posons les bases d’une défense cohérente.</p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-lg font-black text-white">02</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Déploiement &amp; migration</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Installation des FortiGate, politiques de sécurité, VPN et SD-WAN, intégration de FortiManager et FortiAnalyzer, sans interrompre les services.</p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">03</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Exploitation &amp; supervision</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Mises à jour FortiGuard, veille sur les journaux, gestion des incidents et rapports : votre sécurité reste pilotée et documentée.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ===================== CONTACT ===================== -->
  <section id="contact" class="bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Contact</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">Sécurisez votre réseau avec Fortinet.</h2>
        <p class="mt-5 max-w-xl text-base leading-8 text-white/85">Pare-feu, accès distants, SD-WAN ou supervision : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.</p>
      </div>
      <form class="relative grid gap-4 rounded-[2rem] bg-white p-7 text-ikaInk shadow-premium sm:p-8" action="contact-submit.php" method="post">
        <input type="hidden" name="type" value="contact">
        <input type="hidden" name="redirect" value="fortinet.php#contact">
        <input type="hidden" name="page" value="Fortinet">
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
            <option>FortiGate pare-feu NGFW</option>
            <option>Secure SD-WAN multi-sites</option>
            <option>VPN &amp; accès distants sécurisés</option>
            <option>FortiManager / FortiAnalyzer</option>
            <option>Protection des postes (FortiClient)</option>
            <option>Audit / supervision de la sécurité</option>
            <option>Autre demande liée à Fortinet</option>
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
