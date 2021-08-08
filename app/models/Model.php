<?php

namespace app\models;
use PDO;
use app\models\Conexao;

abstract class Model{

    private static $instanciaBanco;
    protected $tabela;

    public function conectadoAoBanco(){
        if( !isset(self::$instanciaBanco) ){

            $conectar = new Conexao();
            self::$instanciaBanco = $conectar->conectarAoBanco();
        }

        return self::$instanciaBanco;
    }

    public function listar(){
        $pdo = $this->conectadoAoBanco()->query("select * from $this->tabela");
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_OBJ);
    }

    public function deletar($campo, $id){
        $pdo = $this->conectadoAoBanco()->prepare("delete from $this->tabela where $campo = :id");
        $pdo->bindValue(":id", $id);
        return $pdo->execute();
    }

    public function pegarPeloId($campo, $id){
        $pdo = $this->conectadoAoBanco()->prepare("select * from $this->tabela where $campo = :id");
        $pdo->bindValue(":id", $id);
        $pdo->execute();
        return $pdo->fetch(PDO::FETCH_OBJ);
    }

}
