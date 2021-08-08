<?php

ini_set('display_errors', 1);

session_start();

require 'vendor/autoload.php';

date_default_timezone_set('America/Sao_Paulo');

// definir as constantes
define('APP_INCLUDES', 'app/includes/');
define('APP_FUNCTIONS', 'app/functions/');

// funcoes
require APP_FUNCTIONS.'paginas/paginas.php';
require APP_FUNCTIONS.'custom/custom.php';

require APP_INCLUDES.'acao/addCarrinho.php';
require APP_INCLUDES.'acao/removerCarrinho.php';
require APP_INCLUDES.'acao/removerCarrinhoId.php';