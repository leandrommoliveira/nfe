<?php namespace PhpNFe;

use DOMDocument;

class Validar
{
    /**
     * validar.
     * Valida um xml assinado.
     * 
     * @param $xml
     * @param $tag
     * @return array|bool
     */
    public function validar($xml, $tag)
    {
        //Para poder pegar os erros caso houver
        libxml_use_internal_errors(true);
        libxml_clear_errors();

        $xml = file_get_contents($xml);
        $dom = new DOMDocument('1.0', 'utf-8');

        $dom->loadXML($xml, LIBXML_NOBLANKS | LIBXML_NOEMPTYTAG);

        $node = $dom->getElementsByTagName($tag)->item(0);

        $versao = $node->getAttribute('versao');

        $xsdFile = '/nfe_v' .  $versao . '.xsd';
        $xsdPath = __DIR__ . '/schemes/PL_008i2' . $xsdFile;

        if(! $dom->schemaValidate($xsdPath)) {
            $errors = libxml_get_errors();
            $returnErrors = [];
            foreach ($errors as $error) {
                $returnErrors[] = $error->message;
            }
            return $returnErrors;
        }
        else {
            return true;
        }
    }
}