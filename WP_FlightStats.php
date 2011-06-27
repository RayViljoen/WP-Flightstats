<?php

// Main Plugin Class

class WP_FlightStats{

	// FLIGHTSTATS RSS QUERY URL
	const FS_RSS = 'http://www.flightstats.com/go/rss/flightStatusByRoute.do?';

	/*************************************************************
	 * FLIGHTSTATS ACCOUNT OPTIONS:
	 * EACH OPTION WILL CREATE AN INSTANCE VARIABLE ACCESSIBLE WITH THE SAME NAME AS THE ARRAY OPTION
	 * E.G. $this->FS_username
	 *************************************************************/
	private $account_options = array(
		
		'FS_username',
		'FS_account',
		'FS_password',
		'FS_GUID_airport',
		'FS_GUID_route',
		'FS_GUID_flight'
		
	);


	
	// USED TO CREATE & UPDATE DYNAMICALLY CREATED ACCOUNT VARIABLES.
	private function update_fs_ivars()
	{
		// LOOP OVER ACCOUNT OPTIONS ARRAY AND CREAT INSTANCE VARIABLES FOR EACH OPTION
		// ALSO SET EACH TO THE CORRESPONDING WP_OPTION
		foreach( $this->account_options as $fs_account_ivar ){
		
			// create ivar    			// set ivar to option with same name
			$this->{$fs_account_ivar} = get_option($fs_account_ivar);
		}
	}



	// CONSTRUCTOR TO SET PLACEHOLDERS ON ACTIVATION AND CREATE AN INSTANCE VARIABLE FOR EACH ACCOUNT OPTION
	public function __construct()
	{	
		// Check if options has been set or alternitively set on activation
		if( !get_option('FS_Options_Set') )
		{
			// Create FlightStats account "wp_option" placeholders to avoid checking existence later.
			foreach( $this->account_options as $fs_wp_option ){
				add_option( $fs_wp_option, '' );
			}
			// Set 'FS_Options_Set' so options are only created on activation.
			add_option( 'FS_Options_Set', 'true' );
		}
		
		// CREATE INSTANCE VARIABLES FOR ACCOUNT SETTINGS
		$this->update_fs_ivars();
		
		// REGISTER WORDPRESS HOOKS

		// ADMIN ACTION HOOK TO 'fs_admin()'
		add_action('admin_menu', array( &$this, 'fs_admin_auth' ) );

		// SHORTCODE HOOK TO 'fs_shortcode()'
		add_shortcode( 'flightstats', array( &$this, 'fs_shortcode' ) );
		

	} // ***  __construct END ***
	


	// REGISTER ADMIN PAGE AND CALL "create_admin_page()" TO CREATE PAGE
	public function fs_admin_auth()
	{
		add_menu_page( "FlightStats", "FlightStats", "manage_options", "flightstats", array( &$this, 'create_fs_admin' ) );
	}



	// OUTPUT ADMIN PAGE HTML FROM 'FS_Admin_Page.php'
	public function create_fs_admin()
	{
		// CHECK USER CAN MANAGE OPTIONS
		if (!current_user_can('manage_options'))
			{wp_die( __('You do not have sufficient permissions to access this page.') );}
		
		// CHECK IF SETTING ADMIN FORM HAS BEEN SUBMITTED
		if ( isset($_POST['flightstats_admin_submitted']) )
		{			
			// CHECK IF USER WANTS TO DELETE ACCOUNT SETTINGS
			if ( isset($_POST['FS_Delete']) )
			{
				foreach( $this->account_options as $fs_wp_option ){
					update_option( $fs_wp_option, '' );
				}
			}
			// ELSE UPDATE SETTING WITH
			else
			{
				foreach( $this->account_options as $fs_wp_option ){
					update_option( $fs_wp_option, $_POST[$fs_wp_option] );
				}
			}
		}
			
		// UPDATE ACCOUNT SETTINGS VARIABLES
		$this->update_fs_ivars();
		
		// INCLUDE ADMIN PAGE HTML CONTENT
		require 'views/admin_page.php';
	}
	
	
	
	// INITILISE INSTANCE OF 'fs_shortcode'. - CALLED FROM SHORTCODE HOOK IN __constructor
	public function fs_shortcode()
	{	
		/* ----------------------------------
		 *
		 *	INCLUDE ONE OF THE THEMES SELECTED FROM THE ADMIN MENU  --- NOT YET DONE 
		 *
		 * ----------------------------------
		 */
		
		// RETURN THE GENERIC FORM FOR QUERIENG FLIGHTSTATS RSS FEED
		return ( require 'views/query_form.php');
		
	}


} // --- WP_FlightStats --- end ---
