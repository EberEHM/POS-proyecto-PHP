<div class="content-wrapper">

    <section class="content-header">

      <h1>

        <i class="fa fa-home"></i>

         Inicio

        <small>POINT OF SALE SYSTEM, BY EBER 2019</small>

      </h1>

    </section>

    <section class="content">

      <div class="row">
        
      
      <?php 

      if ($_SESSION["perfil"]=="Administrador") {

          include  "inicio/cajasSuperiores.php";

      }



       ?>
       </div>
       <div class="row">
        
        <div class="col-lg-12">
          
      
      <?php 

        if ($_SESSION["perfil"]=="Administrador") {


          include "reportes/graficoVentas.php";

        }

       ?>
       </div>

       <div class="col-lg-6">

      <?php 

       if ($_SESSION["perfil"]=="Administrador") {

          include "reportes/productosMasVendidos.php";

        }

       ?>
       </div>
        <div class="col-lg-6">

      <?php 

     if ($_SESSION["perfil"]=="Administrador") {


          include "inicio/productosRecientes.php";

        }

       ?>
       </div>

      </div>

      <div class="col-lg-12">

        <?php 

        if ($_SESSION["perfil"]!="Administrador") {

          echo "<h1>Bienvenid@ ".$_SESSION['nombre'] ." :) </h1>";
        }
         ?>
        
      </div>


    </section>


  </div>