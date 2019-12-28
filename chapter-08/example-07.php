<?php
constant('MY_SITE_DOMAIN', 'yoursite.com');

function my_NuclearHTTPS() {
	ob_start("my_replaceURLsInBuffer");
}
add_action("init", "my_NuclearHTTPS");

function my_replaceURLsInBuffer($buffer) {
  global $besecure;

	//only swap URLs if this page is secure
	if(is_ssl())
	{
/*
okay swap out all links like these:
* http://yoursite.com
* http://anysubdomain.yoursite.com
* http://any.number.of.sub.domains.yoursite.com
*/
$buffer = preg_replace(
      '/http\:\/\/([a-zA-Z0-9\.\-]*'.str_replace('.','\.',MY_SITE_DOMAIN).')/i',
      'https://$1',
$buffer
      );
	  }

	return $buffer;
}