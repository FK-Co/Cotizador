<?php
require_once "../controller/roles.controller.php";
require_once "../models/roles.model.php";

class AjaxRoles
{
    public $idRol;
    public function ajaxEditRoles()
    {
        $item = "id_rol";
        $value = $this->idRol;
        $response = ctrRoles::ctrFetchRolesEdit($item, $value);
        echo json_encode($response);
    }
    public $idDelete;
    public function ajaxDeleteRoles()
    {
        $id = $this->idDelete;
        $response = ctrRoles::ctrDeleteRoles($id);
        echo $response;
    }
}

if (isset($_POST["idRol"])) {
    $edit = new AjaxRoles();
    $edit->idRol = $_POST["idRol"];
    $edit->ajaxEditRoles();
}

//eliminar rol

if (isset($_POST["idRolE"])) {
    $delete = new AjaxRoles();
    $delete->idDelete = $_POST["idRolE"];
    $delete->ajaxDeleteRoles();
}
?>