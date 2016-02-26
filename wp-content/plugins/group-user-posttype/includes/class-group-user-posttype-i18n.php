<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://thomaskjellberg.se
 * @since      1.0.0
 *
 * @package    Group_User_Posttype
 * @subpackage Group_User_Posttype/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Group_User_Posttype
 * @subpackage Group_User_Posttype/includes
 * @author     Thomas Kjellberg <thomas.kjellberg@gmail.com>
 */
class Group_User_Posttype_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'group-user-posttype',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
