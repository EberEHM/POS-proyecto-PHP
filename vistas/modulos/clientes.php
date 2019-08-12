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

        Administrar clientes

      </h1>
    </section>

    <section class="content">


      <div class="box">
        <!--Es borde de arriba del cuadro. -->
        <div class="box-header with-border">
        <!-- Boton que abre el modal para formulario de usuarios. -->

        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCliente">
          <i class="fa fa-user"></i>

          Agregar cliente
        </button>
        </div>

        <!--Cuerpo dela caja.
///////////////////////////Aqui se encuntra la tabla de usuarios//////////////////////
         -->
        <div class="box-body">

         
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>

          <th style="width:10px">#</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>Direccion</th>
          <th>Total compras</th>
          <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>


          <?php
          
            $item=null;
            $valor=null;

            $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

            foreach ($clientes as $key => $value) {
              
              echo '  <tr>

                <td>'.($key+1).'</td>
                <td>'.$value["nombre"].'</td>
                <td>'.$value["email"].'</td>
                <td>'.$value["telefono"].'</td>
                <td>'.$value["direccion"].'</td>
                <td>'.$value["compras"].'</td>
                <td>

                  <div class="btn-group">
                     <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["idCliente"].'"><i class="fa fa-pencil"></i></button>';


                  if ($_SESSION["perfil"]=="Administrador") {

                  echo  '<button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["idCliente"].'"><i class="fa fa-trash"></i></button>';
                }

                  echo '</div>  

                </td>

          </tr>';


            }
            ?>
          

        </tbody>

       </table>

        </div>
        

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

  <!--
////////////////////////////////Modal agregar cliente///////////////
   -->
   <div id="modalAgregarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!--Con el style sele agrega el color al heder en este caso es verde,
        lo sacas de admin LTE charts -->
        <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-header" style="background:#00a65a;color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-user"></i> Agregar cliente</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">

          <!--Entarda para el nombre -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar el nombre" required>
              
            </div>
            
          </div>

                <!--Entarda para el correo -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

              <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar el correo"required>
              
            </div>
            
          </div>
          
                <!--Entarda para el telefono -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-phone"></i></span>

              <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar el telefono" data-inputmask="'mask':'(999) 999 9999'" data-mask required>
              
            </div>
            
          </div>
          
                <!--Entarda para la direccion -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

              <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar la direccion" required>
              
            </div>
            
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </form>

      <?php 

        $crearCliente= new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

       ?>

    </div>

  </div>
</div>


<!--////////////////////////////////Modal editar cliente///////////////
   -->
   <div id="modalEditarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!--Con el style sele agrega el color al heder en este caso es verde,
        lo sacas de admin LTE charts -->
        <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-header" style="background:#00a65a;color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-user"></i>  Editar cliente</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">

          <!--Entarda para el nombre -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>

              <input type="hidden" id="idCliente" name="idCliente">
            </div>
            
          </div>

                <!--Entarda para el correo -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

              <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>
              
            </div>
            
          </div>
          
                <!--Entarda para el telefono -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-phone"></i></span>

              <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 999 9999'" data-mask required>
              
            </div>
            
          </div>
          
                <!--Entarda para la direccion -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

              <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>
              
            </div>
            
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </form>

      <?php 

        $editarCliente= new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

       ?>

    </div>

  </div>
</div>

<?php 

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();



 ?>







  