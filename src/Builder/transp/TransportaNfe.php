<?php namespace PhpNFe\Builder\Transp;

/**
 * Grupo Transportador.
 * Class TransportaNfe
 * @package PhpNFe\Builder
 */
class TransportaNfe extends \PhpNFe\Builder\Builder
{
    /**
     * CNPJ do Transportador.
     * @var string|null
     */
    public $CNPJ = null;

    /**
     * CPF do Transportador.
     * @var string|null
     */
    public $CPF = null;

    /**
     * Razão Social ou nome.
     * @var string|null
     */
    public $xNome = null;

    /**
     * Inscrição Estadual do Transportador.]
     * nformar:
     * - Inscrição Estadual do transportador contribuinte do ICMS, sem
     * caracteres de formatação (ponto, barra, hífen, etc.);
     * - Literal “ISENTO” para transportador isento de inscrição no
     * cadastro de contribuintes ICMS;
     * - Não informar a tag para não contribuinte do ICMS,
     * A UF deve ser informada se informado uma IE. (v2.0)
     * @var string|null
     */
    public $IE = null;

    /**
     * Endereço Completo.
     * @var string|null
     */
    public $xEnder = null;

    /**
     * Nome do município;
     * @var string|null
     */
    public $xMun = null;

    /**
     * Sigla da UF.
     * @var string|null
     */
    public $UF = null;
}