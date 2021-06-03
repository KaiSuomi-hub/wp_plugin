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
	  ?>
	  
	  <?php
}
// lets register settings
function autosofta_json_register_settings() {
    register_setting( 'autosofta_json_plugin_options', 'autosofta_json_plugin_options', 'autosofta_json_plugin_options_validate' );
	// section for api
    add_settings_section( 'api_settings', 'API Settings', 'autosofta_json_section_text', 'autosofta_json_plugin' );
	// field for api
    add_settings_field( 'autosofta_json_setting_api_key', 'API Key', 'autosofta_json_setting_api_key', 'autosofta_json_plugin', 'api_settings' );

	// section for api
	add_settings_section( 'api_settings', 'Color', 'autosofta_json_section_text', 'autosofta_json_plugin' );
	// field for hover color
    add_settings_field( 'autosofta_json_setting_hover', '', 'autosofta_json_setting_hover', 'autosofta_json_plugin', 'api_settings' );

}

// we call settings
add_action( 'admin_init', 'autosofta_json_register_settings' );	




// we add section for api
function autosofta_json_section_text() {
    echo '<p>Here you can set all the options for using the API</p>';
}

// actual input field for api key
function autosofta_json_setting_api_key() {
    $options = get_option( 'autosofta_json_plugin_options' );
    echo "<input id='autosofta_json_setting_api_key' name='autosofta_json_plugin_options[api_key]' type='text' value='" . esc_attr( $options['api_key'] ) . "' /><br>";
}	
	
// actual input field for color key

function autosofta_json_setting_hover(){
	$options = get_option( 'autosofta_json_plugin_options' );
    echo "<h1>Select colors for cards</h1>hover<br></hover><input id='autosofta_json_setting_hover' name='autosofta_json_plugin_options[hover]' type='text' value='" . esc_attr( $options['hover'] ) . "' />";
}


/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://rusinapul.la
 * @since      1.0.0
 *
 * @package    Autosoftajson
 * @subpackage Autosoftajson/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Autosoftajson
 * @subpackage Autosoftajson/admin
 * @author     Antti Suomi <Antti@Rusinapul.la>
 */
class Autosoftajson_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Autosoftajson_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Autosoftajson_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/autosoftajson-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Autosoftajson_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Autosoftajson_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/autosoftajson-admin.js', array( 'jquery' ), $this->version, false );

	}

}