<?php
/**
 * The template to display login popup
 *
 * @package ThemeREX Addons
 * @since v1.6
 */

// Prepare popup
$trx_addons_login_via_socials = do_shortcode(apply_filters('trx_addons_filter_login_via_socials', trx_addons_get_option('login_via_socials')));
$trx_addons_form_style = 'default';	
?>
<div id="trx_addons_login_popup" class="trx_addons_popup mfp-hide">
	<div class="mfp-close trx_addons_popup_mask"></div>
	<div class="trx_addons_tabs"><?php		
		// Login form
		?>
		<div id="trx_addons_login_content" class="trx_addons_tabs_content trx_addons_login_content">
			<div class="trx_addons_tabs_content_wrap">
				<div class="logo">
					<?php
					// Logo		
					get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/header-logo' ) );
					?>
					<div><?php echo esc_html__('Log in to your account', 'critique'); ?></div>
				</div>
				<div class="trx_addons_popup_form_wrap trx_addons_popup_form_wrap_login">
					<form class="trx_addons_popup_form trx_addons_popup_form_login <?php if ($trx_addons_form_style != 'default') echo 'sc_input_hover_'.esc_attr($trx_addons_form_style); ?>" action="<?php echo wp_login_url(); ?>" method="post" name="trx_addons_login_form">
						<input type="hidden" id="login_redirect_to" name="redirect_to" value="<?php echo esc_url( trx_addons_get_current_url() ); ?>">
						<div class="trx_addons_popup_form_field trx_addons_popup_form_field_login">
							<label><?php echo esc_html__('Email Address or Login', 'critique'); ?></label>
							<?php
							trx_addons_get_template_part(TRX_ADDONS_PLUGIN_SHORTCODES . 'form/tpl.form-field.php',
															'trx_addons_args_sc_form_field',
															array(
																'style'       => $trx_addons_form_style,
																'field_name'  => 'log',
																'field_type'  => 'text',
																'field_req'   => true,
																'field_icon'  => 'trx_addons_icon-user-alt',
																'field_title' => esc_html__('Email or Login', 'critique'),
																'field_placeholder' => esc_html__('Email or Login', 'critique')
																)
														);
							?>
						</div>
						<div class="trx_addons_popup_form_field trx_addons_popup_form_field_password">
							<label><?php echo esc_html__('Password', 'critique'); ?></label>
							<?php
							trx_addons_get_template_part(TRX_ADDONS_PLUGIN_SHORTCODES . 'form/tpl.form-field.php',
															'trx_addons_args_sc_form_field',
															array(
																'style'       => $trx_addons_form_style,
																'field_name'  => 'pwd',
																'field_type'  => 'password',
																'field_req'   => true,
																'field_icon'  => 'trx_addons_icon-lock',
																'field_title' => esc_html__('Password', 'critique'),
																'field_placeholder' => esc_html__('Password', 'critique')
																)
														);
							?>
						</div>
						<div class="trx_addons_popup_form_field remember_and_forgot">
							<div class="trx_addons_popup_form_field_remember">
								<input type="checkbox" value="forever" id="rememberme" name="rememberme">
								<label for="rememberme"> <?php esc_html_e('Remember me', 'critique'); ?></label>
							</div>
							<a href="<?php echo esc_url(wp_lostpassword_url(get_permalink())); ?>" class="trx_addons_popup_form_field_forgot_password"><?php esc_html_e('Forgot password?', 'critique'); ?></a>
						</div>
						<div class="trx_addons_popup_form_field trx_addons_popup_form_field_submit">
							<button class="submit_button sc_button sc_button_default sc_button_size_normal sc_button_with_icon sc_button_icon_right hover_style_icon_1 color_style_1">
								<span class="sc_button_icon">
									<span class="icon-login-1"></span>
								</span>
								<span class="sc_button_text">
									<span class="sc_button_title"><?php esc_html_e('Login', 'critique'); ?></span>
								</span><!-- /.sc_button_text -->
							</button>
						</div>
						<div class="trx_addons_message_box sc_form_result"></div>
					</form>
				</div>
				<?php if ( empty($trx_addons_login_via_socials) && (int) get_option('users_can_register') != 0 ) { ?>
					<div class="trx_addons_tabs_title_register"><?php
						esc_html_e("Don't have an account yet?", 'critique'); ?> 
						<a href="<?php echo esc_url(trx_addons_get_hash_link('#trx_addons_register_content')); ?>">	
							<?php esc_html_e('Create one', 'critique'); ?>
						</a>
					</div>
				<?php } ?>
			</div>
			<?php if (!empty($trx_addons_login_via_socials)) { ?>
				<div class="trx_addons_tabs_content_wrap login_socials">
					<div class="trx_addons_login_socials_title"><?php esc_html_e('Or', 'critique'); ?></div>
					<div class="trx_addons_login_socials_list">
						<?php trx_addons_show_layout($trx_addons_login_via_socials); ?>
					</div><?php
					if ( (int) get_option('users_can_register') != 0 ) { ?>
						<div class="trx_addons_tabs_title_register"><?php
							esc_html_e("Don't have a Times account?", 'critique'); ?> 
							<a href="<?php echo esc_url(trx_addons_get_hash_link('#trx_addons_register_content')); ?>">	
								<?php esc_html_e('Create one', 'critique'); ?>
							</a>
						</div>
						<?php
					} ?>
				</div>
			<?php } ?>
		</div><?php
		
		// Registration form
		if ( (int) get_option('users_can_register') > 0 ) {
			?>
			<div id="trx_addons_register_content" class="trx_addons_tabs_content">
				<div class="trx_addons_tabs_content_wrap">
					<div class="logo">
						<?php
						// Logo		
						get_template_part( apply_filters( 'critique_filter_get_template_part', 'templates/header-logo' ) );
						?>
						<div><?php echo esc_html__('Register account', 'critique'); ?></div>
					</div>
					<div class="trx_addons_popup_form_wrap trx_addons_popup_form_wrap_register">
						<form class="trx_addons_popup_form trx_addons_popup_form_register <?php if ($trx_addons_form_style != 'default') echo 'sc_input_hover_'.esc_attr($trx_addons_form_style); ?>" action="<?php echo wp_login_url(); ?>" method="post" name="trx_addons_login_form">
							<input type="hidden" id="register_redirect_to" name="redirect_to" value="<?php echo esc_url( trx_addons_get_current_url() ); ?>">
							<div class="trx_addons_popup_form_field trx_addons_popup_form_field_login">
								<label><?php echo esc_html__('Login', 'critique'); ?></label>
								<?php
								trx_addons_get_template_part(TRX_ADDONS_PLUGIN_SHORTCODES . 'form/tpl.form-field.php',
																'trx_addons_args_sc_form_field',
																array(
																	'style'       => $trx_addons_form_style,
																	'field_name'  => 'log',
																	'field_type'  => 'text',
																	'field_req'   => true,
																	'field_icon'  => 'trx_addons_icon-user-alt',
																	'field_title' => esc_html__('Login', 'critique'),
																	'field_placeholder' => esc_html__('Login', 'critique')
																	)
															);
								?>
							</div>
							<div class="trx_addons_popup_form_field trx_addons_popup_form_field_email">
								<label><?php echo esc_html__('Email Address', 'critique'); ?></label>
								<?php
								trx_addons_get_template_part(TRX_ADDONS_PLUGIN_SHORTCODES . 'form/tpl.form-field.php',
																'trx_addons_args_sc_form_field',
																array(
																	'style'       => $trx_addons_form_style,
																	'field_name'  => 'email',
																	'field_type'  => 'text',
																	'field_req'   => true,
																	'field_icon'  => 'trx_addons_icon-mail',
																	'field_title' => esc_html__('E-mail', 'critique'),
																	'field_placeholder' => esc_html__('E-mail', 'critique')
																	)
															);
								?>
							</div>
							<div class="trx_addons_popup_form_field trx_addons_popup_form_field_password">
								<label><?php echo esc_html__('Password', 'critique'); ?></label>
								<?php
								trx_addons_get_template_part(TRX_ADDONS_PLUGIN_SHORTCODES . 'form/tpl.form-field.php',
																'trx_addons_args_sc_form_field',
																array(
																	'style'       => $trx_addons_form_style,
																	'field_name'  => 'pwd',
																	'field_type'  => 'password',
																	'field_req'   => true,
																	'field_icon'  => 'trx_addons_icon-lock',
																	'field_title' => esc_html__('Password', 'critique'),
																	'field_placeholder' => esc_html__('Password', 'critique')
																	)
															);
								?>
							</div>
							<div class="trx_addons_popup_form_field trx_addons_popup_form_field_password">
								<label><?php echo esc_html__('Confirm Password', 'critique'); ?></label>
								<?php
								trx_addons_get_template_part(TRX_ADDONS_PLUGIN_SHORTCODES . 'form/tpl.form-field.php',
																'trx_addons_args_sc_form_field',
																array(
																	'style'       => $trx_addons_form_style,
																	'field_name'  => 'pwd2',
																	'field_type'  => 'password',
																	'field_req'   => true,
																	'field_icon'  => 'trx_addons_icon-lock',
																	'field_title' => esc_html__('Confirm Password', 'critique'),
																	'field_placeholder' => esc_html__('Confirm Password', 'critique')
																	)
															);
								?>
							</div>
							<?php
							$trx_addons_privacy = trx_addons_get_privacy_text();
							if (!empty($trx_addons_privacy)) {
								?><div class="trx_addons_popup_form_field trx_addons_popup_form_field_agree">
									<input type="checkbox" value="1" id="i_agree_privacy_policy_registration" name="i_agree_privacy_policy"><label for="i_agree_privacy_policy_registration"> <?php echo wp_kses($trx_addons_privacy, 'trx_addons_kses_content'); ?></label>
								</div><?php
							}
							?>
							<div class="trx_addons_popup_form_field trx_addons_popup_form_field_submit">
								<button class="submit_button sc_button sc_button_default sc_button_size_normal hover_style_icon_1 color_style_1<?php
									if ( !empty($trx_addons_privacy) ) {
										?> disabled='disabled'<?php
									}
								?>">
									<span class="sc_button_text">
										<span class="sc_button_title"><?php echo esc_html('Sign Up', 'critique'); ?></span>
									</span><!-- /.sc_button_text -->
								</button>
							</div>
							<div class="trx_addons_message_box sc_form_result"></div>
						</form>
					</div>
					<div class="trx_addons_tabs_title_login"><?php
						esc_html_e("Already have an account?", 'critique'); ?> 
						<a href="<?php echo esc_url(trx_addons_get_hash_link('#trx_addons_login_content')); ?>">
							<?php esc_html_e('Log in', 'critique'); ?>
						</a>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>