<?php
    class Conection{
        static public function conectar(){
            try {
                $link = new PDO("mysql:host=localhost;dbname=sistema_cotizacion", "root","sebas147");
                $link->exec("set names utf8mb4");
                return $link;
            } catch (PDOException $e) {
                // Manejo de errores
                echo "Error al conectar a la base de datos: " . $e->getMessage();
                return false;
            }
        }
    }
?>