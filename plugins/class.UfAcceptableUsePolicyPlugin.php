<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfPlugin.php');
require_once(UF_ACCEPTABLE_USE_POLICY_PLUGIN_BASE . '/views/class.UfAcceptableUsePolicyPage.php');
require_once(UF_ACCEPTABLE_USE_POLICY_PLUGIN_BASE . '/controllers/class.UfAcceptableUsePolicyController.php');

if (! class_exists('UfAcceptableUsePolicyPlugin')) {
    class UfAcceptableUsePolicyPlugin extends UfPlugin {

        function UfAcceptableUsePolicyPlugin($name, $file) {

	    $this->add_admin_page(new UfAcceptableUsePolicyPage($name));
	    $this->{get_parent_class(__CLASS__)}($name, $file);
	}

	function add_plugin_hooks() {
	    parent::add_plugin_hooks();

	    $controller = new UfAcceptableUsePolicyController();
	    $this->register_action($controller, 'update');
	}
    }
}
?>
