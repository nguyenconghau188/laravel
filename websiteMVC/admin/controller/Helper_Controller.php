<?php 
if (!defined('PATH_SYSTEM')) {
	die('Bad requested');
}

/**
 * summary
 */
class Helper_Controller extends FT_Controller
{
    /**
     * summary
     */
	public function indexAction()
	{
		$this->helper->load('string');

		echo string_to_int('freetuts.net');
	}

}



 ?>