<?php

// Clase CategoriesController: Se encarga de la comunicación entre el modelo de categorias y las vistas y rutas relacionadas con las categorias
class CategoriesController {
    private $viewCategories = "view/categories.php";
    private $modelCategories = "model/CategoriesModel.php";


    public function loadPage(){
        $this->validateSession();
        $page = array("Categorias", "itemCategorias");
        include ($this->viewCategories);
    }

    public function addCategoriesPage(){
        $page = "Añadir Categorias";
        include ("view/addCategories.php");
    }

    // Método para validar si ya se inicio sesión
    private function validateSession(){
        session_start();
        if (count($_SESSION) == 0){
            header("Location: index.php");
        }
    }

    private function requireModelCategories(){
        require_once $this->modelCategories;
    }

    public function addCategories(){
        if(isset($_POST['name']) && isset($_POST['description'])){
            session_start(); // Se inicia la sesión
            $this->requireModelCategories(); // Se llama a los métodos del modelo de tiendas
        
            $name =  $_POST['name'];
            $description =  $_POST['description'];
            $date_added =  $_POST['date_added'];
            $id_store =  $_POST['id_store'];
            $data = array('name'=>$name,'description'=>$description, 'date_added'=>$date_added, 'id_store'=>$id_store); // Los valores a ingresar en un registro de tienda
            
            // Se inserta el registro
            $result = insertCategories($data);

            if ($result) {
                return json_encode(array('exito' => true));
            } else {
                return json_encode(array('exito' => false));
            }
        }
    }
}

?>