<?php

include __DIR__ . '/../vendor/autoload.php';

$cert = new \PhpNFe\Tools\Certificado\Certificado();
$cert->carregarPfx(__DIR__ . '/seuCertificado', 'suaSenha');

$nfe = new \PhpNFe\NFe\NFe($cert);

$xml = file_get_contents(__DIR__ . '/../tests/utils/xmlAutorizadoTeste.xml');

$ret = $nfe->cancela($xml, 'Justificativa Teste', '1');

$ehErro = $ret->isError();
$message = $ret->getMessage();
$code = $ret->getCode();

echo 'Foi!';

