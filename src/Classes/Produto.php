<?php

namespace Matheus\Comex\Classes;

use Matheus\Comex\Classes\Exceptions\EstoqueNegativo;
use Matheus\Comex\Classes\Exceptions\QuantidadeNegativaInformada;

class Produto
{
    public function __construct(
        private string $nome,
        private float $preco,
        private int $qtdEstoque
    ) {
    }

    //? getters

    public function getNome()
    {
        return $this->nome;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getQtdEstoque()
    {
        return $this->qtdEstoque;
    }

    //? setters

    public function setNome(string $valor)
    {
        $this->nome = $valor;
    }

    public function setPreco(float $valor)
    {
        $this->preco = $valor;
    }

    public function compra(int $qtd = 1)
    {
        if ($qtd <= 0) {
            throw new QuantidadeNegativaInformada();
        }

        if (($this->qtdEstoque - $qtd) < 0) {
            throw new EstoqueNegativo();
        }

        $this->qtdEstoque -= $qtd;
    }

    public function repoe(int $qtd = 1)
    {
        if ($qtd <= 0) {
            throw new QuantidadeNegativaInformada();
        }

        $this->qtdEstoque += $qtd;
    }
}
