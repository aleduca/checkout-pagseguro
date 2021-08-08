<?php

function paginas(){

    $pagina = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING);

    if( is_file( APP_INCLUDES.'paginas/'.$pagina.'.php' ) ){
        require APP_INCLUDES.'paginas/'.$pagina.'.php';
    }else{
        require APP_INCLUDES.'paginas/home.php';
    }

}
