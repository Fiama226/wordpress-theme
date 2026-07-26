<?php
/**
 * Zone des commentaires.
 *
 * @package ika-solution
 */

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="mt-16 border-t border-slate-100 pt-10">
	<?php if ( have_comments() ) : ?>
		<h2 class="text-2xl font-black text-ikaBlueDark">
			<?php
			$ika_count = get_comments_number();
			printf(
				esc_html( _n( '%s commentaire', '%s commentaires', $ika_count, 'ika-solution' ) ),
				esc_html( number_format_i18n( $ika_count ) )
			);
			?>
		</h2>

		<ol class="mt-8 space-y-6">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 48,
				)
			);
			?>
		</ol>

		<?php the_comments_pagination( array( 'mid_size' => 2 ) ); ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="mt-8 text-sm text-slate-600"><?php esc_html_e( 'Les commentaires sont fermés.', 'ika-solution' ); ?></p>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'class_submit'  => 'rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700',
			'title_reply'   => __( 'Laisser un commentaire', 'ika-solution' ),
			'title_reply_before' => '<h3 class="mt-10 text-2xl font-black text-ikaBlueDark">',
			'title_reply_after'  => '</h3>',
		)
	);
	?>
</div>
