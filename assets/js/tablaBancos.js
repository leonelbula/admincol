// $.ajax({
//
// 	url: "../ajax/tablaEstilista.php",
// 	success:function(respuesta){
//				console.log("respuesta", respuesta);
//	}
//
// })
// 
 $('.tablalistabanco').DataTable( {
    "ajax": "../ajax/tablaBancos.php",
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

/*=============================================
BORRAR PRODUCTO
=============================================*/
var rutaOculta = $("#rutaOculta").val();



$(".tablalistabanco").on("click", ".btnEliminarBanco", function(){

  var idbanco= $(this).attr("idbanco");

  swal({
        title: '¿Está seguro de borrar registro?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar !'
      }).then(function(result){
        if (result.value) {
          
            window.location = rutaOculta+"bancos/eliminar&id="+idbanco;
        }

  })

})

$(".tablalistabanco").on("click", ".btnEditarBanco", function(){

 var idbanco= $(this).attr("idbanco");

  var datos = new FormData();
	datos.append("idbanco", idbanco);

	$.ajax({

		url:"../ajax/bancoAjax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			//console.log("respuesta" , respuesta);

			$("#modalEditarbanco .id").val(respuesta["id"]);
			
			$("#modalEditarbanco .nombre").val(respuesta["nombre"]);
			$("#modalEditarbanco .tasa").val(respuesta["tasa"]);
			$("#modalEditarbanco .img").val(respuesta["img"]);
			
			$(".previsualizar").attr("src",  rutaOculta+"image/bancos/"+respuesta["img"]);
			
			if(respuesta["estado"] != 1){
			
				
				$("#modalEditarbanco .seleccionarEstadobanco").val(respuesta["estado"]);
				$("#modalEditarbanco .optionEditarbanco").html("activado");
					

			}else{

				$("#modalEditarbanco .seleccionarestado").html("desactivado");

			}
			
						
		}
	})

})
