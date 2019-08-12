<?php

require_once "Conexion.php";

class Productos{

	/*=============================================
				MOSTRAR PRODUCTOS
	=============================================*/

	static public function mostrarProductos($tabla, $item, $valor, $orden){


		if($item != null){

			$consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY idProducto DESC");

			$consulta -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$consulta -> execute();

			return $consulta -> fetch();

		}else{

			$consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC"); //desendente es de mayor a menor, acendente es de menor a mayor

			$consulta -> execute();

			return $consulta -> fetchAll();
		}

			$consulta -> close();

			$consulta = null;

	}

	/*=============================================
				INGRESAR PRODUCTOS
	=============================================*/

	static public function agregarProducto($tabla, $datos){


		$consulta = Conexion::conectar()->prepare("INSERT INTO $tabla(idCategoria, codigo, descripcion, imagen, stock, precioCompra, precioVenta) VALUES (:idCategoria, :codigo, :descripcion, :imagen, :stock, :precioCompra, :precioVenta)");

		$consulta->bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_INT);
		$consulta->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$consulta->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$consulta->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$consulta->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$consulta->bindParam(":precioCompra", $datos["precioCompra"], PDO::PARAM_STR);
		$consulta->bindParam(":precioVenta", $datos["precioVenta"], PDO::PARAM_STR);

		if($consulta->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$consulta->close();
		$consulta = null;

	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/
	static public function editarProducto($tabla, $datos){

		$consulta = Conexion::conectar()->prepare("UPDATE $tabla SET idCategoria = :idCategoria, descripcion = :descripcion, imagen = :imagen, stock = :stock, precioCompra = :precioCompra, precioVenta = :precioVenta WHERE codigo = :codigo");

		$consulta->bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_INT);
		$consulta->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$consulta->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$consulta->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$consulta->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$consulta->bindParam(":precioCompra", $datos["precioCompra"], PDO::PARAM_STR);
		$consulta->bindParam(":precioVenta", $datos["precioVenta"], PDO::PARAM_STR);

		if($consulta->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$consulta->close();
		$consulta = null;

	}

	/*=============================================
					BORRAR PRODUCTO
	=============================================*/
	static public function eliminarProducto($tabla, $datos){

		$consulta = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idProducto = :idProducto");
		
		$consulta -> bindParam(":idProducto", $datos, PDO::PARAM_INT);

		
		if($consulta->execute()){

				return "ok";

			}else{

				return "error";
		
		}

		$consulta->close();
		$consulta = null;

	}

	/*=============================================
				ACTUALIZAR PRODUCTOS
	=============================================*/

	static public function actualizarProducto($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE idProducto = :idProducto");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":idProducto", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
				MOSTRAR SUMA VENTAS
	  	=============================================*/

	  	static public function mostrarSumaVentas($tabla){

	  		$consulta = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");

	  		$consulta -> execute();

	  		return $consulta -> fetch();

	  		$consulta -> close();

	  		$consulta = null;


	  	}


	/*=============================================
				MOSTRAR ESTADO OPTIMIZACION
	=============================================*/

	static public function mostrarEstado($tabla, $item, $valor){

			$consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$consulta -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$consulta -> execute();

			return $consulta -> fetch();


			$consulta -> close();

			$consulta = null; 

	}

	/*=============================================
	ACTUALIZAR OPTIMIZACION
	=============================================*/

	static public function actualizarOptimizacion($tabla, $item1, $valor1, $item2, $valor2){

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
}