<?php
function wpsso_check_authentication_endpoint() {
  global $current_user;

  if ( ! empty( $current_user->user_login ) ) {
    $r = array(
      'success' => true,
      'message' => sprintf( 'Logged in as %s', $current_user->user_login ),
      'user_login' => $current_user->user_login,
      'user_email' => $current_user->user_email,
      'first_name' => $current_user->first_name,
      'last_name' => $current_user->last_name,
    );
  } else {
    $r = array(
      'success' => false,
      'message' => 'Not logged in.',
      'user_email' => null,
      'user_login' => $current_user->user_login,
      'first_name' => null,
      'last_name' => null,
    );
  }

  $r = rest_ensure_response( $r );

  return $r;
}