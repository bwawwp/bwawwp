jQuery(document).ready(function() {
	jQuery.ajax( {
		url: HSBSettings.root + 'wc/v3/customers/'
		                      + HSBSettings.current_user_id,
		method: 'GET',
		beforeSend: function ( xhr ) {
			xhr.setRequestHeader( 'X-WP-Nonce', HSBSettings.nonce );
		},
	} ).done( function ( customer ) {
		if ( customer['is_paying_customer'] ) {
			jQuery('#sale-banner').remove();
		}
	} );
} );