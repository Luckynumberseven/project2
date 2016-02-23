<?php 
/*
Plugin Name: Testplugin
Plugin URI: http://testytest.com/
Description: HOHO
Version: 0.01
Author: Mange
Author URI: http://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: testplugin
*/

function testplugin_admin_page() {
	echo '<h2>HOHO!</h2>';
}

function testplugin_admin_menu() {
	add_options_page('Testplugin', 'Testplugin', 1, 'testplugin', 'testplugin_admin_page');
}

add_action('admin_menu', 'testplugin_admin_menu');