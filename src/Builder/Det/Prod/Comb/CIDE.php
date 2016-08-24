<?php namespace PhpNFe\NFe\Builder\Det\Prod\Comb;

use PhpNFe\Tools\Builder\Builder;

/**
 * Informações da CIDE.
 * Grupo de informações da CIDE.
 * Class CIDE.
 */
class CIDE extends Builder
{
    /**
     * BC da CIDE
     * Informar a BC da CIDE em quantidade.
     * @var string
     */
    public $qBCProd = '';

    /**
     * Valor da alíquota da CIDE.
     * Informar o valor da alíquota em reais da CIDE.
     * @var float
     */
    public $vAliqProd = 0.00;

    /**
     * Valor da CIDE.
     * Informar o valor da CIDE.
     * @var float
     */
    public $vCIDE = 0.00;
}