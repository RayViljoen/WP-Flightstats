<?php
/*
Plugin Name: WP FlightStats
Plugin URI: http://catn.com
Description: WordPress plugin for use with FlightStats account. Creates UI for flight arrivals & departures.
Version: 1.0
Author: Ray Viljoen
Author URI: http://fubra.com
*/

error_reporting(E_ALL);
ini_set('display_errors','On');


// Include FlightStats Class
require 'lib/WP_Flightstats.php';


$flightstats = new WP_FlightStats();

// Admin menu hook
add_action('admin_menu', array( $flightstats, 'fs_admin' ) );
