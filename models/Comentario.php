<?php

require_once 'config/DataBase.php';

class Comentario {
	
	public  $db;	
	private $id;
	private $estado;
	
			
	function getId() {
		return $this->id;
	}

	function getEstado() {
		return $this->estado;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setEstado($estado) {
		$this->estado = $estado;
	}

			
	public function __construct() {
		$this->db= Database::connect();
	}
	
	public function MostrarInformacion() {
		$sql = "SELECT * FROM comentario WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
	public function Guardar() {
		$sql = "UPDATE comentario SET estado={$this->getEstado()} WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		
		if($resul){
			$resp = TRUE;
		}
		return $resp;
	}
	
}