<?php

require_once 'models/Transacciones.php';
require_once 'models/Solicitudes.php';
require_once 'models/Principal.php';
require_once 'models/Notificaciones.php';

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
	
}

