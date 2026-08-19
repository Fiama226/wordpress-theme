<?php
/**
 * Page Zimbra — contenu rédigé en propre par IKA SOLUTION (août 2026).
 *
 * Page partenaire présentant Zimbra (messagerie, calendrier, chat, fichiers
 * et bureautique) et l’accompagnement IKA SOLUTION (audit, déploiement,
 * migration, administration). Reprend strictement le design de la page Proxmox.
 */

require __DIR__ . '/_partner-common.php';

/* ---------------------------------------------------------------------------
 * Zimbra Collaboration — onglets de fonctionnalités (textes originaux)
 * ------------------------------------------------------------------------- */
$zim_collab_tabs = array(
	array(
		'id'    => 'messagerie',
		'label' => 'Email & calendrier',
		'icon'  => '✉',
		'items' => array(
			array(
				'title' => 'Messagerie professionnelle',
				'text'  => 'Une interface claire pour classer, rechercher et partager vos emails. Dossiers, filtres, recherche avancée et pièces jointes restent simples à piloter au quotidien.',
			),
			array(
				'title' => 'Calendrier d’équipe',
				'text'  => 'Planifiez réunions, rappels et ressources (salles, équipements) avec des calendriers partagés, visibles entre services et accessibles depuis le web ou le mobile.',
			),
			array(
				'title' => 'Contacts & carnet d’adresses',
				'text'  => 'Carnets personnels, listes de distribution et annuaire global (GAL) : vos équipes retrouvent rapidement les bons interlocuteurs, en interne comme à l’extérieur.',
			),
		),
	),
	array(
		'id'    => 'collaboration',
		'label' => 'Collaboration',
		'icon'  => '▢',
		'items' => array(
			array(
				'title' => 'Briefcase : fichiers centralisés',
				'text'  => 'Stockez, organisez et partagez vos documents dans Zimbra, avec des droits précis, un historique de versions et un accès depuis l’email, le chat ou le calendrier.',
			),
			array(
				'title' => 'Chat d’entreprise',
				'text'  => 'Conversations individuelles, groupes, canaux et partage de fichiers : le chat reste dans le même environnement sécurisé que votre messagerie, sans outil tiers.',
			),
			array(
				'title' => 'Zimbra Office',
				'text'  => 'Créez et éditez documents, tableurs et présentations dans le navigateur, avec collaboration en temps réel et compatibilité des formats courants (docx, xlsx, pptx, odt…).',
			),
		),
	),
	array(
		'id'    => 'acces',
		'label' => 'Accès partout',
		'icon'  => '⇄',
		'items' => array(
			array(
				'title' => 'Client web moderne',
				'text'  => 'L’interface responsive fonctionne sur ordinateur, tablette et smartphone : la même expérience, sans installer de logiciel, avec un mode hors ligne sur les navigateurs courants.',
			),
			array(
				'title' => 'Mobile (ActiveSync)',
				'text'  => 'Email, calendrier, contacts et tâches se synchronisent en temps réel sur iOS et Android via Exchange ActiveSync, avec des politiques de gestion des appareils.',
			),
			array(
				'title' => 'Outlook, EWS et bureau',
				'text'  => 'Zimbra Connector for Outlook, Exchange Web Services et le client Desktop permettent de travailler dans vos outils habituels, y compris hors connexion.',
			),
		),
	),
);

/* ---------------------------------------------------------------------------
 * Éditions & administration — onglets (textes originaux)
 * ------------------------------------------------------------------------- */
$zim_plans_tabs = array(
	array(
		'id'    => 'standard',
		'label' => 'Édition Standard',
		'icon'  => '▤',
		'items' => array(
			array(
				'title' => 'Le socle collaboratif',
				'text'  => 'Interface moderne, messagerie, calendrier, tâches, Briefcase, Zimbra Office, clients POP/IMAP, CalDAV et ActiveSync : l’essentiel pour équiper vos équipes.',
			),
			array(
				'title' => 'Administration complète',
				'text'  => 'Console web, ligne de commande, anti-spam et antivirus intégrés, annuaires LDAP et Active Directory : la plateforme se pilote sans complexité inutile.',
			),
			array(
				'title' => 'Un coût maîtrisé',
				'text'  => 'L’édition Standard couvre la majorité des usages quotidiens. Nous vous aidons à démarrer dessus puis à passer en Professional uniquement si vos besoins l’exigent.',
			),
		),
	),
	array(
		'id'    => 'professional',
		'label' => 'Édition Professional',
		'icon'  => '🏗',
		'items' => array(
			array(
				'title' => 'Interopérabilité Exchange',
				'text'  => 'L’édition Professional ajoute l’interopérabilité Microsoft Exchange (calendrier et contacts) et des connecteurs avancés pour cohabiter avec un existant Outlook.',
			),
			array(
				'title' => 'Sécurité et conformité',
				'text'  => 'Authentification à deux facteurs, chiffrement S/MIME, SSO SAML, archivage opposable et politiques mobiles (autoriser, bloquer, mettre en quarantaine) renforcent le contrôle.',
			),
			array(
				'title' => 'Pour les organisations exigeantes',
				'text'  => 'Multi-tenant, administration déléguée et stockage hiérarchique (HSM) : Professional convient aux institutions, opérateurs et entreprises à forte volumétrie.',
			),
		),
	),
	array(
		'id'    => 'administration',
		'label' => 'Administration',
		'icon'  => '⚙',
		'items' => array(
			array(
				'title' => 'Console et délégation',
				'text'  => 'Créez des domaines, des comptes et des politiques depuis une console unique. Déléguez des rôles par service tout en gardant une supervision centrale.',
			),
			array(
				'title' => 'Déploiement à votre convenance',
				'text'  => 'On-premises, cloud privé ou hybride : Zimbra s’installe où vos données doivent rester. Nous dimensionnons l’architecture selon votre volume et vos contraintes.',
			),
			array(
				'title' => 'Migration & exploitation',
				'text'  => 'Import des boîtes existantes, sauvegardes, supervision et montées de version : IKA SOLUTION administre la plateforme et forme vos équipes à l’exploiter.',
			),
		),
	),
);

$pageTitle = 'Zimbra | IKA SOLUTION LTD';
$pageDescription = 'Zimbra : messagerie, calendrier, chat et collaboration sous votre contrôle. IKA SOLUTION, partenaire Zimbra, assure déploiement, migration, hébergement local et support.';
include 'header.php';
?>

<main class="bg-white pt-32">

  <!-- ===================== HERO ===================== -->
  <section class="relative overflow-hidden bg-ikaBlueDark text-white">
    <div class="absolute inset-0">
      <img class="h-full w-full  opacity-25" src="<?php echo ika_h('assets/images/zimbra_background.jpg'); ?>" alt="Messagerie et collaboration avec Zimbra">
      <div class="absolute inset-0 bg-ikaBlueDark/80" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid min-h-[560px] max-w-7xl gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <a href="<?php echo ika_h('index.php#expertises'); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>Retour aux expertises</a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200">Messagerie &amp; collaboration</p>
        <h1 class="mt-4 text-4xl font-black leading-tight tracking-normal sm:text-5xl lg:text-6xl">Zimbra : votre messagerie, vos données, vos règles.</h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/85">IKA SOLUTION, partenaire Zimbra, déploie et administre Zimbra — messagerie, calendrier, chat, fichiers et bureautique — en local, en cloud privé ou en hybride, pour une souveraineté complète de vos communications.</p>
        <div class="mt-8 flex flex-wrap gap-3">
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Email</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Calendrier</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Chat</span>
          <span class="rounded-full bg-white px-5 py-3 text-sm font-black text-ikaBlue">Briefcase</span>
        </div>
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="#contact" class="inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Parler à un expert Zimbra</a>
          <a href="#zimbra-suite" class="inline-flex rounded-full border border-white/25 bg-white/10 px-7 py-4 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Découvrir Zimbra</a>
        </div>
      </div>
      <div class="hidden lg:block">
        <div class="relative">
          <div class="absolute -left-5 -top-5 h-28 w-28 rounded-3xl bg-ikaRed"></div>
          <img class="relative h-[430px] w-full rounded-[2rem]  shadow-premium" src="<?php echo ika_h('assets/images/zimbra_background.jpg'); ?>" alt="Vos équipes collaborent avec Zimbra">
          <div class="absolute -bottom-6 right-6 rounded-2xl bg-white p-5 text-ikaInk shadow-premium">
            <p class="text-sm font-black uppercase tracking-[0.16em] text-ikaRed">Souveraineté</p>
            <p class="mt-2 text-2xl font-black text-ikaBlueDark">Vos données, vos règles</p>
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
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Zimbra Collaboration</p>
          <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Email, calendrier, chat et fichiers dans une seule plateforme.</h2>
          <p class="mt-5 text-base leading-8 text-slate-600">Zimbra réunit messagerie, calendrier, contacts, chat, Briefcase et bureautique dans une interface unique. Construit sur des standards ouverts, il s’intègre à vos outils existants sans vous enfermer dans un écosystème propriétaire.</p>
          <p class="mt-4 text-base leading-8 text-slate-600">Chez IKA SOLUTION, nous déployons Zimbra là où vos données doivent rester : serveur local, cloud privé ou architecture hybride, avec un accompagnement de la migration jusqu’à l’exploitation.</p>
        </div>
        <div class="reveal overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium">
          <div class="flex items-center gap-2 border-b border-slate-100 bg-white px-5 py-3">
            <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
            <span class="h-3 w-3 rounded-full bg-amber-400"></span>
            <span class="h-3 w-3 rounded-full bg-green-500"></span>
            <span class="ml-3 text-xs font-bold text-slate-500">Zimbra — client web de collaboration</span>
          </div>
          <img class="block w-full" src="<?php echo ika_h('assets/images/zimbra_webclient.png'); ?>" alt="Zimbra : messagerie, calendrier et collaboration" loading="lazy">
        </div>
      </div>

      <?php ika_partner_render_tabs( 'zim-collab', $zim_collab_tabs ); ?>
    </div>
  </section>

  <!-- ===================== SOUVERAINETÉ ===================== -->
  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 rounded-[2rem] bg-ikaBlueDark p-8 text-white shadow-premium sm:p-10 lg:grid-cols-[auto_1fr_auto] lg:items-center">
        <img class="h-12 w-auto" src="<?php echo ika_h('assets/images/zimbra.png'); ?>" alt="Zimbra" loading="lazy">
        <div>
          <h3 class="text-2xl font-black">Open source, standards ouverts, zéro enfermement.</h3>
          <p class="mt-3 text-sm leading-7 text-white/80">Le code de Zimbra est ouvert et auditable. Vous choisissez où vivent vos boîtes mail — on-premises, cloud privé ou datacenter régional — pour rester maître de la conformité, de la résidence des données et des coûts de licence.</p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="https://www.zimbra.com/" target="_blank" rel="noopener" class="inline-flex rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700">Découvrir Zimbra</a>
          <a href="https://www.zimbra.com/product/edition-comparison/" target="_blank" rel="noopener" class="inline-flex rounded-full border border-white/25 bg-white/10 px-6 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Comparer les éditions</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== ÉDITIONS ===================== -->
  <section id="editions" class="relative overflow-hidden bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="absolute inset-0">
      <img class="h-full w-full object-cover opacity-20" src="<?php echo ika_h('assets/images/zimbra_background.jpg'); ?>" alt="Éditions Zimbra">
      <div class="absolute inset-0 bg-ikaBlueDark/85" aria-hidden="true"></div>
    </div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Éditions Standard &amp; Professional</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">Choisir le bon niveau, selon vos usages.</h2>
        <div class="mt-6 grid max-w-3xl gap-4 text-base leading-8 text-white/85">
          <p>Zimbra Daffodil (v10) se décline en Standard et Professional. Les deux partagent le même socle collaboratif ; Professional ajoute l’interopérabilité Exchange, des options de sécurité avancées et une administration plus fine.</p>
          <p>Chez IKA SOLUTION, nous cadrons le volume, les contraintes réglementaires et les outils existants pour que vous ne payiez que ce dont vos équipes ont réellement besoin.</p>
        </div>
        <a href="#contact" class="mt-8 inline-flex rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700">Évaluer mes besoins Zimbra</a>
      </div>
      <div class="hidden lg:block">
        <img class="h-[400px] w-full rounded-[2rem] object-cover shadow-premium" src="<?php echo ika_h('assets/images/zimbra_background.jpg'); ?>" alt="Accompagnement Zimbra par IKA SOLUTION">
      </div>
    </div>
  </section>

  <section class="bg-ikaSoft py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Éditions &amp; administration</p>
        <h2 class="mt-4 text-3xl font-black leading-tight text-ikaBlueDark sm:text-4xl">Standard, Professional, et une console claire.</h2>
        <p class="mt-5 text-base leading-8 text-slate-600">Parcourez les éditions Zimbra et les services d’administration que nous mettons en place pour vous.</p>
      </div>

      <div class="reveal mt-10 overflow-hidden rounded-[2rem] bg-white shadow-premium">
        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3">
          <span class="h-3 w-3 rounded-full bg-ikaRed"></span>
          <span class="h-3 w-3 rounded-full bg-amber-400"></span>
          <span class="h-3 w-3 rounded-full bg-green-500"></span>
          <span class="ml-3 text-xs font-bold text-slate-500">Zimbra — vue d’ensemble des éditions</span>
        </div>
        <img class="block w-full h-full" src="<?php echo ika_h('assets/images/zimbra_editions.png'); ?>" alt="Éditions Zimbra Standard et Professional" loading="lazy">
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
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Audit &amp; architecture</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Volume de boîtes, contraintes de résidence des données et choix Standard/Professional : nous posons une architecture réaliste avant toute installation.</p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaRed text-lg font-black text-white">02</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Déploiement &amp; migration</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Installation, import des boîtes existantes, DNS, certificats et politiques de sécurité : la bascule se prépare pour limiter l’interruption de service.</p>
        </article>
        <article class="reveal flex h-full flex-col rounded-2xl bg-ikaSoft p-8 shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-ikaBlue text-lg font-black text-white">03</span>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Exploitation &amp; formation</h3>
          <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">Supervision, sauvegardes, montées de version et formation des utilisateurs : vos équipes pilotent Zimbra en autonomie et en confiance.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ===================== CONTACT ===================== -->
  <section id="contact" class="bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Contact</p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl">Parlez-nous de votre projet Zimbra.</h2>
        <p class="mt-5 max-w-xl text-base leading-8 text-white/85">Messagerie, calendrier, migration ou hébergement local : décrivez votre besoin, un expert IKA SOLUTION vous répond avec une proposition claire et chiffrée.</p>
      </div>
      <form class="relative grid gap-4 rounded-[2rem] bg-white p-7 text-ikaInk shadow-premium sm:p-8" action="contact-submit.php" method="post">
        <input type="hidden" name="type" value="contact">
        <input type="hidden" name="redirect" value="zimbra.php#contact">
        <input type="hidden" name="page" value="Zimbra">
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
            <option>Messagerie Zimbra (email &amp; calendrier)</option>
            <option>Chat &amp; collaboration</option>
            <option>Briefcase &amp; bureautique</option>
            <option>Édition Standard</option>
            <option>Édition Professional</option>
            <option>Migration depuis Exchange / autre messagerie</option>
            <option>Hébergement local / souveraineté des données</option>
            <option>Autre demande liée à Zimbra</option>
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
