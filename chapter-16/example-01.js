jQuery(document).ready(function($) {
	if( $('body').hasClass('woocommerce-page') ) {
	  var message_array = {};
	  message_array['post_title'] = window.appp.post_title;
	  message_array['cart_link'] = window.apppwoo.cart_url;
	  parent.postMessage( JSON.stringify( message_array ), '*');
	}
});