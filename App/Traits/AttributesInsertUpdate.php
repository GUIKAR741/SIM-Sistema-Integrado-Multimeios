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
    private function getAttributes($object){
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
    private function insertSql(){
        return "INSERT INTO $this->table({$this->insertKeys()}) VALUES ({$this->insertValues()})";
    }

    /**
     * Retorna a Query de Update
     * @param $field
     * @param $operation
     * @return string
     */
    private function updateSql($field, $operation){
        $sql="UPDATE $this->table SET ";
        foreach ($this->attributes as $key => $value):
            $sql.="$key=:$key, ";
        endforeach;
        $sql=rtrim($sql,", ");
        $sql.=" WHERE $field $operation :$field";
        return $sql;
    }

    /**
     * Retorna a Query de Delete
     * @param $field
     * @param $operation
     * @return string
     */
    private function deleteSql($field, $operation){
        return "DELETE FROM $this->table WHERE $field $operation :$field";
    }
}