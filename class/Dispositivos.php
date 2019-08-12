<?php

require_once "Conexion.php";
 
class Dispositivos{

	/*=============================================
	MOSTRAR Dsipositivos
	=============================================*/

	static public function mostrarDispositivos($tabla, $item, $valor){

		if($item != null){

			$consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$consulta -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$consulta -> execute();

			return $consulta -> fetch();

		}else{

			$consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$consulta -> execute();

			return $consulta -> fetchAll();

		}

		$consulta -> close();

		$consulta = null;

	}

	/*=============================================
	ACTUALIZAR Dispositivo
	=============================================*/

	static public function actualizarDispositivo($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function agregarDispositivo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(imagen, NumeroOrden, idCliente, idTipoReparacion, descripcionFalla, imei, descripcion, presupuesto, recibio, fechaAbroximada) VALUES (:imagen, :NumeroOrden, :idCliente, :idTipoReparacion, :descripcionFalla, :imei, :descripcion, :presupuesto, :recibio, :fechaAbroximada)");

		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":NumeroOrden", $datos["NumeroOrden"], PDO::PARAM_STR);
		$stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":idTipoReparacion", $datos["idTipoReparacion"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionFalla", $datos["descripcionFalla"], PDO::PARAM_STR);
		$stmt->bindParam(":imei", $datos["imei"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":presupuesto", $datos["presupuesto"], PDO::PARAM_STR);
		$stmt->bindParam(":recibio", $datos["recibio"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaAbroximada", $datos["fechaAbroximada"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}


	/*=============================================
				EDITAR DISPOSITIVO
	=============================================*/

	static public function editarDispositivo($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET imagen = :imagen, idCliente = :idCliente, idTipoReparacion = :idTipoReparacion, descripcionFalla = :descripcionFalla, imei = :imei, descripcion = :descripcion, presupuesto = :presupuesto, recibio = :recibio, fechaAbroximada = :fechaAbroximada  WHERE NumeroOrden = :NumeroOrden");

		$stmt -> bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$stmt -> bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_STR);
		$stmt -> bindParam(":idTipoReparacion", $datos["idTipoReparacion"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcionFalla", $datos["descripcionFalla"], PDO::PARAM_STR);
		$stmt -> bindParam(":imei", $datos["imei"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":presupuesto", $datos["presupuesto"], PDO::PARAM_STR);
		$stmt -> bindParam(":recibio", $datos["recibio"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaAbroximada", $datos["fechaAbroximada"], PDO::PARAM_STR);
		$stmt -> bindParam(":NumeroOrden", $datos["NumeroOrden"], PDO::PARAM_STR);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
					BORRAR DISPOSITIVO
	=============================================*/

	static public function eliminarDispositivo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idDispositivo = :idDispositivo");

		$stmt -> bindParam(":idDispositivo", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}
