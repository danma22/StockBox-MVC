<?php
require_once "model/db.php";

// Método para insertar una tienda
function inserUser($data){
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

function searchUserLogin($data){
    $query = "SELECT id, username, password, type FROM Users WHERE username=:username AND password=:password";
    
    $result = Database::execute($query, $data);
    $users = array();
    foreach($result as $row){
        array_push($users, $row);
    }

    return $users;
}


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

?>