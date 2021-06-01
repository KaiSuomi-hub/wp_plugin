<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://rusinapul.la
 * @since      1.0.0
 *
 * @package    Autosoftajson
 * @subpackage Autosoftajson/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Autosoftajson
 * @subpackage Autosoftajson/includes
 * @author     Antti Suomi <Antti@Rusinapul.la>
 */
class Autosoftajson_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'autosoftajson',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
