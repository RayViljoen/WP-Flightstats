<?php

class FS_Query
{

	// FLIGHTSTATS RSS QUERY URL
	const FS_RSS = 'http://www.flightstats.com/go/rss/flightStatusByRoute.do?';
	
	static function rss()
	{	
	
	// debugging ---------------------
					echo '<pre>';
					print_r($_POST);
					echo '</pre>';
	// debugging ---------------------
		
		
		// SANITIZE POST INPUT
		$fs_rss_params = filter_var_array( $_POST, FILTER_SANITIZE_STRING );
		

		// --------------------------- CREATE DATE ------
		// SET TIME TO TODAY
		$fs_time = time();
		// THEN..
		// CHECK IF SELECTED DAY YESTERDAY OR TOMORROW AND ADD OR SUBTRACT 60*60*24 = 86400 - ONE DAY
		if ( $fs_rss_params['fs_sched_date'] === 'yesterday' ){ $fs_time -= 86400; }
		elseif ( $fs_rss_params['fs_sched_date'] === 'tomorrow' ){ $fs_time += 86400; }
		
		// CREATE FORMATTED DATE FOR QUERY
		$fs_date = date( 'Y-m-d',  $fs_time );
		// ----------------------------------------------
	}
	
}