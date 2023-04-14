<?php

// Se llama a las constantes del archivo de configuración
include "model/config.php";

// Clase Database que permite tener la conexión con la base de datos
class Database {
    private static $connection;
    
    // A través de PDO se realiza la conexión y se devuelve para utilizarla en las consultas
    public static function getConnection(){
        if(!isset(self::$connection)){
            try{
                $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection = $conn;
            }catch(PDOException $e){
                echo $e->getMessage();
                die();//interrompe il caricamento della pagina
            }
        }
        return self::$connection;
    }
    
    // Este método permite ejecutar cualquier tipo de sentencia y devolver una respuesta
	public static function execute($query, $parameter = null) {
        try {
            // Se trae la conexión con la BD
            $db = self::getConnection();
            // Se prepara la sentencia
            $stmt = $db->prepare($query);

            // Se hace un binding de todos los parámetros indicados
			if ($parameter != null) {
				foreach ($parameter as $key => $param) {
					$stmt->bindValue(':'.$key, $param);
                }
            }
            
            // Se ejecuta la sentencia y se devuelve la respuesta
            $stmt->execute();
            try {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                $result = array(false);
            }
            
            return $result;
        }catch(PDOException $e){
            return array(false);
            echo "Connection failed: " . $e->getMessage();
        }
    }
	
}
?>