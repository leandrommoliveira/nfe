<?php namespace PhpNFe\Builder\Total;

/**
 * Grupo Totais da NF-e.
 * O grupo de valores totais da NF-e deve ser informado com o
 * somatório do campo correspondente dos itens.
 * Class TotalNfe
 * @package PhpNFe\Builder
 */
class TotalNfe extends \PhpNFe\Builder\Builder
{
    /**
     * Grupo Totais referentes ao ICMS
     * @var ICMSTotNfe
     */
    public $ICMSTot;
    
    /**
     * Grupo Totais referentes ao ISSQN.
     * @var ISSQNtotNfe
     */
    public $ISSQNtot;

    /**
     * Grupo Retenções de Tributos.
     * @var RetTribNfe
     */
    public $retTrib;

    /**
     * TotalNfe constructor.
     */
    public function __construct()
    {
        $this->ICMSTot = new ICMSTotNfe();
        $this->ISSQNtot = new \PhpNFe\Builder\PropriedadeNull('\PhpNFe\Builder\Total\ISSQNtotNfe');
        $this->retTrib = new \PhpNFe\Builder\PropriedadeNull('\PhpNFe\Builder\Total\RetTribNfe');
    }
}