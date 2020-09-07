<?php

// Function for learning how to add options
function dgios_customizer_options() {

  // $options = [
  //   'First Name',
  //   'Second Option',
  //   'Third Option'
  // ];

  $options = [];
  $options['name']      = 'Zac Gordon';
  $options['location']  = 'Washington, D.C.';
  $options['sponsor']   = 'Plugin Co.';

  if( !get_option( 'dgios_customizer_option' ) ) {
      add_option( 'dgios_customizer_option', $options );
  }
  update_option( 'dgios_customizer_option', $options );
  // delete_option( 'dgios_customizer_option' );

}
add_action( 'admin_init', 'dgios_customizer_options' );



    