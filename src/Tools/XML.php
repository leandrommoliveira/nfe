<?php namespace PhpNFe\Tools;

class XML extends \DOMDocument
{
    /**
     * @param $xml
     * @return XML
     */
    public static function createByXml($xml)
    {
        $instance = new static('1.0', 'utf-8');
        $instance->loadXML($xml, LIBXML_NOBLANKS | LIBXML_NOEMPTYTAG);

        return $instance;
    }
}