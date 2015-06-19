<?php
/**
 * Created by PhpStorm.
 * User: kotow-PC
 * Date: 6/18/2015
 * Time: 8:09 PM
 */

namespace Controllers;


class ContactController extends HomeController {

    private $userId;

    public function __construct() {
        parent::__construct( get_class(), 'contact', 'views\contacts\\' );
        $user = \Lib\Auth::get_instance()->get_logged_user();
        $this->userId = $user['user_id'];
    }

    public function add(){

    }

    public function index(){
        $contacts = $this->model->getContacts($this->userId);
        $template_file = DX_ROOT_DIR . $this->views_dir . 'index.php';

        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
    }

    public function edit(){

    }

    public function delete(){

    }

}