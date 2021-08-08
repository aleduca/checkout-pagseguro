<?php

require '../../../config.php';

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$qtd = filter_input(INPUT_POST, 'qtd', FILTER_SANITIZE_NUMBER_INT);

$carrinho = new app\classes\Carrinho();
$carrinho->atualizarQuantidade($id, $qtd);
echo 'atualizado';