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

        <p><label for="FS_account">Account ID:</label><input placeholder="Account ID" id="FS_account" type="text" name="FS_account" value="<?php echo $this->FS_account; ?>"></p>

        <p><label for="FS_username">Username:</label><input placeholder="Username / User ID" id="FS_username" type="text" name="FS_username" value="<?php echo $this->FS_username; ?>"></p>

        <p><label for="FS_password">Password:</label><input placeholder="Password" id="FS_password" type="password" name="FS_password" value="<?php echo $this->FS_password; ?>"></p>

		<p class="guid_descr">
			<span>The plugin will provide extended search options based on the GUIDs supplied.</span>
			<br />* Minimum 1 GUID is required for the plugin to function.
		</p>

        <p class="guid"><label for="FS_GUID_airport">FlightStatusByAirport GUID:</label><input placeholder="FlightStatusByAirport GUID" id="FS_GUID_airport" type="text" name="FS_GUID_airport" value="<?php echo $this->FS_GUID_airport; ?>"></p>

        <p class="guid"><label for="FS_GUID_route">FlightStatusByRoute GUID:</label><input placeholder="FlightStatusByRoute GUID" id="FS_GUID_route" type="text" name="FS_GUID_route" value="<?php echo $this->FS_GUID_route; ?>"></p>

        <p class="guid"><label for="FS_GUID_flight">FlightStatusByFlight GUID:</label><input placeholder="FlightStatusByFlight GUID" id="FS_GUID_flight" type="text" name="FS_GUID_flight" value="<?php echo $this->FS_GUID_flight; ?>"></p>
		
		
		<p style="padding:50px 0 0; font-size:25px; text-align:center; font-style:italic">
		-------------------------------------------------------------<br/>
		ADD A FEW OPTIONAL THEMES<br/>
		-------------------------------------------------------------</p>
    	
    	
    	
    	<p class="submit">
			<input type="submit" name="FS_Update" class="button-primary" value="Save Changes">
			<input type="submit" name="FS_Delete" class="delete-button" value="Delete Account Settings">
		</p>
		
    </form>
    <p id="catn_badge">Brought to you by the experts at <a href="http://catn.com">CatN.</a></p>