<?php 
	global $wptouch_pro; 
	$settings = wptouch_get_settings();
?>

<div class='wptouch-setting' id='touchboard'>
	<div class="box-holder round-3" id="right-now-box">

		<h3>
			<?php _e( "Right Now", "wptouch-pro" ); ?>
			<img src="<?php echo WPTOUCH_URL . '/admin/images/ajax-loader.gif'; ?>" alt="ajax image" class="ajax-loader" />
		</h3>

		<p class="sub"><?php _e( "At a Glance", "wptouch-pro" ); ?></p>

		<table class="fonty">
		<tbody>
			<tr>
				<td class="box-table-number"><a href="#" rel="themes" class="wptouch-admin-switch"><?php wptouch_bloginfo( 'theme_count' ); ?></a></td>
				<td class="box-table-text"><a href="#" rel="themes" class="wptouch-admin-switch"><?php _e( "Themes", "wptouch-pro" ); ?></a></td>
			</tr>
			<tr>
				<td class="box-table-number"><a href="#" rel="icons" class="wptouch-admin-switch"><?php wptouch_bloginfo( 'icon_count' ); ?></a></td>
				<td class="box-table-text"><a href="#" rel="icons" class="wptouch-admin-switch"><?php _e( "Icons", "wptouch-pro" ); ?></a></td>
			</tr>
			<tr>
				<td class="box-table-number"><a href="#" rel="icon-sets" class="wptouch-admin-switch"><?php wptouch_bloginfo( 'icon_set_count' ); ?></a></td>
				<td class="box-table-text"><a href="#" rel="icon-sets" class="wptouch-admin-switch"><?php _e( "Icon Sets", "wptouch-pro" ); ?></a></td>
			</tr>
			<?php if ( wptouch_get_bloginfo( 'warnings' ) ) { ?>
			<tr id="board-warnings">
				<td class="box-table-number"><a href="#" rel="plugin-conflicts" class="wptouch-admin-switch"><?php wptouch_bloginfo( 'warnings' ); ?></a></td>
				<td class="box-table-text"><a href="#" rel="plugin-conflicts" class="wptouch-admin-switch"><?php _e( "Warnings", "wptouch-pro" ); ?></a></td>
			</tr>
			<?php } ?>
			<?php if ( wptouch_has_license() && !$settings->admin_client_mode_hide_licenses	 ) { ?>
			<tr id="wptouch-licenses-remaining">
				<td class="box-table-number">&nbsp;</td>
				<td class="box-table-text">&nbsp;</td>
			</tr>
			<?php } ?>
		</tbody>
		</table>

		<div id="touchboard-ajax"></div>
		

	<?php if ( wptouch_has_proper_auth()  && !$settings->admin_client_mode_hide_licenses ) { ?>	
	<?php { ?>
			<br class="clearer" />
				
		<?php } ?>
	<?php } else if ( !$settings->admin_client_mode_hide_licenses && !wptouch_is_multisite_secondary() ) { ?>	
	<br class="clearer" />
	

	<?php } ?>

</div><!-- wptouch-setting -->