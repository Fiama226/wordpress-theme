<?php
/**
 * The template for displaying the footer
 */
?>
  <footer class="border-t border-slate-100 bg-white text-slate-700">
    <div class="relative overflow-hidden bg-ikaBlueDark">
      <div class="absolute inset-0 opacity-20" aria-hidden="true" style="background-image: linear-gradient(135deg, transparent 0 18px, rgba(255,255,255,.45) 18px 21px, transparent 21px 42px), linear-gradient(45deg, transparent 0 18px, rgba(229,26,55,.65) 18px 21px, transparent 21px 42px); background-size: 42px 42px;"></div>
      <div class="relative mx-auto flex max-w-7xl flex-col gap-2 px-4 py-3 text-[11px] font-bold text-white/80 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <span>IKA SOLUTION. La solution qui vous convient.</span>
      </div>
    </div>
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 md:grid-cols-2 lg:grid-cols-[1.25fr_.7fr_.7fr_.85fr] lg:px-8">
      <div>
        <img class="h-20 w-auto" src="<?php echo ika_asset('images/logo.png'); ?>" alt="IKA SOLUTION">
        <p class="mt-4 max-w-md text-sm leading-7 text-slate-600">Partenaire digital créé en 2014, IKA SOLUTION LTD accompagne les organisations en conseil, ingénierie, réseaux, logiciels métier, cloud et sécurité.</p>
      </div>
      <div>
        <h3 class="text-sm font-black uppercase tracking-[0.18em] text-ikaRed">Société</h3>
        <div class="mt-5 grid gap-3 text-sm font-semibold text-slate-600">
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( home_url( '/#societe' ) ); ?>">À propos de nous</a>
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( home_url( '/#pourquoi' ) ); ?>">Pourquoi nous choisir</a>
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( home_url( '/#vision' ) ); ?>">Vision, mission, valeurs</a>
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( home_url( '/realisations' ) ); ?>">Réalisations</a>
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( home_url( '/actualites' ) ); ?>">Actualités</a>
        </div>
      </div>
      <div>
        <h3 class="text-sm font-black uppercase tracking-[0.18em] text-ikaRed">Nos solutions</h3>
        <div class="mt-5 grid gap-3 text-sm font-semibold text-slate-600">
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( home_url( '/#produits' ) ); ?>">IKA Visite</a>
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( home_url( '/#produits' ) ); ?>">IKA Courier</a>
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( home_url( '/#produits' ) ); ?>">IKA Archive</a>
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( home_url( '/#produits' ) ); ?>">IKA Portail</a>
        </div>
      </div>
      <div>
        <h3 class="text-sm font-black uppercase tracking-[0.18em] text-ikaRed">Contact</h3>
        <div class="mt-5 grid gap-4 text-sm font-semibold text-slate-600">
          <p>Ouagadougou, Burkina Faso</p>
          <a class="hover:text-ikaBlue" href="tel:+22672089090">+226 72 08 90 90</a>
          <a class="hover:text-ikaBlue" href="tel:+22625655954">+226 25 65 59 54</a>
          <a class="break-all hover:text-ikaBlue" href="mailto:infos@ikasolution.com">infos@ikasolution.com</a>
        </div>
      </div>
    </div>
    <div class="bg-ikaBlueDark">
      <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-5 text-xs font-semibold text-white/70 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <span>© <?php echo date('Y'); ?> IKA SOLUTION. Tous droits réservés.</span>
        <span>Solutions digitales, cloud, infrastructure et sécurité.</span>
      </div>
    </div>
  </footer>

  <!-- WhatsApp Quick Widget -->
  <div class="fixed bottom-6 right-6 z-50 flex items-end gap-3">
    <div class="whatsapp-message hidden sm:flex flex-col items-end pointer-events-none">
      <div class="relative rounded-2xl bg-white px-4 py-3 text-xs font-bold text-slate-700 shadow-clean border border-slate-100">
        <span class="block">Besoin d'un accompagnement ?</span>
        <span class="absolute inset-0 flex items-center px-4 bg-white rounded-2xl">Discutez avec nos experts IT</span>
        <span class="absolute inset-0 flex items-center px-4 bg-white rounded-2xl">Réponse rapide garantie !</span>
      </div>
    </div>
    <a href="https://wa.me/22672089090?text=Bonjour%20IKA%20SOLUTION,%20je%20souhaite%20en%20savoir%20plus%20sur%20vos%20services." target="_blank" rel="noopener noreferrer" class="whatsapp-widget flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-2xl transition hover:scale-110" aria-label="Contact WhatsApp">
      <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38c1.45.79 3.08 1.21 4.79 1.21 5.46 0 9.91-4.45 9.91-9.91 0-5.46-4.45-9.91-9.91-9.91zm0 18.06c-1.5 0-2.97-.4-4.24-1.16l-.3-.18-3.12.82.83-3.04-.2-.31c-.82-1.31-1.25-2.83-1.25-4.38 0-4.56 3.71-8.27 8.27-8.27 4.56 0 8.27 3.71 8.27 8.27 0 4.56-3.71 8.27-8.27 8.27zm4.53-6.19c-.25-.13-1.48-.73-1.71-.82-.23-.09-.4-.13-.57.13-.17.25-.66.82-.81.99-.15.17-.31.19-.56.06-.25-.13-1.05-.39-2-1.23-.74-.66-1.24-1.48-1.39-1.73-.15-.25-.02-.38.11-.51.11-.11.25-.31.38-.47.13-.17.17-.29.25-.48.08-.19.04-.36-.02-.5-.06-.13-.57-1.38-.78-1.89-.2-.5-.4-.43-.57-.44l-.49-.01c-.17 0-.45.06-.69.31-.24.25-.92.9-.92 2.19 0 1.29.94 2.53 1.07 2.71.13.17 1.85 2.82 4.48 3.95.63.27 1.12.43 1.5.55.63.2 1.21.17 1.66.10.51-.08 1.48-.6 1.69-1.18.21-.58.21-1.08.15-1.18-.06-.1-.23-.16-.48-.29z"/></svg>
    </a>
  </div>

  <script>
    const menuButton = document.getElementById('menuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    if (menuButton && mobileMenu) {
      menuButton.addEventListener('click', () => {
        const expanded = menuButton.getAttribute('aria-expanded') === 'true';
        menuButton.setAttribute('aria-expanded', !expanded);
        mobileMenu.classList.toggle('hidden');
      });
    }
  </script>
  <?php wp_footer(); ?>
</body>
</html>
