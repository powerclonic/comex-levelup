<?php
class Produto
{
    public function __construct(
        private string $nome,
        private float $preco,
        private int $qtdEstoque
    ) {
    }

    //? getters

    public function getNome()
    {
        return $this->nome;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getQtdEstoque()
    {
        return $this->qtdEstoque;
    }

    //? setters

    public function setNome(string $valor)
    {
        $this->nome = $valor;
    }

    public function setPreco(float $valor)
    {
        $this->preco = $valor;
    }

    public function compra(int $qtd = 1)
    {
        $this->qtdEstoque -= $qtd;
    }

    public function repoe(int $qtd = 1)
    {
        $this->qtdEstoque += $qtd;
    }
}

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

$produto1->compra(3);
$produto1->repoe(10);

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

class Cliente
{
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

    public function getEmail()
    {
        return $this->email;
    }

    public function getEndereco()
    {
        return $this->endereco;
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
}

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
