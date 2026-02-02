<?php
/*
Plugin Name: Islamic Content Archive For Truth Seeker
Plugin URI: https://www.truth-seeker.info
Description: Truth Seeker aspires to be a unique and reliable refuge regarding the truth of the creation, the Creator Allah and His existence, and the purpose of life.
Version: 1.3.6
Author: EDC Team (E-Da`wah Committee)
Author URI: https://www.islam.com.kw
License: GPLv2 or later
*/

define('OPICTS_PLUGIN_PATH',plugin_dir_path( __FILE__ ));
define('OPICTS_PLUGIN_URL',plugin_dir_url( __FILE__ ));
define('OPICTS_Page_SLUG','islamic_content_archive_for_truth_seeker');
define('OPICTS_Input_SLUG','opicts_');
define('TSLIB','lib');
define('TSDS','/');
define('TSCONTROLLERS','controllers');
define('TSMODELS','models');
define('TSDBTable', 'opicts_categories');
define('TSBootstrappath',OPICTS_PLUGIN_PATH.'style'.TSDS);
define('TSLogourl',OPICTS_PLUGIN_URL.'style'.TSDS.'images'.TSDS.'logo'.TSDS);
define('TSIconpath',OPICTS_PLUGIN_PATH.'style'.TSDS.'images'.TSDS.'icons'.TSDS);
define('TSIconurl',OPICTS_PLUGIN_URL.'style'.TSDS.'images'.TSDS.'icons'.TSDS);
define('TSFlagspath',OPICTS_PLUGIN_PATH.'style'.TSDS.'images'.TSDS.'flags'.TSDS);
define('TSFlagsurl',OPICTS_PLUGIN_URL.'style'.TSDS.'images'.TSDS.'flags'.TSDS);

define('TSControlerspath',OPICTS_PLUGIN_PATH.'controllers'.TSDS);
define('TSModelspath',OPICTS_PLUGIN_PATH.'models'.TSDS);
define('TSViewspath',OPICTS_PLUGIN_PATH.'views'.TSDS);
define('TSLayoutpath',OPICTS_PLUGIN_PATH.'views'.TSDS.'layout'.TSDS);
define('TSLangpath',OPICTS_PLUGIN_PATH.'views'.TSDS.'lang'.TSDS);

function OPICTS_plugin_install(){

	$default_lang = 'eng';
	$source = 'Soucre Link';
	add_option(OPICTS_Input_SLUG.'language', $default_lang);
	add_option(OPICTS_Input_SLUG.'source', $source);
	add_option(OPICTS_Input_SLUG.'cronjobtime', 'everyhour');
	add_option(OPICTS_Input_SLUG.'version', '1.1');

}
function OPICTS_plugin_uninstall(){

	$options = get_option(OPICTS_Input_SLUG.'language');
 	if( is_array($options) && $options['uninstall'] === true){
		delete_option(OPICTS_Input_SLUG.'language');
		delete_option(OPICTS_Input_SLUG.'source');
		delete_option(OPICTS_Input_SLUG.'cronjobtime');
		delete_option(OPICTS_Input_SLUG.'version');
	}
}
register_activation_hook(plugin_basename(__FILE__),'OPICTS_plugin_install');
register_deactivation_hook(plugin_basename(__FILE__), 'OPICTS_plugin_uninstall');

include_once(OPICTS_PLUGIN_PATH.'load.php');
?>
