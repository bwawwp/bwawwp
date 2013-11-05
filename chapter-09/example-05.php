<?php
function my_wp_head_ajax_url()
{
?>
<script type=”text/JavaScript”>
var ajaxurl = '<?php echo admin_url("admin-ajax.php");?>';
</script>
<?php
}
add_action('wp_head', 'my_wp_head_ajax_url');
?>
