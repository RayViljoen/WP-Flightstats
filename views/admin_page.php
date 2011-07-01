	<!-- ADMIN PAGE STYLES -->
    <style type="text/css">
	
	/* INCLUDE ADMIN STYLES */
	
	#FS-Admin p.guid{ background: url( <?php echo $this->FS_plugin_path ?>/images/fs_validate.png ) no-repeat ; }
	#FS-Admin p.fs_thinking a{ background: url( <?php echo $this->FS_plugin_path ?>/images/fs_thinking.gif ) no-repeat center center ; }
	<?php require 'css/admin_styles.css'; ?>
    </style>

    <a class="FS-Logo" href="http://www.flightstats.com/" target="_blank"><img src="<?php echo $this->FS_plugin_path; ?>/images/fs_logo.png"></a>
	
	<!-- SHOW SETTINGS SAVE MESSAGE ON SUBMIT -->
    <?php if ( isset($_POST['flightstats_account_updated']) ): ?>
    	<div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
    <?php endif; ?>

    <form id="FS-Admin" method="post" action="">
        <input type="hidden" name="flightstats_admin_submitted">

        <h3>
        	FlightStats GUIDs<span class="opt"> * at least one GUID is required.</span>
        	<a class="fs_dev_link" target="_blank" href="https://www.flightstats.com/developers/">Flightstats Developer Center</a>
		</h3>
		
        <p class="guid" ><label for="FS_GUID_route">FlightStatusByRoute GUID:</label>
        <a class="vaidate">check</a>
        <input placeholder="FlightStatusByRoute GUID" id="FS_GUID_route" query="Route" type="text" name="FS_GUID_route" value="<?php echo $this->FS_GUID_route; ?>"></p>
        
        <p class="guid" ><label for="FS_GUID_flight">FlightStatusByFlight GUID:</label>
        <a class="vaidate">check</a>
        <input placeholder="FlightStatusByFlight GUID" id="FS_GUID_flight" query="Flight" type="text" name="FS_GUID_flight" value="<?php echo $this->FS_GUID_flight; ?>"></p>
		
		 <!-- REMOVE WHEN ADDING THEMES -->
		<p style="padding:50px 0 0; font-size:25px; text-align:center; font-style:italic">
		--------------------------------------<br/>
		ADD A FEW OPTIONAL THEMES<br/>
		--------------------------------------</p>
    	
    	
    	
    	<p class="submit">
			<input type="submit" name="FS_Update" class="button-primary" value="Save Changes">
			<input type="submit" name="FS_Delete" class="delete-button" value="Delete Guids">
		</p>
		
    </form>
    <p id="author_mention">Brought to you by the experts at <a href="http://catn.com">CatN.</a></p>
    
    <script type="text/javascript" src="<?php echo $this->FS_plugin_path; ?>/javascript/admin_guid_auth.js"></script>