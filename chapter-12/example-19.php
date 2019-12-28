<?php
if ( is_multisite() ) {
  wpmpu_delete_user( $user_id );
} else {
  wp_delete_user( $user_id );
}