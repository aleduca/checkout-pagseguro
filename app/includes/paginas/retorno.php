<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $emailPagseguro = "email";
    $tokenPagseguro = "token";

    $url = "https://ws.pagseguro.uol.com.br/v2/transactions/notifications/".$_POST['notificationCode']."?email=".$emailPagseguro."&token=".$tokenPagseguro;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $transaction_curl = curl_exec($curl);
    curl_close($curl);

    $transaction = simplexml_load_string(utf8_encode($transaction_curl));

    dump($transaction->sender->email);

    if($transaction->status == 3){

        $pedidosModel = new app\models\PedidoModel();
        $pedidosModel->atualizar('tb_pedidos_id_pagseguro',$transaction->reference, [
            'tb_pedidos_status' => 1
        ]);

    }

}