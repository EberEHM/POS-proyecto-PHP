<?php

require_once "../controladores/ControladorTipoReparacion.php";
require_once "../class/TipoReparacion.php";

class AjaxTipoReparacion{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	
 
	public $idTipo;

	public function ajaxEditarTipo(){

		$item = "idTipoReparacion";
		$valor = $this->idTipo;

		$respuesta = ControladorTipoReparacion::ctrMostrarTipo($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idTipo"])){

	$categoria = new AjaxTipoReparacion();
	$categoria -> idTipo = $_POST["idTipo"];
	$categoria -> ajaxEditarTipo();
}
