<?php
// Se trae el código para conectar con la base de datos
require_once "model/db.php";

// Método para insertar una categoria
function insertCategories($data){
    $query = "INSERT INTO Categories(name, description, date_added, id_store) VALUES (:name, :description, NOW(), :id_store)";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para actualizar una categoria
function updateCategory($data){
    $query = "UPDATE Categories SET name=:name, description=:description WHERE id=:id";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para eliminar una categoria
function deleteCategory($data){
    $query = "DELETE FROM Categories WHERE id=:id";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para consultar todas las categorias
function getCategories($id_store){
    $query = "SELECT id, name, description, date_added, id_store FROM Categories WHERE id_store=:id_store";
    $data = array('id_store' => $id_store);
    
    $result = Database::execute($query, $data);
    $categories = array();
    foreach($result as $row){
        array_push($categories, $row);
    }

    return $categories;
}

// Método para obtener un registro de una categoria en especifico
function searchCategory($id){
    $query = "SELECT name, description FROM Categories WHERE id=:id";
    $data = array('id' => $id);
    
    $result = Database::execute($query, $data);
    $store = $result[0];

    return $store;
}

?>