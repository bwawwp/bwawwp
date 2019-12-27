<?php
// core function get_current_blog_id
function get_current_blog_id() {
	global $blog_id;
	return absint($blog_id);
}