<?php

namespace app\classes;

class StatusCarrinho{

    public function carrinhoExiste(){
        return ( isset( $_SESSION['carrinho'] ) || !empty($_SESSION['carrinho']) ) ? true : false;
    }

    public function criarOCarrinho(){
        if( !$this->carrinhoExiste() ){
            $_SESSION['carrinho'] = [];
        }
    }

    public function estaNoCarrinho($id){

        if($this->carrinhoExiste()){
            if(isset($_SESSION['carrinho'][$id])){
                return true;
            }
            return false;
        }else{
            $this->criarOCarrinho();
        }

    }

}
