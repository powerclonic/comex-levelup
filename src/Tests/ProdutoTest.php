<?php

namespace Matheus\Comex\Tests;

use Matheus\Comex\Classes\Exceptions\EstoqueNegativo;
use Matheus\Comex\Classes\Exceptions\QuantidadeNegativaInformada;
use Matheus\Comex\Classes\Produto;
use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    public function testProdutoNaoAceitaCompraAcimaDoEstoque()
    {
        $produto = new Produto(
            'Produto',
            10,
            5
        );
        $this->expectException(EstoqueNegativo::class);

        $produto->compra(6);
    }

    public function testProdutoNaoAceitaCompraNegativa()
    {
        $produto = new Produto(
            'Produto',
            10,
            5
        );
        $this->expectException(QuantidadeNegativaInformada::class);

        $produto->compra(-1);
    }

    public function testProdutoNaoAceitaReposicaoNegativa()
    {
        $produto = new Produto(
            'Produto',
            10,
            5
        );
        $this->expectException(QuantidadeNegativaInformada::class);

        $produto->repoe(-1);
    }

    public function testQuantidadeEstoqueAbaixaAoComprar()
    {
        $produto = new Produto(
            'Produto',
            10,
            5
        );

        $produto->compra(5);

        $this->assertEquals(0, $produto->getQtdEstoque());
    }

    public function testQuantidadeEstoqueSobreAoRepor()
    {
        $produto = new Produto(
            'Produto',
            10,
            5
        );

        $produto->repoe(5);

        $this->assertEquals(10, $produto->getQtdEstoque());
    }
}
