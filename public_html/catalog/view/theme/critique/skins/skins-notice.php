<?php
/**
 * The template to display Admin notices
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0.64
 */

$critique_skins_url  = get_admin_url( null, 'admin.php?page=trx_addons_theme_panel#trx_addons_theme_panel_section_skins' );
$critique_skins_args = get_query_var( 'critique_skins_notice_args' );
?>
<div class="critique_admin_notice critique_skins_notice notice notice-info is-dismissible" data-notice="skins">
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
		<?php esc_html_e( 'New skins available', 'critique' ); ?>
	</h3>
	<?php

	// Description
	$critique_total      = $critique_skins_args['update'];	// Store value to the separate variable to avoid warnings from ThemeCheck plugin!
	$critique_skins_msg  = $critique_total > 0
							// Translators: Add new skins number
							? '<strong>' . sprintf( _n( '%d new version', '%d new versions', $critique_total, 'critique' ), $critique_total ) . '</strong>'
							: '';
	$critique_total      = $critique_skins_args['free'];
	$critique_skins_msg .= $critique_total > 0
							? ( ! empty( $critique_skins_msg ) ? ' ' . esc_html__( 'and', 'critique' ) . ' ' : '' )
								// Translators: Add new skins number
								. '<strong>' . sprintf( _n( '%d free skin', '%d free skins', $critique_total, 'critique' ), $critique_total ) . '</strong>'
							: '';
	$critique_total      = $critique_skins_args['pay'];
	$critique_skins_msg .= $critique_skins_args['pay'] > 0
							? ( ! empty( $critique_skins_msg ) ? ' ' . esc_html__( 'and', 'critique' ) . ' ' : '' )
								// Translators: Add new skins number
								. '<strong>' . sprintf( _n( '%d paid skin', '%d paid skins', $critique_total, 'critique' ), $critique_total ) . '</strong>'
							: '';
	?>
	<div class="critique_notice_text">
		<p>
			<?php
			// Translators: Add new skins info
			echo wp_kses_data( sprintf( __( "We are pleased to announce that %s are available for your theme", 'critique' ), $critique_skins_msg ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="critique_notice_buttons">
		<?php
		// Link to the theme dashboard page
		?>
		<a href="<?php echo esc_url( $critique_skins_url ); ?>" class="button button-primary"><i class="dashicons dashicons-update"></i> 
			<?php
			// Translators: Add theme name
			esc_html_e( 'Go to Skins manager', 'critique' );
			?>
		</a>
	</div>
</div>
