<?php
function sp_update_assignments_table($post_id)
{
  //get the post
  $post = get_post($post_id);

  //we only care about assignments
  if($post->post_type != "assignment")
    return false;

  //get data ready for insert or replace
  $assignment_data = array(
    "post_id" => $post_id,
    "student_id" => $post->post_author,
    "teacher_id" => $post->teacher_id,
    "score" => $post->score,
    "assignment_date" => $post->assignment_date,
    "due_date" => $post->due_date
    "submission_date" => $post->submission_date
  );

  //look for an existing assignment
  $assignment_id = $wpdb->get_var("SELECT id
                                    FROM wp_sp_assignments
                                    WHERE post_id = '" . $post_id . "'
                                    LIMIT 1");

  //if no assignment id, this is a new assignment
  if(empty($assignment_id))
  {
    $assignment_id = $wpdb->insert("wp_sp_assignments", $assignment_data);
  }
  else
  {
    $assignment_data['id'] = $assignment_id;
    $wpdb->replace("wp_sp_assignments", $assignment_data);
  }

  return $assignment_id;
}
add_action('save_post', 'sp_update_assignments_table');