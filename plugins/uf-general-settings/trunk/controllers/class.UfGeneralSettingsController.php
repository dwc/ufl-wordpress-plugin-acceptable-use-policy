<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfController.php');

if (! class_exists('UfGeneralSettingsController')) {
    class UfGeneralSettingsController extends UfController {

        function handle_update_action() {
	    $unit_represented = trim($_POST['unit_represented']);
	    $telephone = trim($_POST['telephone']);
	    $address = trim($_POST['address']);
	    $email = trim($_POST['email']);

	    $error = null;
	    if($telephone and $unit_represented and $address and $email) {
	        update_option('uf_general_setting_unit_represented', $unit_represented);
	        update_option('uf_general_setting_telephone', $telephone);
	        update_option('uf_general_setting_address', $address);
		update_option('uf_general_setting_email', $email);
	    }
	    else {
	        $error = 'Missing form fields. All fields are required.';
		exit($error);
	    }
		    
	    $this->redirect(wp_get_referer(), array('error' => $error));
	}
    }
}
?>
