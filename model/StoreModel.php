<?php
// Se trae el código para conectar con la base de datos
require_once "model/db.php";

// Método para insertar una tienda
function insertStore($data){
    $query = "INSERT INTO Store(name, active) VALUES (:name, :active)";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para actualizar una tienda
function updateStore($data){
    $query = "UPDATE Store SET name=:name, active=:active WHERE id=:id";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para eliminar una tienda
function deleteStore($data){
    $query = "DELETE FROM Store WHERE id=:id";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para consultar todas las tiendas
function getStores(){
    $query = "SELECT id, name, active FROM Store";
    
    $result = Database::execute($query, null);
    $stores = array();
    foreach($result as $row){
        array_push($stores, $row);
    }

    return $stores;
}

// Método para consultar todas las tiendas
function getNameStore($id){
    $query = "SELECT name FROM Store WHERE id=:id";
    $data = array('id' => $id);
    
    $result = Database::execute($query, $data);
    $name = $result[0]['name'];

    return $name;
}


function searchStore($id){
    $query = "SELECT name, active FROM Store WHERE id=:id";
    $data = array('id' => $id);
    
    $result = Database::execute($query, $data);
    $store = $result[0];

    return $store;
}

?>