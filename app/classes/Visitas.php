<?php

namespace app\classes;
use app\models\VisitasModel;

class Visitas{

    private $visitaModel;

    public function __construct(VisitasModel $visitaModel){
        $this->visitaModel = $visitaModel;
    }

    private function pegarVisitasDoBanco($id){
        return $this->visitaModel->pegarPeloId('tb_visitas_produto', $id);
    }

    public function adicionarVisita($id){

        $visitouOProdutoModel = $this->pegarVisitasDoBanco($id);

        if(empty($visitouOProdutoModel)){
            $attributes = [
                'tb_visitas' => 1,
                'tb_visitas_produto' => $id
            ];
            $this->visitaModel->cadastrar($attributes);
        }else{
               $attributes = [
                'tb_visitas' => $visitouOProdutoModel->tb_visitas += 1,
                'tb_visitas_produto' => $id
            ];
            $this->visitaModel->atualizar('tb_visitas_produto', $id,$attributes);
        }
    }

    public function numeroDeVisistasDoProduto($id){
        $visitasNoProduto = $this->pegarVisitasDoBanco($id);
        return (isset($visitasNoProduto->tb_visitas)) ? $visitasNoProduto->tb_visitas : '0';
    }

}