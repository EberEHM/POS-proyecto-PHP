<?php

require_once "../controladores/ControladorProductos.php";
require_once "../class/Productos.php";

class AjaxProductos{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;
  public $traerProductos;
  public $nombreProducto;

  public function ajaxCrearCodigoProducto(){

    $item = "idCategoria";
    $valor = $this->idCategoria;
    $orden = null;

    $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

    echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idPro;

  public function ajaxEditarProducto(){

    if ($this->traerProductos == "ok") {

      $item = null;
      $valor = null;
      $orden = "idProducto";

      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

      echo json_encode($respuesta);
      
    }else if($this->nombreProducto != ""){

    
        $item = "descripcion";
        $valor = $this->nombreProducto;
        $orden = null;

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

        echo json_encode($respuesta);      


    }else{

        $item = "idProducto";
        $valor = $this->idPro;
        $orden = null;

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

        echo json_encode($respuesta);
      }

    }

    /*=============================================
  ACTIVAR OPTIMIZACION
  =============================================*/ 

  public $activarOptimizacion;
  public $activarIdOptimizacion;


  function ajaxActivarOptimizacion(){

    $tabla = "optimizarproductos";

    $item1 = "estado";
    $valor1 = $this->activarOptimizacion;

    $item2 = "id";
    $valor2 = $this->activarIdOptimizacion;

    $respuesta = Productos::actualizarOptimizacion($tabla, $item1, $valor1, $item2, $valor2);

  }

  }




/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/ 

if(isset($_POST["idCategoria"])){

  $codigoProducto = new AjaxProductos();
  $codigoProducto -> idCategoria = $_POST["idCategoria"];
  $codigoProducto -> ajaxCrearCodigoProducto();

}
/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idPro"])){

  $editarProducto = new AjaxProductos();
  $editarProducto -> idPro = $_POST["idPro"];
  $editarProducto -> ajaxEditarProducto();

}

/*=============================================
      TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["traerProductos"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> traerProductos = $_POST["traerProductos"];
  $traerProductos -> ajaxEditarProducto();

}

/*=============================================
      TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["nombreProducto"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> nombreProducto = $_POST["nombreProducto"];
  $traerProductos -> ajaxEditarProducto();

}

/*=============================================
ACTIVAR OPTIMIZACION
=============================================*/ 

if(isset($_POST["activarOptimizacion"])){

  $activarUsuario = new AjaxProductos();
  $activarUsuario -> activarOptimizacion = $_POST["activarOptimizacion"];
  $activarUsuario -> activarIdOptimizacion = $_POST["activarIdOptimizacion"];
  $activarUsuario -> ajaxActivarOptimizacion();

}