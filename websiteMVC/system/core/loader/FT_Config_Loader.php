<?php 
if (!defined('PATH_SYSTEM')) {
	die('Bad requested');
}

class FT_Config_Loader
{
	protected $config = array();

	public function load($config)
	{
		if (file_exists(PATH_APPLICATION.'/config/'.$config.'.php')) {
			$config = include_once PATH_APPLICATION.'/config/'.$config.'.php';
			if (!empty($config)) {
				foreach ($config as $key=>$item) {
					$this->config[$key] = $item;
				}
			}
		}
		return FALSE;
	}

	public function item($key, $default_val='')
	{
		return isset($this->config[$key]) ? $this->config[$key] : $default_val;
	}

	public function setItem($key, $val)
	{
		$this->config[$key] = $val;
	}
}

 ?>