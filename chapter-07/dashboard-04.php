<?php
/*
	Add dashboard widgets
*/
function sp_add_dashboard_widgets() {
	wp_add_dashboard_widget( 
		'schoolpress_assignments', 
		'Assignments', 
		'sp_assignments_dashboard_widget', 
		'sp_assignments_dashboard_widget_configuration' 
	);
}
add_action( 'wp_dashboard_setup', 'sp_add_dashboard_widgets' );

/*
	Assignments dashboard widget
*/
//widget
function sp_assignments_dashboard_widget() {
	$options = get_option( "assignments_dashboard_widget_options", array() );
	
	if ( !empty( $options['course_id'] ) ) {
		$group = groups_get_group( array( 
			'group_id'=>$options['course_id'] 
			) );
	}
	
	if ( !empty( $group ) ) {
		echo "Showing assignments for class " . 
			$group->name . ".<br />...";
		/*
			get assignments for this group and list their status
		*/
	}
	else {
		echo "Showing all assignments.<br />...";
		/*
			get all assignments and list their status
		*/
	}
}
//configuration
function sp_assignments_dashboard_widget_configuration() {
	//get old settings or default to empty array
	$options = get_option( "assignments_dashboard_widget_options", array() );

	//saving options?
	if ( isset( $_POST['assignments_dashboard_options_save'] ) ) {
		//get course_id
		$options['course_id'] = intval( 
			$_POST['assignments_dashboard_course_id'] 
			);

		//save it
		update_option( "assignments_dashboard_widget_options", $options );
	}

	//show options form
	$groups = groups_get_groups( array( 'orderby'=>'name', 'order'=>'ASC' ) );
	?>
	<p>Choose a class/group to show assignments from.</p>
	<div class="feature_post_class_wrap">
		<label>Class</label>
		<select name="assignments_dashboard_course_id">
		<option value="" <?php selected( $options['course_id'], "" );?>>
			All Classes
		</option>
		<?php
		$groups = groups_get_groups( array( 'orderby'=>'name', 
						'order'=>'ASC' ) );
		
		if ( !empty( $groups ) && !empty( $groups['groups'] ) ) {
			foreach ( $groups['groups'] as $group ) {
			?>
			<option value="<?php echo intval( $group->id );?>" 
			<?php selected( $options['course_id'], $group->id );?>>
			<?php echo $group->name;?>
			</option>
			<?php
			}
		}
		?>
		</select>
	</div>
	<input type="hidden" name="assignments_dashboard_options_save" value="1" />
	<?php
}
?>
