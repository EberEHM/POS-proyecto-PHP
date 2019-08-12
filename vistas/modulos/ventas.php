<?php

if($_SESSION["perfil"] == "Almacen"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}
?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar ventas
    
    </h1>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <a href="crearVenta">

          <button class="btn btn-success">
            
            Crear venta

          </button>

        </a>

        <button type="button" class="btn btn-default pull-right" id="daterange-btn">
          
          <span>
            
            <i class="fa fa-calendar"></i> Rango de fecha

          </span>

            <i class="fa fa-caret-down"></i>

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Código factura</th>
           <th>Cliente</th>
           <th>Vendedor</th>
           <th>Forma de pago</th>
           <th>Neto</th>
           <th>Total</th> 
           <th>Fecha</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          <?php 

          if (isset($_GET["fechaInicial"])) {

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

             $fechaInicial = null;
            $fechaFinal = null;


          }

              $respuesta=ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

              foreach ($respuesta as $key => $value) {
                
                echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["codigoFactura"].'</td>';

                    $itemCliente="idCliente";
                    $valorCliente = $value["idCliente"];

                    $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                 echo '<td>'.$respuestaCliente["nombre"].'</td>';


                    $itemUsuario="id";
                    $valorUsuario = $value["idUsuario"];

                    $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                 echo '<td>'.$respuestaUsuario["nombre"].'</td>

                    <td>'.$value["metodoPago"].'</td>

                    <td>'.number_format($value["neto"],2).'</td>

                    <td>'.number_format($value["total"],2).'</td>

                    <td>'.$value["fecha"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-success btnImprimirFactura" codigoVenta="'.$value["codigoFactura"].'"><i class="fa fa-print"></i></button>';

                        if ($_SESSION["perfil"]=="Administrador") {

                     echo ' <button class="btn btn-warning btnEditarVenta" idVenta="'.$value["idVenta"].'"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["idVenta"].'"><i class="fa fa-trash"></i></button>';
                      }
                        
                    echo '</div>  

                    </td>

                  </tr>';



              }
           ?>
               
        </tbody>
        <?php 

          $eliminarVenta = new ControladorVentas();
          $eliminarVenta -> ctrEliminarVenta();


         ?>

       </table>

      </div>

    </div>

  </section>

</div>




