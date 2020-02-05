<?php
require_once 'models/Bancos.php';

class bancosController{
	
	public function index() {
		require_once 'views/layout/menu.php';			
		require_once 'views/bancos/listabanco.php';
	}
	static public function ListabancosId($id_banco) {
		$bancos = new Bancos();
		$bancos->setId_banco($id_banco);
		$detalles = $bancos->ListarBancosId();
		return $detalles;
	}
	static public function tiposdecuenta() {
		$bancos = new Bancos();
		$detalles = $bancos->TiposCuentas();
		return $detalles;
	}
	public function registrarbancos() {
		require_once 'views/layout/menu.php';			
		require_once 'views/bancos/listabanco.php';
		if($_POST['nombrebanco']){
			$nombre = isset($_POST['nombrebanco']) ? $_POST['nombrebanco']:FALSE;
			$tasa = isset($_POST['tasa']) ? $_POST['tasa']:FALSE;
			$estado = isset($_POST['estado']) ? $_POST['estado']:FALSE;
			if($nombre && $estado){
				$banco = new Bancos();
				$banco->setNombre($nombre);
				$banco->setEstado($estado);
				$banco->setTasa($tasa);
				
				$file = $_FILES['imagen'];
				$fileNom = $file['name'];
				$type = $file['type'];
				
				$dir = 'image/bancos';
				
				if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png') {
					
					if(!is_dir($dir)){
						mkdir($dir, 0777,TRUE);
					}
					$banco->setImg($fileNom);
					move_uploaded_file($file['tmp_name'],$dir.'/'.$fileNom);
					
				}else{
					$fileNom = "";
					$banco->setImg($fileNom);
				}
				
				$resp = $banco->Guardar();
				
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
						  title: "¡Debe llenar todos los campos!",
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
						  title: "¡Registro no Guardado!",
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
	public function actulizar() {
		require_once 'views/layout/menu.php';			
		require_once 'views/bancos/listabanco.php';
		if($_POST['id']){
			
			$id = isset($_POST['id']) ? $_POST['id'] : FALSE;
			$nombre = isset($_POST['nombrebanco']) ? $_POST['nombrebanco']:FALSE;
			$estadotipo = isset($_POST['estado']) ? $_POST['estado']:FALSE;
			if($id && $nombre && $estadotipo){
				$banco = new Bancos();
				if($estadotipo = 'activado'){
					$estado = 1;
				}else{
					$estado = 0;
				}
				$banco->setId_banco($id);
				$banco->setNombre($nombre);
				$banco->setEstado($estado);
				
				
				$file = $_FILES['editarImagen'];
				$fileNom = $file['name'];
				$type = $file['type'];
				
				$dir = 'image/bancos';
				
				if(empty($fileNom)){
					
					$img = $_POST['imagenActual'];
					$parroquia->setFoto($img);
				
				} else {
					if($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png'){
						
						if (!empty($_POST['imagenActual'])){
							unlink($dir.'/'.$_POST['imagenActual']);
						}
						$img = $fileNom;
						$banco->setImg($img);
						
						move_uploaded_file($file['tmp_name'], $dir .'/'.$fileNom);
						
					}
				}
			
				
				
				$resp = $banco->Actulizar();
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Registro Modificado Correctamente",
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
						  title: "¡Registro no gurdado!",
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
				
			}	
		}else{
			
		}
	}
	
	public function eliminar() {
		if(isset($_GET['id'])){
			
			$id_banco = $_GET['id'];
			$bancos = new Bancos();
			$bancos->setId_banco($id_banco);
			
			$datos = $bancos->ListarBancosId();
			
			
			$resp = $bancos->Eliminar();
			
			
			if($resp){
				
				while ($row = $datos-> fetch_object()) {
				if(isset($row->img)!= ''){
					if(is_file('image/bancos/'.$row->img)){
						unlink('image/bancos/'.$row->img);
					}
					
				}
			}
				echo'<script>

					swal({
						  type: "success",
						  title: "Registro Eliminado Correctamente",
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
						  title: "¡No se puede eliminar esta registro!",
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
						  title: "¡Registro no eliminado!",
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