<?php 

class ControladorDispositivos {



	/*=============================================
				MOSTRAR DISPOSITIVOS
	=============================================*/

	static public function ctrMostrarDispositivos($item, $valor){

		$tabla="dispositivos";

		$respuesta = Dispositivos::mostrarDispositivos($tabla, $item, $valor);

		return $respuesta;


	}


		/*=============================================
						CREAR dispositivo
			=============================================*/
		static public function ctrCrearDispositivo(){

			if (isset($_POST['nuevoDispositivo'])) {
			
				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ, ]+$/', $_POST["nuevaFalla"]) &&
			  	 preg_match('/^[0-9]+$/', $_POST["nuevoImei"]) &&
			  	 preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ, ]+$/', $_POST["nuevaDescripcion"]) &&	
			  	 preg_match('/^[0-9.]+$/', $_POST["nuevoPrecio"])){


					 	/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "vistas/img/dispositivos/default/tel.png";

				if(isset($_FILES["nuevaImagenDispositivo"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaImagenDispositivo"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/dispositivos/".$_POST["nuevoDispositivo"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaImagenDispositivo"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/dispositivos/".$_POST["nuevoDispositivo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaImagenDispositivo"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaImagenDispositivo"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/dispositivos/".$_POST["nuevoDispositivo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaImagenDispositivo"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}
					$tabla = "dispositivos";
					$datos = array("imagen" => $ruta,
									"NumeroOrden" => $_POST['nuevoDispositivo'],
									"idCliente" => $_POST['nuevoCliente'],
									"idTipoReparacion" => $_POST['nuevoTipoReparacion'],
									"descripcionFalla" => $_POST['nuevaFalla'],
									"imei" => $_POST['nuevoImei'],
									"descripcion" => $_POST['nuevaDescripcion'],
									"presupuesto" => $_POST['nuevoPrecio'],
									"recibio" => $_POST['nuevoRecibio'],
									"fechaAproximada" => $_POST['nuevaFechaEntrega']);

						$respuesta= Dispositivos::agregarDispositivo($tabla, $datos);

						if($respuesta == "ok"){

							echo'<script>

							swal({
							type: "success",
							title: "El dispositivo ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
							if (result.value) {

							window.location = "dispositivos";

												}
											})

								</script>';

						}

				}else{

					echo'<script>

					swal({
						  type: "error",
						  title: "¡El dispositivo no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "dispositivos";

							}
						})

			  	</script>';

				}

			}

		}


			/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarDispositivo(){

		if(isset($_POST["editarDispositivo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ, ]+$/', $_POST["editarFalla"]) &&
			  	 preg_match('/^[0-9]+$/', $_POST["editarImei"]) &&
			  	 preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ, ]+$/', $_POST["editarDescripcion"]) &&	
			  	 preg_match('/^[0-9.]+$/', $_POST["editarPrecio"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFotoDispositivo"]["tmp_name"]) && !empty($_FILES["editarFotoDispositivo"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFotoDispositivo"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/dispositivos/".$_POST["editarDispositivo"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFotoDispositivo"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/dispositivos/".$_POST["editarDispositivo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFotoDispositivo"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFotoDispositivo"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/dispositivos/".$_POST["editarDispositivo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFotoDispositivo"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

					$tabla = "dispositivos";
					$datos = array("imagen" => $ruta,
									"NumeroOrden" => $_POST['editarDispositivo'],
									"idCliente" => $_POST['editarCliente'],
									"idTipoReparacion" => $_POST['editarTipoReparacion'],
									"descripcionFalla" => $_POST['editarFalla'],
									"imei" => $_POST['editarImei'],
									"descripcion" => $_POST['editarDescripcion'],
									"presupuesto" => $_POST['editarPrecio'],
									"recibio" => $_POST['editarRecibio'],
									"fechaAproximada" => $_POST['editarFechaEntrega']);


				$respuesta = Dispositivos::editarDispositivo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El dispositivo ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "dispositivos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El dispositivo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "usuarios";

							}
						})

			  	</script>';

			}

		}

	}




	/*=============================================
				BORRAR DISPOSITIVO
	=============================================*/

	static public function ctrEliminarDispositivo(){

		if(isset($_GET["idDispositivo"])){

			$tabla ="dispositivos";
			$datos = $_GET["idDispositivo"];

			if($_GET["fotoDispositivo"] != "vistas/img/dispositivos/default/tel.png"){

				unlink($_GET["fotoDispositivo"]);
				rmdir('vistas/img/dispositivos/'.$_GET["dispositivo"]);

			}else{

				rmdir('vistas/img/dispositivos/'.$_GET["dispositivo"]);
				
			}

			$respuesta = Dispositivos::eliminarDispositivo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El dispositivo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "dispositivos";

								}
							})

				</script>';

			}		

		}

	}









}