<?php
/*
 * @link              http://wpthemespace.com
 * @since             1.0.0
 * @package           haslider slider
 *
 * @wordpress-plugin
 * Plugin Name:       Home animation slider
 * Plugin URI:        http://wpthemespace.com
 * Description:       A simple slider plugin.You can create lots of slider and simple slider by this plugin.
 * Version:           1.0.0
 * Author:            Noor alam
 * Author URI:        https://profiles.wordpress.org/nalam-1
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       haslider
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HOME_ANISLIDER_SLIDER_DIR', plugin_dir_path( __FILE__ ) );
define( 'HOME_ANISLIDER_URL', plugin_dir_url( __FILE__ ) );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
 if ( is_admin() ) {
     // We are in admin mode
require_once( HOME_ANISLIDER_SLIDER_DIR .'admin/haslider-slider-post.php' );
require_once( HOME_ANISLIDER_SLIDER_DIR .'admin/haslider-slider-admin-role.php' );
require_once( HOME_ANISLIDER_SLIDER_DIR .'admin/haslider-slider-column-set.php' );
require_once( HOME_ANISLIDER_SLIDER_DIR .'admin/haslider-slider-update-massage.php' );

require_once (HOME_ANISLIDER_SLIDER_DIR . 'admin/src/cmb2/init.php');
require_once (HOME_ANISLIDER_SLIDER_DIR . 'admin/src/cmb2-tabs/cmb2-tabs.php');
require_once (HOME_ANISLIDER_SLIDER_DIR . 'admin/src/cmb-field-select2/cmb-field-select2.php');
require_once (HOME_ANISLIDER_SLIDER_DIR . 'admin/src/cmb2-slider/slider-field.php');
require_once (HOME_ANISLIDER_SLIDER_DIR .'admin/haslider-slider-meta-tab.php' );

}

require_once( HOME_ANISLIDER_SLIDER_DIR .'includes/haslider-slider-shortcode.php' );

	/**
	 * Load the plugin all style and script.
	 *
	 * @since    1.0.0
	 */

 if ( ! function_exists( 'haslider_slider_slider_style_script' ) ) :
function haslider_slider_slider_style_script() {
wp_enqueue_style( 'animate', plugins_url( '/assets/css/animate.css', __FILE__ ), array(), '1.0', 'all');
wp_enqueue_style( 'bootstrap.min', plugins_url( '/assets/css/bootstrap.min.css', __FILE__ ), array(), '1.0', 'all');
wp_enqueue_style( 'font-awesome.min', plugins_url( '/assets/css/font-awesome.min.css', __FILE__ ), array(), '1.0', 'all');
wp_enqueue_style( 'haslider-slider', plugins_url( '/assets/css/slider.css', __FILE__ ), array(), '1.0', 'all');


wp_enqueue_script( 'bootstrap.min', plugins_url( '/assets/js/bootstrap.min.js', __FILE__ ), array( 'jquery' ), '1.0', true);
wp_enqueue_script( 'haslider-main', plugins_url( '/assets/js/main.js', __FILE__ ), array( 'jquery' ), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'haslider_slider_slider_style_script' );
endif;


/**
 * haslider slider activation hook.
 *
 */ 
 if ( ! function_exists( 'haslider_slider_slider_activation_setup' ) ) :
function haslider_slider_slider_activation_setup() {
    // Trigger our function that registers the custom post type
    haslider_slider_slider_post_type();
 
    // Clear the permalinks after the post type has been registered
    flush_rewrite_rules();
    // Add new administrator role
	haslider_slider_slider_admin_role();
}
register_activation_hook( __FILE__, 'haslider_slider_slider_activation_setup' ); 
endif; 
/**
 * haslider slider deactivation hook.
 *
 */ 
 if ( ! function_exists( 'haslider_slider_slider_deactivation_setup' ) ) :
function haslider_slider_slider_deactivation_setup() {
 
    // Clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
	
	// gets the administrator role remove
	haslider_slider_slider_admin_role_remove();
 
}
register_deactivation_hook( __FILE__, 'haslider_slider_slider_deactivation_setup' );
endif;

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
if ( ! function_exists( 'haslider_slider_textdomain' ) ) :
	function haslider_slider_textdomain() {

		load_plugin_textdomain(
			'haslider',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages'
		);

	}
add_action( 'plugins_loaded', 'haslider_slider_textdomain' );
endif;

function haslider_slider_img_size(){
//new image size added
add_image_size( 'slider-bg', 1900, 800, true );
add_image_size( 'slider-img1', 420, 650, true );
add_image_size( 'slider-img2', 320, 640, true );
}
add_action( 'plugins_loaded', 'haslider_slider_img_size' );
