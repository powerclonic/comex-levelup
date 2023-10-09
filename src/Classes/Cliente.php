<?php

namespace Matheus\Comex\Classes;

class Cliente
{
    private array $pedidos = [];

    public function __construct(
        private string $nome,
        private string $email,
        private int $celular,
        private array $endereco,
    ) {
    }

    //? getters

    public function getNome()
    {
        return $this->nome;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function getCelularFormatado()
    {
        return preg_replace("/(\d{2})(\d{4,5})(\d{4})/", "($1) $2-$3", $this->celular);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getPedidos()
    {
        return $this->pedidos;
    }

    //? setters

    public function setNome(string $valor)
    {

        $this->nome = $valor;
    }

    public function setCelular(int $valor)
    {

        $this->celular = $valor;
    }

    public function setEmail(string $valor)
    {

        $this->email = $valor;
    }

    public function setEndereco(array $valor)
    {

        $this->endereco = $valor;
    }

    public function adicionaPedido(Pedido $pedido)
    {
        array_push($this->pedidos, $pedido);
    }
}
