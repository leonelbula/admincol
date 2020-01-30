<?php
require_once '../config/DataBase.php';
require_once '../config/parameters.php';

class TransaccionesDetalles {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function ConfrimarTransacciones($id) {
		$sql = "SELECT * FROM envios WHERE id = $id";
		$resul = $this->db->query($sql);
		 return $resul->fetch_object();
		
	}
	public function verTransacciones($id) {
		$sql = "SELECT e.*, b.*,bc.nombre FROM envios e, datos_bancario b, bancos bc WHERE e.id = $id AND e.id_usuario = b.id_usuario AND b.id_banco = bc.id AND e.estado = 1 OR e.estado = 0 GROUP BY e.id DESC";
		$resul = $this->db->query($sql);
		 return $resul->fetch_object();
		
	}
	
	
}
class AjaxTransaccion{

	 	
	public $id;
	public $idtransaccion;

	public function Confirmar(){
		
		$id = $this->idtransaccion;
		$confirmar = new TransaccionesDetalles();
		$respuesta = $confirmar->ConfrimarTransacciones($id);
		echo json_encode($respuesta);

	}
	public function Ver(){
		
		$id = $this->id;
		$ver = new TransaccionesDetalles();
		$respuesta = $ver->verTransacciones($id);
		echo json_encode($respuesta);

	}
}

if(isset($_POST["idtransaccion"])){

	$confirmar = new AjaxTransaccion();
	$confirmar -> idtransaccion = $_POST["idtransaccion"];	
	$confirmar ->Confirmar();

}

if(isset($_POST["id"])){

	$confirmar = new AjaxTransaccion();
	$confirmar -> id = $_POST["id"];	
	$confirmar ->Ver();

}