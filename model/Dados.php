<?php
include __DIR__ . '/Conexao.php';

class Dados extends Conexao
{
    private $idDados;
    private $Usuario_idUsuario;
    private $Dreneagem_inicial;
    private $Dreneagem_final;
    private $Liquido;
    private $Data_2;

    function getIdDados()
    {
        return $this->idDados;
    }
    function setIdDados($idDados)
    {
        $this->idDados = $idDados;
    }

    function getUsuario_idUsuario()
    {
        return $this->Usuario_idUsuario;
    }
    function setUsuario_idUsuario($Usuario_idUsuario)
    {
        $this->Usuario_idUsuario = $Usuario_idUsuario;
    }

    function getDreneagem_inicial()
    {
        return $this->Dreneagem_inicial;
    }
    function setDreneagem_inicial($Dreneagem_inicial)
    {
        $this->Dreneagem_inicial = $Dreneagem_inicial;
    }


    function setLiquido($Liquido)
    {
        $this->Liquido = $Liquido;
    }
    function getLiquido()
    {
        return $this->Liquido;
    }

    function setDreneagem_final($Dreneagem_final)
    {
        $this->Dreneagem_final = $Dreneagem_final;
    }
    function getDreneagem_final()
    {
        return $this->Dreneagem_final;
    }

    function getData_2()
    {
        return $this->Data_2;
    }
    function setData_2($Data_2)
    {
        $this->Data_2 = $Data_2;
    }


    function insert($obj)
    {
        $sql = "INSERT INTO medico(crm,nome,senha) VALUES (:crm,:nome,:senha)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('crm', $obj->crm);
        $consulta->bindValue('nome', $obj->nome);
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

    function find($crm = null)
    {
        $sql = "SELECT * FROM medico WHERE crm=:crm";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('crm', $crm);
        $consulta->execute();
        return $consulta->fetchAll();
    }
}
