<?php namespace PhpNFe\Builder;

use phpDocumentor\Reflection\DocBlockFactory;

abstract class Builder
{
    protected function geraXmlPropriedades()
    {
        $xml = '';

        $props = get_object_vars($this);
        foreach ($props as $key => $value) {
            $xml .= $this->geraXmlPropriedade($key, $value);
        }

        return $xml;
    }

    protected function geraXmlPropriedade($nome, $valor)
    {
        // Se for array, trocar por Coleções.
        if (is_array($valor)) {
            if (count($valor) == 0) {
                return '';
            }

            $valor = new Colecoes($valor, get_class($valor[0]));
        }

        // Se for Colecoes
        if ($valor instanceof Colecoes) {
            $xml = '';
            $attrIndex = $valor->getAttrIndex();
            foreach ($valor->getItems() as $i => $item) {
                if ($item instanceof Builder) {
                    $attr = ($attrIndex != '') ? sprintf(' %s="%s"', $attrIndex, ($i + 1)) : '';

                    $xml .= sprintf('<%s%s>', $nome, $attr);
                    $xml .= $item->geraXmlPropriedades();
                    $xml .= sprintf('</%s>', $nome);
                }
            }

            return $xml;
        }

        // Se for PropriedadeNull
        if ($valor instanceof PropriedadeNull) {
            $valor = $valor->getObject();
        }

        // Se for Builder
        if ($valor instanceof Builder) {

            $xml = sprintf('<%s>', $nome);
            $xml .= $valor->geraXmlPropriedades();
            $xml .= sprintf('</%s>', $nome);

            return $xml;
        }

        // igonorar outros objetos, não Builder
        if (is_object($valor)) {
            return '';
        }

        // Ignorar campos nulos
        if (is_null($valor)) {
            return '';
        }

        if (is_float($valor)) {
            $valor = $this->formatar($nome, $valor);
        }

        return sprintf('<%s>%s</%s>', $nome, $valor, $nome);
    }

    /**
     * Formatar float para o número de casas decimais correto
     * @param $nome
     * @param $valor
     * @return string
     */
    protected function formatar($nome, $valor)
    {
        $ref = new \ReflectionProperty(get_class($this), $nome);
        $factory = DocBlockFactory::createInstance();
        $info = $factory->create($ref->getDocComment());

        if (count($info->getTagsByName('dec')) == 0) {
            return $valor;
        }

        // Valor do @dec
        $dec = $info->getTagsByName('dec')[0]->getDescription()->render();

        return number_format($valor, $dec, '.', '0');
    }

    protected function objEhVazio($valor)
    {
        if (is_object($valor)) {
            return $this->verificaObj($valor);
        } else {
            return true;
        }
    }

    protected function verificaObj($valor)
    {
        foreach ($valor as $val) {
            if (!is_null($val)) {
                if (is_object($val)) {
                    if (property_exists($val, $val->__obj)) {
                        if ($val->__obj != null) {
                            return false;
                        }
                    } else {
                        return $this->verificaObj($val);
                    }
                } else {
                    return true;
                }
            }
        }

        return true;
    }

}