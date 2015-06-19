<?php
namespace Controllers;

class ContactController extends HomeController
{
    private $userId;

    public function __construct()
    {
        parent::__construct( get_class(), 'contact', 'views\contacts\\' );
        $user = \Lib\Auth::get_instance()->get_logged_user();
        $this->userId = $user['user_id'];
    }

    public function index()
    {
        $contacts = $this->model->getContacts($this->userId);
        $template_file = DX_ROOT_DIR . $this->views_dir . 'index.php';
        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
    }

    public function add()
    {
        $template_file = DX_ROOT_DIR . $this->views_dir . 'add.php';
        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
        if(isset($_POST['name'])) {
            $this->model->add($_POST, $this->userId);
            header( 'Location: ' . DX_ROOT_URL.'category/' );
            exit();
        }
    }

    public function edit($id)
    {
        $cat = $this->model->getById($id);
        $template_file = DX_ROOT_DIR . $this->views_dir . 'edit.php';
        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
        if(isset($_POST['name'])) {
            $this->model->edit($id, $_POST['name']);
            header( 'Location: ' . DX_ROOT_URL.'category/' );
            exit();
        }
    }

    public function delete($id)
    {
        $cat = $this->model->getById($id);
        $template_file = DX_ROOT_DIR . $this->views_dir . 'delete.php';
        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
        if(isset($_POST['delete'])) {
            $this->model->delete($id);
            header( 'Location: ' . DX_ROOT_URL.'category/' );
            exit();
        }
    }
}