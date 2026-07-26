<?php
/**
 * Template part: Clients marquee (trust logos section)
 * Clients are driven by the ika_client CPT (editable from the WordPress admin).
 */
$clients = get_posts( array(
    'post_type'      => 'ika_client',
    'posts_per_page' => 20,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );
?>
    <!-- Client Marquee & References Section -->
    <section class="bg-ikaSoft py-16 overflow-hidden">
      <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
        <p class="text-xs font-black uppercase tracking-[0.2em] text-slate-500">Ils nous font confiance</p>
        <div class="mt-10 overflow-hidden relative">
          <div class="animate-marquee flex gap-12 items-center">
            <?php if ( $clients ) : ?>
              <?php foreach ( $clients as $c ) :
                $logo = ika_asset( get_post_meta( $c->ID, 'ika_client_image', true ) );
              ?>
              <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_the_title( $c ) ); ?>"></div>
              <?php endforeach; ?>
              <div class="flex items-center gap-12 shrink-0" aria-hidden="true">
                <?php foreach ( $clients as $c ) :
                  $logo = ika_asset( get_post_meta( $c->ID, 'ika_client_image', true ) );
                ?>
                <div class="client-logo bg-white px-6 py-4 rounded-xl shadow-clean"><img class="h-12 w-auto object-contain" src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_the_title( $c ) ); ?>"></div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
