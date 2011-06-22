<?php

// Main Plugin Class

class WP_FlightStats{
	
	// Account Variables
	private
		$fs_username,		//Username
		$fs_account,		//Account ID
		$fs_password,		//Password
		$fs_guid_airport,	//By Airport RSS GUID
		$fs_guid_route,		//By Route RSS GUID
		$fs_guid_flight;	//By Flight RSS GUID
	

	public function __construct(  )
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
		
		// Set instance variables
		$this->fs_username = get_option('FS_username');	
		$this->fs_account = get_option('FS_account');	
		$this->fs_password = get_option('FS_password');	
		$this->fs_guid_airport = get_option('FS_GUID_airport');	
		$this->fs_guid_route = get_option('FS_GUID_route');	
		$this->fs_guid_flight = get_option('FS_GUID_flight');	
	}
	
	// CREATE ADMIN PAGE AND CALL "create_admin_page" METHOD TO CREATE PAGE
	public function fs_admin()
	{
		add_menu_page( "FlightStats", "FlightStats", "manage_options", "flightstats", array( $this, 'create_admin_page' ) );
	}
	    
    public function create_admin_page()
    {
    	
    	if (!current_user_can('manage_options'))
    	{wp_die( __('You do not have sufficient permissions to access this page.') );}
	
		echo '<img style="padding: 20px 10px" src="'.WP_PLUGIN_URL.'/WP-Flightstats/logo.png" />';
		

    }
	
}