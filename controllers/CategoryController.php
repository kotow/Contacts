<?php
/**
 * Created by PhpStorm.
 * User: kotow-PC
 * Date: 6/18/2015
 * Time: 8:09 PM
 */

namespace Controllers;


class CategoryController extends HomeController {

    public function __construct() {
        parent::__construct( get_class(), 'category', 'views\category\\' );

    }

    public function add(){

        $template_file = DX_ROOT_DIR . $this->views_dir . 'add.php';

        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
        if(isset($_POST['name'])){
            $this->model->add($_POST['name']);
            header( 'Location: ' . DX_ROOT_URL.'category/' );
            exit();
        }
    }

    public function index(){
        $contacts = $this->model->get();
        $template_file = DX_ROOT_DIR . $this->views_dir . 'index.php';

        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;

    }

    public function get($id) {
        $contacts = $this->model->getContacts($id);
        $template_file = DX_ROOT_DIR . $this->views_dir . 'contacts.php';

        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
    }

    public function edit(){

    }

    public function delete(){

    }

}