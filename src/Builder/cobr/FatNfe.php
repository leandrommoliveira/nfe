<?php namespace PhpNFe\Builder\Cobr;

/**
 * Grupo Fatura.
 * Class FatNfe.
 */
class FatNfe extends \PhpNFe\Builder\Builder
{
    /**
     * Número da Fatura.
     * @var string|null
     */
    public $nFat = null;

    /**
     * Valor Original da Fatura.
     * @var float|null
     * @dec 2
     */
    public $vOrig = null;

    /**
     * Valor do desconto.
     * @var float|null
     * @dec 2
     */
    public $vDesc = null;

    /**
     * Valor Líquido da Fatura.
     * @var float|null
     * @dec 2
     */
    public $vLiq = null;
}