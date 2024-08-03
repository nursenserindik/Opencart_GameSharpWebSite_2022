<div class="front_page_section front_page_section_woocommerce<?php
	$critique_scheme = critique_get_theme_option( 'front_page_woocommerce_scheme' );
	if ( ! empty( $critique_scheme ) && ! critique_is_inherit( $critique_scheme ) ) {
		echo ' scheme_' . esc_attr( $critique_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( critique_get_theme_option( 'front_page_woocommerce_paddings' ) );
	if ( critique_get_theme_option( 'front_page_woocommerce_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$critique_css      = '';
		$critique_bg_image = critique_get_theme_option( 'front_page_woocommerce_bg_image' );
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
	$critique_anchor_icon = critique_get_theme_option( 'front_page_woocommerce_anchor_icon' );
	$critique_anchor_text = critique_get_theme_option( 'front_page_woocommerce_anchor_text' );
if ( ( ! empty( $critique_anchor_icon ) || ! empty( $critique_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_woocommerce"'
									. ( ! empty( $critique_anchor_icon ) ? ' icon="' . esc_attr( $critique_anchor_icon ) . '"' : '' )
									. ( ! empty( $critique_anchor_text ) ? ' title="' . esc_attr( $critique_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_woocommerce_inner
	<?php
	if ( critique_get_theme_option( 'front_page_woocommerce_fullheight' ) ) {
		echo ' critique-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$critique_css      = '';
			$critique_bg_mask  = critique_get_theme_option( 'front_page_woocommerce_bg_mask' );
			$critique_bg_color_type = critique_get_theme_option( 'front_page_woocommerce_bg_color_type' );
			if ( 'custom' == $critique_bg_color_type ) {
				$critique_bg_color = critique_get_theme_option( 'front_page_woocommerce_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_woocommerce_content_wrap content_wrap woocommerce">
			<?php
			// Content wrap with title and description
			$critique_caption     = critique_get_theme_option( 'front_page_woocommerce_caption' );
			$critique_description = critique_get_theme_option( 'front_page_woocommerce_description' );
			if ( ! empty( $critique_caption ) || ! empty( $critique_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				// Caption
				if ( ! empty( $critique_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_woocommerce_caption front_page_block_<?php echo ! empty( $critique_caption ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( $critique_caption, 'critique_kses_content' );
					?>
					</h2>
					<?php
				}

				// Description (text)
				if ( ! empty( $critique_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_woocommerce_description front_page_block_<?php echo ! empty( $critique_description ) ? 'filled' : 'empty'; ?>">
					<?php
						echo wp_kses( wpautop( $critique_description ), 'critique_kses_content' );
					?>
					</div>
					<?php
				}
			}

			// Content (widgets)
			?>
			<div class="front_page_section_output front_page_section_woocommerce_output list_products shop_mode_thumbs">
				<?php
				$critique_woocommerce_sc = critique_get_theme_option( 'front_page_woocommerce_products' );
				if ( 'products' == $critique_woocommerce_sc ) {
					$critique_woocommerce_sc_ids      = critique_get_theme_option( 'front_page_woocommerce_products_per_page' );
					$critique_woocommerce_sc_per_page = count( explode( ',', $critique_woocommerce_sc_ids ) );
				} else {
					$critique_woocommerce_sc_per_page = max( 1, (int) critique_get_theme_option( 'front_page_woocommerce_products_per_page' ) );
				}
				$critique_woocommerce_sc_columns = max( 1, min( $critique_woocommerce_sc_per_page, (int) critique_get_theme_option( 'front_page_woocommerce_products_columns' ) ) );
				echo do_shortcode(
					"[{$critique_woocommerce_sc}"
									. ( 'products' == $critique_woocommerce_sc
											? ' ids="' . esc_attr( $critique_woocommerce_sc_ids ) . '"'
											: '' )
									. ( 'product_category' == $critique_woocommerce_sc
											? ' category="' . esc_attr( critique_get_theme_option( 'front_page_woocommerce_products_categories' ) ) . '"'
											: '' )
									. ( 'best_selling_products' != $critique_woocommerce_sc
											? ' orderby="' . esc_attr( critique_get_theme_option( 'front_page_woocommerce_products_orderby' ) ) . '"'
												. ' order="' . esc_attr( critique_get_theme_option( 'front_page_woocommerce_products_order' ) ) . '"'
											: '' )
									. ' per_page="' . esc_attr( $critique_woocommerce_sc_per_page ) . '"'
									. ' columns="' . esc_attr( $critique_woocommerce_sc_columns ) . '"'
					. ']'
				);
				?>
			</div>
		</div>
	</div>
</div>
