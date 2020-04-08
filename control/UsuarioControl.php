<?php

include __DIR__.'/../model/Usuario.php';

class UsuarioControl{
	function insert($obj){
		$usuario = new Usuario();
		return $usuario->insert($obj);
	}

	function update($obj,$idUsuario){
		$usuario = new Usuario();
		return $usuario->update($obj,$idUsuario);
	}

	function delete($idUsuario){
		$usuario = new Usuario();
		return $usuario->delete($idUsuario);
	}

	function find($idUsuario = null){
		$usuario = new Usuario();
		return $usuario->find($idUsuario);
	}
	function findAll(){
		$usuario = new Usuario();
		return $usuario->findAll();
	}
	function login($obj){

	}
}
?>