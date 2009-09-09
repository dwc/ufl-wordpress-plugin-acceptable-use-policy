<?php
if (! class_exists('UfGeneralSetting')) {
	class UfGeneralSetting {
	        var $name;
		var $value;

		function UfGeneralSetting($name, $value) {
 		        $this->name = $name;
			$this->value = $value;
		}

	}
}
?>
