<?php
/**
 * Helper partagé des pages « partenaires » du site statique
 * (Odoo, Fortinet, Palo Alto, Microsoft).
 *
 * Reproduit fidèlement le rendu des onglets de la page Proxmox
 * (boutons pilules + panneaux de cartes), avec le même style Tailwind.
 *
 * @package ika-solution
 */

if ( ! function_exists( 'ika_h' ) ) {
	/**
	 * Échappe une valeur pour le HTML.
	 *
	 * @param mixed $value Valeur à échapper.
	 * @return string
	 */
	function ika_h( $value ) {
		return htmlspecialchars( (string) $value, ENT_QUOTES, 'UTF-8' );
	}
}

/**
 * Rend un groupe d'onglets (boutons + panneaux de cartes).
 *
 * @param string $group_id Préfixe unique du groupe (ex : 'odoo').
 * @param array  $tabs     Onglets : id, label, icon, items[ {title, text, links[]} ].
 */
function ika_partner_render_tabs( $group_id, $tabs ) {
	?>
	<div class="mt-10" data-pmx-tabs>
		<div class="flex flex-wrap gap-2.5" role="tablist">
			<?php foreach ( $tabs as $ika_tab ) : ?>
			<button type="button" role="tab" class="pmx-tab rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-black text-ikaBlue transition hover:border-ikaBlue" data-pmx-target="<?php echo ika_h( $group_id . '-' . $ika_tab['id'] ); ?>" aria-selected="false">
				<span aria-hidden="true"><?php echo ika_h( $ika_tab['icon'] ); ?></span> <?php echo ika_h( $ika_tab['label'] ); ?>
			</button>
			<?php endforeach; ?>
		</div>
		<?php foreach ( $tabs as $ika_tab ) : ?>
		<div id="<?php echo ika_h( $group_id . '-' . $ika_tab['id'] ); ?>" class="pmx-panel mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3" role="tabpanel" hidden>
			<?php foreach ( $ika_tab['items'] as $ika_item ) : ?>
			<article class="flex h-full flex-col rounded-2xl bg-white p-6 shadow-clean transition hover:-translate-y-1 hover:shadow-premium">
				<h3 class="text-lg font-black leading-snug text-ikaBlue"><?php echo ika_h( $ika_item['title'] ); ?></h3>
				<p class="mt-3 flex-1 text-sm leading-7 text-slate-600"><?php echo ika_h( $ika_item['text'] ); ?></p>
				<?php if ( ! empty( $ika_item['links'] ) ) : ?>
				<div class="mt-4 flex flex-wrap gap-2">
					<?php foreach ( $ika_item['links'] as $ika_link ) : ?>
					<a class="rounded-full bg-ikaSoft px-4 py-2 text-xs font-black text-ikaBlue transition hover:bg-ikaBlue hover:text-white" href="<?php echo ika_h( $ika_link[1] ); ?>" target="_blank" rel="noopener"><?php echo ika_h( $ika_link[0] ); ?> ↗</a>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</article>
			<?php endforeach; ?>
		</div>
		<?php endforeach; ?>
	</div>
	<?php
}
