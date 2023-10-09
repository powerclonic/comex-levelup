<?php

namespace Matheus\Comex\Classes\Pagamento;

use Matheus\Comex\Interfaces\MeioDePagamento;

class Pix implements MeioDePagamento
{
    public function processaPagamento(): bool
    {
        echo "Processando pagamento...." . PHP_EOL;

        sleep(1);

        echo "Pagamento confirmado" . PHP_EOL;

        return true;
    }
}
