<?php
    class ctrRoles{
        static public function ctrFetchRoles(){
            $table = "roles";
            $respuesta = mdlRoles::mdlFetchRoles($table);
            return $respuesta;
        }
    }
?>