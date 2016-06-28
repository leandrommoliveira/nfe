<?php namespace PhpNFe\Builder;

class Colecoes
{
    /**
     * @var array
     */
    protected $array = [];

    /**
     * Nome da classe dos itens.
     * @var string
     */
    protected $classe = '';

    /**
     * Nome do atributo index.
     * @var string
     */
    protected $attrIndex = '';

    /**
     * Colecoes constructor.
     * @param array $array
     * @param $classe
     * @param string $attrIndex
     */
    public function __construct(array $array, $classe, $attrIndex = '')
    {
        $this->array = $array;
        $this->classe = $classe;
        $this->attrIndex = $attrIndex;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->array;
    }

    /**
     * @return mixed
     */
    public function make()
    {
        return $this->array[] = new $this->classe();
    }

    /**
     * @param $item
     * @return mixed
     */
    public function add($item)
    {
        return $this->array[] = $item;
    }

    /**
     * @return string
     */
    public function getAttrIndex()
    {
        return $this->attrIndex;
    }
}