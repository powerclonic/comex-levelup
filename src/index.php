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
