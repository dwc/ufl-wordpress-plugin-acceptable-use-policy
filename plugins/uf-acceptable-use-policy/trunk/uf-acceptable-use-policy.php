<?php
/*
Plugin Name: UF Acceptable Use Policy
Version: 0.1
Plugin URI: http://www.webadmin.ufl.edu/
Description: Used to fulfill <a href="http://www.it.ufl.edu/policies/aupolicy.html">Acceptable Use Policy</a> for Web sites at the University of Florida. Requires the <code>uf-plugin-framework</code> plugin.
Author: Joey Spooner <spooner@ufl.edu>
Author URI: http://www.spoonstein.com/
*/

define('UF_ACCEPTABLE_USE_POLICY_PLUGIN_BASE', dirname(__FILE__) . '/');

// Load the plugin after the framework
add_action('plugins_loaded', 'uf_acceptable_use_policy_plugins_loaded');

$uf_acceptable_use_policy_plugin = null;
function uf_acceptable_use_policy_plugins_loaded() {
	global $uf_acceptable_use_policy_plugin;

	require_once('plugins/class.UfAcceptableUsePolicyPlugin.php');
	$uf_acceptable_use_policy_plugin = new UfAcceptableUsePolicyPlugin('Acceptable Use Policy', __FILE__);
}

function uf_acceptable_use_policy_unit_represented() {
	$unit_represented = get_option('uf_acceptable_use_policy_unit_represented');
	if($unit_represented) {
	     return $unit_represented;
	}
}

function uf_acceptable_use_policy_email($protect = '') {
	$email = get_option('uf_acceptable_use_policy_email');
	if($email) {
             return $email;
	}
}

function uf_acceptable_use_policy_telephone() {
	$telephone = get_option('uf_acceptable_use_policy_telephone');
	if($telephone) {
	     return $telephone;
	}
}

function uf_acceptable_use_policy_address() {
	$address = get_option('uf_acceptable_use_policy_address');
	if($address) {
	     return $address;
	}
}
?>