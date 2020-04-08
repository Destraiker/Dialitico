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
        $sql = "INSERT INTO dados(Usuario_idUsuario,Dreneagem_inicial,Dreneagem_final,Liquido,Data_2) VALUES (:Usuario_idUsuario,:Dreneagem_inicial,:Dreneagem_final,:Liquido,:Data_2)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('Usuario_idUsuario', $obj->Usuario_idUsuario);
        $consulta->bindValue('Dreneagem_inicial', $obj->Dreneagem_inicial);
        $consulta->bindValue('Dreneagem_final', $obj->Dreneagem_final);
        $consulta->bindValue('Liquido', $obj->Liquido);
        $consulta->bindValue('Data_2', $obj->Data_2);
        return $consulta->execute();
    }

    function update($obj, $idDados = null)
    {
        $sql = "UPDATE dados SET Liquido = :Liquido WHERE  idDados = :idDados ";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('idDados', $idDados);
        $consulta->bindValue('Liquido', $obj->Liquido);
        return $consulta->execute();
    }


    function findAll($obj)
    {
        $sql = "SELECT * FROM dados WHERE Usuario_idUsuario = :idUsuario";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('idUsuario', $obj->Usuario_idUsuario);
        $consulta->execute();
        return $consulta->fetchAll();
    }

    function find($Usuario_idUsuario = null)
    {
        $sql = "SELECT * FROM dados WHERE Usuario_idUsuario=:idUsuario";
        $consulta = Conexao::prepare($sql);
        //$consulta->bindValue('idUsuario', $idUsuario);
        $consulta->execute();
        return $consulta->fetchAll();
    }
}
