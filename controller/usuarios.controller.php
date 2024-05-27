<?php
    class ctrUsers{ // Método para obtener usuarios de la base de datos
        static public function ctrFetchUsersEdit($item, $value){
            $table = "usuarios";
            // Intenta obtener los usuarios desde el modelo
            try {
                $users = mdlUsers::mdlFetchUsersEdit($table, $item, $value);
                return $users;
            } catch (Exception $e) {
                // Manejo de errores si ocurre una excepción
                return "Error: " . $e->getMessage();
            }
        }
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
        static public function ctrSaveUsers() {
            if(isset($_POST["nom_usuarios"])) {
                    // Procesar los datos del formulario
                    $cryptPassword = crypt($_POST["pass_user"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    $data = array(
                        "nom_usuario" => $_POST["nom_usuarios"],
                        "nom_user" => $_POST["nom_user"],
                        "pass_user" => $cryptPassword,
                        "rol_user" => $_POST["rol_user"],
                    );
                $table = "usuarios";

                $response = mdlUsers::mdlSaveUsers($table, $data);

                if($response =="ok"){
                    echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "¡CORRECTO!",
                        text: "El usuario ha sido creado correctamente",
                        showConfirmButton: true,    
                        confirmButtonText: "Cerrar"
                    }).then((result)=>{
                        if(result.value){
                            history.back();
                        }
                    });
                    </script>';
                } else{
                    echo "<div class='alert alert-danger mt-3 small'>Registro fallido</div>";
                }
                }
            }
        }
        ?>
