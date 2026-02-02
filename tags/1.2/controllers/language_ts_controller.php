<?php
/**
 * 
 */
class language_ts_controller extends app_ts_controlers {
	
	function __construct() {
		parent::__construct();
		$this->loadView('language');
	}
}

?>