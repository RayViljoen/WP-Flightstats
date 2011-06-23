<?php

// Main Plugin Class

class WP_FlightStats{
	
	// FLIGHTSTATS RSS QUERY URL
	define( FS_RSS, 'http://www.flightstats.com/go/rss/flightStatusByRoute.do?' );

	// Account Variables
	private
	$fs_username,  //Username
	$fs_account,  //Account ID
	$fs_password,  //Password
	$fs_guid_airport, //By Airport RSS GUID
	$fs_guid_route,  //By Route RSS GUID
	$fs_guid_flight; //By Flight RSS GUID

	// CONSTRUCTOR TO SET PLACEHOLDERS ON ACTIVATION OR SET ACCOUNT VARIABLES TO STORED OPTIONS
	public function __construct()
	{
		// Check if options has been set or alternitively set on activation
		if( !get_option('FS_Options_Set') )
		{
			// Create FlightStats account "wp_option" placeholders to avoid checking existence later.
			add_option( 'FS_username', '' );
			add_option( 'FS_account', '' );
			add_option( 'FS_password', '' );
			add_option( 'FS_GUID_airport', '' );
			add_option( 'FS_GUID_route', '' );
			add_option( 'FS_GUID_flight', '' );

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
	
	// OUTPUT ADMIN PAGE FROM 'FS_Admin_Page.php'
	public function create_admin_page()
	{
		if (!current_user_can('manage_options'))
			{wp_die( __('You do not have sufficient permissions to access this page.') );}
		
		// INCLUDE ADMIN PAGE CONTENT
		require 'FS_Admin_Page.php';
	}


}
