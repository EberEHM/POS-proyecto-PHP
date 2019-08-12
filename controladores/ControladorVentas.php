<?php

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class ControladorVentas{

	/*=============================================
				MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarVentas($item, $valor){

		$tabla = "ventas";

		$respuesta = Ventas::mostrarVentas($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
				CREAR VENTA
	=============================================*/

	static public function ctrCrearVenta(){

		if (isset($_POST["nuevaVenta"])) {

		/*=============================================
				Actualizar las compras del cliente, reducir el stock y aumentar las ventas de los productos
		=============================================*/

		$listaProductos = json_decode($_POST["listaProductos"], true);

		$totalProductosComprados = array();

		foreach ($listaProductos as $key => $value) {

			   array_push($totalProductosComprados, $value["cantidad"]);//va contando loa productos que compra un cliente
				
			   $tablaProductos = "productos";

			    $item = "idProducto";
			    $valor = $value["idProducto"];
			    $orden = null;

			    $traerProducto = Productos::mostrarProductos($tablaProductos, $item, $valor, $orden);

				$item1a = "ventas";
				$valor1a = $value["cantidad"] + $traerProducto["ventas"]; //se suman las ventas realizadas del producto xd

			    $nuevasVentas = Productos::actualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

				$item1b = "stock";
				$valor1b = $value["stock"];

				$nuevoStock = Productos::actualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

			}
		
			$tablaClientes = "clientes";

			$item = "idCliente";
			$valor = $_POST["seleccionarCliente"];

			$traerCliente = Clientes::mostrarClientes($tablaClientes, $item, $valor);

			$item1a = "compras";
			$valor1a = array_sum($totalProductosComprados) + $traerCliente["compras"];//suma todos los indices del array, de esta forma suma todas las compras del cliente

			$comprasCliente = Clientes::actualizarCliente($tablaClientes, $item1a, $valor1a, $valor);

			//$item1b = "ultima_compra";

			//date_default_timezone_set('America/Bogota');

			//$fecha = date('Y-m-d');
			//$hora = date('H:i:s');
			//$valor1b = $fecha.' '.$hora;

			//$fechaCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1b, $valor1b, $valor);

			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/	

			$tabla = "ventas";

			$datos = array("idUsuario"=>$_POST["idVendedor"],
						   "idCliente"=>$_POST["seleccionarCliente"],
						   "codigoFactura"=>$_POST["nuevaVenta"],
						   "productos"=>$_POST["listaProductos"],
						   "impuesto"=>$_POST["nuevoPrecioImpuesto"],
						   "neto"=>$_POST["nuevoPrecioNeto"],
						   "total"=>$_POST["totalVenta"],
						   "metodoPago"=>$_POST["listaMetodoPago"]);

			$respuesta = Ventas::crearVenta($tabla, $datos);

			if($respuesta == "ok"){

			/*=============================================
						PROSESO DE IMPRESION
			=============================================*/	

			#esto solo es para la primera prueba.
				// $impresora = "NOMBREDELAIMPRESORA";

				// $conector=new WindowsPrintConnector($impresora);

				// $imprimir = new Printer($conector);

				// $imprimir ->text("Hola Mundo"."\n");
				
				// $imprimir -> cut();

				// $imprimir -> close();



			//debe estar comentado, descomentar solo si esta conectada la imprsora,
			//de lo contrario mandara un error 
			//para configurar checar el video #3 de la seccion impresora de tickets
			//en caso de que el sistema se encuentre en un hosting dejarlo asi y cambiar la factura de pdf por la factura mini para tickets

				//  $impresora = "NOMBREDELAIMPRESORA";

				//  $conector=new WindowsPrintConnector($impresora);

				//  $imprimir = new Printer($conector);

				//  $printer -> setJustication(Printer::JUSTIFY_CENTER);	

				//  $printer ->text(date("D-m-y H:i:s")."\n");

				//  $printer -> feed(1); //se alimenta el papel una vez

				// $printer -> text("Inventory System"."\n");//Nombre de la empresa

				// $printer -> text("NIT: 71.759.963-9"."\n");//Nit de la empresa

				// $printer -> text("Dirección: Calle 44B 92-11"."\n");//Dirección de la empresa

				// $printer -> text("Teléfono: 300 786 52 49"."\n");//Teléfono de la empresa

				// $printer -> text("FACTURA N.".$_POST["nuevaVenta"]."\n");//Número de factura

				// $printer -> feed(1); //Alimentamos el papel 1 vez*/

				// $printer -> text("Cliente: ".$traerCliente["nombre"]."\n");//Nombre del cliente

				// $printer -> text("Vendedor: ".$_SESSION["nombre"]."\n");//Nombre del vendedor

				// $printer -> feed(1); //Alimentamos el papel 1 vez*/

				// foreach ($listaProductos as $key => $value) {

				// 	$printer->setJustification(Printer::JUSTIFY_LEFT);

				// 	$printer->text($value["descripcion"]."\n");//Nombre del producto

				// 	$printer->setJustification(Printer::JUSTIFY_RIGHT);

				// 	$printer->text("$ ".number_format($value["precio"],2)." Und x ".$value["cantidad"]." = $ ".number_format($value["total"],2)."\n");

				// }

				// $printer -> feed(1); //Alimentamos el papel 1 vez*/			
				
				// $printer->text("NETO: $ ".number_format($_POST["nuevoPrecioNeto"],2)."\n"); //ahora va el neto

				// $printer->text("IMPUESTO: $ ".number_format($_POST["nuevoPrecioImpuesto"],2)."\n"); //ahora va el impuesto

				// $printer->text("--------\n");

				// $printer->text("TOTAL: $ ".number_format($_POST["totalVenta"],2)."\n"); //ahora va el total

				// $printer -> feed(1); //Alimentamos el papel 1 vez*/	

				// $printer->text("Muchas gracias por su compra :)"); //Podemos poner también un pie de página

				// $printer -> feed(3); //Alimentamos el papel 3 veces*/

				// $printer -> cut(); //Cortamos el papel, si la impresora tiene la opción

				// $printer -> pulse(); //Por medio de la impresora mandamos un pulso, es útil cuando hay cajón moneder

				// $printer -> close();

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La venta ha sido guardada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "ventas";

						 	 }
							})

				</script>';

			}

		//}

	//}

			
		}

	}


/*=============================================
				EDITAR LA VENTA
	=============================================*/

	static public function ctrEditarVenta(){

		if (isset($_POST["editarVenta"])) {

			/*=============================================
				FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
		=============================================*/
		 	$tabla = "ventas";

			$item = "codigoFactura";
			$valor = $_POST["editarVenta"];

			$traerVenta = Ventas::mostrarVentas($tabla, $item, $valor);

			/*=============================================
			REVISAR SI VIENEN PRODUCTOS EDITADOS
		=============================================*/
			if ($_POST["listaProductos"] == "") {

				$listaProductos = $traerVenta["productos"];
				$cambioProducto= false;

			}else{

				$listaProductos = $_POST["listaProductos"];
				$cambioProducto= true;
			}

			if ($cambioProducto) {
			
			$productos = json_decode($traerVenta["productos"], true);

			$totalProductosComprados = array();

			foreach ($productos as $key => $value) {

				array_push($totalProductosComprados, $value["cantidad"]);//va contando loa productos que compra un cliente

				$tablaProductos = "productos";

				$item = "idProducto";
			    $valor = $value["idProducto"];
			    $orden=null;

			    $traerProducto = Productos::mostrarProductos($tablaProductos, $item, $valor,$orden);

			    $item1a = "ventas";
				$valor1a = $traerProducto["ventas"] - $value["cantidad"]; //se suman las ventas realizadas del producto xd

				$nuevasVentas = Productos::actualizarProducto($tablaProductos, $item1a, $valor1a, $valor);


			    $item1b = "stock";
				$valor1b = $value["cantidad"] + $traerProducto["stock"];

				$nuevoStock = Productos::actualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

			}

				$tablaClientes = "clientes";

				$itemCliente = "idCliente";
				$valorCliente = $traerVenta["idCliente"];

				$traerCliente = Clientes::mostrarClientes($tablaClientes, $itemCliente, $valorCliente);

				$item1a = "compras";
				$valor1a = $traerCliente["compras"] - array_sum($totalProductosComprados);//suma todos los indices del array, de esta forma suma todas las compras del cliente
				$comprasCliente = Clientes::actualizarCliente($tablaClientes, $item1a, $valor1a, $valorCliente);

		/*=============================================
				Actualizar las compras del cliente, reducir el stock y aumentar las ventas de los productos
		=============================================*/

		$listaProductos2 = json_decode($listaProductos, true);

		$totalProductosComprados2 = array();

		foreach ($listaProductos2 as $key => $value) {

			   array_push($totalProductosComprados2, $value["cantidad"]);//va contando loa productos que compra un cliente
				
			   $tablaProductos2 = "productos";

			    $item2 = "idProducto";
			    $valor2 = $value["idProducto"];
			    $orden = "idProducto";

			    $traerProducto2 = Productos::mostrarProductos($tablaProductos2, $item2, $valor2, $orden);

				$item1a2 = "ventas";
				$valor1a2 = $value["cantidad"] + $traerProducto2["ventas"]; //se suman las ventas realizadas del producto xd

			    $nuevasVentas2 = Productos::actualizarProducto($tablaProductos2, $item1a2, $valor1a2, $valor2);

				$item1b2 = "stock";
				$valor1b2 = $value["stock"];

				$nuevoStock2 = Productos::actualizarProducto($tablaProductos2, $item1b2, $valor1b2, $valor2);

			}
		
			$tablaClientes2 = "clientes";

			$item2 = "idCliente";
			$valor2 = $_POST["seleccionarCliente"];

			$traerCliente2 = Clientes::mostrarClientes($tablaClientes2, $item2, $valor2);

			$item1a2 = "compras";
			$valor1a2 = array_sum($totalProductosComprados2) + $traerCliente2["compras"];//suma todos los indices del array, de esta forma suma todas las compras del cliente

			$comprasCliente2 = Clientes::actualizarCliente($tablaClientes2, $item1a2, $valor1a2, $valor2);

		}


			/*=============================================
					GUARDAR LOS CAMBIOS
			=============================================*/	

			$datos = array("idUsuario"=>$_POST["idVendedor"],
						   "idCliente"=>$_POST["seleccionarCliente"],
						   "codigoFactura"=>$_POST["editarVenta"],
						   "productos"=>$listaProductos,
						   "impuesto"=>$_POST["nuevoPrecioImpuesto"],
						   "neto"=>$_POST["nuevoPrecioNeto"],
						   "total"=>$_POST["totalVenta"],
						   "metodoPago"=>$_POST["listaMetodoPago"]);

			$respuesta = Ventas::editarVenta($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La venta ha sido editada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "ventas";

						 	 }
							})

				</script>';

			}
			
		}

	}

	/*=============================================
					ELIMINAR VENTA
	=============================================*/	

	static public function ctrEliminarVenta(){


		if (isset($_GET["idVenta"])) {

//RESTARLE LA VENTA AL CLIENTE, PERO NO REGRESAN LOS PRODUCTOS NI TAMPOCO RESTA LA VENTA AL CLIENTE DEBIDO A QUE NO LO ENCUENTRO EFICIENTE, SE PUEDE AGREGAR CON AYUDA DEL VIDEO "ELIMINAR VENTA"
			$tabla = "ventas";
			$item= "idVenta";
			$datos = $_GET["idVenta"];

			$traerVenta = Ventas::mostrarVentas($tabla, $item, $datos);

			$productos = json_decode($traerVenta["productos"], true);

			$totalProductosComprados = array();

			foreach ($productos as $key => $value) {

				array_push($totalProductosComprados, $value["cantidad"]);//va contando loa productos que compra un cliente

				$tablaProductos = "productos";

				$item = "idProducto";
			    $valor = $value["idProducto"];
			   	$orden=null;
			    $traerProducto = Productos::mostrarProductos($tablaProductos, $item, $valor,$orden);

			    $item1a = "ventas";
				$valor1a = $traerProducto["ventas"] - $value["cantidad"]; //se suman las ventas realizadas del producto xd

				$nuevasVentas = Productos::actualizarProducto($tablaProductos, $item1a, $valor1a, $valor);


			    $item1b = "stock";
				$valor1b = $value["cantidad"] + $traerProducto["stock"];

				$nuevoStock = Productos::actualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

			}

				$tablaClientes = "clientes";

				$itemCliente = "idCliente";
				$valorCliente = $traerVenta["idCliente"];

				$traerCliente = Clientes::mostrarClientes($tablaClientes, $itemCliente, $valorCliente);

				$item1a = "compras";
				$valor1a = $traerCliente["compras"] - array_sum($totalProductosComprados);//suma todos los indices del array, de esta forma suma todas las compras del cliente
				$comprasCliente = Clientes::actualizarCliente($tablaClientes, $item1a, $valor1a, $valorCliente);

			//ELIMINAR LA VENTA

			$respuesta = Ventas::eliminarVenta($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La venta ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "ventas";

								}
							})

				</script>';

			}		

		}
	}

	/*=============================================
				RANGO DE FECHAS
		=============================================*/

		static public function ctrRangoFechasVentas($fechaInicial, $fechaFinal){


			$tabla = "ventas";

			$respuesta = Ventas::rangoFechasVentas($tabla, $fechaInicial, $fechaFinal);

			return $respuesta;

		}
		/*=============================================
				DESCARGAR EXCEL
		=============================================*/
		
	/*=============================================
	DESCARGAR EXCEL
	=============================================*/

	public function ctrDescargarReporte(){

		if(isset($_GET["reporte"])){

			$tabla = "ventas";

			if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){

				$ventas = Ventas::rangoFechasVentas($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);

			}else{

				$item = null;
				$valor = null;

				$ventas = Ventas::mostrarVentas($tabla, $item, $valor);

			}


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["reporte"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'> 

					<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO VENTA</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>VENDEDOR</td>
					<td style='font-weight:bold; border:1px solid #eee;'>CANTIDAD</td>
					<td style='font-weight:bold; border:1px solid #eee;'>PRODUCTOS</td>
					<td style='font-weight:bold; border:1px solid #eee;'>IMPUESTO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NETO</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>TOTAL</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>METODO DE PAGO</td	
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>		
					</tr>");

				foreach ($ventas as $row => $item){

				$cliente = ControladorClientes::ctrMostrarClientes("idCliente", $item["idCliente"]);
				$vendedor = ControladorUsuarios::ctrMostrarUsuarios("id", $item["idUsuario"]);

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$item["codigoFactura"]."</td> 
			 			<td style='border:1px solid #eee;'>".$cliente["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>".$vendedor["nombre"]."</td>
			 			<td style='border:1px solid #eee;'>");

			 	$productos =  json_decode($item["productos"], true);

			 	foreach ($productos as $key => $valueProductos) {
			 			
			 			echo utf8_decode($valueProductos["cantidad"]."<br>");
			 		}

			 	echo utf8_decode("</td><td style='border:1px solid #eee;'>");	

		 		foreach ($productos as $key => $valueProductos) {
			 			
		 			echo utf8_decode($valueProductos["descripcion"]."<br>");
		 		
		 		}

		 		echo utf8_decode("</td>
					<td style='border:1px solid #eee;'>$ ".number_format($item["impuesto"],2)."</td>
					<td style='border:1px solid #eee;'>$ ".number_format($item["neto"],2)."</td>	
					<td style='border:1px solid #eee;'>$ ".number_format($item["total"],2)."</td>
					<td style='border:1px solid #eee;'>".$item["metodoPago"]."</td>
					<td style='border:1px solid #eee;'>".substr($item["fecha"],0,10)."</td>		
		 			</tr>");


			}


			echo "</table>";


			}



		}

		/*=============================================
				SUMATOTAL VENTAS
	=============================================*/	

	public function ctrSumaTotalVentas(){

		$tabla="ventas";

		$respuesta=Ventas::sumaTotalVentas($tabla);

		return $respuesta;



	}
}
