<?php

$produtos = [
    [
        'nome' => 'Caneta',
        'preco' => 1.99
    ],
    [
        'nome' => 'Caderno',
        'preco' => 24.99
    ],
    [
        'nome' => 'Processador',
        'preco' => 249.99
    ],
    [
        'nome' => 'Placa de vídeo',
        'preco' => 1399.99
    ]
];

foreach ($produtos as $produto) {
    echo "O produto " . $produto['nome'] . " custa R$" . $produto['preco'] . PHP_EOL;
};
