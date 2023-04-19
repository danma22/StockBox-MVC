<?php
require_once "model/db.php";

// Método para insertar un registro de stock
function insertStockLog($data){
    $query = "INSERT INTO stock_history(date_added, note, reference, quantity, id_user, id_store, id_product) 
                VALUES (NOW(), :note, :reference, :quantity, :id_user, :id_store, :id_product)";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para consultar todas los cambios de stock realizados
function getStockLog($id_product){
    $query = "SELECT date_added, note, reference, quantity FROM stock_history WHERE id_product=:id_product";
    $data = array('id_product' => $id_product);
    
    $result = Database::execute($query, $data);
    $products = array();
    foreach($result as $row){
        array_push($products, $row);
    }

    return $products;
}

// Método para actualizar el stock del producto
function updateStockProduct($data){
    $query = "UPDATE Products SET stock=:stock WHERE id=:id";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

?>