# NFe para PHP

[![Build Status](https://travis-ci.org/phpnfe/tools.svg?branch=master&format=flat)](https://travis-ci.org/phpnfe/tools)
[![StyleCI](https://styleci.io/repos/62751104/shield?style=flat)](https://styleci.io/repos/62751104)
[![Latest Stable Version](https://poser.pugx.org/phpnfe/nfe/v/stable?format=flat)](https://packagist.org/packages/phpnfe/nfe)
[![Total Downloads](https://poser.pugx.org/phpnfe/nfe/downloads?format=flat)](https://packagist.org/packages/phpnfe/nfe)
[![Latest Unstable Version](https://poser.pugx.org/phpnfe/nfe/v/unstable?format=flat)](https://packagist.org/packages/phpnfe/nfe)
[![License](https://poser.pugx.org/phpnfe/nfe/license?format=flat)](https://packagist.org/packages/phpnfe/nfe)

### Operações
- Autorização
- Cancelamento
- Carta Correção
- Inutilização
- Consulta

### Ferramentas
- Builder para NF-e
- Danfe
- Danfe Carta Correção

Estados homologados:
 - SC
 
### Composer

```json
 "phpnfe/nfe": "1.2.*"
```


### Uso - Autorização

Exemplo:

```php
<?php

include 'vendor/autoload.php';

$path = __DIR__ . '/tests/utils/xmlTeste.xml';

$cert = new \PhpNFe\Tools\Certificado\Certificado();
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
```

## Exemplos

- [Autorizacao](/Exemplos/autorizar.php)
- [Cancelamento](/Exemplos/cancelar.php)
- [Consulta](/Exemplos/consulta.php)
- [Builder](/Exemplos/gerar.php)
- [Danfe](/Exemplos/danfe.php)
- [DanfeCC](/Exemplos/danfeCC.php)

## License

[The MIT License](/LICENSE)
