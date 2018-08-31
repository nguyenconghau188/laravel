<?php 

//đối tượng quản lý và load view
/**
 * summary
 */
class FT_View_Loader	
{
    /**
     * summary
     */
    
    private $__content = array();

    public function load($view, $data = array())
    {
    	echo 'load';
        //chuyển mảng dữ liệu thành từng biến
        extract($data);

        //chuyển nội dung view thành biến thay vì in ra bằng cách dùng ob_start()
        ob_start();
        require_once PATH_APPLICATION.'/view/'.$view.'.php';
        $content = ob_get_contents();
        ob_end_clean();

        //gán nội dung vào danh sách view đã load
        $this->__content[] = $content;
    }

   	public function show()
   	{
   		foreach ($this->__content as $html) {
   			echo $html;
   		}
   	}
}
 ?>