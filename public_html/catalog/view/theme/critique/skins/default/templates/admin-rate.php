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
<div class="critique_admin_notice critique_rate_notice notice notice-info is-dismissible" data-notice="rate">
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
	<h3 class="critique_notice_title"><a href="<?php echo esc_url( critique_storage_get( 'theme_rate_url' ) ); ?>" target="_blank">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Rate our theme "%s", please', 'critique' ),
				$critique_theme_obj->get( 'Name' ) . ( CRITIQUE_THEME_FREE ? ' ' . __( 'Free', 'critique' ) : '' )
			)
		);
		?>
	</a></h3>
	<?php

	// Description
	?>
	<div class="critique_notice_text">
		<p><?php echo wp_kses_data( __( "We are glad you chose our WP theme for your website. You've done well customizing your website and we hope that you've enjoyed working with our theme.", 'critique' ) ); ?></p>
		<p><?php echo wp_kses_data( __( "It would be just awesome if you spend just a minute of your time to rate our theme or the customer service you've received from us.", 'critique' ) ); ?></p>
		<p class="critique_notice_text_info"><?php echo wp_kses_data( __( '* We love receiving your reviews! Every time you leave a review, our CEO Henry Rise gives $5 to homeless dog shelter! Save the planet with us!', 'critique' ) ); ?></p>
	</div>
	<?php

	// Buttons
	?>
	<div class="critique_notice_buttons">
		<?php
		// Link to the theme download page
		?>
		<a href="<?php echo esc_url( critique_storage_get( 'theme_rate_url' ) ); ?>" class="button button-primary" target="_blank"><i class="dashicons dashicons-star-filled"></i> 
			<?php
			// Translators: Add theme name
			echo esc_html( sprintf( __( 'Rate theme %s', 'critique' ), $critique_theme_obj->name ) );
			?>
		</a>
		<?php
		// Link to the theme support
		?>
		<a href="<?php echo esc_url( critique_storage_get( 'theme_support_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-sos"></i> 
			<?php
			esc_html_e( 'Support', 'critique' );
			?>
		</a>
		<?php
		// Link to the theme documentation
		?>
		<a href="<?php echo esc_url( critique_storage_get( 'theme_doc_url' ) ); ?>" class="button" target="_blank"><i class="dashicons dashicons-book"></i> 
			<?php
			esc_html_e( 'Documentation', 'critique' );
			?>
		</a>
	</div>
</div>
