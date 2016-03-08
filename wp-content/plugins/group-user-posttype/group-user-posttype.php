<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://thomaskjellberg.se
 * @since             1.0.0
 * @package           Group_User_Posttype
 *
 * @wordpress-plugin
 * Plugin Name:       group-user-post type relationship manager
 * Plugin URI:        http://thomaskjellberg.se/group-user-posttype-relationship-manager
 * Description:       Set up groups with users and connect the group to post types.
 * Version:           0.0.1
 * Author:            Thomas Kjellberg
 * Author URI:        http://thomaskjellberg.se
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       group-user-posttype
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-group-user-posttype-activator.php
 */
function activate_group_user_posttype() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-group-user-posttype-activator.php';
	Group_User_Posttype_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-group-user-posttype-deactivator.php
 */
function deactivate_group_user_posttype() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-group-user-posttype-deactivator.php';
	Group_User_Posttype_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_group_user_posttype' );
register_deactivation_hook( __FILE__, 'deactivate_group_user_posttype' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-group-user-posttype.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_group_user_posttype() {

	$plugin = new Group_User_Posttype();
	$plugin->run();

}

run_group_user_posttype();
