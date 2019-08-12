<?php

require_once "../controladores/ControladorClientes.php";
require_once "../class/Clientes.php";

class AjaxClientes{

	/*=============================================
			EDITAR CLIENTE
	=============================================*/	

	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "idCliente";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idCliente"])){

	$cliente = new AjaxClientes();
	$cliente -> idCliente = $_POST["idCliente"];
	$cliente -> ajaxEditarCliente();

}