<?php

namespace Matheus\Comex\Tests;

use Matheus\Comex\Classes\Cliente;
use Matheus\Comex\Classes\Pagamento\Pix;
use Matheus\Comex\Classes\Pedido;
use Matheus\Comex\Classes\Produto;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class PedidoTest extends TestCase
{
    #[Test]
    #[DataProvider('entregaProdutos')]
    public function testValorTotalDoPedidoCalculadoCorretamente(array $produtos)
    {
        $cliente = new Cliente(
            'Fulano de Tal',
            'fulano@foo.baz',
            54999886677,
            [
                'cep' => '95150000',
                'estado' => 'RS',
                'cidade' => 'Nova Petrópolis',
                'bairro' => 'Centro',
                'rua' => 'Avenida Ciclano',
                'numero' => 987
            ]
        );

        $valorEsperado = number_format(array_reduce($produtos, fn ($carry, $current) => $carry += $current->getPreco()), 2);

        $pedido = new Pedido(
            1,
            $cliente,
            $produtos,
            new Pix()
        );

        $this->assertEquals(
            $valorEsperado,
            $pedido->getValorTotal(),
        );
    }

    public static function listaDeProdutosPrecoFloat()
    {
        return [
            new Produto(
                'Caneta',
                1.99,
                400
            ),
            new Produto(
                'Caderno',
                14.49,
                400
            ),
            new Produto(
                'Borracha',
                0.49,
                400
            ),
            new Produto(
                'Lápis',
                1.50,
                400
            ),
            new Produto(
                'Folha A4',
                5.49,
                400
            ),
        ];
    }

    public static function listaDeProdutosPrecoInt()
    {
        return [
            new Produto(
                'Caneta',
                2,
                400
            ),
            new Produto(
                'Caderno',
                15,
                400
            ),
            new Produto(
                'Borracha',
                1,
                400
            ),
            new Produto(
                'Lápis',
                2,
                400
            ),
            new Produto(
                'Folha A4',
                6,
                400
            ),
        ];
    }


    public static function entregaProdutos()
    {
        return [
            'data set 1' => [self::listaDeProdutosPrecoFloat()],
            'data set 2' => [self::listaDeProdutosPrecoInt()]
        ];
    }
}
