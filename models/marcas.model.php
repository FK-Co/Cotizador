<?php
    require_once "conexion.php";
    class mdlMarcas{
        static public function mdlFetchMarcasEdit($table, $item, $value) {
            try {
                $stmt = Conection::conectar()->prepare("SELECT * FROM $table WHERE $item = :value");
                $stmt->bindParam(":value", $value, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    return $result;
                } else {
                    return array("error" => "No se encontró la marca");
                }
            } catch (PDOException $e) {
                return array("error" => $e->getMessage());
            }
        }

        static public function mdlGetMarcas($table){
            $stmt=Conection::conectar()-> prepare("SELECT * FROM $table");
            $stmt ->execute();
            $results = $stmt->fetchAll();  
            return $results; // Retorna los resultados
        }
        static public function mdlFetchMarcas($table, $item, $value){
                $stmt=Conection::conectar()-> prepare("SELECT * FROM $table WHERE $item =:$item");
                $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
                $stmt ->execute();
                $results = $stmt->fetch();
                return $results; // Retorna los resultados
            }
        static public function mdlSaveMarcas($table, $data)
        {
        try {
            $stmt = Conection::conectar()->prepare("INSERT INTO $table(nom_marca) VALUES (:MARCA)");
            $stmt->bindParam(":MARCA", $data["nom_marca"], PDO::PARAM_STR);

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
        static public function mdlEditMarcas($table, $data)
        {
            $stmt = Conection::conectar()->prepare("UPDATE $table SET nom_marca=:MARCA_E WHERE id_marca=:IDE");
            $stmt->bindParam(":IDE", $data["idMarcaE"], PDO::PARAM_INT);
            $stmt->bindParam(":MARCA_E", $data["nom_marcaE"], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "ok";
            } else {
                echo "error";
            }
            $stmt = null;
        }
        static public function mdlDeleteMarcas($table, $id){
        
            $stmt = Conection::conectar()->prepare("DELETE FROM $table WHERE id_marca =:id");
    
            $stmt -> bindParam(":id", $id, PDO::PARAM_INT);
    
    
            if($stmt -> execute()){
    
                return "ok";
            
            }else{
    
                echo "\nPDO::errorInfo():\n";
                print_r(Conection::conectar()->errorInfo());
    
            }
    
    
        }
    }

