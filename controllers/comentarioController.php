<?php

require_once 'models/Comentario.php';

class comentarioController {

	public function index() {
		require_once 'views/layout/menu.php';
		require_once 'views/comentario/listacomentario.php';
	}

	public function bloquear() {
		require_once 'views/layout/menu.php';
		require_once 'views/comentario/listacomentario.php';
		if ($_GET['id']) {
			$id = $_GET['id'];
			$estado = 0;
			$obj = new Comentario();
			$obj->setId($id);
			$obj->setEstado($estado);
			$reps = $obj->Guardar();
			if ($reps) {
				echo'<script>

					swal({
						  type: "success",
						  title: "Registro guardado con exito",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
			} else {
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Bloqueado !",
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
						  title: "¡Registro no Selecionado !",
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
	
	public function permitir() {
		require_once 'views/layout/menu.php';
		require_once 'views/comentario/listacomentario.php';
		if ($_GET['id']) {
			$id = $_GET['id'];
			$estado = 1;
			$obj = new Comentario();
			$obj->setId($id);
			$obj->setEstado($estado);
			$reps = $obj->Guardar();
			if ($reps) {
				echo'<script>

					swal({
						  type: "success",
						  title: "Registro guardado con exito",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
			} else {
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Bloqueado !",
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
						  title: "¡Registro no Selecionado !",
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

	public function vercomentario() {
		require_once 'views/layout/menu.php';
		if ($_GET['id']) {
			$id = $_GET['id'];
			$obj = new Comentario();
			$obj->setId($id);
			$detalles = $obj->MostrarInformacion();
			require_once 'views/comentario/listacomentario.php';
		} else {
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Selecionado !",
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
