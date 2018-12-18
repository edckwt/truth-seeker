<?php 
include_once(OPICTS_PLUGIN_PATH.TSLIB.TSDS.'ts_pluginlifeciclye.php');
include_once(OPICTS_PLUGIN_PATH.TSLIB.TSDS.'ts_function.php');
$opicts_lang = fun_ts_loadlang();
 
include_once(OPICTS_PLUGIN_PATH.TSLIB.TSDS.'app_ts_helpers.php');
include_once(OPICTS_PLUGIN_PATH.TSLIB.TSDS.'html_ts_helper.php');
include_once(OPICTS_PLUGIN_PATH.TSLIB.TSDS.'app_ts_controlers.php');
include_once(OPICTS_PLUGIN_PATH.TSLIB.TSDS.'app_ts_models.php');

include_once(TSControlerspath.'main_ts_controller.php');
include_once(OPICTS_PLUGIN_PATH.TSDS.TSLIB.TSDS.'ts_main.php');
include_once(OPICTS_PLUGIN_PATH.TSLIB.TSDS.'app_ts_cronjob.php');
include_once(OPICTS_PLUGIN_PATH.TSLIB.TSDS.'opic_ts_cronjob.php');
include_once(OPICTS_PLUGIN_PATH.TSLIB.TSDS.'opic_ts_shortcode.php');
include_once(OPICTS_PLUGIN_PATH.TSLIB.TSDS.'opic_ts_admin_alert.php');
?>