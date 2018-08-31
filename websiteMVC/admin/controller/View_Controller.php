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
        $this->view->load('view');
        $this->view->show();
    }
}

 ?>