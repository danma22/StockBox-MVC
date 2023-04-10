<?php
require_once "model/db.php";

function insertUser($user){
    //ho ottenuto il codice della provincia, proseguo.
    $query = "INSERT INTO User(email,username,password,name,surname,provincia,address,picture,birthdate,description,banner) VALUES (:email,:username,:password,:name,:surname,:provincia,:address,:picture,:birthdate,:description,:banner)";

    unset($parameters);
    $parameters = array(
        "username" => $user->getUsername(),
        "email" => $user->getEmail(),
        "password" => $user->getPassword(),
        "name" => $user->name,
        "surname" => $user->surname,
        "provincia" => $user->provincia,
        "address" => $user->address,
        "picture" => $user->picture,
        "birthdate" => $user->birthdate,
        "description" => $user->description,
        "banner" => $user->banner
    );

    if(Database::execute($query, $parameters)){
        //ho inserito l'utente
        return true;
    }
    //non ho inserito l'utente
    return false;
}


function getUsers($parametersValues){
    $queryColums = ["id",
                    "username",
                    "password",
                    "type"];
    
    $queryTable = "Users";
    
    $result = Database::getTuples($queryColums, $queryTable, null, $parametersValues, null);
    $users = array();
    foreach($result as $row){
        array_push($users, $row);
    }

    return $users;
}

?>