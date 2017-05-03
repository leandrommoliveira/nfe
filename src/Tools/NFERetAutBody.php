<?php namespace PhpNFe\NFe\Tools;

class NFERetAutBody
{
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

    public function __construct($xml = '')
    {
        $this->xml = $xml;
    }

    /**
     * @param \DOMDocument $xml
     * @param $metodo
     * @param $tag
     * @param $root
     * @param $opcaoXml
     * @return NFERetAutBody
     */
    public static function loadDOM(\DOMDocument $xml)
    {
        $xml = $xml->saveXML();

        return new self($xml);
    }

    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/nfeRetAutorizacao.xml');
        $xml = str_replace('{{xml}}', $this->xml, $xml);
        $xml = AjustaXML::limpaXml($xml);
        return $xml;
    }
}