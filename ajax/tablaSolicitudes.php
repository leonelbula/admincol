<?php
require_once '../config/DataBase.php';
require_once '../config/parameters.php';

class Solitudes {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarSolitudes() {
		$sql = "SELECT d.nombre, s.* FROM datos_persona d, solicitudes s WHERE s.id_usuario = d.id_usuario";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}

class SolitudesAjax {
	public function MostrarSolitudes() {
		$solicitud = new Solitudes();
		$listasolicitud= $solicitud-> MostrarSolitudes();
				
		 $datosJson = '{
		  "data": [';
		 
		 while ($row = $listasolicitud->fetch_object()) {		
		
		
		$url = URL_BASE;
		if($row->estado == 1){
		
			$botones = "<div class='btn-group'><a><button class='btn btn-success btnRespuesta' idsolicitud='$row->id' data-toggle='modal' data-target='#modalRespuesta'><i class='fa fa-check-circle'></i> Responder</button></a></div>";
		}else{
			$botones = "<div class='btn-group'><a><button class='btn btn-default btnRespuesta' idsolicitud='$row->id' ><i class='fa fa-check-circle'></i> Atendida</button></a></div>";
		}
		  	$datosJson .='[
			      "'.$row->id.'",			      
			      "'.$row->nombre.'",			     				 
				  "'.$row->id_envio.'",
				  "'.$row->deatalles.'",
				  "'.$row->fecha.'",				  
				  "'.$row->estado.'",				  
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	

	}	
}
$solicitud = new SolitudesAjax();
$solicitud->MostrarSolitudes();

