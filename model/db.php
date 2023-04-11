<?php

include "model/config.php";

class Database {
    private static $connection;
    
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
	
	public static function execute($query, $parameter = null) {
        try {
            $db = self::getConnection();
            $stmt = $db->prepare($query);

            // binding parameter
			if ($parameter != null) {
				foreach ($parameter as $key => $param) {
					$stmt->bindValue(':'.$key, $param);
                }
            }
            
            //executing and returning
            $stmt->execute();
            try {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                $result = array(false);
            }
            
            return $result;
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
	
}
?>