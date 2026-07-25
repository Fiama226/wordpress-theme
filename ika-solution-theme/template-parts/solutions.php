<?php
/**
 * Template part: Product solutions tabs (section "produits")
 * Markup only — interactivity is handled by the front-page.php <script>.
 */
?>
    <section id="produits" class="bg-white py-20 sm:py-28">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal text-center max-w-3xl mx-auto">
          <p class="text-sm font-black uppercase tracking-[0.2em] text-ikaRed">Logiciels phares</p>
          <h2 class="mt-4 text-4xl font-black tracking-normal text-ikaBlueDark sm:text-5xl">Nos solutions logicielles métiers</h2>
          <p class="mt-4 text-base text-slate-600">Des progiciels conçus et développés pour automatiser vos processus administratifs, sécuriser vos accueils et valoriser vos archives.</p>
        </div>

        <div class="mt-14 flex flex-wrap justify-center gap-3">
          <button class="product-tab rounded-full px-7 py-3 text-sm font-black transition bg-ikaBlue text-white shadow-clean" data-target="visite">IKA Visite</button>
          <button class="product-tab rounded-full px-7 py-3 text-sm font-black transition bg-ikaSoft text-slate-700 hover:bg-slate-200" data-target="courrier">IKA Courrier</button>
          <button class="product-tab rounded-full px-7 py-3 text-sm font-black transition bg-ikaSoft text-slate-700 hover:bg-slate-200" data-target="archive">IKA Archive</button>
          <button class="product-tab rounded-full px-7 py-3 text-sm font-black transition bg-ikaSoft text-slate-700 hover:bg-slate-200" data-target="portail">IKA Portail</button>
        </div>

        <div class="mt-12 rounded-[2.5rem] bg-ikaSoft p-6 sm:p-10 lg:p-14">
          <div id="visite" class="product-slide active grid gap-10 lg:grid-cols-2 lg:items-center">
            <div class="reveal">
              <span class="inline-flex rounded-full bg-ikaBlue/10 px-4 py-1.5 text-xs font-black text-ikaBlue">Gestion d'accueil</span>
              <h3 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl">IKA Visite : Contrôle et traçabilité des accès</h3>
              <p class="mt-4 text-base leading-7 text-slate-600">Solution intelligente d'enregistrement et de suivi des visiteurs en entreprise ou administration. Badges, notifications d'arrivée, registre numérique sécurisé et statistiques en temps réel.</p>
              <ul class="mt-6 grid gap-3 text-sm font-semibold text-slate-700">
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Enregistrement rapide des visiteurs</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Édition de badges temporaires</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Historique et rapports d'affluence</li>
              </ul>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="ika-visite.php" class="rounded-full bg-ikaBlue px-7 py-4 text-sm font-bold text-white transition hover:bg-ikaBlueDark">Découvrir IKA Visite</a>
                <a href="<?php echo ika_asset('images/brochures/A5-visite.png'); ?>" download="Brochure_IKA_VISITE.png" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:text-ikaBlue hover:bg-ikaSoft">Télécharger la brochure</a>
              </div>
            </div>
            <div class="reveal relative">
              <img class="h-80 w-full object-cover rounded-[1.5rem] shadow-premium lg:h-[520px]" src="<?php echo ika_asset('images/ikavisite.jpg'); ?>" alt="Accueil professionnel">
            </div>
          </div>

          <div id="courrier" class="product-slide grid gap-10 lg:grid-cols-2 lg:items-center">
            <div class="reveal">
              <span class="inline-flex rounded-full bg-ikaBlue/10 px-4 py-1.5 text-xs font-black text-ikaBlue">Courrier & Workflow</span>
              <h3 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl">IKA Courrier : Gestion électronique du courrier</h3>
              <p class="mt-4 text-base leading-7 text-slate-600">Optimisez la circulation des courriers arrivés, départs et internes. Traçabilité des imputations, alertes de délais, signature électronique et archivage sécurisé.</p>
              <ul class="mt-6 grid gap-3 text-sm font-semibold text-slate-700">
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Numérisation et indexation instantanée</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Workflow de validation personnalisable</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Recherche multicritère et traçabilité</li>
              </ul>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="ika-courrier.php" class="rounded-full bg-ikaBlue px-7 py-4 text-sm font-bold text-white transition hover:bg-ikaBlueDark">Découvrir IKA Courrier</a>
                <a href="<?php echo ika_asset('images/brochures/A5courier.png'); ?>" download="Brochure_IKA_COURRIER.png" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:text-ikaBlue hover:bg-ikaSoft">Télécharger la brochure</a>
              </div>
            </div>
            <div class="reveal relative">
              <img class="h-80 w-full object-cover rounded-[1.5rem] shadow-premium lg:h-[520px]" src="<?php echo ika_asset('images/ikacourrier.jpg'); ?>" alt="Traitement administratif">
            </div>
          </div>

          <div id="archive" class="product-slide grid gap-10 lg:grid-cols-2 lg:items-center">
            <div class="reveal">
              <span class="inline-flex rounded-full bg-ikaBlue/10 px-4 py-1.5 text-xs font-black text-ikaBlue">Archivage numérique</span>
              <h3 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl">IKA Archive : Gestion et conservation documentaire</h3>
              <p class="mt-4 text-base leading-7 text-slate-600">Solution professionnelle d'archivage électronique (SAE). Classement par plans de classement, gestion des droits d'accès, conservation à long terme et recherche instantanée.</p>
              <ul class="mt-6 grid gap-3 text-sm font-semibold text-slate-700">
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Plan de classement structuré</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Sécurité et confidentialité des fonds</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Cycle de vie et élimination réglementaire</li>
              </ul>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="ika-archive.php" class="rounded-full bg-ikaBlue px-7 py-4 text-sm font-bold text-white transition hover:bg-ikaBlueDark">Découvrir IKA Archive</a>
                <a href="<?php echo ika_asset('images/brochures/A5-archive.png'); ?>" download="Brochure_IKA_ARCHIVE.png" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:text-ikaBlue hover:bg-ikaSoft">Télécharger la brochure</a>
              </div>
            </div>
            <div class="reveal relative">
              <img class="h-80 w-full object-cover rounded-[1.5rem] shadow-premium lg:h-[520px]" src="<?php echo ika_asset('images/ikaarchive.jpg'); ?>" alt="Archivage documentaire">
            </div>
          </div>

          <div id="portail" class="product-slide grid gap-10 lg:grid-cols-2 lg:items-center">
            <div class="reveal">
              <span class="inline-flex rounded-full bg-ikaBlue/10 px-4 py-1.5 text-xs font-black text-ikaBlue">Portail citoyen & institutionnel</span>
              <h3 class="mt-4 text-3xl font-black text-ikaBlueDark sm:text-4xl">IKA Portail : Services en ligne et e-gouvernance</h3>
              <p class="mt-4 text-base leading-7 text-slate-600">Plateforme web unifiée pour administrations et grandes entreprises. Espaces usagers, formulaires dynamiques, paiements en ligne et suivi des démarches.</p>
              <ul class="mt-6 grid gap-3 text-sm font-semibold text-slate-700">
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Démarches en ligne unifiées</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Tableau de bord de suivi</li>
                <li class="flex items-center gap-3"><span class="h-2 w-2 rounded-full bg-ikaRed"></span> Intégration sécurisée</li>
              </ul>
              <div class="mt-8 flex flex-wrap gap-4">
                <a href="ika-portail.php" class="rounded-full bg-ikaBlue px-7 py-4 text-sm font-bold text-white transition hover:bg-ikaBlueDark">Découvrir IKA Portail</a>
                <a href="<?php echo ika_asset('images/brochures/A5-portail.png'); ?>" download="Brochure_IKA_PORTAIL.png" class="inline-flex rounded-full border border-slate-200 px-7 py-4 text-sm font-extrabold text-slate-700 transition hover:border-ikaBlue hover:text-ikaBlue hover:bg-ikaSoft">Télécharger la brochure</a>
              </div>
            </div>
            <div class="reveal relative">
              <img class="h-80 w-full object-cover rounded-[1.5rem] shadow-premium lg:h-[520px]" src="<?php echo ika_asset('images/ikaportail.jpg'); ?>" alt="Portail digital sécurisé">
            </div>
          </div>
        </div>
      </div>
    </section>
