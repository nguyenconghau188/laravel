<?php 
if (!defined('PATH_SYSTEM')) {
	die ('Bad requested!');
}

class News_Controller extends FT_Controller
{
	public function indexAction()
	{
		// lấy config có key là csrf_token_name
		echo '<h3>Token: scrf_token_name: '.$this->config->item('csrf_token_name').'</h3>';

		//thay đổi giá trị cho csrf_token_name
		$this->config->setItem('csrf_token_name', 'new_token');
		echo '<h3>Token: csrf_token_name (changed): '.$this->config->item('csrf_token_name').'</h3>';

		//tạo cấu hình mới trên website name
		$this->config->setItem('website_name', 'freetuts.net');
		echo '<h3>key website_name: '.$this->config->item('website_name').'</h3>';
	}

	public function detailAction()
	{
		echo '<h1>Detail Action</h1>';
	}
}

 ?>