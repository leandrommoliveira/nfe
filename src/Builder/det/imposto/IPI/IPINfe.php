<?php namespace PhpNFe\Builder\Det\Imposto\IPI;

/**
 * Informar apenas quando o item for sujeito ao IPI.
 * Class IPINfe
 * @package PhpNFe\Builder
 */
class IPINfe extends \PhpNFe\Builder\Builder
{
    /**
     * Classe de enquadramento do IPI para
     * Cigarros e Bebidas.
     * Preenchimento conforme Atos Normativos editados pela
     * Receita Federal (Observação 2)
     * @var string
     */
    public $clEnq = '';

    /**
     * CNPJ do produtor da mercadoria, quando
     * diferente do emitente. Somente para os
     * casos de exportação direta ou indireta.
     * Informar os zeros não significativos.
     * @var string
     */
    public $CNPJProd = '';

    /**
     * Código do selo de controle IPI.
     * Preenchimento conforme Atos Normativos editados pela
     * Receita Federal (Observação 3)
     * @var string
     */
    public $cSelo = '';

    /**
     * Quantidade de selo de controle.
     * @var string
     */
    public $qSelo = '';

    /**
     * Código de Enquadramento Legal do IPI.
     * Tabela a ser criada pela RFB, informar 999 enquanto a tabela
     * não for criada.
     * @var string
     */
    public $cEnq = '';

    /**
     * @var IPITribNfe
     */
    public $IPITrib;

    /**
     * @var IPINTNfe
     */
    public $IPINT;

    public function __construct()
    {
        $this->IPITrib = new IPITribNfe();
        $this->IPINT = new IPINTNfe();
    }
}