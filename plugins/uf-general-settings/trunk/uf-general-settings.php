<?php
/*
Plugin Name: UF Acceptable Use Policy
Version: 0.1
Plugin URI: http://www.webadmin.ufl.edu/
Description: Used to fulfill <a href="http://www.it.ufl.edu/policies/aupolicy.html">Acceptable Use Policy</a> for Web sites at the University of Florida. Requires the <code>uf-plugin-framework</code> plugin.
Author: Joey Spooner <spooner@ufl.edu>
Author URI: http://www.spoonstein.com/
*/

define('UF_GENERAL_SETTINGS_PLUGIN_BASE', dirname(__FILE__) . '/');

// Load the plugin after the framework
add_action('plugins_loaded', 'uf_general_settings_plugins_loaded');

$uf_general_settings_plugin = null;
function uf_general_settings_plugins_loaded() {
	global $uf_general_settings_plugin;

        require_once('models/class.UfGeneralSetting.php');

	$settings = array( 
	    'unit_represented'    => new UfGeneralSetting('Unit Represented', get_option('uf_general_setting_unit_represented')),
	    'email'    => new UfGeneralSetting('Email', get_option('uf_general_setting_email')),
	    'display_email'    => new UfGeneralSetting('Display email', get_option('uf_general_setting_display_email')),
	    'telephone'    => new UfGeneralSetting('Telephone', get_option('uf_general_setting_telephone')),
            'address'      => new UfGeneralSetting('Address', get_option('uf_general_setting_address')),
	);

	require_once('plugins/class.UfGeneralSettingsPlugin.php');

	$uf_general_settings_plugin = new UfGeneralSettingsPlugin('Acceptable Use Policy', __FILE__, $settings);

}

function uf_general_settings_unit_represented() {
	global $uf_general_settings_plugin;

	$unit_represented = $uf_general_settings_plugin->settings['unit_represented']->value;
	if($unit_represented) {
	     return $unit_represented;
	}
}

function uf_general_settings_email() {
	global $uf_general_settings_plugin;

	$email = $uf_general_settings_plugin->settings['email']->value;
	if($email) {
	     return $email;
	}
}

function uf_general_settings_telephone() {
	global $uf_general_settings_plugin;

	$telephone = $uf_general_settings_plugin->settings['telephone']->value;
	if($telephone) {
	     return $telephone;
	}
}

function uf_general_settings_address() {
	global $uf_general_settings_plugin;
  
	$address = $uf_general_settings_plugin->settings['address']->value;
	if($address) {
	     return $address;
	}
}
?>