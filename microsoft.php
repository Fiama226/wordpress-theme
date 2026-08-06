<?php
/**
 * Page Microsoft — contenu rédigé en propre par IKA SOLUTION (août 2026).
 *
 * Page partenaire présentant Microsoft 365 (messagerie, collaboration,
 * sécurité, licences) et l’accompagnement IKA SOLUTION (conseil, déploiement,
 * administration). Reprend strictement le design de la page Proxmox.
 */

require __DIR__ . '/_partner-common.php';

/* ---------------------------------------------------------------------------
 * Microsoft 365 — onglets de fonctionnalités (textes originaux)
 * ------------------------------------------------------------------------- */
$ms_collab_tabs = array(
	array(
		'id'    => 'collaboration',
		'label' => 'Collaboration',
		'icon'  => '▢',
		'items' => array(
			array(
				'title' => 'Microsoft Teams',
				'text'  => 'Réunions, visioconférence, canaux, appels et partage de fichiers : toute l’équipe collabore en temps réel, au bureau comme à distance.',
			),
			array(
				'title' => 'SharePoint Online',
				'text'  => 'Sites d’équipe, bibliothèques de documents et intranets : les informations sont centralisées, classées et accessibles selon les droits.',
			),
			array(
				'title' => 'OneDrive & Exchange',
				'text'  => 'Stockage personnel dans le cloud et messagerie professionnelle avec calendrier : vos fichiers et vos échanges sont synchronisés et sécurisés.',
			),
		),
	),
	array(
		'id'    => 'productivite',
		'label' => 'Productivité',
		'icon'  => '⚙',
		'items' => array(
			array(
				'title' => 'Word, Excel, PowerPoint, Outlook',
				'text'  => 'Les applications Office installées sur vos postes ou accessibles sur le web vous permettent de créer et de partager vos documents partout.',
			),
			array(
				'title' => 'Travail simultané',
				'text'  => 'Plusieurs personnes éditent le même document en même temps, avec l’historique des versions et la restauration simple en cas de besoin.',
			),
			array(
				'title' => 'Power Automate & Power Apps',
				'text'  => 'Automatisez les tâches répétitives et créez de petites applications métier pour simplifier les processus de vos équipes.',
			),
		),
	),
	array(
		'id'    => 'securite',
		'label' => 'Sécurité',
		'icon'  => '🛡',
		'items' => array(
			array(
				'title' => 'Microsoft Defender',
				'text'  => 'Protection contre le phishing et les pièces jointes malveillantes pour la messagerie, et détection étendue sur les postes (EDR).',
			),
			array(
				'title' => 'Microsoft Entra ID',
				'text'  => 'Gérez les identités et les accès avec l’authentification multi-facteur et les politiques d’accès conditionnel.',
			),
			array(
				'title' => 'Protection des données',
				'text'  => 'Détection de fuite, classification et contrôle des informations sensibles pour renforcer la conformité de vos échanges.',
			),
		),
	),
);

/* ---------------------------------------------------------------------------
 * Plans & licences — onglets (textes originaux)
 * ------------------------------------------------------------------------- */
$ms_plans_tabs = array(
	array(
		'id'    => 'business',
		'label' => 'Plans Business',
		'icon'  => '▤',
		'items' => array(
			array(
				'title' => 'Business Basic',
				'text'  => 'Messagerie, Teams et applications Office en version web, pour les équipes qui collaborent essentiellement en ligne.',
			),
			array(
				'title' => 'Business Standard',
				'text'  => 'Ajoute les applications Office installées (Word, Excel…) sur jusqu’à cinq appareils, pour une productivité complète.',
			),
			array(
				'title' => 'Business Premium',
				'text'  => 'Renforce la sécurité : Intune pour la gestion des appareils, Defender pour la messagerie et les postes, et accès conditionnel.',
			),
		),
	),
	array(
		'id'    => 'enterprise',
		'label' => 'Plans Enterprise',
		'icon'  => '🏗',
		'items' => array(
			array(
				'title' => 'Microsoft 365 E3',
				'text'  => 'La base pour les organisations : Office, messagerie, Teams, identité et sécurité essentielles, avec des add-ons modulaires.',
			),
			array(
				'title' => 'Microsoft 365 E5',
				'text'  => 'Sécurité et conformité avancées : EDR, audit enrichi, eDiscovery, téléphonie Teams et outils de gestion des risques.',
			),
			array(
				'title' => 'Des combinaisons sur mesure',
				'text'  => 'Mixez les licences selon les profils et les risques : la plupart des équipes n’ont pas besoin du niveau maximum partout.',
			),
		),
	),
	array(
		'id'    => 'administration',
		'label' => 'Administration',
		'icon'  => '⚙',
		'items' => array(
			array(
				'title' => 'Centre d’administration',
				'text'  => 'Créez des comptes, attribuez des licences, gérez les groupes et les paramètres depuis une console unique.',
			),
			array(
				'title' => 'Migration & réplication',
				'text'  => 'Importez vos boîtes mail, vos documents et vos identités existants pour une transition fluide vers Microsoft 365.',
			),
			array(
				'title' => 'Support & supervision',
				'text'  => 'Nous assurons l’administration courante, la supervision, la gestion des licences et l’accompagnement de vos utilisateurs.',
			),
		),
	),
);

$pageTitle = 'Microsoft 365 | IKA SOLUTION LTD';
$pageDescription = 'Microsoft 365 : messagerie, collaboration, productivité et sécurité. IKA SOLUTION, partenaire Microsoft, assure conseil, fourniture de licences, déploiement et administration.';
include 'header.php';
?>

<main class="bg-white pt-32">

  <!-- ===================== HERO ===================== -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full  opacity-25" src="<?php echo ika_h('assets/images/ms365_backgroundImage.jpg'); ?>" alt="Productivité et collaboration avec Microsoft 365">
      <div class="absolute inset-0 bg-ikaBlueDark/80" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo ika_h('index.php#expertises'); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>Retour aux expertises</a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200">Productivité &amp; collaboration</p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl">Microsoft 365 : la plateforme de travail de vos équipes.</h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85">IKA SOLUTION, partenaire Microsoft, accompagne la fourniture, le déploiement et l’administration de Microsoft 365 — messagerie, collaboration, sécurité et licences — pour des équipes efficaces et protégées.</p>
        <div class="mt-8 flex flex-wrap gap-3">
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Exchange</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Teams</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">SharePoint</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">OneDrive</span>
        </div>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="#contact" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Parler à un expert Microsoft</a>
          <a href="#m365" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Découvrir Microsoft 365</a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem]  shadow-premium" src="<?php echo ika_h('assets/images/ms365_backgroundImage.jpg'); ?>" alt="Vos équipes au travail avec Microsoft 365">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed">Microsoft 365</p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark">Collaboration &amp; sécurité</p>
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
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Microsoft 365</p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Une seule suite pour collaborer, produire et sécuriser.</h2>
          <p class="mt-5 text-base leading-8 text-slate-600">Microsoft 365 réunit messagerie, réunions, stockage, partage et applications Office dans une suite cohérente. Vos équipes travaillent ensemble, où qu’elles soient, avec des outils qui s’intègrent les uns aux autres.</p>
          <p class="mt-4 text-base leading-8 text-slate-600">Chez IKA SOLUTION, nous vous conseillons la bonne formule, migrons vos données et administrons l’environnement pour que vos collaborateurs adoptent la suite sereinement.</p>

        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500">Microsoft 365 — applications reliées</span>
          </div>
          <img class="block w-full" src="<?php echo ika_h('assets/images/Microsoft_365_app.jpg'); ?>" alt="Microsoft 365 : messagerie, collaboration et sécurité" loading="lazy">
        </div>
      </div>

      <?php ika_partner_render_tabs( 'ms-collab', $ms_collab_tabs ); ?>
    </div>
  </section>

  <!-- ===================== SÉCURITÉ ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <img class="h-12 w-auto" src="<?php echo ika_h('assets/images/microsoft.png'); ?>" alt="Microsoft" loading="lazy">
        <div>
          <h3 class="text-2xl font-black">Une sécurité intégrée, du compte au poste de travail.</h3>
          <p class="mt-3 text-sm leading-7 text-white/80">Authentification multi-facteur, accès conditionnel, protection de la messagerie et des postes : Microsoft 365 embarque les fondations de la sécurité de vos équipes.</p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="https://www.microsoft.com/fr-fr/microsoft-365" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700">Découvrir Microsoft 365</a>
          <a href="https://www.microsoft.com/fr-fr/microsoft-365/compare-microsoft-365-business-plans" target="_blank" rel="noopener" class="inline-flex rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Comparer les offres</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== PLANS & LICENCES ===================== -->
  <section id="plans" class="relative overflow-hidden bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-20" src="<?php echo ika_h('assets/images/support2.png'); ?>" alt="Licences Microsoft 365">
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Plans &amp; licences</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">Choisir la bonne formule, sans surpayer.</h2>
        <div class="mt-6 grid max-w-3xl gap-4 text-base leading-8 text-white/85">
          <p>Des plans Business (Basic, Standard, Premium) aux plans Enterprise (E3, E5), les licences Microsoft 365 se choisissent selon vos usages : collaboration, applications Office, sécurité et conformité.</p>
          <p>Chez IKA SOLUTION, nous réalisons une revue de vos licences pour éviter les doublons, aligner les droits sur les besoins et maîtriser vos coûts de renouvellement.</p>
        </div>
        <a href="#contact" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Optimiser mes licences</a>
      </div>
      <div class="hidden lg:block">
        <img class="h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo ika_h('assets/images/support2.png'); ?>" alt="Administration de Microsoft 365">
      </div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Plans &amp; licences</p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Comprendre les offres, administrer simplement.</h2>
        <p class="mt-5 text-base leading-8 text-slate-600">Parcourez les familles de plans Microsoft 365 et les services d’administration que nous mettons en place pour vous.</p>
      </div>

      <div class="reveal mt-10 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-500"></span>
          <span class="ml-3 text-xs font-bold text-slate-500">Microsoft 365 — vue d’ensemble des plans</span>
        </div>
        <img class="block w-full h-full" src="<?php echo ika_h('assets/images/Microsoft-365-Business-Compare.jpg'); ?>" alt="Plans Microsoft 365" loading="lazy">
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
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Conseil &amp; revue des licences</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Analyse de vos usages, choix des plans et optimisation des licences existantes pour aligner vos coûts sur vos besoins réels.</p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-lg font-black text-white">02</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Déploiement &amp; migration</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Création des comptes, migration des boîtes mail et des documents, configuration de Teams et des politiques de sécurité, sans coupure majeure.</p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">03</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Administration &amp; formation</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Gestion quotidienne, support utilisateur, supervision et formation pour que vos équipes adoptent la suite en autonomie.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ===================== CONTACT ===================== -->
  <section id="contact" class="bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Contact</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">Équipez vos équipes avec Microsoft 365.</h2>
        <p class="mt-5 max-w-xl text-base leading-8 text-white/85">Licences, migration, collaboration ou sécurité : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.</p>
      </div>
      <form class="relative grid gap-4 rounded-[2rem] bg-white p-7 text-ikaInk shadow-premium sm:p-8" action="contact-submit.php" method="post">
        <input type="hidden" name="type" value="contact">
        <input type="hidden" name="redirect" value="microsoft.php#contact">
        <input type="hidden" name="page" value="Microsoft 365">
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
            <option>Microsoft 365 — plans Business</option>
            <option>Microsoft 365 — plans Enterprise</option>
            <option>Migration / déploiement Microsoft 365</option>
            <option>Messagerie Exchange &amp; Teams</option>
            <option>SharePoint / intranet</option>
            <option>Sécurité &amp; conformité (Defender, Entra ID)</option>
            <option>Revue &amp; optimisation des licences</option>
            <option>Autre demande liée à Microsoft</option>
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
