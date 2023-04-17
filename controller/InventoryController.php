<?php

// Clase InventoryController: Se encarga de la comunicación entre el modelo del usuario y las vistas y rutas relacionadas con el inicio de sesión
class InventoryController {
    // Vista de la tabla de productos
    private $viewInventory = "view/inventory.php";
    // Modelo de productos
    private $modelProducts = "model/ProductModel.php";

    // Método para cargar la página
    public function loadPage(){
        $this->validateSession();
        $page = array("Inventario", "itemInventario");
        include ($this->viewInventory);
    }
    
    // Método para mostrar la vista para añadir un producto 
    public function addInventoryPage(){
        $this->validateSession();
        $page = array("Añadir Producto", "");
        include ("view/addProduct.php");
    }

    // Método para mostrar la vista para actualizar un producto
    public function updateInventoryPage($id_product){
        $id_product = (int)$id_product;
        $this->validateSession();
        $page = array("Actualizar Producto", "");
        include ("view/addProduct.php");
    }

    // Método para validar si ya se inicio sesión
    private function validateSession(){
        session_start();
        if (count($_SESSION) == 0){
            header("Location: index.php");
        }
    }

    // Método para obtener el código del modelo del producto
    private function requireModelProducts(){
        require_once $this->modelProducts;
    }

    // Método para enviar los datos del formulario para añadir un producto
    public function addProducts(){
        if(isset($_POST['code']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_POST['category'])){
            session_start(); // Se inicia la sesión
            $this->requireModelProducts(); // Se llama a los métodos del modelo de productos
            
            $code =  $_POST['code'];
            $name =  $_POST['name'];
            $price =  $_POST['price'];
            $stock =  $_POST['stock'];
            $category =  $_POST['category'];
            $data = array('code'=>$code,'name'=>$name,'price'=>$price, 'stock'=>$stock, 'id_categories'=>$category, 'id_store'=>$_SESSION['id_store']); // Los valores a ingresar en un registro de producto
            
            // Se inserta el registro
            $result = insertProduct($data);

            if ($result) {
                return json_encode(array('exito' => true));
            } else {
                return json_encode(array('exito' => false));
            }
        }
    }

    // Método para enviar los datos del formulario para actualizar un producto
    public function updProducts(){
        if(isset($_POST['code']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_POST['category']) && isset($_POST['id'])){
            session_start(); // Se inicia la sesión
            $this->requireModelProducts(); // Se llama a los métodos del modelo de productos
        
            $code =  $_POST['code'];
            $name =  $_POST['name'];
            $price =  $_POST['price'];
            $stock =  $_POST['stock'];
            $category =  $_POST['category'];
            $id = $_POST['id'];
            $data = array('code'=>$code,'name'=>$name,'price'=>$price, 'stock'=>$stock, 'id_categories'=>$category, 'id'=>$id); // Los valores a ingresar en un registro de producto
            
            // Se actualiza el registro
            $result = updateProduct($data);

            if ($result) {
                return json_encode(array('exito' => true));
            } else {
                return json_encode(array('exito' => false));
            }
        }
    }

    // Método para enviar los datos del formulario para eliminarlo
    public function delProducts($id){
        session_start(); // Se inicia la sesión
        $this->requireModelProducts(); // Se llama a los métodos del modelo de productos

        $data = array('id'=>$id); // Registro a eliminar
        
        // Se elimina el registro
        $result = deleteProduct($data);

        header("Location: index.php?controller=InventoryController&action=loadPage");

        // if ($result) {
        //     return json_encode(array('exito' => true));
        // } else {
        //     return json_encode(array('exito' => false));
        // }
    }
}

?>