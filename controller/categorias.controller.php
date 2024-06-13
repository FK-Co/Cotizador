<?php
    class ctrCat{
        static public function ctrFetchCatEdit($item, $value)
        {
            $table = "categorias";
            // Intenta obtener las categorias desde el modelo
            try {
                $categorias = mdlCat::mdlFetchCatEdit($table, $item, $value);
                return $categorias;
            } catch (Exception $e) {
                // Manejo de errores si ocurre una excepción
                return "Error: " . $e->getMessage();
            }
        }
        static public function ctrGetCat(){
            $table = "categorias";
              // Intenta obtener las categorias desde el modelo
            try {
            $categorias = mdlCat::mdlGetCat($table);
            return $categorias;
        } catch (Exception $e) {
            // Manejo de errores si ocurre una excepción
            return "Error: " . $e->getMessage();
        }
        }
        static public function ctrFetchCat($item, $value){
            $table = "categorias";
              // Intenta obtener las categorias desde el modelo
            try {
            $categorias = mdlCat::mdlFetchCat($table, $item, $value);
            return $categorias;
        } catch (Exception $e) {
            // Manejo de errores si ocurre una excepción
            return "Error: " . $e->getMessage();
        }
        }
        static public function ctrEditCat()
        {
            if (isset($_POST["idCatE"])) {
                $data = array(
                    "idCatE" => $_POST["idCatE"],
                    "nom_catE" => $_POST["nom_catE"],
                );
                $table = "categorias";
                $respuesta = mdlCat::mdlEditCat($table, $data);
                if ($respuesta == "ok") {
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "¡CORRECTO!",
                            text: "La categoría ha sido editada correctamente",
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
        static public function ctrDeleteCat($id)
        {
            $table = "categorias";
            $response = mdlCat::mdlDeleteCat($table, $id);
            return $response;
        }
        static public function ctrSaveCat()
        {
            if (isset($_POST["nom_cat"])) {
                // Procesar los datos del formulario
                $data = array(
                    "nom_cat" => $_POST["nom_cat"],
                );
                $table = "categorias";
    
                $response = mdlCat::mdlSaveCat($table, $data);
    
                if ($response == "ok") {
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "¡CORRECTO!",
                            text: "La categoría ha sido creado correctamente",
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
