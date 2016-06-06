<?php

include 'vendor/autoload.php';

$validate = new \PhpNFe\Validar();



print_r($validate->validar(__DIR__ . '/tests/utils/signXmlTeste.xml', 'infNFe'));
