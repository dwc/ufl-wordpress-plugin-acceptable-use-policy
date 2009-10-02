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

	require_once('plugins/class.UfGeneralSettingsPlugin.php');
	$uf_general_settings_plugin = new UfGeneralSettingsPlugin('Acceptable Use Policy', __FILE__);
}

function uf_general_settings_unit_represented() {
	global $uf_general_settings_plugin;

	$unit_represented = get_option('uf_general_setting_unit_represented');
	if($unit_represented) {
	     return $unit_represented;
	}
}

function uf_general_settings_email($protect = '') {
	global $uf_general_settings_plugin;

	$email = get_option('uf_general_setting_email');
	if($email) {
	    if($protect == 'protect') {
	        $email = antispambot($email);
	    }
	    return $email;
	}
}

function uf_general_settings_telephone() {
	global $uf_general_settings_plugin;

	$telephone = get_option('uf_general_setting_telephone');
	if($telephone) {
	     return $telephone;
	}
}

function uf_general_settings_address() {
	global $uf_general_settings_plugin;
  
	$address = get_option('uf_general_setting_address');
	if($address) {
	     return $address;
	}
}
?>