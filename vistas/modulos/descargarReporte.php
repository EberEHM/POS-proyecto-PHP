<?php

require_once "../../class/Ventas.php";
require_once "../../controladores/ControladorVentas.php";
require_once "../../class/Clientes.php";
require_once "../../controladores/ControladorClientes.php";
require_once "../../class/Usuarios.php";
require_once "../../controladores/ControladorUsuarios.php";

$reporte= new ControladorVentas();
$reporte -> ctrDescargarReporte();
