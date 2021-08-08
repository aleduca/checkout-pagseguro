<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Curso Pagseguro</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
	<link rel="stylesheet" href="public/css/styles.css" charset="utf-8">
</head>
<body>

	<div class="container">
		<div id="botoes">
			<a href="/" class="waves-effect waves-light btn"><i class="mdi-action-home"></i> Home</a>
			<a href="?p=carrinho" class="waves-effect waves-light blue darken-4 btn"><i class="mdi-action-add-shopping-cart"></i> Carrinho</a>
		</div>
		<div id="conteudo"><?php paginas(); ?></div>
	</div>

	<script src="public/js/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
	<script src="public/js/languages/pt-br.js"></script>
	<script src="public/js/pedido/fechar_pedido.js"></script>
	<script src="public/js/pedido/calcular_frete.js"></script>
	<script src="public/js/carrinho/alterar_quantidade.js"></script>
</body>
</html>
