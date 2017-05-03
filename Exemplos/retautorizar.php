<?php

include __DIR__ . '/../vendor/autoload.php';

$path = __DIR__ . '/../tests/utils/xmlRet.xml';

$cert = new \PhpNFe\Tools\Certificado\Certificado();
$cert->carregarPfx(__DIR__ . 'seu_certificado.pfx', 'suaSenha');

$xml = file_get_contents($path);

$nfe = new \PhpNFe\NFe\NFe($cert);

$b = $cert->ehValido();

try {
    $v = $nfe->validar($xml, '3.10');
} catch (\Exception $e) {
    echo $e->getMessage();
}

$ret = $nfe->retAutorizar($xml, '35');

$code = $ret->getCode();
$chave = $ret->getChNFe();
$message = $ret->getMessage();
$retXml = $ret->getXML();

echo $ret->retorno->saveXML();

echo 'codigo: ' . $code . PHP_EOL;
echo 'chave: ' . $chave . PHP_EOL;
echo 'message: ' . $message . PHP_EOL;
echo 'ret: ' . $retXml . PHP_EOL;

echo 'foi' . PHP_EOL;