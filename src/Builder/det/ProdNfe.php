<?php namespace PhpNFe\Builder\Det;

/**
 * Detalhamento de Produtos e Serviços.
 * Class ProdNfe
 * @package PhpNFe\Builder
 */
class ProdNfe extends \PhpNFe\Builder\Builder
{
    /**
     * Código do produto ou serviço.
     * @var string
     */
    public $cProd = '';

    /**
     * GTIN (Global Trade Item Number) do
     * produto, antigo código EAN ou código de
     * barras.
     * @var string
     */
    public $cEAN = '';

    /**
     * Descrição do produto ou serviço.
     * @var string
     */
    public $xProd = '';

    /**
     * Código NCM com 8 dígitos.
     * Obrigatória informação do NCM completo (8 dígitos).
     * Nota: Em caso de item de serviço ou item que não tenham
     * produto (ex. transferência de crédito, crédito do ativo
     * imobilizado, etc.), informar o valor 00 (dois zeros). (NT
     * 2014/004)
     * @var string
     */
    public $NCM = '';

    /**
     * Codificação NVE - Nomenclatura de Valor
     * Aduaneiro e Estatística.
     * Codificação opcional que detalha alguns NCM.
     * Formato: duas letras maiúsculas e 4 algarismos. Se a
     * mercadoria se enquadrar em mais de uma codificação, informar
     * até 8 codificações principais.
     * Vide: Anexo XII.03 - Identificador NVE
     * @var string|null
     */
    public $NVE = null;

    /**
     * EX_TIPI.
     * Preencher de acordo com o código EX da TIPI. Em caso de
     * serviço, não incluir a TAG.
     * @var string|null
     */
    public $EXTIPI = null;

    /**
     * Código Fiscal de Operações e Prestações.
     * Utilizar Tabela de CFOP.
     * @var string
     */
    public $CFOP = '';

    /**
     * Unidade Comercial.
     * Informar a unidade de comercialização do produto.
     * @var string
     */
    public $uCom = '';

    /**
     * Quantidade Comercial.
     * Informar a quantidade de comercialização do produto (v2.0).
     * @var float
     * @dec 4
     */
    public $qCom = 0.00;

    /**
     * Valor Unitário de Comercialização.
     * Informar o valor unitário de comercialização do produto, campo
     * meramente informativo, o contribuinte pode utilizar a precisão
     * desejada (0-10 decimais). Para efeitos de cálculo, o valor
     * unitário será obtido pela divisão do valor do produto pela
     * quantidade comercial. (v2.0).
     * @var float
     * @dec 10
     */
    public $vUnCom = 0.00;

    /**
     * Valor Total Bruto dos Produtos ou Serviços.
     * @var float
     * @dec 2
     */
    public $vProd = 0.00;

    /**
     * GTIN (Global Trade Item Number) da
     * unidade tributável, antigo código EAN ou
     * código de barras.
     * Preencher com o código GTIN-8, GTIN-12, GTIN-13 ou GTIN-
     * 14 (antigos códigos EAN, UPC e DUN-14) da unidade tributável
     * do produto, não informar o conteúdo da TAG em caso de o
     * produto não possuir este código.
     * @var string
     */
    public $cEANTrib = '';

    /**
     * Unidade Tributável.
     * @var string
     */
    public $uTrib = '';

    /**
     * Quantidade Tributável.
     * Informar a quantidade de tributação do produto (v2.0).
     * @var float
     * @dec 4
     */
    public $qTrib = 0.00;

    /**
     * Valor Unitário de tributação.
     * Informar o valor unitário de tributação do produto, campo
     * meramente informativo, o contribuinte pode utilizar a precisão
     * desejada (0-10 decimais). Para efeitos de cálculo, o valor
     * unitário será obtido pela divisão do valor do produto pela
     * quantidade tributável (NT 2013/003).
     * @var float
     * @dec 10
     */
    public $vUnTrib = 0.00;

    /**
     * Valor Total do Frete.
     * @var float|null
     * @dec 2
     */
    public $vFrete = null;

    /**
     * Valor Total do Seguro.
     * @var float|null
     * @dec 2
     */
    public $vSeg = null;

    /**
     * Valor do Desconto.
     * @var float|null
     * @dec 2
     */
    public $vDesc = null;

    /**
     * Outras despesas acessórias.
     * (v2.0)
     * @var float|null
     * @dec 2
     */
    public $vOutro = null;

    /**
     * Indica se valor do Item (vProd) entra no
     * valor total da NF-e (vProd).
     * 0=Valor do item (vProd) não compõe o valor total da NF-e
     * 1=Valor do item (vProd) compõe o valor total da NF-e (vProd)
     * (v2.0)
     * @var string
     */
    public $indTot = '';
}