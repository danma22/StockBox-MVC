<?php

// Clase LoginController: Se encarga de la comunicación entre el modelo del usuario y las vistas y rutas relacionadas con el inicio de sesión
class StoreController {
    private $viewDashboard = "view/store.php";
    private $modelStore = "model/StoreModel.php";


    public function loadPage(){
        $this->validateSession();
        $page = array("Tiendas", "itemTiendas");
        include ($this->viewDashboard);
    }

    public function updateStorePage($id_store){
        $id_store = (int)$id_store;
        $this->validateSession();
        $page = array("Actualizar Tienda", "");
        include ("view/addStore.php");
    }

    public function addStorePage(){
        $this->validateSession();
        $page = array("Añadir Tienda", "itemAddTiendas");
        include ("view/addStore.php");
    }

    private function validateSession(){
        session_start();
        if (count($_SESSION) == 0){
            header("Location: index.php");
        }
    }

    private function requireModelStore(){
        require_once $this->modelStore;
    }

    public function addStore(){
        if(isset($_POST['name']) && isset($_POST['active'])){
            session_start(); // Se inicia la sesión
            $this->requireModelStore(); // Se llama a los métodos del modelo de tiendas
        
            $name =  $_POST['name'];
            $active =  $_POST['active'];
            $data = array('name'=>$name,'active'=>$active); // Los valores a ingresar en un registro de tienda
            
            // Se inserta el registro
            $result = insertStore($data);

            if ($result) {
                return json_encode(array('exito' => true));
            } else {
                return json_encode(array('exito' => false));
            }
        }
    }
}

?>