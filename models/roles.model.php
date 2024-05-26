<?php
    require_once "conexion.php";
    class mdlRoles{
        static public function mdlGetRoles($table){
            $stmt=Conection::conectar()-> prepare("SELECT * FROM $table");
            $stmt ->execute();
            $results = $stmt->fetchAll();  
            return $results; // Retorna los resultados
        }
        static public function mdlFetchRoles($table, $item, $value){
                $stmt=Conection::conectar()-> prepare("SELECT * FROM $table WHERE $item =:$item");
                $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
                $stmt ->execute();
                $results = $stmt->fetch();
                return $results; // Retorna los resultados
            }
    }

