<div id="wp-flightstats">
<h2>Flight Status</h2>
	<form action="" method="post" name="FlightStats">
		
		<?php if( $this->FS_GUID_flight ): ?>
		
			<p class="fs-description flight_no">Search By Flight No.</p>
			<p class="airport_input fs_flightno">
				<label for="fs_flight_no">Flight </label>
				<input id="fs_flight_no" type="text" name="fs_flight_no" placeholder="e.g. BA 232" />
			</p>
			
			<p class="fs-description search_alt">or search by route</p>
		
		<?php endif; ?>
		
		<?php if( $this->FS_GUID_route ): ?>
		
			<p class="airport_input fs_departure">
				<label for="fs_dep_airport">Departure Airport: </label>
				<input id="fs_dep_airport" type="text" name="fs_dep_airport" placeholder="e.g. CPT" />
			</p>
			<p class="airport_input fs_arrival">
				<label for="fs_arr_airport">Arrival Airport: </label>
				<input id="fs_arr_airport" type="text" name="fs_arr_airport" placeholder="e.g. LHR" />
			</p>
			<p class="airport_input fs_schedule">
				<label for="fs_sched_date">Departure date: </label>
				<select id="fs_sched_date" name="fs_sched_date">
					<option value="1" selected="selected">Today</option>
					<option value="2">Yesterday</option>
					<option value="3">Tomorrow</option>
				</select>
			</p>
		
		<?php endif; ?>
		
			<input type="hidden" name="fs_query" value="true" />
			<p class="airport_input fs_submit" ><input type="submit" value="GO"/></p>

	</form>
</div>