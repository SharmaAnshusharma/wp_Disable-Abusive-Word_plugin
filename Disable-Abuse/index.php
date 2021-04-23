<?php
/*
Plugin Name: Disable-Abuse
Plugin URL:
Plugin Version: 1.1
Description: This plugin will help you to disable the 
Author: Anshu Sharma
*/

function the_title_replace($title) {
	$title = attribute_escape($title);
	$find_title = array('Good','Bad','Morning');
	$replace_title = array(
		'replace1'=>"G****D", 
		'replace2'=>"B****D",
		'replace3'=>"Mo****ng"
	);
	$title =str_replace($find_title, $replace_title, $title);
	return $title;
}
add_filter('the_title', 'the_title_replace');
function the_content_replace($content)
{
	$content = attribute_escape($content);
	$find_content = array("Good","Bad","Morning");

	$replace_content = array(
		"replace_content1"=>"G***D",
		"replace_content2"=>"B***D",
		"replace_content3"=>"Mo****ng",
	);
	$content = str_replace($find_content,$replace_content,$content);
	return $content;
}
add_filter('the_content','the_content_replace');







function wpdocs_my_login_redirect( $url, $request, $user ) {
    if ( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if ( $user->has_cap( 'Adminstrator' ) ) {
            //$url = admin_url();
        } else {
        	echo "<pre>";
        	print_r($user);
            //$url = home_url( '/members-only/' );
        }
    }
    return $url;
}
 
add_filter( 'login_redirect', 'wpdocs_my_login_redirect', 10, 3 );
?>