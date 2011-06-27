<div id="wp-flightstats">
<h3>Flight Checker</h3>
	<form action="" method="post" name="FlightStats">
		
		<?php echo get_option( 'FS_GUID_flight' ); ?>
		<p><label for="fs_flight_number">Flight </label><input id="fs_flight_number" type="text" name="fs_flight_number" placeholder="e.g. BA 232" /></p>
		<p> - or - </p>
		<p><label for="fs_depart_airport">Departure Airport </label><input id="fs_depart_airport" type="text" name="fs_depart_airport" placeholder="e.g. CPT" /></p>
		<p><label for="fs_arrival_airport">Arrival Airport </label><input id="fs_arrival_airport" type="text" name="fs_arrival_airport" placeholder="e.g. LHR" /></p>
		<p><label for="fs_scheduled_date">Scheduled On </label>
		<select id="fs_scheduled_date" name="fs_scheduled_date">
			<option value="1" selected="selected">Today</option>
			<option value="2">Yesterday</option>
			<option value="3">Tomorrow</option>
		</select><span>*optional</span></p>
		<p><input type="submit" value="GO"/></p>
	
	</form>

</div>