<?php

if( isset($_GET['acaoCarrinho']) AND $_GET['acaoCarrinho'] == 'clear' ){

    $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

    $carrinho = new app\classes\Carrinho();
    $carrinho->limparCarrinho();
    header("Location:?p=carrinho");

}
