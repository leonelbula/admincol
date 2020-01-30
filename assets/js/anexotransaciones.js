var rutaOculta = $("#rutaOculta").val();
$(".tablalistatransacciones").on("click", ".btnAnexarconfirmacion", function(){

 var id= $(this).attr("idtransaccion");
	//console.log("respuesta" , id);		
  var datos = new FormData();
	datos.append("id", id);

	$.ajax({

		url:"../ajax/verTransacion.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			//console.log("respuesta" , respuesta);	
						
			$(".previsualizar").attr("src",  rutaOculta+"image/transaciones/"+respuesta["anexo"]);
			
						
		}
	})

})

var rutaOculta = $("#rutaOculta").val();
$(".tablalistatransacciones").on("click", ".btnVer", function(){

 var id= $(this).attr("id");
	//console.log("respuesta" , id);		
  var datos = new FormData();
	datos.append("id", id);

	$.ajax({

		url:"../ajax/verTransacion.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			//console.log("respuesta" , respuesta);			
			
			$("#modalVer .nombre").html(respuesta["titular"]);
			$("#modalVer .fecha").html(respuesta["fecha"]);
			$("#modalVer .valor").html(respuesta["valor"]);
			$("#modalVer .numero").html(respuesta["num_cuenta"]);
			$("#modalVer .tipo").html(respuesta["tipo_cuenta"]);
			$("#modalVer .banco").html(respuesta["nombre"]);
			
			$(".previsualizar").attr("src",  rutaOculta+"image/transaciones/"+respuesta["anexo_usuario"]);
			
						
		}
	})

})
