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
      
      Crear venta
    
    </h1>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioVenta">

            <div class="box-body">
  
              <div class="box">

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"];  ?>">

                  </div>

                </div> 

                <!--=====================================
                ENTRADA DEL codigo venta
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <?php 

                        $item=null;
                        $valor=null;

                        $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                        if (!$ventas) {

                          echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';

                        }else{

                          foreach ($ventas as $key => $value) {
                            


                          }

                          $codigo= $value["codigoFactura"] + 1;

                          echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';

                        }
                     ?>
                  </div>
                
                </div>

                <!--=====================================
                        ENTRADA DEL CLIENTE
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="">Seleccionar cliente</option>

                    <?php 

                      $item=null;
                      $valor=null;

                      $clientes= ControladorClientes::ctrMostrarClientes($itme, $valor);

                      foreach ($clientes as $key => $value) {
                        
                    echo '<option value="'.$value['idCliente'].'">'.$value["nombre"].'</option>'; 


                      }


                     ?>

                    </select>
                    
                    <span class="input-group-addon"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>
                  
                  </div>
                
                </div>

                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================--> 

                <div class="form-group row nuevoProducto">
                   <!--=====================================
               el contenido esta en el js y aparece despues de dar click en agregar
                ======================================-->
                </div>

                <input type="hidden" id="listAbroductos" name="listAbroductos">
                <!--=====================================
                BOTÓN PARA AGREGAR PRODUCTO
                ======================================-->

                <button type="button" class="btn btn-primary hidden-lg btnAgregarProducto">Agregar producto</button>

                <hr>

                <div class="row">

                  <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->
                  
                  <div class="col-xs-8 pull-right">
                    
                    <table class="table">

                      <thead>

                        <tr>
                          <th>Impuesto</th>
                          <th>Total</th>      
                        </tr>

                      </thead>

                      <tbody>
                      
                        <tr>
                          
                          <td style="width: 50%">
                            
                            <div class="input-group">
                           
                              <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0">
                              <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto">

                              <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto">

                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                        
                            </div>

                          </td>

                           <td style="width: 50%">
                            
                            <div class="input-group">
                           
                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total=""  readonly required>

                              <input type="hidden" name="totalVenta" id="totalVenta">
                              
                        
                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>

                  </div>

                </div>

                <hr>

                <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->

                <div class="form-group row">
                  
                  <div class="col-xs-6" style="padding-right:0px">
                    
                     <div class="input-group">
                  
                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">Seleccione método de pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="TC">Tarjeta Crédito</option>
                        <option value="TD">Tarjeta Débito</option>                  
                      </select>    

                    </div>

                  </div>
                  <div class="cajasMetodoPago"></div>
                    
                    <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                  </div>

                  <div class="col-xs-6" style="padding-left:0px">
                        
                    <div class="input-group">
            
                      
                    </div>

                  </div>

                <br>
      
              </div>

          </div>

          <div class="box-footer">

            <button type="submit" class="btn btn-success pull-right">Guardar venta</button>

          </div>

        </form>

        <?php 

          $guardarVenta = new ControladorVentas();
          $guardarVenta -> ctrCrearVenta();
         ?>

        </div>
          
      </div>

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        
        <div class="box box-primary">

          <div class="box-header with-border"></div>

          <div class="box-body">
            
            <table class="table table-bordered table-striped dt-responsive tablaVentas">
              
               <thead>

                 <tr>
                  <th style="width: 10px">#</th>
                  <th>Imagen</th>
                  <th>Código</th>
                  <th>Descripcion</th>
                  <th>Stock</th>
                  <th>Acciones</th>
                </tr>

              </thead>

            </table>

          </div>

        </div>


      </div>

    </div>
   
  </section>

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

              <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar el correo" required>
              
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