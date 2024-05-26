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
                if(isset($_FILES["subirImgUser"]["tmp_name"]) && !empty($_FILES["subirImgUser"]["tmp_name"])) {
                    // Directorio donde se guardaran las fotos
                    $directory = "views/images/users";
        
                    $file_name = $_FILES["subirImgUser"]["name"];
                    $file_tmp = $_FILES["subirImgUser"]["tmp_name"];
                    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
                    $allowed_ext = array("jpg", "jpeg", "png");
        
                    // Verificar la extensión del archivo
                    if (!in_array($file_ext, $allowed_ext)) {
                        echo '<script>
                                swal({
                                    type:"error",
                                    title: "¡CORREGIR!",
                                    text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result){
                                    if(result.value){
                                        history.back();
                                    }
                                });
                              </script>';
                        return;
                    }
        
                    // Limitar el tamaño del archivo (por ejemplo, 2MB)
                    if ($_FILES["subirImgUser"]["size"] > 2 * 1024 * 1024) {
                        echo "El tamaño del archivo es demasiado grande.";
                        return;
                    }
        
                    // Crear un identificador único para el nombre del archivo
                    $random = uniqid();
                    $url = $directory . "/" . $random . "." . $file_ext;
        
                    // Crear la imagen redimensionada
                    $newWidth = 400;
                    $newHeight = 382;
                    $origin = imagecreatefromjpeg($file_tmp); // Dependiendo del tipo de archivo
                    $destiny = imagecreatetruecolor($newWidth, $newHeight);
                    imagecopyresampled($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($origin), imagesy($origin));
                    
                    // Guardar la imagen redimensionada
                    if(!imagejpeg($destiny, $url)) {
                        echo "Error al guardar la imagen redimensionada.";
                        return;
                    }
        
                    // Eliminar la imagen original
                    imagedestroy($origin);
                    imagedestroy($destiny);
        
                    // Procesar los datos del formulario
                    $cryptPassword = crypt($_POST["pass_user"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    $data = array(
                        "nom_usuario" => $_POST["nom_usuarios"],
                        "nom_user" => $_POST["nom_user"],
                        "pass_user" => $cryptPassword,
                        "rol_user" => $_POST["rol_user"],
                        "foto" => $url
                    );
        
                    echo "</pre>";
                    print_r($data);
                    echo "</pre>";
                $table = "usuarios";

                $response = mdlUsers::mdlSaveUsers($table, $data);

                if($response =="ok"){
                    echo '<script>
                    swal({
                        type:"success",
                        title: "¡CORRECTO!",
                        text: "El usuario ha sido creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
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
        
    }
