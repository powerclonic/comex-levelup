<?php

namespace Matheus\Comex\Classes\Pagamento;

use Matheus\Comex\Interfaces\MeioDePagamento;

class CartaoDeCredito implements MeioDePagamento
{
    public function processaPagamento(): bool
    {
        echo "Processando pagamento...." . PHP_EOL;

        sleep(10);

        if ((bool) rand(0, 1)) {
            echo "Pagamento confirmado!" . PHP_EOL;
            return true;
        } else {
            echo "Cartão recusado!" . PHP_EOL;
            return false;
        }
    }
}
