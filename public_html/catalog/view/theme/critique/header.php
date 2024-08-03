<?php
/**
 * The Header: Logo and main menu
 *
 * @package CRITIQUE
 * @since CRITIQUE 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js<?php
	// Class scheme_xxx need in the <html> as context for the <body>!
	echo ' scheme_' . esc_attr( critique_get_theme_option( 'color_scheme' ) );
?>">

<head>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
	do_action( 'critique_action_before_body' );
	?>

	<div class="<?php echo esc_attr( apply_filters( 'critique_filter_body_wrap_class', 'body_wrap' ) ); ?>" <?php do_action('critique_action_body_wrap_attributes'); ?>>

		<?php do_action( 'critique_action_before_page_wrap' ); ?>

		<div class="<?php echo esc_attr( apply_filters( 'critique_filter_page_wrap_class', 'page_wrap' ) ); ?>" <?php do_action('critique_action_page_wrap_attributes'); ?>>

			<?php do_action( 'critique_action_page_wrap_start' ); ?>

			<?php
			$critique_full_post_loading = ( is_singular( 'post' ) || is_singular( 'attachment' ) ) && critique_get_value_gp( 'action' ) == 'full_post_loading';
			$critique_prev_post_loading = ( is_singular( 'post' ) || is_singular( 'attachment' ) ) && critique_get_value_gp( 'action' ) == 'prev_post_loading';

			// Don't display the header elements while actions 'full_post_loading' and 'prev_post_loading'
			if ( ! $critique_full_post_loading && ! $critique_prev_post_loading ) {

				// Short links to fast access to the content, sidebar and footer from the keyboard
				?>
				<a class="critique_skip_link skip_to_content_link" href="#content_skip_link_anchor" tabindex="1"><?php esc_html_e( "Skip to content", 'critique' ); ?></a>
				<?php if ( critique_sidebar_present() ) { ?>
				<a class="critique_skip_link skip_to_sidebar_link" href="#sidebar_skip_link_anchor" tabindex="1"><?php esc_html_e( "Skip to sidebar", 'critique' ); ?></a>
				<?php } ?>
				<a class="critique_skip_link skip_to_footer_link" href="#footer_skip_link_anchor" tabindex="1"><?php esc_html_e( "Skip to footer", 'critique' ); ?></a>

				<?php
				do_action( 'critique_action_before_header' );

				// Header
				$critique_header_type = critique_get_theme_option( 'header_type' );
				if ( 'custom' == $critique_header_type && ! critique_is_layouts_available() ) {
					$critique_header_type = 'default';
				}
				get_template_part( apply_filters( 'critique_filter_get_template_part', "templates/header-" . sanitize_file_name( $critique_header_type ) ) );

				// Side menu
				if ( in_array( critique_get_theme_option( 'menu_side' ), array( 'left', 'right' ) ) ) {
					get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/header-navi-side' ) );
				}

				// Mobile menu
				get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/header-navi-mobile' ) );

				do_action( 'critique_action_after_header' );

			}
			?>

			<?php do_action( 'critique_action_before_page_content_wrap' ); ?>

			<div class="page_content_wrap<?php
				if ( critique_is_off( critique_get_theme_option( 'remove_margins' ) ) ) {
					if ( empty( $critique_header_type ) ) {
						$critique_header_type = critique_get_theme_option( 'header_type' );
					}
					if ( 'custom' == $critique_header_type && critique_is_layouts_available() ) {
						$critique_header_id = critique_get_custom_header_id();
						if ( $critique_header_id > 0 ) {
							$critique_header_meta = critique_get_custom_layout_meta( $critique_header_id );
							if ( ! empty( $critique_header_meta['margin'] ) ) {
								?> page_content_wrap_custom_header_margin<?php
							}
						}
					}
					$critique_footer_type = critique_get_theme_option( 'footer_type' );
					if ( 'custom' == $critique_footer_type && critique_is_layouts_available() ) {
						$critique_footer_id = critique_get_custom_footer_id();
						if ( $critique_footer_id ) {
							$critique_footer_meta = critique_get_custom_layout_meta( $critique_footer_id );
							if ( ! empty( $critique_footer_meta['margin'] ) ) {
								?> page_content_wrap_custom_footer_margin<?php
							}
						}
					}
				}
				do_action( 'critique_action_page_content_wrap_class', $critique_prev_post_loading );
				?>"<?php
				if ( apply_filters( 'critique_filter_is_prev_post_loading', $critique_prev_post_loading ) ) {
					?> data-single-style="<?php echo esc_attr( critique_get_theme_option( 'single_style' ) ); ?>"<?php
				}
				do_action( 'critique_action_page_content_wrap_data', $critique_prev_post_loading );
			?>>
				<?php
				do_action( 'critique_action_page_content_wrap', $critique_full_post_loading || $critique_prev_post_loading );

				// Single posts banner
				if ( apply_filters( 'critique_filter_single_post_header', is_singular( 'post' ) || is_singular( 'attachment' ) ) ) {
					if ( $critique_prev_post_loading ) {
						if ( critique_get_theme_option( 'posts_navigation_scroll_which_block' ) != 'article' ) {
							do_action( 'critique_action_between_posts' );
						}
					}
					// Single post thumbnail and title
					$critique_path = apply_filters( 'critique_filter_get_template_part', 'templates/single-styles/' . critique_get_theme_option( 'single_style' ) );
					if ( critique_get_file_dir( $critique_path . '.php' ) != '' ) {
						get_template_part( $critique_path );
					}
				}

				// Widgets area above page
				$critique_body_style   = critique_get_theme_option( 'body_style' );
				$critique_widgets_name = critique_get_theme_option( 'widgets_above_page' );
				$critique_show_widgets = ! critique_is_off( $critique_widgets_name ) && is_active_sidebar( $critique_widgets_name );
				if ( $critique_show_widgets ) {
					if ( 'fullscreen' != $critique_body_style ) {
						?>
						<div class="content_wrap">
							<?php
					}
					critique_create_widgets_area( 'widgets_above_page' );
					if ( 'fullscreen' != $critique_body_style ) {
						?>
						</div>
						<?php
					}
				}

				// Content area
				do_action( 'critique_action_before_content_wrap' );
				?>
				<div class="content_wrap<?php echo 'fullscreen' == $critique_body_style ? '_fullscreen' : ''; ?>">

					<div class="content">
						<?php
						do_action( 'critique_action_page_content_start' );

						// Skip link anchor to fast access to the content from keyboard
						?>
						<a id="content_skip_link_anchor" class="critique_skip_link_anchor" href="#"></a>
						<?php
						// Single posts banner between prev/next posts
						if ( ( is_singular( 'post' ) || is_singular( 'attachment' ) )
							&& $critique_prev_post_loading 
							&& critique_get_theme_option( 'posts_navigation_scroll_which_block' ) == 'article'
						) {
							do_action( 'critique_action_between_posts' );
						}

						// Widgets area above content
						critique_create_widgets_area( 'widgets_above_content' );

						do_action( 'critique_action_page_content_start_text' );
