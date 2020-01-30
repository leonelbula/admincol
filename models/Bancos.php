<?php

require_once 'config/DataBase.php';

class Bancos{
	
	public $db;
	private $id_banco;
	private $nombre;
	private $estado;
	private $img;
	
			
	function getId_banco() {
		return $this->id_banco;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getEstado() {
		return $this->estado;
	}

	function getImg() {
		return $this->img;
	}

	function setId_banco($id_banco) {
		$this->id_banco = $id_banco;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	function setEstado($estado) {
		$this->estado = $estado;
	}

	function setImg($img) {
		$this->img = $img;
	}

		
	public function __construct() {
		$this->db = Database::connect();
	}
	
	public function ListarBancos() {
		$sql = "SELECT * FROM bancos";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function ListarBancosId() {
		$sql = "SELECT * FROM bancos WHERE id = {$this->getId_banco()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function TiposCuentas() {
		$sql = "SELECT * FROM tipo_cuenta";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function Guardar() {
		$sql = "INSERT INTO bancos VALUES (NULL,'{$this->getNombre()}',{$this->getEstado()},'{$this->getImg()}')";
		$resp = $this->db->query($sql);
		$result = FALSE;
		if($resp){
			$result = TRUE;
		}
		return $result;
	}
	public function Actulizar() {
		$sql = "UPDATE bancos SET nombre='{$this->getNombre()}',tipo={$this->getEstado()},img='{$this->getImg()}' WHERE id = {$this->getId_banco()}";
		$resp = $this->db->query($sql);
		$result = FALSE;
		if($resp){
			$result = TRUE;
		}
		return $result;
	}
	
	public function Eliminar() {
		$sql = "DELETE FROM bancos WHERE id = {$this->getId_banco()}";
		$resp = $this->db->query($sql);
		$result = FALSE;
		if($resp){
			$result = TRUE;
		}
		return $result;
	}
}