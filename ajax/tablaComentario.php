<?php

require_once '../config/DataBase.php';
require_once '../config/parameters.php';

class Comentario {

	public $db;

	public function __construct() {
		$this->db = Database::connect();
	}

	public function MostrarComentario() {
		$sql = "SELECT * FROM comentario";
		$resul = $this->db->query($sql);
		return $resul;
	}

}

class ComentarioAjax {

	public function MostrarComentario() {
		$batos = new Comentario();
		$listaComentario = $batos->MostrarComentario();

		$datosJson = '{
		  "data": [';

		while ($row = $listaComentario->fetch_object()) {



			$botones = "<div class='btn-group'><a href='vercomentario&id=$row->id'><button class='btn btn-warning '<i class='fa fa-pencil'></i>Ver</button></a></div>";
			if ($row->estado == '1') {
				$botones2 = "<div class='btn-group'><a><button class='btn btn-danger btnEliminarComentario' idComentario='$row->id'><i class='fa fa-times'></i> Bloquear</button></a></div>";
			} else {
				$botones2 = "<div class='btn-group'><a><button class='btn btn-primary btnComentario' idComentario='$row->id'><i class='fa fa-times'></i> Permitir</button></a></div>";
			}
			if ($row->estado == '1') {
				$estado = 'PERMITIDO';
			} else {
				$estado = 'BLOQUEADO';
			}

			$datosJson .= '[
			      "' . $row->id . '",			      
			      "' . $row->usuario . '",			     				 
				  "' . $row->detalles . '",
				  "' . $estado . '",					  
			      "' . $botones.$botones2 . '"
			    ],';
		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= '] 

		 }';

		echo $datosJson;
	}

}

$batos = new ComentarioAjax();
$batos->MostrarComentario();

