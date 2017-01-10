<?php
require_once 'models\model.php';
require_once 'views\view.php';
require_once 'check_class.php';
class controller {
    private $model;
    private $view;
    
    public function __construct() {
       $this->model = model::getDB(); 
       $this->view = new  view();
    }
    
    public function showUser(){
        $users = $this->model->selectUsers();
        $this->view->render("show_users", $users);
        
    }
    
    public function deleteUser() {
        $this->model->deleteUser($_GET["id"]);
    }

    public function newUser($error = false) {
        $data=array();
        $data["func"] = "add";
        $data["country"] = $this->model->selectCountries();
        $this->view->render('form_view',$data);
        
    }
    
    private function checkUser() {
        $check = new Check();

        $error = "";
        
        if (!$check->name($_POST["user_name"]))
            $error.="Error name</br>";
        if (!$check->email($_POST["user_email"]))
            $error.="Error emal</br>";
        if (!$check->id($_POST["user_country_id"]))
            $error.="Error country</br>";
        return $error;
    }


    public function addUser() {
        $error = $this->checkUser();
        if ($error=="") {
            $this->model->addUser($_POST["user_name"], $_POST["user_email"], $_POST["user_country_id"]);
            header("Location: http://mvc.com/");
            exit;
        } else{
            $this->newUser();
            $this->view->render("error_view", $error);
        }
    }
    public function editUser($id = false) {
        $data = array();
        $data["func"] = "update";
        $data["country"] = $this->model->selectCountries();
        if($error) $data["error"] = $error;
        if($id) $user_id = $id;
        else $user_id = $_GET["id"];
        $data["user"] = $this->model->selectUser($user_id);
        $this->view->render('form_view',$data);
    }
    
    public function updateUser() {
        $error = $this->checkUser();
        if ( $error=="") {
            
            $this->model->editUser($_POST["id"], $_POST["user_name"], $_POST["user_email"], $_POST["user_country_id"]);
            header("Location: http://mvc.com/");
            exit;
        } else{
            $this->editUser($_POST["id"]);
            $this->view->render("error_view", $error);
        }
    }

}
