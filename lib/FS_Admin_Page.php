<style type="text/css">

	img.FS-Logo{ padding: 20px 20px; }
	#FS-Admin{
		background: #F1F1F1;
		margin: 0 30px 30px 15px;
		border: 1px solid #E3E3E3;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
		padding: 10px 15px 30px;
	}
	#FS-Admin h3{ 
		margin: 0;
		padding-bottom: 30px;
		clear: both;
	}
	#FS-Admin p label{
		width: 170px;
		padding: 3px 40px 3px 0;
		display: inline-block;
		text-align: right;
	}
	#FS-Admin p.sect{
		margin-top: 50px;
	}
	#FS-Admin p input{
		width: 150px;
		text-align: center;
	}
	#FS-Admin p.guid input{
		width: 320px;
	}
</style>

<a href="http://www.flightstats.com/" target="_blank" ><img class="FS-Logo" src="<?php echo WP_PLUGIN_URL; ?>/WP-Flightstats/logo.png" /></a>
<form id="FS-Admin" name="FSAdmin" method="post" action="">
	<input type="hidden" name="flightstats_account_updated" value="FS">
	<h3>FlightStats Account Settings</h3>
	
	<p><label for="FS_account">Account ID:</label><input id="FS_account" type="text" name="FS_account" value="<?php echo $this->fs_username; ?>" /></p>
	<p><label for="FS_username">Username:</label><input id="FS_username" type="text" name="FS_username" value="<?php echo $this->fs_account; ?>" /></p>
	<p><label for="FS_password">Password:</label><input id="FS_password" type="password" name="FS_password" value="<?php echo $this->fs_password; ?>" /></p>
	<p class="sect guid" ><label for="FS_GUID_airport">FlightStatusByAirport GUID:</label><input id="FS_GUID_airport" type="text" name="FS_account" value="<?php echo $this->fs_guid_airport; ?>" /></p>
	<p class="guid" ><label for="FS_GUID_route">FlightStatusByRoute GUID:</label><input id="FS_GUID_route" type="text" name="FS_username" value="<?php echo $this->fs_guid_route; ?>" /></p>
	<p class="guid" ><label for="FS_GUID_flight">FlightStatusByFlight GUID:</label><input id="FS_GUID_flight" type="text" name="FS_password" value="<?php echo $this->fs_guid_flight; ?>" /></p>
</from>

















