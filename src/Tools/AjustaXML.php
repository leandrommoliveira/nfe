<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvedor1
 * Date: 14/06/2016
 * Time: 14:29
 */

namespace PhpNFe\Tools;


class AjustaXML
{
    public static function limpaXml($xml)
    {
        return preg_replace("/<\?xml.*\?>/", "", $xml);
    }
}