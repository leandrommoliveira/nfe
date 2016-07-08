<?php

include 'vendor/autoload.php';
include 'src/Tools/Modulo11.php';

$cDV = \PhpNFe\Tools\Modulo11::nfeCalculaDV('4216061822779500013055001000000045162102726');

$path = __DIR__ . '/tests/utils/xmlTeste.xml';

$path = __DIR__ . '/nota.xml';

$cert = new \PhpNFe\Tools\Certificado\Certificado();
$cert->carregarArquivo($path);
$cert->carregarPfx(__DIR__ . '/../certificado_floripa.pfx', 'BOING');

$xml = file_get_contents($path);


$xml = $cert->assinarXML($xml, 'infNFe');

$nfe = new \PhpNFe\NFe($cert);

$b = $cert->ehValido();

$v = \PhpNFe\Tools\Validar::validar($xml, __DIR__ . '/src/schemes/PL_008i2/enviNFe_v3.10.xsd');

$ret = $nfe->autorizar($xml);

$code = $ret->getCode();

$chave = $ret->getChNFe();

$retXml = $ret->getXML();

$message = $ret->getMessage();

echo 'foi';
