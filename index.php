<?php 
include "controller/cotizador.controller.php";
include "controller/usuarios.controller.php";
include "controller/roles.controller.php";
include "controller/marcas.controller.php";
include "controller/categorias.controller.php";
include "models/marcas.model.php";
include "models/roles.model.php";
include "models/categorias.model.php";
include "models/usuarios.model.php";
    $cotizador = new ControllerCotizador();
    $cotizador -> ctrCotizador();