<?php

namespace Matheus\Comex\Tests;

use Matheus\Comex\Classes\Cliente;
use PHPUnit\Framework\TestCase;

class ClienteTest extends TestCase
{
    public function testClienteRetornaCelularFormatadoCorretamente()
    {
        $cliente = new Cliente(
            'Fulano de Tal',
            'fulano@foo.baz',
            54999887766,
            [
                'rua' => 'Rua Ciclano'
            ]
        );

        $this->assertEquals('(54) 99988-7766', $cliente->getCelularFormatado());
    }
}
