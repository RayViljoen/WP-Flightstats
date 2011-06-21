<?php



class WP_FlightStats{
	

	function __construct(  )
	{	
		// Check if options has been set or alternitively set on activation
		if( !get_option('FS_Options_Set') )
		{
			// Create FlightStats account "wp_option" placeholders to avoid checking existence later.
			add_option( 'FS_username', 'FlightStats Username / User ID' );
			add_option( 'FS_account', 'FlightStats Account ID' );
			add_option( 'FS_password', 'FlightStats Password' );
			add_option( 'FS_GUID_airport', 'FlightStatusByAirport GUID' );
			add_option( 'FS_GUID_route', 'FlightStatusByRoute GUID' );
			add_option( 'FS_GUID_flight', 'FlightStatusByFlight GUID' );
			
			// Set 'FS_Options_Set' to avoid overwriting options with placeholders
			// Alternitively used for clearing account settings and overwriting with placeholders
			add_option( 'FS_Options_Set', 'true' );
		}		
	}
	
	function fs_admin()
	{
	
		add_menu_page( "FlightStats", "FlightStats", "manage_options", "flightstats", array( $this, 'create_admin_page' ) );
	}
	    
    function create_admin_page()
    {
    	
    	if (!current_user_can('manage_options'))
    	{wp_die( __('You do not have sufficient permissions to access this page.') );}
	
		echo '<img style="padding: 20px 0" src="'.WP_PLUGIN_URL.'/wp-flightstats/logo.png" />';

    }
	
}