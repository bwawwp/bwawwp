<?php
$text = new PMProRH_Field( 'company', 'text', array( 'size' => 40, 'class' => 'company', 'profile' => true, 'required' => true ) );
pmprorh_add_registration_field( 'after_billing_fields', $text );
?>