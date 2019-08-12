<?php
////////////clases///////////////
require_once'controladores/ControladorProductos.php';
require_once'controladores/ControladorVentas.php';
require_once'controladores/ControladorCategorias.php';
require_once'controladores/ControladorUsuarios.php';
require_once'controladores/ControladorClientes.php';
require_once 'controladores/ControladorPlantilla.php';
require_once 'controladores/ControladorTipoReparacion.php';
require_once 'controladores/ControladorDispositivos.php';

//////////////////modelos/////////////////
require_once'class/Productos.php';
require_once'class/Ventas.php';
require_once'class/Categorias.php';
require_once'class/Usuarios.php';
require_once'class/Clientes.php';
require_once 'class/TipoReparacion.php';
require_once 'class/Dispositivos.php';

//////////////////Extenciones/////////////
//vendor es la extencion que permite conectar php con 
//diversas impresoras de tickets en el mercado
require_once 'extensiones/vendor/autoload.php';



/////////Aqui se manda llamar la plantilla//////////////////
$platilla= new ControladorPlantilla();
$platilla->ctrPlantilla();
?>