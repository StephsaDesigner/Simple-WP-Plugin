<?php
/**
* Plugin Name: WordPress Version Number
* Plugin URI:
* Description: Allows you to store the version of WP your on
* Version: 1.0
* Author: Stephanie Spring
* Author URI:
* License
*/

add_action( 'admin_menu', 'wpvnum_add_admin_menu' );
add_action( 'admin_init', 'wpvnum_settings_init' );


function wpvnum_add_admin_menu(  ) {

	add_options_page( 'WordPress Version Number', 'WordPress Version Number', 'manage_options', 'wordpress_version_number', 'wordpress_version_number_options_page' );

}


function wpvnum_settings_init(  ) {

	register_setting( 'pluginPage', 'wpvnum_settings' );

	add_settings_section(
		'wpvnum_pluginPage_section',
		__( 'Your section description', 'wordpress' ),
		'wpvnum_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'wpvnum_text_field_0',
		__( 'Settings field description', 'wordpress' ),
		'wpvnum_text_field_0_render',
		'pluginPage',
		'wpvnum_pluginPage_section'
	);


}


function wpvnum_text_field_0_render(  ) {

	$options = get_option( 'wpvnum_settings' );
	?>
	<input type='text' name='wpvnum_settings[wpvnum_text_field_0]' value='<?php echo $options['wpvnum_text_field_0']; ?>'>
	<?php

}


function wpvnum_settings_section_callback(  ) {

	echo __( 'This section description', 'wordpress' );

}


function wpvnum_options_page(  ) {

	?>
	<form action='options.php' method='post'>

		<h2>WordPress Version Number</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

?>
