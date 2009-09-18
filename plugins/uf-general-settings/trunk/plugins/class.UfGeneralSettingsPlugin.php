<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOption.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfBooleanOption.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOptionGroup.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOptionsPage.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfPlugin.php');
require_once(UF_GENERAL_SETTINGS_PLUGIN_BASE . '/models/class.UfGeneralSetting.php');

if (! class_exists('UfGeneralSettingsPlugin')) {
	class UfGeneralSettingsPlugin extends UfPlugin {
	        var $settings = array();

		function UfGeneralSettingsPlugin($name, $file, $settings) {
			$options = array(
				new UfOptionGroup('General', array(
				    new UfOption('uf_general_setting_unit_represented', get_option('blogname'), 'Unit or Group Represented'),
								   )),
			        new UfOptionGroup('Contact Information', array(
				    new UfOption('uf_general_setting_telephone', '(352) 392-3261', 'Telephone'),
				    new UfOption('uf_general_setting_address', 'Gainesville, FL 32611', 'Address'),
				    new UfOption('uf_general_setting_email', get_option('admin_email'), 'Email'),
			        )),
			);

			$this->add_admin_page(new UfOptionsPage($name, '', $options));

			$this->settings = $settings;

			$this->{get_parent_class(__CLASS__)}($name, $file);
		}


		function unit_represented() {
		        return $settings->unit_represented;
		}

		function email() {
		        return $settings->email;
		}

		function address() {
		        return $settings->address;
		}

		function telephone() {
		        return $settings->telephone;
		}
	}
}
?>
