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
        $sql = "INSERT INTO usuario(Nome,Medico_idMedico,CPF,Senha) VALUES (:Nome,:Medico_idMedico,:CPF,:Senha)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('Nome', $obj->Nome);
        $consulta->bindValue('Medico_idMedico', $obj->Medico_idMedico);
        $consulta->bindValue('CPF', $obj->CPF);
        $consulta->bindValue('Senha', $this->gerarHashSenha($obj->Senha));
        return $consulta->execute();
    }

    function update($obj, $idUsuario = null)
    {
        $sql = "UPDATE usuario SET Senha = :Senha WHERE idUsuario = :idUsuario ";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('Senha', $this->gerarHashSenha($obj->Senha));
        $consulta->bindValue('idUsuario', $idUsuario);
        return $consulta->execute();
    }

    function delete($idUsuario = null)
    {
        $sql = "DELETE FROM usuario WHERE idUsuario = :idUsuario";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('idUsuario', $idUsuario);
        $consulta->execute();
    }

    function findAll()
    {
        $sql = "SELECT * FROM usuario";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    
    function find($CPF=null)
    {
        $sql = "SELECT * FROM usuario WHERE cpf = :CPF";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('CPF', $CPF);
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
