<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reptel system</title>
  <link rel="icon" href="vistas/img/plantilla/tel.png">


  <!-- Para los puntos de quiebre se necesita el <meta> ahi se encuentran los valores de escala-->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

   <!--=====================================
  PLUGINS DE CSS
  ======================================-->


  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css"><!--vercion sin comprimir-->
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

     <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">


<!------------------------------------------PLUGINS JS--------------------->
    <!-- jQuery 3 -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll es un scroll invisible para reducir tamanos de cajas de texto
    <script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>-->
    <!-- FastClick optimizacion en pantallas tactiles-->
    <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App base de admin LTE-->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <!-- DataTables -->
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <!-- SweetAlert 2 -->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    
    <!-- iCheck 1.0.1 -->
    <script src="vistas/plugins/iCheck/icheck.min.js"></script>

    <!-- InputMask -->
    <script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- jQuery number -->
    <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>

    <!-- daterangepicker http://www.daterangepicker.com/-->
  <script src="vistas/bower_components/moment/min/moment.min.js"></script>
  <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="vistas/bower_components/Chart.js/Chart.js"></script>

    
</head>

<!--*********************************************************** *
 *****************CUERPO DE LA PLANTILLA***************
 Eber Emanuel Hernandez Martinez 01/03/19
***********************************************************/-->
<!--***********Antes del sidebar-mini debe ir el sidebar-collapse para que al entrar este cerrada la barra************* */-->
<body class="hold-transition skin-green sidebar-collapse sidebar-mini login-page">
<!-- con login page ya se incluye el login-->


 

<?php
if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == 'ok') {
  # code...



echo '<div class="wrapper">';
/*********************
        *HEADER*
 ***********************/
include'modulos/header.php';

/*********************
        *MENU*
 ***********************/
include'modulos/menu.php';
/***************************************
        *Contenido*
 **************************************/
if (isset($_GET['ruta'])) {//si se encuentra una variable get con el nombre ruta..entra al codigo
  
  if ($_GET['ruta'] == 'inicio' || //si el valor de ruta es "inicio" entonces te manda a inicio
      $_GET['ruta'] == 'usuarios' ||//si el valor de ruta es "Usuarios"
      $_GET['ruta'] == 'categorias' ||//si el valor de ruta es categoria
      $_GET['ruta'] == 'productos' ||//si el valor de ruta es productos
      $_GET['ruta'] == 'clientes' ||//si el valor de ruta es productos
      $_GET['ruta'] == 'ventas' ||//si el valor de la ruta es ventas
      $_GET['ruta'] == 'crearVenta' ||//si el valor de la ruta es crearVenta
      $_GET['ruta'] == 'editarVenta' ||//si el valor de la ruta es editarVenta
      $_GET['ruta'] == 'tipoReparacion' ||//si el valor de la ruta es editarVenta
      $_GET['ruta'] == 'dispositivos' ||//si el valor de la ruta es editarVenta
      $_GET['ruta'] == 'entregarDispositivo' ||//si el valor de la ruta es editarVenta
      $_GET['ruta'] == 'registroDispositivos' ||//si el valor de la ruta es editarVenta


      $_GET['ruta'] == 'reporteDeVentas'||//si el valor de la ruta es reporteDeVentas

      $_GET['ruta'] == 'salir'){//si dan en salir

      include "modulos/".$_GET["ruta"].".php"; //aqui se establece la ruta dependiendo cual se detecte
//este sistema de rutas es mas eficiente y se necesita del docuemto ".htaccess"
//con esto las rutas son amigables
//se evita que entren sin permiso
//y es mas facil que escribir todas las rutas especificas siempre
 }else{

  include 'modulos/404.php'; //si el vaalor de la ruta no es ninguna de las anteriores

 }


}


/***************************************
             *Footer*
 **************************************/
include'modulos/footer.php';

echo '</div>';
}else{

	include'modulos/login.php';

}
?>
 


<!--//////////////////////////
          JS perzonalidados
//////////////////////////////////
 -->
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/ventas.js"></script>
<script src="vistas/js/reportes.js"></script>
<script src="vistas/js/tipoReparacion.js"></script>
<script src="vistas/js/dispositivos.js"></script>




</body>
</html>
