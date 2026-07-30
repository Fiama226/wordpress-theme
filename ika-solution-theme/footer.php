<?php
/**
 * Pied de page.
 *
 * Coordonnées et textes proviennent du Customizer (ika_opt).
 * Les menus « Société » et « Nos solutions » utilisent les emplacements
 * WordPress s'ils sont assignés, sinon un repli reproduit le site d'origine.
 * Le JavaScript est chargé via wp_enqueue_script (assets/js/theme.js).
 *
 * @package ika-solution
 */

$ika_wa_number = preg_replace( '/[^0-9]/', '', (string) ika_opt( 'ika_whatsapp' ) );
$ika_wa_link   = 'https://wa.me/' . $ika_wa_number . '?text=' . rawurlencode( (string) ika_opt( 'ika_whatsapp_text' ) );
?>
  <footer class="border-t border-slate-100 bg-white text-slate-700">
    <div class="relative overflow-hidden bg-ikaBlueDark">
      <div class="absolute inset-0 opacity-20" aria-hidden="true" style="background-image: linear-gradient(135deg, transparent 0 18px, rgba(255,255,255,.45) 18px 21px, transparent 21px 42px), linear-gradient(45deg, transparent 0 18px, rgba(229,26,55,.65) 18px 21px, transparent 21px 42px); background-size: 42px 42px;"></div>
      <div class="relative mx-auto flex max-w-7xl flex-col gap-2 px-4 py-3 text-[11px] font-bold text-white/80 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <span><?php echo esc_html( ika_opt( 'ika_baseline' ) ); ?></span>
      </div>
    </div>
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 sm:px-6 md:grid-cols-2 lg:grid-cols-[1.25fr_.7fr_.7fr_.85fr] lg:px-8">
      <div>
        <?php if ( has_custom_logo() ) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <img class="h-20 w-auto" src="<?php echo esc_url( ika_asset( 'images/logo.png' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">
        <?php endif; ?>
        <p class="mt-4 max-w-md text-sm leading-7 text-slate-600"><?php echo esc_html( ika_opt( 'ika_footer_about' ) ); ?></p>
      </div>
      <div>
        <h3 class="text-sm font-black uppercase tracking-[0.18em] text-ikaRed"><?php esc_html_e( 'Société', 'ika-solution' ); ?></h3>
        <?php if ( has_nav_menu( 'footer-company' ) ) : ?>
          <?php
          wp_nav_menu(
            array(
              'theme_location'  => 'footer-company',
              'container'       => 'div',
              'container_class' => 'mt-5 grid gap-3 text-sm font-semibold text-slate-600',
              'items_wrap'      => '%3$s',
              'depth'           => 1,
              'fallback_cb'     => false,
              'link_before'     => '',
            )
          );
          ?>
        <?php else : ?>
        <div class="mt-5 grid gap-3 text-sm font-semibold text-slate-600">
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( home_url( '/#societe' ) ); ?>"><?php esc_html_e( 'À propos de nous', 'ika-solution' ); ?></a>
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( home_url( '/#pourquoi' ) ); ?>"><?php esc_html_e( 'Pourquoi nous choisir', 'ika-solution' ); ?></a>
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( home_url( '/#vision' ) ); ?>"><?php esc_html_e( 'Vision, mission, valeurs', 'ika-solution' ); ?></a>
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( ika_page_url( 'realisations' ) ); ?>"><?php esc_html_e( 'Réalisations', 'ika-solution' ); ?></a>
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( ika_page_url( 'actualites' ) ); ?>"><?php esc_html_e( 'Actualités', 'ika-solution' ); ?></a>
        </div>
        <?php endif; ?>
      </div>
      <div>
        <h3 class="text-sm font-black uppercase tracking-[0.18em] text-ikaRed"><?php esc_html_e( 'Nos solutions', 'ika-solution' ); ?></h3>
        <?php if ( has_nav_menu( 'footer-solutions' ) ) : ?>
          <?php
          wp_nav_menu(
            array(
              'theme_location'  => 'footer-solutions',
              'container'       => 'div',
              'container_class' => 'mt-5 grid gap-3 text-sm font-semibold text-slate-600',
              'items_wrap'      => '%3$s',
              'depth'           => 1,
              'fallback_cb'     => false,
            )
          );
          ?>
        <?php else : ?>
        <div class="mt-5 grid gap-3 text-sm font-semibold text-slate-600">
          <?php
          $ika_footer_solutions = get_posts(
            array(
              'post_type'      => 'ika_solution',
              'posts_per_page' => 6,
              'orderby'        => 'menu_order',
              'order'          => 'ASC',
            )
          );
          foreach ( $ika_footer_solutions as $ika_footer_solution ) :
          ?>
          <a class="hover:text-ikaBlue" href="<?php echo esc_url( get_permalink( $ika_footer_solution ) ); ?>"><?php echo esc_html( get_the_title( $ika_footer_solution ) ); ?></a>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
      <div>
        <h3 class="text-sm font-black uppercase tracking-[0.18em] text-ikaRed"><?php esc_html_e( 'Contact', 'ika-solution' ); ?></h3>
        <div class="mt-5 grid gap-4 text-sm font-semibold text-slate-600">
          <p><?php echo esc_html( ika_opt( 'ika_city' ) ); ?></p>
          <a class="hover:text-ikaBlue" href="tel:<?php echo esc_attr( ika_tel( 'ika_phone1' ) ); ?>"><?php echo esc_html( ika_opt( 'ika_phone1' ) ); ?></a>
          <a class="hover:text-ikaBlue" href="tel:<?php echo esc_attr( ika_tel( 'ika_phone2' ) ); ?>"><?php echo esc_html( ika_opt( 'ika_phone2' ) ); ?></a>
          <a class="break-all hover:text-ikaBlue" href="mailto:<?php echo esc_attr( ika_opt( 'ika_email' ) ); ?>"><?php echo esc_html( ika_opt( 'ika_email' ) ); ?></a>
        </div>
      </div>
    </div>
    <div class="bg-ikaBlueDark">
      <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-5 text-xs font-semibold text-white/70 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <span>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Tous droits réservés.', 'ika-solution' ); ?></span>
        <span><?php echo esc_html( ika_opt( 'ika_footer_tagline' ) ); ?></span>
      </div>
    </div>
  </footer>

  <?php if ( $ika_wa_number ) : ?>
  <!-- Widget WhatsApp -->
  <a
    href="<?php echo esc_url( $ika_wa_link ); ?>"
    class="whatsapp-widget fixed bottom-4 right-3 z-50 flex max-w-[calc(100vw-1.5rem)] items-center gap-2 rounded-full border border-white/70 bg-white px-3 py-2 text-ikaBlueDark shadow-premium transition hover:-translate-y-1 hover:shadow-[0_22px_60px_rgba(37,211,102,.28)] sm:bottom-5 sm:right-6 sm:gap-3 sm:px-4 sm:py-3"
    target="_blank"
    rel="noopener"
    aria-label="<?php esc_attr_e( 'Contacter IKA SOLUTION sur WhatsApp', 'ika-solution' ); ?>"
  >
    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#25D366] sm:h-12 sm:w-12">
      <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
    </span>
    <span class="grid min-w-0 gap-0.5 sm:gap-1">
      <span class="text-[10px] font-black uppercase tracking-[0.12em] text-ikaRed sm:text-xs sm:tracking-[0.16em]">Support IKASOLUTION</span>
      <span class="whatsapp-message relative block h-5 min-w-[155px] overflow-hidden text-xs font-black text-ikaBlueDark sm:min-w-[270px] sm:text-sm">
        <span class="absolute inset-0">Contactez-nous maintenant</span>
        <span class="absolute inset-0 opacity-0">Besoin d'un devis rapide ?</span>
        <span class="absolute inset-0 opacity-0">Parlez à un expert IKA</span>
      </span>
    </span>
  </a>
  <?php endif; ?>

  <?php wp_footer(); ?>
</body>
</html>
