<?php
function sp_register_form(){
    // get the age value passed into the form
    if ( ! empty( $_REQUEST['age'] ) )
        $age = intval( $_REQUEST['age'] );
    else
        $age = '';

    // show input
    ?>
    <p>
    <label for="age">Age<br />
    <input type="text" name="age" id="age" class="input"
        value="<?php echo esc_attr( $age ); ?>" />
    </label>
    </p>
    <?php
}
add_action( 'register_form', 'sp_register_form' );