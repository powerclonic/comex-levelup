<?php

namespace Matheus\Comex\Tests;

use Matheus\Comex\Classes\Carrinho;
use Matheus\Comex\Classes\Exceptions\ProdutoNaoExisteNoCarrinho;
use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
    public function testCarrinhoDaErroAoRemoverProdutoInexistente()
    {
        $carrinho = new Carrinho();

        $this->expectException(ProdutoNaoExisteNoCarrinho::class);

        $carrinho->removeProduto(1);
    }
}
