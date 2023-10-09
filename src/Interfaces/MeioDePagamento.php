<?php

namespace Matheus\Comex\Interfaces;

interface MeioDePagamento
{
    public function processaPagamento(): bool;
}
