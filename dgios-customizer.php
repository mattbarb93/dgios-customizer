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

function dgios_customizer()
{
    add_menu_page(
        'DGios Customizer',                      //Name of the page
        'DGios Customizer',                      //What you wanna appear in the menu (on the side)
        'manage_options',                   //User capability functions
        'dgios-customizer',                         //URL slug. Pick something small
        'dgios_customizer_settings_page_markup',    //Adds the content to the page through a function you declare below. You cannot have two plugins share the same name.
        'dashicons-chart-pie',          //Icon you'll use. Recomended Dashicons, since they're built into Wordpress and easy to use.
        100                                 //Priority Order. Where will it display on the menu? All the way to the top? Bottom? The higher the number, the lower the button will be
    );

}
add_action( 'admin_menu', 'dgios_customizer' ); //Gets called whenever the admin menu is built. 


function dgios_customizer_settings_page_markup()
{
    // Double check user capabilities. If they arent logged in, page wont load. Used for security
    if ( !current_user_can('manage_options') ) {
      return;
    }
    ?>

    <!-- Write whatever HTML you need -->
    <div class="wrap"> 
      <h1><?php esc_html_e( get_admin_page_title() ); ?></h1> <!--get admin page title function gets the Name of the page-->
      <p><?php esc_html_e( 'Some content.', 'wpplugin' ); ?></p>
    </div>
    <?php
}

?>
