<?php

include __DIR__.'/../model/Medico.php';

class MedicoControl{
	function insert($obj){
		$medico = new Medico();
		//echo $obj->titulo;
		return $medico->insert($obj);
	}

	function update($obj,$crm){
		$medico = new Medico();
		return $medico->update($obj,$crm);
	}

	function delete($obj,$crm){
		$medico = new Medico();
		return $medico->delete($obj,$crm);
	}

	function find($crm = null){
		$medico = new Medico();
		return $medico->find($crm);
	}
	function findAll(){
		$medico = new Medico();
		return $medico->findAll();
	}
	function login($obj){

	}
}
?>