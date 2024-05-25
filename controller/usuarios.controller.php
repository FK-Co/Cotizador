<?php
    class ctrUsers{ // Método para obtener usuarios de la base de datos
        static public function ctrFetchUsers(){
            $table = "usuarios";
            // Intenta obtener los usuarios desde el modelo
            try {
                $users = mdlUsers::mdlFetchUsers($table);
                return $users;
            } catch (Exception $e) {
                // Manejo de errores si ocurre una excepción
                return "Error: " . $e->getMessage();
            }
        }
    }
?>