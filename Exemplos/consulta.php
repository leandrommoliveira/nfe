<?php

include __DIR__ . '/../vendor/autoload.php';

$cert = new \PhpNFe\Tools\Certificado\Certificado();

$cert->carregarPfx(__DIR__ . '/seuCertificado.pfx', 'suaSenha');

$nfe = new \PhpNFe\NFe\NFe($cert);

$ret = $nfe->consulta('42160818227795000130550010000002031678156759', '2', '42');

$xml = $ret->getMensagem();

$motivo = $ret->getMotivo();
$dataReceb = $ret->getDataReceb();
$code = $ret->getCode();

$protocolo = $ret->getProt();

echo 'Foi!';
