<?php

if($_SESSION["perfil"] != "Administrador"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}
?>

<div class="content-wrapper">

    <section class="content-header">

      <h1>

        Reporte de ventas.

      </h1>

    </section>

    <section class="content">


      <div class="box">

        <div class="box-header with-border">

          <div class="input-group">
            

           <button type="button" class="btn btn-default" id="daterange-btn2">
          
          <span>
            
            <i class="fa fa-calendar"></i>
            <?php

                if(isset($_GET["fechaInicial"])){

                  echo $_GET["fechaInicial"]." - ".$_GET["fechaFinal"];
                
                }else{
                 
                  echo 'Rango de fecha';

                }

              ?>
          </span>

            <i class="fa fa-caret-down"></i>

          </button>

         </div>


          <div class="box-tools pull-right">

            <?php 

            if (isset($_GET["fechaInicial"])) {

               echo '<a href="vistas/modulos/descargarReporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';  
            }else{

                echo '<a href="vistas/modulos/descargarReporte.php?reporte=reporte">';
            }

            

             ?>
            
            <button class="btn btn-success" style="margin-top:5px"><i class="fa fa-file-excel-o"> Descargar Excel </i></button>
            </a>
          </div>

        </div>
        <div class="box-body">

          <div class="row" >
            
            <div class="col-xs-12">

              <?php 


              include 'reportes/graficoVentas.php';


               ?>
              
               </div>
          
              <div class="col-md-6 col-xs-12">
             
`               <?php 

              include 'reportes/productosMasVendidos.php';
              
               ?>

            </div>

             <div class="col-md-6 col-xs-12">
             
`               <?php 

              include 'reportes/vendedores.php';
              
               ?>

            </div>
            <div class="col-md-6 col-xs-12">
             
`               <?php 

              include 'reportes/compradores.php';
              
               ?>

            </div>


          </div>

        </div>

      </div>

    </section>

  </div>