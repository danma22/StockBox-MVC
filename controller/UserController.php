<?php

// Clase UserController: Se encarga de la comunicación entre el modelo del usuario y las vistas y rutas relacionadas con el usuario
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
    
    // Método para mostrar la vista para añadir un usuario 
    public function addUserPage(){
        $this->validateSession();
        $page = array("Añadir Usuarios", "");
        include ("view/addUser.php");
    }

    // Método para mostrar la vista para actualizar un usuario
    public function updateUserPage($id_user){
        $id_user = (int)$id_user;
        $this->validateSession();
        $page = array("Actualizar Usuario", "");
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

    // Método para enviar los datos del formulario para añadir un usuario
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
            $result = insertUser($data);

            if ($result) {
                $_SESSION['toast'] = array('exito' => true, 'header' => "¡Usuario agregado!", 'body' => 'El usuario indicado ha sido registrada con éxito');
                return json_encode(array('exito' => true));
            } else {
                $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'El usuario indicado no ha sido registrado, pruebe más tarde');
                return json_encode(array('exito' => false));
            }
        }
    }

    // Método para enviar los datos del formulario para actualizar un usuario
    public function updUsers(){
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['lastname_p']) && isset($_POST['lastname_m']) && isset($_POST['email']) && isset($_POST['id'])){
            session_start(); // Se inicia la sesión
            $this->requireModelUsers(); // Se llama a los métodos del modelo de usuarios
        
            $name =  $_POST['name'];
            $lastname_p =  $_POST['lastname_p'];
            $lastname_m =  $_POST['lastname_m'];
            $username =  $_POST['username'];
            $password =  hash('sha256',$_POST['password']); // La contraseña está encriptada en la base de datos, por lo que se convierte para realizar comparaciones
            $email =  $_POST['email'];
            $id = $_POST['id'];
            $data = array('username'=>$username,'password'=>$password, 'name'=>$name, 'lastname_p'=>$lastname_p, 'lastname_m'=>$lastname_m, 'email'=>$email, 'id'=>$id); // Los valores a actualizar en un registro de usuario
            
            // Se actualiza el registro
            $result = updateUser($data);

            if ($result) {
                $_SESSION['toast'] = array('exito' => true, 'header' => "¡Usuario actualizado!", 'body' => 'El usuario indicado ha sido actualizado con éxito');
                return json_encode(array('exito' => true));
            } else {
                $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'El usuario indicado no ha sido actualizado, pruebe más tarde');
                return json_encode(array('exito' => false));
            }
        }
    }

    // Método para enviar los datos del formulario para eliminarlo
    public function delUsers($id){
        session_start(); // Se inicia la sesión
        $this->requireModelUsers(); // Se llama a los métodos del modelo de usuarios

        $data = array('id'=>$id); // Registro a eliminar
        
        // Se elimina el registro
        $result = deleteUser($data);

        if ($result) {
            $_SESSION['toast'] = array('exito' => true, 'header' => "Usuario eliminado!", 'body' => 'El usuario indicado ha sido eliminado con éxito');
        } else {
            $_SESSION['toast'] = array('exito' => false, 'header' => "¡Sin éxito!", 'body' => 'El usuario indicado no ha sido eliminado, pruebe más tarde');
        }

        header("Location: index.php?controller=UserController&action=loadPage");
    }
}

?>