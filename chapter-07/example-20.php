<?php
add_rewrite_rule(
	  '/contact/([^/]+)/?',
	  'index.php?name=contact&subject=' . $matches[1],
	  'top'
	);
add_rewrite_rule(
flush_rewrite_rules();