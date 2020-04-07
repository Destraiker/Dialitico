<?php

include __DIR__.'/../model/Dados.php';

class DadosControl{
	function insert($obj){
		$dados = new Dados();
		return $dados->insert($obj);
	}

	function update($obj,$idDados){
		$dados = new Dados();
		return $dados->update($obj,$idDados);
	}

	function delete($obj,$idDados){
		$dados = new Dados();
		return $dados->delete($obj,$idDados);
	}

	function find($idDados = null){
		$dados = new Dados();
		return $dados->find($idDados);
	}
	function findAll(){
		$dados = new Dados();
		return $dados->findAll();
	}
}
?>