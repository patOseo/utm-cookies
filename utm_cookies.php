<?php
/*
Plugin Name:	UTM Cookies
Description:	A basic plugin that sets cookies based on UTM parameters in the URL, if they are found.
Version:		1.0.0
Author:			Ontario SEO
*/

function set_utm_cookies() {
    $cookies = array('utm_campaign', 'utm_adgroup', 'utm_keyword', 'utm_source', 'utm_medium');

    
    foreach($cookies as $cookie_name) { // Loop through each cookie name in the $cookies variable

        if (isset($_GET[$cookie_name])) { // If there is a parameter set, execute the following

            if(isset($_COOKIE[$cookie_name])) { // If cookie was already set, remove the cookie.
                unset( $_COOKIE[$cookie_name] );
                setcookie($cookie_name, '', time() - ( 15 * 60 ), "/" );
            }
    
            // Set the cookie based on the UTM parameter.
            setcookie($cookie_name, $_GET[$cookie_name], time()+86400, "/");
        }   
    }
    
}

add_action('init', 'set_utm_cookies');