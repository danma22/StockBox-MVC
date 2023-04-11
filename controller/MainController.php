<?php

// Clase MainController que permite redirigir las rutas de acuerdo al controlador y la acción indicada
class MainController{
    public function route(){
        // Se verifica si existe una variable controlador 
        if(isset($_GET['controller'])){
            $controller = $_GET['controller'];
        }else{
            $controller = 'LoginController'; //default
        }

        // Se verifica si existe una variable acción 
        if(isset($_GET['action'])){
            $action = $_GET['action'];
        }else{
            $action = 'loadPage'; //default
        }

        // Se verifica si existe una variable de datos 
        if(isset($_GET['data'])){
            $data = $_GET['data'];
        }else{
            $data = ''; //default
        }

        // Se importa el código del controlador indicado
        include_once './controller/'.$controller.'.php';

        // Se crea una instancia del controlador
        $controller = new $controller();
        return $controller->$action($data);
    }
}


?>