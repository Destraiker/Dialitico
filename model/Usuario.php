<?php
include __DIR__ . '/Conexao.php';

class Usuario extends Conexao
{
    private $idUsuario;
    private $Nome;
    private $Medico_idMedico;
    private $CPF;
    private $Senha;


    function getMedico_idMedico()
    {
        return $this->Medico_idMedico;
    }

    function setMedico_idMedico($Medico_idMedico)
    {
        $this->Medico_idMedico = $Medico_idMedico;
    }
    function getCPF()
    {
        return $this->CPF;
    }

    function setCPF($CPF)
    {
        $this->CPF = $CPF;
    }
    function getSenha()
    {
        return $this->Senha;
    }

    function setSenha($Senha)
    {
        $this->Senha = $Senha;
    }

    function getIdUsuario()
    {
        return $this->idUsuario;
    }

    function getNome()
    {
        return $this->Nome;
    }

    function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
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
