<?php

require_once 'models/DatosEmpresa.php';


class ParametrosController{
	
	public function index() {
		require_once 'views/layout/menu.php';
		$informacion = new DatosEmpresa();
		$detallesEmpresa = $informacion ->MostrarInformacion();
		$detallesEditar  = $informacion ->MostrarInformacion();	
		$detallesConsignacion = $informacion ->DatosCuenta();
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
	static public function Comisiones() {
		$com = new Comisiones();
		$listaCom = $com->MostrarDetalles();
		return $listaCom;
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
			$fecha_inicio = date('Y-m-d');
			
			
			if($nit && $nombre && $direccion){
				$datosEmp = new DatosEmpresa();
				$datosEmp->setId($id);
				$datosEmp->setNit($nit);
				$datosEmp->setNombre(strtoupper($nombre));
				$datosEmp->setDireccion($direccion);
				$datosEmp->setDepartamento(ucwords($departamento));
				$datosEmp->setCiudad(ucwords($ciudad));
				$datosEmp->setTelefono($telefono);
				
				
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
	
}