<?php

require_once 'config/DataBase.php';

class Principal {
	
	public $db;


	public function __construct() {
		$this->db = Database::connect();
	}

	public function TotalUsuario() {
		$sql = "SELECT COUNT(id) as total FROM usuario";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function TotalBancos() {
		$sql = "SELECT COUNT(id) as total FROM bancos";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function TotalTransaciones() {
		$sql = "SELECT COUNT(id) as total FROM envios";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function valorTransaciones() {
		$sql = "SELECT SUM(valor) as total FROM envios";
		$resul = $this->db->query($sql);
		return $resul;
	}

}
