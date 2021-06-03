<?php
function json_add_settings_page() {
    add_options_page( 'AutoSofta API', 'Edit AutoSofta values', 'manage_options', 'autosofta-json-plugin', 'json_render_plugin_settings_page' );
}
add_action( 'admin_menu', 'json_add_settings_page' );
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://rusinapul.la
 * @since             1.0.0
 * @package           Autosoftajson
 *
 * @wordpress-plugin
 * Plugin Name:       AutoSoftaJson
 * Plugin URI:        http://Veppi.Fi
 * Description:       Inserts a WordPress option for autosofta api key.
 * Version:           1.0.0
 * Author:            Antti Suomi
 * Author URI:        http://rusinapul.la
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       autosoftajson
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AUTOSOFTAJSON_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-autosoftajson-activator.php
 */
function activate_autosoftajson() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-autosoftajson-activator.php';
	Autosoftajson_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-autosoftajson-deactivator.php
 */
function deactivate_autosoftajson() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-autosoftajson-deactivator.php';
	Autosoftajson_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_autosoftajson' );
register_deactivation_hook( __FILE__, 'deactivate_autosoftajson' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-autosoftajson.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_autosoftajson() {

	$plugin = new Autosoftajson();
	$plugin->run();

}
run_autosoftajson();
?>