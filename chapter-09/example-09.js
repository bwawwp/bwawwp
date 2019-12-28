//Option #2: Cancel an older request when a new one comes in
var ajax_request;
jQuery('#button').click(function() {
    //cancel any existing requests
    if(typeof ajax_request !== 'undefined')
        ajax_request.abort();

    //do the ajax request
    ajax_request = jQuery.ajax({
        url: ajaxurl,type:'GET',timeout:5000,
        dataType: 'html',
    	error: function(xml){
    		//error stuff
    	},
    	success: function(response){
            //success stuff
    	}
    });
});
