<?php

class LoginController {
    private $viewLogin = "view/login.php";
    private $successPath = "success.php";
    private $modelProvincie = "model/DAOprovince.php";
    private $modelUser = "model/DAOuser.php";


    public function loadPage($popup){
        include ($this->viewLogin);
    }
}

?>