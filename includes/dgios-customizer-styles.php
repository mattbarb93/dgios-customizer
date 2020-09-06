<?php

// Load CSS on all admin pages
function dgios_customizer_admin_styles( $hook ) {

  wp_enqueue_style(
    'dgios-customizer-admin',
    WPPLUGIN_URL . 'templates/admin/css/dgios-customizer-admin-style.css',
    [],
    time()
  );

  if( 'toplevel_page_dgios-customizer' == $hook ) {
    wp_enqueue_style( 'dgios-customizer-admin-admin' );
  }

}
add_action( 'admin_enqueue_scripts', 'dgios_customizer_admin_styles' );


// Load CSS on the frontend
function dgios_customizer_frontend_styles() {

  wp_enqueue_style(
    'dgios-customizer-frontend',
    WPPLUGIN_URL . 'templates/frontend/css/dgios-customizer-front-end-style.css',
    [],
    time()
  );
}
add_action( 'wp_enqueue_scripts', 'dgios_customizer_frontend_styles', 100 );