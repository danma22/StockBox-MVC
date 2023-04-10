<?php

include "model/config.php";

class StoreController {
    private $viewLogin = "view/login.php";
    private $successPath = "success.php";
    private $modelProvincie = "model/DAOprovince.php";
    private $modelUser = "model/UserModel.php";


    public function loadPage($popup){
        $page = "Log in";
        include ($this->viewLogin);
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
                
                return json_encode(array('exito' => true, 'url' => 'view/dashboard.php'));
            } else {
                return json_encode(array('exito' => false));
            }
        }
    }
}

?>