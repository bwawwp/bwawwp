update anyprefix_options set option_name = replace(
option_name,'wp_','anyprefix_');
update anyprefix_usermeta set meta_key = replace(
meta_key,'wp_','anyprefix_');