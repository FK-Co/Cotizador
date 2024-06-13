<?php
    require_once "conexion.php";
    class mdlCat{
        static public function mdlFetchCatEdit($table, $item, $value) {
            try {
                $stmt = Conection::conectar()->prepare("SELECT * FROM $table WHERE $item = :value");
                $stmt->bindParam(":value", $value, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    return $result;
                } else {
                    return array("error" => "No se encontró la categoría");
                }
            } catch (PDOException $e) {
                return array("error" => $e->getMessage());
            }
        }

        static public function mdlGetCat($table){
            $stmt=Conection::conectar()-> prepare("SELECT * FROM $table");
            $stmt ->execute();
            $results = $stmt->fetchAll();  
            return $results; // Retorna los resultados
        }
        static public function mdlFetchCat($table, $item, $value){
                $stmt=Conection::conectar()-> prepare("SELECT * FROM $table WHERE $item =:$item");
                $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
                $stmt ->execute();
                $results = $stmt->fetch();
                return $results; // Retorna los resultados
            }
        static public function mdlSaveCat($table, $data)
        {
        try {
            $stmt = Conection::conectar()->prepare("INSERT INTO $table(nom_cat) VALUES (:CAT)");
            $stmt->bindParam(":CAT", $data["nom_cat"], PDO::PARAM_STR);

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
        static public function mdlEditCat($table, $data)
        {
            $stmt = Conection::conectar()->prepare("UPDATE $table SET nom_cat=:CAT_E WHERE id_cat=:IDE");
            $stmt->bindParam(":IDE", $data["idCatE"], PDO::PARAM_INT);
            $stmt->bindParam(":CAT_E", $data["nom_catE"], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return "ok";
            } else {
                echo "error";
            }
            $stmt = null;
        }
        static public function mdlDeleteCat($table, $id){
        
            $stmt = Conection::conectar()->prepare("DELETE FROM $table WHERE id_cat =:id");
    
            $stmt -> bindParam(":id", $id, PDO::PARAM_INT);
    
    
            if($stmt -> execute()){
    
                return "ok";
            
            }else{
    
                echo "\nPDO::errorInfo():\n";
                print_r(Conection::conectar()->errorInfo());
    
            }
    
    
        }
    }

