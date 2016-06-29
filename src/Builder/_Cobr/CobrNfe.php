<?php namespace PhpNFe\Builder\Cobr;

/**
 * Grupo Cobrança.
 * Class CobrNfe.
 */
class CobrNfe extends \PhpNFe\Builder\Builder
{
    /**
     * Grupo Fatura.
     * @var FatNfe
     */
    public $fat;

    /**
     * Grupo Duplicata.
     * @var array
     */
    public $dup = [];

    /**
     * CobrNfe constructor.
     */
    public function __construct()
    {
        $this->fat = new \PhpNFe\Builder\PropriedadeNull('\PhpNFe\Builder\Cobr\FatNfe');
        $this->dup = [];
    }
}