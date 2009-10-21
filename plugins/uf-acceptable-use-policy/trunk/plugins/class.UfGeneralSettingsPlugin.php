<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfPlugin.php');
require_once(UF_GENERAL_SETTINGS_PLUGIN_BASE . '/views/class.UfGeneralSettingsPage.php');
require_once(UF_GENERAL_SETTINGS_PLUGIN_BASE . '/controllers/class.UfGeneralSettingsController.php');

if (! class_exists('UfGeneralSettingsPlugin')) {
    class UfGeneralSettingsPlugin extends UfPlugin {

        function UfGeneralSettingsPlugin($name, $file) {

	    $this->add_admin_page(new UfGeneralSettingsPage($name));
	    $this->{get_parent_class(__CLASS__)}($name, $file);
	}

	function add_plugin_hooks() {
	    parent::add_plugin_hooks();

	    $controller = new UfGeneralSettingsController();
	    $this->register_action($controller, 'update');
	}
    }
}
?>
