<?php

    $carrinho = new app\classes\Carrinho();
    $produtosNoCarrinho = $carrinho->pegarProdutosDoCarrinho();

    $produtoModel = new app\models\ProdutoModel();
    $total = $carrinho->totalDoPedido($produtoModel);

?>

<!-- modal para fechar pedido e calcular o frete -->
<div id="modal1" class="modal modal-fixed-footer" >
<div class="modal-content"></div>
<div class="modal-footer"></div>
</div>

<table class="bordered" id="table-carrinho">

    <thead>
        <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Subtotal</th>
            <th>Remover</th>
        </tr>
    </thead>

    <tbody>
        <?php if (empty($produtosNoCarrinho)): ?>
            <tr><td>Nenhum produto no carrinho</td></tr>
        <?php else: ?>

                <?php foreach($produtosNoCarrinho as $produto => $quantidade): ?>
                <?php $produtoCarrinho = $produtoModel->pegarPeloId('id', $produto); ?>
                    <tr>
                        <td><?php echo $produtoCarrinho->tb_produtos_nome; ?></td>
                        <td>R$ <?php echo number_format($produtoCarrinho->tb_produtos_preco,2,',', '.'); ?></td>
                        <td><input type="text" id="qtd" value="<?php echo $quantidade; ?>" length="3"> <a href="#" class="btn-alterar-quantidade green draken-3 btn" data-id="<?php echo $produtoCarrinho->id; ?>">Alterar</a> </td>
                        <td>R$ <?php echo number_format( ( $produtoCarrinho->tb_produtos_preco * $quantidade ),2,',', '.' ); ?></td>
                        <td><a href="?acaoCarrinho=clearId&id=<?php echo $produtoCarrinho->id; ?>" class="waves-effect red darken-3 btn"><i class="mdi-action-highlight-remove"></i> Remover</a></td>
                    </tr>
                <?php endforeach; ?>

        <?php endif; ?>
    </tbody>

    <tfoot>
        <tr>
            <td>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></td>
            <td colspan="4">
                <?php if( $produtosNoCarrinho ): ?>
                    <a href="?acaoCarrinho=clear" class="waves-effect blue darken-3 btn">Limpar Carrinho</a>
                    <a href="#" class="waves-effect green darken-3 btn btn-calcular-frete">Calcular Frete</a>
                <?php endif; ?>
            </td>
        </tr>
    </tfoot>

</table>
