<?php namespace PhpNFe;

use Carbon\Carbon;
use Mockery\CountValidator\Exception;
use PhpNFe\Tools\Asn;
use PhpNFe\Tools\Dom;
use PhpNFe\Tools\Pkcs12;

class Certificado
{
    const Publico = 'publico';
    const Privado = 'privado';
    const Certificado = 'certificado';

    /**
     * Chave Pública.
     * @var null
     */
    protected $chavePub = null;

    /**
     * Chave Privada.
     * @var string
     */
    protected $chavePri = '';

    /**
     * carregarArquivo.
     * Carrega um arquivo já com as propriedades do certificado.
     *
     * @param $arquivo
     * @return bool
     */
    public function carregarArquivo($arquivo)
    {
        //Lendo o arquivo xml
        $content = simplexml_load_file($arquivo);

        //Carregando as propriedades
        $this->chavePri = trim($content->chave_pri);
        $this->chavePub = trim($content->chave_pub);

        return true;
    }

    /**
     * carregarPfx.
     * Carrega um arquivo .pfx para pegar as propriedades do certificado.
     *
     * @param $pfx
     * @param $senha
     * @throws Exception
     */
    public function carregarPfx($pfx, $senha)
    {
        $pfxContent = file_get_contents($pfx);
        $data = [];

        if (! openssl_pkcs12_read($pfxContent, $data, $senha)) {
            throw new Exception('O certificado não pôde ser lido! Senha incorreta, arquivo corrompido ou formato inválido!');
        }

        //Carregando propriedades
        $this->chavePub = trim($data['cert']);
        $this->chavePri = trim($data['pkey']);
    }

    /**
     * salvarArquivo.
     * Salva um arquivo com as propriedades do certificado.
     *
     * @param $arquivo
     * @return bool
     */
    public function salvarArquivo($arquivo)
    {
        // Verificando se a chave pública está nula
        $this->verificaChaveNula();

        $xml = file_get_contents(__DIR__ . '/Templates/certificado.xml');
        $xml = str_replace('{{chave_pub}}', $this->chavePub, $xml);
        $xml = str_replace('{{chave_pri}}', $this->chavePri, $xml);

        file_put_contents($arquivo, $xml);

        return true;
    }

    /**
     * getCNPJ.
     * Retorna o CNPJ do certificado.
     *
     * @return string
     */
    public function getCNPJ()
    {
        $this->verificaChaveNula();

        return Asn::getCNPJCert($this->chavePub);
    }

    /**
     * ehValido.
     * Verifica se o certificado não está com a data de validade vencida.
     *
     * @return bool
     */
    public function ehValido()
    {
        return $this->getValidade() > Carbon::now();
    }

    /**
     * getValidade.
     * Retorna a data e hora da validade do certificado.
     *
     * @return Carbon
     */
    public function getValidade()
    {
        $this->verificaChaveNula();

        $data = openssl_x509_read($this->chavePub);
        $certData = openssl_x509_parse($data);

        return Carbon::createFromFormat('ymdHis', str_replace('Z', '', $certData['validTo']));
    }

    /**
     * verificaChaveNula..
     * Verifica se a chave pública está nula, caso estiver retorna um erro.
     *
     * @throws \Exception
     * @return bool
     */
    protected function verificaChaveNula()
    {
        if (is_null($this->chavePub)) {
            throw new \Exception('Chave pública nula! Primeiro você deve usar os métodos carregarArquivo ou carregarPfx!');
        }

        return true;
    }

    /**
     * getChavePub.
     * Retorna a chave pública.
     *
     * @return string
     */
    public function getChavePub()
    {
        return $this->chavePub;
    }

    /**
     * getChavePri.
     * Retorna a chave pública.
     *
     * @return string
     */
    public function getChavePri()
    {
        return $this->chavePri;
    }

    /**
     * getCertificado.
     * Retorna a chave do certificado (Chave Pública + Chave Privada).
     *
     * @return string
     */
    public function getCertificado()
    {
        return trim($this->chavePri) . "\r\n" . trim($this->chavePub);
    }

    /**
     * salvaChave.
     * Salva a chave especificada no arquivo passado por parâmetro.
     *
     * @param $arquivo
     * @param string $chave
     */
    public function salvaChave($arquivo, $chave)
    {
        switch ($chave){
            case self::Publico:
                file_put_contents($arquivo, $this->chavePub);
                break;
            case self::Privado:
                file_put_contents($arquivo, $this->chavePri);
                break;
            case self::Certificado:
                file_put_contents($arquivo, $this->getCertificado());
                break;
            default:
                throw new Exception("Tipo de chave invalida!\r\nOpcoes: publico, privado, certificado.");
        }
    }

    /**
     * assinarXml.
     * Assina o xml passado por parâmetro com a tag também passada por parâmetro.
     * 
     * @param $xml
     * @param $tag
     * @return string
     * @throws \Exception
     */
    public function assinarXML($xml, $tag)
    {
        $xml = file_get_contents($xml);
        $xmlDoc = new Dom();
        
        //Limpando o XML
        $order = array("\r\n", "\n", "\r", "\t");
        $xml = str_replace($order, '', $xml);

        $xmlDoc->loadXMLString($xml);
        $node = $xmlDoc->getElementsByTagName($tag)->item(0);
        
        //Raiz 
        $root = $xmlDoc->documentElement;

        $pkcs = new Pkcs12('', $this->getChavePub(), $this->getChavePri(), $this->getCertificado());
        
        //Assinando
        $objSSLPriKey = openssl_get_privatekey($this->chavePri);
        $sxml = $pkcs->zSignXML($xmlDoc, $root, $node, $objSSLPriKey);
        
        return $sxml;
    }
}