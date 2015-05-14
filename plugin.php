<?php
/**
* Plugin Name: Reaver Firmware Version
* Plugin URI:
* Description: Allows you to store the version of Reaver Firmware that you're on.
* Version: 1.0
* Author: Stephanie Spring
* Author URI:
* License: GPL12
*/

add_action( 'admin_menu', 'rfvs_add_admin_menu' );
add_action( 'admin_init', 'rfvs_settings_init' );


function rfvs_add_admin_menu(  ) {

	add_options_page( 'Reaver Firmware Version', 'Reaver Firmware Version', 'manage_options', 'reaver_firmware_version', 'rfvs_options_page' );

}


function rfvs_settings_init(  ) {

	register_setting( 'pluginPage', 'rfvs_settings' );

	add_settings_section(
		'rfvs_pluginPage_section',
		__( 'Store the version of Reaver Firmware that you\'re on. Enter your version number into the textbox bellow.', 'wordpress' ),
		'rfvs_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'rfvs_text_field_0',
		__( 'Enter version number: ', 'wordpress' ),
		'rfvs_text_field_0_render',
		'pluginPage',
		'rfvs_pluginPage_section'
	);


}


function rfvs_text_field_0_render(  ) {

	$options = get_option( 'rfvs_settings' );
	?>
	<input type='text' name='rfvs_settings[rfvs_text_field_0]' value='<?php echo $options['rfvs_text_field_0']; ?>'>
	<?php

}


function rfvs_settings_section_callback(  ) {

	echo __( 'This section description', 'wordpress' );

}


function rfvs_options_page(  ) {

	?>
	<form action='options.php' method='post'>

		<h2>Reaver Firmware Version</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

?>
