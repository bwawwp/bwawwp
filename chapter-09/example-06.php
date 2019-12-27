<?php
//our JavaScript for the page
function my_wp_footer_registration_JavaScript()
{
    //make sure we're on the registration page
    if(empty($_REQUEST['action']) || $_REQUEST['action'] != 'register')
        return;
?>
<script>
    //wait til DOM is loaded
    jQuery(document).ready(function() {
        //var to keep track of our timeout
        var timer_checkUsername;

        //detect when the user_login field is changed
        jQuery('#user_login').bind.('keyup change', function() {
            //use a timer so check is triggered 1 second after they stop typing
            timer_checkUsername = setTimeout(function(){checkUsername();}, 1000);
        });
	});

    function checkUsername()
    {
        //make sure we have a username
        var username = jQuery('#user_login').val();
        if(!username)
            return;

        //check the username
        jQuery.ajax({
    	url: ajaxurl,type:'GET',timeout:5000,
		dataType: 'html',
		data: "action=check_username&username="+username,
		error: function(xml){
			//timeout, but no need to scare the user
		},
		success: function(response){
	        //hide any flag we may have already shown
	        jQuery('#username_check').remove();

	        //show if the username is good (1) or taken (0)
	        if(response == 1)
	            jQuery('#user_login').after(
	            	'<span id="username_check" class="okay">Okay</span>'
	            );
	        else
	            jQuery('#user_login').after(
	            	'<span id="username_check" class="taken">Taken</span>'
	            );
		}
    	});
    }
</script>
<?php
}
add_action('wp_footer', 'my_wp_footer_registration_JavaScript');