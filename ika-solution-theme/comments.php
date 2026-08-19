<?php
/**
 * Zone des commentaires (page détail d'une actualité).
 *
 * Reproduit la mise en page du site statique (detail-actualite.php) :
 * une carte blanche « Commentaires » à gauche et le formulaire
 * « Laisser un commentaire » à droite, mêmes styles et mêmes libellés.
 * Contrairement au statique, les commentaires sont de vrais commentaires
 * WordPress (modération, réponses, notifications) : le rendu est identique,
 * seule la plomberie change.
 *
 * @package ika-solution
 */

if ( post_password_required() ) {
	return;
}

if ( ! function_exists( 'ika_comment_card' ) ) {
	/**
	 * Affiche un commentaire avec la carte du site statique.
	 *
	 * @param WP_Comment $comment Commentaire.
	 * @param array      $args    Arguments de wp_list_comments().
	 * @param int        $depth   Profondeur.
	 */
	function ika_comment_card( $comment, $args, $depth ) {
		?>
		<div id="comment-<?php comment_ID(); ?>" <?php comment_class( 'rounded-2xl bg-ikaSoft p-5' ); ?>>
			<p class="font-black text-ikaBlue"><?php echo esc_html( get_comment_author( $comment ) ); ?></p>
			<div class="mt-2 text-sm leading-7 text-slate-600"><?php comment_text(); ?></div>
			<?php if ( '0' === $comment->comment_approved ) : ?>
			<p class="mt-2 text-xs font-bold text-ikaRed"><?php esc_html_e( 'Votre commentaire est en attente de validation.', 'ika-solution' ); ?></p>
			<?php endif; ?>
		</div>
		<?php
	}
}

$ika_field_class = 'min-h-[3.25rem] rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue';
$ika_label_class = 'mt-5 grid gap-2 text-sm font-bold text-slate-700';
?>
<div id="comments" class="rounded-[2rem] bg-white p-7 shadow-clean sm:p-8">
	<h2 class="text-2xl font-black text-ikaBlueDark"><?php esc_html_e( 'Commentaires', 'ika-solution' ); ?></h2>
	<div id="commentsList" class="mt-6 grid gap-4">
		<?php if ( have_comments() ) : ?>
			<?php
			wp_list_comments(
				array(
					'style'    => 'div',
					'callback' => 'ika_comment_card',
				)
			);
			?>
			<?php the_comments_pagination( array( 'mid_size' => 2 ) ); ?>
		<?php else : ?>
			<p class="text-sm leading-7 text-slate-600"><?php esc_html_e( 'Soyez le premier à réagir à cet article.', 'ika-solution' ); ?></p>
		<?php endif; ?>
	</div>
	<?php if ( ! comments_open() && get_comments_number() ) : ?>
	<p class="mt-6 text-sm text-slate-600"><?php esc_html_e( 'Les commentaires sont fermés.', 'ika-solution' ); ?></p>
	<?php endif; ?>
</div>

<?php
comment_form(
	array(
		'id_form'              => 'commentForm',
		'class_form'           => 'relative rounded-[2rem] bg-white p-7 shadow-clean sm:p-8',
		'title_reply'          => __( 'Laisser un commentaire', 'ika-solution' ),
		'title_reply_before'   => '<h2 class="text-2xl font-black text-ikaBlueDark">',
		'title_reply_after'    => '</h2>',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'fields'               => array(
			'author' => '<label class="' . esc_attr( $ika_label_class ) . '">' . esc_html__( 'Nom', 'ika-solution' )
				. '<input id="commentName" class="' . esc_attr( $ika_field_class ) . '" name="author" type="text" required placeholder="'
				. esc_attr__( 'Votre nom', 'ika-solution' ) . '" value="' . esc_attr( wp_get_current_commenter()['comment_author'] ) . '"></label>',
			'email'  => '<label class="' . esc_attr( $ika_label_class ) . '">' . esc_html__( 'Email', 'ika-solution' )
				. '<input class="' . esc_attr( $ika_field_class ) . '" name="email" type="email" required placeholder="vous@entreprise.com" value="'
				. esc_attr( wp_get_current_commenter()['comment_author_email'] ) . '"></label>',
		),
		'comment_field'        => '<label class="' . esc_attr( $ika_label_class ) . '">' . esc_html__( 'Commentaire', 'ika-solution' )
			. '<textarea id="commentMessage" class="min-h-36 rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-ikaBlue" name="comment" required placeholder="'
			. esc_attr__( 'Votre message', 'ika-solution' ) . '"></textarea></label>',
		'class_submit'         => 'mt-6 rounded-full bg-ikaRed px-7 py-4 text-sm font-extrabold text-white shadow-clean transition hover:bg-red-700',
		'label_submit'         => __( 'Publier le commentaire', 'ika-solution' ),
	)
);
