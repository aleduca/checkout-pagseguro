<?php

use \app\models\ProdutoModel;

$produtos = new ProdutoModel();
$produtosCadastrados = $produtos->listar();
?>

<ul>
    <?php foreach($produtosCadastrados as $produto): ?>

        <div class="lista-produtos-inicio">

            <div class="visitas">
                <?php $visitasNoProduto = new app\classes\Visitas(new app\models\VisitasModel);
                echo $visitasNoProduto->numeroDeVisistasDoProduto($produto->id); ?> Visitas no produto
            </div>


            <a href="?p=detalhes&id=<?php echo $produto->id; ?>"><img src="public/images/<?php echo $produto->tb_produtos_foto; ?>" alt="" /></a>
            <li><?php echo $produto->tb_produtos_nome ?> - R$ <?php echo number_format($produto->tb_produtos_preco,2,',', '.'); ?></li>

            <?php
                $carrinho = new app\classes\StatusCarrinho();
                $produtoEstaNoCarrinho = $carrinho->estaNoCarrinho($produto->id);

                if( $produtoEstaNoCarrinho ):
             ?>
                    <a href="?p=index&acaoCarrinho=clearId&id=<?php echo $produto->id; ?>" class="waves-effect waves-light red darken-4 btn">Remover</a>
                <?php else: ?>
                    <a href="?acaoCarrinho=add&id=<?php echo $produto->id; ?>" class="waves-effect waves-light blue darken-4 btn">Comprar</a>
                <?php endif; ?>
        </div>

    <?php endforeach; ?>
</ul>
