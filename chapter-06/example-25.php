<?php
function ps_registration_fields(){
    // store fields in an array
    $fields = array();   
    
    // fields for all users
    $fields[] = new PMProRH_Field( 
        'gender', 
        'select', 
        array( 
            'options' => array( 
                '' => 'Choose One', 
                'male' => 'Male', 
                'female' => 'Female' 
            ), 
            'profile' => true, 
            'required' => true 
        )
    );
    $fields[] = new PMProRH_Field( 
        'age', 
        'text', 
        array( 
            'size' => 10, 
            'profile' => true, 
            'required' => true 
        ) 
    );
    $fields[] = new PMProRH_Field( 
        'phone', 
        'text', 
        array( 
            'size' => 20, 
            'label' => 'Phone Number', 
            'profile' => true, 
            'required' => true 
        ) 
    );
    
    // fields for teachers
    $fields[] = new PMProRH_Field( 
        'department', 
        'text', 
        array( 
            'size' => 40, 
            'profile' => true, 
            'required' => true 
        ) 
    );
    $fields[] = new PMProRH_Field( 
        'office', 
        'text', 
        array( 
            'size' => 40, 
            'profile' => true, 
            'required' => true 
        ) 
    );
    
    // fields for students
    $fields[] = new PMProRH_Field( 
        'graduation_year', 
        'text', 
        array( 
            'label' => 'Expected Graduation year', 
            'size' => 10, 
            'profile' => true, 
            'required' => true 
        ) 
    );
    $fields[] = new PMProRH_Field( 
        'major', 
        'text', 
        array( 'size' => 40, 'profile' => true, 'required' => true ) 
    );
    $fields[] = new PMProRH_Field( 
        'minor', 
        'text', 
        array( 'size' => 40, 'profile' => true ) 
    );
        
    // add fields to the registration page
    foreach( $fields as $field )
        pmprorh_add_registration_field( 'after_password', $field );
}
add_action( 'init', 'ps_registration_fields' );
?>