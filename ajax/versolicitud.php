<?php
require_once '../config/DataBase.php';

class VerSolicitud{
	
	public $db;

	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarId($id) {
		$sql = "SELECT * FROM solicitudes WHERE id = $id";
		$resul = $this->db->query($sql);
		return $resul->fetch_object();
	}	
}

class AjaxSolicitud{
	
	public $id;
	
	public function MostrarSolicitudId() {
		$id = $this->id;
		$dato = new VerSolicitud();
		$respuesta = $dato->MostrarId($id);
		echo json_encode($respuesta);
	}

}
if(isset($_POST["id"])){

  $dato = new AjaxSolicitud();
  $dato -> id = $_POST["id"];
  $dato ->MostrarSolicitudId();

}