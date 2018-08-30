<?php 
if (!defined('PATH_SYSTEM')) {
	die('Bad requested');
}


class Library_Controller extends FT_Controller
{
	public function indexAction()
	{
		$this->library->load('upload');
		$this->library->upload->upload();
	}
}

 ?>