$('.tablalistacomentario').DataTable( {
    "ajax": "../ajax/tablaComentario.php",
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

$(".tablalistacomentario").on("click", ".btnEliminarComentario", function(){

  var idComentario = $(this).attr("idComentario");

  swal({
        title: '¿Está seguro de bloquear este Comentario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, bloquear !'
      }).then(function(result){
        if (result.value) {
          
            window.location = rutaOculta+"comentario/bloquear&id="+idComentario;
        }

  })

})
$(".tablalistacomentario").on("click", ".btnComentario", function(){

  var idComentario = $(this).attr("idComentario");

  swal({
        title: '¿Está seguro de Permitir este Comentario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Permitir !'
      }).then(function(result){
        if (result.value) {
          
            window.location = rutaOculta+"comentario/permitir&id="+idComentario;
        }

  })

})
