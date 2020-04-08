<?php
include __DIR__ . '/Conexao.php';

class Medico extends Conexao
{
    private $idMedico;
    private $Nome;
    private $CRM;
    private $Login;
    private $Senha;

    function getIdMedico()
    {
        return $this->idMedico;
    }

    function setIdMedico($idMedico)
    {
        $this->idMedico = $idMedico;
    }
    function getLogin()
    {
        return $this->Login;
    }

    function setLogin($Login)
    {
        $this->Login = $Login;
    }

    function getSenha()
    {
        return $this->Senha;
    }

    function setSenha($Senha)
    {
        $this->Senha = $Senha;
    }

    function getCrm()
    {
        return $this->CRM;
    }

    function getNome()
    {
        return $this->Nome;
    }

    function setCrm($CRM)
    {
        $this->CRM = $CRM;
    }

    function setNome($Nome)
    {
        $this->Nome = $Nome;
    }

    function insert($obj)
    {
        $sql = "INSERT INTO medico(Nome,CRM,Login,Senha) VALUES (:Nome,:CRM,:Login,:Senha)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('Nome', $obj->Nome);
        $consulta->bindValue('CRM', $obj->CRM);
        $consulta->bindValue('Login', $obj->Login);
        $consulta->bindValue('Senha', $this->gerarHashSenha($obj->Senha));
        return $consulta->execute();
    }

    function update($obj,$idMedico = null)
    {
        $sql = "UPDATE medico SET Senha = :Senha WHERE idMedico = :idMedico ";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('Senha', $this->gerarHashSenha($obj->Senha));
        $consulta->bindValue('idMedico', $idMedico);
        return $consulta->execute();
    }

    function delete($idMedico = null)
    {
        $sql = "DELETE FROM medico WHERE idMedico = :idMedico";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('idMedico', $idMedico);
        $consulta->execute();
    }

    function findAll()
    {
        $sql = "SELECT * FROM medico";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    
    function find($CRM=null)
    {
        $sql = "SELECT * FROM medico WHERE crm=:CRM";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('CRM', $CRM);
        $consulta->execute();
        return $consulta->fetchAll();
    }

    function gerarHashSenha($senha)
    {
        return password_hash($senha, PASSWORD_DEFAULT);;
    }
    
    function verificarSenha($hash, $senha)
    {
        return password_verify($senha, $hash);
    }
}
