<?php
function sp_wp_footer_assignments_heartbeat()
{
    global $post;   //post for current assignment
?>
<script>
jQuery(document).ready(function() {    			
  //heartbeat-send
  jQuery(document).on('heartbeat-send', function(e, data) {		
	//make sure we have an array for SchoolPress data
  if(!data['schoolpress'])
    data['schoolpress'] = new Array();

  //send to server the post_id of this assignment and current count
  data['schoolpress']['assignment_post_id'] = '<?php echo $post->ID;?>';
  data['schoolpress']['assignment_count'] = jQuery('#assignment-count').val();
  });

  //heartbeat-tick
  jQuery(document).on('heartbeat-tick', function(e, data) {			
	//update assignment count
  if(data['schoolpress']['assignment_count'])
	jQuery('#assignment-count').val(data['schoolpress']['assignment_count']);
  });						
});		
</script>
<?php
}
?>
