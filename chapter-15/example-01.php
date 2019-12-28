<?php
// Set sale price to 10% of regular price if not already on sale
function my_get_sale_price($sale_price, $product) {
	if(empty($sale_price)) {
		$sale_price = $product->get_regular_price() * .9;
    $product->set_price($sale_price);
	}

	return $sale_price;
}
add_filter('woocommerce_product_get_sale_price', 'my_get_sale_price',
  10, 2);
add_filter('woocommerce_product_variation_get_sale_price',
  'my_get_sale_price', 10, 2);