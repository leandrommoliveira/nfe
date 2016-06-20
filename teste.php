<?php

include 'vendor/autoload.php';
include 'src/Tools/Modulo11.php';

$xml = __DIR__ . '/tests/utils/xmlTeste.xml';

$cert = new \PhpNFe\Certificado();
$cert->carregarArquivo($xml);
$cert->carregarPfx(__DIR__ . '/../certificado_floripa.pfx', 'BOING');

$dv = nfeCalculaDV('4216061822779500013055001000000043199985999');

$testexml = __DIR__ . '/tests/utils/xmlTeste.xml';

$testexml = $cert->assinarXML(file_get_contents($testexml), 'infNFe');

$um = $testexml;
$dois = file_get_contents(__DIR__ . '/../../teste.xml');

//$um = str_replace('', , )str_replace("\r", '', str_replace("\n", '', str_replace("\r\n", '', $um)));

$dois = trim(str_replace("\r", '', str_replace("\n", '', str_replace("\r\n", '', $dois))));
//$um = trim(preg_replace('/\s\s+/', '', $um));

//$dois = trim(preg_replace('/\s\s+/', '', $dois));

$auxUm = str_split($um);
$auxDois = str_split($dois);

$resultado = [];

for ($i = 0; $i < count($auxUm); $i++) {
    if ($auxUm[$i] != $auxDois[$i]) {
        $resultado[] = $auxUm[$i];
    }
}

$result = $um == $dois;

$nfe = new \PhpNFe\NFe($cert);

$sign = $cert->assinarXML(file_get_contents($xml), 'infNFe');

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

$r = $nfe->cartaCorrecao($xml, $xJust, 1);

$r = $nfe->cancela(file_get_contents($xml), 'Justificativa de Teste', 1)->getXML();

$r = $nfe->inutiliza('16', $cnpj, $nSerie, $nIni, $nFin, \PhpNFe\Tools\Sefaz::ambHomologacao, '42', $xJust);

$msg = $r->getMessage();

$chNFe = $r->getChNFe();

$code = $r->getCode();

//$r = $nfe->cartaCorrecao(file_get_contents($xml), $xCorrecao, 1)->getXML();

print_r($r);