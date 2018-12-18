<?php
/**
 *
 */
class TruthSeekerMaincontroller extends app_ts_controlers {

	function __construct() {
		parent::__construct();
		add_action('admin_menu', array($this, 'ts_admin_menu'));
	}

	function ts_admin_menu() {
		add_options_page('Islamic Content Archive For Truth Seeker', 'Islamic Content Archive For Truth Seeker', 'manage_options',OPICTS_Page_SLUG, array($this, 'trsettings_page'));
	}

	function trsettings_page() {
		if(isset($_GET['tab'])){
			$tab = strip_tags($_GET['tab']);
		}else{
			$tab = '';
		}
		switch ($tab) {
			case 'options':
				$this->loadController('options');
				break;
			case 'language':
				$this->loadController('language');
				break;
			case 'categories':
				echo $this->loadController('categories');
				break;
			default:
				$this->loadController('language');
				break;
		}
	}

}
new TruthSeekerMaincontroller();
?>