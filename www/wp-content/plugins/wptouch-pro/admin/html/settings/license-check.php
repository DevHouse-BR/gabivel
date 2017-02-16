<?php
	global $wptouch_pro;
	$wptouch_pro->bnc_api->verify_site_license( 'wptouch-pro' );
	$settings = wptouch_get_settings();
?>

	
<?php if ( wptouch_has_proper_auth() && !$settings->admin_client_mode_hide_licenses ) { ?>
	<?php { ?>
	<p class="license-valid round-6"><span><?php _e( 'License accepted, thank you for supporting WPtouch Pro!', 'wptouch-pro' ); ?></span></p>	
	
	<?php } ?>
<?php } ?>