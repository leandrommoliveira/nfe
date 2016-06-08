<?php namespace PhpNFe\Tools;

class NFEBody
{
    /**
     * @var string
     */
    protected $urlPortal = '';

    /**
     * @var string
     */
    protected $versao = '';

    /**
     * @var string
     */
    protected $idLote = '';

    /**
     * @var string
     */
    protected $idSinc = '';

    /**
     * @var string
     */
    protected $xml = '';

    public function __construct($urlPortal, $versao, $idLote, $idSinc, $xml)
    {
        $this->urlPortal = $urlPortal;
        $this->versao = $versao;
        $this->idLote = $idLote;
        $this->idSinc = $idSinc;
        $this->xml = $xml;
    }

    public static function loadDOM(\DOMDocument $xml)
    {
        // Pegar versão
        $node = $xml->getElementsByTagName('infNFe')->item(0);
        $versao = $node->getAttribute('versao');

        //Pegar urlPortal
        $node = $xml->getElementsByTagName('NFe')->item(0);
        $urlPortal = $node->getAttribute('xmlns');

        $idLote = substr(str_replace(',', '', number_format(microtime(true) * 1000000, 0)), 0, 15);

        $xml = $xml->saveXML();

        return new self($urlPortal, $versao, $idLote, '', $xml);
    }

    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/nfeDadosMsg.xml');
        $xml = str_replace('{{urlportal}}', $this->urlPortal, $xml);
        $xml = str_replace('{{versao}}', $this->versao, $xml);
        $xml = str_replace('{{idlote}}', $this->idLote, $xml);
        $xml = str_replace('{{idSinc}}', $this->idSinc, $xml);
        $xml = str_replace('{{xml}}', $this->xml, $xml);

        return $xml;
    }
}