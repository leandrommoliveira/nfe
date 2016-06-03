<?php namespace PhpNFe;

use Carbon\Carbon;
use Mockery\CountValidator\Exception;
use PhpNFe\Tools\Asn;

class Certificado
{
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
}