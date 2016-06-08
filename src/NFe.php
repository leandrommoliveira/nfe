<?php namespace PhpNFe;

use PhpNFe\Tools\NFEBody;
use PhpNFe\Tools\NFEHeader;
use PhpNFe\Tools\Soap;
use DOMDocument;

class NFe
{
    public function enviaSefaz($xml, Certificado $certificado)
    {
        //$xml = file_get_contents($xml);

        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->loadXML($xml, LIBXML_NOBLANKS | LIBXML_NOEMPTYTAG);

        $urlService = 'https://nfe-homologacao.svrs.rs.gov.br/ws/NfeAutorizacao/NFeAutorizacao.asmx';
        $urlNamespace = sprintf("%s/wsdl/%s", 'http://www.portalfiscal.inf.br/nfe', 'NfeAutorizacao');
        $header = NFEHeader::loadDOM($dom);
        $body = NFEBody::loadDOM($dom);

        $certsDir = __DIR__ . '/certs';
        @mkdir($certsDir);

        $certificado->salvaChave($certsDir);

        $client = new Soap\CurlSoap($certsDir . '/pri.key', $certsDir . '/pub.key', $certsDir . '/cert.key');
        $ret = $client->send($urlService, $urlNamespace, $header, $body, 'nfeAutorizacaoLote');


        /*
        $node = $dom->getElementsByTagName('infNFe')->item(0);
        
        $idLote = substr(str_replace(',', '', number_format(microtime(true)*1000000, 0)), 0, 15);
        
        $xml = preg_replace('/\s+/', '', $xml);;
        

        $urlService = 'https://nfe-homologacao.svrs.rs.gov.br/ws/NfeAutorizacao/NFeAutorizacao.asmx';
        
        $method = "nfeAutorizacaoLote";

        $urlOperation = 'NfeAutorizacao';

        $version = '3.10';

        $urlNamespace = 'http://www.portalfiscal.inf.br/nfe/wsdl/NfeAutorizacao';
        
        $urlPortal = 'http://www.portalfiscal.inf.br/nfe';

        sprintf("%s/wsdl/%s", $urlPortal, $urlNamespace);
        
        //montagem dos dados da mensagem SOAP

        $cons = '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
            . "<enviNFe xmlns=$urlPortal versao=$version>" . "\n"
            . "<idLote>$idLote</idLote>" . "\n"
            . "$xml" . "\n"
            . "</enviNFe>";

        //Soap-Client
        $oSoap = new ClientFactory(SoapClient::class);
        $wsdl = 'https://nfe-homologacao.svrs.rs.gov.br/ws/NfeAutorizacao/NFeAutorizacao.asmx';
        $soapOptions = [
            'cache_wsdl' => WSDL_CACHE_NONE
        ];
        
        print_r('');
        /**/
    }

    public static function geraLote()
    {
        
    }
}