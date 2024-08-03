<div class="front_page_section front_page_section_about<?php
	$critique_scheme = critique_get_theme_option( 'front_page_about_scheme' );
	if ( ! empty( $critique_scheme ) && ! critique_is_inherit( $critique_scheme ) ) {
		echo ' scheme_' . esc_attr( $critique_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( critique_get_theme_option( 'front_page_about_paddings' ) );
	if ( critique_get_theme_option( 'front_page_about_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$critique_css      = '';
		$critique_bg_image = critique_get_theme_option( 'front_page_about_bg_image' );
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
	$critique_anchor_icon = critique_get_theme_option( 'front_page_about_anchor_icon' );
	$critique_anchor_text = critique_get_theme_option( 'front_page_about_anchor_text' );
if ( ( ! empty( $critique_anchor_icon ) || ! empty( $critique_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_about"'
									. ( ! empty( $critique_anchor_icon ) ? ' icon="' . esc_attr( $critique_anchor_icon ) . '"' : '' )
									. ( ! empty( $critique_anchor_text ) ? ' title="' . esc_attr( $critique_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_about_inner
	<?php
	if ( critique_get_theme_option( 'front_page_about_fullheight' ) ) {
		echo ' critique-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$critique_css           = '';
			$critique_bg_mask       = critique_get_theme_option( 'front_page_about_bg_mask' );
			$critique_bg_color_type = critique_get_theme_option( 'front_page_about_bg_color_type' );
			if ( 'custom' == $critique_bg_color_type ) {
				$critique_bg_color = critique_get_theme_option( 'front_page_about_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_about_content_wrap content_wrap">
			<?php
			// Caption
			$critique_caption = critique_get_theme_option( 'front_page_about_caption' );
			if ( ! empty( $critique_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_about_caption front_page_block_<?php echo ! empty( $critique_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $critique_caption, 'critique_kses_content' ); ?></h2>
				<?php
			}

			// Description (text)
			$critique_description = critique_get_theme_option( 'front_page_about_description' );
			if ( ! empty( $critique_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_about_description front_page_block_<?php echo ! empty( $critique_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $critique_description ), 'critique_kses_content' ); ?></div>
				<?php
			}

			// Content
			$critique_content = critique_get_theme_option( 'front_page_about_content' );
			if ( ! empty( $critique_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_content front_page_section_about_content front_page_block_<?php echo ! empty( $critique_content ) ? 'filled' : 'empty'; ?>">
					<?php
					$critique_page_content_mask = '%%CONTENT%%';
					if ( strpos( $critique_content, $critique_page_content_mask ) !== false ) {
						$critique_content = preg_replace(
							'/(\<p\>\s*)?' . $critique_page_content_mask . '(\s*\<\/p\>)/i',
							sprintf(
								'<div class="front_page_section_about_source">%s</div>',
								apply_filters( 'the_content', get_the_content() )
							),
							$critique_content
						);
					}
					critique_show_layout( $critique_content );
					?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
