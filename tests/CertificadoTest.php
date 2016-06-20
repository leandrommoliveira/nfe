<?php

use Carbon\Carbon;

class CertificadoTeste extends TestCase
{
    protected static $pubKey;
    protected static $priKey;
    protected static $certKey;
    protected static $certTeste;
    protected static $cert;

    public static function setUpBeforeClass()
    {
        self::$pubKey = file_get_contents(__DIR__ . '/utils/pub.key');
        self::$priKey = file_get_contents(__DIR__ . '/utils/pri.key');
        self::$certKey = self::$priKey . "\r\n" . self::$pubKey;
        self::$certTeste = __DIR__ . '/utils/certificado_teste.xml';

        self::$cert = new \PhpNFe\Certificado();
    }

    public function testCarregarPfx()
    {
        // Instanciando, carregando e verificando os dados do certificado
        self::$cert = new \PhpNFe\Certificado();
        self::$cert->carregarPfx(__DIR__ . '/utils/certificado_teste.pfx', '123456');

        $this->assertEquals(self::$cert->getChavePub(), self::$pubKey);
        $this->assertEquals(self::$cert->getChavePri(), self::$priKey);
        $this->assertEquals(self::$cert->getValidade()->format('Y-m-d H:i:s'), '2016-07-03 11:32:33');

        if (Carbon::now() > Carbon::create(2016, 07, 03, 11, 32, 33)) {
            $this->assertFalse(self::$cert->ehValido());
        } else {
            $this->assertTrue(self::$cert->ehValido());
        }

        $this->assertEquals(self::$cert->getCertificado(), self::$certKey);
    }

    public function testSalvarArquivo()
    {
        // Salvando o certificado e verificando se salvou
        self::$certTeste = __DIR__ . '/utils/certificado_teste.xml';
        self::$cert->salvarArquivo(self::$certTeste);
        $this->assertFileExists(self::$certTeste);
    }

    public function testCarregarArquivo()
    {
        self::$certTeste = __DIR__ . '/utils/certificado_teste.xml';

        // Instanciando de novo o certificado, carregando o certificado salvo anteriormente
        // e verificando os dados do certificado
        self::$cert = new \PhpNFe\Certificado();
        self::$cert->carregarArquivo(self::$certTeste);

        $this->assertEquals(self::$cert->getChavePub(), self::$pubKey);
        $this->assertEquals(self::$cert->getChavePri(), self::$priKey);
        self::assertEquals(self::$cert->getValidade()->format('Y-m-d H:i:s'), '2016-07-03 11:32:33');

        if (Carbon::now() > Carbon::create(2016, 07, 03, 11, 32, 33)) {
            $this->assertFalse(self::$cert->ehValido());
        } else {
            $this->assertTrue(self::$cert->ehValido());
        }

        $this->assertEquals(self::$cert->getCertificado(), self::$certKey);
    }

    public function testSalvaChave()
    {
        self::$cert = new \PhpNFe\Certificado();
        self::$cert->carregarArquivo(__DIR__ . '/utils/certificado_teste.xml');

        // Criando os caminhos dos arquivos para teste de chave
        $filePub = __DIR__ . '/testeChavePub';
        $filePri = __DIR__ . '/testeChavePri';
        $fileCert = __DIR__ . '/testeChaveCert';

        //Criando os arquivos com os caminhos criados anteriormente
        file_put_contents($filePub, '');
        file_put_contents($filePri, '');
        file_put_contents($fileCert, '');

        // Salvando as chaves nos arquivos criados
        self::$cert->salvaChave($filePub, 'publico');
        self::$cert->salvaChave($filePri, 'privado');
        self::$cert->salvaChave($fileCert, 'certificado');

        // Fazendo os assertsFileEquals comparando com arquivos de testes fixos
        $this->assertFileEquals($filePub, __DIR__ . '/utils/pub.key');
        $this->assertFileEquals($filePri, __DIR__ . '/utils/pri.key');
        // self::$assertFileEquals($fileCert, self::$certKey);
    }

    public function testAssinarXml()
    {
        /*
        // Carregando o certificado
        self::$cert = new \PhpNFe\Certificado();
        self::$cert->carregarArquivo(__DIR__ . '/utils/certificado_teste.xml');

        // Assinando o xml
        $signXml = self::$cert->assinarXML(file_get_contents(__DIR__ . '/utils/xmlTeste.xml'), 'infNFe');

        //$signXml = $this->ajustaXml($signXml);

        $signXml = trim(preg_replace('/\s\s+/', '', $signXml));

        // Xml assinado padrão de teste
        $signXmlTeste = file_get_contents(__DIR__ . '/utils/signXmlTeste.xml');

        $signXmlTeste = trim(preg_replace('/\s\s+/', '', $signXmlTeste));

        // Comparando os xmls
        $this->assertEquals($signXmlTeste, $signXml);*/
    }

    public static function tearDownAfterClass()
    {
        unlink(__DIR__ . '/testeChavePub');
        unlink(__DIR__ . '/testeChavePri');
        unlink(__DIR__ . '/testeChaveCert');
        unlink(__DIR__ . '/utils/certificado_teste.xml');
    }

    protected function ajustaXml($xml)
    {
        $xml = preg_replace('/\s+/', '', $xml);
        $xml = preg_replace('%<DigestValue>(.+)</DigestValue>%', '<DigestValue>yebOhQRK6svu1OL3UnYkRhNoMPE=</DigestValue>', $xml);
        $xml = preg_replace('%<SignatureValue>.+</SignatureValue>%', '<SignatureValue>TAF5k/p9JKSbdrz0sC9Ymac9RqB03QxahNrsbrl99vFrV9Aoo7ZM3mj4SCpFGumpkf4YDycQDyGC4NRKJQRzxRZW4oJDqs73ZT4nZpaw/NzdR1e7wOQI2rgnq7TZhulQWXpC2VzXJKRBLRtVN8iWZDtT7wH25VR+aT0/BcVXoIQ=</SignatureValue>', $xml);

        return $xml;
    }
}