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
        if ($qtd <= 0) {
            throw new InvalidArgumentException("A quantidade de compra deve ser um número inteiro positivo maior do que 0.");
        }

        if (($this->qtdEstoque - $qtd) < 0) {
            throw new InvalidArgumentException("A quantidade de compra excede o limite de produtos em estoque");
        }

        $this->qtdEstoque -= $qtd;
    }

    public function repoe(int $qtd = 1)
    {
        if ($qtd <= 0) {
            throw new InvalidArgumentException("A quantidade de reposição deve ser um número inteiro positivo maior do que 0.");
        }

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

$pedido = new Pedido(1, $cliente, $produtos);

echo "O pedido de ID " . $pedido->getId() . " custa no total R$" . $pedido->getValorTotal() . PHP_EOL;

$cliente->adicionaPedido($pedido);
$cliente->adicionaPedido($pedido);
$cliente->adicionaPedido($pedido);
$cliente->adicionaPedido($pedido);

echo "O cliente " . $cliente->getNome() . " tem " . count($cliente->getPedidos()) . " pedido(s)" . PHP_EOL;

class Carrinho
{
    private array $produtos = [];

    public function adicionaProduto(Produto $produto)
    {
        array_push($this->produtos, $produto);
    }

    public function removeProduto(int $indice)
    {
        if (!key_exists($indice, $this->produtos)) {
            throw new OutOfBoundsException("O índice " . $indice . " não existe no carrinho");
        }

        array_splice($this->produtos, $indice, 1);
    }

    public function listaProdutos()
    {
        echo "Produtos no carrinho: " . PHP_EOL;
        foreach ($this->produtos as $indice => $item) {
            echo "Produto índice " . $indice . ": " . $item->getNome() . PHP_EOL;
        }
    }
}

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
