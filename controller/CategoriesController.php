<?php

// Clase CategoriesController: Se encarga de la comunicación entre el modelo de categorias y las vistas y rutas relacionadas con las categorias
class CategoriesController {
    // Vista de la tabla de categorias
    private $viewCategories = "view/categories.php";
    // Modelo de categorias
    private $modelCategories = "model/CategoriesModel.php";

    // Método para cargar la página
    public function loadPage(){
        $this->validateSession();
        $page = array("Categorias", "itemCategorias");
        include ($this->viewCategories);
    }

    // Método para mostrar la vista para actualizar una categoria
    public function updateCategoriesPage($id_category){
        $id_category = (int)$id_category;
        $this->validateSession();
        $page = array("Actualizar Categoria", "");
        include ("view/addCategory.php");
    }

    // Método para mostrar la vista para añadir una categoria 
    public function addCategoriesPage(){
        $this->validateSession();
        $page = array("Añadir Categorias", "");
        include ("view/addCategory.php");
    }

    // Método para validar si ya se inicio sesión
    private function validateSession(){
        session_start();
        if (count($_SESSION) == 0){
            header("Location: index.php");
        }
    }

    // Método para obtener el código del modelo de la categoria
    private function requireModelCategories(){
        require_once $this->modelCategories;
    }

    // Método para enviar los datos del formulario para añadir una categoria
    public function addCategories(){
        if(isset($_POST['name']) && isset($_POST['desc'])){
            session_start(); // Se inicia la sesión
            $this->requireModelCategories(); // Se llama a los métodos del modelo de categorias
        
            $name =  $_POST['name'];
            $desc =  $_POST['desc'];
            $data = array('name'=>$name,'description'=>$desc, 'id_store'=>$_SESSION['id_store']); // Los valores a ingresar en un registro de categorias
            
            // Se inserta el registro
            $result = insertCategories($data);

            if ($result) {
                $_SESSION['toast'] = array('exito' => true, 'header' => "¡Categoria agregada!", 'body' => 'La categoria indicada ha sido registrada con éxito');
                return json_encode(array('exito' => true));
            } else {
                $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'La categoria indicada no ha sido registrada, pruebe más tarde');
                return json_encode(array('exito' => false));
            }
        }
    }

    // Método para enviar los datos del formulario para actualizar una categoria
    public function updCategories(){
        if(isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['id'])){
            session_start(); // Se inicia la sesión
            $this->requireModelCategories(); // Se llama a los métodos del modelo de categorias
        
            $name =  $_POST['name'];
            $desc =  $_POST['desc'];
            $id = $_POST['id'];
            $data = array('name'=>$name, 'description'=>$desc, 'id'=>$id); // Los valores a actualizar en un registro de categorias
            
            // Se actualiza el registro
            $result = updateCategory($data);

            if ($result) {
                $_SESSION['toast'] = array('exito' => true, 'header' => "¡Categoria actualizada!", 'body' => 'La categoria indicada ha sido actualizada con éxito');
                return json_encode(array('exito' => true));
            } else {
                $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'La categoria indicada no ha sido actualizada, pruebe más tarde');
                return json_encode(array('exito' => false));
            }
        }
    }

    // Método para enviar los datos del formulario para eliminarlo
    public function delCategories($id){
        session_start(); // Se inicia la sesión
        $this->requireModelCategories(); // Se llama a los métodos del modelo de categorias

        $data = array('id'=>$id); // Registro a eliminar
        
        // Se elimina el registro
        $result = deleteCategory($data);

        if ($result) {
            $_SESSION['toast'] = array('exito' => true, 'header' => "¡Categoria eliminada!", 'body' => 'La categoria indicada ha sido eliminada con éxito');
        } else {
            $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'La categoria indicada no ha sido eliminada, pruebe más tarde');
        }

        header("Location: index.php?controller=CategoriesController&action=loadPage");
    }
}

?>