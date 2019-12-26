<?php
function __get( $key ) {
    if ( isset( $this->data->$key ) ) {
    	$value = $this->data->$key;
	} else {
		$value = get_user_meta( $this->ID, $key, true );
	}

	return $value;
}