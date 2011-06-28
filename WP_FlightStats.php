<?php
// Main Plugin Class

class WP_FlightStats{

	// FLIGHTSTATS GUIDs:
	private $FS_GUID_route;
	private $FS_GUID_flight;
	
	// USED TO EITHER SET OR UPDATE 'GUIDs' VARS 
	private function update_guids()
	{
		$this->FS_GUID_route = get_option( 'FS_GUID_route' );
		$this->FS_GUID_flight = get_option( 'FS_GUID_flight' );
	}

	// CONSTRUCTOR TO SET PLACEHOLDERS ON ACTIVATION AND CREATE AN INSTANCE VARIABLE FOR EACH ACCOUNT OPTION
	public function __construct()
	{	
		// Check if options has been set or alternitively set on activation
		if( !get_option('FS_Options_Set') )
		{
			// SET GUID PLACEHOLDERS IN WP_OPTIONS
			add_option( 'FS_GUID_route', '' );
			add_option( 'FS_GUID_flight', '' );
			// Set 'FS_Options_Set' so options are only created on activation.
			add_option( 'FS_Options_Set', 'true' );
		}
		
		// SET GUID IVARS
		$this->update_guids();
					
		// ---- REGISTER WORDPRESS HOOKS ----

		// ADMIN ACTION HOOK TO 'fs_admin()'
		add_action('admin_menu', array( &$this, 'fs_admin_auth' ) );

		// SHORTCODE HOOK TO 'fs_shortcode()'
		add_shortcode( 'flightstats', array( &$this, 'fs_shortcode' ) );
		
		// INCLUDE ANY PLUGIN STYLES
		add_action( 'wp_head', array( &$this, 'fs_stylesheet' ) );

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
			// CHECK IF USER SELECTED TO DELETE GUID SETTINGS
			if ( isset($_POST['FS_Delete']) )
			{
				update_option( 'FS_GUID_route', '' );
				update_option( 'FS_GUID_flight', '' );

			}
			// ELSE UPDATE SETTINGS WITH
			else
			{
				update_option( 'FS_GUID_route', $_POST['FS_GUID_route'] );
				update_option( 'FS_GUID_flight', $_POST['FS_GUID_flight'] );
			}
			
			// UPDATE GUID IVARS
			$this->update_guids();
		}
					
		// INCLUDE ADMIN PAGE HTML CONTENT
		require 'views/admin_page.php';
	}
	
	
	
	// INITILISE INSTANCE OF 'fs_shortcode'. - CALLED FROM SHORTCODE HOOK IN __constructor
	public function fs_shortcode($atts)
	{	
		// FIRST CHECK FOR POST REQUEST AND CALL 'query' METHOD FROM 'FS_Query'.
		// METHOD WILL RETURN RESULTS VIEW
		if( isset( $_POST['fs_query'] ) ){
			
			$fs_rss_result = FS_Query::query();
			return $fs_rss_result;	
		}
		
		// IF NO $_POST['fs_query'] THEN JUST CONTINUE AS NORMAL DISPLAYING THE FORM
		// CHECK GUIDs ARE SET BEFORE DISPLAYING QUERY FORM
		if( $this->FS_GUID_flight || $this->FS_GUID_route ){
		
			// RETURN THE GENERIC FORM FOR QUERIENG FLIGHTSTATS RSS FEED
			// note * include in ob_buffer and assign to variable in order to return through shortcode.
			ob_start(); // start buffer
			require( 'views/query_form.php' ); // include form
			$fs_query_form = ob_get_contents(); // assign buffer contents to variable
			ob_end_clean(); // end buffer and remove buffer contents
			
			return $fs_query_form ;
		
		// IF AT LEAST ONE GUID IS NOT SET DISPLAY ERROR MESSAGE
		}else{
		
			// DISPLAY ERROR MESSAGE IF NO GUID SUPPLIED
			return '<p style="margin: 10px; padding: 5px; background: #f00; text-align:center; font-weight:bold; color: #000;">Please supply a valid FlightStats GUID</p>'; }
	}
	
	
	
	public function fs_stylesheet()
	{
		/* ECHO OUTPUT LINK TO SELECTED STYLESHEET HERE */
	}


} // --- WP_FlightStats --- end ---
