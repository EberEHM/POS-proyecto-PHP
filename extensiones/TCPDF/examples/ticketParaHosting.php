<?php
require_once('tcpdf_include.php');
require_once "../../../controladores/ControladorVentas.php";
require_once "../../../class/Ventas.php";
require_once "../../../class/Clientes.php";
require_once "../../../controladores/ControladorClientes.php";
require_once "../../../class/Usuarios.php";
require_once "../../../controladores/ControladorUsuarios.php";
require_once "../../../class/Productos.php";
require_once "../../../controladores/ControladorProductos.php";


class imprimirFactura{

	public $codigoFactura;

	public function traerImpresionFactura(){


		//TRAEMOS LA INFORMACION DE LA VENTA

		$itemVenta="codigoFactura";
		$valorVenta = $this->codigoFactura;
		$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

		$fecha = substr($respuestaVenta["fecha"], 0, -8);
		$productos = json_decode($respuestaVenta["productos"], true);
		$neto = number_format($respuestaVenta["neto"],2);
		$impuesto = number_format($respuestaVenta["impuesto"],2);
		$total = number_format($respuestaVenta['total'],2);

		//traemos la informacion del cliente
		
		$itemCliente = "idCliente";
		$valorCliente = $respuestaVenta["idCliente"];

		$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);


		//traemos la informacion del vendedor
		
		$itemVendedor = "id";
		$valorVendedor = $respuestaVenta["idUsuario"];

		$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

		//SE REQUIERE LA CLASE TCPDF
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->AddPage('P', 'A7');

//---------------------------------------------------------

$bloque1 = <<<EOF

<table style="font-size:9px; text-align:center">

	<tr>
		
		<td style="width:160px;">
	
			<div>
			
				Fecha: $fecha

				<br><br>
				Inventory System
				
				<br>
				NIT: 71.759.963-9

				<br>
				Dirección: Calle 44B 92-11

				<br>
				Teléfono: 300 786 52 49

				<br>
				FACTURA N.$valorVenta

				<br><br>					
				Cliente: $respuestaCliente[nombre]

				<br>
				Vendedor: $respuestaVendedor[nombre]

				<br>

			</div>

		</td>

	</tr>


</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------


foreach ($productos as $key => $item) {

$valorUnitario = number_format($item["precio"], 2);

$precioTotal = number_format($item["total"], 2);

$bloque2 = <<<EOF

<table style="font-size:9px;">

	<tr>
	
		<td style="width:160px; text-align:left">
		$item[descripcion] 
		</td>

	</tr>

	<tr>
	
		<td style="width:160px; text-align:right">
		$ $valorUnitario Und * $item[cantidad]  = $ $precioTotal
		<br>
		</td>

	</tr>

</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque3 = <<<EOF

<table style="font-size:9px; text-align:right">

	<tr>
	
		<td style="width:80px;">
			 NETO: 
		</td>

		<td style="width:80px;">
			$ $neto
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 IMPUESTO: 
		</td>

		<td style="width:80px;">
			$ $impuesto
		</td>

	</tr>

	<tr>
	
		<td style="width:160px;">
			 --------------------------
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 TOTAL: 
		</td>

		<td style="width:80px;">
			$ $total
		</td>

	</tr>

	<tr>
	
		<td style="width:160px;">
			<br>
			<br>
			Muchas gracias por su compra
		</td>

	</tr>

</table>



EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');


//-------------------------------------------------------------------

//SALIDA DEL ARCHIVO
$pdf->Output('factura.pdf');

	}

}


$factura = new imprimirFactura();
$factura -> codigoFactura = $_GET["codigoFactura"];
$factura -> traerImpresionFactura();

?>