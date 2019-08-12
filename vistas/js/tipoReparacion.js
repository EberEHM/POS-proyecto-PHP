/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarTipo", function(){

	var idTipo = $(this).attr("idTipo");
  
	var datos = new FormData();
	datos.append("idTipo", idTipo);

	$.ajax({
		url: "ajax/tipoReparacion.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarTipo").val(respuesta["nombre"]);
     		$("#idTipo").val(respuesta["idTipoReparacion"]);

     	}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarTipo", function(){

	 var id = $(this).attr("id");

	 swal({
	 	title: '¿Está seguro de borrar el tipo de reparación?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=tipoReparacion&idTipoReparacion="+id;

	 	}

	 })

})