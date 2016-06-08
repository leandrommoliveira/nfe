<?php

include 'vendor/autoload.php';

$xml = file_get_contents(__DIR__ . '/tests\utils\signXmlTeste.xml');
$certificado = new \PhpNFe\Certificado();
$certificado->carregarPfx(__DIR__ . '/tests/utils/certificado_teste.pfx', '123456');

$nfe = new \PhpNFe\NFe();
$nfe->enviaSefaz($xml, $certificado);
