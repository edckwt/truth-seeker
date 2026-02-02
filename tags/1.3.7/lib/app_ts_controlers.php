<?php
/**
 * APP Controllers
 */
class app_ts_controlers {
	
	var $Controller;
	var $Model;
	var $layout = 'default';
	var $fileview;
	var $NewCrontime;

	function __construct() {
		$this->UpdateOptions();
	}
	
	public function UpdateOptions()
	{
		if(!empty($_POST)){
			foreach ($_POST as $key => $value) {
				// if post name start wthi OPIC_
				
				if(substr($key, 0, strlen(OPICTS_Input_SLUG) ) === OPICTS_Input_SLUG){
					 
					$this->_UpdateOptions($key,$value);
				}
			}
			if ( isset($_POST[OPICTS_Input_SLUG."-settings-page"]))
			{
				add_action( 'admin_notices', [$this,'alert_success']);
			}
		}
	}
	
	private function _UpdateOptions($key,$value = null)
	{
		if($key){
			$old_option = get_option($key);
			if($old_option !== false){
				// update
				return update_option($key,$value,true);
			}else{
				// add
				return add_option($key,$value); 
			}
		}
	}
	public function alert_success() {
		$class = 'notice notice-success is-dismissible';
		$message = __( 'Done');
		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
	}	
	public function loadModel($modelname='')
	{
		$modelname = $this->preloadfilename($modelname,'model');
		$this->Model = str_replace('.php','',$modelname);
		$path = TSModelspath.$modelname;
		if (file_exists($path)) {
			include_once $path;
			$this->Model = new $this->Model();
		} else {
			echo sprintf("Model <b>%s</b> not found in path <b>%s</b>",$modelname,TSModelspath);
		}
	}
	
	public function loadController($controllername='')
	{
		
		$controllername = $this->preloadfilename($controllername);
		$this->Controller = str_replace('.php','',$controllername);
		$path = TSControlerspath.$controllername;
		if (file_exists($path)) {
			include_once $path;
			 $this->Controller = new $this->Controller();
		} else {
			echo sprintf("Controller <b>%s</b> not found in path <b>%s</b>",$controllername,TSControlerspath);
		}
	}
	public function loadView($filename='')
	{
		$TSlayoutpath = TSLayoutpath.TSDS.str_replace('.php','',$this->layout).'.php';
		if(file_exists($TSlayoutpath)){
			$this->fileview = str_replace('.php','',$filename);
			$mainViewFile = $this->inziliation_view_file($filename);
			if(!file_exists($mainViewFile)){
				echo sprintf("View File <b>%s</b> not found in path <b>%s</b>",$filename.'.php',TSViewspath);
			}else{
				
				include_once $TSlayoutpath;
			}
		}else{
			echo sprintf("Layout <b>%s</b> not found in path <b>%s</b>",$this->layout,TSLayoutpath);
		}

	}
    public function inziliation_view_file($fileview='')
	{
		if($fileview){
			$fileview = str_replace('.php','',$fileview).'.php';
			$path = TSViewspath.$fileview;
			return $path;
		}
		return ;
	}	
	private function preloadfilename($name='',$type='controller')
	{
		return  str_replace('.php','',$name).'_ts_'.$type.'.php';
	}

}

?>