//Option #1: Disabling a button while an AJAX request is processing
jQuery('#button').click(function() {    
    //disable the button
    jQuery(this).attr('disabled', 'disabled');
    
    //do the ajax request
    jQuery.ajax({
        url: ajaxurl,type:'GET',timeout:5000,
    	dataType: 'html',    	
    	error: function(xml){
    		//error stuff
    	},
    	success: function(response){
            //success stuff                        
    	},
        complete: function() {
            //enable the button again
            jQuery('#button').removeAttr('disabled');
        }
    });
});
