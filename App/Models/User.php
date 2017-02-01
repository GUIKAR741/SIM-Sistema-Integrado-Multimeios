<?php
namespace App\Models;

use App\Interfaces\Ilogin;
/**
 * Class User
 * @package App\Models
 */
class User extends Login implements Ilogin{
    /**
     * Recebe o Nome da Tabela
     * @var string
     */
    protected $table = "usuarios";
    /**
     * Loga o Usuario se Email e Senha Estiverem Corretos
     * @param $email
     * @param $password
     * @return bool
     */
    public function logar($email, $password){
        $user=$this->select()->from($this->table)->where("email",$email)->e("senha",$password)->all();
        return (count($user)==1)?true:false;
    }
}