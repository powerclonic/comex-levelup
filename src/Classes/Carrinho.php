<?php

namespace Matheus\Comex\Classes;

class Carrinho
{
    private array $produtos = [];

    public function adicionaProduto(Produto $produto)
    {
        array_push($this->produtos, $produto);
    }

    public function removeProduto(int $indice)
    {
        if (!key_exists($indice, $this->produtos)) {
            throw new \OutOfBoundsException("O índice " . $indice . " não existe no carrinho");
        }

        array_splice($this->produtos, $indice, 1);
    }

    public function listaProdutos()
    {
        echo "Produtos no carrinho: " . PHP_EOL;
        foreach ($this->produtos as $indice => $item) {
            echo "Produto índice " . $indice . ": " . $item->getNome() . PHP_EOL;
        }
    }
}
