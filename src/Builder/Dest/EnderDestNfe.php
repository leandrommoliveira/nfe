<?php namespace PhpNFe\NFe\Builder\Dest;

class EnderDestNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Logradouro.
     * @var string
     */
    public $xLgr = '';

    /**
     * Número.
     * @var string
     */
    public $nro = '';

    /**
     * Complemento.
     * @var string|null
     */
    public $xCpl = null;

    /**
     * Bairro.
     * @var string
     */
    public $xBairro = '';

    /**
     * Utilizar a Tabela do IBGE (Anexo IX - Tabela de UF, Município e
     * País).
     * Informar ‘9999999 ‘para operações com o exterior.
     * @var string
     */
    public $cMun = '';

    /**
     * Informar ‘EXTERIOR ‘para operações com o exterior.
     * @var string
     */
    public $xMun = '';

    /**
     * Sigla da UF.
     * @var string
     */
    public $UF = '';

    /**
     * Código do CEP.
     * Informar os zeros não significativos.
     * @var string|null
     */
    public $CEP = null;

    /**
     * Utilizar a Tabela do BACEN (Anexo IX - Tabela de UF,
     * Município e País).
     * @var string|null
     */
    public $cPais = null;

    /**
     * Nome do País.
     * @var string|null
     */
    public $xPais = null;

    /**
     * Preencher com o Código DDD + número do telefone. Nas
     * operações com exterior é permitido informar o código do país +
     * código da localidade + número do telefone (v2.0).
     * @var string|null
     */
    public $fone = null;
}