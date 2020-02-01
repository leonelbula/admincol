<?php

require_once 'models/DatosEmpresa.php';
require_once 'models/DatosConsignacion.php';


class ParametrosController{
	
	public function index() {
		require_once 'views/layout/menu.php';
		$informacion = new DatosEmpresa();
		$detallesEmpresa = $informacion ->MostrarInformacion();
		$detallesEditar  = $informacion ->MostrarInformacion();	
		$detallesConsignacion = $informacion ->DatosCuenta();
		$detallesConsignacion2 = $informacion ->DatosCuenta();
		require_once 'views/parametros/datosEmpresa.php';
		require_once 'views/layout/copy.php';
	}
	static public function ListaParrametros() {
		$par = new Parametros();
		$listaParra = $par->MostrarParrametro();
		return $listaParra;
	}
	static public function Parrametros() {
		$informacion = new Parametros();
		$detallesEmpresa = $informacion ->MostrarParrametro();
		return $detallesEmpresa;
	}
	
	public function Guardar() {
		if($_POST){
			$nit = isset($_POST['nit']) ? $_POST['nit']:FALSE;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$departamento = isset($_POST['departamento']) ? $_POST['departamento']:FALSE;
			$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:FALSE;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			$fecha_inicio = date('Y-m-d');
			
			if($nit && $nombre && $direccion){
				$datosEmp = new DatosEmpresa();
				$datosEmp->setNit($nit);
				$datosEmp->setNombre(strtoupper($nombre));
				$datosEmp->setDireccion($direccion);
				$datosEmp->setDepartamento(ucwords($departamento));
				$datosEmp->setCiudad(ucwords($ciudad));
				$datosEmp->setTelefono($telefono);				
				
				$respt = $datosEmp->Registrar();
				
				if($respt){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Registrada Correctamente",
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
						  title: "¡Registro no Guardado !",
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
	}
	public function Actulizar() {
		if($_POST['id']){
			$id = $_POST['id'];
			$nit = isset($_POST['nit']) ? $_POST['nit']:FALSE;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$departamento = isset($_POST['departamento']) ? $_POST['departamento']:FALSE;
			$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:FALSE;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			
			
			
			if($nit && $nombre && $direccion){
				$datosEmp = new DatosEmpresa();
				$datosEmp->setId($id);
				$datosEmp->setNit($nit);
				$datosEmp->setNombre(strtoupper($nombre));
				$datosEmp->setDireccion($direccion);
				$datosEmp->setDepartamento(ucwords($departamento));
				$datosEmp->setCiudad(ucwords($ciudad));
				$datosEmp->setTelefono($telefono);				
				
				$file = $_FILES['imagen'];				
				$fileNom = $file['name'];
				$type = $file['type'];
				
				$dir = 'image/logo';
				
				if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png') {
					
					if(!is_dir($dir)){
						mkdir($dir, 0777,TRUE);
					}
					$datosEmp->setLogo($fileNom);
					move_uploaded_file($file['tmp_name'],$dir.'/'.$fileNom);
					
				}else{
					$fileNom = "";
					$datosEmp->setLogo($fileNom);
				}
				
				
				$respt = $datosEmp->Actualizar();
					
				if($respt){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actulizada Correctamente",
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
						  title: "¡Registro no Actulizado !",
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
	}
	
	public function actulizardatoscuenta() {
		if($_POST['id']){
			$id = $_POST['id'];
			$numero = isset($_POST['numero']) ? $_POST['numero']:FALSE;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			
			
			
			if($id && $nombre && $numero){
				
				$datos = new DatosConsignacion();
				$datos->setId($id);
				$datos->setNombre($nombre);
				$datos->setNumero($numero);
				
				$respt = $datos->Actualizar();
								
				if($respt){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actulizada Correctamente",
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
						  title: "¡Registro no Actulizado !",
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
	}
	
}