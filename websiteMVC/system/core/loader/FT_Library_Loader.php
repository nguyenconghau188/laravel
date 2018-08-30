<?php 
//đối tượng quản lý và load library
if (!defined('PATH_SYSTEM')) {
	die('Bad requested');
}

/**
 * summary
 */
class FT_Library_Loader
{
    /**
     * summary
     */
    public function load($library, $args = array())
    {
    	//nếu thư viện chưa được load thì thực hiện load
    	if (empty($this->{$library})) {
    		$class = ucfirst($library).'_Library';
    		require_once(PATH_SYSTEM.'/library/'.$class.'.php');
    		$this->{$library} = new $class($args);
    	}
    }
}


 ?>