<?php

namespace Matheus\Comex\Classes\Exceptions;

use Exception;

class ProdutoNaoExisteNoCarrinho extends Exception
{
    public function __construct(int $indice)
    {
        parent::__construct("O índice '" . $indice . "' não está atribuído à nenhum produto no carrinho.");
    }
}
