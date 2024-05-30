<?php
require_once "../controller/usuarios.controller.php";
require_once "../models/usuarios.model.php";

class AjaxUsers
{
    public $idUser;
    public function ajaxEditUser()
    {
        $item = "id";
        $value = $this->idUser;
        $response = ctrUsers::ctrFetchUsersEdit($item, $value);
        echo json_encode($response);
    }
    public $idDelete;
    public function ajaxDeleteUser()
    {
        $id = $this->idDelete;
        $response = ctrUsers::ctrDeleteUsers($id);
        echo $response;
    }
}

if (isset($_POST["idUser"])) {
    $edit = new AjaxUsers();
    $edit->idUser = $_POST["idUser"];
    $edit->ajaxEditUser();
}

//eliminar usuario

if (isset($_POST["idUsuarioE"])) {
    $delete = new AjaxUsers();
    $delete->idDelete = $_POST["idUsuarioE"];
    $delete->ajaxDeleteUser();
}
?>