<?php
/**
 * The "Style 9" template to display the content of the single post or attachment:
 * featured image, title and meta are placed inside the content area
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.75.0
 */
?>
<article id="post-<?php the_ID(); ?>"
	<?php
	post_class( 'post_item_single'
		. ' post_type_' . esc_attr( get_post_type() ) 
		. ' post_format_' . esc_attr( str_replace( 'post-format-', '', get_post_format() ) )
	);
	critique_add_seo_itemprops();
	?>
>
<?php

	do_action( 'critique_action_before_post_data' );

	critique_add_seo_snippets();

	// Single post thumbnail and title
	$critique_sidebar_position = critique_get_theme_option( 'sidebar_position' );
	if ( apply_filters( 'critique_filter_single_post_header', is_singular( 'post' ) || is_singular( 'attachment' ) ) ) {
		// Post title and meta
		ob_start();
		do_action( 'critique_action_before_post_header' );
		critique_sc_layouts_showed('title', false);
		critique_show_post_title_and_meta(
			array_merge( 
				array( 
					'author_avatar' => true,
					'show_labels'   => true,
					'add_spaces'    => true,
				),
				( 'hide' != $critique_sidebar_position ? 
					array (
						'share_type'    => 'list',	// block - icons with bg, list - small icons without background
						'split_meta_by' => 'share'
					) : array(
						'split_meta_by' => 'comments'	
					)
				)
			) 
		);
		do_action( 'critique_action_after_post_header' );
		$critique_post_header = ob_get_contents();
		ob_end_clean();
		// Featured image
		ob_start();
		critique_show_post_featured_image( array(
			'thumb_bg' => false,
			'class'    => 'alignwide',
			'popup'    => true,
		) );
		$critique_post_header .= ob_get_contents();
		ob_end_clean();
		$critique_with_featured_image = critique_is_with_featured_image( $critique_post_header );

		if ( strpos( $critique_post_header, 'post_featured' ) !== false
			|| strpos( $critique_post_header, 'post_title' ) !== false
			|| strpos( $critique_post_header, 'post_meta' ) !== false
		) {
			?>
			<div class="post_header_wrap post_header_wrap_in_content post_header_wrap_style_<?php
				echo esc_attr( critique_get_theme_option( 'single_style' ) );
				if ( $critique_with_featured_image ) {
					echo ' with_featured_image';
				}
			?>">
				<?php
				critique_show_layout( $critique_post_header );
				?>
			</div>
			<?php
		}
	}

	do_action( 'critique_action_before_post_content' );

	// Post content
	$critique_content_single = critique_get_theme_option( 'expand_content' );
	$critique_vertical_content = ( 'narrow' == $critique_content_single && 'hide' == $critique_sidebar_position ? critique_get_theme_option( 'post_vertical_content' ) : '');
	$critique_share_position = critique_array_get_keys_by_value( critique_get_theme_option( 'share_position' ) );
	?>
	<div class="post_content post_content_single entry-content<?php
		if ( in_array( 'left', $critique_share_position ) ) {
			echo ' post_info_vertical_present' . ( in_array( 'top', $critique_share_position ) ? ' post_info_vertical_hide_on_mobile' : '' );
		}
	?>" itemprop="mainEntityOfPage">
		<?php
		if ( in_array( 'left', $critique_share_position ) || !empty($critique_vertical_content) ) {
			?><div class="post_info_vertical"><?php
				if ( in_array( 'left', $critique_share_position ) && critique_exists_trx_addons() ) {
					?><div class="post_info_vertical_share"><?php
						echo '<h5 class="post_share_label">' . esc_html__('Share This Article', 'critique') . '</h5>';	
						critique_show_post_meta(
							apply_filters(
								'critique_filter_post_meta_args',
								array(
									'components'      => 'share',
									'class'           => 'post_share_horizontal',
									'share_type'      => 'block',
									'share_direction' => 'horizontal',
								),
								'single',
								1
							)
						); ?>
					</div><?php
				}
				if ( !empty($critique_vertical_content) ) {
					?><div class="post_info_vertical_content"><?php
						critique_show_layout($critique_vertical_content);
					?></div><?php
				}
			?></div><?php
		}
		the_content();
		?>
	</div><!-- .entry-content -->
	<?php
	do_action( 'critique_action_after_post_content' );
	
	// Post footer: Tags, likes, share, author, prev/next links and comments
	do_action( 'critique_action_before_post_footer' );
	?>
	<div class="post_footer post_footer_single entry-footer">
		<?php
		critique_show_post_pagination();
		if ( is_single() && ! is_attachment() ) {
			critique_show_post_footer();
		}
		?>
	</div>
	<?php
	do_action( 'critique_action_after_post_footer' );
	?>
</article>
