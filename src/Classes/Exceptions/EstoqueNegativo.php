<?php

namespace Matheus\Comex\Classes\Exceptions;

use Exception;

class EstoqueNegativo extends Exception
{
    public function __construct()
    {
        parent::__construct("O estoque não pode ficar com uma quantidade negativa de itens.");
    }
}
