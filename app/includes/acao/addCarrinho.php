<?php

if( isset($_GET['acaoCarrinho']) AND $_GET['acaoCarrinho'] == 'add' ){

    $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

    $carrinho = new app\classes\Carrinho();
    $carrinho->adicionarAoCarrinho($id);

}
