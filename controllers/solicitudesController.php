<?php

require_once 'models/Solicitudes.php';

class solicitudesController {

	public function index() {
		require_once 'views/layout/header.php';
		require_once 'views/layout/menu.php';
		require_once 'views/solicitudes/listasolicitudes.php';
	}

	public function respuesta() {
		
		//require_once 'views/layout/menu.php';
		if ($_POST['id']) {
			$id = isset($_POST['id']) ? $_POST['id'] : FALSE;
			$estado = isset($_POST['estado']) ? $_POST['estado'] : FALSE;
			$respuesta = isset($_POST['respuesta']) ? $_POST['respuesta'] : FALSE;
			
			if ($id && $respuesta) {
				$solicitud = new Solicitudes();
				$solicitud->setEstado($estado);
				$solicitud->setId($id);
				$solicitud->setRespuesta($respuesta);
				
				$resp = $solicitud->Guardar();
				
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Registro guardado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
				}else{
					echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no guardado!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
				}
				
			} else {
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no guardado campos vacios!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
			}
		} else {
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no selecionado!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
		}
	}

}
