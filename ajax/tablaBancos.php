<?php
require_once '../config/DataBase.php';
require_once '../config/parameters.php';

class Banco {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarBanco() {
		$sql = "SELECT * FROM bancos ORDER BY nombre ";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}

class BancoAjax {
	public function MostrarBanco() {
		$banco = new Banco();
		$listabanco = $banco->MostrarBanco();
				
		 $datosJson = '{
		  "data": [';
		 
		 while ($row = $listabanco->fetch_object()) {		
		
		
		$url = URL_BASE;
  		$botones = "<div class='btn-group'><a><button class='btn btn-warning btnEditarBanco' idbanco='$row->id' data-toggle='modal' data-target='#modalEditarbanco'><i class='fa fa-pencil'></i></button></a><a><button class='btn btn-danger btnEliminarBanco' idbanco=$row->id><i class='fa fa-times'></i></button></a></div>";
  		
		$imagenPrincipal = "<img src='".$url."image/bancos/".$row->img."' class='img-thumbnail imgbanco' width='100px'>";
		  		 
		  	$datosJson .='[
			      "'.$row->id.'",			      
			      "'.$row->nombre.'",			     				 
				  "'.$imagenPrincipal.'",					 		  
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	

	}	
}
$bancos = new BancoAjax();
$bancos->MostrarBanco();

