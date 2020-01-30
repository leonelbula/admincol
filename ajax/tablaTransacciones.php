<?php
require_once '../config/DataBase.php';
require_once '../config/parameters.php';

class TablaTransacciones {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarTransacciones() {
		$sql = "SELECT e.*,e.id AS id_transancion, b.* FROM envios e, datos_bancario b WHERE e.id_usuario = b.id_usuario AND e.estado = 1 OR e.estado = 0 GROUP BY e.id DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function ListarBancosId($id) {
		$sql = "SELECT * FROM bancos WHERE id = $id";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}

class TransaccionesAjax {
	public function MostrarTransacciones() {
		$transaccion = new TablaTransacciones();
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
		if($row->estado == 1){
			$botones = "<div class='btn-group'><a><button class='btn btn-danger btnConfirmar' idtransaccion='$row->id_transancion' estado='$row->estado' ><i class='fa fa-check-circle'></i> Por Confirmar</button></a></div>";
			$anexo = "<div class='btn-group'><a><button class='btn btn-primary btnAnexar' idtransaccion='$row->id_transancion' data-toggle='modal' data-target='#modalConfirmar' ><i class='fa fa-file-pdf-o'></i> anexo</button></a></div>";
		}else if($row->estado == 0){
			$botones = "<div class='btn-group'><a><button class='btn btn-success ' idtransaccion='$row->id_transancion' estado='$row->estado'><i class='fa fa-check-circle'></i> Confirmada</button></a></div>";
			
			$anexo = "<div class='btn-group'><a><button class='btn btn-primary btnAnexarconfirmacion' idtransaccion='$row->id_transancion' data-toggle='modal' data-target='#modalVerConfirmacion' ><i class='fa fa-file-pdf-o'></i>  ver anexo</button></a></div>";
		}
  		$ver = "<div class='btn-group'><a><button class='btn btn-info btnVer' id='$row->id_transancion' data-toggle='modal' data-target='#modalVer' ><i class='fa fa-eye'></i>  ver</button></a></div>";
  		
		
		  		 
		  	$datosJson .='[
			      "'.$i++.'",			      
			      "'.$row->titular.'",			     				 
				  "'.$row->valor.'",
				  "'.$banco.'",
				  "'.$row->tipo_cuenta.'",
				  "'.$anexo.'",					  
			      "'.$botones.$ver.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	

	}	
}
$transaccion = new TransaccionesAjax();
$transaccion->MostrarTransacciones();
