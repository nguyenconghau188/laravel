<?php 
if (!defined('PATH_SYSTEM')) {
	die('Bad requested');
}

/**
 * summary
 */
class View_Controller extends FT_Controller
{
    /**
     * summary
     */
    public function indexAction()
    {
    	$data = array(
    		'title'=>'Chào mừng các bạn nhé'
    	);

        $this->view->load('view', $data);
        $this->view->show();
    }
}

 ?>