<?php
require_once(UF_PLUGIN_FRAMEWORK_LIBRARY . '/class.UfOptionsPage.php');

if (! class_exists('UfAcceptableUsePolicyPage')) {
    class UfAcceptableUsePolicyPage extends UfOptionsPage {

        function display_body() {
	    $default_unit_represented = get_option('blogname');
            $default_telephone = '(352) 392-3261';
	    $default_address = 'Gainesville, FL 32611';
	    $default_email = get_option('admin_email');

	    $unit_represented = get_option('uf_acceptable_use_policy_unit_represented');
	    $telephone = get_option('uf_acceptable_use_policy_telephone');
	    $email = get_option('uf_acceptable_use_policy_email');
	    $address = get_option('uf_acceptable_use_policy_address');

?>
     <h3>General</h3>
     <form method="post" action="<?php echo htmlspecialchars(uf_plugin_framework_admin_uri()); ?>" enctype="multipart/form-data">
         <?php uf_plugin_framework_admin_form_fields('uf-acceptable-use-policy', 'update', "\t\t"); ?>
         <table class="form-table">
             <tr class="form-field">
	         <th scope="row" valign="top"><label for="unit_represented">Unit Or Group Represented</label></th>
                 <td><input type="text" name="unit_represented" id="unit_represented" value="<?php echo ($unit_represented ? htmlspecialchars($unit_represented) : $default_unit_represented); ?>" size="10" /></td>
             </tr>
         </table>

     <h3>Contact Information</h3>
         <table class="form-table">
             <tr class="form-field">
	         <th scope="row" valign="top"><label for="telephone">Telephone</label></th>
                 <td><input type="text" name="telephone" id="telephone" value="<?php echo ($telephone ? htmlspecialchars($telephone) : $default_telephone); ?>" size="10" /></td>
             </tr>
             <tr class="form-field">
	         <th scope="row" valign="top"><label for="address">Address</label></th>
                 <td><input type="text" name="address" id="address" value="<?php echo ($address ? htmlspecialchars($address) : $default_address); ?>" size="10" /></td>
             </tr>
             <tr class="form-field">
	         <th scope="row" valign="top"><label for="email">Email</label></th>
                 <td><input type="text" name="email" id="email" value="<?php echo ($email ? htmlspecialchars($email) : $default_email); ?>" size="10" /></td>
             </tr>
         </table>

         <?php $this->submit_button('Update Options'); ?>
     </form>
<?php
	}
    }
}

?>
