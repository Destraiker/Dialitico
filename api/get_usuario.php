<?php
include __DIR__.'/../control/UsuarioControl.php';
$usuarioControl = new UsuarioControl();

header('Content-type: application/json');

$url_parts = explode("/usuario/", $_SERVER['REQUEST_URI']);
$idUsuario = $url_parts[1];

if($idUsuario==null){
	if ($usuarioControl->findAll()) {
		http_response_code(200);
		echo json_encode($usuarioControl->findAll());
	}
	else {
		http_response_code(400);
		echo json_encode(array("mensagem" => "Não encontrado"));
	}
}else{
	if(is_numeric($idUsuario)){
		if ($usuarioControl->find($idUsuario)) {
			http_response_code(200);
			echo json_encode($usuarioControl->find($idUsuario));
		}
		else {
			http_response_code(400);
			echo json_encode(array("mensagem" => "Não encontrado"));
		}
	}else{
		http_response_code(400);
		echo json_encode(array("mensagem" => "ID invalido"));
	}
}
