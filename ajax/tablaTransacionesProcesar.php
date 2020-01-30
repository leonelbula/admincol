<?php
require_once '../config/DataBase.php';
require_once '../config/parameters.php';

class TablaTransaccionesProcesar {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarTransacciones() {
		$sql = "SELECT e.*,e.id AS id_transancion, b.* FROM envios e, datos_bancario b WHERE e.id_usuario = b.id_usuario AND e.estado = 4 GROUP BY e.id DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
public function ListarBancosId($id) {
		$sql = "SELECT * FROM bancos WHERE id = $id";
		$resul = $this->db->query($sql);
		return $resul;
	}	
	
}

class TransaccionesProcesarAjax {
	public function MostrarTransaccionesProcesar() {
		$transaccion = new TablaTransaccionesProcesar();
		$listatransaccion = $transaccion->MostrarTransacciones();
			$i = 1;	
		 $datosJson = '{
		  "data": [';
		 
		 while ($row = $listatransaccion->fetch_object()) {		
			 
			 $id = $row->id_banco;
			 $detallesbanco = $transaccion->ListarBancosId($id);
			 while ($row1 = $detallesbanco->fetch_object()) {
				 $banco = $row1->nombre;
			 }
		
		$url = URL_BASE;
		if($row->estado == 3){			
			$botones = "<div class='btn-group'><a><button class='btn btn-primary btnProcesar' idtransaccion='$row->id_transancion' data-toggle='modal' data-target='#modalPorcesar' ><i class='fa fa-file-pdf-o'></i>  Procesar</button></a></div>";
		}
		
		  		 
		  	$datosJson .='[
			      "'.$i++.'",			      
			      "'.$row->titular.'",			     				 
				  "'.$row->valor.'",
				  "'.$banco.'",
				  "'.$row->tipo_cuenta.'",				  			  
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	

	}	
}
$transaccion = new TransaccionesProcesarAjax();
$transaccion->MostrarTransaccionesProcesar();

