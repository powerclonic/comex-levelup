<?php

namespace Matheus\Comex\Classes;

class Pedido
{
    public function __construct(
        private int $id,
        private Cliente $cliente,
        private array $produtos,
    ) {
    }

    //? getters

    public function getId()
    {
        return $this->id;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getProdutos()
    {
        return $this->produtos;
    }

    public function getValorTotal()
    {
        return $this->calculaDesconto(array_reduce($this->produtos, fn ($carry, $current) => $carry += $current->getPreco()));
    }

    //? setters

    public function setId(int $valor)
    {
        $this->id = $valor;
    }

    public function setCliente(Cliente $valor)
    {
        $this->cliente = $valor;
    }

    public function setProdutos(array $valor)
    {
        $this->produtos = $valor;
    }

    //? outros métodos

    private function calculaDesconto(float $valorTotal)
    {
        if ($valorTotal < 100) return $valorTotal;

        return number_format($valorTotal * 0.9, 2, ',', '.');
    }
}
