<?php namespace PhpNFe\NFe\Builder\InfAdic;

class ProcRefNfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Identificador do processo ou ato
     * concessório.
     * @var string
     */
    public $nProc = '';

    /**
     * Indicador da origem do processo.
     * 0=SEFAZ;
     * 1=Justiça Federal;
     * 2=Justiça Estadual;
     * 3=Secex/RFB;
     * 9=Outros.
     * @var string
     */
    public $indProc = '';
}