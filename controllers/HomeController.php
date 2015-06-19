<?php
namespace Controllers;

class HomeController
{
	protected $layout = 'default.php';
	protected $views_dir =  '/views/master/';
	protected $model = null;
	protected $class_name = null;
	protected $logged_user = array();
	
	public function __construct( $class_name = '\Controllers\Master_Controller', $model = 'Home', $views_dir = '/views/master/' )
    {
		$this->class_name = $class_name;
		$this->model = $model;
		$this->views_dir = $views_dir;
		include_once DX_ROOT_DIR . "models/".$model."Model.php";
		$model_class = "\Models\\" . ucfirst( $model ) . "Model";
		$this->model = new $model_class( array( 'table' => 'none' ) );
		$logged_user = \Lib\Auth::get_instance()->get_logged_user();
		$this->logged_user = $logged_user;
	}

    public function home()
    {
        if(\Lib\Auth::get_instance()->is_logged_in()) {
            header( 'Location: ' . DX_ROOT_URL . 'user/' );
            exit();
        }
        $template_file = DX_ROOT_DIR . $this->views_dir . 'home.php';
        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
    }

    public function login()
    {
        if(\Lib\Auth::get_instance()->is_logged_in()) {
            header( 'Location: ' . DX_ROOT_URL . 'user/' );
            exit();
        }
        $template_file = DX_ROOT_DIR . $this->views_dir . 'login.php';
        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
    }

    public function register()
    {
        if(\Lib\Auth::get_instance()->is_logged_in()) {
            header( 'Location: ' . DX_ROOT_URL . 'user/' );
            exit();
        }
        $template_file = DX_ROOT_DIR . $this->views_dir . 'register.php';
        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
    }
}