<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>

    <style type="text/css">
	
    .FS-Logo img{
    	padding: 20px 20px;
    }
    #FS-Admin{
        background: #F1F1F1;
        margin: 0 30px 10px 15px;
        border: 1px solid #E3E3E3;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px;
        padding: 10px 15px 15px;
        overflow: auto;
    }
    #FS-Admin h3{ 
        margin: 0;
        padding-bottom: 30px;
        clear: both;
    }
    #FS-Admin p label{
        width: 170px;
        padding: 3px 40px 3px 30px;
        display: inline-block;
    }
    #FS-Admin p input{
        width: 150px;
        padding: 5px;
    }
    #FS-Admin p.guid input{
        width: 320px;
    }
    #FS-Admin .fs_dev_link{
    	float: right;
    	font-size: 12px;
    }
    #FS-Admin .guid_descr{
        padding: 50px 0 10px 20px;
        margin: 0;
        font-style: italic;
        color: #999;
        line-height: 20px;
    }
    #FS-Admin .guid_descr span{
    	font-size: 1.2em;
    }
    #catn_badge{
    	color: #777;
    	text-align: right;
    	font-size: 10px;
    	padding-left: 30px;
    	margin: 5px 35px 0;
    }
    #catn_badge a{
    	text-decoration: none;
	}
    </style>

    <title></title>
</head>

<body>
    <a class="FS-Logo" href="http://www.flightstats.com/" target="_blank"><img src="<?php echo WP_PLUGIN_URL; ?>/WP-Flightstats/resources/logo.png"></a>
    <form id="FS-Admin" method="post" action="">
        <input type="hidden" name="flightstats_account_updated" value="FS">

        <h3>FlightStats Account Settings
        <a class="fs_dev_link" target="_blank" href="https://www.flightstats.com/developers/">Flightstats Developer Center</a>
		</h3>

        <p><label for="FS_account">Account ID:</label><input placeholder="Username / User ID" id="FS_account" type="text" name="FS_account" value="<?php echo $this->fs_username; ?>"></p>

        <p><label for="FS_username">Username:</label><input placeholder="Account ID" id="FS_username" type="text" name="FS_username" value="<?php echo $this->fs_account; ?>"></p>

        <p><label for="FS_password">Password:</label><input placeholder="Password" id="FS_password" type="password" name="FS_password" value="<?php echo $this->fs_password; ?>"></p>
		
		<p class="guid_descr">
			<span>The plugin will provide extended search options based on the GUIDs supplied.</span>
			<br />* Minimum 1 GUID is required for the plugin to function.
		</p>
		
        <p class="guid"><label for="FS_GUID_airport">FlightStatusByAirport GUID:</label><input placeholder="FlightStatusByAirport GUID" id="FS_GUID_airport" type="text" name="FS_account" value="<?php echo $this->fs_guid_airport; ?>"></p>

        <p class="guid"><label for="FS_GUID_route">FlightStatusByRoute GUID:</label><input placeholder="FlightStatusByRoute GUID" id="FS_GUID_route" type="text" name="FS_username" value="<?php echo $this->fs_guid_route; ?>"></p>

        <p class="guid"><label for="FS_GUID_flight">FlightStatusByFlight GUID:</label><input placeholder="FlightStatusByFlight GUID" id="FS_GUID_flight" type="text" name="FS_password" value="<?php echo $this->fs_guid_flight; ?>"></p>
    </form>
    <p id="catn_badge">Brought to you by the experts at <a href="http://catn.com">CatN.</a></p>

</body>
</html>
