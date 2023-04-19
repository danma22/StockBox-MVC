<?php

// Clase InventoryController: Se encarga de la comunicación entre el modelo del usuario y las vistas y rutas relacionadas con el inicio de sesión
class InventoryController {
    // Vista de la tabla de productos
    private $viewInventory = "view/inventory.php";
    // Modelo de productos
    private $modelProducts = "model/ProductModel.php";
    // Modelo de Stock
    private $modelStock = "model/StockModel.php";

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

    // Método para mostrar la vista de los detalles de un producto
    public function detailProductPage($id_product){
        $id_product = (int)$id_product;
        $this->validateSession();
        $page = array("Detalles de Producto", "");
        include ("view/detailsProduct.php");
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

    // Método para obtener el código del modelo del stock
    private function requireModelStock(){
        require_once $this->modelStock;
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
                $_SESSION['toast'] = array('exito' => true, 'header' => "¡Producto agregado!", 'body' => 'El producto indicado ha sido registrado con éxito');
                return json_encode(array('exito' => true));
            } else {
                $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'El producto indicado no ha sido registrado, pruebe más tarde');
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
                $_SESSION['toast'] = array('exito' => true, 'header' => "¡Producto actualizado!", 'body' => 'El producto indicado ha sido actualizado con éxito');
                return json_encode(array('exito' => true));
            } else {
                $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'El producto indicado no ha sido actualizada, pruebe más tarde');
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

        if ($result) {
            $_SESSION['toast'] = array('exito' => true, 'header' => "!Producto eliminado!", 'body' => 'El producto indicado ha sido eliminado con éxito');
        } else {
            $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'El producto indicado no ha sido eliminado, pruebe más tarde');
        }

        header("Location: index.php?controller=InventoryController&action=loadPage");
    }

    // Método para actualizar el stock y los detalles del producto
    public function addStockLog(){
        if(isset($_POST['id']) && isset($_POST['ref']) && isset($_POST['units']) && isset($_POST['type']) && isset($_POST['user']) && isset($_POST['stock'])){
            session_start(); // Se inicia la sesión
            $this->requireModelStock(); // Se llama a los métodos del modelo de productos
        
            $ref =  $_POST['ref'];
            $units =  $_POST['units'];
            if ($_POST['type'] == 1){
                $note = "El usuario ".$_POST['user']." agregó ".$units." unidades del producto al inventario";
                $stock = $_POST['stock'] + $units;
            } else {
                $note = "El usuario ".$_POST['user']." vendió ".$units." unidades del producto";
                $stock = $_POST['stock'] - $units;
            }
            
            $id = $_POST['id'];
            $data = array('note'=>$note,'reference'=>$ref,'quantity'=>$units, 'id_user'=>$_SESSION['id'], 'id_store'=>$_SESSION['id_store'], 'id_product'=>$id); // Los valores a ingresar en un registro de producto
            
            // Se actualiza el registro
            $result = insertStockLog($data);

            if ($result) {
                $data = array('stock'=>$stock, 'id'=>$id);
                $result2 = updateStockProduct($data);

                if ($result2) {
                    $_SESSION['toast'] = array('exito' => true, 'header' => "¡El stock se actualizó!", 'body' => 'El producto ha sido actualizado con éxito');
                    return json_encode(array('exito' => true));
                } else {
                    $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'El producto no ha sido actualizada, pruebe más tarde');
                    return json_encode(array('exito' => false));
                }
            } else {
                $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'El producto no ha sido actualizada, pruebe más tarde');
                return json_encode(array('exito' => false));
            }
        }
    }
}

?>
