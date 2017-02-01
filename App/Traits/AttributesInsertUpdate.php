<?php
namespace App\Traits;

/**
 * Class AttributesInsertUpdate
 * @package App\Traits
 */
trait AttributesInsertUpdate{
    /**
     * Recebe os Atributos
     * @var
     */
    protected $attributes;
    /**
     * Pega os Atributos Passados por Parametro
     * @param $object
     * @return $this
     */
    public function getAttributes($object){
        $this->attributes=call_user_func('get_object_vars',$object);
        return $this;
    }
    /**
     * Pega as Keys de insert
     * @return string
     */
    private function insertKeys(){
        return implode(",",array_keys($this->attributes));
    }
    /**
     * Pega as Keys de update
     * @return string
     */
    private function insertValues(){
        return ":".implode(",:",array_keys($this->attributes));
    }
    /**
     * Retorna a Query de Create
     * @return string
     */
    public function insertSql(){
        return "INSERT INTO $this->table({$this->insertKeys()}) VALUES ({$this->insertValues()})";
    }
    /**
     * Retorna a Query de Update
     * @param $field
     * @return string
     */
    public function updateSql($field){
        $sql="UPDATE $this->table SET ";
        foreach ($this->attributes as $key => $value):
            $sql.="$key=:$key, ";
        endforeach;
        $sql=rtrim($sql,", ");
        $sql.=" WHERE $field=:$field";
        return $sql;
    }
    /**
     * Retorna a Query de Delete
     * @param $field
     * @return string
     * @return string
     */
    public function deleteSql($field){
        return "DELETE FROM $this->table WHERE $field=:$field";
    }
}