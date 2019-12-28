<?php
function autocomplete_virtual_orders($order_id) {
	//get the existing order
	$order = new WC_Order($order_id);

	//assume we will autocomplete
	$autocomplete = true;

	//get line items
	if (count( $order->get_items() ) > 0) {
	  foreach ($order->get_items() as $item) {
	    if($item['type'] == 'line_item') {
	      $_product = $order->get_product_from_item( $item );
	      if(!$_product->is_virtual()) {
	        //found a non-virtual product in the cart
	        $autocomplete = false;
	        break;
				}
			}
		}
	}

	//change status if needed
	if(!empty($autocomplete)) {
		$order->update_status('completed', 'Autocompleted.');
	}
}
add_filter('woocommerce_thankyou', 'autocomplete_virtual_orders');