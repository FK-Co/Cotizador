<?php
    require_once "conexion.php";
    class mdlRoles{
        static public function mdlFetchRoles($table){
                $stmt=Conection::conectar()-> prepare("SELECT * FROM $table");
                $stmt ->execute();
                $results = $stmt->fetchAll();
                $stmt->close(); // Cierra la conexión

                return $results; // Retorna los resultados
            }
    }

?>