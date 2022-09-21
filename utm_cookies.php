<?php
/*
Plugin Name:	UTM Cookies
Description:	A basic plugin that sets cookies based on UTM parameters in the URL, if they are found.
Version:		1.0.0
Author:			Ontario SEO
*/

function set_utm_cookies() {

    // Store all of the UTM parameters we'll be using in an array
    $cookies = array('utm_source', 'utm_medium', 'utm_campaign', 'utm_adgroup', 'utm_term');
    
    foreach($cookies as $cookie_name) { // Loop through each cookie name in the $cookies array

        if (isset($_GET[$cookie_name])) { // If there is a parameter set, execute the following

            if(isset($_COOKIE[$cookie_name])) { // If cookie was already set, remove the cookie, so we can set it again after.
                unset( $_COOKIE[$cookie_name] );
                setcookie($cookie_name, '', time() - ( 15 * 60 ), "/" );
            }
    
            // Set the cookie based on the UTM parameter.
            setcookie($cookie_name, $_GET[$cookie_name], time()+86400, "/");
        }   
    }
    
}

add_action('init', 'set_utm_cookies');