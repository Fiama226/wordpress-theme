<?php
/**
 * Formulaire de recherche.
 *
 * @package ika-solution
 */
?>
<form role="search" method="get" class="flex gap-2" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="sr-only" for="ika-search-field"><?php esc_html_e( 'Rechercher', 'ika-solution' ); ?></label>
	<input
		id="ika-search-field"
		class="min-h-[3.25rem] w-full rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-ikaBlue"
		type="search"
		name="s"
		value="<?php echo esc_attr( get_search_query() ); ?>"
		placeholder="<?php esc_attr_e( 'Rechercher sur le site…', 'ika-solution' ); ?>"
	>
	<button type="submit" class="shrink-0 rounded-full bg-ikaRed px-6 py-3 text-sm font-black text-white transition hover:bg-red-700"><?php esc_html_e( 'Rechercher', 'ika-solution' ); ?></button>
</form>
