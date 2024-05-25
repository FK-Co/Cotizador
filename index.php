<?php 
include "controller/cotizador.controller.php";
include "controller/usuarios.controller.php";
include "models/usuarios.model.php";
    $cotizador = new ControllerCotizador();
    $cotizador -> ctrCotizador();