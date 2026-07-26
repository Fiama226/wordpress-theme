<?php
/**
 * Template part : contact (section « contact ») + carte Google Maps.
 *
 * Le formulaire utilise le shortcode défini dans
 * Apparence > Personnaliser > Contenu IKA Solution > Section contact.
 * À défaut, un formulaire natif est affiché : il est traité par
 * ika_handle_contact_form() (inc/contact-form.php) avec nonce,
 * validation, anti-spam et envoi via wp_mail().
 *
 * @package ika-solution
 */

$ika_shortcode = trim( (string) ika_opt( 'ika_contact_form' ) );
$ika_maps      = ika_opt( 'ika_maps_embed' );
$ika_notice    = ika_get_contact_notice();
?>
    <section id="contact" class="bg-white py-14 sm:py-20">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid overflow-hidden rounded-[2rem] bg-ikaSoft shadow-premium lg:grid-cols-[.85fr_1.15fr]">
          <div class="reveal bg-ikaBlue p-6 text-white sm:p-8">
            <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php esc_html_e( 'Contact', 'ika-solution' ); ?></p>
            <h2 class="mt-4 text-3xl font-black tracking-normal sm:text-4xl"><?php echo esc_html( ika_opt( 'ika_contact_title' ) ); ?></h2>
            <p class="mt-4 text-sm leading-7 text-white/80"><?php echo esc_html( ika_opt( 'ika_contact_text' ) ); ?></p>
            <div class="mt-6 grid gap-3">
              <a class="rounded-2xl bg-white p-4 text-ikaBlue transition hover:bg-ikaSoft" href="tel:<?php echo esc_attr( ika_tel( 'ika_phone1' ) ); ?>">
                <span class="block text-xs font-black uppercase tracking-[0.16em] text-ikaRed"><?php esc_html_e( 'Téléphone', 'ika-solution' ); ?></span>
                <span class="mt-1 block text-lg font-black"><?php echo esc_html( ika_opt( 'ika_phone1' ) ); ?></span>
              </a>
              <a class="rounded-2xl bg-white p-4 text-ikaBlue transition hover:bg-ikaSoft" href="tel:<?php echo esc_attr( ika_tel( 'ika_phone2' ) ); ?>">
                <span class="block text-xs font-black uppercase tracking-[0.16em] text-ikaRed"><?php esc_html_e( 'Téléphone', 'ika-solution' ); ?></span>
                <span class="mt-1 block text-lg font-black"><?php echo esc_html( ika_opt( 'ika_phone2' ) ); ?></span>
              </a>
              <a class="rounded-2xl bg-white p-4 text-ikaBlue transition hover:bg-ikaSoft" href="mailto:<?php echo esc_attr( ika_opt( 'ika_email' ) ); ?>">
                <span class="block text-xs font-black uppercase tracking-[0.16em] text-ikaRed"><?php esc_html_e( 'Email', 'ika-solution' ); ?></span>
                <span class="mt-1 block text-lg font-black break-all"><?php echo esc_html( ika_opt( 'ika_email' ) ); ?></span>
              </a>
              <div class="rounded-2xl bg-white p-4 text-ikaBlue">
                <span class="block text-xs font-black uppercase tracking-[0.16em] text-ikaRed"><?php esc_html_e( 'Adresse', 'ika-solution' ); ?></span>
                <span class="mt-1 block text-lg font-black"><?php echo esc_html( ika_opt( 'ika_address' ) ); ?></span>
              </div>
            </div>
          </div>

          <?php if ( $ika_shortcode ) : ?>
          <div class="reveal p-6 sm:p-8">
            <?php echo do_shortcode( $ika_shortcode ); ?>
          </div>
          <?php else : ?>
          <form class="reveal grid gap-4 p-6 sm:p-8" action="<?php echo esc_url( home_url( '/#contact' ) ); ?>" method="post">
            <?php wp_nonce_field( 'ika_contact', 'ika_contact_nonce' ); ?>
            <input type="hidden" name="action" value="ika_contact">
            <input type="hidden" name="ika_page" value="<?php echo esc_attr( get_the_title() ); ?>">
            <p class="hidden" aria-hidden="true">
              <label>&nbsp;<input type="text" name="ika_website" tabindex="-1" autocomplete="off" value=""></label>
            </p>

            <?php if ( $ika_notice ) : ?>
              <div class="rounded-2xl <?php echo 'success' === $ika_notice['type'] ? 'bg-green-50 text-green-800' : 'bg-red-50 text-red-800'; ?> p-4 text-sm font-bold">
                <?php echo esc_html( $ika_notice['message'] ); ?>
              </div>
            <?php endif; ?>

            <div class="grid gap-4 sm:grid-cols-2">
              <label class="grid gap-2 text-sm font-bold text-slate-700"><?php esc_html_e( 'Nom', 'ika-solution' ); ?>
                <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="nom" type="text" placeholder="<?php esc_attr_e( 'Votre nom', 'ika-solution' ); ?>" required>
              </label>
              <label class="grid gap-2 text-sm font-bold text-slate-700"><?php esc_html_e( 'Téléphone', 'ika-solution' ); ?>
                <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="telephone" type="tel" placeholder="+226">
              </label>
            </div>
            <label class="grid gap-2 text-sm font-bold text-slate-700"><?php esc_html_e( 'Email', 'ika-solution' ); ?>
              <input class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="email" type="email" placeholder="vous@entreprise.com" required>
            </label>
            <label class="grid gap-2 text-sm font-bold text-slate-700"><?php esc_html_e( 'Besoin', 'ika-solution' ); ?>
              <select class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="besoin">
                <?php foreach ( ika_contact_subjects() as $ika_subject ) : ?>
                <option><?php echo esc_html( $ika_subject ); ?></option>
                <?php endforeach; ?>
              </select>
            </label>
            <label class="grid gap-2 text-sm font-bold text-slate-700"><?php esc_html_e( 'Message', 'ika-solution' ); ?>
              <textarea class="min-h-28 rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="message" placeholder="<?php esc_attr_e( 'Décrivez votre projet', 'ika-solution' ); ?>" required></textarea>
            </label>
            <button class="h-10 w-fit whitespace-nowrap rounded-full bg-ikaRed px-4 text-xs font-extrabold text-white shadow-clean transition hover:bg-red-700" type="submit"><?php esc_html_e( 'Envoyer la demande', 'ika-solution' ); ?></button>
          </form>
          <?php endif; ?>
        </div>

        <?php if ( $ika_maps ) : ?>
        <div class="reveal mt-8 overflow-hidden rounded-[2rem] bg-white shadow-premium">
          <iframe class="h-[360px] w-full sm:h-[420px]" src="<?php echo esc_url( $ika_maps ); ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="<?php esc_attr_e( 'Localisation IKA SOLUTION', 'ika-solution' ); ?>"></iframe>
        </div>
        <?php endif; ?>
      </div>
    </section>
