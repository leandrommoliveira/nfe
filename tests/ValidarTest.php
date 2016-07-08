<?php

class ValidarTest extends TestCase
{
    public function testValidar()
    {
        $validate = new \PhpNFe\Tools\Validar();
        $this->assertTrue($validate->validar(__DIR__ . '/utils/signXmlTeste.xml', 'infNFe'));
    }
}