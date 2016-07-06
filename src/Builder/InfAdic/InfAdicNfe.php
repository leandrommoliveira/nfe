<?php namespace PhpNFe\Builder\InfAdic;

class InfAdicNfe extends \PhpNFe\Builder\Builder
{
    /**
     * Informações Adicionais de Interesse do
     * Fisco.
     * @var string|null
     */
    public $infAdFisco = null;

    /**
     * Informações Complementares de interesse
     * do Contribuinte.
     * @var string|null
     */
    public $infCpl = null;

    /**
     * Grupo Campo de uso livre do contribuinte
     * Campo de uso livre do contribuinte, Informar o nome do campo
     * no atributo xCampo e o conteúdo do campo no xTexto.
     * @var ObsContNfe
     */
    public $obsCont;

    /**
     * Grupo Campo de uso livre do Fisco.
     * @var ObsFiscoNfe
     */
    public $obsFisco;

    /**
     * Grupo Processo referenciado.
     * @var ProcRefNfe
     */
    public $procRef;

    public function __construct()
    {
        $this->obsCont = new \PhpNFe\Builder\PropriedadeNull('\PhpNFe\Builder\InfAdic\ObsContNfe');
        $this->obsFisco = new \PhpNFe\Builder\PropriedadeNull('\PhpNFe\Builder\InfAdic\ObsFiscoNfe');
        $this->procRef = new \PhpNFe\Builder\PropriedadeNull('\PhpNFe\Builder\InfAdic\ProcRefNfe');
    }
}