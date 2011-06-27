	<!-- ADMIN PAGE STYLES -->
    <style type="text/css">
	
	/* INCLUDE ADMIN STYLES */
	<?php require 'css/admin_styles.css'; ?>

    </style>

    <a class="FS-Logo" href="http://www.flightstats.com/" target="_blank"><img src="<?php echo WP_PLUGIN_URL; ?>/WP-Flightstats/resources/logo.png"></a>
	
	<!-- SHOW SETTINGS SAVE MESSAGE ON SUBMIT -->
    <?php if ( isset($_POST['flightstats_account_updated']) ): ?>
    	<div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
    <?php endif; ?>

    <form id="FS-Admin" method="post" action="">
        <input type="hidden" name="flightstats_admin_submitted">

        <h3>
        	FlightStats Account Settings
        	<a class="fs_dev_link" target="_blank" href="https://www.flightstats.com/developers/">Flightstats Developer Center</a>
		</h3>

        <p><label for="FS_GUID_route">FlightStatusByRoute GUID:</label><input placeholder="FlightStatusByRoute GUID" id="FS_GUID_route" type="text" name="FS_GUID_route" value="<?php echo $this->FS_GUID_route; ?>"></p>
        <p><label for="FS_GUID_flight">FlightStatusByFlight GUID:</label><input placeholder="FlightStatusByFlight GUID" id="FS_GUID_flight" type="text" name="FS_GUID_flight" value="<?php echo $this->FS_GUID_flight; ?>"><span class="opt"> * optional</span></p>
		
		 <!-- REMOVE WHEN ADDING THEMES -->
		<p style="padding:50px 0 0; font-size:25px; text-align:center; font-style:italic">
		-------------------------------------------------------------<br/>
		ADD A FEW OPTIONAL THEMES<br/>
		-------------------------------------------------------------</p>
    	
    	
    	
    	<p class="submit">
			<input type="submit" name="FS_Update" class="button-primary" value="Save Changes">
			<input type="submit" name="FS_Delete" class="delete-button" value="Delete Guids">
		</p>
		
    </form>
    <p id="author_mention">Brought to you by the experts at <a href="http://catn.com">CatN.</a></p>