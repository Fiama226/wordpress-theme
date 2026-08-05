<?php
/**
 * Page Palo Alto Networks — contenu rédigé en propre par IKA SOLUTION (août 2026).
 *
 * Page partenaire présentant Palo Alto Networks (Strata NGFW, Prisma, Cortex,
 * GlobalProtect, WildFire) et l’accompagnement IKA SOLUTION (audit, déploiement,
 * administration, supervision). Reprend strictement le design de la page Proxmox.
 */

require __DIR__ . '/_partner-common.php';

/* ---------------------------------------------------------------------------
 * Strata NGFW — onglets de fonctionnalités (textes originaux)
 * ------------------------------------------------------------------------- */
$palo_ngfw_tabs = array(
	array(
		'id'    => 'appid',
		'label' => 'App-ID & utilisateurs',
		'icon'  => '▢',
		'items' => array(
			array(
				'title' => 'App-ID : identifier les applications',
				'text'  => 'Le pare-feu identifie les applications par leur trafic réel, pas seulement par le port, même quand elles se déguisent ou utilisent le chiffrement.',
			),
			array(
				'title' => 'Politiques par application',
				'text'  => 'Autorisez, bloquez ou restreignez chaque application selon vos besoins, indépendamment du port ou du protocole, pour un contrôle fin.',
			),
			array(
				'title' => 'User-ID & Device-ID',
				'text'  => 'Les politiques s’appliquent aux utilisateurs et aux appareils (via Active Directory, LDAP ou agents) plutôt qu’aux seules adresses IP.',
			),
		),
	),
	array(
		'id'    => 'prevention',
		'label' => 'Prévention des menaces',
		'icon'  => '🛡',
		'items' => array(
			array(
				'title' => 'Threat Prevention',
				'text'  => 'IPS, antivirus et anti-spyware intégrés bloquent exploits, malwares et tentatives de vol d’identifiants à l’aide de signatures et d’heuristiques.',
			),
			array(
				'title' => 'WildFire',
				'text'  => 'Les fichiers suspects sont exécutés en environnement isolé (sandbox cloud) pour détecter les menaces inconnues et les variantes zero-day.',
			),
			array(
				'title' => 'Filtrage d’URL & DNS Security',
				'text'  => 'Les catégories de sites et les domaines malveillants sont bloqués à la navigation et au niveau DNS, pour réduire la surface d’exposition.',
			),
		),
	),
	array(
		'id'    => 'acces',
		'label' => 'Accès distant',
		'icon'  => '⇄',
		'items' => array(
			array(
				'title' => 'GlobalProtect',
				'text'  => 'Le client VPN crée un tunnel sécurisé vers le réseau ou le cloud et applique des contrôles de conformité sur l’appareil avant l’accès.',
			),
			array(
				'title' => 'Accès Zero Trust',
				'text'  => 'Chaque connexion est vérifiée selon l’utilisateur, l’appareil et le contexte, pour accorder un accès minimal et maîtrisé.',
			),
			array(
				'title' => 'Même protection, partout',
				'text'  => 'Le télétravailleur bénéficie de la même prévention des menaces et des mêmes politiques qu’au bureau, quel que soit son point d’accès.',
			),
		),
	),
	array(
		'id'    => 'pilotage',
		'label' => 'PAN-OS & Panorama',
		'icon'  => '📈',
		'items' => array(
			array(
				'title' => 'PAN-OS',
				'text'  => 'Le système d’exploitation du pare-feu unifie règles, prévention des menaces, filtrage d’URL et journaux dans une interface cohérente.',
			),
			array(
				'title' => 'Panorama',
				'text'  => 'La gestion centralisée déploie des politiques et des configurations sur l’ensemble des pare-feux, avec des rapports consolidés.',
			),
			array(
				'title' => 'Intelligence intégrée',
				'text'  => 'Les signatures et l’apprentissage machine mettent à jour automatiquement le pare-feu avec les dernières informations sur les menaces.',
			),
		),
	),
);

/* ---------------------------------------------------------------------------
 * Cloud & opérations — onglets (textes originaux)
 * ------------------------------------------------------------------------- */
$palo_cloud_tabs = array(
	array(
		'id'    => 'prisma-access',
		'label' => 'Prisma Access (SASE)',
		'icon'  => '☁',
		'items' => array(
			array(
				'title' => 'Un accès sécurisé dans le cloud',
				'text'  => 'Prisma Access fournit une protection identique aux utilisateurs où qu’ils soient, via une infrastructure cloud de type SASE.',
			),
			array(
				'title' => 'SSE & protection web',
				'text'  => 'Contrôle applicatif, filtrage web, protection contre les menaces et prévention de fuite de données s’appliquent au trafic internet et SaaS.',
			),
			array(
				'title' => 'SD-WAN cloud',
				'text'  => 'Les sites et les utilisateurs se connectent au cloud sécurisé, avec un routage intelligent selon les applications.',
			),
		),
	),
	array(
		'id'    => 'prisma-cloud',
		'label' => 'Prisma Cloud',
		'icon'  => '▤',
		'items' => array(
			array(
				'title' => 'Sécurité du cloud et du code',
				'text'  => 'Prisma Cloud couvre les workloads cloud, les conteneurs, Kubernetes et le code applicatif pour sécuriser l’ensemble du cycle de développement.',
			),
			array(
				'title' => 'Protection multi-cloud',
				'text'  => 'Visibilité et conformité sur AWS, Azure, Google Cloud et autres environnements, avec détection et réponse aux menaces.',
			),
			array(
				'title' => 'Gouvernance des accès',
				'text'  => 'Les identités et les permissions cloud sont analysées pour prévenir les mauvaises configurations et les accès trop larges.',
			),
		),
	),
	array(
		'id'    => 'cortex',
		'label' => 'Cortex',
		'icon'  => '⚙',
		'items' => array(
			array(
				'title' => 'Détection et réponse (XDR)',
				'text'  => 'Cortex XDR corrèle les données des endpoints, du réseau et du cloud pour détecter et bloquer des attaques complexes.',
			),
			array(
				'title' => 'Automatisation des opérations',
				'text'  => 'Les alertes sont triées et les actions de remédiation automatisées pour accélérer la réponse aux incidents.',
			),
			array(
				'title' => 'Investigation accélérée',
				'text'  => 'La vue unifiée des évènements réduit le temps d’analyse et aide vos équipes à comprendre rapidement ce qui s’est passé.',
			),
		),
	),
);

$pageTitle = 'Palo Alto Networks | IKA SOLUTION LTD';
$pageDescription = 'Palo Alto Networks : pare-feu nouvelle génération Strata, Prisma (SASE/cloud) et Cortex pour sécuriser réseau, accès et cloud. IKA SOLUTION, partenaire Palo Alto, assure audit, déploiement et administration.';
include 'header.php';
?>

<main class="bg-white pt-32">

  <!-- ===================== HERO ===================== -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-25" src="<?php echo ika_h('assets/images/securite.jpg'); ?>" alt="Cybersécurité Palo Alto Networks">
      <div class="absolute inset-0 bg-ikaBlueDark/80" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo ika_h('index.php#expertises'); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>Retour aux expertises</a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200">Cybersécurité nouvelle génération</p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl">Palo Alto Networks : une sécurité pilotée par les applications.</h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85">IKA SOLUTION, partenaire Palo Alto Networks, déploie et administre les pare-feux Strata (PAN-OS), les solutions Prisma (SASE et cloud) et Cortex pour protéger votre réseau, vos accès et vos environnements cloud.</p>
        <div class="mt-8 flex flex-wrap gap-3">
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Strata NGFW</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Prisma Access</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Cortex</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">GlobalProtect</span>
        </div>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="#contact" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Parler à un expert Palo Alto</a>
          <a href="#strata" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Découvrir la plateforme</a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo ika_h('assets/images/securite.jpg'); ?>" alt="Pare-feu nouvelle génération Palo Alto Networks">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed">PAN-OS</p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark">NGFW &amp; cloud</p>
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
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Strata NGFW</p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Un pare-feu qui comprend le trafic applicatif.</h2>
          <p class="mt-5 text-base leading-8 text-slate-600">Les pare-feux Palo Alto identifient le trafic par application, utilisateur et contenu grâce à App-ID, User-ID et Content-ID. Les menaces connues et inconnues sont bloquées, y compris dans le trafic chiffré.</p>
          <p class="mt-4 text-base leading-8 text-slate-600">Chez IKA SOLUTION, nous déployons ces équipements avec une segmentation cohérente et une supervision continue pour protéger vos accès et vos données.</p>
          <div class="mt-6 flex flex-wrap items-center gap-6">
            <img class="h-12 w-auto opacity-80 transition hover:opacity-100" src="<?php echo ika_h('assets/images/paloalto.svg'); ?>" alt="Palo Alto Networks" loading="lazy">
            <img class="h-8 w-auto opacity-60 transition hover:opacity-100" src="<?php echo ika_h('assets/images/partenaires/PaloAltoNetworks_2020_Logo.svg'); ?>" alt="Logo Palo Alto Networks" loading="lazy">
          </div>
        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500">Palo Alto Networks — sécurité pilotée par les applications</span>
          </div>
          <img class="block w-full" src="<?php echo ika_h('assets/images/paloalto.svg'); ?>" alt="Strata : pare-feu nouvelle génération" loading="lazy">
        </div>
      </div>

      <?php ika_partner_render_tabs( 'palo-ngfw', $palo_ngfw_tabs ); ?>
    </div>
  </section>

  <!-- ===================== PRISMA / CORTEX ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <img class="h-12 w-auto" src="<?php echo ika_h('assets/images/paloalto.svg'); ?>" alt="Palo Alto Networks" loading="lazy">
        <div>
          <h3 class="text-2xl font-black">Du réseau au cloud, jusqu’aux opérations de sécurité.</h3>
          <p class="mt-3 text-sm leading-7 text-white/80">Prisma Access sécurise les accès et le cloud, Prisma Cloud protège les workloads et Cortex automatise la détection et la réponse. La plateforme couvre tout le périmètre digital.</p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="https://www.paloaltonetworks.com/products" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700">Gamme Palo Alto</a>
          <a href="https://www.paloaltonetworks.com/support" target="_blank" rel="noopener" class="inline-flex rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Support &amp; services</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== CLOUD & OPÉRATIONS ===================== -->
  <section id="cloud-operations" class="relative overflow-hidden bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-20" src="<?php echo ika_h('assets/images/cloud2.jpg'); ?>" alt="Cloud et opérations de sécurité">
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Cloud &amp; opérations</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">Sécuriser le cloud, analyser et répondre.</h2>
        <div class="mt-6 grid max-w-3xl gap-4 text-base leading-8 text-white/85">
          <p>Prisma Access apporte une protection SASE aux utilisateurs et aux sites, Prisma Cloud protège les workloads et les environnements multi-cloud, et Cortex automatise la détection et la réponse aux incidents.</p>
          <p>Chez IKA SOLUTION, nous intégrons ces solutions selon votre maturité : renforcer le pare-feu, sécuriser le cloud ou moderniser vos opérations de sécurité.</p>
        </div>
        <a href="#contact" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Renforcer ma cybersécurité</a>
      </div>
      <div class="hidden lg:block">
        <img class="h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo ika_h('assets/images/cloud2.jpg'); ?>" alt="Sécurité cloud Palo Alto Networks">
      </div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Cloud &amp; opérations</p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Accéder, protéger, répondre.</h2>
        <p class="mt-5 text-base leading-8 text-slate-600">Parcourez les briques qui étendent le pare-feu : SASE, sécurité cloud-native et opérations de sécurité pilotées par les données.</p>
      </div>

      <div class="reveal mt-10 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-500"></span>
          <span class="ml-3 text-xs font-bold text-slate-500">Plateforme Palo Alto Networks — vue d’ensemble</span>
        </div>
        <img class="block w-full" src="<?php echo ika_h('assets/images/paloalto.svg'); ?>" alt="Plateforme Palo Alto Networks" loading="lazy">
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
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Audit &amp; design</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Analyse de votre exposition, cartographie des applications et dimensionnement des pare-feux : nous concevons une architecture cohérente.</p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-lg font-black text-white">02</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Déploiement &amp; configuration</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Installation des équipements, politiques de sécurité, GlobalProtect et Panorama, avec intégration de vos annuaires, sans coupure des services.</p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">03</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Exploitation &amp; supervision</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Veille, mise à jour des signatures, gestion des incidents et formation de vos équipes : la plateforme reste performante et documentée.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ===================== CONTACT ===================== -->
  <section id="contact" class="bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Contact</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">Protégez votre réseau et votre cloud avec Palo Alto.</h2>
        <p class="mt-5 max-w-xl text-base leading-8 text-white/85">Pare-feu, accès distant, cloud ou opérations de sécurité : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.</p>
      </div>
      <form class="relative grid gap-4 rounded-[2rem] bg-white p-7 text-ikaInk shadow-premium sm:p-8" action="contact-submit.php" method="post">
        <input type="hidden" name="type" value="contact">
        <input type="hidden" name="redirect" value="paloalto.php#contact">
        <input type="hidden" name="page" value="Palo Alto Networks">
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
            <option>Pare-feu Strata (PAN-OS)</option>
            <option>GlobalProtect &amp; accès distant</option>
            <option>Prisma Access (SASE)</option>
            <option>Sécurité cloud (Prisma Cloud)</option>
            <option>Détection &amp; réponse (Cortex)</option>
            <option>Audit / supervision de la sécurité</option>
            <option>Autre demande liée à Palo Alto</option>
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
