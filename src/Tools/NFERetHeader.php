<?php namespace PhpNFe\NFe\Tools;

class NFERetHeader
{
    /**
     * @var string
     */
    protected $cUF = '';

    /**
     * @var string
     */
    protected $versaoDados = '';

    /**
     * @var string
     */
    protected $tag;

    /**
     * @var string
     */
    protected $metodo;

    public function __construct($cuf, $versaoDados, $metodo, $tag)
    {
        $this->cUF = $cuf;
        $this->versaoDados = $versaoDados;
        $this->metodo = $metodo;
        $this->tag = $tag;
    }

    /**
     * @param \DOMDocument $xml
     * @param string $metodo
     *
     * @return NFERetHeader
     */
    public static function loadDOM(\DOMDocument $xml, $metodo, $versao, $tag, $uf = '35')
    {
        return new self($uf, $versao, $metodo, $tag);
    }

    public function __toString()
    {
        $xml = file_get_contents(__DIR__ . '/../Templates/nfeCabecMsg.xml');
        $xml = str_replace('{{versaoDados}}', $this->versaoDados, $xml);
        $xml = str_replace('{{cUF}}', $this->cUF, $xml);
        $xml = str_replace('{{metodo}}', $this->metodo, $xml);

        return $xml;
    }
}