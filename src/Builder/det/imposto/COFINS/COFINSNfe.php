<?php namespace PhpNFe\Builder\Det\Imposto\COFINS;

/**
 * Grupo COFINS
 * Informar apenas um dos grupos S02, S03, S04 ou S04 com
 * base valor atribuído ao campo de CST da COFINS.
 * Class COFINSNfe
 * @package PhpNFe\Builder
 */
class COFINSNfe extends \PhpNFe\Builder\Builder
{
    /**
     * Grupo COFINS tributado pela alíquota.
     * @var COFINSAliqNfe
     */
    public $COFINSAliq;

    /**
     * Grupo de COFINS tributado por Qtde.
     * 03=Operação Tributável (base de cálculo = quantidade vendida
     * x alíquota por unidade de produto);
     * @var COFINSQtde
     */
    public $COFINSQtde;

    /**
     * Grupo COFINS não tributado.
     * @var COFINSNTNfe
     */
    public $COFINSNT;

    /**
     * Grupo COFINS Outras Operações.
     * @var COFINSOutrNfe
     */
    public $COFINSOutr;

    /**
     * COFINSNfe constructor.
     */
    public function __construct()
    {
        $this->COFINSAliq = new \PhpNFe\Builder\PropriedadeNull('\PhpNFe\Builder\Det\Imposto\COFINS\COFINSAliqNfe');
        $this->COFINSQtde = new \PhpNFe\Builder\PropriedadeNull('\PhpNFe\Builder\Det\Imposto\COFINS\COFINSQtde');
        $this->COFINSNT = new \PhpNFe\Builder\PropriedadeNull('\PhpNFe\Builder\Det\Imposto\COFINS\COFINSNTNfe');
        $this->COFINSOutr = new \PhpNFe\Builder\PropriedadeNull('\PhpNFe\Builder\Det\Imposto\COFINS\COFINSOutrNfe');
    }
}