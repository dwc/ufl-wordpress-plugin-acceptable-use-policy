<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOption.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOptionGroup.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOptionsPage.php');
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfPlugin.php');
require_once(UF_GENERAL_SETTINGS_PLUGIN_BASE . '/controllers/class.UfGeneralSettingsController.php');
require_once(UF_GENERAL_SETTINGS_PLUGIN_BASE . '/models/class.UfGeneralSetting.php');


if (! class_exists('UfGeneralSettingsPlugin')) {
	class UfGeneralSettingsPlugin extends UfPlugin {
	        var $settings = array();

		function UfGeneralSettingsPlugin($name, $file, $settings) {
			$options = array(
				new UfOptionGroup('General', array(
				    new UfOption('uf_general_setting_telephone', '(352) 392-3261', 'Telephone'),
				    new UfOption('uf_general_setting_address', 'Gainesville, FL 32611', 'Address'),
				)),
			);
			$this->add_admin_page(new UfOptionsPage($name, '', $options));

			$this->settings = $settings;

			$this->{get_parent_class(__CLASS__)}($name, $file);
		}

		function telephone() { echo("I'm being called");
		        return $settings->telephone;
		}

		function address() {
		        return $settings->address;
		}

	}
}
?>
