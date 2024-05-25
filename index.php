<?php 
include "controller/cotizador.controller.php";
include "controller/usuarios.controller.php";
include "controller/roles.controller.php";
include "models/roles.model.php";
include "models/usuarios.model.php";
    $cotizador = new ControllerCotizador();
    $cotizador -> ctrCotizador();