<?php namespace PhpNFe;

use DOMDocument;
use PhpNFe\Tools\AjustaXML;
use PhpNFe\Tools\AutorizaRetorno;
use PhpNFe\Tools\EvBody;
use PhpNFe\Tools\EvCancelaDados;
use PhpNFe\Tools\EvCCDados;
use PhpNFe\Tools\EventoRetorno;
use PhpNFe\Tools\InutHeader;
use PhpNFe\Tools\InutilizacaoRetorno;
use PhpNFe\Tools\MethodSefaz;
use PhpNFe\Tools\NFEBody;
use PhpNFe\Tools\NFEHeader;
use PhpNFe\Tools\NFeInutBody;
use PhpNFe\Tools\NFeInutDados;
use PhpNFe\Tools\NFeXML;
use PhpNFe\Tools\Sefaz;
use PhpNFe\Tools\Soap;
use Illuminate\Filesystem\Filesystem;
use PhpNFe\Tools\XML;

class NFe
{
    const version = 'NetForce EmiteNF-e Beta';

    /**
     * Classe de controle do certificado.
     * @var Certificado
     */
    protected $certificado;

    /**
     * @var Filesystem
     */
    protected $file;

    /**
     * NFe constructor.
     * @param Certificado $certificado
     */
    public function __construct(Certificado $certificado)
    {
        $this->certificado = $certificado;
        $this->file = new Filesystem();
    }

    /**
     * Envia um evento para o cancelamento da NFe.
     *
     * @param $xml
     * @param $justificativa
     * @param $seqEvento
     * @return EventoRetorno
     * @throws \Exception
     */
    public function cancela($xml, $justificativa, $seqEvento)
    {
        $xml = NFeXML::createByXml($xml);
        $method = Sefaz::getMethodInfo($xml->getAmbiente(), $xml->getCuf(), Sefaz::mtCancela);
        $mensagem = EvCancelaDados::loadDOM($xml, $justificativa, $seqEvento);
        $signedMsg = AjustaXML::limpaXml($this->certificado->assinarXML($mensagem, 'infEvento'));
        $header = NFEHeader::loadDOM($xml, $method->operation, $method->version, 'infEvento');
        $body = EvBody::loadDOM(XML::createByXml($signedMsg), $method->operation, 'enviNFe', 'infEvento');

        return new EventoRetorno($this->soap($method, $header, $body), NFeXML::createByXml($signedMsg));
    }

    /**
     * Envia um xml assinado e validado para a Receita Federal para
     * ser realizada a autorização.
     *
     * @param $xml
     * @throws \Exception
     * @return AutorizaRetorno
     */
    public function autorizar($xml)
    {
        $xml = NFeXML::createByXml($xml);
        $method = Sefaz::getMethodInfo($xml->getAmbiente(), $xml->getCuf(), Sefaz::mtAutoriza);
        $header = NFEHeader::loadDOM($xml, $method->operation, $method->version, 'infNFe');
        $body = NFEBody::loadDOM($xml, $method->operation, 'enviNFe', 'infNFe');

        // Executar o comando "nfeAutorizacaoLote"
        return new AutorizaRetorno($this->soap($method, $header, $body), $xml);
    }

    /**
     * Envia um evento para o carta de correção da NFe.
     *
     * @param $xml
     * @param $xCorrecao
     * @param $seqEvento
     * @return EventoRetorno
     * @throws \Exception
     */
    public function cartaCorrecao($xml, $xCorrecao, $seqEvento)
    {
        $xml = NFeXML::createByXml($xml);
        $method = Sefaz::getMethodInfo($xml->getAmbiente(), $xml->getCuf(), Sefaz::mtCartaCorrecao);
        $mensagem = EvCCDados::loadDOM($xml, $xCorrecao, $seqEvento);
        $signedMsg = AjustaXML::limpaXml($this->certificado->assinarXML($mensagem, 'infEvento'));
        $header = NFEHeader::loadDOM($xml, $method->operation, $method->version, 'infEvento');
        $body = EvBody::loadDOM(XML::createByXml($signedMsg), $method->operation, 'enviNFe', 'infEvento');

        return new EventoRetorno($this->soap($method, $header, $body), NFeXML::createByXml($signedMsg));
    }

    /**
     * Inutilizar uma faixa de numeração de nota fiscal.
     *
     * @param $sAno
     * @param $cnpj
     * @param $serie
     * @param $nIni
     * @param $nFin
     * @param $tpAmb
     * @param $cUF
     * @param $xJust
     * @return InutilizacaoRetorno
     * @throws \Exception
     */
    public function inutiliza($sAno, $cnpj, $serie, $nIni, $nFin, $tpAmb, $cUF, $xJust)
    {
        $method = Sefaz::getMethodInfo($tpAmb, $cUF, Sefaz::mtInutilizacao);
        $mensagem = NFeInutDados::loadDOM($sAno, $cnpj, $serie, $nIni, $nFin, $xJust, $method);
        $signedMsg = AjustaXML::limpaXml($this->certificado->assinarXML($mensagem, 'infInut'));
        $header = InutHeader::loadDOM($cUF, $method->version);
        $body = NFeInutBody::loadDOM(XML::createByXml($signedMsg));

        return new InutilizacaoRetorno($this->soap($method, $header, $body));
    }

    /**
     * Fazer requisição SOAP.
     *
     * @param MethodSefaz $method
     * @param $header
     * @param $body
     * @return DOMDocument
     * @throws \Exception
     */
    protected function soap(MethodSefaz $method, $header, $body)
    {
        $dir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid();
        try {
            // Criar diretorio temporario.
            $this->file->makeDirectory($dir);

            // Salvar certificados na pasta temp criada.
            $this->certificado->salvaChave($dir);

            $client = new Soap\CurlSoap($dir . '/pri.key', $dir . '/pub.key', $dir . '/cert.key');
            $resp = $client->send($method->url, $method->getNamespace(), $header, $body, $method->method);

            $xml = XML::createByXml($resp);

            $this->file->deleteDirectory($dir);

            return $xml;
        } catch (\Exception $e) {
            $this->file->deleteDirectory($dir);

            throw $e;
        }
    }
}