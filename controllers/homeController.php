<?php

require_once 'models/Transacciones.php';
require_once 'models/Solicitudes.php';
require_once 'models/Principal.php';
require_once 'models/Notificaciones.php';
require_once 'models/Usuario.php';

class homeController{
	
	public function index() {		
		
		require_once 'views/login/login.php';
		
	}
   public function home() {
      require_once 'views/layout/menu.php';	
	  $datos = new Principal();
	  $usuario = $datos->TotalUsuario();
	  $bancos = $datos->TotalBancos();
	  $transaciones = $datos->TotalTransaciones();
	  $valortransaciones = $datos->valorTransaciones();
	  require_once 'views/layout/principal.php';
	  require_once 'views/layout/copy.php';
   } 
   
   public function listausuario() {
	   require_once 'views/layout/menu.php';		
	   require_once 'views/usuario/listausuario.php';
	   require_once 'views/layout/copy.php';
   }
   static public function Notificaciones() {
		$notificaciones = new Notificaciones();
		$Notificacion = $notificaciones->MostrarNotificacione();
		return $Notificacion;
	}
	public function bloquear() {
		require_once 'views/layout/menu.php';		
	    require_once 'views/usuario/listausuario.php';
		if(isset($_GET['id'])){
			
			$id = $_GET['id'];
						
			$usuario = new Usuario();	
			
			$usuario->setId_usuario($id);
			
			$datosUsuario = $usuario->MostrarUsuarioId();
			
			while ($row = $datosUsuario->fetch_object()) {
				$estadoActual = $row->estado;
				
			}
			
			if($estadoActual != 2){
				$estado = 2;
			}else{
				$estado = 0;
			}
			
			$usuario->setEstado($estado);
			
			$resp = $usuario->Bloquear();
			
				
			
			if($resp){
				
				
				echo'<script>

					swal({
						  type: "success",
						  title: "Registro Bloqueado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "listausuario";

							}
						})

					</script>';
			}else{
				
				echo'<script>

					swal({
						  type: "error",
						  title: "¡No se puede bloquear este registro!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "listausuario";

							}
						})

			  	</script>';
			}
			
		} else {
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Bloqueado!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "listausuario";

							}
						})

			  	</script>';
		}
		 require_once 'views/layout/copy.php';
	}
	
}

