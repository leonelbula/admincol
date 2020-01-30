// $.ajax({
//
// 	url: "../ajax/tablaSolicitudes.php",
// 	success:function(respuesta){
//				console.log("respuesta", respuesta);
//	}
//
// })
 
 $('.tablalistasoliditudes').DataTable( {
    "ajax": "../ajax/tablaSolicitudes.php",
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
$(".tablalistasoliditudes").on("click", ".btnRespuesta", function(){

 var id= $(this).attr("idsolicitud");
	console.log("respuesta" , id);		
  var datos = new FormData();
	datos.append("id", id);

	$.ajax({

		url:"../ajax/versolicitud.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			console.log("respuesta" , respuesta);	
						
			$("#modalRespuesta .id").val(respuesta["id"]);
			$("#modalRespuesta .detalles").val(respuesta["deatalles"]);			
			
						
		}
	})

})
