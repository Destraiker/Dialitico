<?php
include __DIR__ . '/Conexao.php';

class Medico extends Conexao
{
    private $idMedico;
    private $Nome;
    private $Crm;
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
        return $this->Crm;
    }

    function getNome()
    {
        return $this->Nome;
    }

    function setCrm($Crm)
    {
        $this->Crm = $Crm;
    }

    function setNome($Nome)
    {
        $this->Nome = $Nome;
    }

    function insert($obj)
    {
        $sql = "INSERT INTO medico(crm,nome,senha) VALUES (:crm,:nome,:senha)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('crm', $obj->crm);
        $consulta->bindValue('nome', $obj->nome);
        $consulta->bindValue('senha', $this->gerarHashSenha($obj->senha));
        return $consulta->execute();
    }

    function update($obj, $crm = null)
    {
        $sql = "UPDATE medico SET nome = :nome WHERE crm = :crm ";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome', $obj->nome);
        $consulta->bindValue('crm', $crm);
        return $consulta->execute();
    }

    function delete($obj, $crm = null)
    {
        $sql = "DELETE FROM medico WHERE crm = :crm";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('crm', $crm);
        $consulta->execute();
    }

    function findAll()
    {
        $sql = "SELECT * FROM medico";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    
    function find($crm=null)
    {
        $sql = "SELECT * FROM medico WHERE crm=:crm";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('crm', $crm);
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
