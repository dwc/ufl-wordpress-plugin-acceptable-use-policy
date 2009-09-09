<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfController.php');


if (! class_exists('UfGeneralSettingsController')) {
	class UfGeneralSettingsController extends UfController {
	        var $settings = array();

		function UfGeneralSettingsController($settings) {
		        $this->settings = $settings;

			$this->{get_parent_class(__CLASS__)}();
		}

	}
}
?>
