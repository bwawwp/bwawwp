<?php
/*Plugin Name: BWAwWP - Twitter */

// reference the php library we downloaded from GitHub
require_once 'lib/twitteroauth.php';


// Copy over credentials from the Twitter App you created.
// the below are not real keys & secrets
define( 'CONSUMER_KEY', '0UKP3bUibccx2NFLU1wlK' );
define( 'CONSUMER_SECRET', 'KGYQnbldACazyyk2yZlZaNPetPLwvZcqdg2INprRqbo' );
define( 'TOKEN', '11018212-3qMnqt8AvF0PeyH9huqCzEoNlfyVD4HpCb2oK1kAW' );
define( 'TOKEN_SECRET', 'jUMC4xRFh33Oeby6Yx7JVZ5Ocmd7L9TpRjeiCbiIyjc' );

add_action( 'init', 'sp_twitter_search' );
function sp_twitter_search() {
	// our search term
	$q = 'bwawwp';

	// call TwitterOAuth and pass in Twitter credentials.
	$toa = new TwitterOAuth( CONSUMER_KEY, 
		CONSUMER_SECRET, 
		TOKEN, 
		TOKEN_SECRET 
	);

	// call the search tweets method
	$search = $toa->get( 'search/tweets', array( 'q' => $q ) );

	echo "<pre>";
	print_r( $search );
	echo "</pre>";
	exit();

	/*
	If you run the code above you should get results similar to:
	stdClass Object
	(
	    [statuses] => Array
	        (
	            [0] => stdClass Object
	                (
	                    [metadata] => stdClass Object
	                        (
	                            [result_type] => recent
	                            [iso_language_code] => en
	                        )

	                    [created_at] => Fri Nov 01 13:12:51 +0000 2013
	                    [id] => 396263567206658048
	                    [id_str] => 396263567206658048
	                    [text] => @BWAwWP @bmess @webdevstudios brilliant! looking forward to it!
	                    [source] => Twitter for Mac
	                    [truncated] => 
	                    [in_reply_to_status_id] => 396263292072906752
	                    [in_reply_to_status_id_str] => 396263292072906752
	                    [in_reply_to_user_id] => 1646462178
	                    [in_reply_to_user_id_str] => 1646462178
	                    [in_reply_to_screen_name] => BWAwWP
	                    [user] => stdClass Object
	                        (
	                            [id] => 19288230
	                            [id_str] => 19288230
	                            [name] => Jeffrey Pearce
	                            [screen_name] => jeffikus
	                            [location] => Cape Town, South Africa
	                            [description] => wordpress, woothemes, creative, poet, guitarist, teacher, coder, analyst, disciple
	                            [url] => http://t.co/aU6eee8Zfr
	                            [entities] => stdClass Object
	                                (
	                                    [url] => stdClass Object
	                                        (
	                                            [urls] => Array
	                                                (
	                                                    [0] => stdClass Object
	                                                        (
	                                                            [url] => http://t.co/aU6eee8Zfr
	                                                            [expanded_url] => http://www.jeffikus.com
	                                                            [display_url] => jeffikus.com
	                                                            [indices] => Array
	                                                                (
	                                                                    [0] => 0
	                                                                    [1] => 22
	                                                                )

	                                                        )

	                                                )

	                                        )

	                                    [description] => stdClass Object
	                                        (
	                                            [urls] => Array
	                                                (
	                                                )

	                                        )

	                                )

	                            [protected] => 
	                            [followers_count] => 856
	                            [friends_count] => 245
	                            [listed_count] => 80
	                            [created_at] => Wed Jan 21 14:02:22 +0000 2009
	                            [favourites_count] => 27
	                            [utc_offset] => 7200
	                            [time_zone] => Pretoria
	                            [geo_enabled] => 1
	                            [verified] => 
	                            [statuses_count] => 5055
	                            [lang] => en
	                            [contributors_enabled] => 
	                            [is_translator] => 
	                            [profile_background_color] => EBEBEB
	                            [profile_background_image_url] => http://a0.twimg.com/profile_background_images/22736176/twitter.jpg
	                            [profile_background_image_url_https] => https://si0.twimg.com/profile_background_images/22736176/twitter.jpg
	                            [profile_background_tile] => 
	                            [profile_image_url] => http://pbs.twimg.com/profile_images/632370219/woothemes021_normal.jpg
	                            [profile_image_url_https] => https://pbs.twimg.com/profile_images/632370219/woothemes021_normal.jpg
	                            [profile_link_color] => 990000
	                            [profile_sidebar_border_color] => DFDFDF
	                            [profile_sidebar_fill_color] => F3F3F3
	                            [profile_text_color] => 333333
	                            [profile_use_background_image] => 1
	                            [default_profile] => 
	                            [default_profile_image] => 
	                            [following] => 
	                            [follow_request_sent] => 
	                            [notifications] => 
	                        )

	                    [geo] => 
	                    [coordinates] => 
	                    [place] => 
	                    [contributors] => 
	                    [retweet_count] => 0
	                    [favorite_count] => 0
	                    [entities] => stdClass Object
	                        (
	                            [hashtags] => Array
	                                (
	                                )

	                            [symbols] => Array
	                                (
	                                )

	                            [urls] => Array
	                                (
	                                )

	                            [user_mentions] => Array
	                                (
	                                    [0] => stdClass Object
	                                        (
	                                            [screen_name] => BWAwWP
	                                            [name] => BWAwWP
	                                            [id] => 1646462178
	                                            [id_str] => 1646462178
	                                            [indices] => Array
	                                                (
	                                                    [0] => 0
	                                                    [1] => 7
	                                                )

	                                        )

	                                    [1] => stdClass Object
	                                        (
	                                            [screen_name] => bmess
	                                            [name] => Brian Messenlehner
	                                            [id] => 11102182
	                                            [id_str] => 11102182
	                                            [indices] => Array
	                                                (
	                                                    [0] => 8
	                                                    [1] => 14
	                                                )

	                                        )

	                                    [2] => stdClass Object
	                                        (
	                                            [screen_name] => webdevstudios
	                                            [name] => webdevstudios
	                                            [id] => 15783986
	                                            [id_str] => 15783986
	                                            [indices] => Array
	                                                (
	                                                    [0] => 15
	                                                    [1] => 29
	                                                )

	                                        )

	                                )

	                        )

	                    [favorited] => 
	                    [retweeted] => 
	                    [lang] => en
	                )
	
	        )

	    [search_metadata] => stdClass Object
	        (
	            [completed_in] => 0.019
	            [max_id] => 396263567206658048
	            [max_id_str] => 396263567206658048
	            [query] => bwawwp
	            [refresh_url] => ?since_id=396263567206658048&q=bwawwp&include_entities=1
	            [count] => 15
	            [since_id] => 0
	            [since_id_str] => 0
	        )

	)
	*/

}
?>