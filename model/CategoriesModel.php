<?php
// Se trae el código para conectar con la base de datos
require_once "model/db.php";

// Método para insertar una categoria
function insertCategories($data){
    $query = "INSERT INTO Categories(name, description, date_added, id_store) VALUES (:name, :description, :date_added, :id_store)";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para consultar todas las categorias
function getCategories(){
    $query = "SELECT id, name, description, date_added, id_store FROM Categories";
    
    $result = Database::execute($query, null);
    $categories = array();
    foreach($result as $row){
        array_push($categories, $row);
    }

    return $categories;
}

?>