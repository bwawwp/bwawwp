<?php
function my_highlight_admin_activity_script() {
?>
<style>
	li.activity.highlighted {
		background-color: #FFFFCC;
	}
</style>
<script>
	fetch( '/wp-json/buddypress/v1/activity?user_id=1&per_page=1' )
	.then( function( response ) {
		return response.json();
	})
	.then( function( activity ) {
		const elements = document.querySelectorAll(
      "a[href='" + activity[0].link + "']"
    );
		elements.forEach( function( element ) {
			const wrapping_div = element.closest( 'li.activity' );
			wrapping_div.classList.add( 'highlighted' );
		} );
	} );
</script>
<?php
}
add_action( 'wp_footer', 'my_highlight_admin_activity_script' );