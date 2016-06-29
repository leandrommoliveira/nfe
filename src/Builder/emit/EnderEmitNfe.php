<?php namespace PhpNFe\Builder\Emit;

class EnderEmitNfe extends \PhpNFe\Builder\Builder
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
     * Código do município.
     * Utilizar a Tabela do IBGE (Anexo IX- Tabela de UF, Município e
     * País).
     * @var string
     */
    public $cMun = '';

    /**
     * Nome do município.
     * @var string
     */
    public $xMun = '';

    /**
     * Sigla da UF.
     * @var string
     */
    public $UF = '';

    /**
     * Código do CEP
     * Informar os zeros não significativos. (NT 2011/004).
     * @var string
     */
    public $CEP = '';

    /**
     * Código do País.
     * 1058=Brasil.
     * @var string|null
     */
    public $cPais = null;

    /**
     * Nome do País.
     * Brasil ou BRASIL.
     * @var string|null
     */
    public $xPais = null;

    /**
     * Telefone.
     * Preencher com o Código DDD + número do telefone. Nas
     * operações com exterior é permitido informar o código do país +
     * código da localidade + número do telefone (v2.0).
     * @var string|null
     */
    public $fone = null;

}