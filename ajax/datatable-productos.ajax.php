<?php

require_once "../controladores/ControladorProductos.php";
require_once "../class/Productos.php";
 
require_once "../controladores/ControladorCategorias.php";
require_once "../class/Categorias.php";
 

class TablAbroductos{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

	public function mostrarTablAbroductos(){

		$item = null;
    	$valor = null;
    	$orden = "idProducto";

  		$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);	
		

          $item="id";
          $valor=1;

          $estado= ControladorProductos::ctrMostrarEstado($item, $valor);

            if($estado["estado"] != 0){

                    $datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($productos); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/ 

		  	$imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";

		  	/*=============================================
 	 		STOCK
  			=============================================*/ 

  			if($productos[$i]["stock"] <= 10){

  				$stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

  			}else if($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15){

  				$stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";

  			}

  			

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

  			if (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Almacen") {

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idPro='".$productos[$i]["idProducto"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button></div>"; 


  			}else{

		  	$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idPro='".$productos[$i]["idProducto"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idPro='".$productos[$i]["idProducto"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-trash'></i></button></div>"; } 

		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
				  "'.$productos[$i]["codigo"].'",
			      "'.$productos[$i]["descripcion"].'",
			      "'.$stock.'",
			      "'.$productos[$i]["precioCompra"].'",
			      "'.$productos[$i]["precioVenta"].'",
			      "'.$productos[$i]["fecha"].'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;

                  }else{

               $datosJson = '{
		  "data": [';



		  for($i = 0; $i < count($productos); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/ 

		  	$imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";

		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $productos[$i]["idCategoria"];

		  	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		  	/*=============================================
 	 		STOCK
  			=============================================*/ 

  			if($productos[$i]["stock"] <= 10){

  				$stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

  			}else if($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15){

  				$stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";

  			}

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

  			if (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Almacen") {

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idPro='".$productos[$i]["idProducto"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button></div>"; 


  			}else{

		  	$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idPro='".$productos[$i]["idProducto"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idPro='".$productos[$i]["idProducto"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-trash'></i></button></div>"; } 

		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$productos[$i]["codigo"].'",
			      "'.$productos[$i]["descripcion"].'",
			      "'.$categorias["categoria"].'",
			      "'.$stock.'",
			      "'.$productos[$i]["precioCompra"].'",
			      "'.$productos[$i]["precioVenta"].'",
			      "'.$productos[$i]["fecha"].'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;

                  }            


	}


}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarProductos = new TablAbroductos();
$activarProductos -> mostrarTablAbroductos();

