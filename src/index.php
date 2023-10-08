<?php

$produtos = [
    [ // 0
        'nome' => 'Caneta',
        'preco' => 1.99,
        'qtd_estoque' => 250
    ],
    [ // 1
        'nome' => 'Caderno',
        'preco' => 24.99,
        'qtd_estoque' => 100
    ],
    [ // 2
        'nome' => 'Processador',
        'preco' => 249.99,
        'qtd_estoque' => 70
    ],
    [ // 3
        'nome' => 'Placa de vídeo',
        'preco' => 1399.99,
        'qtd_estoque' => 15
    ]
];

foreach ($produtos as $produto) {
    echo "O produto " . $produto['nome'] . " custa R$" . $produto['preco'] . " e possui " . $produto['qtd_estoque'] . " item(s) em estoque." . PHP_EOL;
};

function compraProduto(int $idProduto, array &$produtos)
{
    $produtos[$idProduto]['qtd_estoque'] -= 1;
}

function repoeProduto(int $idProduto,  int $quantidade, array &$produtos)
{
    $produtos[$idProduto]['qtd_estoque'] += $quantidade;
}

compraProduto(0, $produtos);
repoeProduto(0, 10, $produtos);

function produtoMaisCaro(array $produtos)
{
    $maisCaro = 0;

    foreach ($produtos as $indice => $produto) {
        if ($produto['preco'] > $produtos[$maisCaro]['preco']) {
            $maisCaro = $indice;
        }
    }

    echo "O produto mais caro é " . $produtos[$maisCaro]['nome'] . ", custando R$" . $produtos[$maisCaro]['preco'] . PHP_EOL;
};

produtoMaisCaro($produtos);

$cliente = [
    'nome' => 'Fulano de Tal',
    'email' => 'fulano@foo.baz',
    'celular' => 54999887766,
    'endereco' => [
        'cep' => '95150000',
        'estado' => 'RS',
        'cidade' => 'Nova Petrópolis',
        'bairro' => 'Centro',
        'rua' => 'Avenida Ciclano',
        'numero' => 987
    ]
];

function calculaDesconto(float $valorTotal)
{
    if ($valorTotal < 100) return $valorTotal;

    return number_format($valorTotal * 0.9, 2);
}

$valorTotal = 249.99 + 1.99;

echo "Calculando desconto para o pedido com o valor de: R$" . $valorTotal . PHP_EOL;

$valorFinal = calculaDesconto($valorTotal);

echo "Valor com desconto: R$" . $valorFinal . PHP_EOL;
