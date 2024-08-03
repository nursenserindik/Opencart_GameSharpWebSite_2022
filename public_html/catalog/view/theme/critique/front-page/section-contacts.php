<div class="front_page_section front_page_section_contacts<?php
	$critique_scheme = critique_get_theme_option( 'front_page_contacts_scheme' );
	if ( ! empty( $critique_scheme ) && ! critique_is_inherit( $critique_scheme ) ) {
		echo ' scheme_' . esc_attr( $critique_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( critique_get_theme_option( 'front_page_contacts_paddings' ) );
	if ( critique_get_theme_option( 'front_page_contacts_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$critique_css      = '';
		$critique_bg_image = critique_get_theme_option( 'front_page_contacts_bg_image' );
		if ( ! empty( $critique_bg_image ) ) {
			$critique_css .= 'background-image: url(' . esc_url( critique_get_attachment_url( $critique_bg_image ) ) . ');';
		}
		if ( ! empty( $critique_css ) ) {
			echo ' style="' . esc_attr( $critique_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$critique_anchor_icon = critique_get_theme_option( 'front_page_contacts_anchor_icon' );
	$critique_anchor_text = critique_get_theme_option( 'front_page_contacts_anchor_text' );
if ( ( ! empty( $critique_anchor_icon ) || ! empty( $critique_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_contacts"'
									. ( ! empty( $critique_anchor_icon ) ? ' icon="' . esc_attr( $critique_anchor_icon ) . '"' : '' )
									. ( ! empty( $critique_anchor_text ) ? ' title="' . esc_attr( $critique_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_contacts_inner
	<?php
	if ( critique_get_theme_option( 'front_page_contacts_fullheight' ) ) {
		echo ' critique-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$critique_css      = '';
			$critique_bg_mask  = critique_get_theme_option( 'front_page_contacts_bg_mask' );
			$critique_bg_color_type = critique_get_theme_option( 'front_page_contacts_bg_color_type' );
			if ( 'custom' == $critique_bg_color_type ) {
				$critique_bg_color = critique_get_theme_option( 'front_page_contacts_bg_color' );
			} elseif ( 'scheme_bg_color' == $critique_bg_color_type ) {
				$critique_bg_color = critique_get_scheme_color( 'bg_color', $critique_scheme );
			} else {
				$critique_bg_color = '';
			}
			if ( ! empty( $critique_bg_color ) && $critique_bg_mask > 0 ) {
				$critique_css .= 'background-color: ' . esc_attr(
					1 == $critique_bg_mask ? $critique_bg_color : critique_hex2rgba( $critique_bg_color, $critique_bg_mask )
				) . ';';
			}
			if ( ! empty( $critique_css ) ) {
				echo ' style="' . esc_attr( $critique_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_contacts_content_wrap content_wrap">
			<?php

			// Title and description
			$critique_caption     = critique_get_theme_option( 'front_page_contacts_caption' );
			$critique_description = critique_get_theme_option( 'front_page_contacts_description' );
			if ( ! empty( $critique_caption ) || ! empty( $critique_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				// Caption
				if ( ! empty( $critique_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_contacts_caption front_page_block_<?php echo ! empty( $critique_caption ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( $critique_caption, 'critique_kses_content' );
					?>
					</h2>
					<?php
				}

				// Description
				if ( ! empty( $critique_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_contacts_description front_page_block_<?php echo ! empty( $critique_description ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( wpautop( $critique_description ), 'critique_kses_content' );
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$critique_content = critique_get_theme_option( 'front_page_contacts_content' );
			$critique_layout  = critique_get_theme_option( 'front_page_contacts_layout' );
			if ( 'columns' == $critique_layout && ( ! empty( $critique_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				<div class="front_page_section_columns front_page_section_contacts_columns columns_wrap">
					<div class="column-1_3">
				<?php
			}

			if ( ( ! empty( $critique_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				<div class="front_page_section_content front_page_section_contacts_content front_page_block_<?php echo ! empty( $critique_content ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( $critique_content, 'critique_kses_content' );
					?>
				</div>
				<?php
			}

			if ( 'columns' == $critique_layout && ( ! empty( $critique_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div><div class="column-2_3">
				<?php
			}

			// Shortcode output
			$critique_sc = critique_get_theme_option( 'front_page_contacts_shortcode' );
			if ( ! empty( $critique_sc ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_output front_page_section_contacts_output front_page_block_<?php echo ! empty( $critique_sc ) ? 'filled' : 'empty'; ?>">
					<?php
					critique_show_layout( do_shortcode( $critique_sc ) );
					?>
				</div>
				<?php
			}

			if ( 'columns' == $critique_layout && ( ! empty( $critique_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>

		</div>
	</div>
</div>
