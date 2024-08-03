<div class="front_page_section front_page_section_googlemap<?php
	$critique_scheme = critique_get_theme_option( 'front_page_googlemap_scheme' );
	if ( ! empty( $critique_scheme ) && ! critique_is_inherit( $critique_scheme ) ) {
		echo ' scheme_' . esc_attr( $critique_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( critique_get_theme_option( 'front_page_googlemap_paddings' ) );
	if ( critique_get_theme_option( 'front_page_googlemap_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$critique_css      = '';
		$critique_bg_image = critique_get_theme_option( 'front_page_googlemap_bg_image' );
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
	$critique_anchor_icon = critique_get_theme_option( 'front_page_googlemap_anchor_icon' );
	$critique_anchor_text = critique_get_theme_option( 'front_page_googlemap_anchor_text' );
if ( ( ! empty( $critique_anchor_icon ) || ! empty( $critique_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_googlemap"'
									. ( ! empty( $critique_anchor_icon ) ? ' icon="' . esc_attr( $critique_anchor_icon ) . '"' : '' )
									. ( ! empty( $critique_anchor_text ) ? ' title="' . esc_attr( $critique_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_googlemap_inner
		<?php
		$critique_layout = critique_get_theme_option( 'front_page_googlemap_layout' );
		echo ' front_page_section_layout_' . esc_attr( $critique_layout );
		if ( critique_get_theme_option( 'front_page_googlemap_fullheight' ) ) {
			echo ' critique-full-height sc_layouts_flex sc_layouts_columns_middle';
		}
		?>
		"
			<?php
			$critique_css      = '';
			$critique_bg_mask  = critique_get_theme_option( 'front_page_googlemap_bg_mask' );
			$critique_bg_color_type = critique_get_theme_option( 'front_page_googlemap_bg_color_type' );
			if ( 'custom' == $critique_bg_color_type ) {
				$critique_bg_color = critique_get_theme_option( 'front_page_googlemap_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_googlemap_content_wrap
		<?php
		if ( 'fullwidth' != $critique_layout ) {
			echo ' content_wrap';
		}
		?>
		">
			<?php
			// Content wrap with title and description
			$critique_caption     = critique_get_theme_option( 'front_page_googlemap_caption' );
			$critique_description = critique_get_theme_option( 'front_page_googlemap_description' );
			if ( ! empty( $critique_caption ) || ! empty( $critique_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'fullwidth' == $critique_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}
					// Caption
				if ( ! empty( $critique_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_googlemap_caption front_page_block_<?php echo ! empty( $critique_caption ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( $critique_caption, 'critique_kses_content' );
					?>
					</h2>
					<?php
				}

					// Description (text)
				if ( ! empty( $critique_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_googlemap_description front_page_block_<?php echo ! empty( $critique_description ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( wpautop( $critique_description ), 'critique_kses_content' );
					?>
					</div>
					<?php
				}
				if ( 'fullwidth' == $critique_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$critique_content = critique_get_theme_option( 'front_page_googlemap_content' );
			if ( ! empty( $critique_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'columns' == $critique_layout ) {
					?>
					<div class="front_page_section_columns front_page_section_googlemap_columns columns_wrap">
						<div class="column-1_3">
					<?php
				} elseif ( 'fullwidth' == $critique_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}

				?>
				<div class="front_page_section_content front_page_section_googlemap_content front_page_block_<?php echo ! empty( $critique_content ) ? 'filled' : 'empty'; ?>">
				<?php
					echo wp_kses( $critique_content, 'critique_kses_content' );
				?>
				</div>
				<?php

				if ( 'columns' == $critique_layout ) {
					?>
					</div><div class="column-2_3">
					<?php
				} elseif ( 'fullwidth' == $critique_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Widgets output
			?>
			<div class="front_page_section_output front_page_section_googlemap_output">
				<?php
				if ( is_active_sidebar( 'front_page_googlemap_widgets' ) ) {
					dynamic_sidebar( 'front_page_googlemap_widgets' );
				} elseif ( current_user_can( 'edit_theme_options' ) ) {
					if ( ! critique_exists_trx_addons() ) {
						critique_customizer_need_trx_addons_message();
					} else {
						critique_customizer_need_widgets_message( 'front_page_googlemap_caption', 'ThemeREX Addons - Google map' );
					}
				}
				?>
			</div>
			<?php

			if ( 'columns' == $critique_layout && ( ! empty( $critique_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>
		</div>
	</div>
</div>
