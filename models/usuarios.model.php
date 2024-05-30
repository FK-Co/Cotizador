<?php
require_once "conexion.php";
class mdlUsers
{
    static public function mdlFetchUsersEdit($table, $item, $value)
    {
        try {
            $stmt = Conection::conectar()->prepare("SELECT * FROM $table WHERE $item = :value");
            $stmt->bindParam(":value", $value, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
    static public function mdlFetchUsers($table)
    {
        $stmt = Conection::conectar()->prepare("SELECT * FROM $table");
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results; // Retorna los resultados

    }
    static public function mdlSaveUsers($table, $data)
    {
        try {
            $stmt = Conection::conectar()->prepare("INSERT INTO $table(usuario, password, nombre, rol) VALUES (:USUARIO, :PASS, :NOMBRE, :ROL)");
            $stmt->bindParam(":NOMBRE", $data["nom_usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":USUARIO", $data["nom_user"], PDO::PARAM_STR);
            $stmt->bindParam(":PASS", $data["pass_user"], PDO::PARAM_STR);
            $stmt->bindParam(":ROL", $data["rol_user"], PDO::PARAM_INT);

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
    static public function mdlEditUsers($table, $data)
    {
        $stmt = Conection::conectar()->prepare("UPDATE $table SET usuario=:NOMUSER_E , password=:PASSUSER_E , nombre=:NOM_E, rol=:ROL_E WHERE id=:IDE");
        $stmt->bindParam(":IDE", $data["idE"], PDO::PARAM_INT);
        $stmt->bindParam(":NOM_E", $data["nom_usuarioE"], PDO::PARAM_STR);
        $stmt->bindParam(":NOMUSER_E", $data["nom_userE"], PDO::PARAM_STR);
        $stmt->bindParam(":PASSUSER_E", $data["passE"], PDO::PARAM_STR);
        $stmt->bindParam(":ROL_E", $data["rol_userE"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            echo "error";
        }
        $stmt = null;
    }
    static public function mdlDeleteUsers($table, $id){
        
        $stmt = Conection::conectar()->prepare("DELETE FROM $table WHERE id =:id");

        $stmt -> bindParam(":id", $id, PDO::PARAM_INT);


        if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conection::conectar()->errorInfo());

		}


    }
}

