<?php
/**
 * The template to display the user's avatar, bio and socials on the Author page
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.71.0
 */
?>

<div class="author_page author vcard" itemprop="author" itemscope="itemscope" itemtype="<?php echo esc_attr( critique_get_protocol( true ) ); ?>//schema.org/Person">

	<div class="author_avatar" itemprop="image">
		<?php
		$critique_mult = critique_get_retina_multiplier();
		echo get_avatar( get_the_author_meta( 'user_email' ), 410 * $critique_mult );
		?>
	</div><!-- .author_avatar -->

	<h4 class="author_title" itemprop="name"><span class="fn"><?php the_author(); ?></span></h4>

	<?php
	$critique_author_description = get_the_author_meta( 'description' );
	if ( ! empty( $critique_author_description ) ) {
		?>
		<div class="author_bio" itemprop="description"><?php echo wp_kses( wpautop( $critique_author_description ), 'critique_kses_content' ); ?></div>
		<?php
	}
	?>

	<div class="author_details">
		<span class="author_posts_total">
			<?php
			$critique_posts_total = count_user_posts( get_the_author_meta('ID'), 'post' );
			if ( $critique_posts_total > 0 ) {
				// Translators: Add the author's posts number to the message
				echo wp_kses( sprintf( _n( '%s article published', '%s articles published', $critique_posts_total, 'critique' ),
										'<span class="author_posts_total_value">' . number_format_i18n( $critique_posts_total ) . '</span>'
								 		),
							'critique_kses_content'
							);
			} else {
				esc_html_e( 'No posts published.', 'critique' );
			}
			?>
		</span><?php
			ob_start();
			do_action( 'critique_action_user_meta', 'author-page' );
			$critique_socials = ob_get_contents();
			ob_end_clean();
			critique_show_layout( $critique_socials,
				'<span class="author_socials"><span class="author_socials_caption">' . esc_html__( 'Follow:', 'critique' ) . '</span>',
				'</span>'
			);
		?>
	</div><!-- .author_details -->

</div><!-- .author_page -->
