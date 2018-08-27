<?php 
if (!defined('PATH_SYSTEM')) {
	die ('Bad requested!');
}

class News_Controller extends FT_Controller
{
	public function indexAction()
	{
		echo '<pre>';
		echo '<h1>Index Action</h1>';
		print_r($this);
	}

	public function detailAction()
	{
		echo '<h1>Detail Action</h1>';
	}
}

 ?>