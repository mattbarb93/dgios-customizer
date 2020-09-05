<?php

function dgios_customizer_settings() {

  // If plugin settings don't exist, then create them
  if( !get_option( 'dgios_customizer_settings' ) ) {
      add_option( 'dgios_customizer_settings' );
  }

  // Define (at least) one section for our fields
  add_settings_section(
    // Unique identifier for the section
    'dgios_customizer_settings_section',
    // Section Title
    __( 'DGios Settings Section', 'dgios_customizer' ),
    // Callback for an optional description
    'dgios_customizer_settings_section_callback',
    // Admin page to add section to
    'dgios_customizer'
  );

  add_settings_field(
    // Unique identifier for field
    'dgios_customizer_settings_custom_text',
    // Field Title
    __( 'Custom Text', 'dgios_customizer'),
    // Callback for field markup
    'dgios_customizer_settings_custom_text_callback',
    // Page to go on
    'dgios_customizer',
    // Section to go in
    'dgios_customizer_settings_section'
  );

  register_setting(
    'dgios_customizer_settings',
    'dgios_customizer_settings'
  );

}
add_action( 'admin_init', 'dgios_customizer_settings' );

function dgios_customizer_settings_section_callback() {

  esc_html_e( 'Plugin settings section description DGIOS', 'dgios_customizer' );

}

function dgios_customizer_settings_custom_text_callback() {

  $options = get_option( 'dgios_customizer_settings' );

	$custom_text = '';
	if( isset( $options[ 'custom_text' ] ) ) {
		$custom_text = esc_html( $options['custom_text'] );
	}

  echo '<input type="text" id="dgios_customizer_customtext" name="dgios_customizer_settings[custom_text]" value="' . $custom_text . '" />';

}
