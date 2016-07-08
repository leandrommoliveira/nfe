<?php

class ValidarTest extends TestCase
{
    public function testValidar()
    {
        $validate = new \PhpNFe\Tools\Validar();
        $this->assertTrue($validate->validar(__DIR__ . '/utils/signXmlTeste.xml',
                                             __DIR__ . '/../src/schemes/PL_008i2/nfe_v3.10.xsd'));
    }
}