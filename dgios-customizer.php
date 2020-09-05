<?php
/**
 * Plugin Name:       DGios Customizer
 * Plugin URI:        https://github.com/mattbarb93/dgios-customizer
 * Description:       Testing a new plugin
 * Version:           1.0
 * Author:            Matheus Barbosa
 * Author URI:        github.com/mattbarb93
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       dgios-customizer
 * Domain Path:       /languages
 */

 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'WPPLUGIN_URL', plugin_dir_url( __FILE__ ) );

define( 'WPPLUGIN_DIR', plugin_dir_path( __FILE__ ) );


include( plugin_dir_path( __FILE__ ) . 'includes/dgios-customizer-styles.php');

include( plugin_dir_path( __FILE__ ) . 'includes/dgios-customizer-scripts.php');

include( plugin_dir_path( __FILE__ ) . 'includes/dgios-customizer-menus.php');

include( plugin_dir_path( __FILE__ ) . 'includes/dgios-customizer-options.php');





?>
