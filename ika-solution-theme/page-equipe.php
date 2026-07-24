<?php /* Template Name: Equipe */ ?>
<?php
  $pageTitle = 'Équipe | IKA SOLUTION LTD';
  $pageDescription = "Découvrez l'équipe d'IKA SOLUTION LTD, des experts passionnés au service de votre transformation digitale.";
  include 'header.php';
?>

<main>
  <section class="relative overflow-hidden bg-ikaBlueDark pt-36 text-white sm:pt-40">
    <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image:url('<?php echo ika_asset(images/presentation.jpg);')" aria-hidden="true"></div>
    <div class="absolute inset-0 bg-ikaBlueDark/92" aria-hidden="true"></div>
    <div class="relative mx-auto max-w-7xl px-4 pb-20 sm:px-6 lg:px-8">
      <div class="max-w-4xl">
        <a href="index.php#top" class="inline-flex rounded-full border border-white/25 bg-white/10 px-5 py-3 text-sm font-black text-white transition hover:bg-white hover:text-ikaBlue">Retour à l'accueil</a>
        <p class="mt-8 text-sm font-black uppercase tracking-[0.2em] text-red-200">Notre équipe</p>
        <h1 class="mt-5 text-4xl font-black leading-[1.05] tracking-normal sm:text-5xl lg:text-6xl">Des experts passionnés au service de votre transformation digitale.</h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-white/80 sm:text-xl">Ingénieurs, développeurs, consultants et techniciens réunis autour d'une même mission : vous offrir des solutions fiables, adaptées et durables.</p>
      </div>
    </div>
  </section>

  <section class="bg-white py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal max-w-3xl">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Profil</p>
        <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Une équipe pluridisciplinaire pour des projets exigeants.</h2>
        <p class="mt-6 text-base leading-8 text-slate-600">IKA SOLUTION réunit des compétences variées en développement, infrastructures, cybersécurité, réseaux et conseil. Chaque membre apporte son expertise pour garantir des livrables de qualité, dans les délais et en phase avec vos besoins.</p>
      </div>
    </div>
  </section>

 <section class="bg-ikaSoft py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="reveal text-center">
        <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Équipe</p>
        <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Les talents qui font IKA SOLUTION.</h2>
      </div>
      <div class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        
        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/yaya.jpg);" alt="Yaya OUATTARA">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Yaya OUATTARA</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Directeur Général</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Définit la vision stratégique de l'entreprise et accompagne les clients dans la transformation de leurs enjeux digitaux.</p>
        </article>

        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/Serge.jpg);" alt="Serge Gedeon OUE">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">SERGE GEDEON OUE</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Développeur Full-Stack</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Conçoit et développe des solutions web et mobiles sur mesure, garantissant des architectures robustes et des expériences fluides.</p>
        </article>
<!-- 
        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/team/kader.jpg);" alt="Goombasda Donald Aymard TIENTEGA">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Goombasda Donald Aymard TIENTEGA</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Ingénieur Réseaux et système</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Conçoit l'architecture réseau, déploie les infrastructures et assure la sécurité et la haute disponibilité des systèmes critiques.</p>
        </article>
-->
        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/roukiatou.jpg);" alt="Roukiatou OUEDRAOGO">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Roukiatou OUEDRAOGO</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Commerciale</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Identifie les besoins des clients, propose nos solutions d'hébergement et d'infrastructures cloud, et fidélise le portefeuille.</p>
        </article>

        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/victorine.jpg);" alt="Victorine BAZEMO">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Victorine BAZEMO</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Assistante Commerciale</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Accompagne l'équipe dans le suivi des prospects, la rédaction des propositions et assure une relation client de qualité.</p>
        </article>

        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/Martin.jpg);" alt="Tegawende Martin Junior YAMEOGO">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Tegawende Martin Junior YAMEOGO</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Développeur Junior</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Participe au développement des interfaces et fonctionnalités web, tout en assurant la maintenance et l'optimisation de nos applications.</p>
        </article>

        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/daouda.jpg);" alt="Daouda DAO">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Daouda DAO</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Développeur Front End</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Transforme les maquettes en interfaces web interactives et responsives, en plaçant l'expérience utilisateur au cœur de son code.</p>
        </article>

        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/landry.jpg);" alt="KABORE Pawendtaore Landry">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">KABORE Pawendtaore Landry</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Développeur Full-Stack</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Développe des applications complètes, de la base de données à l'interface, pour répondre aux besoins métiers spécifiques de nos clients.</p>
        </article>

        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/willi.jpg);" alt="Williams woba">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Williams woba</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Technicien , helpdesk</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Premier point de contact pour le support technique, il résout les incidents, assiste les utilisateurs et assure la maintenance du parc.</p>
        </article>

        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/Sandrine.jpg);" alt="Sandrine Tiahoun KINI">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Sandrine Tiahoun KINI</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Assistante de Direction</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Organise le quotidien de la direction, gère l'administration générale et facilite la communication interne et externe.</p>
        </article>
<!-- 
        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/Fatoumata.jpg);" alt="Fatoumata KANO">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Fatoumata KANO</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Assistante Comptable</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Assiste dans la saisie des opérations financières, le suivi de la trésorerie et la préparation des déclarations fiscales.</p>
        </article>
-->

        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/ami.jpg);" alt="Aminata HEMA">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Aminata HEMA</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Comptable</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Gère la comptabilité générale, établit les états financiers et veille au respect des obligations fiscales et légales de l'entreprise.</p>
        </article>
<!-- 
        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/Koro.jpg);" alt="Korotimi SANOGO">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Korotimi SANOGO</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Comptable</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Supervise les flux financiers, analyse les coûts et produit les rapports comptables pour éclairer les prises de décision.</p>
        </article>
-->
        <article class="reveal group rounded-2xl bg-white p-8 text-center shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
          <div class="mx-auto h-52 w-52 overflow-hidden rounded-2xl border-4 border-ikaSoft bg-ikaSoft shadow-clean">
            <img class="h-full w-full object-cover" src="<?php echo ika_asset(images/Nouriatou.jpg);" alt="Nouriatou OUEDRAOGO">
          </div>
          <h3 class="mt-6 text-xl font-black text-ikaBlue">Nouriatou OUEDRAOGO</h3>
          <p class="mt-1 text-sm font-bold text-ikaRed">Gestionnaire de Projet</p>
          <p class="mt-4 text-sm leading-7 text-slate-600">Pilote le planning, coordonne les équipes techniques et veille au respect des délais, du budget et de la qualité des livrables.</p>
        </article>

      </div>
    </div>
  </section>

  <section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 lg:grid-cols-[.8fr_1.2fr] lg:items-center">
        <div class="reveal">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Valeurs</p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Une culture d'entreprise tournée vers l'impact.</h2>
        </div>
        <div class="reveal grid gap-5">
          <div class="flex gap-5 rounded-2xl border border-slate-100 bg-ikaSoft p-6">
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-ikaBlue text-lg font-black text-white">01</span>
            <div>
              <h3 class="font-black text-ikaBlue">Exigence technique</h3>
              <p class="mt-2 text-sm leading-7 text-slate-600">Nous concevons chaque solution avec rigueur, en respectant les normes, les délais et les engagements.</p>
            </div>
          </div>
          <div class="flex gap-5 rounded-2xl border border-slate-100 bg-ikaSoft p-6">
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-ikaRed text-lg font-black text-white">02</span>
            <div>
              <h3 class="font-black text-ikaBlue">Proximité client</h3>
              <p class="mt-2 text-sm leading-7 text-slate-600">Nous travaillons main dans la main avec nos clients pour comprendre leurs contraintes et y répondre avec des solutions adaptées.</p>
            </div>
          </div>
          <div class="flex gap-5 rounded-2xl border border-slate-100 bg-ikaSoft p-6">
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-ikaBlue text-lg font-black text-white">03</span>
            <div>
              <h3 class="font-black text-ikaBlue">Innovation continue</h3>
              <p class="mt-2 text-sm leading-7 text-slate-600">Nos équipes se forment en permanence pour maîtriser les technologies les plus récentes et vous offrir le meilleur.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
