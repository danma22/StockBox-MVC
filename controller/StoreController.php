<?php

include "model/config.php";

class StoreController {
    private $viewDashboard = "view/store.php";
    private $modelUser = "model/UserModel.php";


    public function loadPage(){
        $page = "Tiendas";
        include ($this->viewDashboard);
    }

    public function addStorePage(){
        $page = "Añadir Tienda";
        include ("view/addStore.php");
    }
}

?>