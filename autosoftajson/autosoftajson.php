<?php
function json_add_settings_page() {
    add_options_page( 'AutoSofta API', 'Add AutoSofta key', 'manage_options', 'autosofta-json-plugin', 'json_render_plugin_settings_page' );
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

<?php

function json_render_plugin_settings_page() {
    ?>
    <h2>Add api key for autosofta</h2>
    <form action="options.php" method="post">

        <?php 
        settings_fields( 'autosofta_json_plugin_options' );
        do_settings_sections( 'autosofta_json_plugin' ); ?>
        <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e( 'Save' ); ?>" />
    </form>
    <?php
}
// lets register settings
function autosofta_json_register_settings() {
    register_setting( 'autosofta_json_plugin_options', 'autosofta_json_plugin_options', 'autosofta_json_plugin_options_validate' );
    add_settings_section( 'api_settings', 'API Settings', 'autosofta_json_section_text', 'autosofta_json_plugin' );

    add_settings_field( 'autosofta_json_setting_api_key', 'API Key', 'autosofta_json_setting_api_key', 'autosofta_json_plugin', 'api_settings' );

}
// we call settings
add_action( 'admin_init', 'autosofta_json_register_settings' );

// we add settings fields
function autosofta_json_section_text() {
    echo '<p>Here you can set all the options for using the API</p>';
}

function autosofta_json_setting_api_key() {
    $options = get_option( 'autosofta_json_plugin_options' );
    echo "<input id='autosofta_json_setting_api_key' name='autosofta_json_plugin_options[api_key]' type='text' value='" . esc_attr( $options['api_key'] ) . "' />";
}

?>