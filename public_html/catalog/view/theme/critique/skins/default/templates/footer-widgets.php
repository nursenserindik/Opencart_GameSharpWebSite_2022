<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0.10
 */

// Footer sidebar
$critique_footer_name    = critique_get_theme_option( 'footer_widgets' );
$critique_footer_present = ! critique_is_off( $critique_footer_name ) && is_active_sidebar( $critique_footer_name );
if ( $critique_footer_present ) {
	critique_storage_set( 'current_sidebar', 'footer' );
	$critique_footer_wide = critique_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $critique_footer_name ) ) {
		dynamic_sidebar( $critique_footer_name );
	}
	$critique_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $critique_out ) ) {
		$critique_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $critique_out );
		$critique_need_columns = true;  
		if ( $critique_need_columns ) {
			$critique_columns = max( 0, (int) critique_get_theme_option( 'footer_columns' ) );			
			if ( 0 == $critique_columns ) {
				$critique_columns = min( 4, max( 1, critique_tags_count( $critique_out, 'aside' ) ) );
			}
			if ( $critique_columns > 1 ) {
				$critique_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $critique_columns ) . ' widget', $critique_out );
			} else {
				$critique_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $critique_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<?php do_action( 'critique_action_before_sidebar_wrap', 'footer' ); ?>
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $critique_footer_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $critique_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'critique_action_before_sidebar', 'footer' );
				critique_show_layout( $critique_out );
				do_action( 'critique_action_after_sidebar', 'footer' );
				if ( $critique_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $critique_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
			<?php do_action( 'critique_action_after_sidebar_wrap', 'footer' ); ?>
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
