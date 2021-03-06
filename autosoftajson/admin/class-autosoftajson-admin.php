<?php

function json_render_plugin_settings_page() {
    ?>
    <h2>Add api key for autosofta</h2>
    <form action="options.php" method="post">

        <?php 
        settings_fields('autosofta_json_plugin_options');
        do_settings_sections( 'autosofta_json_plugin' ); ?>
        <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e( 'Save' ); ?>" />
    </form>
    <?php
	  ?>
	  
	  <?php
}
// Let's create a sanitizing call back for options before registering them
function autosofta_json_plugin_clean($option){
	$clean = sanitize_key($option);
	// all to uppercase as API key needs to be in that format.
	// hex color values don't need to be in that format
	$option = strtoupper($clean) ;
 	return $option;
}

// // let's do an array of color options
// $color = array(
// 	'autosofta_json_color_hover', 
// 	'autosofta_json_color_button',
// 	'autosofta_json_color_para',
// 	'autosofta_json_color_bg'
// );

/* wcp is used for wp-color-picker */

function wcp_theme_scripts() { 
	wp_enqueue_style( 'wp-color-picker');
	wp_enqueue_script( 'wp-color-picker');

}


add_action( 'admin_enqueue_scripts', 'wcp_theme_scripts' );

add_action( 'admin_footer', 'wcp_custom_script' ); // Write our JS below here

function wcp_custom_script() { ?>
	<script type="text/javascript" >
	jQuery(document).ready(function() {
		jQuery('#autosofta_json_color_hover').wpColorPicker(); //ehhh, foreach wasn't reliable...
	});
	jQuery(document).ready(function() {
		jQuery('#autosofta_json_color_button').wpColorPicker();
	});
	jQuery(document).ready(function() {
		jQuery('#autosofta_json_color_para').wpColorPicker();
	});
	jQuery(document).ready(function() {
		jQuery('#autosofta_json_color_bg').wpColorPicker();
	});
	</script> 
	<?php
}

// lets register settings for api
function autosofta_json_register_settings() {
    register_setting( 
	'autosofta_json_plugin_options', //here we have the group, change dropped autosofta_json... from allowed plugins list
	'autosofta_json_plugin_options', //this line goes to input field name and mysql row name
	'autosofta_json_plugin_clean' //but whats this?, let's see if we can use this to validate?
	);
	// section for api
    add_settings_section( 'api_settings', 'API Settings', 'autosofta_json_section_text', 'autosofta_json_plugin' );
	// field for api key
    
	add_settings_field( 'autosofta_json_setting_api_key', 'API Key', 'autosofta_json_setting_api_key', 'autosofta_json_plugin', 'api_settings' );   
// hover
register_setting( 
	'autosofta_json_plugin_options', //here we have the group, change dropped autosofta_json... from allowed plugins list
	'autosofta_json_color_hover', //this line goes to input field name and mysql row name
								 //in future, do foreach here from an array
	'autosofta_json_plugin_clean' //but whats this?, let's see if we can use this to validate?
);
// button
register_setting( 
	'autosofta_json_plugin_options', //here we have the group, change dropped autosofta_json... from allowed plugins list
	'autosofta_json_color_button', //this line goes to input field name and mysql row name
	'autosofta_json_plugin_clean' //but whats this?, let's see if we can use this to validate?
);
// paragraph
register_setting( 
	'autosofta_json_plugin_options', //here we have the group, change dropped autosofta_json... from allowed plugins list
	'autosofta_json_color_para', //this line goes to input field name and mysql row name
	'autosofta_json_plugin_clean' //but whats this?, let's see if we can use this to validate?
);
//background 
register_setting( 
	'autosofta_json_plugin_options', //here we have the group, change dropped autosofta_json... from allowed plugins list
	'autosofta_json_color_bg', //this line goes to input field name and mysql row name
	'autosofta_json_plugin_clean' //but whats this?, let's see if we can use this to validate?
);
// mileage and year
register_setting( 
	'autosofta_json_plugin_options', //here we have the group, change dropped autosofta_json... from allowed plugins list
	'autosofta_json_options_mileage', //this line goes to input field name and mysql row name
	'autosofta_json_plugin_clean' //but whats this?, let's see if we can use this to validate?
);
	// field for hover color
    add_settings_field( 'autosofta_json_setting_hover', '', 'autosofta_json_setting_hover', 'autosofta_json_plugin', 'api_settings' );
	// field for button color
    add_settings_field( 'autosofta_json_setting_button', '', 'autosofta_json_setting_button', 'autosofta_json_plugin', 'api_settings' );
	// field for  paragraph color
    add_settings_field( 'autosofta_json_setting_para', '', 'autosofta_json_setting_para', 'autosofta_json_plugin', 'api_settings' );
	// field for background color
    add_settings_field( 'autosofta_json_setting_bg', '', 'autosofta_json_setting_bg', 'autosofta_json_plugin', 'api_settings' );

	// section for mileage and year
	// field for hover color
    add_settings_field( 'autosofta_json_setting_mileage', '', 'autosofta_json_setting_mileage', 'autosofta_json_plugin', 'api_settings' );
}



	


// we call settings
add_action( 'admin_init', 'autosofta_json_register_settings');	




// we add section for api
function autosofta_json_section_text() {
    echo '<p>Here you can set all the options for using the API</p>';
}

// actual input field for api key
function autosofta_json_setting_api_key() {
    $options = get_option( 'autosofta_json_plugin_options' );
    //notice the difference to below. we pass along a normal string below, instead of an array
    echo "<input id='autosofta_json_setting_api_key' name='autosofta_json_plugin_options' type='text' value='" . esc_attr( $options ) . "' /><br>";

}	



// actual input field for hover color 

function autosofta_json_setting_hover(){
// 						VVV in future do a foreach here VVV
	$options = get_option( 'autosofta_json_color_hover' );
    echo "<h4>Select colors for cards and single car.</h4>
	<h4>Use RGB-hex values, i.e. ffffff</h4>
	Hover<br>
	<div style='border-style: solid; width:30px; height: 30px; border-radius:50%; background-color:#" . esc_attr( $options ) . ";'></div> 
	<input id='autosofta_json_color_hover' name='autosofta_json_color_hover' type='text' value='" . esc_attr( $options ) . "' />";
									// 							/\ in future do a foreach here /\
}

// actual input field for button color
function autosofta_json_setting_button(){
	$options = get_option( 'autosofta_json_color_button' );
    echo "Button<br>
	<div style='border-style: solid; width:30px; height: 30px; border-radius:50%; background-color:#" . esc_attr( $options ) . ";'></div> 
	<input id='autosofta_json_color_button' name='autosofta_json_color_button' type='text' value='" . esc_attr( $options ) . "' />";
}

// actual input field for paragraph color 

function autosofta_json_setting_para(){
	$options = get_option( 'autosofta_json_color_para' );
    echo "Paragraph<br>
	<div style='border-style: solid; width:30px; height: 30px; border-radius:50%; background-color:#" . esc_attr( $options ) . ";'></div> 
	<input id='autosofta_json_color_para' name='autosofta_json_color_para' type='text' value='" . esc_attr( $options ) . "' />";
}
// actual input field for background  color 

function autosofta_json_setting_bg(){
	$options = get_option( 'autosofta_json_color_bg' );
    echo "Background<br>
	<div style='border-style: solid; width:30px; height: 30px; border-radius:50%; background-color:#" . esc_attr( $options ) . ";'></div> 
	<input id='autosofta_json_color_bg' name='autosofta_json_color_bg' type='text' value='" . esc_attr( $options ) . "' />";
}


// do we show mileage?

function autosofta_json_setting_mileage(){
	$options = get_option( 'autosofta_json_options_mileage' );
	$mileage = esc_attr( $options);
    echo "Will mileage and year be shown?<br>
	<input id='autosofta_json_setting_mileage' name='autosofta_json_options_mileage' type='checkbox' "; 
	if ($mileage == '1') echo "checked='checked'";
	echo " value='1' />";
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