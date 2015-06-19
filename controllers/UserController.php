<?php
namespace Controllers;

class UserController extends HomeController
{
    public function __construct()
    {
        parent::__construct( get_class(), 'user', 'views\user\\' );
    }

    public function index()
    {
        $template_file = DX_ROOT_DIR . $this->views_dir . 'index.php';
        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
    }

    public function login()
    {
        $auth = \Lib\Auth::get_instance();
        $login_text = '';
        $user = $auth->get_logged_user();
        if ( empty( $user ) && isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
            $logged_in = $auth->login( $_POST['username'], $_POST['password'] );
            if ( ! $logged_in ) {
                $login_text = 'Login not successful.';
            } else {
                $login_text = 'Login was successful! Hi ' . $_POST['username'];
            }
        }
        $template_file = DX_ROOT_DIR . $this->views_dir . 'index.php';
        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
    }

    public function logout()
    {
        $auth = \Lib\Auth::get_instance();
        $auth->logout();
        header( 'Location: ' . DX_ROOT_URL );
        exit();
    }

    public function register()
    {
        if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) && isset( $_POST['passwordConf'] ) ) {
            if($_POST['password']  != $_POST['passwordConf'] ){
                $error = 'password not match';
                $template_file = DX_ROOT_DIR . 'views\master\register.php';
                include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
            } else {
                $this->model->register($_POST['username'], $_POST['password']);
                header( 'Location: ' . DX_ROOT_URL .'user');
                exit();
            }
        }
    }
}