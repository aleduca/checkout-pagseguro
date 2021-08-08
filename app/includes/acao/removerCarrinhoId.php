<?php

if( isset($_GET['acaoCarrinho']) AND $_GET['acaoCarrinho'] == 'clearId' ){

    $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
    $pagina = filter_input(INPUT_GET,'p', FILTER_SANITIZE_STRING);

    $carrinho = new app\classes\Carrinho();
    $carrinho->removerDoCarrinho($id);

    $redirecionar = ( isset($pagina) ) ? '/' : '?p=carrinho';

    redirecionar($redirecionar);

}
