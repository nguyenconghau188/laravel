<?php 
//đối tượng quản lý và load helper

/**
 * summary
 */
class FT_Helper_Loader	
{
    /**
     * summary
     */
    public function load($helper)
    {
    	$helper = ucfirst($helper).'_Helper';
    	//echo 'helper->'.$helper;
    	require_once(PATH_SYSTEM.'/core/helper/'.$helper.'.php');		
    }
    
}



 ?>