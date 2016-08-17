<?php

include __DIR__ . '/../vendor/autoload.php';

$cert = new \PhpNFe\Tools\Certificado\Certificado();
$cert->carregarPfx(__DIR__ . '/../../certificado_floripa.pfx', 'BOING');

$nfe = new \PhpNFe\NFe\NFe($cert);

