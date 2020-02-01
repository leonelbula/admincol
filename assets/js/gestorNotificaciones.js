/*=============================================
ACTUALIZAR NOTIFICACIONES
=============================================*/
var rutaOculta = $("#rutaOculta").val();
$(".actualizarNotificaciones").click(function(e){

	e.preventDefault();

	var item = $(this).attr("item");

	var datos = new FormData();
 	datos.append("item", item );

  	$.ajax({

  		 url:"../ajax/ajaxNotificaciones.php",
  		 method: "POST",
	  	data: datos,
	  	cache: false,
      	contentType: false,
      	processData: false,
      	success: function(respuesta){

  		  	if(respuesta == "ok"){

      	    	if(item == "consignacion"){

      	    		window.location = rutaOculta+"transacciones/";
      	    	}

      	    	if(item == "usuario"){

      	    		window.location = rutaOculta+"home/listausuario";
      	    	} 
				
				if(item == "comentario"){

      	    		window.location = rutaOculta+"comentario/";
      	    	}   
				if(item == "confirmacion"){

      	    		window.location = rutaOculta+"transacciones/";
      	    	}   

      	    }

      	 }

  	})
})