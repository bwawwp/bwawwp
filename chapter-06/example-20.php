<?php
// give admins our office_report cap to let them view that report
$role = get_role( 'administrator' );
$role->add_cap( 'office_report' );
?>