<?php
/**
 * The template to display Admin notices
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0.1
 */

$critique_theme_slug = get_option( 'template' );
$critique_theme_obj  = wp_get_theme( $critique_theme_slug );
?>
<div class="critique_admin_notice critique_welcome_notice notice notice-info is-dismissible" data-notice="admin">
	<?php
	// Theme image
	$critique_theme_img = critique_get_file_url( 'screenshot.jpg' );
	if ( '' != $critique_theme_img ) {
		?>
		<div class="critique_notice_image"><img src="<?php echo esc_url( $critique_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'critique' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="critique_notice_title">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Welcome to %1$s v.%2$s', 'critique' ),
				$critique_theme_obj->get( 'Name' ) . ( CRITIQUE_THEME_FREE ? ' ' . __( 'Free', 'critique' ) : '' ),
				$critique_theme_obj->get( 'Version' )
			)
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="critique_notice_text">
		<p class="critique_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $critique_theme_obj->description ) );
			?>
		</p>
		<p class="critique_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Attention! Plugin "ThemeREX Addons" is required! Please, install and activate it!', 'critique' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="critique_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=critique_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Install plugin "ThemeREX Addons"', 'critique' );
			?>
		</a>
	</div>
</div>
