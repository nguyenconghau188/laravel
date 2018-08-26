<?php 
//controller chính
if (!define('PATH_SYSTEM')) {
	die('Bad requested!');
}

/**
 * summary
 */
class FT_Controller
{
    /**
     * summary
     */
    protected $view = NULL;

    protected $model = NULL:

    protected $library = NULL;

    protected $helper = NULL;

    protected $config = NULL;

    public function __construct()
    {
        
    }

    public function load($controller, $action)
    {
		//chuyển đổi tên controller vì mặc định nó có định dạng là {Name}_Controller
		$controller = ucfirst(strtolower($controller)).'_Controller';
		//hàm ucfirst-> chuyển đổi kí tự đầu tiên trong chuỗi thành in hoa nếu đó là 1 chữ cái
		$action = strtolower($action).'Action';

		if (!file_exists(PATH_APPLICATION.'/controller'.$controller.'.php')) {
		    	die('Controller không tồn tại');
		}
		require_once PATH_APPLICATION.'/controller'.$controller.'.php';
		if (!class_exists($controller)) {
		    die('Controller không tồn tại');
		}    	

		$controllerObject = new $controller();
		if (!method_exists($controllerObject, $action)) {
			die('Action không tồn tại');
		}

		$controllerObject->{$action};
    }
}
 ?>