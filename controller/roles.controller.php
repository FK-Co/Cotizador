<?php
    class ctrRoles{
        static public function ctrFetchRolesEdit($item, $value)
        {
            $table = "roles";
            // Intenta obtener los roles desde el modelo
            try {
                $roles = mdlRoles::mdlFetchRolesEdit($table, $item, $value);
                return $roles;
            } catch (Exception $e) {
                // Manejo de errores si ocurre una excepción
                return "Error: " . $e->getMessage();
            }
        }
        static public function ctrGetRoles(){
            $table = "roles";
              // Intenta obtener los roles desde el modelo
            try {
            $roles = mdlRoles::mdlGetRoles($table);
            return $roles;
        } catch (Exception $e) {
            // Manejo de errores si ocurre una excepción
            return "Error: " . $e->getMessage();
        }
        }
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
        static public function ctrEditRoles()
        {
            if (isset($_POST["idRolE"])) {
                $data = array(
                    "idRolE" => $_POST["idRolE"],
                    "nom_rolE" => $_POST["nom_rolE"],
                );
                $table = "roles";
                $respuesta = mdlRoles::mdlEditRoles($table, $data);
                if ($respuesta == "ok") {
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "¡CORRECTO!",
                            text: "El rol ha sido editado correctamente",
                            showConfirmButton: true,    
                            confirmButtonText: "Cerrar"
                        }).then((result)=>{
                            if(result.value){
                                history.back();
                            }
                        });
                        </script>';
                } else {
                    echo "<div class='alert alert-danger mt-3 small'>Edición fallida</div>";
                }
            }
        }
        static public function ctrDeleteRoles($id)
        {
            $table = "roles";
            $response = mdlRoles::mdlDeleteRoles($table, $id);
            return $response;
        }
        static public function ctrSaveRoles()
        {
            if (isset($_POST["nom_rol"])) {
                // Procesar los datos del formulario
                $data = array(
                    "nom_rol" => $_POST["nom_rol"],
                );
                $table = "roles";
    
                $response = mdlRoles::mdlSaveRoles($table, $data);
    
                if ($response == "ok") {
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "¡CORRECTO!",
                            text: "El rol ha sido creado correctamente",
                            showConfirmButton: true,    
                            confirmButtonText: "Cerrar"
                        }).then((result)=>{
                            if(result.value){
                                history.back();
                            }
                        });
                        </script>';
                } else {
                    echo "<div class='alert alert-danger mt-3 small'>Registro fallido</div>";
                }
            }
        }
    }
