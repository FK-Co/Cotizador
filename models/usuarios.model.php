<?php
    require_once "conexion.php";
    class mdlUsers{
        static public function mdlFetchUsers($table){
                $stmt=Conection::conectar()-> prepare("SELECT * FROM $table");
                $stmt ->execute();
                $results = $stmt->fetchAll();
            
                return $results; // Retorna los resultados

            }
    }

?>