<?php
    class ctrRoles{
        static public function ctrFetchRoles($item, $value){
            $table = "roles";
              // Intenta obtener los roles desde el modelo
            try {
            $roles = mdlRoles::mdlFetchRoles($table, $item, $value);
            return $roles;
        } catch (Exception $e) {
            // Manejo de errores si ocurre una excepción
            return "Error: " . $e->getMessage();
        }
        }
    }
