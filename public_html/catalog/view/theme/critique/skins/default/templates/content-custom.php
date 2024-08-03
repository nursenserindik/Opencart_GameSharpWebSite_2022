<?php
/**
 * The custom template to display the content
 *
 * Used for index/archive/search.
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0.50
 */

$critique_template_args = get_query_var( 'critique_template_args' );
if ( is_array( $critique_template_args ) ) {
	$critique_columns       = empty( $critique_template_args['columns'] ) ? 2 : max( 1, $critique_template_args['columns'] );
	$critique_blog_style    = array( $critique_template_args['type'], $critique_columns );
	$critique_columns_class = critique_get_column_class( 1, $critique_columns, ! empty( $critique_template_args['columns_tablet']) ? $critique_template_args['columns_tablet'] : '', ! empty($critique_template_args['columns_mobile']) ? $critique_template_args['columns_mobile'] : '' );
} else {
	$critique_blog_style    = explode( '_', critique_get_theme_option( 'blog_style' ) );
	$critique_columns       = empty( $critique_blog_style[1] ) ? 2 : max( 1, $critique_blog_style[1] );
	$critique_columns_class = critique_get_column_class( 1, $critique_columns );
}
$critique_blog_id       = critique_get_custom_blog_id( join( '_', $critique_blog_style ) );
$critique_blog_style[0] = str_replace( 'blog-custom-', '', $critique_blog_style[0] );
$critique_expanded      = ! critique_sidebar_present() && critique_get_theme_option( 'expand_content' ) == 'expand';
$critique_components    = ! empty( $critique_template_args['meta_parts'] )
							? ( is_array( $critique_template_args['meta_parts'] )
								? join( ',', $critique_template_args['meta_parts'] )
								: $critique_template_args['meta_parts']
								)
							: critique_array_get_keys_by_value( critique_get_theme_option( 'meta_parts' ) );
$critique_post_format   = get_post_format();
$critique_post_format   = empty( $critique_post_format ) ? 'standard' : str_replace( 'post-format-', '', $critique_post_format );

$critique_blog_meta     = critique_get_custom_layout_meta( $critique_blog_id );
$critique_custom_style  = ! empty( $critique_blog_meta['scripts_required'] ) ? $critique_blog_meta['scripts_required'] : 'none';

if ( ! empty( $critique_template_args['slider'] ) || $critique_columns > 1 || ! critique_is_off( $critique_custom_style ) ) {
	?><div class="<?php
		if ( ! empty( $critique_template_args['slider'] ) ) {
			echo 'slider-slide swiper-slide';
		} else {
			echo esc_attr( critique_is_off( $critique_custom_style )
							? $critique_columns_class
							: sprintf( '%1$s_item %1$s_item-1_%2$d', $critique_custom_style, $critique_columns )
							);
		}
	?>">
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
			'post_item post_item_container post_format_' . esc_attr( $critique_post_format )
					. ' post_layout_custom post_layout_custom_' . esc_attr( $critique_columns )
					. ' post_layout_' . esc_attr( $critique_blog_style[0] )
					. ' post_layout_' . esc_attr( $critique_blog_style[0] ) . '_' . esc_attr( $critique_columns )
					. ( ! critique_is_off( $critique_custom_style )
						? ' post_layout_' . esc_attr( $critique_custom_style )
							. ' post_layout_' . esc_attr( $critique_custom_style ) . '_' . esc_attr( $critique_columns )
						: ''
						)
		);
	critique_add_blog_animation( $critique_template_args );
	?>
>
	<?php
	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}
	// Custom layout
	do_action( 'critique_action_show_layout', $critique_blog_id, get_the_ID() );
	?>
</article><?php
if ( ! empty( $critique_template_args['slider'] ) || $critique_columns > 1 || ! critique_is_off( $critique_custom_style ) ) {
	?></div><?php
	// Need opening PHP-tag above just after </div>, because <div> is a inline-block element (used as column)!
}
