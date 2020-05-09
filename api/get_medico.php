<?php
include __DIR__ . '/../control/MedicoControl.php';
$medicoControl = new MedicoControl();

header('Content-type: application/json');

$url_parts = explode("/medico/", $_SERVER['REQUEST_URI']);
$idMedico = $url_parts[1];

if ($idMedico == null) {
	if ($medicoControl->findAll()) {
		http_response_code(200);
		echo json_encode($medicoControl->findAll());
	} else {
		http_response_code(400);
		echo json_encode(array("mensagem" => "Não encontrado"));
	}
} else {
	if (is_numeric($idMedico)) {
		if ($medicoControl->find($idMedico)) {
			http_response_code(200);
			echo json_encode($medicoControl->find($idMedico));
		} else {
			http_response_code(400);
			echo json_encode(array("mensagem" => "Não encontrado"));
		}
	} else {
		http_response_code(400);
		echo json_encode(array("mensagem" => "ID invalido"));
	}
}
