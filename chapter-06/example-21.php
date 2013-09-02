<?php
// don't let editors edit pages
$role = get_role( 'editor' );
$role->remove_cap( 'edit_pages' );
?>