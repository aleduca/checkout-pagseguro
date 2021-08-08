<?php

require '../../../config.php';

use app\classes\Correios;
use app\classes\Carrinho;
use app\models\ProdutoModel;

$correios = new Correios();
$carrinho = new Carrinho();

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

$frete['pedido'] = $carrinho->totalDoPedido(new ProdutoModel);
echo json_encode($frete);