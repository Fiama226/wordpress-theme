<?php
/**
 * Template part : section contact des pages partenaires.
 *
 * Reproduit à l'identique la section « Contact » du site statique
 * (fond bleu foncé, formulaire blanc flottant, mêmes champs et libellés).
 * Seule la plomberie change : le formulaire est traité par le thème
 * (ika_handle_contact_form() dans inc/contact-form.php) avec nonce,
 * honeypot anti-spam et wp_mail(), au lieu de l'ancien contact-submit.php.
 *
 * Attend dans $GLOBALS['ika_partner_contact'] :
 * - 'title' : titre de la section (ex : « Parlez-nous de votre projet Odoo. »)
 * - 'text'  : paragraphe d'introduction.
 * Les sujets du select sont fournis par le filtre 'ika_contact_subjects'
 * branché par la page appelante.
 *
 * @package ika-solution
 */

$ika_pc_title  = isset( $GLOBALS['ika_partner_contact']['title'] ) ? $GLOBALS['ika_partner_contact']['title'] : '';
$ika_pc_text   = isset( $GLOBALS['ika_partner_contact']['text'] ) ? $GLOBALS['ika_partner_contact']['text'] : '';
$ika_pc_notice = function_exists( 'ika_get_contact_notice' ) ? ika_get_contact_notice() : null;
$ika_pc_action = get_permalink();
$ika_pc_action = $ika_pc_action ? $ika_pc_action : home_url( '/' );
?>
  <section id="contact" class="bg-ikaBlueDark py-16 text-white sm:py-20">
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[.9fr_1.1fr] lg:items-center lg:px-8">
      <div>
        <p class="text-sm font-black uppercase tracking-[0.2em] text-red-200"><?php esc_html_e( 'Contact', 'ika-solution' ); ?></p>
        <h2 class="mt-4 text-3xl font-black leading-tight sm:text-4xl"><?php echo esc_html( $ika_pc_title ); ?></h2>
        <p class="mt-5 max-w-xl text-base leading-8 text-white/85"><?php echo esc_html( $ika_pc_text ); ?></p>
      </div>
      <form class="relative grid gap-4 rounded-[2rem] bg-white p-7 text-ikaInk shadow-premium sm:p-8" action="<?php echo esc_url( $ika_pc_action . '#contact' ); ?>" method="post">
        <?php wp_nonce_field( 'ika_contact', 'ika_contact_nonce' ); ?>
        <input type="hidden" name="action" value="ika_contact">
        <input type="hidden" name="ika_page" value="<?php echo esc_attr( get_the_title() ); ?>">
        <div class="absolute left-[-9999px] top-auto h-px w-px overflow-hidden" aria-hidden="true">
          <label><?php esc_html_e( 'Ne pas remplir ce champ', 'ika-solution' ); ?> <input type="text" name="ika_website" tabindex="-1" autocomplete="off" value=""></label>
        </div>
        <?php if ( $ika_pc_notice ) : ?>
          <div class="rounded-2xl <?php echo 'success' === $ika_pc_notice['type'] ? 'bg-green-50 text-green-800' : 'bg-red-50 text-red-800'; ?> p-4 text-sm font-bold">
            <?php echo esc_html( $ika_pc_notice['message'] ); ?>
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
        <label class="grid gap-2 text-sm font-bold text-slate-700"><?php esc_html_e( 'Solution concernée', 'ika-solution' ); ?>
          <select class="min-h-[3.25rem] rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="besoin">
            <?php foreach ( ika_contact_subjects() as $ika_pc_subject ) : ?>
            <option><?php echo esc_html( $ika_pc_subject ); ?></option>
            <?php endforeach; ?>
          </select>
        </label>
        <label class="grid gap-2 text-sm font-bold text-slate-700"><?php esc_html_e( 'Message', 'ika-solution' ); ?>
          <textarea class="min-h-28 rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue" name="message" placeholder="<?php esc_attr_e( 'Décrivez votre projet', 'ika-solution' ); ?>" required></textarea>
        </label>
        <button class="h-10 w-fit whitespace-nowrap rounded-full bg-ikaRed px-4 text-xs font-extrabold text-white shadow-clean transition hover:bg-red-700" type="submit"><?php esc_html_e( 'Envoyer la demande', 'ika-solution' ); ?></button>
      </form>
    </div>
  </section>
