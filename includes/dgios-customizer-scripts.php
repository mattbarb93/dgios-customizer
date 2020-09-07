<?php

// Load JS on all admin pages
function dgios_customizer_admin_scripts() {

  wp_enqueue_script(
    'dgios-customizer-admin',
    WPPLUGIN_URL . 'template/admin/js/dgios-customizer-admin.js',
    ['jquery'],
    time()
  );

}
add_action( 'admin_enqueue_scripts', 'dgios_customizer_admin_scripts' );


// Load JS on the frontend
function dgios_customizer_frontend_scripts() {

  wp_enqueue_script(
    'dgios-customizer-frontend',
    WPPLUGIN_URL . 'frontend/js/dgios-customizer-front-end.js',
    [],
    time()
  );
}
add_action( 'wp_enqueue_scripts', 'dgios_customizer_frontend_scripts', 100 );


function media_uploader_enqueue() {
    	wp_enqueue_media();
    	wp_register_script('media-uploader', plugins_url('../templates/admin/js/dgios-customizer-admin.js' , __FILE__ ), array('jquery'));
    	wp_enqueue_script('media-uploader');
    }
    add_action('admin_enqueue_scripts', 'media_uploader_enqueue');
