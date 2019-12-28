<?php
/*
Template Name: Page - Contact Form
*/

//get values possibly submitted by form
$email = sanitize_email( $_POST['email'] );
$cname = sanitize_text_field( $_POST['cname'] );
$phone = sanitize_text_field( $_POST['phone'] );
$message = sanitize_text_field( $_POST['message'] );
$sendemail = !empty( $_POST['sendemail'] );

// form submitted?
if ( !empty( $sendemail )
    && !empty( $cname )
	&& !empty( $email )
	&& empty( $lname ) ) {

	$mailto = get_bloginfo( 'admin_email' );
	$mailsubj = "Contact Form Submission from " . get_bloginfo( 'name' );
	$mailhead = "From: " . $cname . " <" . $email . ">\n";
	$mailbody = "Name: " . $cname . "\n\n";
	$mailbody .= "Email: $email\n\n";
	$mailbody .= "Phone: $phone\n\n";
	$mailbody .= "Message:\n" . $message;

	// send email to us
	wp_mail( $mailto, $mailsubj, $mailbody, $mailhead );

	// set message for this page and clear vars
	$msg = "Your message has been sent.";

	$email = "";
	$cname = "";
	$phone = "";
	$message = "";
}
elseif ( !empty( $sendemail ) && !is_email( $email ) )
	$msg = "Please enter a valid email address.";
elseif ( !empty( $lname ) )
	$msg = "Are you a spammer?";
elseif ( !empty( $sendemail ) && empty( $cname ) )
	$msg = "Please enter your name.";
elseif ( !empty( $sendemail ) && !empty( $cname ) && empty( $email ) )
	$msg = "Please enter your email address.";

// get the header
get_header();
?>
<div id="wrapper">
 <div id="content">
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <h1><?php the_title(); ?></h1>
  <?php if ( !empty( $msg ) ) { ?>
   <div class="message"><?php echo $msg?></div>
  <?php } ?>
  <form class="general" action="<?php the_permalink(); ?>" method="post">
   <div class="form-row">
	<label for="cname">Name</label>
	<input type="text" name="cname" value="<?php echo esc_attr($cname);?>"/>
	<small class="red">* Required</small>
   </div>
   <div class="hidden">
	<label for="lname">Last Name</label>
	<input type="text" name="lname" value="<?php echo esc_attr($lname);?>"/>
	<small class="red">LEAVE THIS FIELD BLANK</small>
   </div>
   <div class="form-row">
	<label for="email">Email</label>
	<input type="text" name="email" value="<?php echo esc_attr($email);?>"/>
	<small class="red">* Required</small>
   </div>
   <div class="form-row">
	<label for="phone">Phone</label>
	<input type="text" name="phone" value="<?php echo esc_attr($phone);?>"/>
   </div>
   <div class="form-row">
	<label for="message">Question or Comment</label>
	<textarea class="textarea" id="message" name="message" rows="4" cols="55">
		<?php echo esc_textarea( $message )?>
	</textarea>
   </div>

   <div class="form-row">
	<label for="sendemail">&nbsp;</label>
	<input type="submit" id="sendemail" name="sendemail" value="Submit"/>
   </div>
  </form>
 <?php endwhile; endif; ?>
 </div>
</div>
<?php
// get the footer
get_footer();
?>