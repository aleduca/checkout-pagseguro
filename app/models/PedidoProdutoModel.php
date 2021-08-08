<?php

namespace app\models;
use app\models\Model;

class PedidoProdutoModel extends Model{

    protected $tabela = 'tb_pedidos_produto';


	public function cadastrar( $attributes ){
		$pdo = $this->conectadoAoBanco()->prepare("insert into $this->tabela (
            tb_pedidos_produto_cliente,
            tb_pedidos_produto_id_pagseguro,
            tb_pedidos_produto_quantidade,
            tb_pedidos_produto_subtotal,
            tb_pedidos_produto_id,
            tb_pedidos_produto_data
        )values(
            :tb_pedidos_produto_cliente,
            :tb_pedidos_produto_id_pagseguro,
            :tb_pedidos_produto_quantidade,
            :tb_pedidos_produto_subtotal,
            :tb_pedidos_produto_id,
            :tb_pedidos_produto_data
        )");

        foreach( $attributes as $indice => $valor ){
        	$pdo->bindValue(':'.$indice, $valor);
        }

        $pdo->execute();
        return $this->conectadoAoBanco()->lastInsertId();
	}
}
