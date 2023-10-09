<?php

namespace Matheus\Comex\Classes\Exceptions;

use Exception;

class QuantidadeNegativaInformada extends Exception
{
    public function __construct()
    {
        parent::__construct("A quantidade informada não pode ser negativa.");
    }
}
