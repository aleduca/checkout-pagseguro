<?php

namespace app\models;
use app\models\Model;

class PedidoModel extends Model{

    protected $tabela = 'tb_pedidos';

    public function cadastrar($attributes){
    	$pdo = $this->conectadoAoBanco()->prepare("insert into $this->tabela (
            tb_pedidos_cliente,
            tb_pedidos_id_pagseguro,
            tb_pedidos_data,
            tb_pedidos_total,
            tb_pedidos_status
        )values(
            :tb_pedidos_cliente,
            :tb_pedidos_id_pagseguro,
            :tb_pedidos_data,
            :tb_pedidos_total,
            :tb_pedidos_status
        )");

        foreach($attributes as $indice => $valor){
            $pdo->bindValue(':'.$indice, $valor);
        }

        $pdo->execute();
        return $this->conectadoAoBanco()->lastInsertId();
    }

    public function atualizar($campo, $id, $attributes){
        $pdo = $this->conectadoAoBanco()->prepare("update $this->tabela
                set tb_pedidos_status = :tb_pedidos_status where $campo = :id");

            foreach($attributes as $indice => $valor){
                $pdo->bindValue(':'.$indice, $valor);
            }
             $pdo->bindValue(":id", $id);

            return $pdo->execute();
    }

}
