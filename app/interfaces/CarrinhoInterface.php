<?php

namespace app\interfaces;
use app\models\ProdutoModel;

interface CarrinhoInterface{

    public function adicionarAoCarrinho($id);
    public function removerDoCarrinho($id);
    public function pegarProdutosDoCarrinho();
    public function atualizarQuantidade($id, $qtd);
    public function totalDoPedido(ProdutoModel $produtoModel);
    public function limparCarrinho();

}
