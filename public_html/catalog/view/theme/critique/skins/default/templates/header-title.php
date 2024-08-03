<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

// Page (category, tag, archive, author) title

if ( critique_need_page_title() ) {
	critique_sc_layouts_showed( 'title', true );
	critique_sc_layouts_showed( 'postmeta', true );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								critique_show_post_meta(
									apply_filters(
										'critique_filter_post_meta_args', array(
											'components' => join( ',', critique_array_get_keys_by_value( critique_get_theme_option( 'meta_parts' ) ) ),
											'counters'   => join( ',', critique_array_get_keys_by_value( critique_get_theme_option( 'counters' ) ) ),
											'seo'        => critique_is_on( critique_get_theme_option( 'seo_snippets' ) ),
										), 'header', 1
									)
								);
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$critique_blog_title           = critique_get_blog_title();
							$critique_blog_title_text      = '';
							$critique_blog_title_class     = '';
							$critique_blog_title_link      = '';
							$critique_blog_title_link_text = '';
							if ( is_array( $critique_blog_title ) ) {
								$critique_blog_title_text      = $critique_blog_title['text'];
								$critique_blog_title_class     = ! empty( $critique_blog_title['class'] ) ? ' ' . $critique_blog_title['class'] : '';
								$critique_blog_title_link      = ! empty( $critique_blog_title['link'] ) ? $critique_blog_title['link'] : '';
								$critique_blog_title_link_text = ! empty( $critique_blog_title['link_text'] ) ? $critique_blog_title['link_text'] : '';
							} else {
								$critique_blog_title_text = $critique_blog_title;
							}
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr( $critique_blog_title_class ); ?>">
								<?php
								$critique_top_icon = critique_get_term_image_small();
								if ( ! empty( $critique_top_icon ) ) {
									$critique_attr = critique_getimagesize( $critique_top_icon );
									?>
									<img src="<?php echo esc_url( $critique_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'critique' ); ?>"
										<?php
										if ( ! empty( $critique_attr[3] ) ) {
											critique_show_layout( $critique_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses_data( $critique_blog_title_text );
								?>
							</h1>
							<?php
							if ( ! empty( $critique_blog_title_link ) && ! empty( $critique_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $critique_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $critique_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( ! is_paged() && ( is_category() || is_tag() || is_tax() ) ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						ob_start();
						do_action( 'critique_action_breadcrumbs' );
						$critique_breadcrumbs = ob_get_contents();
						ob_end_clean();
						critique_show_layout( $critique_breadcrumbs, '<div class="sc_layouts_title_breadcrumbs">', '</div>' );
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
