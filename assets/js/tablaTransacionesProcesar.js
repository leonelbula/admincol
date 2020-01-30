// $.ajax({
//
// 	url: "../ajax/tablaTransacionesProcesar.php",
// 	success:function(respuesta){
//				console.log("respuesta", respuesta);
//	}
//
// })
 
 $('.tablalistatransaccionessinProcesar').DataTable( {
    "ajax": "../ajax/tablaTransacionesProcesar.php",
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
$(".tablalistatransaccionessinProcesar").on("click", ".btnProcesar", function(){

 var idtransaccion= $(this).attr("idtransaccion");
		//console.log("respuesta" , idtransaccion);
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
			
			console.log("respuesta" , respuesta);

			$("#modalPorcesar .idProceso").val(respuesta["id"]);
			$("#modalPorcesar .valorProceso").val(respuesta["valor"]);
			
						
		}
	})

})