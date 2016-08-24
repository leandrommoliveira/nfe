<?php namespace PhpNFe\NFe\Builder\IdeNfe;

/**
 * Informação de Documentos Fiscais
 * referenciados.
 * Grupo com informações de Documentos Fiscais referenciados.
 * Informação utilizada nas hipóteses previstas na legislação. (Ex.:
 * Devolução de mercadorias, Substituição de NF cancelada,
 * Complementação de NF, etc.).
 * Class NFref.
 */
class NFref
{
    /**
     * Chave de acesso da NF-e referenciada.
     * Referencia uma NF-e (modelo 55) emitida anteriormente,
     * vinculada a NF-e atual, ou uma NFC-e (modelo 65).
     * @var string
     */
    protected $refNFe = '';
}