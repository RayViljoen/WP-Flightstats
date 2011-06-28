<?php

class FS_Query
{

	// FLIGHTSTATS RSS QUERY URL
	const FS_RSS = 'http://www.flightstats.com/go/rss/flightStatusByRoute.do?';
	
	static function rss()
	{	
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
				
		$fs_rss_params = filter_var_array( $_POST );

	}
	
}