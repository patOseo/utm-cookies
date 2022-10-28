<?php
/*
Plugin Name:	UTM Cookies
Description:	A basic plugin that sets UTM parameter cookies if they are found in the URL.
Version:		1.0.4
Author:			Pat Monette
Author URI:     https://www.ontarioseo.ca/team/patrick-monette
*/

require 'plugin-update-checker/plugin-update-checker.php';
$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/patOseo/utm-cookies.git',
    __FILE__, //Full path to the main plugin file.
    'utm-cookies' //Plugin slug. Usually it's the same as the name of the directory.
);

/*
Set the cookies from UTM parameters
*/

function set_utm_cookies() {

    // Store all of the UTM parameters we'll be using in an array
    $cookies = array('utm_source', 'utm_medium', 'utm_campaign', 'campaignname', 'utm_adgroup', 'adgroupname', 'utm_term', 'keyword', 'utm_content');
    
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


/*
Set the Gravity Form values
*/

add_filter( 'gform_field_value_utm_source', 'populate_utm_source' );
function populate_utm_source( $value ) {
    if(isset($_COOKIE['utm_source'])) {
        return $_COOKIE['utm_source'];
    } elseif(isset($_GET['utm_source'])) {
        return $_GET['utm_source'];
    }
}

add_filter( 'gform_field_value_utm_medium', 'populate_utm_medium' );
function populate_utm_medium( $value ) {
    if(isset($_COOKIE['utm_medium'])) {
        return $_COOKIE['utm_medium'];
    } elseif(isset($_GET['utm_medium'])) {
        return $_GET['utm_medium'];
    }
}

add_filter( 'gform_field_value_utm_campaign', 'populate_utm_campaign' );
function populate_utm_campaign( $value ) {
    if(isset($_COOKIE['utm_campaign'])) {
        return $_COOKIE['utm_campaign'];
    } elseif(isset($_GET['utm_campaign'])) {
        return $_GET['utm_campaign'];
    }
}

add_filter( 'gform_field_value_utm_adgroup', 'populate_utm_adgroup' );
function populate_utm_adgroup( $value ) {
    if(isset($_COOKIE['utm_adgroup'])) {
        return $_COOKIE['utm_adgroup'];
    } elseif(isset($_GET['utm_adgroup'])) {
        return $_GET['utm_adgroup'];
    }
}

add_filter( 'gform_field_value_utm_term', 'populate_utm_term' );
function populate_utm_term( $value ) {
    if(isset($_COOKIE['utm_term'])) {
        return $_COOKIE['utm_term'];
    } elseif(isset($_GET['utm_term'])) {
        return $_GET['utm_term'];
    }
}

add_filter( 'gform_field_value_utm_content', 'populate_utm_content' );
function populate_utm_content( $value ) {
    if(isset($_COOKIE['utm_content'])) {
        return $_COOKIE['utm_content'];
    } elseif(isset($_GET['utm_content'])) {
        return $_GET['utm_content'];
    }
}

add_filter( 'gform_field_value_campaignname', 'populate_campaignname' );
function populate_campaignname( $value ) {
    if(isset($_COOKIE['campaignname'])) {
        return $_COOKIE['campaignname'];
    } elseif(isset($_GET['campaignname'])) {
        return $_GET['campaignname'];
    }
}

add_filter( 'gform_field_value_adgroupname', 'populate_adgroupname' );
function populate_adgroupname( $value ) {
    if(isset($_COOKIE['adgroupname'])) {
        return $_COOKIE['adgroupname'];
    } elseif(isset($_GET['adgroupname'])) {
        return $_GET['adgroupname'];
    }
}

add_filter( 'gform_field_value_keyword', 'populate_keyword' );
function populate_keyword( $value ) {
    if(isset($_COOKIE['keyword'])) {
        return $_COOKIE['keyword'];
    } elseif(isset($_GET['keyword'])) {
        return $_GET['keyword'];
    }
}