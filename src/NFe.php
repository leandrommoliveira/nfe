<?php namespace PhpNFe;

use PhpNFe\Tools\NFEBody;
use PhpNFe\Tools\NFEHeader;
use PhpNFe\Tools\Soap;
use DOMDocument;

class NFe
{
    public function enviaSefaz($xml, Certificado $certificado)
    {
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->loadXML($xml, LIBXML_NOBLANKS | LIBXML_NOEMPTYTAG);

        $urlService = 'https://nfe-homologacao.svrs.rs.gov.br/ws/NfeAutorizacao/NFeAutorizacao.asmx';
        $urlNamespace = sprintf('%s/wsdl/%s', 'http://www.portalfiscal.inf.br/nfe', 'NfeAutorizacao');
        $header = NFEHeader::loadDOM($dom);
        $body = NFEBody::loadDOM($dom);

        $certsDir = __DIR__ . '/certs';
        @mkdir($certsDir);

        $certificado->salvaChave($certsDir);

        $client = new Soap\CurlSoap($certsDir . '/pri.key', $certsDir . '/pub.key', $certsDir . '/cert.key');
        $client->send($urlService, $urlNamespace, $header, $body, 'nfeAutorizacaoLote');
    }
}