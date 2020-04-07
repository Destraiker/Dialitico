<?php

include __DIR__.'/../model/Medico.php';

class MedicoControl{
	function insert($obj){
		$medico = new Medico();
		//echo $obj->titulo;
		return $medico->insert($obj);
	}

	function update($obj,$idMedico){
		$medico = new Medico();
		return $medico->update($obj,$idMedico);
	}

	function delete($obj,$idMedico){
		$medico = new Medico();
		return $medico->delete($obj,$idMedico);
	}

	function find($idMedico = null){
		$medico = new Medico();
		return $medico->find($idMedico);
	}
	function findAll(){
		$medico = new Medico();
		return $medico->findAll();
	}
	function login($obj){

	}
}
?>