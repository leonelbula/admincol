<?php
require_once '../config/DataBase.php';

class ListaBanco {
	
	public $db;
	


	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarBancoId($id) {
		$sql = "SELECT * FROM bancos WHERE id = $id";
		$resul = $this->db->query($sql);
		return $resul->fetch_object();
	}	
}

class AjaxBanco{
	
	public $idbanco;
	
	public function MostrarBancoId() {
		$id = $this->idbanco;
		$Banco = new ListaBanco();
		$respuesta = $Banco->MostrarBancoId($id);
		echo json_encode($respuesta);
	}

}
if(isset($_POST["idbanco"])){

  $Banco = new AjaxBanco();
  $Banco -> idbanco = $_POST["idbanco"];
  $Banco ->MostrarBancoId();

}