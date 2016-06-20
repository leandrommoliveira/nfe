<?php namespace PhpNFe\Tools;

class Sefaz
{
    /**
     * Ambientes.
     */
    const ambHomologacao = 'homologacao';
    const ambProducao = 'producao';

    public static $ambientes = [
        self::ambProducao => '1',
        self::ambHomologacao => '2',
    ];

    /**
     * Funções.
     */
    const mtAutoriza = 'autoriza';
    const mtCancela = 'cancela';
    const mtCartaCorrecao = 'cartacorrecao';
    const mtInutilizacao = 'inutilizacao';

    /**
     * Portal.
     */
    const urlPortal = 'http://www.portalfiscal.inf.br/nfe';

    /**
     * Lista de servidores.
     * @var array
     */
    protected static $servers = [
        // SC
        '42' => [
            self::ambHomologacao => [
                self::mtAutoriza => [
                    'method' => 'nfeAutorizacaoLote',
                    'op' => 'NfeAutorizacao',
                    'versao' => '3.10',
                    'url' => 'https://nfe-homologacao.svrs.rs.gov.br/ws/NfeAutorizacao/NFeAutorizacao.asmx',
                ],
                self::mtCancela => [
                    'method' => 'nfeRecepcaoEvento',
                    'op' => 'RecepcaoEvento',
                    'versao' => '1.00',
                    'url' => 'https://nfe-homologacao.svrs.rs.gov.br/ws/recepcaoevento/recepcaoevento.asmx',
                ],
                self::mtCartaCorrecao => [
                    'method' => 'nfeRecepcaoEvento',
                    'op' => 'RecepcaoEvento',
                    'versao' => '1.00',
                    'url' => 'https://nfe-homologacao.svrs.rs.gov.br/ws/recepcaoevento/recepcaoevento.asmx',
                ],
                self::mtInutilizacao => [
                    'method' => 'nfeInutilizacaoNF2',
                    'op' => 'NfeInutilizacao2',
                    'versao' => '3.10',
                    'url' => 'https://nfe-homologacao.svrs.rs.gov.br/ws/nfeinutilizacao/nfeinutilizacao2.asmx',
                ],
            ],
            self::ambProducao => [
                self::mtAutoriza => [
                    'method' => 'nfeAutorizacaoLote',
                    'op' => 'NfeAutorizacao',
                    'versao' => '3.10',
                    'url' => 'https://nfe.svrs.rs.gov.br/ws/NfeAutorizacao/NFeAutorizacao.asmx',
                ],
            ],
        ],
    ];

    /**
     * Retorna configurações do metodo.
     *
     * @param $ambiente
     * @param $cuf
     * @param $method
     * @return MethodSefaz
     * @throws \Exception
     */
    public static function getMethodInfo($ambiente, $cuf, $method)
    {
        // Verificar se estado foi definido
        if (array_key_exists($cuf, self::$servers) != true) {
            throw new \Exception(sprintf('Código do estado %s não foi encontrado na difinição de servidores' . $cuf));
        }

        // Verificar se ambiente foi definido no estado
        if (array_key_exists($ambiente, self::$servers[$cuf]) != true) {
            throw new \Exception(sprintf('Ambiente %s não foi definido nas configurações do estado ' . $ambiente));
        }

        // Verificar se metodo foi definido no ambiente
        if (array_key_exists($method, self::$servers[$cuf][$ambiente]) != true) {
            throw new \Exception(sprintf('metodo %s não foi definido nas configurações do ambiente' . $method));
        }

        $info = array_merge(['cuf' => $cuf, 'amb' => $ambiente], self::$servers[$cuf][$ambiente][$method]);

        return new MethodSefaz($info);
    }
}