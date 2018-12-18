<?php
/**
 * APP Helpers
 */
class app_ts_helpers {
	var $class_lang;
	public function __construct() {
		global $opicts_lang;
		$this->loadLang();
	}
	public function loadLang()
	{
		global $opicts_lang;
		$this->class_lang =  $opicts_lang;
	
	}
	
	public function getLang($key='')
	{
		return $this->class_lang[$key];
	}
	
	public function MainContent($mainViewFile) {
		if (file_exists($mainViewFile)) {
			include_once $mainViewFile;
		}

	}
	
	function opic_admin_tabs($current = 'language') {
		 
		global $opicts_categories_lang,$tscategories;
		if (!empty($_POST[OPICTS_Input_SLUG.'language'])) {
			$this->class_lang = fun_ts_loadlang();
		}
		
		$cat_tab_list = $opicts_categories_lang[get_option(OPICTS_Input_SLUG.'language')];
		 
		if(isset($_GET['page'])){
			$get_slug = strip_tags($_GET['page']);
		}else{
			$get_slug = '';
		}

		if (!empty($_GET['tab'])) {
			$current = esc_attr($_GET['tab']);
		};
		$tabs = array('language' => $this->getLang('tab-language'),'options' => $this->getLang('tab-options'));
		echo '<div id="icon-themes" class="icon32"><br></div>';
		echo '<h2 class="nav-tab-wrapper">';
		foreach ($tabs as $tab => $name) {
			$class = ($tab == $current) ? ' nav-tab-active' : '';
			$logo = NULL;
		 
			echo "<a class='nav-tab$class' href='?page=" . $get_slug . "&tab=$tab'>$logo $name</a>";
		}
		
		if($cat_tab_list){
			foreach ($cat_tab_list as $tab => $name) {
			if(isset($_GET['cat_slug'])){
				$_current = esc_attr($_GET['cat_slug']);
			}else{
				$_current = '';	
			}
			$class = ($current == 'categories' && $_current == $tab) ? ' nav-tab-active' : '';
			echo "<a class='nav-tab$class' href='?page=" . $get_slug . "&tab=categories&cat_slug=$tab'><img ?>".$this->getLang($tab)."</a>";
		}		
		}
		echo '</h2>';
	}
	
}
?>