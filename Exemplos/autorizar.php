<?php

include __DIR__ . '/../vendor/autoload.php';

$path = __DIR__ . '/tests/utils/xmlTeste.xml';

$path = __DIR__ . '/nota.xml';

$cert = new \PhpNFe\Tools\Certificado\Certificado();
$cert->carregarArquivo($path);
$cert->carregarPfx(__DIR__ . 'seu_certificado.pfx', 'suaSenha');

$xml = file_get_contents($path);

$xml = $cert->assinarXML($xml, 'infNFe');

$nfe = new \PhpNFe\NFe\NFe($cert);

$b = $cert->ehValido();

$v = $nfe->validar($xml, '3.10');

$ret = $nfe->autorizar($xml);

$code = $ret->getCode();
$chave = $ret->getChNFe();
$retXml = $ret->getXML();
$message = $ret->getMessage();

echo 'foi';
