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

?>