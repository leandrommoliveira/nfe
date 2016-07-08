<?php namespace PhpNFe\NFe\Builder\Cobr;

use PhpNFe\Builder\Cobr\FatNfe;

/**
 * Grupo Cobrança.
 * Class CobrNfe.
 */
class CobrNfe extends \PhpNFe\Tools\Builder\Builder
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
        $this->fat = new \PhpNFe\Tools\Builder\PropriedadeNull('\PhpNFe\Builder\Cobr\FatNfe');
        $this->dup = [];
    }
}