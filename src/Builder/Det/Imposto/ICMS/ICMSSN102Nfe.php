<?php namespace PhpNFe\Builder\Det\Imposto\ICMS;

class ICMSSN102Nfe extends \PhpNFe\Tools\Builder\Builder
{
    /**
     * Origem da mercadoria.
     * 0 - Nacional, exceto as indicadas nos códigos 3, 4, 5 e 8;
     * 1 - Estrangeira - Importação direta, exceto a indicada no código
     * 6;
     * 2 - Estrangeira - Adquirida no mercado interno, exceto a
     * indicada no código 7;
     * 3 - Nacional, mercadoria ou bem com Conteúdo de Importação
     * superior a 40% e inferior ou igual a 70%;
     * 4 - Nacional, cuja produção tenha sido feita em conformidade
     * com os processos produtivos básicos de que tratam as
     * legislações citadas nos Ajustes;
     * 5 - Nacional, mercadoria ou bem com Conteúdo de Importação
     * inferior ou igual a 40%;
     * 6 - Estrangeira - Importação direta, sem similar nacional,
     * constante em lista da CAMEX e gás natural;
     * 7 - Estrangeira - Adquirida no mercado interno, sem similar
     * nacional, constante lista CAMEX e gás natural.
     * 8 - Nacional, mercadoria ou bem com Conteúdo de Importação
     * superior a 70%;.
     * @var string
     */
    public $orig = '';

    /**
     * Código de Situação da Operação –
     * Simples Nacional.
     * 102=Tributada pelo Simples Nacional sem permissão de
     * crédito.
     * 103=Isenção do ICMS no Simples Nacional para faixa de
     * receita bruta.
     * 300=Imune.
     * 400=Não tributada pelo Simples Nacional (v2.0).
     * @var string
     */
    public $CSOSN = '';
}