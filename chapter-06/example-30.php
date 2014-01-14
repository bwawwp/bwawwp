<?php
// add our column to the table
function sp_manage_users_columns( $columns ){
    $columns['age'] = 'Age';    
    return $columns;
}
add_filter( 'manage_users_columns', 'sp_manage_users_columns' );

// tell WordPress how to populate the column
function sp_manage_users_custom_column( $value, $column_name, $user_id ){
    $user = get_userdata( $user_id );
    if ( $column_name == 'age' )
        $value = $user->age;
        
    return $value;
}
add_filter('manage_users_custom_column', 
    'sp_manage_users_custom_column', 10, 3);
?>
