<?php 
	$settings = wptouch_get_settings();
	if ( wptouch_theme_supports_ipad() ) {
		if ( $settings->ipad_support === 'full' ) {  
			$ipad_support = '(<a href="pane-active-theme" class="wptouch-admin-switch" rel="ipad-settings">' . __( 'iPad theme ON', "wptouch-pro" ) . '<a/>)'; 
		} else { 
			$ipad_support = '(<a href="pane-active-theme" class="wptouch-admin-switch" rel="ipad-settings">' . __( 'iPad Theme OFF', "wptouch-pro" ) . '<a/>)';
		}
	}	
?>
<ul>
	<li><?php _e( "Active Theme", "wptouch-pro" ); ?>: <span><?php wptouch_bloginfo( 'active_theme_friendly_name' ); ?> <?php if ( wptouch_theme_supports_ipad() ) { echo $ipad_support; } ?></span></li>	
	
	<li>
			<?php _e( "Status", "wptouch-pro" ); ?>: <span class="green-text"><?php _e( 'LICENSED', 'wptouch-pro' ); ?></span> | <em><?php _e( "Thank you for supporting us!", "wptouch-pro" ); ?></em>


	</li>
</ul>