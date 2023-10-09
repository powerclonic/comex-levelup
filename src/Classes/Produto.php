<?php

namespace Matheus\Comex\Classes;

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
            throw new \InvalidArgumentException("A quantidade de compra deve ser um número inteiro positivo maior do que 0.");
        }

        if (($this->qtdEstoque - $qtd) < 0) {
            throw new \InvalidArgumentException("A quantidade de compra excede o limite de produtos em estoque");
        }

        $this->qtdEstoque -= $qtd;
    }

    public function repoe(int $qtd = 1)
    {
        if ($qtd <= 0) {
            throw new \InvalidArgumentException("A quantidade de reposição deve ser um número inteiro positivo maior do que 0.");
        }

        $this->qtdEstoque += $qtd;
    }
}
