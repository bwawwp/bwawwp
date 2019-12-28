<?php
$browser = get_browser();
print_r($browser);

/*
	Would produce output like:

	stdClass Object (
[browser_name_regex] => §^mozilla/5\.0 \(.*intel mac os x.*\)
applewebkit/.* \(khtml, like gecko\).*chrome/28\..*safari/.*$§
[browser_name_pattern] => Mozilla/5.0 (*Intel Mac OS X*)
AppleWebKit/* (KHTML, like Gecko)*Chrome/28.*Safari/*
[parent] => Chrome 28.0
[platform] => MacOSX
[win32] =>
[comment] => Chrome 28.0
[browser] => Chrome
[version] => 28.0
[majorver] => 28
[minorver] => 0
[frames] => 1
[iframes] => 1
[tables] => 1
[cookies] => 1
[javascript] => 1
[javaapplets] => 1
[cssversion] => 3
[platform_version] => unknown
[alpha] =>
[beta] =>
[win16] =>
[win64] =>
[backgroundsounds] =>
[vbscript] =>
[activexcontrols] =>
[ismobiledevice] =>
[issyndicationreader] =>
[crawler] =>
[aolversion] => 0
)
*/