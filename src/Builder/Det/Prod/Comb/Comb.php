<?php namespace PhpNFe\NFe\Builder\Det\Prod\Comb;

use PhpNFe\Tools\Builder\Builder;
use PhpNFe\Tools\Builder\PropriedadeNull;

/**
 * Informações específicas para combustíveis
 * líquidos e lubrificantes.
 * Informar apenas para operações com combustíveis líquidos e
 * lubrificantes.
 * Class Comb.
 */
class Comb extends Builder
{
    /**
     * Código de produto da ANP.,
     * Utilizar a codificação de produtos do Sistema de Informações de
     * Movimentação de Produtos - SIMP
     * (http://www.anp.gov.br/simp/). (NT 2012/003).
     * @var string
     */
    public $cProdANP = '';

    /**
     * Percentual de Gás Natural para o produto
     * GLP (cProdANP=210203001);
     * O campo é opcional, portanto no caso não haver mistura o
     * campo de percentual não deve ser informado.
     * @var string|null
     */
    public $pMixGN = null;

    /**
     * Código de autorização / registro do CODIF
     * Informar apenas quando a UF utilizar o CODIF (Sistema de
     * Controle do Diferimento do Imposto nas Operações com AEAC -
     * Álcool Etílico Anidro Combustível).
     * @var string|null
     */
    public $CODIF = null;

    /**
     * Quantidade de combustível faturada à
     * temperatura ambiente.
     * Informar quando a quantidade faturada informada no campo
     * "prod/qCom" (id:I10) tiver sido ajustada para uma temperatura
     * diferente da ambiente.
     * @var string|null
     */
    public $qTemp = null;

    /**
     * Sigla da UF de consumo.
     * Informar a UF de consumo. Informar "EX" para Exterior.
     * @var string
     */
    public $UFCons = '';

    /**
     * Informações da CIDE
     * Grupo de informações da CIDE.
     * @var CIDE|null
     */
    public $CIDE;

    /**
     * Comb constructor.
     */
    public function __construct()
    {
        $this->CIDE = new PropriedadeNull('\PhpNFe\NFe\Builder\Det\Prod\Comb\CIDE');
    }
}