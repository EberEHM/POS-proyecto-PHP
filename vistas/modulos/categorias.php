<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}
?>
<div class="content-wrapper">

    <section class="content-header">

      <h1>

        <i class="fa fa-th"></i>  Administrar categorías

      </h1>

    </section>

    <section class="content">


      <div class="box">
        <!--Es borde de arriba del cuadro. -->
        <div class="box-header with-border">
        <!-- Boton que abre el modal para formulario de usuarios. -->

        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCategoria">
            Agregar categoría
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
                  <th>categorías</th>
                  <th>Acciones</th>
                </tr>
              </thead>

            <tbody>
        <?php 

          $item = null;
          $valor = null;

          $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
          foreach ($categorias as $key => $value) {
           echo '<tr>
                <td>'.($key+1).'</td>
                <td>'.$value["categoria"].'</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>';

                    if ($_SESSION["perfil"]=="Administrador") {

                     echo ' <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-trash"></i></button>';
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
////////////////////////////////Modal agregar categoría///////////////
   -->
   <div id="modalAgregarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!--Con el style sele agrega el color al heder en este caso es verde,
        lo sacas de admin LTE charts -->
        <form role="form" method="post">
      <div class="modal-header" style="background:#00a65a;color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-th"></i>  Agregar categoría</h4>
      </div>

      <div class="modal-body">

        <div class="box-body">

          <!--Entarda para el nombre -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar el nombre de la categoría" required>
              
              </div>
            
            </div>
            
          </div>
          
        </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
      <?php 
       $crearCategoria= new ControladorCategorias();
       $crearCategoria -> ctrCrearCategoria();
       ?>

    </form>

    </div>

  </div>

</div>



  <!--
////////////////////////////////Modal editar categoría///////////////
   -->
   <div id="modalEditarCategoria" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!--Con el style sele agrega el color al heder en este caso es verde,
        lo sacas de admin LTE charts -->
        <form role="form" method="post">
      <div class="modal-header" style="background:#00a65a;color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-th"></i> Editar categoría</h4>
      </div>

      <div class="modal-body">

        <div class="box-body">

          <!--Entarda para el nombre -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" placeholder="Ingresar el nombre de la categoría" required>
              <input type="hidden" name="idCategoria" id="idCategoria">
              
              </div>
            
            </div>
            
          </div>
          
        </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-success">Guardar cambios</button>
      </div>
      <?php 
        $editarCategoria= new ControladorCategorias();
        $editarCategoria -> ctrEditarCategoria();
       ?>

    </form>

    </div>

  </div>

</div>
<?php 
  $borrar= new ControladorCategorias();
  $borrar ->ctrBorrarCategoria();

 ?>
