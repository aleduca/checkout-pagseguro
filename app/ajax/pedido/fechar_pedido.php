<?php

require '../../../config.php';

use app\classes\Pagseguro;
use app\classes\Carrinho;
use app\models\ProdutoModel;
use app\models\PedidoProdutoModel;
use app\models\PedidoModel;
use app\classes\Correios;

// instanciar a classe do carrinho
$carrinho = new Carrinho();
$produtosNoCarrinho = $carrinho->pegarProdutosDoCarrinho();

// instanciar o model para trabalhar com os produtos
$produtoModel = new ProdutoModel();

// instanciar a classe do pagseguro
$pagseguro = new Pagseguro();

// Instanciar a classe para cadastrar no pedidos produto
$pedidosProduto = new PedidoProdutoModel();

// instanciar para cadastrar na tabela pedidos
$pedidos = new PedidoModel();

// Instanciar classe dos correios
$correios = new Correios();

// Id unico para o pagseguro
$idPagseguro = substr(md5(uniqid()), 0, 20);

$dadosPedido = [];

 foreach( $produtosNoCarrinho as $Idproduto => $quantidade ):

	$produto = $produtoModel->pegarPeloId( 'id', $Idproduto );

	$dadosPedido[] = [
		'id' => $produto->id,
		'produto' => $produto->tb_produtos_nome,
		'qtd' => $quantidade,
		'preco' => $produto->tb_produtos_preco
	];

	// excluir ospedidos com o id unico
	$pedidosProduto->deletar('tb_pedidos_produto_id_pagseguro', $idPagseguro);

	// cadastrar no banco na tabela pedidos produto
	$pedidosProduto->cadastrar([
		'tb_pedidos_produto_cliente' => 1,
		'tb_pedidos_produto_id_pagseguro' => $idPagseguro,
		'tb_pedidos_produto_quantidade' => $quantidade,
		'tb_pedidos_produto_subtotal' => ( $quantidade * $produto->tb_produtos_preco ),
		'tb_pedidos_produto_id' => $produto->id,
		'tb_pedidos_produto_data' => date('Y-m-d')
	]);

 endforeach;

 // cadastrar na tabela de pedidos
$pedidos->cadastrar([
	'tb_pedidos_cliente' => 1,
	'tb_pedidos_id_pagseguro' => $idPagseguro,
	'tb_pedidos_data' => date('Y-m-d'),
	'tb_pedidos_total' => $carrinho->totalDoPedido($produtoModel),
	'tb_pedidos_status' => 2
]);

// Calcular o frete
$correios->setTipo('pac');
$correios->setFormato('caixa');
$correios->setCepDestino('37500274');
$correios->setCepOrigem('69301045');
$correios->setPeso('1');
$correios->setComprimento('16');
$correios->setLargura('11');
$correios->setAltura('11');
$correios->setDiametro('1');
$frete = $correios->calcularFrete();

$pagseguro->setItemAdd([ 'id' => 1, 'produto' => 'Frete', 'qtd' => 1, 'preco' => $frete['valor'] ]);

foreach($dadosPedido as $pedido):
	$pagseguro->setItemAdd($pedido);
endforeach;

// dados do cliente para fechar o pedido
$pagseguro->setNome('Alexandre');
$pagseguro->setSobrenome('Cardoso');
$pagseguro->setEmail('alecar2007@gmail.com');
$pagseguro->setDdd('16');
$pagseguro->setTelefone('33394587');
$pagseguro->setIdReferencia($idPagseguro);


try{
	$url = $pagseguro->enviarPagseguro();
	$carrinho->limparCarrinho();
	echo $url;
}catch(\Exception $e){
	echo 'erro';
}
