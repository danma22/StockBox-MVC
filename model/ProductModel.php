<?php
require_once "model/db.php";

// Método para insertar un producto
function insertProduct($data){
    $query = "INSERT INTO Products(code, name, price, stock, date_added, id_store, id_categories) 
                VALUES (:code, :name, :price, :stock, NOW(), :id_store, :id_categories)";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para actualizar un producto
function updateProduct($data){
    $query = "UPDATE Products SET code=:code, name=:name, price=:price, stock=:stock, id_categories=:id_categories WHERE id=:id";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para eliminar un producto
function deleteProduct($data){
    $query = "DELETE FROM Products WHERE id=:id";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para consultar todas los productos
function getProducts($id_store){
    $query = "SELECT p.id AS id, p.code AS code, p.name AS name, p.date_added AS date_added, p.price AS price, c.name AS name_c, p.stock AS stock 
                FROM Products AS p 
                JOIN Categories AS c ON p.id_categories = c.id
                WHERE p.id_store=:id_store";
    $data = array('id_store' => $id_store);
    
    $result = Database::execute($query, $data);
    $products = array();
    foreach($result as $row){
        array_push($products, $row);
    }

    return $products;
}

// Método para obtener un registro de un producto en especifico
function searchProduct($id){
    $query = "SELECT p.code AS code, p.name AS name, p.price AS price, p.stock AS stock, p.id_categories AS id_categories, c.name AS name_category
                FROM Products AS p
                JOIN Categories AS c ON p.id_categories = c.id
                WHERE p.id=:id";
    $data = array('id' => $id);
    
    $result = Database::execute($query, $data);
    $store = $result[0];

    return $store;
}

// Método para obtener el número total de registros en la tienda
function getCountProducts($id_store){
    $query = "SELECT COUNT(id) AS total FROM Products WHERE id_store=:id_store";
    $data = array('id_store' => $id_store);
    
    $result = Database::execute($query, $data);
    $total = $result[0]['total'];

    return $total;
}

?>