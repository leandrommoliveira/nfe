<?php

$_ENV['APP_ENV'] = 'local';

include __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('America/Sao_Paulo'); // Necessário para não sair Warning no pdf da Danfe.

$xml = \PhpNFe\NFe\Tools\NFeXML::createByXml(file_get_contents(__DIR__ . '/../tests/utils/xmlRetornoCCTeste.xml'));

$dfe = new \PhpNFe\NFe\DanfeCC\DanfeCC($xml);
//$dfe = new \PhpNFe\NFe\DanfeCC\DanfeCC($xml, __DIR__ . '/logo.png'); //<- Com Logo

$pdf = $dfe->getPDF();

unlink(__DIR__ . '/danfe.pdf');

file_put_contents(__DIR__ . '/danfe.pdf', $pdf);
