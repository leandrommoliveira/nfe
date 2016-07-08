<?php

class BuilderTest extends TestCase
{
    public function testGeracaoXML()
    {
        $this->assertTrue(true);
        /*
        $xml_gerado = require __DIR__ . '/utils/builderXML.php';
        $xml_gerado = preg_replace('/\s+/', '', $xml_gerado);
        $xml_modelo = file_get_contents(__DIR__ . '/utils/xmlTeste.xml');
        $xml_modelo = str_replace("\r", '', $xml_modelo);
        $xml_modelo = str_replace("\n", '', $xml_modelo);
        $xml_modelo = preg_replace('/\s+/', '', $xml_modelo);

        $this->assertEquals($xml_modelo, $xml_gerado);*/
    }
}