<?php namespace PhpNFe\Builder\Det\Imposto\IPI;

class IPITribNfe extends \PhpNFe\Builder\Builder
{
    /**
     * @var
     */
    public $CST;

    /**
     * Valor da BC do IPI.
     * @var float
     * @dec 2
     */
    public $vBC = 0.00;

    /**
     * Alíquota do IPI.
     * @var float
     * @dec 4
     */
    public $pIPI = 0.00;

    /**
     * Quantidade total na unidade padrão para
     * tributação (somente para os produtos
     * tributados por unidade)
     * 4 por unidade.
     * @var float
     * @dec 4
     */
    public $qUnid = 0.00;

    /**
     * Valor por Unidade Tributável.
     * @var float
     * @dec 4
     */
    public $vUnid = 0.00;

    /**
     * Valor do IPI.
     * @var float
     * @dec 2
     */
    public $vIPI = 0.00;
}