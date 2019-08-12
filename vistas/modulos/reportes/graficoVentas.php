<?php
error_reporting(0);//sirve para no mostrar los mensajes de error
//es util en ocaciones en las que marca error pero su funcionamiento es correcto, sin embargo no es recomendable usar
if (isset($_GET["fechaInicial"])) {

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

  }else{

            $fechaInicial = null;
            $fechaFinal = null;


  }

  $respuesta=ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

  $arrayFechas = array();
  $arrayVentas = array();

   foreach ($respuesta as $key => $value) {

   	#capturamos solo el anio, mes y dia
   	$fecha=substr($value["fecha"],0,7);

   	 #Se introducen las fechas en el array
   	 array_push($arrayFechas, $fecha);  

   	 #se capturan las ventas
   	 $arrayVentas = array($fecha => $value["total"]);

   	 #se suman los pagos que ocurrieron el mismo mes.
   	 foreach ($arrayVentas as $key => $value) {
   	 	
   	 	$sumaPagosMes[$key]+=$value;

   	 }

   }
   $noRepetirFechas=array_unique($arrayFechas);
?>

		 <!-- /*=============================================
							GRAFICO DE VENTAS
		=============================================*/	-->

		<div class="box box-solid bg-green-gradient">

			<div class="box-header">
				<i class="fa fa-th"></i>
				<h3 class="box-title">Gráfico de ventas</h3>

			</div>

			<div class="box-body border-radius-none nuevoGraficoVentas">

				<div class="chart" id="line-chart-ventas" style="height: 250px;">
					
				</div>
				
			</div>
			
		</div>

		<script>
			
			var line = new Morris.Line({
    element          : 'line-chart-ventas',
    resize           : true,
    data             : [

		<?php 

		if ($noRepetirFechas != null) {

		
			foreach ($noRepetirFechas as $key) {
				

				echo "{y: '".$key."', ventas: ".$sumaPagosMes["$key"]."},";



			}

			echo "{y: '".$key."', ventas: ".$sumaPagosMes["$key"]."}";
		}else{

			echo "{y: '0', ventas: '0'}";

		}
		 ?>

    ],
    xkey             : 'y',
    ykeys            : ['ventas'],
    labels           : ['ventas'],
    lineColors       : ['#757575'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#FFFFFF',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#757575'],
    gridLineColor    : '#757575',
    gridTextFamily   : 'Open Sans',
    preUnits         : '$',
    gridTextSize     : 10
  });

		</script>