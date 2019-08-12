<?php
require_once "Conexion.php";


class Clientes{

	/*=============================================
				CREAR CLIENTE
	=============================================*/

	static public function agregarCliente($tabla, $datos){

		$consulta = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, telefono, direccion) VALUES (:nombre, :email, :telefono, :direccion)");

		$consulta->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$consulta->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$consulta->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$consulta->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);

		if($consulta->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$consulta->close();
		$consulta = null;


	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mostrarClientes($tabla, $item, $valor){

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
				EDITAR CLIENTES
	=============================================*/


	static public function editarCliente($tabla, $datos){

		$consulta = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, email = :email, telefono = :telefono, direccion = :direccion WHERE idCliente = :idCliente");

		$consulta->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_STR);
		$consulta->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$consulta->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$consulta->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$consulta->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);

		if($consulta->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$consulta->close();
		$consulta = null;


	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function eliminarCliente($tabla, $datos){

		$consulta = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCliente = :idCliente");

		$consulta -> bindParam(":idCliente", $datos, PDO::PARAM_INT);

		if($consulta -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$consulta -> close();

		$consulta = null;

	}

	/*=============================================
				ACTUALIZAR Clientes
	=============================================*/

	static public function actualizarCliente($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE idCliente = :idCliente");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":idCliente", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}



}