<?php
require_once '../config/DataBase.php';
require_once '../config/parameters.php';

class Usuario {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarUsuarios() {
		$sql = "SELECT * FROM datos_persona ORDER BY nombre";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function Usuarios($id) {
		$sql = "SELECT * FROM usuario WHERE id = $id; ";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}

class usuarioAjax {
	public function MostrarUsuario() {
		$usuario = new Usuario();
		$listausuario= $usuario-> MostrarUsuarios();
				
		 $datosJson = '{
		  "data": [';
		 
		 while ($row = $listausuario->fetch_object()) {		
		
		
		$url = URL_BASE;
		$id = $row->id_usuario;
		$datos = $usuario->Usuarios($id);
		
		while ($row1 = $datos ->fetch_object()) {
			$estado = $row1->estado;
		}
		
		if($estado == 2){
			$botones = "<div class='btn-group'><a><button class='btn btn-success btnUsuario' idusuario='$row->id_usuario'><i class='fa fa-check-circle'></i> desbloquear</button></a></div>";
		}else{
			$botones = "<div class='btn-group'><a><button class='btn btn-danger btnUsuario' idusuario='$row->id_usuario'><i class='fa fa-check-circle'></i> Bloquear</button></a></div>";
		}
		
  		
  			 
		  	$datosJson .='[
			      "'.$row->id.'",			      
			      "'.$row->nombre.'",			     				 
				  "'.$row->nit.'",
				  "'.$row->direccion.'",
				  "'.$row->ciudad.'",
				  "'.$row->departamento.'",
				  "'.$row->pais.'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	

	}	
}
$usuario = new usuarioAjax();
$usuario->MostrarUsuario();

