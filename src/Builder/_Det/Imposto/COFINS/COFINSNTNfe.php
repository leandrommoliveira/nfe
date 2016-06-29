<?php namespace PhpNFe\Builder\Det\Imposto\COFINS;

class COFINSNTNfe extends \PhpNFe\Builder\Builder
{
    /**
     * Código de Situação Tributária da COFINS.
     * 04=Operação Tributável (tributação monofásica, alíquota zero);
     * 05=Operação Tributável (Substituição Tributária);
     * 06=Operação Tributável (alíquota zero);
     * 07=Operação Isenta da Contribuição;
     * 08=Operação Sem Incidência da Contribuição;
     * 09=Operação com Suspensão da Contribuição;.
     * @var string
     */
    public $CST = '';
}