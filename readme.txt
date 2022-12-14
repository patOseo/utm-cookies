=== UTM Cookies ===
Tested up to: 6.0.3
Requires PHP: 7.0

A basic plugin that adds a function on init that sets cookies based on UTM parameters, if they are found.

== Description ==

A basic WordPress plugin that adds a function on init that sets cookies based on UTM parameters, if they are found.

## Usage ##

Simply activate the plugin, and UTM cookies can be set using the following URL structure (replace the domain with your own, and replace VALUE with your values):

== Frequently Asked Questions ==

= What parameters work with this plugin? =

Currently, the parameters are 'utm_source', 'utm_medium', 'utm_campaign', 'utm_adgroup', 'utm_term', 'utm_content', 'keyword', 'campaignname', 'adgroupname',. Support for custom parameters will be added in the future.

= How long will the cookies be set? =

Cookies will clear after 30 days. Support for custom time will be added in the future.

== Changelog ==

= 1.0.4 =
* Added additional parameters.

= 1.0.3 =
* Added Gravity Form field pre-population.

= 1.0.2 =
* Prevents page caching when UTM parameters are set.

= 1.0.1 =
* Readme updates and installed plugin update checker.

= 1.0 =
* Initial plugin version. 