<?php
/**
 * The template to display single post
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

// Full post loading
$full_post_loading          = critique_get_value_gp( 'action' ) == 'full_post_loading';

// Prev post loading
$prev_post_loading          = critique_get_value_gp( 'action' ) == 'prev_post_loading';
$prev_post_loading_type     = critique_get_theme_option( 'posts_navigation_scroll_which_block' );

// Position of the related posts
$critique_related_position   = critique_get_theme_option( 'related_position' );

// Type of the prev/next post navigation
$critique_posts_navigation   = critique_get_theme_option( 'posts_navigation' );
$critique_prev_post          = false;
$critique_prev_post_same_cat = critique_get_theme_option( 'posts_navigation_scroll_same_cat' );

// Rewrite style of the single post if current post loading via AJAX and featured image and title is not in the content
if ( ( $full_post_loading 
		|| 
		( $prev_post_loading && 'article' == $prev_post_loading_type )
	) 
	&& 
	! in_array( critique_get_theme_option( 'single_style' ), array( 'style-6' ) )
) {
	critique_storage_set_array( 'options_meta', 'single_style', 'style-6' );
}

do_action( 'critique_action_prev_post_loading', $prev_post_loading, $prev_post_loading_type );

get_header();

while ( have_posts() ) {

	the_post();

	// Type of the prev/next post navigation
	if ( 'scroll' == $critique_posts_navigation ) {
		$critique_prev_post = get_previous_post( $critique_prev_post_same_cat );  // Get post from same category
		if ( ! $critique_prev_post && $critique_prev_post_same_cat ) {
			$critique_prev_post = get_previous_post( false );                    // Get post from any category
		}
		if ( ! $critique_prev_post ) {
			$critique_posts_navigation = 'links';
		}
	}

	// Override some theme options to display featured image, title and post meta in the dynamic loaded posts
	if ( $full_post_loading || ( $prev_post_loading && $critique_prev_post ) ) {
		critique_sc_layouts_showed( 'featured', false );
		critique_sc_layouts_showed( 'title', false );
		critique_sc_layouts_showed( 'postmeta', false );
	}

	// If related posts should be inside the content
	if ( strpos( $critique_related_position, 'inside' ) === 0 ) {
		ob_start();
	}

	// Display post's content
	get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/content', 'single-' . critique_get_theme_option( 'single_style' ) ), 'single-' . critique_get_theme_option( 'single_style' ) );

	// If related posts should be inside the content
	if ( strpos( $critique_related_position, 'inside' ) === 0 ) {
		$critique_content = ob_get_contents();
		ob_end_clean();

		ob_start();
		do_action( 'critique_action_related_posts' );
		$critique_related_content = ob_get_contents();
		ob_end_clean();

		if ( ! empty( $critique_related_content ) ) {
			$critique_related_position_inside = max( 0, min( 9, critique_get_theme_option( 'related_position_inside' ) ) );
			if ( 0 == $critique_related_position_inside ) {
				$critique_related_position_inside = mt_rand( 1, 9 );
			}

			$critique_p_number         = 0;
			$critique_related_inserted = false;
			$critique_in_block         = false;
			$critique_content_start    = strpos( $critique_content, '<div class="post_content' );
			$critique_content_end      = strrpos( $critique_content, '</div>' );

			for ( $i = max( 0, $critique_content_start ); $i < min( strlen( $critique_content ) - 3, $critique_content_end ); $i++ ) {
				if ( $critique_content[ $i ] != '<' ) {
					continue;
				}
				if ( $critique_in_block ) {
					if ( strtolower( substr( $critique_content, $i + 1, 12 ) ) == '/blockquote>' ) {
						$critique_in_block = false;
						$i += 12;
					}
					continue;
				} else if ( strtolower( substr( $critique_content, $i + 1, 10 ) ) == 'blockquote' && in_array( $critique_content[ $i + 11 ], array( '>', ' ' ) ) ) {
					$critique_in_block = true;
					$i += 11;
					continue;
				} else if ( 'p' == $critique_content[ $i + 1 ] && in_array( $critique_content[ $i + 2 ], array( '>', ' ' ) ) ) {
					$critique_p_number++;
					if ( $critique_related_position_inside == $critique_p_number ) {
						$critique_related_inserted = true;
						$critique_content = ( $i > 0 ? substr( $critique_content, 0, $i ) : '' )
											. $critique_related_content
											. substr( $critique_content, $i );
					}
				}
			}
			if ( ! $critique_related_inserted ) {
				if ( $critique_content_end > 0 ) {
					$critique_content = substr( $critique_content, 0, $critique_content_end ) . $critique_related_content . substr( $critique_content, $critique_content_end );
				} else {
					$critique_content .= $critique_related_content;
				}
			}
		}

		critique_show_layout( $critique_content );
	}

	// Comments
	do_action( 'critique_action_before_comments' );
	comments_template();
	do_action( 'critique_action_after_comments' );

	// Related posts
	if ( 'below_content' == $critique_related_position
		&& ( 'scroll' != $critique_posts_navigation || critique_get_theme_option( 'posts_navigation_scroll_hide_related' ) == 0 )
		&& ( ! $full_post_loading || critique_get_theme_option( 'open_full_post_hide_related' ) == 0 )
	) {
		do_action( 'critique_action_related_posts' );
	}

	// Post navigation: type 'scroll'
	if ( 'scroll' == $critique_posts_navigation && ! $full_post_loading ) {
		?>
		<div class="nav-links-single-scroll"
			data-post-id="<?php echo esc_attr( get_the_ID( $critique_prev_post ) ); ?>"
			data-post-link="<?php echo esc_attr( get_permalink( $critique_prev_post ) ); ?>"
			data-post-title="<?php the_title_attribute( array( 'post' => $critique_prev_post ) ); ?>"
			<?php do_action( 'critique_action_nav_links_single_scroll_data', $critique_prev_post ); ?>
		></div>
		<?php
	}
}

get_footer();
