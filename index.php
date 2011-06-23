<?php
/*
Plugin Name: WP FlightStats
Plugin URI: http://catn.com
Description: WordPress plugin for use with FlightStats account. Creates UI for flight arrivals & departures.
Version: 1.0
Author: Ray Viljoen
Author URI: http://fubra.com
*/


// --------------------------------- 
// ----- REMOVE BEFORE RELEASE ----- 
// --------------------------------- 
	error_reporting(E_ALL);
	ini_set('display_errors','On');
// ---------------------------------
// --------------------------------- 


// INCLUDE REQUIRED CLASSES
require 'lib/WP_FlightStats.php';


	// INITIALISE MAIN CLASS
	$FS_Instance = new WP_FlightStats();