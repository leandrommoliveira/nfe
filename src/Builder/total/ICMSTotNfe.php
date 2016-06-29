<?php namespace PhpNFe\Builder\Total;

class ICMSTotNfe extends \PhpNFe\Builder\Builder
{
    /**
     * Base de Cálculo do ICMS.
     * @var float
     * @dec 2
     */
    public $vBC = 0.00;

    /**
     * Valor Total do ICMS.
     * @var float
     * @dec 2
     */
    public $vICMS = 0.00;

    /**
     * Valor Total do ICMS desonerado.
     * @var float
     * @dec 2
     */
    public $vICMSDeson = 0.00;

    /**
     * Base de Cálculo do ICMS ST.
     * @var float
     * @dec 2
     */
    public $vBCST = 0.00;

    /**
     * Valor Total do ICMS ST.
     * @var float
     * @dec 2
     */
    public $vST = 0.00;

    /**
     * Valor Total dos produtos e serviços.
     * @var float
     * @dec 2
     */
    public $vProd = 0.00;

    /**
     * Valor Total do Frete.
     * @var float
     * @dec 2
     */
    public $vFrete = 0.00;

    /**
     * Valor Total do Seguro.
     * @var float
     * @dec 2
     */
    public $vSeg = 0.00;

    /**
     * Valor Total do Desconto.
     * @var float
     * @dec 2
     */
    public $vDesc = 0.00;

    /**
     * Valor Total do II.
     * @var float
     * @dec 2
     */
    public $vII = 0.00;

    /**
     * Valor Total do IPI.
     * @var float
     * @dec 2
     */
    public $vIPI = 0.00;

    /**
     * Valor do PIS.
     * @var float
     * @dec 2
     */
    public $vPIS = 0.00;

    /**
     * Valor da COFINS.
     * @var float
     * @dec 2
     */
    public $vCOFINS = 0.00;

    /**
     * Outras Despesas acessórias.
     * @var float
     * @dec 2
     */
    public $vOutro = 0.00;

    /**
     * Valor Total da NF-e.
     * Vide validação para este campo na regra de validação W16-xx.
     * @var float
     * @dec 2
     */
    public $vNF = 0.00;

    /**
     * Valor aproximado total de tributos federais,
     * estaduais e municipais.
     * (NT 2013/003).
     * @var float|null
     * @dec 2
     */
    public $vTotTrib = null;
}