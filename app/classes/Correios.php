<?php

namespace app\classes;

use Cagartner\CorreiosConsulta\CorreiosConsulta as CorreiosConsulta;

class Correios{

	private $tipo;
	private $formato;
	private $cepDestino;
	private $cepOrigem;
	private $peso;
	private $comprimento;
	private $altura;
	private $largura;
	private $diametro;
	private $correios;

	public function __construct(){
		$this->correios = new CorreiosConsulta();
	}

	private function dadosParaCalcularFrete(){

	 $dadosCalcularFrete = [
        'tipo'              => $this->tipo, // opções: `sedex`, `sedex_a_cobrar`, `sedex_10`, `sedex_hoje`, `pac`
        'formato'           => $this->formato, // opções: `caixa`, `rolo`, `envelope`
        'cep_destino'       => $this->cepDestino, // Obrigatório
        'cep_origem'        => $this->cepOrigem, // Obrigatorio
        //'empresa'         => '', // Código da empresa junto aos correios, não obrigatório.
        //'senha'           => '', // Senha da empresa junto aos correios, não obrigatório.
        'peso'              => $this->peso, // Peso em kilos
        'comprimento'       => $this->comprimento, // Em centímetros
        'altura'            => $this->altura, // Em centímetros
        'largura'           => $this->largura, // Em centímetros
        'diametro'          => $this->diametro, // Em centímetros, no caso de rolo
        // 'mao_propria'       => '1', // Não obrigatórios
        // 'valor_declarado'   => '1', // Não obrigatórios
        // 'aviso_recebimento' => '1', // Não obrigatórios
    ];

    return $dadosCalcularFrete;

	}

	public function calcularFrete(){
		return $this->correios->frete($this->dadosParaCalcularFrete());
	}

	public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function setFormato($formato)
    {
        $this->formato = $formato;

        return $this;
    }

    public function setCepDestino($cepDestino)
    {
        $this->cepDestino = $cepDestino;

        return $this;
    }

    public function setCepOrigem($cepOrigem)
    {
        $this->cepOrigem = $cepOrigem;

        return $this;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    public function setComprimento($comprimento)
    {
        $this->comprimento = $comprimento;

        return $this;
    }

    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    public function setLargura($largura)
    {
        $this->largura = $largura;

        return $this;
    }

    public function setDiametro($diametro)
    {
        $this->diametro = $diametro;

        return $this;
    }

}