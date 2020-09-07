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
    __( 'Main Page Message', 'dgios_customizer' ),
    // Callback for an optional description
    'dgios_customizer_settings_section_callback',
    // Admin page to add section to
    'dgios_customizer'
  );

  add_settings_field(
    // Unique identifier for field
    'dgios_customizer_settings_custom_text',
    // Field Title
    __( 'Message', 'dgios_customizer'),
    // Callback for field markup
    'dgios_customizer_settings_custom_text_callback',
    // Page to go on
    'dgios_customizer',
    // Section to go in
    'dgios_customizer_settings_section'
  );

  add_settings_section(
    // Unique identifier for the section
    'nav_gallery_settings_section',
    // Section Title
    __( 'Navigation Gallery', 'dgios_customizer' ),
    // Callback for an optional description
    'navigation_gallery_section_callback',
    // Admin page to add section to
    'dgios_customizer'
  );

  add_settings_field(
    // Unique identifier for field
    'dgios_customizer_settings_custom_text',
    // Field Title
    __( 'Image Upload', 'dgios_customizer'),
    // Callback for field markup
    'navigation_gallery_media_upload',
    // Page to go on
    'dgios_customizer',
    // Section to go in
    'nav_gallery_settings_section'
  );


  register_setting(
    'dgios_customizer_settings',
    'dgios_customizer_settings'
  );

}
add_action( 'admin_init', 'dgios_customizer_settings' );

function dgios_customizer_settings_section_callback() {

  esc_html_e( 'Please write the message that will be displayed on the main page', 'dgios_customizer' );

}

function navigation_gallery_section_callback() {

  esc_html_e( 'Please select the three photos that will be displayed onto the navigation bar' );

}

function dgios_customizer_settings_custom_text_callback() {

  $options = get_option( 'dgios_customizer_settings' );

	$custom_text = '';
	if( isset( $options[ 'custom_text' ] ) ) {
		$custom_text = esc_html( $options['custom_text'] );
	}

  echo '<input type="text" id="dgios_customizer_customtext" name="dgios_customizer_settings[custom_text]" value="' . $custom_text . '" />';

}

function navigation_gallery_media_upload() {

  $options = get_option( 'dgios_customizer_settings' );

	$custom_text = '';
	if( isset( $options[ 'custom_text' ] ) ) {
		$custom_text = esc_html( $options['custom_text'] );
	}

  echo '<form  method="post" enctype="multipart/form-data">
  <input type="file" id="test_upload_pdf" name="test_upload_pdf"></input>
  <?php submit_button("Upload") ?>
</form>';

}

add_action('admin_menu', 'test_plugin_setup_menu');
 
function test_plugin_setup_menu(){
    add_menu_page( 'Test Plugin Page', 'Test Plugin', 'manage_options', 'test-plugin', 'test_init' );
}
 
function test_init(){
    test_handle_post();
?>
    <h1>Hello World!</h1>
    <h2>Upload a File</h2>
    <!-- Form to handle the upload - The enctype value here is very important -->
    <form  method="post" enctype="multipart/form-data">
        <input type='file' id='test_upload_pdf' name='test_upload_pdf'></input>
        <?php submit_button('Upload') ?>
    </form>
<?php
}
 
function test_handle_post(){
    // First check if the file appears on the _FILES array
    if(isset($_FILES['test_upload_pdf'])){
        $pdf = $_FILES['test_upload_pdf'];
 
        // Use the wordpress function to upload
        // test_upload_pdf corresponds to the position in the $_FILES array
        // 0 means the content is not associated with any other posts
        $uploaded=media_handle_upload('test_upload_pdf', 0);
        // Error checking using WP functions
        if(is_wp_error($uploaded)){
            echo "Error uploading file: " . $uploaded->get_error_message();
        }else{
            echo "File upload successful!";
        }
    }
}

