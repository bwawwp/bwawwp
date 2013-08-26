<?php
global $wpdb;

//just update the status
$wpdb->update(
	"ecommerce_orders",			//table name
	array("status"=>"paid"),		//data fields
	array("id"=>$order_id)		//where fields
);

//update more data about the order
$wpdb->update(
	"ecommerce_orders",			//table name
	array("status"=>"pending",		//data fields
		"subtotal"=>"100.00",
		"tax"=>"6.00",
		"total"=>"106.00"
	),
	array("id"=>$order_id)		//where fields
);
