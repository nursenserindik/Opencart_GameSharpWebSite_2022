<?php
/**
 * The template to display menu in the footer
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0.10
 */

// Footer menu
$critique_menu_footer = critique_skin_get_nav_menu( 'menu_footer' );
if ( ! empty( $critique_menu_footer ) ) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php
			critique_show_layout(
				$critique_menu_footer,
				'<nav class="menu_footer_nav_area sc_layouts_menu sc_layouts_menu_default"'
					. ' itemscope="itemscope" itemtype="' . esc_attr( critique_get_protocol( true ) ) . '//schema.org/SiteNavigationElement"'
					. '>',
				'</nav>'
			);
			?>
		</div>
	</div>
	<?php
}
