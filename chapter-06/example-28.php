<?php
function sp_user_profile( $user ){
    // show input
    $age = esc_attr( $user->age );?>
    <table class="form-table">
    <tbody>
    <tr>
		<th><label for="age">Age</label></th>
		<td>
		<input type="text" name="age" id="age" class="input" 
			value="<?php echo $age; ?>"/>
		</td>
	</tr>
    </tbody>
    </table>
    <?php  
}
add_action( 'show_user_profile', 'sp_user_profile' ); //user's own profile
add_action( 'edit_user_profile', 'sp_user_profile' ); //admins editing user profiles
?>
