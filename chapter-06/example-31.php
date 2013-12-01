<?php
// make the column sortable
function sp_manage_users_sortable_columns( $columns ){
    $columns['age'] = 'Age';
	return $columns;
}
add_filter( 'manage_users_sortable_columns', 'sp_manage_users_sortable_columns' );

// update user_query if sorting by Age
function sp_pre_user_query( $user_query ){
    global $wpdb, $current_screen;

    // make sure we are viewing the users list in the dashboard
    if ( $current_screen->id != 'users' ) 
        return;
    
    // order by age
    if ( $user_query->query_vars['orderby'] == 'Age' ){
        $user_search->query_from .= " INNER JOIN $wpdb->usermeta m1 
            ON $wpdb->users u1 
            AND (u1.ID = m1.user_id) 
            AND (m1.meta_key = 'age')"; 
        $user_search->query_orderby = " ORDER BY m1.meta_value 
            " . $user_query->query_vars['order'];
    } 
}
add_action( 'pre_user_query', 'sp_pre_user_query' );
?>