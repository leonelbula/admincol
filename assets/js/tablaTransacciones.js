// $.ajax({
//
// 	url: "../ajax/tablaTransacciones.php",
// 	success:function(respuesta){
//				console.log("respuesta", respuesta);
//	}
//
// })
 
 $('.tablalistatransacciones').DataTable( {
    "ajax": "../ajax/tablaTransacciones.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );

var rutaOculta = $("#rutaOculta").val();
$(".tablalistatransacciones").on("click", ".btnAnexar", function(){

 var idtransaccion= $(this).attr("idtransaccion");

  var datos = new FormData();
	datos.append("idtransaccion", idtransaccion);

	$.ajax({

		url:"../ajax/transaccionesAjax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			//console.log("respuesta" , respuesta);

			$("#modalConfirmar .id").val(respuesta["id"]);
			
						
		}
	})

})

//var rutaOculta = $("#rutaOculta").val();
//$(".tablalistatransacciones").on("click", ".btnVer", function(){
//
// var id= $(this).attr("id");
//
//  var datos = new FormData();
//	datos.append("id", id);
//
//	$.ajax({
//
//		url:"../ajax/verTransacion.php",
//		method: "POST",
//		data: datos,
//		cache: false,
//		contentType: false,
//		processData: false,
//		dataType: "json",
//		success: function(respuesta){
//			
//			//console.log("respuesta" , respuesta);			
//			
//			$("#modalVer .nombre").html(respuesta["titular"]);
//			$("#modalVer .fecha").html(respuesta["fecha"]);
//			$("#modalVer .valor").html(respuesta["valor"]);
//			$("#modalVer .numero").html(respuesta["num_cuenta"]);
//			$("#modalVer .tipo").html(respuesta["tipo_cuenta"]);
//			$("#modalVer .banco").html(respuesta["nombre"]);
//			
//			
//			
//						
//		}
//	})
//
//})
//
//
//
//

//$('.tablalistatransacciones tbody').on("click", ".btnConfirmar", function(){
//
//	var idtransaccion = $(this).attr("idtransaccion");
//	var estado = $(this).attr("estado");
//	 //console.log("respuesta", idtransaccion);
//	var datos = new FormData();
// 	datos.append("idtransaccion", idtransaccion);  	
//
//  	$.ajax({
//
//	  url:"../ajax/transaccionesAjax.php",
//	  method: "POST",
//	  data: datos,
//	  cache: false,
//      contentType: false,
//      processData: false,
//      success: function(respuesta){    
//          
//           //console.log("respuesta", respuesta);
//
//      }
//
//  	})
//
//	if(estado == 0){
//
//  		$(this).removeClass('btn-success');
//  		$(this).addClass('btn-danger');
//  		$(this).html('Por Confirmar');
//  		$(this).attr('estado',1);
//
//  	}else{
//
//  		$(this).addClass('btn-success');
//  		$(this).removeClass('btn-danger');
//  		$(this).html('Confirmada');
//  		$(this).attr('estado',0);
//
//  	}
//
//})