<?php namespace PhpNFe;

use DOMDocument;

class Validar
{
    const versaoSchema = 'PL_008i2';

    /**
     * Valida um xml assinado.
     *
     * @param $xml
     * @param $tag
     * @return array|bool
     */
    public static function validar($xml, $tag)
    {
        //Para poder pegar os erros caso houver
        libxml_use_internal_errors(true);
        libxml_clear_errors();

        if(is_file($xml)) {
            $xml = file_get_contents($xml);
        }
        
        $dom = new DOMDocument('1.0', 'utf-8');

        $dom->loadXML($xml, LIBXML_NOBLANKS | LIBXML_NOEMPTYTAG);

        $node = $dom->getElementsByTagName($tag)->item(0);

        $versao = $node->getAttribute('versao');

        $xsdFile = '/nfe_v' .  $versao . '.xsd';
        $xsdPath = __DIR__ . '/schemes/' . self::versaoSchema . $xsdFile;

        if (! $dom->schemaValidate($xsdPath)) {
            $errors = libxml_get_errors();
            $returnErrors = [];
            foreach ($errors as $error) {
                $returnErrors[] = $error->message . 'at line ' . $error->line;
            }

            return $returnErrors;
        }
        
        return true;
    }
}