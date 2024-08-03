<?php
/**
 * The template to display the widgets area in the header
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

// Header sidebar
$critique_header_name    = critique_get_theme_option( 'header_widgets' );
$critique_header_present = ! critique_is_off( $critique_header_name ) && is_active_sidebar( $critique_header_name );
if ( $critique_header_present ) {
	critique_storage_set( 'current_sidebar', 'header' );
	$critique_header_wide = critique_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $critique_header_name ) ) {
		dynamic_sidebar( $critique_header_name );
	}
	$critique_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $critique_widgets_output ) ) {
		$critique_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $critique_widgets_output );
		$critique_need_columns   = strpos( $critique_widgets_output, 'columns_wrap' ) === false;
		if ( $critique_need_columns ) {
			$critique_columns = max( 0, (int) critique_get_theme_option( 'header_columns' ) );
			if ( 0 == $critique_columns ) {
				$critique_columns = min( 6, max( 1, critique_tags_count( $critique_widgets_output, 'aside' ) ) );
			}
			if ( $critique_columns > 1 ) {
				$critique_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $critique_columns ) . ' widget', $critique_widgets_output );
			} else {
				$critique_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $critique_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<?php do_action( 'critique_action_before_sidebar_wrap', 'header' ); ?>
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $critique_header_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $critique_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'critique_action_before_sidebar', 'header' );
				critique_show_layout( $critique_widgets_output );
				do_action( 'critique_action_after_sidebar', 'header' );
				if ( $critique_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $critique_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
			<?php do_action( 'critique_action_after_sidebar_wrap', 'header' ); ?>
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
