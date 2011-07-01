// SET JQUERY TO SOMETHING SIMPLER
var jQ = jQuery;

// CALLED ON CLICKING 'CHECK'
function fs_validate(fs_element_param) {
	// USED TO DETERMINE TYPE OF QUERY ( BY ROUTE OR FLIGHT )
	var query_param = fs_element_param.attr('query');
	// GUID VALUE
	var guid_param = fs_element_param.val();
	// QUERY URL
	var fs_url = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20rss%20where%20url%3D'http%3A%2F%2Fwww.flightstats.com%2Fgo%2Frss%2FflightStatusBy" + query_param + ".do%3Fguid=" + guid_param + "'&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
	// CACHE PARENT ELEMENT AS USED OFTEN
	var parent_p = fs_element_param.parent('p');
	
	// USED TO DISPLAY LOADING GIF
	parent_p.addClass('fs_thinking');
	
	// ACTUAL AJAX FUNCTION
	jQ.ajax({
		url: fs_url,
		success: function(fs_xml) {
			
			// NAVIGATE TO DESIRED XML ELEMENT
			var fs_auth = jQ(fs_xml).find('results item:first description').text();
			
			// CHECK FOR THE STRING 'Authentication failed' TO DETERMINE VALID GUID
			if (fs_auth.search('Authentication failed') === -1) {
				
				// HANDLE CSS TO INDICATE VALID DETAILS
				parent_p.removeClass('fs_thinking');
				parent_p.removeClass('fs_failed');
				parent_p.addClass('fs_passed');
				
			} else {
			
				// HANDLE CSS TO INDICATE INVALID DETAILS			
				parent_p.removeClass('fs_thinking');
				parent_p.removeClass('fs_passed');
				parent_p.addClass('fs_failed');
			}
		}
	});
	
}

// CLICK EVENT FUNCTION WHICH ALSO CALLS fs_validate 
jQ(function validate_guids() {
	
	jQ.each(jQ('#FS-Admin p input:text'), function() {
		
		// SAVE ELEMENT TO VAR BEFORE 'THIS' GOES OUT OF SCOPE
		var fs_element = jQ(this);
		
		// CHECK IF GUIDS ARE SET AND SHOW VALIDATION BUTTON
		if (fs_element.val().length >= 1) {
			jQ(this).prev('a').fadeIn(200, function() {
				jQ(this).click(function() {
					
					// CALL THE VALIDATION FUNCTION
					fs_validate(fs_element);
				});
			});
		}
	});
});
