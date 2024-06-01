<?php
require_once "../controller/marcas.controller.php";
require_once "../models/marcas.model.php";

class AjaxMarcas
{
    public $idMarca;
    public function ajaxEditMarcas()
    {
        $item = "id_marca";
        $value = $this->idMarca;
        $response = ctrMarcas::ctrFetchMarcasEdit($item, $value);
        echo json_encode($response);
    }
    public $idDelete;
    public function ajaxDeleteMarcas()
    {
        $id = $this->idDelete;
        $response = ctrMarcas::ctrDeleteMarcas($id);
        echo $response;
    }
}

if (isset($_POST["idMarca"])) {
    $edit = new AjaxMarcas();
    $edit->idMarca = $_POST["idMarca"];
    $edit->ajaxEditMarcas();
}

//eliminar Marca

if (isset($_POST["idMarcaE"])) {
    $delete = new AjaxMarcas();
    $delete->idDelete = $_POST["idMarcaE"];
    $delete->ajaxDeleteMarcas();
}
?>