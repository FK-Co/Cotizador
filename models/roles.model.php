<?php
    require_once "conexion.php";
    class mdlRoles{
        static public function mdlFetchRolesEdit($table, $item, $value) {
            try {
                $stmt = Conection::conectar()->prepare("SELECT * FROM $table WHERE $item = :value");
                $stmt->bindParam(":value", $value, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    return $result;
                } else {
                    return array("error" => "No se encontró el rol");
                }
            } catch (PDOException $e) {
                return array("error" => $e->getMessage());
            }
        }

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
        static public function mdlSaveRoles($table, $data)
        {
        try {
            $stmt = Conection::conectar()->prepare("INSERT INTO $table(nom_rol) VALUES (:ROL)");
            $stmt->bindParam(":ROL", $data["nom_rol"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                echo "error";
                return "error";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return "error";
        } finally {
            $stmt = null;
        }
        }
        static public function mdlEditRoles($table, $data)
        {
            $stmt = Conection::conectar()->prepare("UPDATE $table SET nom_rol=:ROL_E WHERE id_rol=:IDE");
            $stmt->bindParam(":IDE", $data["idRolE"], PDO::PARAM_INT);
            $stmt->bindParam(":ROL_E", $data["nom_rolE"], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "ok";
            } else {
                echo "error";
            }
            $stmt = null;
        }
        static public function mdlDeleteRoles($table, $id){
        
            $stmt = Conection::conectar()->prepare("DELETE FROM $table WHERE id_rol =:id");
    
            $stmt -> bindParam(":id", $id, PDO::PARAM_INT);
    
    
            if($stmt -> execute()){
    
                return "ok";
            
            }else{
    
                echo "\nPDO::errorInfo():\n";
                print_r(Conection::conectar()->errorInfo());
    
            }
    
    
        }
    }

