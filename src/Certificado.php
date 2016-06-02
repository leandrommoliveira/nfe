<?php

namespace PhpNFe;

class Certificado
{
    /**
     * Chave Pública
     * @var string
     */
    public $chavePub = '';
    /**
     * Chave Primária
     * @var string
     */
    public $chavePri = '';
    /**
     * Certificado
     * @var string
     */
    public $certificado = '';
    /**
     * CNPJ
     * @var string
     */
    public $cnpj = '';
    /**
     * Validade do Certificado
     * @var DateTime
     */
    public $validade;

    /**
     * carregarArquivo
     *
     * Carrega um arquivo já com as propriedades do certificado
     *
     * @param $arquivo
     */
    public function carregarArquivo($arquivo)
    {
        //Lendo o arquivo xml
        $content = simplexml_load_file($arquivo);

        //Carregando as propriedades
        $this->chavePri = $content->chave_pri;
        $this->chavePub = $content->chave_pub;
        $this->certificado = $content->certificado;
        $this->cnpj = $content->cnpj;
        $this->validade = $content->validade;
    }

    /**
     * carregarPfx
     *
     * Carrega um arquivo .pfx para pegar as propriedades do certificado
     *
     * @param $pfx
     * @param $senha
     */
    public function carregarPfx($pfx, $senha)
    {

    }

    /**
     * salvarArquivo
     *
     * Salva um arquivo com as propriedades do certificado
     *
     * @param $nomeArquivo
     */
    public function salvarArquivo($nomeArquivo)
    {

    }

    /**
     * ehValido
     *
     * Verifica se o certificado não está com a data de validade vencida
     *
     * @param $pfx
     */
    public function ehValido($pfx)
    {

    }


}