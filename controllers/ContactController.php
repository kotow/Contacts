<?php
namespace Controllers;

class ContactController extends HomeController
{
    private $userId;

    public function __construct()
    {
        if(!\Lib\Auth::get_instance()->is_logged_in()) {
            header( 'Location: ' . DX_ROOT_URL );
            exit();
        }
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
            header( 'Location: ' . DX_ROOT_URL.'contact/' );
            exit();
        }
    }

    public function edit($id)
    {
        $cat = $this->model->getById($id, $this->userId);
        if($cat!=false) {
            $template_file = DX_ROOT_DIR . $this->views_dir . 'edit.php';
            include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
            if (isset($_POST['name'])) {
                var_dump($_POST);
                $this->model->edit($id, $_POST);
                header('Location: ' . DX_ROOT_URL . 'contact/');
                exit();
            }
        } else {
            header('Location: ' . DX_ROOT_URL . 'contact/');
            exit();
        }
    }

    public function delete($id)
    {
        $cat = $this->model->getById($id, $this->userId);
        $template_file = DX_ROOT_DIR . $this->views_dir . 'delete.php';
        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
        if(isset($_POST['delete'])) {
            $this->model->delete($id);
            header( 'Location: ' . DX_ROOT_URL.'contact/' );
            exit();
        }
    }

    public function addTo($id)
    {
        if(isset($_POST['group'])) {
            $this->model->addToGroup($id, $_POST['group']);
            header('Location: ' . DX_ROOT_URL . 'contact/details/' . $id);
            exit();
        }
    }
    public function details($id)
    {
        $contact = $this->model->details($id, $this->userId);
        $cat=$contact['contact'];
        $fields=$contact['fields'];
        $groups=$contact['groups'];
        $availableGroups=$contact['available'];
        $template_file = DX_ROOT_DIR . $this->views_dir . 'details.php';
        include_once DX_ROOT_DIR . '/views/layouts/' . $this->layout;
        if(isset($_POST['delete'])) {
            $this->model->delete($id);
            header( 'Location: ' . DX_ROOT_URL.'contact/' );
            exit();
        }
    }
}