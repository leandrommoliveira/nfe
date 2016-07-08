<?php namespace PhpNFe\Builder\Cobr;

class DupNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Número da Duplicata.
     * @var string|null
     */
    public $nDup = null;

    /**
     * Data de vencimento.
     * @var string|null
     */
    public $dVenc = null;

    /**
     * Valor da duplicata.
     * @var float
     * @dec 2
     */
    public $vDup = 0.00;
}