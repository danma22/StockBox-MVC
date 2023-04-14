<?php

// Clase DashboardController: Se encarga de la comunicación entre  el dashboard y la información que muestra

class DashboardController {
    // Ruta relativa hacía la vista de login
    private $viewDashboard = "view/dashboard.php";

    // Método que carga la vista de login
    public function loadPage(){
        $this->validateSession();
        $page = array("Inicio", "itemInicio");
        include ($this->viewDashboard);
    }

    // Método para validar si ya se inicio sesión
    private function validateSession(){
        session_start();
        if (count($_SESSION) == 0){
            header("Location: index.php");
        }
    }
}

?>
