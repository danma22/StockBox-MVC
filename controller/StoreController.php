<?php

// Clase LoginController: Se encarga de la comunicación entre el modelo del usuario y las vistas y rutas relacionadas con el inicio de sesión
class StoreController {
    // Vista de la tabla de tiendas
    private $viewStores = "view/store.php";
    // Modelo de tiendas
    private $modelStore = "model/StoreModel.php";

    // Método para cargar la página
    public function loadPage(){
        $this->validateSession();
        $page = array("Tiendas", "itemTiendas");
        include ($this->viewStores);
    }

    // Método para cargar el dashboard de la tienda seleccionada
    public function loadStoreDashboard($id_store){
        session_start();
        $this->requireModelStore();
        
        $store = searchStore($id_store);
        if ($store['active'] == 1){
            $_SESSION['id_store'] = (int)$id_store;
            $_SESSION['name_store'] = getNameStore($id_store);
            header("Location: index.php?controller=DashboardController&action=loadPage");
        } else {
            $_SESSION['toast'] = array('exito' => false, 'header' => "¡No se puede ingresar!", 'body' => 'La tienda está inactiva, no es posible ingresar');
            header("Location: index.php?controller=StoreController&action=loadPage");
        }
    }

    // Método para mostrar la vista para actualizar una tienda
    public function updateStorePage($id_store){
        $id_store = (int)$id_store;
        $this->validateSession();
        $page = array("Actualizar Tienda", "");
        include ("view/addStore.php");
    }

    // Método para mostrar la vista para añadir una tineda 
    public function addStorePage(){
        $this->validateSession();
        $page = array("Añadir Tienda", "itemAddTiendas");
        include ("view/addStore.php");
    }

    // Método para validar si ya se inicio sesión
    private function validateSession(){
        session_start();
        if (count($_SESSION) == 0){
            header("Location: index.php");
        }

        // También se valida si el usuario es de tipo superadministrador
        if ($_SESSION['type'] == 2){
            header("Location: index.php?controller=LoginController&action=logOut");
        }
    }

    // Método para obtener el código del modelo de tienda
    private function requireModelStore(){
        require_once $this->modelStore;
    }

    // Método para enviar los datos del formulario para añadir una tienda
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
                $_SESSION['toast'] = array('exito' => true, 'header' => "¡Tienda agregada!", 'body' => 'La tienda indicada ha sido registrada con éxito');
                return json_encode(array('exito' => true));
            } else {
                $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'La tienda indicada no ha sido registrada, pruebe más tarde');
                return json_encode(array('exito' => false));
            }
        }
    }

    // Método para enviar los datos del formulario para actualizar una tienda
    public function updStore(){
        if(isset($_POST['name']) && isset($_POST['active']) && isset($_POST['id'])){
            session_start(); // Se inicia la sesión
            $this->requireModelStore(); // Se llama a los métodos del modelo de tiendas
        
            $name =  $_POST['name'];
            $active =  $_POST['active'];
            $id = $_POST['id'];
            $data = array('name'=>$name,'active'=>$active, 'id'=>$id); // Los valores a actualizar en un registro de tienda
            
            // Se actualiza el registro
            $result = updateStore($data);

            if ($result) {
                $_SESSION['toast'] = array('exito' => true, 'header' => "¡Tienda actualizada!", 'body' => 'La tienda indicada ha sido actualizada con éxito');
                return json_encode(array('exito' => true));
            } else {
                $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'La tienda indicada no ha sido actualizada, pruebe más tarde');
                return json_encode(array('exito' => false));
            }
        }
    }

    // Método para enviar los datos del formulario para eliminarlo
    public function delStore($id){
        session_start(); // Se inicia la sesión
        $this->requireModelStore(); // Se llama a los métodos del modelo de tiendas

        $data = array('id'=>$id); // Registro a eliminar
        
        // Se elimina el registro
        $result = deleteStore($data);
        
        if ($result) {
            $_SESSION['toast'] = array('exito' => true, 'header' => "¡Tienda eliminada!", 'body' => 'La tienda indicada ha sido eliminada con éxito');
        } else {
            $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'La tienda indicada no ha sido eliminada, pruebe más tarde');
        }
        
        header("Location: index.php?controller=StoreController&action=loadPage");
    }
}

?>
