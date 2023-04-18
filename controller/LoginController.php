<?php

// Clase LoginController: Se encarga de la comunicación entre el modelo del usuario y las vistas y rutas relacionadas con el inicio de sesión

class LoginController {
    // Ruta relativa hacía la vista de login
    private $viewLogin = "view/login.php";
    // Ruta relativa hacía el modelo del usuario
    private $modelUser = "model/UserModel.php";

    // Método que carga la vista de login
    public function loadPage(){
        $page = array("Log in", "");
        include ($this->viewLogin);
    }
    
    // Método que destruye todas las variables de la sesión y la sesión actual
    public function logOut($popup){
        session_start();
        $_SESSION = array();
        session_destroy();
        $this->loadPage();
    }
    
    // Método que carga el modelo de usuarios
    private function requireModelUser(){
        require_once $this->modelUser;
    }
    
    //Método para checar si los datos ingresados en le formulario de inicio de sesión son los correctos
    public function check(){
        if(isset($_POST['user']) && isset($_POST['pass'])){
            session_start(); // Se inicia la sesión
            $this->requireModelUser(); // Se llama a los métodos del modelo de usuarios
        
            $username =  $_POST['user'];
            $password =  hash('sha256',$_POST['pass']); // La contraseña está encriptada en la base de datos, por lo que se convierte para realizar comparaciones
            $filterCredential = array('username'=>$username,'password'=>$password); // Se reune las credenciales por medio de un array 
            
            // Se solicita la información del usuario para verificar si existe
            $result = searchUserLogin($filterCredential); 
            
            // si se trae al menos una consulta, se guarda los datos en una variable SESSION
            if(count($result) > 1){
                $_SESSION['id'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['type'] = $result['type'];
                $_SESSION['toast'] = array();
                
                // Para la respuesta a ajax, se indica si la solicitud fue exitosa o no, y en caso de serlo, se envia hacia el dashboard
                if ($_SESSION['type'] == 1) {
                    $_SESSION['id_store'] = -1;
                    return json_encode(array('exito' => true, 'url' => 'index.php?controller=StoreController&action=loadPage'));
                } else {
                    $_SESSION['id_store'] = $result['id_store'];
                    require_once "model/StoreModel.php";
                    $_SESSION['name_store'] = getNameStore($_SESSION['id_store']);
                    return json_encode(array('exito' => true, 'url' => 'index.php?controller=DashboardController&action=loadPage'));
                }
                
            } else {
                return json_encode(array('exito' => false));
            }
        }
    }
}

?>
