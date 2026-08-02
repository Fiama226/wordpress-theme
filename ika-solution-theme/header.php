<?php
/**
 * En-tête du thème.
 *
 * Coordonnées issues du Customizer (ika_opt). Le menu de repli n'est affiché
 * que si aucun menu WordPress n'est assigné à l'emplacement « header-menu ».
 *
 * @package ika-solution
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if ( ! has_site_icon() ) : ?>
  <link rel="icon" href="<?php echo esc_url( ika_asset( 'images/logo.png' ) ); ?>">
  <link rel="apple-touch-icon" href="<?php echo esc_url( ika_asset( 'images/logo.png' ) ); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-white text-ikaInk antialiased'); ?>>
<?php wp_body_open(); ?>

  <header id="top" class="fixed inset-x-0 top-0 z-50 border-b border-slate-100 bg-white shadow-[0_10px_35px_rgba(4,31,77,0.08)] backdrop-blur">
    <div class="bg-ikaBlueDark text-white">
      <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-2 text-xs font-semibold sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <span class="inline-flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-ikaRed"></span><?php echo esc_html( ika_opt( 'ika_address' ) ); ?></span>
        <div class="flex flex-wrap gap-x-5 gap-y-2">
          <a class="hover:text-red-200 transition" href="tel:<?php echo esc_attr( ika_tel( 'ika_phone1' ) ); ?>"><?php echo esc_html( ika_opt( 'ika_phone1' ) ); ?></a>
          <a class="hover:text-red-200 transition" href="tel:<?php echo esc_attr( ika_tel( 'ika_phone2' ) ); ?>"><?php echo esc_html( ika_opt( 'ika_phone2' ) ); ?></a>
          <a class="hover:text-red-200 transition" href="mailto:<?php echo esc_attr( ika_opt( 'ika_email' ) ); ?>"><?php echo esc_html( ika_opt( 'ika_email' ) ); ?></a>
        </div>
      </div>
    </div>
    <nav class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3" aria-label="IKA SOLUTION">
        <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
            <?php the_custom_logo(); ?>
        <?php else : ?>
            <img class="h-20 w-auto" src="<?php echo ika_asset('images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
        <?php endif; ?>
      </a>

      <?php
      if ( has_nav_menu( 'header-menu' ) ) :
          wp_nav_menu( array(
              'theme_location'  => 'header-menu',
              'container'       => 'div',
              'container_class' => 'hidden items-center gap-6 text-sm font-bold text-slate-700 xl:flex',
              'fallback_cb'     => false,
              'items_wrap'      => '%3$s',
              'depth'           => 1,
          ) );
      else :
      ?>
      <!-- Repli : affiché uniquement si aucun menu n'est assigné dans WordPress. -->
      <div class="hidden items-center gap-6 text-sm font-bold text-slate-700 xl:flex">
        <a class="transition hover:text-ikaBlue <?php echo esc_attr( ika_nav_active( 'accueil' ) ); ?>" href="<?php echo esc_url( home_url( '/#top' ) ); ?>"><?php esc_html_e( 'Accueil', 'ika-solution' ); ?></a>
        <a class="transition hover:text-ikaBlue <?php echo esc_attr( ika_nav_active( 'presentation' ) ); ?>" href="<?php echo esc_url( ika_page_url( 'presentation' ) ); ?>"><?php esc_html_e( 'Société', 'ika-solution' ); ?></a>
        <a class="transition hover:text-ikaBlue <?php echo esc_attr( ika_nav_active( 'equipe' ) ); ?>" href="<?php echo esc_url( ika_page_url( 'equipe' ) ); ?>"><?php esc_html_e( 'Équipe', 'ika-solution' ); ?></a>
        <a class="transition hover:text-ikaBlue <?php echo esc_attr( ika_nav_active( 'expertises' ) ); ?>" href="<?php echo esc_url( home_url( '/#expertises' ) ); ?>"><?php esc_html_e( 'Expertise', 'ika-solution' ); ?></a>
        <a class="transition hover:text-ikaBlue <?php echo esc_attr( ika_nav_active( 'realisations' ) ); ?>" href="<?php echo esc_url( ika_page_url( 'realisations' ) ); ?>"><?php esc_html_e( 'Réalisations', 'ika-solution' ); ?></a>
        <a class="transition hover:text-ikaBlue <?php echo esc_attr( ika_nav_active( 'solutions' ) ); ?>" href="<?php echo esc_url( home_url( '/#produits' ) ); ?>"><?php esc_html_e( 'Solutions', 'ika-solution' ); ?></a>
        <a class="transition hover:text-ikaBlue <?php echo esc_attr( ika_nav_active( 'actualites' ) ); ?>" href="<?php echo esc_url( ika_page_url( 'actualites' ) ); ?>"><?php esc_html_e( 'Actualités', 'ika-solution' ); ?></a>
        <a class="rounded-full bg-ikaRed px-5 py-3 text-white shadow-clean transition hover:bg-red-700" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Demander un devis', 'ika-solution' ); ?></a>
        <a class="transition hover:text-ikaBlue" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Contact', 'ika-solution' ); ?></a>
      </div>
      <?php endif; ?>

      <div class="hidden items-center gap-3 md:flex xl:hidden">
        <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="rounded-full border border-slate-200 px-4 py-3 text-sm font-semibold text-ikaBlue transition hover:border-ikaBlue">Devis</a>
        <a href="tel:<?php echo esc_attr( ika_tel( 'ika_phone1' ) ); ?>" class="rounded-full bg-ikaRed px-5 py-3 text-sm font-bold text-white shadow-clean transition hover:bg-red-700">Appeler</a>
      </div>
      <button id="menuButton" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 text-ikaBlue xl:hidden" aria-label="Menu" aria-expanded="false">
        <span class="h-0.5 w-5 bg-current before:relative before:-top-1.5 before:block before:h-0.5 before:w-5 before:bg-current after:relative after:top-1 after:block after:h-0.5 after:w-5 after:bg-current"></span>
      </button>
    </nav>
    <div id="mobileMenu" class="hidden border-t border-slate-100 bg-white px-4 py-4 xl:hidden">
      <div class="mx-auto grid max-w-7xl gap-2 text-sm font-semibold text-slate-700">
        <?php
        if ( has_nav_menu( 'header-menu' ) ) :
            wp_nav_menu( array(
                'theme_location'  => 'header-menu',
                'container'       => false,
                'items_wrap'      => '%3$s',
                'depth'           => 1,
                'fallback_cb'     => false,
            ) );
        else :
        ?>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft <?php echo esc_attr( ika_nav_active( 'accueil', true ) ); ?>" href="<?php echo esc_url( home_url( '/#top' ) ); ?>"><?php esc_html_e( 'Accueil', 'ika-solution' ); ?></a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft <?php echo esc_attr( ika_nav_active( 'presentation', true ) ); ?>" href="<?php echo esc_url( ika_page_url( 'presentation' ) ); ?>"><?php esc_html_e( 'Société', 'ika-solution' ); ?></a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft <?php echo esc_attr( ika_nav_active( 'equipe', true ) ); ?>" href="<?php echo esc_url( ika_page_url( 'equipe' ) ); ?>"><?php esc_html_e( 'Équipe', 'ika-solution' ); ?></a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft <?php echo esc_attr( ika_nav_active( 'expertises', true ) ); ?>" href="<?php echo esc_url( home_url( '/#expertises' ) ); ?>"><?php esc_html_e( 'Expertise', 'ika-solution' ); ?></a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft <?php echo esc_attr( ika_nav_active( 'realisations', true ) ); ?>" href="<?php echo esc_url( ika_page_url( 'realisations' ) ); ?>"><?php esc_html_e( 'Réalisations', 'ika-solution' ); ?></a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft <?php echo esc_url( ika_nav_active( 'solutions', true ) ); ?>" href="<?php echo esc_url( home_url( '/#produits' ) ); ?>"><?php esc_html_e( 'Solutions', 'ika-solution' ); ?></a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft <?php echo esc_attr( ika_nav_active( 'actualites', true ) ); ?>" href="<?php echo esc_url( ika_page_url( 'actualites' ) ); ?>"><?php esc_html_e( 'Actualités', 'ika-solution' ); ?></a>
        <a class="rounded-xl px-3 py-3 text-ikaRed hover:bg-ikaSoft" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Demander un devis', 'ika-solution' ); ?></a>
        <a class="rounded-xl px-3 py-3 hover:bg-ikaSoft" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Contact', 'ika-solution' ); ?></a>
        <?php endif; ?>
        <div class="mt-2 rounded-2xl bg-ikaSoft p-4 text-slate-700">
          <p class="font-black text-ikaBlue"><?php echo esc_html( ika_opt( 'ika_city' ) ); ?></p>
          <a class="mt-2 block" href="tel:<?php echo esc_attr( ika_tel( 'ika_phone1' ) ); ?>"><?php echo esc_html( ika_opt( 'ika_phone1' ) ); ?></a>
          <a class="mt-1 block break-all" href="mailto:<?php echo esc_attr( ika_opt( 'ika_email' ) ); ?>"><?php echo esc_html( ika_opt( 'ika_email' ) ); ?></a>
        </div>
      </div>
    </div>
  </header>
