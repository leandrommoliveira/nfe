<?php namespace PhpNFe\Tools;

class AjustaXML
{
    public static function limpaXml($xml)
    {
        return preg_replace("/<\?xml.*\?>/", '', $xml);
    }
}