<?php

// Clase UserController: Se encarga de la comunicación entre el modelo del usuario y las vistas y rutas relacionadas con el inicio de sesión
class UserController {
    // Vista de la tabla de usuarios
    private $viewUsers = "view/users.php";
    // Modelo de usuarios
    private $modelUsers = "model/UserModel.php";

    // Método para cargar la página
    public function loadPage(){
        $this->validateSession();
        $page = array("Usuarios", "itemUsuarios");
        include ($this->viewUsers);
    }

    public function addUserPage(){
        $this->validateSession();
        $page = array("Añadir Usuarios", "");
        include ("view/addUser.php");
    }

    // Método para validar si ya se inicio sesión
    private function validateSession(){
        session_start();
        if (count($_SESSION) == 0){
            header("Location: index.php");
        }
    }

    // Método para obtener el código del modelo del usuario
    private function requireModelUsers(){
        require_once $this->modelUsers;
    }

    public function addUsers(){
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['lastname_p']) && isset($_POST['lastname_m']) && isset($_POST['email'])){
            session_start(); // Se inicia la sesión
            $this->requireModelUsers(); // Se llama a los métodos del modelo de usuarios
            
            $name =  $_POST['name'];
            $lastname_p =  $_POST['lastname_p'];
            $lastname_m =  $_POST['lastname_m'];
            $username =  $_POST['username'];
            $password =  hash('sha256',$_POST['password']); // La contraseña está encriptada en la base de datos, por lo que se convierte para realizar comparaciones
            $email =  $_POST['email'];
            $data = array('username'=>$username,'password'=>$password,'type'=>2, 'name'=>$name, 'lastname_p'=>$lastname_p, 'lastname_m'=>$lastname_m, 'email'=>$email, 'id_store'=>$_SESSION['id_store']); // Los valores a ingresar en un registro de tienda
            
            // Se inserta el registro
            $result = inserUser($data);

            if ($result) {
                return json_encode(array('exito' => true));
            } else {
                return json_encode(array('exito' => false));
            }
        }
    }
}

?>