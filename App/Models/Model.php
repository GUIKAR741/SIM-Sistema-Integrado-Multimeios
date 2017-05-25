<?php
namespace App\Models;

use App\Models\QueryBuilder\ModelQueryBuilder;
use App\Traits\AttributesInsertUpdate;
/**
 * Class Model
 * @package App\Models
 */
class Model extends ModelQueryBuilder {
    use AttributesInsertUpdate;
    /**
     * Recebe o Resultado dos Metodos
     * @var
     */
    private $result;
    /**
     * Retorna o Valor da Variavel $result
     * @return mixed
     */
    public function getResult(){
        return $this->result;
    }
    /**
     * Salva os Dados no Banco de Dados
     * @return string
     */
    public function save(){
        $insertSql=$this->getAttributes($this)->insertSql();
        $insert=$this->conexao->prepare($insertSql);
        foreach ($this->attributes as $key=>$value):
            $insert->bindValue(":$key",$value);
        endforeach;
        $insert->execute();
        $this->result=$this->conexao->lastInsertId();
        return $this->result;
    }

    /**
     * Atualiza os Dados no Banco de Dados
     * @param $field
     * @param $value
     * @param string $operation
     * @return int
     */
    public function update($field, $value, $operation='='){
        $updateSql=$this->getAttributes($this)->updateSql($field, $operation);
        $update=$this->conexao->prepare($updateSql);
        foreach ($this->attributes as $key => $values):
            $update->bindValue(":$key",$values);
        endforeach;;
        $update->bindValue(":$field",$value);
        $update->execute();
        $this->result=$update->rowCount();
        return $this->result;
    }

    /**
     * Apaga os Dados no Banco de Dados
     * @param $field
     * @param $value
     * @param string $operation
     * @return int
     */
    public function delete($field, $value, $operation='='){
        $deleteSql=$this->getAttributes($this)->deleteSql($field, $operation);
        $delete=$this->conexao->prepare($deleteSql);
        $delete->bindValue(":$field",$value);
        $delete->execute();
        $this->result=$delete->rowCount();
        return $this->result;
    }

    /**
     * Limpa e Reseta a Tabela
     * @return int
     */
    public function truncate(){
        $truncateSql = "TRUNCATE TABLE ".$this->table;
        $truncate = $this->conexao->prepare($truncateSql);
        $truncate->execute();
        $this->result = $truncate->rowCount();
        return $this->result;
    }
}