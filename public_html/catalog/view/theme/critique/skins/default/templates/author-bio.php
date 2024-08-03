<?php
/**
 * The template to display the Author bio
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */
?>

<div class="author_info author vcard" itemprop="author" itemscope="itemscope" itemtype="<?php echo esc_attr( critique_get_protocol( true ) ); ?>//schema.org/Person">

	<div class="author_avatar" itemprop="image">
		<a class="author_link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			<?php
			$critique_mult = critique_get_retina_multiplier();
			echo get_avatar( get_the_author_meta( 'user_email' ), 120 * $critique_mult );
			?>
		</a>
	</div><!-- .author_avatar -->

	<div class="author_description">
		<div class="author_label"><?php esc_html_e( 'Written by', 'critique' ); ?></div>
		<h6 class="author_title" itemprop="name">		
			<a class="author_link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><span class="fn"><?php the_author(); ?></span></a>
		</h6>
		<div class="author_bio" itemprop="description">
			<?php echo wp_kses( wpautop( get_the_author_meta( 'description' ) ), 'critique_kses_content' ); ?>
			<div class="author_links">
				<a class="author_link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
													<?php
													// Translators: Add the author's name in the <span>
													printf( esc_html__( 'View all posts by %s', 'critique' ), '<span class="author_name">' . esc_html( get_the_author() ) . '</span>' );
													?>
				</a>
				<?php do_action( 'critique_action_user_meta', 'author-bio' ); ?>
			</div>
		</div><!-- .author_bio -->

	</div><!-- .author_description -->

</div><!-- .author_info -->
