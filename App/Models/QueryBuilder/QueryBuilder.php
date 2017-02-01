<?php
namespace App\Models\QueryBuilder;

/**
 * Class QueryBuilder
 * @package App\Models\QueryBuilder
 */
class QueryBuilder{
    /**
     * Recebe os Campos a Serem Selecionados
     * @var null
     */
    private $select=null;
    /**
     * Recebe a Tabela a Ser Selecionada
     * @var null
     */
    private $from=null;
    /**
     * Recebe que Campo Vai ser Selecionado
     * @var null
     */
    private $where=null;
    /**
     * Recebe os Argumentos do Metodo join
     * @var
     */
    private $join;
    /**
     * Recebe Como ira Ordenar a Tabela
     * @var null
     */
    private $order=null;
    /**
     * Recebe Valores Complementares a outros Metodos
     * @var null
     */
    private $and=null;
    /**
     * Recebe Valores Complementares a outros Metodos
     * @var null
     */
    private $or=null;
    /**
     * Recebe os Argumentos do Metodo between em uma string
     * @var null
     */
    private $between=null;
    /**
     * Recebe como irá Filtrar a Tabela
     * @var null
     */
    private $like=null;
    /**
     * Recebe o Limite de Linhas a Serem Selecionadas
     * @var null
     */
    private $limite=null;
    /**
     * Define quais Campos irão ser Selecionados
     * @return $this
     */
    public function select(){
        $selects=func_get_args();
        if(count($selects)>0):
            $this->select=implode(",",$selects);
        endif;
        return $this;
    }
    /**
     * Define qual Tabela irá ser Selecionada
     * @param null $from
     * @return $this
     */
    public function from($from=null){
        $this->from=$from;
        return $this;
    }
    /**
     * Adiciona a Clausula Where na Query
     * @param $field
     * @param $value
     * @param string $operation
     * @return $this
     */
    public function where($field, $value, $operation="="){
        $this->where=$field." ".$operation." '".$value."'";
        return $this;
    }
    /**
     * Pode ser usado como Complemento para o Metodo Where
     * @param $field
     * @param $value
     * @param string $operation
     * @return $this
     */
    public function e($field, $value, $operation="="){
        $this->and=$field." ".$operation." '".$value."'";
        return $this;
    }
    /**
     * Pode ser usado como Complemento para o Metodo Where
     * @param $field
     * @param $value
     * @param string $operation
     * @return $this
     */
    public function ou($field, $value, $operation="="){
        $this->or=$field." ".$operation." '".$value."'";
        return $this;
    }
    /**
     * Faz o Join com outra Tabela
     * @param $table
     * @param $join
     * @return $this
     */
    public function join($table, $join){
        if(func_num_args()!=2):
            trigger_error("O método join precisa de dois parâmetros");
        endif;
        $this->join[$table]=$join;
        return $this;
    }
    /**
     * Ordena os Campos da tabela
     * @param $field
     * @param $order
     * @return $this
     */
    public function order($field, $order){
        $this->order=$field." ".$order;
        return $this;
    }
    /**
     * Seleciona Campos entre Valores
     * @param $field
     * @param $value1
     * @param $value2
     * @return $this
     */
    public function between($field, $value1, $value2){
        $this->between=" WHERE ".$field." BETWEEN ".$value1." AND ".$value2;
        return $this;
    }
    /**
     * Faz uma Filtragem na Tabela
     * @param $field
     * @param $string
     * @param null $start
     * @param null $end
     * @return $this
     */
    public function like($field, $string, $start=null, $end=null){
        $this->like=" WHERE ".$field." LIKE '".$start.$string.$end."'";
        return $this;
    }
    /**
     * Define um Limite de Rows a serem Selecionadas
     * @param $value
     * @return $this
     */
    public function limite($value){
        $this->limite=$value;
        return $this;
    }
    /**
     * Retorna a Query do Select
     * @return string
     */
    protected function queryBuilder(){
        $query="SELECT ";

        if(is_null($this->select)):
            $this->select="*";
        endif;

        $query.=$this->select." FROM ";

        if(is_null($this->from)):
            $this->from=$this->table;
        endif;

        $query.=$this->from;

        if(!is_null($this->join)):
            foreach ($this->join as $table => $join) {
                $query.=" INNER JOIN ".$table." ON ".$join;
            }
        endif;

        if(!is_null($this->where)):
            $query.=" WHERE ".$this->where;
        endif;

        if(!is_null($this->and)):
            $query.=" AND ".$this->and;
        endif;

        if(!is_null($this->or)):
            $query.=" OR ".$this->or;
        endif;

        if(!is_null($this->like)):
            $query.=$this->like;
        endif;

        if(!is_null($this->between)):
            $query.=$this->between;
        endif;

        if(!is_null($this->order)):
            $query.=" ORDER BY ".$this->order;
        endif;

        if(!is_null($this->limite)):
            $query.=" LIMIT ".$this->limite;
        endif;
        return $query;
    }
}