<?php 
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

    add_submenu_page(
        'dgios-customizer', //Name of the page where you wanna put it on
        __( 'Navigation Gallery', 'dgios-customizer' ), //Title
        __( 'Nav Gallery', 'dgios-customizer' ), //What will appear in the menu
        'manage_options', //User options
        'nav-gallery', //URL Slug. Keep something similar to menu slug for good practice
        'dgios_customizer_settings_page_markup' //Function for HTML build
      );
    
      add_submenu_page(
        'dgios-customizer',
        __( 'Deal of the Week', 'dgios-customizer' ),
        __( 'Deal of Week', 'dgios-customizer' ),
        'manage_options',
        'deal-of-the-week',
        'dgios_customizer_settings_page_markup'
      );
      add_submenu_page(
        'dgios-customizer',
        __( 'Deals', 'dgios-customizer' ),
        __( 'Deals', 'dgios-customizer' ),
        'manage_options',
        'deals',
        'dgios_customizer_settings_page_markup'
      );
      add_submenu_page(
        'dgios-customizer',
        __( 'Favorite Dishes', 'dgios-customizer' ),
        __( 'Fav Dishes', 'dgios-customizer' ),
        'manage_options',
        'fav-dishes',
        'dgios_customizer_settings_page_markup'
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
      <p><?php esc_html_e( 'Some content.', 'dgios-customizer' ); ?></p>
    </div>
    <?php
}

// Add a link to your settings page in your plugin
function dgios_add_settings_link( $links ) {
    $settings_link = '<a href="admin.php?page=dgios-customizer">' . __( 'Settings', 'dgios-customizer' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$filter_name = "plugin_action_links_" . plugin_basename( __FILE__ );
add_filter( $filter_name, 'dgios_add_settings_link' );

?>