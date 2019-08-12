<?php

require_once "Conexion.php";

class TipoReparacion{

/*=============================================
				CREAR TIPO
	=============================================*/

	static public function crearTipo($tabla, $datos){

		$consulta = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES (:nombre)");

		$consulta->bindParam(":nombre", $datos, PDO::PARAM_STR);

				if($consulta->execute()){

					return "ok";

				}else{

					return "error";
				
				}

				$consulta->close();
				$consulta = null;
	}


	/*=============================================
	MOSTRAR TIPOS
	=============================================*/

	static public function mostrarTipo($tabla, $item, $valor){

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
	EDITAR TIPO
	=============================================*/

	static public function editarTipo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE idTipoReparacion = :idTipoReparacion");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":idTipoReparacion", $datos["idTipoReparacion"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function borrarTipo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idTipoReparacion = :idTipoReparacion");

		$stmt -> bindParam(":idTipoReparacion", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


}

