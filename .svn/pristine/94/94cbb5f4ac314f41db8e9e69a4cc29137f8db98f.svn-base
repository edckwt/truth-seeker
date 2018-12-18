<?php

if (!function_exists('pr')) {
	function pr($data) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";

	}

}
	 
if (!function_exists('opicts_cat_logo')) {
	function opicts_cat_logo($slug, $attr = array('width'=>'80px')) {
		global $tscategories;
 
		$_attr = NULL;
		if (!empty($attr) && is_array($attr)) {
			foreach ($attr as $key => $value) {
				$_attr .= sprintf('%s="%s" ', $key, $value);
			}

		}
		 
		if (!empty($tscategories[$slug]['logo'])) {
			return sprintf('<img src="%s" %s />', TSLogourl . $tscategories[$slug]['logo'], $_attr);
		}
		return NULL;
	}

}

if (!function_exists('opicts_icon_logo')) {
	function opicts_icon_logo($slug, $attr = array('width'=>'80px')) {
		$_attr = NULL;
		if (!empty($attr) && is_array($attr)) {
			foreach ($attr as $key => $value) {
				$_attr .= sprintf('%s="%s" ', $key, $value);
			}

		}
	 
		
		if (file_exists(TSIconpath . $slug)) {
			return sprintf('<img src="%s" %s />', TSIconurl . $slug, $_attr);
		}
		return NULL;
	}

}

if (!function_exists('opic_cat_flags')) {
	function opic_cat_flags($slug, $attr = array('width'=>'30px')) {
		global $tscategories;
		$_attr = NULL;
		if (!empty($attr) && is_array($attr)) {
			foreach ($attr as $key => $value) {
				$_attr .= sprintf('%s="%s" ', $key, $value);
			}
		}
		if (file_exists(Flagspath . $slug)) {
			return sprintf('<img src="%s" %s />', Flagsurl . $slug, $_attr);
		}
		return NULL;
	}

}

if (!function_exists('set_value')) {
	function set_value($key) {
		if (!empty($_POST[$key])) {
			return $_POST[$key];
		} else {
			return get_option($key);
		}
	}

}

if (!function_exists('opic_get_data')) {
	function opic_get_data($url = NULL) {

		if ($url) {
			return @file_get_contents($url);
		}
		return;
	}

}

if (!function_exists('opic_set_transient')) {
	function opic_set_transient($slug, $data) {
		global $wpdb;
		if (is_array($data)) {
			$data = json_encode($data);
		}
		return $wpdb -> insert($wpdb -> prefix . TSDBTable, array('opic_key' => $slug, 'opic_value' => $data), array('%s', '%s'));
	}

}

if (!function_exists('opic_get_transient')) {
	function opic_get_transient($slug) {
		global $wpdb;
		$result = array();
		$tablename = $wpdb -> prefix . TSDBTable;
		$return = $wpdb -> get_row("SELECT * FROM `$tablename` WHERE `opic_key`='$slug'");
		if ($return) {
			$result['id'] = $return -> id;
			$result['opic_key'] = $return -> opic_key;
			$result['opic_value'] = json_decode($return -> opic_value);
			return $result;
		}
		return NULL;
	}

}
if (!function_exists('opic_do_transient')) {
	function opic_do_transient($slug, $data = NULL) {
		$old = opic_get_transient($slug);
		if (empty($old)) {
			opic_set_transient($slug, $data);
		}
		return opic_get_transient($slug);

	}

}

if (!function_exists('fun_ts_loadlang')) {

	function fun_ts_loadlang() {
		 $__lang = get_option(OPICTS_Input_SLUG . 'language');
		if ($__lang) {
			$def_lang = get_option(OPICTS_Input_SLUG . 'language') . '.php';
			$tspath = TSLangpath . $def_lang;
		 	
			if (file_exists($tspath)) {
				include_once $tspath;
				return $tslang;
			} else {
				echo sprintf("Lnaguage File <b>%s</b> not found in path <b>%s</b>", $def_lang, TSLangpath);
				exit();
			}
		}else{
			return array();
		}

	}

}
?>