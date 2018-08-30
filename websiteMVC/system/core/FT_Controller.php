<?php 
//controller chính
if (!defined('PATH_SYSTEM')) {
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

    protected $model = NULL;

    protected $library = NULL;

    protected $helper = NULL;

    protected $config = NULL;

    public function __construct($is_controller=true)
    {
        require_once PATH_SYSTEM.'/core/loader/FT_Config_Loader.php';
        $this->config = new FT_Config_Loader();
        $this->config->load('config');

        //load library
        require_once PATH_SYSTEM.'/core/loader/FT_Library_Loader.php';
        $this->library = new FT_Library_Loader();

        //load helper
        require_once PATH_SYSTEM.'/core/loader/FT_Helper_Loader.php';
        $this->helper = new FT_Helper_Loader();
    }

  //   public function load($controller, $action)
  //   {
		// //chuyển đổi tên controller vì mặc định nó có định dạng là {Name}_Controller
		// $controller = ucfirst(strtolower($controller)).'_Controller';
		// echo 'controller->'.$controller;
		// //hàm ucfirst-> chuyển đổi kí tự đầu tiên trong chuỗi thành in hoa nếu đó là 1 chữ cái
		// $action = strtolower($action).'Action';

		// if (!file_exists(PATH_APPLICATION.'/controller/'.$controller.'.php')) {
		//     	die('Controller không tồn tại');
		// }
		// require_once PATH_APPLICATION.'/controller/'.$controller.'.php';
		// if (!class_exists($controller)) {
		//     die('Controller không tồn tại');
		// }    	

		// $controllerObject = new $controller();
		// if (!method_exists($controllerObject, $action)) {
		// 	die('Action không tồn tại');
		// }
		// echo 'action->'.$action;

		// $controllerObject->{$action}();
  //   }
}
 ?>