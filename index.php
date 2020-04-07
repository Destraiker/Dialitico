<?php
//define('PASTAPROJETO', 'AulaBanco');
define('PASTAPROJETO', 'PhpBackend-master');

/* Função criada para retornar o tipo de requisição */
function checkRequest()
{
	$method = $_SERVER['REQUEST_METHOD'];
	switch ($method) {
		case 'PUT':
			$answer = "update";
			break;
		case 'POST':
			$answer = "post";
			break;
		case 'GET':
			$answer = "get";
			break;
		case 'DELETE':
			$answer = "delete";
			break;
		default:
			handle_error($method);
			break;
	}
	return $answer;
}

$answer = checkRequest();

$request = $_SERVER['REQUEST_URI'];
http: //localhost:8080/PhpBackEnd

// IDENTIFICA A URI DA REQUISIÇÃO


switch ($request) {
	case '/' . PASTAPROJETO . '/':
		require __DIR__ . '/api/api.php';
		break;
	case '':
		require __DIR__ . '/api/api.php';
		break;
	case '/' . PASTAPROJETO . '/medico':
		require __DIR__ . '/api/' . $answer . '_medico.php';
		break;
	case '/' . PASTAPROJETO . '/usuario':
		require __DIR__ . '/api/' . $answer . '_usuario.php';
		break;
	case '/' . PASTAPROJETO . '/dados':
		require __DIR__ . '/api/' . $answer . '_dados.php';
		break;

	default:
		//require __DIR__ . '/api/404.php';
		break;
}
