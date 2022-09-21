<?php
/*
Plugin Name:	UTM Cookies
Description:	A basic plugin that sets cookies based on UTM parameters in the URL, if they are found.
Version:		1.0.2
Author:			Pat Monette
Author URI:     https://www.ontarioseo.ca/team/patrick-monette
*/

require 'plugin-update-checker/plugin-update-checker.php';
$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://plugins.ihearttraffic.ca/wp-update-server/?action=get_metadata&slug=utm-cookies', //Metadata URL.
    __FILE__, //Full path to the main plugin file.
    'utm-cookies' //Plugin slug. Usually it's the same as the name of the directory.
);

function set_utm_cookies() {

    // Store all of the UTM parameters we'll be using in an array
    $cookies = array('utm_source', 'utm_medium', 'utm_campaign', 'utm_adgroup', 'utm_term');
    
    foreach($cookies as $cookie_name) { // Loop through each cookie name in the $cookies array

        if (isset($_GET[$cookie_name])) { // If there is a parameter set, execute the following

            define('DONOTCACHEPAGE', true);

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