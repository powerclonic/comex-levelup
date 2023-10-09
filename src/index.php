<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Matheus\Comex\Classes\Carrinho;
use Matheus\Comex\Classes\Cliente;
use Matheus\Comex\Classes\Pedido;
use Matheus\Comex\Classes\Produto;

$produto1 = new Produto(
    'Caneta',
    1.99,
    500
);

$produto2 = new Produto(
    'Caderno',
    24.99,
    400
);

$produto3 = new Produto(
    'Processador',
    249.99,
    100
);

$produto4 = new Produto(
    'Placa de Vídeo',
    1399.99,
    20
);

$produtos = [
    $produto1,
    $produto2,
    $produto3,
    $produto4
];

foreach ($produtos as $produto) {
    echo "O produto " . $produto->getNome() . " custa R$" . $produto->getPreco() . " e possui " . $produto->getQtdEstoque() . " item(s) em estoque." . PHP_EOL;
};

try {
    $produto1->compra(3);
    $produto1->repoe(2);
} catch (\InvalidArgumentException $erro) {
    echo "Argumento inválido passado para função! Erro: " . $erro->getMessage();
    return;
}

echo $produto1->getQtdEstoque() . PHP_EOL;

function produtoMaisCaro(array $produtos)
{
    $maisCaro = $produtos[0];

    foreach ($produtos as $produto) {
        if ($produto->getPreco() > $maisCaro->getPreco()) {
            $maisCaro = $produto;
        }
    }

    echo "O produto mais caro é " . $maisCaro->getNome() . ", custando R$" . $maisCaro->getPreco() . PHP_EOL;
};

produtoMaisCaro($produtos);

function calculaDesconto(float $valorTotal)
{
    if ($valorTotal < 100) return $valorTotal;

    return number_format($valorTotal * 0.9, 2);
}

$valorTotal = 249.99 + 1.99;

echo "Calculando desconto para o pedido com o valor de: R$" . $valorTotal . PHP_EOL;

$valorFinal = calculaDesconto($valorTotal);

echo "Valor com desconto: R$" . $valorFinal . PHP_EOL;

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

echo $cliente->getCelularFormatado() . PHP_EOL;

$pedido = new Pedido(1, $cliente, $produtos);

echo "O pedido de ID " . $pedido->getId() . " custa no total R$" . $pedido->getValorTotal() . PHP_EOL;

$cliente->adicionaPedido($pedido);
$cliente->adicionaPedido($pedido);
$cliente->adicionaPedido($pedido);
$cliente->adicionaPedido($pedido);

echo "O cliente " . $cliente->getNome() . " tem " . count($cliente->getPedidos()) . " pedido(s)" . PHP_EOL;

$carrinho = new Carrinho();

$carrinho->adicionaProduto($produto1);
$carrinho->adicionaProduto($produto4);
$carrinho->adicionaProduto($produto2);
$carrinho->adicionaProduto($produto4);
$carrinho->adicionaProduto($produto2);
$carrinho->adicionaProduto($produto3);

$carrinho->listaProdutos();

try {
    $carrinho->removeProduto(0);
    $carrinho->removeProduto(29);
} catch (OutOfBoundsException $erro) {
    echo "Índice informado não existe no carrinho! Erro: " . $erro->getMessage() . PHP_EOL;
    return;
}

$carrinho->listaProdutos();
