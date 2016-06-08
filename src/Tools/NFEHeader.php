<?php namespace PhpNFe\Tools;

class NFEHeader
{
    /**
     * @var string
     */
    protected $cUF = '';

    /**
     * @var string
     */
    protected $versaoDados = '';

    public function __construct($cuf, $versaoDados)
    {
        $this->cUF = $cuf;
        $this->versaoDados = $versaoDados;
    }

    /**
     * @param \DOMDocument $xml
     * @return NFEHeader
     */
    public static function loadDOM(\DOMDocument $xml)
    {
        // Pegar versão
        $node = $xml->getElementsByTagName('infNFe')->item(0);
        $versaoDados = $node->getAttribute('versao');

        // Pegar o estado
        $node = $xml->getElementsByTagName('cUF')->item(0);
        $uf = $node->nodeValue;

        return new NFEHeader($uf, $versaoDados);
    }

    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/nfeCabecMsg.xml');
        $xml = str_replace('{{cUF}}', $this->cUF, $xml);
        $xml = str_replace('{{versaoDados}}', $this->versaoDados, $xml);

        return $xml;
    }
}