<?php namespace PhpNFe;


class EvRetornoErro
{
    /**
     * Código do erro.
     * @var
     */
    protected $codigo;

    /**
     * Motivo do Erro.
     * @var
     */
    protected $motivo;

    /**
     * @var
     */
    protected $chave;
    
    public function __construct($codigo, $motivo, $chave)
    {
        $this->codigo = $codigo;
        $this->chave = $chave;
        $this->motivo = $motivo;
    }
}