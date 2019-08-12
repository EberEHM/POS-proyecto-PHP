 <?php

require_once "../class/Dispositivos.php";
require_once "../controladores/ControladorDispositivos.php";

class AjaxDispositivos{

	/*=============================================
	EDITAR DISPOSITIVO
	=============================================*/	

	public $idDispositivo;

	 function ajaxEditarDispositivo(){

		$item = "idDispositivo";
		$valor = $this->idDispositivo;

		$respuesta = ControladorDispositivos::ctrMostrarDispositivos($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activarDispositivo;
	public $activarId;


	function ajaxActivarDispositivo(){

		$tabla = "dispositivos";

		$item1 = "estado";
		$valor1 = $this->activarDispositivo;

		$item2 = "idDispositivo";
		$valor2 = $this->activarId;

		$respuesta = Dispositivos::actualizarDispositivo($tabla, $item1, $valor1, $item2, $valor2);

	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idDispositivo"])){

	$editar = new AjaxDispositivos();
	$editar -> idDispositivo = $_POST["idDispositivo"];
	$editar -> ajaxEditarDispositivo();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarDispositivo"])){

	$activarDispositivo = new AjaxDispositivos();
	$activarDispositivo -> activarDispositivo = $_POST["activarDispositivo"];
	$activarDispositivo -> activarId = $_POST["activarId"];
	$activarDispositivo -> ajaxActivarDispositivo();

}