<?php
require_once '../config/DataBase.php';
require_once '../config/parameters.php';

class TransaccionesDetalles {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	
	
	public function verTransacciones($id) {
		$sql = "SELECT e.fecha,e.valor,e.anexo_usuario,e.anexo,d.* ,b.nombre FROM envios e INNER JOIN datos_bancario d ON e.id_datosbancarios = d.id INNER JOIN bancos b ON d.id_banco = b.id WHERE e.id = $id";
		$resul = $this->db->query($sql);
		 return $resul->fetch_object();
		
	}
	
	
}
class AjaxTransaccion{

	 	
	public $id;
	
	public function Ver(){
		
		$id = $this->id;
		$ver = new TransaccionesDetalles();
		$respuesta = $ver->verTransacciones($id);
		echo json_encode($respuesta);

	}
}



if(isset($_POST["id"])){

	$confirmar = new AjaxTransaccion();
	$confirmar -> id = $_POST["id"];	
	$confirmar ->Ver();

}