<?php

include 'vendor/autoload.php';

$cert = new \PhpNFe\Certificado();
$cert->carregarPfx(__DIR__ . '../certificado_teste.pfx', '123456');
$cert->salvarArquivo(__DIR__ . '/certificadoSalvo.xml');
$cnpj = $cert->getCNPJ();
$certificado = $cert->getCertificado();
$privateKey = $cert->getChavePri();
$publicKey = $cert->getChavePub();
$valido = $cert->ehValido();
$validade = $cert->getValidade();
$cert = new \PhpNFe\Certificado();
$cert->carregarArquivo(__DIR__ . '/certificadoSalvo.xml');

echo 'terminou!';