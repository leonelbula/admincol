<?php

require_once 'config/DataBase.php';

class Notificaciones{
	
	public $db;
	private $id;
	
			
	public function __construct() {
		$this->db = Database::connect();
	}
	public function MostrarNotificacione() {
		$sql = "SELECT * FROM notificaciones";
		$resul = $this->db->query($sql);
		return $resul;
	}
}

