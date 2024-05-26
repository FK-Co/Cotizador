<?php
require_once "../controller/usuarios.controller.php";
require_once "../models/usuarios.model.php";

class AjaxUsers {
    public $idUser;
    public function ajaxEditUser() {
        $item = "id";
        $value = $this->idUser;
        $response = ctrUsers::ctrFetchUsersEdit($item, $value);
        echo json_encode($response);
    }
}

if(isset($_POST["idUser"])) {
    $edit = new AjaxUsers();
    $edit->idUser = $_POST["idUser"];
    $edit->ajaxEditUser();
}
?>