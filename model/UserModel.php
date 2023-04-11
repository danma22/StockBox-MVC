<?php
require_once "model/db.php";

function getUsers($data){
    $query = "SELECT id, username, password, type FROM Users WHERE username=:username AND password=:password";
    
    $result = Database::execute($query, $data);
    $users = array();
    foreach($result as $row){
        array_push($users, $row);
    }

    return $users;
}

?>