<?php
/**
 * App Models 
 */
class app_ts_models {
	var $wpdb;
	function __construct() {
		global $wpdb;
		$this->wpdb = $wpdb;
		
	}	
	
	public function getCategoryBySlug()
	{
		global $opic_ts_categories_lang;
		$return = array();
		$table = $this->wpdb->prefix.'options';
		$like = OPICTS_Input_SLUG."category_".get_option(OPICTS_Input_SLUG.'language').'_';
		 
		$data = $this->wpdb->get_results("SELECT * FROM $table WHERE `option_name` LIKE '%$like%'");	
		 
		if(!empty($data) && is_array($data)){
			foreach ($data as $key => $value) {
				$return[$key]['option_id'] = $value->option_id;
				$return[$key]['option_name'] = $value->option_name;
				$return[$key]['option_slug'] = str_replace($like,'',$value->option_name);
				$return[$key]['option_url'] = $opic_ts_categories_lang[get_option(OPICTS_Input_SLUG.'language')][$return[$key]['option_slug']]['importurl'];
				$return[$key]['option_value'] = unserialize($value->option_value);
				$return[$key]['import_url'] = array();
				if(is_array($return[$key]['option_value'])){
					foreach ($return[$key]['option_value'] as $value) {
						$return[$key]['import_url'][] = $return[$key]['option_url'].$value;
					}	
				}
			}
		}
		return $return;
		
	}
}
?>