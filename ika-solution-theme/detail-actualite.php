<?php
  $actualites = [
    'cloud' => [
      'tag' => 'Cloud',
      'image' => ika_asset('images/slide4.jpg'),
      'title' => 'Pourquoi rapprocher l’hébergement des opérations critiques',
      'intro' => 'L’hébergement local permet aux organisations de gagner en disponibilité, en réactivité et en maîtrise technique.',
      'content' => [
        'Pour une entreprise, une institution ou une organisation qui utilise des applications métiers au quotidien, l’hébergement n’est pas seulement une question technique. Il influence directement la vitesse d’accès, la continuité de service, la confidentialité des données et la capacité à obtenir une assistance rapide.',
        'En rapprochant les serveurs des utilisateurs et des équipes de support, les temps de réponse deviennent plus prévisibles. Les incidents peuvent être diagnostiqués plus vite, les sauvegardes sont mieux suivies et les environnements critiques restent sous contrôle.',
        'IKA SOLUTION accompagne ses clients dans le choix, la configuration et la supervision de solutions d’hébergement adaptées : sites web, applications métiers, VPS, domaines, sauvegardes et support local.'
      ],
    ],
    'securite' => [
      'tag' => 'Sécurité',
      'image' => ika_asset('images/securite.jpg'),
      'title' => 'Digitaliser sans fragiliser les accès et les données',
      'intro' => 'La digitalisation doit améliorer la productivité sans exposer les systèmes, les utilisateurs et les données sensibles.',
      'content' => [
        'Chaque nouveau portail, application ou service connecté augmente la surface d’exposition. C’est pourquoi la sécurité doit être intégrée dès la conception du projet, et non ajoutée à la fin.',
        'Une approche sérieuse combine contrôle d’accès, sauvegarde, journalisation, supervision, formation des utilisateurs et procédures de reprise. Ce socle réduit les risques d’interruption, de perte de données ou d’accès non autorisé.',
        'IKA SOLUTION aide les organisations à structurer cette protection avec des choix techniques cohérents, des politiques d’accès claires et un accompagnement durable.'
      ],
    ],
    'domaine' => [
      'tag' => '.bf',
      'image' => ika_asset('images/conseil.jpg'),
      'title' => 'Renforcer son identité numérique avec un domaine local',
      'intro' => 'Un nom de domaine local renforce la crédibilité, la proximité et la visibilité numérique d’une organisation.',
      'content' => [
        'L’identité numérique commence souvent par une adresse claire, stable et reconnue. Un domaine local permet de mieux affirmer son ancrage, de professionnaliser ses adresses email et de centraliser ses services numériques.',
        'Au-delà de l’achat du domaine, la qualité de la configuration DNS, de la messagerie, des certificats et du suivi technique joue un rôle important dans la fiabilité de la présence en ligne.',
        'IKA SOLUTION accompagne les organisations dans l’acquisition, la configuration et la maintenance de leurs domaines, avec un support orienté continuité et simplicité d’usage.'
      ],
    ],
  ];

  $articleKey = $_GET['article'] ?? 'cloud';
  $article = $actualites[$articleKey] ?? $actualites['cloud'];
?>
<?php get_header(); ?>

<main class="bg-ikaSoft pt-36">
  <article class="mx-auto max-w-5xl px-4 pb-20 sm:px-6 lg:px-8">
    <a href="<?php echo esc_url( home_url( '/actualites' ) ); ?>" class="inline-flex rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-black text-ikaBlue transition hover:border-ikaBlue">Retour aux actualités</a>

    <div class="mt-8 overflow-hidden rounded-[2rem] bg-white shadow-premium">
      <img class="h-[320px] w-full object-cover sm:h-[460px]" src="<?= htmlspecialchars($article['image']) ?>" alt="<?= htmlspecialchars($article['title']) ?>">
      <div class="p-7 sm:p-10">
        <span class="rounded-full bg-ikaRed px-4 py-2 text-xs font-black uppercase tracking-[0.14em] text-white"><?= htmlspecialchars($article['tag']) ?></span>
        <h1 class="mt-6 text-4xl font-black leading-tight text-ikaBlueDark sm:text-5xl"><?= htmlspecialchars($article['title']) ?></h1>
        <p class="mt-5 text-lg leading-8 text-slate-600"><?= htmlspecialchars($article['intro']) ?></p>

        <div class="mt-10 grid gap-5 text-base leading-8 text-slate-700">
          <?php foreach ($article['content'] as $paragraph): ?>
            <p><?= htmlspecialchars($paragraph) ?></p>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <section class="mt-10 grid gap-8 lg:grid-cols-[1fr_.9fr]">
      <div class="rounded-[2rem] bg-white p-7 shadow-clean sm:p-8">
        <h2 class="text-2xl font-black text-ikaBlueDark">Commentaires</h2>
        <div id="commentsList" class="mt-6 grid gap-4">
          <div class="rounded-2xl bg-ikaSoft p-5">
            <p class="font-black text-ikaBlue">Aïcha K.</p>
            <p class="mt-2 text-sm leading-7 text-slate-600">Sujet utile. La proximité du support fait vraiment la différence sur les services critiques.</p>
          </div>
          <div class="rounded-2xl bg-ikaSoft p-5">
            <p class="font-black text-ikaBlue">Moussa T.</p>
            <p class="mt-2 text-sm leading-7 text-slate-600">Merci pour ces explications, surtout sur la continuité de service et les sauvegardes.</p>
          </div>
        </div>
      </div>

      <form id="commentForm" class="rounded-[2rem] bg-white p-7 shadow-clean sm:p-8" action="contact-submit.php" method="post">
        <input type="hidden" name="type" value="comment">
        <input type="hidden" name="article" value="<?= htmlspecialchars($article['title'], ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" name="page" value="Actualité - <?= htmlspecialchars($article['title'], ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" name="redirect" value="detail-actualite.php?article=<?= urlencode($articleKey) ?>">
        <h2 class="text-2xl font-black text-ikaBlueDark">Laisser un commentaire</h2>
        <?php if (isset($_GET['mail'], $_GET['notice'])): ?>
          <div class="mt-5 rounded-2xl <?= $_GET['mail'] === 'success' ? 'bg-green-50 text-green-800' : 'bg-red-50 text-red-800' ?> p-4 text-sm font-bold">
            <?= htmlspecialchars((string) $_GET['notice'], ENT_QUOTES, 'UTF-8') ?>
          </div>
        <?php endif; ?>
        <label class="mt-6 grid gap-2 text-sm font-bold text-slate-700">Nom
          <input id="commentName" class="min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="nom" type="text" required placeholder="Votre nom">
        </label>
        <label class="mt-5 grid gap-2 text-sm font-bold text-slate-700">Email
          <input class="min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="email" type="email" required placeholder="vous@entreprise.com">
        </label>
        <label class="mt-5 grid gap-2 text-sm font-bold text-slate-700">Commentaire
          <textarea id="commentMessage" class="min-h-36 rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="message" required placeholder="Votre message"></textarea>
        </label>
        <button class="mt-6 rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700" type="submit">Publier le commentaire</button>
      </form>
    </section>
  </article>
</main>

<?php get_footer(); ?>
