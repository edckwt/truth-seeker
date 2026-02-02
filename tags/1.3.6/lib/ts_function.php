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

if (!function_exists('opicts_cat_flags')) {
	function opicts_cat_flags($slug, $attr = array('width'=>'30px')) {
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

if (!function_exists('opic_ts_get_data')) {
	function opic_ts_get_data($url = NULL) {

		$response = wp_remote_get($url,[ 'timeout' => 5000, 'httpversion' => '1.1','sslverify' => false]);
		if ( is_array( $response ) && ! is_wp_error( $response ) && !empty($response['body']) ) {
			return json_decode($response['body']);
		}
		return;
	}
}

if (!function_exists('opic_ts_set_transient')) {
	function opic_ts_set_transient($slug, $data) {
		global $wpdb;
		if (is_array($data)) {
			$data = json_encode($data);
		}
		return $wpdb -> insert($wpdb -> prefix . TSDBTable, array('opic_key' => $slug, 'opic_value' => $data), array('%s', '%s'));
	}

}


if (!function_exists('opic_ts_get_transient')) {
	function opic_ts_get_transient($slug) {
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
if (!function_exists('opic_ts_do_transient')) {
	function opic_ts_do_transient($slug, $data = NULL) {
		$old = opic_ts_get_transient($slug);
		if (empty($old)) {
			opic_ts_set_transient($slug, $data);
		}
		return opic_ts_get_transient($slug);

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
				add_action( 'admin_notices', function() use($def_lang){
                    $class = 'notice notice-error';
                    $message = sprintf("Lnaguage File  %s  not found in path  %s ", $def_lang, IFCLangpath);
                    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );   
                } );
				return array();
			}
		}else{
			return array();
		}

	}

}
?>