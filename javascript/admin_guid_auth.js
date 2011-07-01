var jQ = jQuery;

function validate( fs_element_param ){ 

	var query_param = fs_element_param.attr( 'query' );
	var guid_param = fs_element_param.val();
	var fs_url = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20rss%20where%20url%3D'http%3A%2F%2Fwww.flightstats.com%2Fgo%2Frss%2FflightStatusBy"+query_param+".do%3Fguid="+guid_param+"'&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
	var parent_p = fs_element_param.parent('p');
	
	parent_p.addClass( 'fs_thinking' );


	jQ.ajax({
	   url: fs_url,
	   success: function( fs_xml ){
	   		
			var fs_auth = jQ(fs_xml).find( 'results item:first description' ).text();
			
			if( fs_auth.search( 'Authentication failed' ) === -1 ){
				
				parent_p.removeClass('fs_thinking');
				parent_p.removeClass('fs_failed');
				parent_p.addClass('fs_passed');				
							
			}else{
				
				parent_p.removeClass('fs_thinking');
				parent_p.removeClass('fs_passed');
				parent_p.addClass('fs_failed');
			}
	   }
   });
}

// Validate GUIDs function
jQ( function validate_guids(){ 
	
	
	jQ.each( jQ('#FS-Admin p input:text'), function(){
		
		var fs_element = jQ( this );
		
		
		if ( fs_element.val().length >= 1 ) { 
			
			jQ(this).prev('a').fadeIn(200, function(){
		
				jQ(this).click( function(){ 
					
					validate( fs_element );
				
				});
		
			}); 
		} ;
		
	});
	

	

	

});


