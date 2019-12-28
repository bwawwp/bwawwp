<?php
/*
    Change the Default Country from US to GB (Great Britain)
*/
function my_pmpro_default_country($default)
{
	return 'GB';
}
add_filter('pmpro_default_country', 'my_pmpro_default_country');

/*
	Add/remove some countries from the default list.
*/
function my_pmpro_countries($countries)
{
	//remove the US
	unset($countries['US']);

	//add The Moon (LN short for Lunar?)
	$countries['LN'] = 'The Moon';

	//You could also rebuild the array from scratch.
	//$countries = array('CA' => 'Canada', 'US' => 'United States',
    //  'GB' => 'United Kingdom');

	return $countries;
}
add_filter('pmpro_countries', 'my_pmpro_countries');

/*
	(optional) You may want to add/remove certain countries from the list.
    The pmpro_countries filter allows you to do this.
	The array is formatted like
    array('US'=>'United States', 'GB'=>'United Kingdom');
    with the acronym as the key and the full
	country name as the value.
*/
function my_pmpro_countries($countries)
{
	//remove the US
	unset($countries['US']);

	//add The Moon (LN short for Lunar?)
	$countries['LN'] = 'The Moon';

	//You could also rebuild the array from scratch.
	//$countries = array('CA' => 'Canada', 'US' => 'United States',
    //  'GB' => 'United Kingdom');

	return $countries;
}
add_filter('pmpro_countries', 'my_pmpro_countries');

/*
	Change some of the billing fields to be not required.
	Default fields are: bfirstname, blastname, baddress1, bcity, bstate,
    bzipcode, bphone, bemail, bcountry, CardType, AccountNumber,
    ExpirationMonth, ExpirationYear, CVV
*/
function my_pmpro_required_billing_fields($fields)
{
	//remove state and zip
	unset($fields['bstate']);
	unset($fields['bzipcode']);

	return $fields;
}
add_filter('pmpro_required_billing_fields', 'my_pmpro_required_billing_fields');