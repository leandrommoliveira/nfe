<?php namespace PhpNFe\Builder;

use Carbon\Carbon;
use PhpNFe\Builder\Cobr\CobrNfe;
use PhpNFe\Builder\Dest\DestNfe;
use PhpNFe\Builder\Emit\EmitNfe;
use PhpNFe\Builder\Total\TotalNfe;
use PhpNFe\Builder\Transp\TranspNfe;
use PhpNFe\Tools\Modulo11;

class Nfe extends Builder
{
    const Versao = '3.10';

    /**
     * Informações de identificação da NF-e.
     * @var IdeNFe
     */
    public $ide;

    /**
     * Identificação do emitente da NF-e.
     * @var EmitNfe
     */
    public $emit;

    /**
     * Identificação do Destinatário da NF-e.
     * Grupo obrigatório para a NF-e (modelo 55).
     * @var DestNfe
     */
    public $dest;

    /**
     * Detalhamento de Produtos e Serviços.
     * Múltiplas ocorrências (máximo = 990).
     * @var Colecoes
     */
    public $det = [];

    /**
     * Grupo Totais da NF-e.
     * O grupo de valores totais da NF-e deve ser informado com o
     * somatório do campo correspondente dos itens.
     * @var TotalNfe
     */
    public $total;

    /**
     * Grupo Informações do Transporte.
     * @var TranspNfe
     */
    public $transp;

    /**
     * Grupo Cobrança.
     * @var CobrNfe
     */
    public $cobr;

    /**
     * Grupo de Informações Adicionais.
     * @var InfAdic\InfAdicNfe
     */
    public $infAdic;

    /**
     * NFe constructor.
     */
    public function __construct()
    {
        $this->ide = new IdeNfe();
        $this->emit = new EmitNfe();
        $this->dest = new DestNfe();
        $this->det = new Colecoes([], '\PhpNFe\Builder\DetNfe', 'nItem');
        $this->total = new TotalNfe();
        $this->transp = new TranspNfe();
        $this->cobr = new PropriedadeNull('\PhpNFe\Builder\cobr\CobrNfe');
        $this->infAdic = new PropriedadeNull('\PhpNFe\Builder\infAdic\InfAdicNfe');
    }

    /**
     * Monta a chave de acesso.
     * @return string
     */
    protected function getID()
    {
        // Gerar número aleatorio
        if ($this->ide->cNF == '') {
            $this->ide->cNF = mt_rand(10000000, 99999999);
        }

        $dt = Carbon::createFromFormat(Carbon::ATOM, $this->ide->dhEmi, 'America/Sao_Paulo')->format('ym');

        $nNF = str_pad($this->ide->nNF, 9, '0', STR_PAD_LEFT);

        $serie = str_pad($this->ide->serie, 3, '0', STR_PAD_LEFT);

        // Montar os primeiros 43 caracteres
        $cNfe = $this->ide->cUF . $dt . $this->emit->CNPJ . $this->ide->mod . $serie . $nNF
            . $this->ide->tpEmis . $this->ide->cNF;

        // Calcular digito verificar
        $this->ide->cDV = Modulo11::nfeCalculaDV($cNfe);

        return ('NFe' . $cNfe) . $this->ide->cDV;
    }

    /**
     * @return string
     */
    public function getXML()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<NFe xmlns="http://www.portalfiscal.inf.br/nfe">';
        $xml .= '<infNFe versao="' . self::Versao . '" Id="' . $this->getID() . '">';

        $xml .= $this->geraXmlPropriedades();

        $xml .= '</infNFe>';
        $xml .= '</NFe>';

        return $xml;
    }

    /**
     * @param $arquivo
     */
    public function salvaXML($arquivo)
    {
        file_put_contents($arquivo, $this->getXML());
    }
}