<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

							do_action( 'critique_action_page_content_end_text' );
							
							// Widgets area below the content
							critique_create_widgets_area( 'widgets_below_content' );
						
							do_action( 'critique_action_page_content_end' );
							?>
						</div>
						<?php

						// Show main sidebar
						get_sidebar();
						?>
					</div>
					<?php

					do_action( 'critique_action_after_content_wrap' );

					// Widgets area below the page and related posts below the page
					$critique_body_style = critique_get_theme_option( 'body_style' );
					$critique_widgets_name = critique_get_theme_option( 'widgets_below_page' );
					$critique_show_widgets = ! critique_is_off( $critique_widgets_name ) && is_active_sidebar( $critique_widgets_name );
					$critique_show_related = is_single() && critique_get_theme_option( 'related_position' ) == 'below_page';
					if ( $critique_show_widgets || $critique_show_related ) {
						if ( 'fullscreen' != $critique_body_style ) {
							?>
							<div class="content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $critique_show_related ) {
							do_action( 'critique_action_related_posts' );
						}

						// Widgets area below page content
						if ( $critique_show_widgets ) {
							critique_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $critique_body_style ) {
							?>
							</div>
							<?php
						}
					}
					do_action( 'critique_action_page_content_wrap_end' );
					?>
			</div>
			<?php
			do_action( 'critique_action_after_page_content_wrap' );

			// Don't display the footer elements while actions 'full_post_loading' and 'prev_post_loading'
			if ( ( ! is_singular( 'post' ) && ! is_singular( 'attachment' ) ) || ! in_array ( critique_get_value_gp( 'action' ), array( 'full_post_loading', 'prev_post_loading' ) ) ) {
				
				// Skip link anchor to fast access to the footer from keyboard
				?>
				<a id="footer_skip_link_anchor" class="critique_skip_link_anchor" href="#"></a>
				<?php

				do_action( 'critique_action_before_footer' );

				// Footer
				$critique_footer_type = critique_get_theme_option( 'footer_type' );
				if ( 'custom' == $critique_footer_type && ! critique_is_layouts_available() ) {
					$critique_footer_type = 'default';
				}
				get_template_part( apply_filters( 'critique_filter_get_template_part', "templates/footer-" . sanitize_file_name( $critique_footer_type ) ) );

				do_action( 'critique_action_after_footer' );

			}
			?>

			<?php do_action( 'critique_action_page_wrap_end' ); ?>

		</div>

		<?php do_action( 'critique_action_after_page_wrap' ); ?>

	</div>

	<?php do_action( 'critique_action_after_body' ); ?>

	<?php wp_footer(); ?>

</body>
</html>