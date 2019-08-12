<?php

require_once "Conexion.php";


class Ventas{


	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function mostrarVentas($tabla, $item, $valor){

		if($item != null){

			$consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY idVenta ASC");

			$consulta -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$consulta -> execute();

			return $consulta -> fetch();

		}else{

			$consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idVenta ASC");

			$consulta -> execute();

			return $consulta -> fetchAll();

		}
		
		$consulta -> close();

		$consulta = null;

	}

	/*=============================================
				CREAR VENTAS
	=============================================*/

	static public function crearVenta($tabla, $datos){

		$consulta = Conexion::conectar()->prepare("INSERT INTO $tabla(codigoFactura, idCliente, idUsuario, productos, impuesto, neto, total, metodoPago) VALUES (:codigoFactura, :idCliente, :idUsuario, :productos, :impuesto, :neto, :total, :metodoPago)");

		$consulta->bindParam(":codigoFactura", $datos["codigoFactura"], PDO::PARAM_INT);
		$consulta->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_INT);
		$consulta->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);
		$consulta->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$consulta->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
		$consulta->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
		$consulta->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$consulta->bindParam(":metodoPago", $datos["metodoPago"], PDO::PARAM_STR);

		if($consulta->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$consulta->close();
		$consulta = null;

	}

	/*=============================================
				EDITAR VENTAS
	=============================================*/

	static public function editarVenta($tabla, $datos){

		$consulta = Conexion::conectar()->prepare("UPDATE $tabla SET idCliente = :idCliente, idUsuario = :idUsuario, productos = :productos, impuesto = :impuesto, neto = :neto, total = :total, metodoPago = :metodoPago WHERE codigoFactura = :codigoFactura");

		$consulta->bindParam(":codigoFactura", $datos["codigoFactura"], PDO::PARAM_INT);
		$consulta->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_INT);
		$consulta->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);
		$consulta->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$consulta->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
		$consulta->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
		$consulta->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$consulta->bindParam(":metodoPago", $datos["metodoPago"], PDO::PARAM_STR);

		if($consulta->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$consulta->close();
		$consulta = null;

	}
	
	/*=============================================
				ELIMINAR VENTAS
	=============================================*/

	static public function eliminarVenta($tabla, $datos){

		$consulta = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idVenta = :idVenta");
		$consulta -> bindParam(":idVenta", $datos, PDO::PARAM_INT);

		if ($consulta -> execute()) {
			
			return  "ok";
		}else{

			return  "error";

		}

		$consulta -> close();

		$consulta = null;
	}

	/*=============================================
				RANGO FECHAS
	=============================================*/
	static public function rangoFechasVentas($tabla, $fechaInicial, $fechaFinal){

		if ($fechaInicial == null) {

			$consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY idVenta ASC");

			$consulta -> execute();

			return $consulta -> fetchAll();

		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");

			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'");

			}
		
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

	}

	/*=============================================
				SUMA TOTAL VENTAS
	=============================================*/	

	static public function sumaTotalVentas($tabla){


		$stmt = Conexion::conectar()->prepare("SELECT SUM(neto) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


}
