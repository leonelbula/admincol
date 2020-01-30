<?php
require_once 'models/Transacciones.php';


class transaccionesController {

	public function index() {		
		require_once 'views/layout/menu.php';	
		$transancion = new Transacciones();
		$detalles = $transancion->listarTransacciones();
		require_once 'views/transacciones/listatransacciones.php';
		
	}
	public function confirmar() {
		require_once 'views/layout/menu.php';	
		if ($_POST['id']){
			$id = isset($_POST['id'])? $_POST['id']:FALSE;
			$estado = isset($_POST['estado'])? $_POST['estado']:FALSE;
			
			if($id){
				$envios = new Transacciones();
				$envios->setId($id);
				
				$file = $_FILES['img'];
				$fileNom = $file['name'];
				$type = $file['type'];
				
				$dir = 'image/transaciones';
				
				if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png') {
					
					if(!is_dir($dir)){
						mkdir($dir, 0777,TRUE);
					}
					
					$respimg = move_uploaded_file($file['tmp_name'],$dir.'/'.$fileNom);
					
					if($respimg){
						$envios->setAnexo($fileNom);
						$envios->setEstado($estado);
						$resp = $envios->ConfirmarTransacion();
					}
					
				}else{
					$fileNom = "";
					$envios->setAnexo($fileNom);
					$resp = FALSE;
				}
				
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
			
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no selecionando!",
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
	
	public function confproceso() {
		require_once 'views/layout/menu.php';	
		if($_POST['id']){
			$id = isset($_POST['id']) ? $_POST['id'] : FALSE;
			$estado = isset($_POST['estado']) ? $_POST['estado'] : FALSE;
			$valor = isset($_POST['nuevovalor']) ? $_POST['nuevovalor'] : FALSE;
			
			if($id && $valor){
				$trans = new Transacciones();
				$trans->setId($id);
				$trans->setEstado($estado);
				$trans->setValor($valor);
				$resp = $trans->ValidarTransacion();
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
				} else {
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
			}else{
				echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no guardado hay campos vacios!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
			}
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Selecionado!",
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
	public function reporte() {
		require_once 'views/layout/menu.php';
	    require_once 'views/transacciones/reporte.php';
	}
	
}