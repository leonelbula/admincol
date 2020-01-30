<?php

require_once 'config/DataBase.php';

class Transacciones {
	public  $db;
	
	private $id;
	private $estado;
	private $anexo;
	private $valor;
			
	function getId() {
		return $this->id;
	}

	function getEstado() {
		return $this->estado;
	}

	function getAnexo() {
		return $this->anexo;
	}
	function getValor() {
		return $this->valor;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setEstado($estado) {
		$this->estado = $estado;
	}

	function setAnexo($anexo) {
		$this->anexo = $anexo;
	}
	function setValor($valor) {
		$this->valor = $valor;
	}

					
	function __construct() {
		$this->db = Database::connect();
	}
	public function listarTransacciones() {		
		$sql = "SELECT e.*, d.* FROM envios e, datos_bancario d WHERE e.id_datosbancarios = d.id AND e.estado = 1 ORDER BY e.id DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function ConfirmarTransacion() {
		$sql = "UPDATE envios SET estado={$this->getEstado()},anexo='{$this->getAnexo()}' WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		if($resul){
			$resp = TRUE;
		}
		return $resp;;
	}
	public function ValidarTransacion() {
		$sql = "UPDATE envios SET estado={$this->getEstado()},valor={$this->getValor()} WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		if($resul){
			$resp = TRUE;
		}
		return $resp;;
	}
	
}