<?php
namespace App\Models\QueryBuilder;

use Database\Connection;
/**
 * Class ModelQueryBuilder
 * @package App\Models\QueryBuilder
 */
class ModelQueryBuilder extends QueryBuilder{
    /**
     * Recebe uma instancia da classe Connection
     * @var \PDO
     */
    protected $conexao;
    /**
     * ModelQueryBuilder constructor.
     */
    public function __construct(){
        $database=new Connection;
        $this->conexao=$database->connection();
    }
    /**
     * Retorna Todos os Valores Buscados no Banco de Dados
     * @return array
     */
    public function all(){
        $pdo = $this->conexao->prepare($this->queryBuilder());
        if(!$pdo->execute()):
            dump('Erro ao executar o sql '.$this->queryBuilder());
        endif;
        return $pdo->fetchAll();
    }
    /**
     * Retorna Apenas uma Linha do Banco de Dados
     * @return mixed
     */
    public function first(){
        $pdo = $this->conexao->prepare($this->queryBuilder());
        if(!$pdo->execute()):
            dump('Erro ao executar o sql '.$this->queryBuilder());
        endif;
        return $pdo->fetch();
    }
    /**
     * Conta quantas Linhas Foram Afetadas
     * @return int
     */
    public function count(){
        $pdo = $this->conexao->prepare($this->queryBuilder());
        if(!$pdo->execute()):
            dump('Erro ao executar o sql '.$this->queryBuilder());
        endif;
        return $pdo->rowCount();
    }
}