<?php

$item = null;
$valor = null;
$orden = "idProducto";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

 ?>


<div class="box box-default">

  <div class="box-header with-border">

    <h3 class="box-title">Productos agregados recientemente</h3>

    <div class="box-tools pull-right">

      <button type="button" class="btn btn-box-tool" data-widget="collapse">

        <i class="fa fa-minus"></i>

      </button>

      <button type="button" class="btn btn-box-tool" data-widget="remove">

        <i class="fa fa-times"></i>

      </button>

    </div>

  </div>
  
  <div class="box-body">

    <ul class="products-list product-list-in-box">

    <?php

    for($i = 0; $i < 10; $i++){

      echo '<li class="item">

        <div class="product-img">

          <img src="'.$productos[$i]["imagen"].'" alt="Product Image">

        </div>

        <div class="product-info">

          <a href="productos" class="product-title">

            '.$productos[$i]["descripcion"].'

            <span class="label label-success pull-right">$'.$productos[$i]["precioVenta"].'</span>

          </a>
    
       </div>

      </li>';

    }

    ?>

    </ul>

  </div>

  <div class="box-footer text-center">

    <a href="productos" class="uppercase">Ver todos los productos</a>
  
  </div>

</div>
