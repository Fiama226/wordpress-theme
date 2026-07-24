<?php
  $actualites = [
    [
      'tag' => 'Cloud',
      'image' => 'assets/images/slide4.jpg',
      'title' => 'Pourquoi rapprocher l’hébergement des opérations critiques',
      'intro' => 'Disponibilité, latence, support local et meilleure maîtrise des environnements applicatifs.',
      'article' => 'cloud',
      'color' => 'bg-ikaBlue',
    ],
    [
      'tag' => 'Sécurité',
      'image' => 'assets/images/securite.jpg',
      'title' => 'Digitaliser sans fragiliser les accès et les données',
      'intro' => 'Contrôle d’accès, sauvegarde, supervision et continuité de service dès la conception.',
      'article' => 'securite',
      'color' => 'bg-ikaRed',
    ],
    [
      'tag' => '.bf',
      'image' => 'assets/images/conseil.jpg',
      'title' => 'Renforcer son identité numérique avec un domaine local',
      'intro' => 'Nom de domaine, DNS, messagerie et maintenance technique pour une présence crédible.',
      'article' => 'domaine',
      'color' => 'bg-ikaBlue',
    ],
  ];
?>
<?php include 'header.php'; ?>

  <main>
    <section class="relative overflow-hidden bg-ikaBlueDark pt-36 text-white sm:pt-40">
      <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image:url('assets/images/slide3.jpg')" aria-hidden="true"></div>
      <div class="absolute inset-0 bg-ikaBlueDark/92" aria-hidden="true"></div>
      <div class="relative mx-auto max-w-7xl px-4 pb-20 sm:px-6 lg:px-8">
        <div class="reveal max-w-3xl">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200">Actualités</p>
          <h1 class="mt-5 text-4xl font-black leading-[1.05] tracking-normal sm:text-5xl lg:text-6xl">Toutes nos actualités</h1>
          <p class="mt-6 text-lg leading-8 text-white/80 sm:text-xl">Retrouvez les sujets qui structurent la transformation digitale locale : cloud, sécurité, présence numérique, outils métier et continuité de service.</p>
        </div>
      </div>
    </section>

    <section class="bg-ikaSoft py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
          <?php foreach ($actualites as $actualite): ?>
            <article class="reveal flex h-full flex-col overflow-hidden rounded-2xl bg-white shadow-clean transition hover:-translate-y-2 hover:shadow-premium">
              <img class="h-64 w-full object-cover" src="<?= htmlspecialchars($actualite['image']) ?>" alt="<?= htmlspecialchars($actualite['title']) ?>">
              <div class="flex flex-1 flex-col p-7">
                <span class="<?= htmlspecialchars($actualite['color']) ?> w-fit rounded-full px-4 py-2 text-xs font-black uppercase tracking-[0.14em] text-white"><?= htmlspecialchars($actualite['tag']) ?></span>
                <h2 class="mt-6 text-2xl font-black leading-tight text-ikaBlue"><?= htmlspecialchars($actualite['title']) ?></h2>
                <p class="mt-4 flex-1 text-sm leading-7 text-slate-600"><?= htmlspecialchars($actualite['intro']) ?></p>
                <a href="detail-actualite.php?article=<?= urlencode($actualite['article']) ?>" class="mt-6 inline-flex w-fit rounded-full bg-ikaRed px-5 py-3 text-sm font-black text-white transition hover:bg-red-700">Lire la suite</a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </main>

<?php include 'footer.php'; ?>
