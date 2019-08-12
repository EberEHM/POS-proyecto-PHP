/*=============================================
          ACTIVAR DISPOSITIVO
=============================================*/
$(document).on("click", ".btnActivar2", function(){

  var idDispositivo = $(this).attr("idDispositivo");
  var estadoDispositivo = $(this).attr("estadoDispositivo");

  var datos = new FormData();
  datos.append("activarId", idDispositivo);
  datos.append("activarDispositivo", estadoDispositivo);

    $.ajax({

    url:"ajax/dispositivos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

        if(window.matchMedia("(max-width:767px)").matches){
    
           swal({
            title: "El dispositivo ha sido actualizado",
            type: "success",
            confirmButtonText: "¡Cerrar!"
          }).then(function(result) {
            
              if (result.value) {

              window.location = "dispositivos";

            }

          });


    }
      }

    })

    if(estadoDispositivo == 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Reparacion');
      $(this).attr('estadoDispositivo',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Reparado');
      $(this).attr('estadoDispositivo',0);

    }

})

/*=============================================
SUBIENDO LA FOTO DEL DISPOSITIVO
=============================================*/
$(".nuevaImagenDispositivo").change(function(){

  var imagen = this.files[0];
  
  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $(".nuevaImagenDispositivo").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else if(imagen["size"] > 3000000){

      $(".nuevaImagenDispositivo").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 2MB!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else{

      var datosImagen = new FileReader;
      datosImagen.readAsDataURL(imagen);

      $(datosImagen).on("load", function(event){

        var rutaImagen = event.target.result;

        $(".previsualizar").attr("src", rutaImagen);

      })

    }
})

/*=============================================
EDITAR USUARIO
=============================================*/
$(document).on("click", ".btnEditarDispositivo", function(){

  var idDispositivo = $(this).attr("idDispositivo");
  
  var datos = new FormData();
  datos.append("idDispositivo", idDispositivo);

  $.ajax({

    url:"ajax/dispositivos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      
      $("#editarDispositivo").val(respuesta["NumeroOrden"]);
      $("#editarCliente").val(respuesta["idCliente"]);
      $("#editarTipoReparacion").val(respuesta["idTipoReparacion"]);
      $("#editarFalla").val(respuesta["descripcionFalla"]);
      $("#editarImei").val(respuesta["imei"]);
      $("#editarDescripcion").val(respuesta["descripcion"]);
      $("#editarPrecio").val(respuesta["presupuesto"]);
      $("#editarRecibio").val(respuesta["recibio"]);
      $("#editarFechaEntrega").val(respuesta["fechaAbroximada"]);
      $("#fotoActual").val(respuesta["imagen"]);

      if(respuesta["imagen"] != ""){

        $(".previsualizar").attr("src", respuesta["imagen"]);

      }
    }
  });
})



/*=============================================
        ELIMINAR USUARIO
=============================================*/
$(document).on("click", ".btnEliminarDispositivo", function(){

  var idDispositivo = $(this).attr("idDispositivo");
  var fotoDispositivo = $(this).attr("fotoDispositivo");
  var dispositivo = $(this).attr("dispositivo");

  swal({
    title: '¿Está seguro de borrar el dispositivo?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar dispositivo!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=dispositivos&idDispositivo="+idDispositivo+"&dispositivo="+dispositivo+"&fotoDispositivo="+fotoDispositivo;

    }

  })

})