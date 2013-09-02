<?php
function sp_user_profile( $user ){
    // show input
    ?>
    <table class="form-table">
    <tbody>
        <tr>
    		<th><label for="age">Age</label></th>
    		<td>
    			<input type="text" name="age" id="age" class="input" value="<?php echo esc_attr( $user->age ); ?>" size="10" />
    		</td>
    	</tr>
    </tbody>
    </table>
    <?php  
}
add_action( 'show_user_profile', 'sp_user_profile' ); //user's own profile
add_action( 'edit_user_profile', 'sp_user_profile' ); //admins editing user profiles
?>