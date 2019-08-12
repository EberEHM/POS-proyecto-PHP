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

         <i class="fa fa-product-hunt"></i>
          Administrar productos

      </h1>

    </section>

    <section class="content">


      <div class="box">
        <!--Es borde de arriba del cuadro. -->
        <div class="box-header with-border">
        <!-- Boton que abre el modal para formulario de usuarios. -->

        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarProducto">
          Agregar producto
        </button>
        </div>

        <!--Cuerpo dela caja.
///////////////////////////Aqui se encuntra la tabla de productos//////////////////////
         -->
        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
           
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Descripcion</th>
                  <th>Stock</th>
                  <th>Precio de compra</th>
                  <th>Precio de venta</th>
                  <th>Acciones</th> 
                </tr>
              </thead>

              <tbody>

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
////////////////////////////////Modal agregar prodcuto///////////////
   -->
   <div id="modalAgregarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!--Con el style sele agrega el color al heder en este caso es verde,
        lo sacas de admin LTE charts -->
        <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-header" style="background:#00a65a;color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar producto</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">

          <!--Entarda para la categoria -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span>

             <select class="form-control input-lg" name="nuevaCategoria" id="nuevaCategoria" required>
               <option value="">Seleccionar categoría</option>

               <?php 
                  $item=null;
                  $valor=null;

                  $categorias= ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                      echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                ?>
             </select>
              
            </div>
            
          </div>

          <!--Entarda para el codigo -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-code"></i></span>

              <input type="text" class="form-control input-lg" name="nuevoCodigo" id="nuevoCodigo" placeholder="Ingresar el código"  required>
              <!--readonly es para solo lectura -->
              
            </div>
            
          </div>

         <!--Entarda para la descripción -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

              <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar la descripción" required>
              
            </div>
            
          </div>

          <!--Entarda para el stock -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-check"></i></span>

              <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Ingresar el stock" required>
              
            </div>
            
          </div>

<!--Entarda para el precio compra -->

        <div class="form-group row">

            <div class="col-xs-12 col-sm-6">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoPrecioCompra" id="nuevoPrecioCompra" min="0" placeholder="Precio de compra" step="any" required>
                
              </div>

          </div>
            
          <!--Entarda para el precio de venta -->

             <div class="col-xs-12 col-sm-6">

                    <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                    <input type="number" class="form-control input-lg" name="nuevoPrecioVenta" id="nuevoPrecioVenta" min="0" placeholder="Precio de venta" step="any" required readonly>
                    <!-- step="any" permite ingresar numeros con punto decimal en los imput de tipo number xd 18/06/2019 -->
                    
                  </div>

                  <br>
                      <!-- Checkbox para seleccionar el porcentaje-->
                  <div class="col-xs-6">

                      <div class="form-group">

                          <label>
                            
                              <input type="checkbox" class="flat-red porcentaje"checked>Utilizar porcentaje.

                          </label>
                        
                      </div>
                    
                  </div>
             <!-- Entrada para el porcentaje-->
            <div class="col-xs-6" style="padding:0">

              <div class="input-group">
                
                  <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                  <span class="input-group-addon"><i class="fa fa-percent"></i></span>

              </div>
              
            </div>

            </div>
            
          </div>
          

<!--Entarda para foto -->

          <div class="form-group">

           <div class="Panel">
             Subir imagen
           </div>
           <input type="file" class="nuevaImagen" name="nuevaImagen">
           <p class="help-block">Peso máximo de la foto: 3MB</p>
           <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar"  width="100px">
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </form>
    <?php 

          $crearProducto= new ControladorProductos();
          $crearProducto -> ctrCrearProducto();

     ?>
    </div>

  </div>
</div>

  <!--
////////////////////////////////Modal editar prodcuto///////////////
   -->
   <div id="modalEditarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!--Con el style sele agrega el color al heder en este caso es verde,
        lo sacas de admin LTE charts -->
        <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-header" style="background:#00a65a;color: white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar producto</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">

          <!--Entarda para la categoria -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span>

             <select class="form-control input-lg" name="editarCategoria" readonly required>

               <option id="editarCategoria"></option>

             </select>
              
            </div>
            
          </div>

          <!--Entarda para el codigo -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-code"></i></span>

              <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo" readonly>
              <!--readonly es para solo lectura -->
            </div>
            
          </div>

         <!--Entarda para la descripción -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

              <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required>
              
            </div>
            
          </div>

          <!--Entarda para el stock -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-check"></i></span>

              <input type="number" class="form-control input-lg" name="editarStock"  id="editarStock" min="0" required>
              
            </div>
            
          </div>

<!--Entarda para el precio compra -->

        <div class="form-group row">

            <div class="col-xs-12 col-sm-6">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                <input type="number" class="form-control input-lg" name="editarPrecioCompra" id="editarPrecioCompra" min="0" step="any" required>
                
              </div>

          </div>
            
          <!--Entarda para el precio de venta -->

             <div class="col-xs-12 col-sm-6">

                    <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                    <input type="number" class="form-control input-lg" name="editarPrecioVenta" id="editarPrecioVenta" min="0" step="any" readonly required>
                    <!-- step="any" permite ingresar numeros con punto decimal en los imput de tipo number xd 18/06/2019 -->
                    
                  </div>

                  <br>
                      <!-- Checkbox para seleccionar el porcentaje-->
                  <div class="col-xs-6">

                      <div class="form-group">

                          <label>
                            
                              <input type="checkbox" class="flat-red cajaPorcentaje"checked>Utilizar porcentaje.

                          </label>
                        
                      </div>
                    
                  </div>
             <!-- Entrada para el porcentaje-->
            <div class="col-xs-6" style="padding:0">

              <div class="input-group">
                
                  <input type="number" class="form-control input-lg editarPorcentaje" min="0" value="40" required>

                  <span class="input-group-addon"><i class="fa fa-percent"></i></span>

              </div>
              
            </div>

            </div>
            
          </div>
          

<!--Entarda para foto -->

          <div class="form-group">

           <div class="Panel">
             Subir imagen
           </div>
           <input type="file" class="nuevaImagen" name="editarImagen">
           <p class="help-block">Peso máximo de la foto: 3MB</p>
           <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar"  width="100px">
           <input type="hidden" name="imagenActual" id="imagenActual">
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </form>
      <?php 

          $editarProducto= new ControladorProductos();
          $editarProducto -> ctrEditarProducto();


       ?>
    </div>

  </div>
</div>

   <?php 
          $eliminarProducto= new ControladorProductos();
          $eliminarProducto -> ctreliminarProducto();
   ?>