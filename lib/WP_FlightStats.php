<?php

// Main Plugin Class

class WP_FlightStats{

	// FLIGHTSTATS RSS QUERY URL
	const FS_RSS = 'http://www.flightstats.com/go/rss/flightStatusByRoute.do?';

/*
	// Account Variables
	private
	$fs_username,  //Username
	$fs_account,  //Account ID
	$fs_password,  //Password
	$fs_guid_airport, //By Airport RSS GUID
	$fs_guid_route,  //By Route RSS GUID
	$fs_guid_flight; //By Flight RSS GUID
*/
	
	// WP_OPTIONS
	private $account_options = array( 
		'FS_username',
		'FS_account',
		'FS_password',
		'FS_GUID_airport',
		'FS_GUID_route',
		'FS_GUID_flight'
	);

	// CONSTRUCTOR TO SET PLACEHOLDERS ON ACTIVATION OR SET ACCOUNT VARIABLES TO STORED OPTIONS
	public function __construct()
	{

		// Check if options has been set or alternitively set on activation
		if( !get_option('FS_Options_Set') )
		{	
			// Create FlightStats account "wp_option" placeholders to avoid checking existence later.
			foreach( $this->account_options as $fs_wp_option ){
				add_option( $fs_wp_option, '' );
			}

			// Set 'FS_Options_Set' to avoid overwriting options with placeholders
			// Alternitively used for clearing account settings and overwriting with placeholders
			add_option( 'FS_Options_Set', 'true' );
		}


		// LOOP OVER ACCOUNT OPTIONS ARRAY AND CREAT INSTANCE VARIABLES FOR EACH OPTION
		// ALSO SET EACH IVAR TO THE CORRESPONDING WP_OPTION		
		foreach( $this->account_options as $fs_account_ivar ){
			$this->{$fs_account_ivar} = get_option($fs_account_ivar);
			echo $this->{$fs_account_ivar}.'<br />';
		}
		

		// ADD ADMIN ACTION HOOK TO 'fs_admin'
		add_action('admin_menu', array( $this, 'fs_admin' ) );

		// ADD SHORTCODE AND HOOK TO 'fs_shortcode'
		add_shortcode( 'flightstats', array( $this, 'fs_shortcode' ) );
		
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
		
		if ( isset($_POST['flightstats_account_updated']) )
			{ $this->fs_update_account_settings(); }
		
		// INCLUDE ADMIN PAGE CONTENT
		require 'FS_Admin_Page.php';
	}
	
	// CALLED WHEN ACCOUNT SETTINGS ARE UPDATED IN THE FS ADMIN MENU
	private function fs_update_account_settings()
	{
		echo '<pre>';
		var_dump($_POST);
		echo '</pre>';
	}

	// CALLED WHEN SHORTCODE IS USED - RESPONSIBLE FOR SHORTCODE OUTPUT
	public function fs_shortcode()
	{

		

	}
	
	





}
