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

        //Criando os caminhos dos arquivos para teste de chave
        $filePub = __DIR__ . '/testeChavePub';
        $filePri = __DIR__ . '/testeChavePri';
        $fileCert = __DIR__ . '/testeChaveCert';

        file_put_contents($filePub, '');
        file_put_contents($filePri, '');
        file_put_contents($fileCert, '');

        $cert->salvaChave($filePub, 'publico');
        $cert->salvaChave($filePri, 'privado');
        $cert->salvaChave($fileCert, 'certificado');

        $this->assertFileEquals($filePub, __DIR__ . '/utils/pub.key');
        $this->assertFileEquals($filePri, __DIR__ . '/utils/pri.key');
        $this->assertFileEquals($fileCert, __DIR__ . '/utils/cert.key');

        //Excluindo os arquivos de teste
        unlink($filePub);
        unlink($filePri);
        unlink($certKey);
        unlink($certTeste);
    }
}