<?php 
if (!defined('PATH_SYSTEM')) {
	die('Bad requested');
}

/**
 * summary
 */
class Base_Controller extends FT_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function load_header()
    {
    	//load nội dung header
    }

    public function load_footer()
    {
    	//load nội dung footer
    }

//hàm hủy có nhiệm vụ show nội dung của view, lúc này controller không cần gọi đến $this->view->show nữa
    public function __destruct()
    {
    	$this->view->show();
    }
}


 ?>