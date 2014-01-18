<?php
add_action( 'init', 'wds_get_aws_products' );

function wds_get_aws_products() {

	//set our aws associate tag, access key id & secret access key
	$AssociateTag = 'webd167-423234';
	$AWSAccessKeyId = 'ACAJBDXQSKILGQDWZSNK';
	$AWSSecretAccessKey = '26AB/UhHl2kYu/YF8QokT1+078p5Ax/tgECtWbwug';

	//set up our search parameters
	$params = array(
		'AWSAccessKeyId' => $AWSAccessKeyId,
		'AssociateTag' => $AssociateTag,
		'Service' => 'AWSECommerceService',
		'ItemPage' => '10',
		'Operation' => 'ItemSearch',
		'SearchIndex' => 'Books',
		'Keywords' => "WordPress",
		'ResponseGroup' => 'Offers,ItemAttributes,OfferFull,Images' );

	$params['Timestamp'] = gmdate( "Y-m-d\TH:i:s.\\0\\0\\0\\Z", time() );
	$url_parts = array();
	foreach ( array_keys( $params ) as $key ) {
		$part = str_replace( '%7E', '~', rawurlencode( $params[ $key ] ) );
		$url_parts[] = $key . '=' . $part;
	}

	sort( $url_parts );
	$url_string = implode( "&", $url_parts );
	$string_to_sign = "GET\necs.amazonaws.com\n/onca/xml\n" . $url_string;
	$signature = hash_hmac( "sha256", 
		$string_to_sign, 
		$AWSSecretAccessKey, 
		TRUE 
	);
	$signature = urlencode( base64_encode( $signature ) );
	$url = 'http://ecs.amazonaws.com/onca/xml?';
	$url.= $url_string . "&Signature=" . $signature;
	$response = file_get_contents( $url );

	$xml = simplexml_load_string( $response );

	echo '<pre>';
	print_r( $xml );
	echo '</pre>';
	exit();

}
?>