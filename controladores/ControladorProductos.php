<?php 

class ControladorProductos{

 
		/*=============================================
						MOSTRAR PRODUCTOS
			=============================================*/

		static public function ctrMostrarProductos($item, $valor, $orden){
				
			$tabla="productos";

			$respuesta= Productos::mostrarProductos($tabla, $item, $valor, $orden);

			return $respuesta;
		}

		/*=============================================
						CREAR PRODUCTOS
			=============================================*/
		static public function ctrCrearProducto(){

			if (isset($_POST['nuevaDescripcion'])) {
			
				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ, ]+$/', $_POST["nuevaDescripcion"]) &&
			  	 preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&	
			  	 preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) &&
			  	 preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])){


					/*=============================================
								VALIDAR LA IMAGEN
					=============================================*/
			   		$ruta = "vistas/img/productos/default/anonymous.png";

					 	if(isset($_FILES["nuevaImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;


					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/productos/".$_POST["nuevoCodigo"];

					mkdir($directorio, 0755);


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/


					if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){


						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

					$tabla = "productos";
					$datos = array("idCategoria" => $_POST['nuevaCategoria'],
									"codigo" => $_POST['nuevoCodigo'],
									"descripcion" => $_POST['nuevaDescripcion'],
									"stock" => $_POST['nuevoStock'],
									"precioCompra" => $_POST['nuevoPrecioCompra'],
									"precioVenta" => $_POST['nuevoPrecioVenta'],
									"imagen" => $ruta);

					$respuesta= Productos::agregarProducto($tabla, $datos);

						if($respuesta == "ok"){

							echo'<script>

							swal({
							type: "success",
							title: "El producto ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
							if (result.value) {

							window.location = "productos";

												}
											})

								</script>';

						}

				}else{

					echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';

				}

			}

		}

	/*=============================================
			EDITAR PRODUCTO
	=============================================*/

	static public function ctrEditarProducto(){

		if(isset($_POST["editarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ, ]+$/', $_POST["editarDescripcion"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])){

		   		/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = $_POST["imagenActual"];

			   	if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/productos/".$_POST["editarCodigo"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png"){

						unlink($_POST["imagenActual"]);

					}else{

						mkdir($directorio, 0755);	
					
					}
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "productos";

				$datos = array("idCategoria" => $_POST["editarCategoria"],
							   "codigo" => $_POST["editarCodigo"],
							   "descripcion" => $_POST["editarDescripcion"],
							   "stock" => $_POST["editarStock"],
							   "precioCompra" => $_POST["editarPrecioCompra"],
							   "precioVenta" => $_POST["editarPrecioVenta"],
							   "imagen" => $ruta);

				$respuesta = Productos::editarProducto($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El producto ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "productos";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';
			}
		}

	}


	/*=============================================
						Eliminar producto
	  	=============================================*/
	static public function ctrEliminarProducto(){

		if (isset($_GET["idPro"])) {


			$tabla="productos";
			$datos=$_GET["idPro"];

			if ($_GET['imagen'] != "" && $_GET['imagen'] != "vistas/img/productos/default/anonymous.png") {

				unlink($_GET['imagen']);
				rmdir('vistas/img/productos/'.$_GET["codigo"]);

			}else{

			rmdir('vistas/img/productos/'.$_GET["codigo"]);


			}

			$respuesta = Productos::eliminarProducto($tabla, $datos);

			if ($respuesta == "ok") {

				echo'<script>

						swal({
							  type: "success",
							  title: "El producto ha sido eliminado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "productos";

										}
									})

						</script>';
			}

		}

	}


	/*=============================================
						MOSTRAR SUMA VENTAS
	  	=============================================*/
	  	static public function ctrMostrarSumaVentas(){
	$tabla="productos";

	$respuesta = Productos::mostrarSumaVentas($tabla);

	return $respuesta;

	}


		/*=============================================
						MOSTRAR EL ESTADO DE OPTIMIZACION
			=============================================*/

		static public function ctrMostrarEstado($item, $valor){
				
			$tabla="optimizarproductos";

			$respuesta= Productos::mostrarEstado($tabla, $item, $valor);

			return $respuesta;
		}
}