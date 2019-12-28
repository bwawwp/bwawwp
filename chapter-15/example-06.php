<?php if(is_user_logged_in()) { ?>
<div class="user-welcome">
  Welcome
  <?php if(function_exists("pmpro_hasMembershipLevel")
    && pmpro_hasMembershipLevel()) { ?>
	<a href="<?php echo pmpro_url("account"); ?>">
    <?php echo $current_user->display_name;?>
    </a>
  <?php } else { ?>
	<a href="<?php echo home_url("/wp-admin/profile.php"); ?>">
    <?php echo $current_user->display_name;?>
    </a>
  <?php } ?>
</div> <!-- end user-welcome -->
<?php } ?>