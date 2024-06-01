<?php
    class ctrMarcas{
        static public function ctrFetchMarcasEdit($item, $value)
        {
            $table = "marcas";
            // Intenta obtener las marcas desde el modelo
            try {
                $marcas = mdlMarcas::mdlFetchMarcasEdit($table, $item, $value);
                return $marcas;
            } catch (Exception $e) {
                // Manejo de errores si ocurre una excepción
                return "Error: " . $e->getMessage();
            }
        }
        static public function ctrGetMarcas(){
            $table = "marcas";
              // Intenta obtener las marcas desde el modelo
            try {
            $marcas = mdlMarcas::mdlGetMarcas($table);
            return $marcas;
        } catch (Exception $e) {
            // Manejo de errores si ocurre una excepción
            return "Error: " . $e->getMessage();
        }
        }
        static public function ctrFetchMarcas($item, $value){
            $table = "marcas";
              // Intenta obtener las marcas desde el modelo
            try {
            $marcas = mdlMarcas::mdlFetchMarcas($table, $item, $value);
            return $marcas;
        } catch (Exception $e) {
            // Manejo de errores si ocurre una excepción
            return "Error: " . $e->getMessage();
        }
        }
        static public function ctrEditMarcas()
        {
            if (isset($_POST["idMarcaE"])) {
                $data = array(
                    "idMarcaE" => $_POST["idMarcaE"],
                    "nom_marcaE" => $_POST["nom_marcaE"],
                );
                $table = "marcas";
                $respuesta = mdlMarcas::mdlEditMarcas($table, $data);
                if ($respuesta == "ok") {
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "¡CORRECTO!",
                            text: "La marca ha sido editada correctamente",
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
        static public function ctrDeleteMarcas($id)
        {
            $table = "marcas";
            $response = mdlMarcas::mdlDeleteMarcas($table, $id);
            return $response;
        }
        static public function ctrSaveMarcas()
        {
            if (isset($_POST["nom_marca"])) {
                // Procesar los datos del formulario
                $data = array(
                    "nom_marca" => $_POST["nom_marca"],
                );
                $table = "marcas";
    
                $response = mdlMarcas::mdlSaveMarcas($table, $data);
    
                if ($response == "ok") {
                    echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "¡CORRECTO!",
                            text: "La marca ha sido creado correctamente",
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
