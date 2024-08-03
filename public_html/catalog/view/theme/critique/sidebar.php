<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */

if ( critique_sidebar_present() ) {
	
	$critique_sidebar_type = critique_get_theme_option( 'sidebar_type' );
	if ( 'custom' == $critique_sidebar_type && ! critique_is_layouts_available() ) {
		$critique_sidebar_type = 'default';
	}
	
	// Catch output to the buffer
	ob_start();
	if ( 'default' == $critique_sidebar_type ) {
		// Default sidebar with widgets
		$critique_sidebar_name = critique_get_theme_option( 'sidebar_widgets' );
		critique_storage_set( 'current_sidebar', 'sidebar' );
		if ( is_active_sidebar( $critique_sidebar_name ) ) {
			dynamic_sidebar( $critique_sidebar_name );
		}
	} else {
		// Custom sidebar from Layouts Builder
		$critique_sidebar_id = critique_get_custom_sidebar_id();
		do_action( 'critique_action_show_layout', $critique_sidebar_id );
	}
	$critique_out = trim( ob_get_contents() );
	ob_end_clean();
	
	// If any html is present - display it
	if ( ! empty( $critique_out ) ) {
		$critique_sidebar_position    = critique_get_theme_option( 'sidebar_position' );
		$critique_sidebar_position_ss = critique_get_theme_option( 'sidebar_position_ss' );
		?>
		<div class="sidebar widget_area
			<?php
			echo ' ' . esc_attr( $critique_sidebar_position );
			echo ' sidebar_' . esc_attr( $critique_sidebar_position_ss );
			echo ' sidebar_' . esc_attr( $critique_sidebar_type );

			if ( 'float' == $critique_sidebar_position_ss ) {
				echo ' sidebar_float';
			}
			$critique_sidebar_scheme = critique_get_theme_option( 'sidebar_scheme' );
			if ( ! empty( $critique_sidebar_scheme ) && ! critique_is_inherit( $critique_sidebar_scheme ) ) {
				echo ' scheme_' . esc_attr( $critique_sidebar_scheme );
			}
			?>
		" role="complementary">
			<?php

			// Skip link anchor to fast access to the sidebar from keyboard
			?>
			<a id="sidebar_skip_link_anchor" class="critique_skip_link_anchor" href="#"></a>
			<?php

			do_action( 'critique_action_before_sidebar_wrap', 'sidebar' );

			// Button to show/hide sidebar on mobile
			if ( in_array( $critique_sidebar_position_ss, array( 'above', 'float' ) ) ) {
				$critique_title = apply_filters( 'critique_filter_sidebar_control_title', 'float' == $critique_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'critique' ) : '' );
				$critique_text  = apply_filters( 'critique_filter_sidebar_control_text', 'above' == $critique_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'critique' ) : '' );
				?>
				<a href="#" class="sidebar_control" title="<?php echo esc_attr( $critique_title ); ?>"><?php echo esc_html( $critique_text ); ?></a>
				<?php
			}
			?>
			<div class="sidebar_inner">
				<?php
				do_action( 'critique_action_before_sidebar', 'sidebar' );
				critique_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $critique_out ) );
				do_action( 'critique_action_after_sidebar', 'sidebar' );
				?>
			</div>
			<?php

			do_action( 'critique_action_after_sidebar_wrap', 'sidebar' );

			?>
		</div>
		<div class="clearfix"></div>
		<?php
	}
}
