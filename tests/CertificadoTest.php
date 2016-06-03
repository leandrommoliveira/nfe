<?php

use Carbon\Carbon;

class CertificadoTeste extends TestCase
{
    public function testCertificado()
    {
        $pubKey = file_get_contents(__DIR__ . '/utils/pub.key');
        $priKey = file_get_contents(__DIR__ . '/utils/pri.key');
        $certKey = $priKey . "\r\n" . $pubKey;

        // Instanciando, carregando e verificando os dados do certificado
        $cert = new \PhpNFe\Certificado();
        $cert->carregarPfx(__DIR__ . '/utils/certificado_teste.pfx', '123456');

        $this->assertEquals($cert->getChavePub(), $pubKey);
        $this->assertEquals($cert->getChavePri(), $priKey);
        $this->assertEquals($cert->getValidade()->format('Y-m-d H:i:s'), '2016-07-03 11:32:33');

        if (Carbon::now() > Carbon::create(2016, 07, 03, 11, 32, 33)) {
            $this->assertFalse($cert->ehValido());
        } else {
            $this->assertTrue($cert->ehValido());
        }

        $this->assertEquals($cert->getCertificado(), $certKey);

        // Salvando o certificado e verificando se salvou
        $certTeste = __DIR__ . '/utils/certificado_teste.xml';
        $cert->salvarArquivo($certTeste);
        $this->assertFileExists($certTeste);

        // Instanciando de novo o certificado, carregando o certificado salvo anteriormente
        // e verificando os dados do certificado
        $cert = new \PhpNFe\Certificado();
        $cert->carregarArquivo($certTeste);

        $this->assertEquals($cert->getChavePub(), $pubKey);
        $this->assertEquals($cert->getChavePri(), $priKey);
        $this->assertEquals($cert->getValidade()->format('Y-m-d H:i:s'), '2016-07-03 11:32:33');
        
        if (Carbon::now() > Carbon::create(2016, 07, 03, 11, 32, 33)) {
            $this->assertFalse($cert->ehValido());
        } else {
            $this->assertTrue($cert->ehValido());
        }
        
        $this->assertEquals($cert->getCertificado(), $certKey);

        //Excluindo o arquivo salvo
        unlink($certTeste);
    }

}