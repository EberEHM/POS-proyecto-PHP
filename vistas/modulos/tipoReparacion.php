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

        <i class="fa fa-briefcase"></i>  Administrar tipos de reparación

      </h1>

    </section>

    <section class="content">


      <div class="box">
        <!--Es borde de arriba del cuadro. -->
        <div class="box-header with-border">
        <!-- Boton que abre el modal para formulario de usuarios. -->

        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarTipo">
            Agregar tipo de reparación
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
                  <th>Acciones</th>
                </tr>
              </thead>

            <tbody>
        <?php 

          $item = null;
          $valor = null;

          $categorias = ControladorTipoReparacion::ctrMostrarTipo($item, $valor);
          foreach ($categorias as $key => $value) {
           echo '<tr>
                <td>'.($key+1).'</td>
                <td>'.$value["nombre"].'</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditarTipo" idTipo="'.$value["idTipoReparacion"].'" data-toggle="modal" data-target="#modalEditarTipo"><i class="fa fa-pencil"></i></button>';

                    if ($_SESSION["perfil"]=="Administrador") {

                     echo ' <button class="btn btn-danger btnEliminarTipo" id="'.$value["idTipoReparacion"].'"><i class="fa fa-trash"></i></button>';
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
////////////////////////////////Modal agregar TIpo///////////////
   -->
   <div id="modalAgregarTipo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!--Con el style sele agrega el color al heder en este caso es verde,
        lo sacas de admin LTE charts -->
        <form role="form" method="post">
      <div class="modal-header" style="background:#00a65a;color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-briefcase"></i>  Agregar nuevo tipo de reparación</h4>
      </div>

      <div class="modal-body">

        <div class="box-body">

          <!--Entarda para el nombre -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

              <input type="text" class="form-control input-lg" name="nuevoTipo" placeholder="Ingresar el nombre del tipo de reparación" required>
              
              </div>
            
            </div>
            
          </div>
          
        </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
      <?php 
       $crearTipo= new ControladorTipoReparacion();
       $crearTipo -> ctrCrearTipo();
       ?>

    </form>

    </div>

  </div>

</div>



  <!--
////////////////////////////////Modal editar categoría///////////////
   -->
   <div id="modalEditarTipo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!--Con el style sele agrega el color al heder en este caso es verde,
        lo sacas de admin LTE charts -->
        <form role="form" method="post">
      <div class="modal-header" style="background:#00a65a;color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-briefcase"></i> Editar tipo de reparación</h4>
      </div>

      <div class="modal-body">

        <div class="box-body">

          <!--Entarda para el nombre -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

              <input type="text" class="form-control input-lg" name="editarTipo" id="editarTipo" placeholder="Ingresar el nombre del tipo de reparación" required>
              <input type="hidden" name="idTipo" id="idTipo">
              
              </div>
            
            </div>
            
          </div>
          
        </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-success">Guardar cambios</button>
      </div>
      <?php 
        $editarTipo= new ControladorTipoReparacion();
        $editarTipo -> ctrEditarTipo();
       ?>

    </form>

    </div>

  </div>

</div>
<?php 
  $borrar= new ControladorTipoReparacion();
  $borrar ->ctrBorrarTipo();

 ?>
