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

         <i class="fa fa-mobile-phone "></i>
          Administrar dispositivos

      </h1>

    </section>

    <section class="content">


      <div class="box">
        <!--Es borde de arriba del cuadro. -->
        <div class="box-header with-border">
        <!-- Boton que abre el modal para formulario de usuarios. -->

        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCelular">
          Agregar dispositivo
        </button>
        </div>

        <!--Cuerpo dela caja.
///////////////////////////Aqui se encuntra la tabla de productos//////////////////////
         -->
        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
           
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Imagen</th>
                  <th>Orden</th>
                  <th>Cliente</th>
                  <th>Reparacion</th>
                  <th>Falla</th>
                  <th>IMEI</th>
                  <th>Descripcion</th>
                  <th>Precio</th>
                  <th>Recibio</th>
                  <th>Fecha entrada</th>
                  <th>Fecha entrega</th>
                  <th>Estado</th>
                  <th>Acciones</th> 
                </tr>
              </thead>

              <tbody>
              <!-- Aqui va el contenido de la tabla -->
              <?php 
                $item = null;
                $valor = null;

                $dispositivo = ControladorDispositivos::ctrMostrarDispositivos($item, $valor);

                foreach ($dispositivo as $key => $value) {

                  echo '

                       <tr>
                <td>'.($key+1).'</td>';

                echo '
                <td><img src="'.$value["imagen"].'" class="img-thumbnail" width="40px"></td>
                <td>'.$value["NumeroOrden"].'</td>';

                    $itemCliente="idCliente";
                    $valorCliente = $value["idCliente"];

                    $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);
              echo '
                <td>'.$respuestaCliente["nombre"].'</td>';

                $itemReparacion="idTipoReparacion";
                $valorReparacion = $value["idTipoReparacion"];

                $respuestaTipoReparacion = ControladorTipoReparacion::ctrMostrarTipo($itemReparacion, $valorReparacion);
               echo '
                <td>'.$respuestaTipoReparacion["nombre"].'</td>
                <td>'.$value["descripcionFalla"].'</td>
                <td>'.$value["imei"].'</td>
                <td>'.$value["descripcion"].'</td>
                <td>'.$value["presupuesto"].'</td> 
                <td>'.$value["recibio"].'</td>
                <td>'.$value["fechaEntrada"].'</td>
                <td>'.$value["fechaAbroximada"].'</td>';

                if($value["estado"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivar2" idDispositivo="'.$value["idDispositivo"].'" estadoDispositivo="0">Reparado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar2" idDispositivo="'.$value["idDispositivo"].'" estadoDispositivo="1">Reparacion</button></td>';

                  }             

               echo '  
                <td>
                     <div class="btn-group">

                    <button class="btn btn-warning btnEditarDispositivo" idDispositivo="'.$value["idDispositivo"].'" data-toggle="modal" data-target="#modalEditarCelular"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarDispositivo" idDispositivo="'.$value["idDispositivo"].'" fotoDispositivo="'.$value["imagen"].'" dispositivo="'.$value["NumeroOrden"].'"><i class="fa fa-trash"></i></button>
        
                  </div>

                </td>
              </tr>';

                }


               ?>
             
            </tbody>

          </table>

          <input type="hidden"  value="<?php echo $_SESSION['perfil'];?>" id="perfilOculto">

        </div>

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

  <!--
////////////////////////////////Modal agregar celular///////////////
   -->
   <div id="modalAgregarCelular" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!--Con el style sele agrega el color al heder en este caso es verde,
        lo sacas de admin LTE charts -->
        <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-header" style="background:#00a65a;color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar dispositivo</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">

<!--           entrada para el numero de la nota
 -->

             <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-code"></i></span>

                    <?php 

                        $item=null;
                        $valor=null;

                        $dispositivos = ControladorDispositivos::ctrMostrarDispositivos($item, $valor);

                        if (!$dispositivos) {

                          echo '<input type="text" class="form-control" id="nuevoDispositivo" name="nuevoDispositivo" value="1" readonly>';

                        }else{

                          foreach ($dispositivos as $key => $value) {
                            


                          }

                          $codigoFactura= $value["NumeroOrden"] + 1;

                          echo '<input type="text" class="form-control" id="nuevoDispositivo" name="nuevoDispositivo" value="'.$codigoFactura.'" readonly>';

                        }
                     ?>
                  </div>
                
                </div>
          <!--Entarda para el cliente -->

          <div class="form-group">

            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-users"></i></span>

             <select class="form-control input-lg" name="nuevoCliente" id="nuevoCliente" required>
               <option value="">Seleccionar el cliente propietario</option>

               <?php 
                  $item=null;
                  $valor=null;

                  $cliente= ControladorClientes::ctrMostrarClientes($item, $valor);

                  foreach ($cliente as $key => $value) {
                    
                      echo '<option value="'.$value["idCliente"].'">'.$value["nombre"].'</option>';
                  }

                ?>
             </select>
              
            </div>
            
          </div>

           <!--Entarda para el tipo de reparacion -->

          <div class="form-group">

            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

             <select class="form-control input-lg" name="nuevoTipoReparacion" id="nuevoTipoReparacion" required>
               <option value="">Seleccionar el tipo de reparación</option>

               <?php 
                  $item=null;
                  $valor=null;

                  $tipo= ControladorTipoReparacion::ctrMostrarTipo($item, $valor);

                  foreach ($tipo as $key => $value) {
                    
                      echo '<option value="'.$value["idTipoReparacion"].'">'.$value["nombre"].'</option>';
                  }

                ?>
             </select>
              
            </div>
            
          </div>

          <!--Entarda para la falla -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-warning"></i></span>

              <input type="text" class="form-control input-lg" name="nuevaFalla" id="nuevaFalla" placeholder="Ingresar la descrición de la falla. ejem: Mojado, no prende..."  required>
              <!--readonly es para solo lectura -->
              
            </div>
            
          </div>

         <!--Entarda para el IMEI -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="glyphicon glyphicon-signal"></i></span>

              <input type="number" class="form-control input-lg" name="nuevoImei" placeholder="Ingresa el IMEI del dispositivo. Ejem: 451236 20 069823 1" required>
              
            </div>
            
          </div>

          <!--Entarda para la descripcion -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>

              <input type="text" class="form-control input-lg" name="nuevaDescripcion" min="0" placeholder="Ingresa una descripcion, modelo, color, detalles esteticos..." required>
              
            </div>
            
          </div>

          <!--Entarda para el PRECIO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>

              <input type="number" class="form-control input-lg" name="nuevoPrecio" placeholder="Ingresa el precio Abroximado. (Asignado por el técnico)." required>
              
            </div>
            
          </div>

           <!--Entarda para el vendedor -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" name="nuevoRecibio" value="<?php echo $_SESSION["nombre"]; ?>" readonly>
              
            </div>
            
          </div>


           <!--Entarda para la fecha entrega -->

          <div class="form-group">

            <div class="input-group">

             

              <span class="input-group-addon"><i class="fa fa-calendar"> Fecha de entrega</i></span>
              <input type="date" class="form-control input-lg" name="nuevaFechaEntrega" id="nuevaFechaEntrega">
              
            </div>
            
          </div>
          

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel"><i class="fa fa-file-image-o"></i> SUBIR FOTO</div>

              <input type="file" class="nuevaImagenDispositivo" name="nuevaImagenDispositivo">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/dispositivos/default/tel.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </form>
    <?php 

          $crearDispositivo= new ControladorDispositivos();
          $crearDispositivo -> ctrCrearDispositivo();

     ?>
    </div>

  </div>
</div>




  <!--
////////////////////////////////Modal editar dispositivo///////////////
///////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
   -->
   <div id="modalEditarCelular" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!--Con el style sele agrega el color al heder en este caso es verde,
        lo sacas de admin LTE charts -->
        <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-header" style="background:#00a65a;color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar dispositivo</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">

<!--           entrada para el numero de la nota
 -->

             <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-code"></i></span>

                     <input type="text" class="form-control" id="editarDispositivo" name="editarDispositivo" value="" readonly>
                  </div>
                
                </div>
          <!--Entarda para el cliente -->

          <div class="form-group">

            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-users"></i></span>

             <select class="form-control input-lg" name="editarCliente" id="editarCliente" required>
               <option value="">Seleccionar el cliente propietario</option>

               <?php 
                  $item=null;
                  $valor=null;

                  $cliente= ControladorClientes::ctrMostrarClientes($item, $valor);

                  foreach ($cliente as $key => $value) {
                    
                      echo '<option value="'.$value["idCliente"].'">'.$value["nombre"].'</option>';
                  }

                ?>
             </select>
              
            </div>
            
          </div>

           <!--Entarda para el tipo de reparacion -->

          <div class="form-group">

            <div class="input-group">
              
              <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

             <select class="form-control input-lg" name="editarTipoReparacion" id="editarTipoReparacion" required>
               <option value="">Seleccionar el tipo de reparación</option>

               <?php 
                  $item=null;
                  $valor=null;

                  $tipo= ControladorTipoReparacion::ctrMostrarTipo($item, $valor);

                  foreach ($tipo as $key => $value) {
                    
                      echo '<option value="'.$value["idTipoReparacion"].'">'.$value["nombre"].'</option>';
                  }

                ?>
             </select>
              
            </div>
            
          </div>

          <!--Entarda para la falla -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-warning"></i></span>

              <input type="text" class="form-control input-lg" name="editarFalla" id="editarFalla" placeholder="Ingresar la descrición de la falla. ejem: Mojado, no prende..."  required>
              <!--readonly es para solo lectura -->
              
            </div>
            
          </div>

         <!--Entarda para el IMEI -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="glyphicon glyphicon-signal"></i></span>

              <input type="number" class="form-control input-lg" name="editarImei" id="editarImei" placeholder="Ingresa el IMEI del dispositivo. Ejem: 451236 20 069823 1" required>
              
            </div>
            
          </div>

          <!--Entarda para la descripcion -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>

              <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" min="0" placeholder="Ingresa una descripcion, modelo, color, detalles esteticos..." required>
              
            </div>
            
          </div>

          <!--Entarda para el PRECIO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>

              <input type="number" class="form-control input-lg" name="editarPrecio" id="editarPrecio" placeholder="Ingresa el precio Abroximado. (Asignado por el técnico)." required>
              
            </div>
            
          </div>

           <!--Entarda para el vendedor -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" name="editarRecibio"
              id="editarRecibio" value="" readonly>
              
            </div>
            
          </div>


           <!--Entarda para la fecha entrega -->

          <div class="form-group">

            <div class="input-group">

             

              <span class="input-group-addon"><i class="fa fa-calendar"> Fecha de entrega</i></span>
              <input type="date" class="form-control input-lg" name="editarFechaEntrega" id="editarFechaEntrega">
              
            </div>
            
          </div>
          

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel"><i class="fa fa-file-image-o"></i> SUBIR FOTO</div>

              <input type="file" class="nuevaImagenDispositivo" name="editarFotoDispositivo" id="nuevaImagenDispositivo">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/dispositivos/default/tel.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">


            </div>

          </div>

        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </form>
    <?php 

          $editarDispositivo= new ControladorDispositivos();
          $editarDispositivo -> ctrEditarDispositivo();

     ?>
    </div>

  </div>
</div>

   <?php 
          $eliminarDispositivo= new ControladorDispositivos();
          $eliminarDispositivo -> ctrEliminarDispositivo();
   ?>