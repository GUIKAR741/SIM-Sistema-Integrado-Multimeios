<?php
namespace App\Models;

/**
 * Class Login
 * @package App\Models
 */
class Login extends Model{

    /**
     * Retorna um Select com Where
     * @param $campo
     * @param $valor
     * @return mixed
     */
    public function wheres($campo, $valor){
        return $this->select()->from($this->table)->where($campo,$valor)->first();
    }
}