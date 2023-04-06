<?php

// El controlador principal es aquel que maneja todas las rutas y redirecciona
// a la página indicada
require_once "controller/MainController.php";
$controller = new MainController();
$controller->route();

?>