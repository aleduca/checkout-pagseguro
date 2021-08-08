<?php

namespace app\models;
use PDO;

class Conexao{

    private $pdo;

    public function __construct(){

        $this->pdo = new PDO('mysql:dbhost=localhost;dbname=loja', 'root', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    public function conectarAoBanco(){
        return $this->pdo;
    }

}
