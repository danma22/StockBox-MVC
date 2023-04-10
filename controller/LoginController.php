<?php

include "model/config.php";

class LoginController {
    private $viewLogin = "view/login.php";
    private $modelUser = "model/UserModel.php";


    public function loadPage(){
        $page = "Log in";
        include ($this->viewLogin);
    }

    public function logOut($popup){
        session_start();
        $_SESSION = array();
        session_destroy();
        $this->loadPage();
    }

    private function requireModelUser(){
        require_once $this->modelUser;
    }

    public function check(){
        if(isset($_POST['user']) && isset($_POST['pass'])){
            session_start();
            $this->requireModelUser();
        
            $username =  $_POST['user'];
            $password =  hash('sha256',$_POST['pass']);
            $filterCredential = array('username'=>$username,'password'=>$password);

            $result = getUsers($filterCredential);
        
            if(count($result) == 1){
                $_SESSION['id'] = $result[0]['id'];
                $_SESSION['username'] = $result[0]['username'];
                $_SESSION['password'] = $result[0]['password'];
                $_SESSION['type'] = $result[0]['type'];
                
                //var_dump($_REQUEST);
                
                return json_encode(array('exito' => true, 'url' => 'index.php?controller=StoreController&action=loadPage'));
            } else {
                return json_encode(array('exito' => false));
            }
        }
    }
}

?>