<?php

include 'vendor/autoload.php';
include 'src/Tools/Modulo11.php';

$dv = nfeCalculaDV('4216061822779500013055001000000039199975999');

$cert = new \PhpNFe\Certificado();
$cert->carregarArquivo($xml);
$cert->carregarPfx(__DIR__ . '/../certificado_floripa.pfx', 'BOING');

$nfe = new \PhpNFe\NFe($cert);

/*
$xml = __DIR__ . '/tests/utils/xmlTeste.xml';

$xml = file_get_contents($xml);

$xml = $cert->assinarXML($xml, 'infNFe');

$validate = \PhpNFe\Validar::validar($xml, 'infNFe');

$xml = $nfe->autorizar($xml, $cert)->getXML();

file_put_contents(__DIR__ . '/tests/utils/xmlAutorizadoTeste.xml', $xml);
*/
$xml = __DIR__ . '/tests/utils/xmlAutorizadoTeste.xml';

$nSerie = 1;
$nIni = 48;
$nFin = 48;
$xJust = 'teste de inutilização de notas fiscais em homologacao';
$cnpj = '18227795000130';

$r = $nfe->inutiliza('16', $cnpj, $nSerie, $nIni, $nFin, \PhpNFe\Tools\Sefaz::ambHomologacao, '42', $xJust);

$msg = $r->getMessage();

$chNFe = $r->getChNFe();

$code = $r->getCode();

//$r = $nfe->cartaCorrecao(file_get_contents($xml), $xCorrecao, 1)->getXML();

//$r = $nfe->cancela(file_get_contents($xml), 1, 'Justificativa de Teste', $cert)->getXML();

print_r($r);