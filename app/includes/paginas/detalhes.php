<?php

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $visitas = new app\classes\Visitas( new app\models\VisitasModel );
    $visitas->adicionarVisita($id);

    $produto = new app\models\ProdutoModel;
    $produtoListado = $produto->pegarPeloId('id', $id);

 ?>
<p><?php echo $produtoListado->tb_produtos_descricao; ?></p>