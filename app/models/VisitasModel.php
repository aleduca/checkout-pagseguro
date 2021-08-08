<?php

namespace app\models;
use app\models\Model;

class VisitasModel extends Model{

    protected $tabela = 'tb_visitas';

       public function cadastrar($attributes){
        $pdo = $this->conectadoAoBanco()->prepare("insert into $this->tabela (
            tb_visitas,
            tb_visitas_produto
        )values(
            :tb_visitas,
            :tb_visitas_produto
        )");

        foreach($attributes as $indice => $valor){
            $pdo->bindValue(':'.$indice, $valor);
        }

        $pdo->execute();
        return $this->conectadoAoBanco()->lastInsertId();

    }

    public function atualizar($campo, $id,$attributes){
        $pdo = $this->conectadoAoBanco()->prepare("update $this->tabela
            set tb_visitas = :tb_visitas,
            tb_visitas_produto = :tb_visitas_produto
            where $campo = :id
        ");

        foreach($attributes as $indice => $valor){
            $pdo->bindValue(':'.$indice, $valor);
        }
        $pdo->bindValue(':id', $id);

        $pdo->execute();
        return $this->conectadoAoBanco()->lastInsertId();
    }

}