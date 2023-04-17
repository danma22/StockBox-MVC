<?php
require_once "model/db.php";

// Método para insertar una tienda
function insertUser($data){
    $query = "INSERT INTO Users(name, lastname_p, lastname_m, username, email, password, date_added, type, id_store) 
                VALUES (:name, :lastname_p, :lastname_m, :username, :email, :password, NOW(), :type, :id_store)";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para actualizar un usuario
function updateUser($data){
    $query = "UPDATE Users SET name=:name, lastname_p=:lastname_p, lastname_m=:lastname_m, username=:username, email=:email, password=:password WHERE id=:id";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para eliminar un usuario
function deleteUser($data){
    $query = "DELETE FROM Users WHERE id=:id";

    $result = Database::execute($query, $data);
    if(count($result) == 0){
        // Se devuelve true si se realizó la ejecución
        return true;
    }

    // Si no, entonce se devuelve false
    return false;
}

// Método para obtener un registro de un usuario en especifico para validar el login
function searchUserLogin($data){
    $query = "SELECT id, username, type, id_store FROM Users WHERE username=:username AND password=:password";
    
    $result = Database::execute($query, $data);
    $users = array();
    foreach($result as $row){
        array_push($users, $row);
    }

    if (count($users) == 0) {
        $user = array();
    } else {
        $user = $users[0];
    }

    return $user;
}

// Método para consultar todas los usuarios
function getUsers($id_store){
    $query = "SELECT * FROM Users WHERE id_store=:id_store";
    $data = array('id_store' => $id_store);
    
    $result = Database::execute($query, $data);
    $users = array();
    foreach($result as $row){
        array_push($users, $row);
    }

    return $users;
}

// Método para obtener un registro de un usuario en especifico
function searchUser($id){
    $query = "SELECT name, lastname_p, lastname_m, username, email FROM Users WHERE id=:id";
    $data = array('id' => $id);
    
    $result = Database::execute($query, $data);
    $store = $result[0];

    return $store;
}

// Método para obtener el número total de registros en la tienda
function getCountUsers($id_store){
    $query = "SELECT COUNT(id) AS total FROM Users WHERE id_store=:id_store";
    $data = array('id_store' => $id_store);
    
    $result = Database::execute($query, $data);
    $total = $result[0]['total'];

    return $total;
}

?>