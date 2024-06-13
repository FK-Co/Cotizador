<?php
require_once "../controller/categorias.controller.php";
require_once "../models/categorias.model.php";

class AjaxCat
{
    public $idCat;
    public function ajaxEditCat()
    {
        $item = "id_cat";
        $value = $this->idCat;
        $response = ctrCat::ctrFetchCatEdit($item, $value);
        echo json_encode($response);
    }
    public $idDelete;
    public function ajaxDeleteCat()
    {
        $id = $this->idDelete;
        $response = ctrCat::ctrDeleteCat($id);
        echo $response;
    }
}

if (isset($_POST["idCat"])) {
    $edit = new AjaxCat();
    $edit->idCat = $_POST["idCat"];
    $edit->ajaxEditCat();
}

//eliminar categoria

if (isset($_POST["idCatE"])) {
    $delete = new AjaxCat();
    $delete->idDelete = $_POST["idCatE"];
    $delete->ajaxDeleteCat();
}
?>