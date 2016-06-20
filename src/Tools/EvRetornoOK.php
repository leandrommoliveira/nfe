<?php namespace PhpNFe;


class EvRetornoOK
{
    /**
     * @var
     */
    protected $chave;

    /**
     * @var
     */
    protected $xml;

    public function __construct($chave, $xml)
    {
        $this->chave = $chave;
        $this->xml = $xml;
    }

    /**
     * @return string
     */
    public function getChave()
    {
        return $this->chave;
    }

    /**
     * @return string
     */
    public function getXml()
    {
        return $this->xml;
    }
}