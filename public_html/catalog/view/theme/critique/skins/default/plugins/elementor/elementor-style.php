<?php
// Add theme-specific CSS-animations
if ( ! function_exists( 'critique_elm_add_theme_animations' ) ) {
	add_filter( 'elementor/controls/animations/additional_animations', 'critique_elm_add_theme_animations' );
	function critique_elm_add_theme_animations( $animations ) {
		/* To add a theme-specific animations to the list:
			1) Merge to the array 'animations': array(
													esc_html__( 'Theme Specific', 'critique' ) => array(
														'ta_custom_1' => esc_html__( 'Custom 1', 'critique' )
													)
												)
			2) Add a CSS rules for the class '.ta_custom_1' to create a custom entrance animation
		*/
		$animations = array_merge(
						$animations,
						array(
							esc_html__( 'Theme Specific', 'critique' ) => array(
																			'ta_fadeinup'     => esc_html__( 'Fade In Up (Short)', 'critique' ),
																			'ta_fadeinright'  => esc_html__( 'Fade In Right (Short)', 'critique' ),
																			'ta_fadeinleft'   => esc_html__( 'Fade In Left (Short)', 'critique' ),
																			'ta_fadeindown'   => esc_html__( 'Fade In Down (Short)', 'critique' ),
																			'ta_fadein'       => esc_html__( 'Fade In (Short)', 'critique' ),
																			'ta_under_strips' => esc_html__( 'Under strips', 'critique' ),
																			'ta_mouse_wheel' => esc_html__( 'Mouse Wheel', 'critique' ),
																			'blogger_coverbg_parallax' => esc_html__( 'Only Blogger cover image parallax', 'critique' ),
																			)
							)
						);
		return $animations;
	}
}
