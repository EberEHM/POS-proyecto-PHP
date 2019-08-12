<?php

require_once "Conexion.php";

class Categorias{

/*=============================================
				CREAR CATEGORIA
	=============================================*/

	static public function crearCategoria($tabla, $datos){

		$consulta = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES (:categoria)");

		$consulta->bindParam(":categoria", $datos, PDO::PARAM_STR);

				if($consulta->execute()){

					return "ok";

				}else{

					return "error";
				
				}

				$consulta->close();
				$consulta = null;
	}


	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mostrarCategorias($tabla, $item, $valor){

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
	EDITAR CATEGORIA
	=============================================*/

	static public function editarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id");

		$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

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

	static public function borrarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


}

