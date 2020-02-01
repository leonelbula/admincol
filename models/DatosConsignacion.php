<?php

require_once 'config/DataBase.php';

class DatosConsignacion{
	
	public $db;
	
	private $id;
	private $numero;
	private $nombre;
	
	function getId() {
		return $this->id;
	}

	function getNumero() {
		return $this->numero;
	}

	function getNombre() {
		return $this->nombre;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNumero($numero) {
		$this->numero = $numero;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function __construct() {
		$this->db = Database::connect();
	}
	public function Registrar() {
		$sql = "INSERT INTO datosconsignacion VALUES (NULL,'{$this->getNombre()}',{$this->getNumero()})";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		if ($resul) {
			$resp = TRUE;
		}
		return $resp;
	}
	public function Actualizar() {
		$sql = "UPDATE datosconsignacion SET nombre='{$this->getNombre()}',numero={$this->getNumero()} WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$result = FALSE;
		if($resp){
			$result = TRUE;
		}
		return $result;
	}
}