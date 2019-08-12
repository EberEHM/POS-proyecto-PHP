<?php

class ControladorTipoReparacion{

	/*=============================================
				CREAR Tipo de Reparacion
	=============================================*/

	static public function ctrCrearTipo(){

		if (isset($_POST['nuevoTipo'])) {
			
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTipo"])){

				$tabla = "tiporeparacion";

				$datos = $_POST["nuevoTipo"];

				$respuesta= TipoReparacion::crearTipo($tabla, $datos);

				if ($respuesta == "ok") {

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de reparación ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipoReparacion";

									}
								})

					</script>';

				}


			}else

				echo'<script>

						swal({
							  type: "error",
							  title: "¡El tipo de reparación no puede ir vacío o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "tipoReparacion";

								}
							})

				  	</script>';

		}

	}


			/*=============================================
						MOSTRAR TIPO
			=============================================*/

			static public function ctrMostrarTipo($item, $valor){

			$tabla="tiporeparacion";

			$respuesta = TipoReparacion::mostrarTipo($tabla, $item, $valor);

			return $respuesta;


	}

/*=============================================
	EDITAR TIPO
	=============================================*/

	static public function ctrEditarTipo(){

		if(isset($_POST["editarTipo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipo"])){

				$tabla = "tiporeparacion";

				$datos = array("nombre"=>$_POST["editarTipo"],
							   "idTipoReparacion"=>$_POST["idTipo"]);

				$respuesta = TipoReparacion::editarTipo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de reparación ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipoReparacion";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El tipo de reparación no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tipoReparacion";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR TIPO
	=============================================*/

	static public function ctrBorrarTipo(){

		if(isset($_GET["idTipoReparacion"])){

			$tabla ="tiporeparacion";
			$datos = $_GET["idTipoReparacion"];

			$respuesta = TipoReparacion::borrarTipo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de reparación ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipoReparacion";

									}
								})

					</script>';
			}
		}
		
	}

	

		}



