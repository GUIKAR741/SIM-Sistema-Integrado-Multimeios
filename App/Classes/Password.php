<?php
namespace App\Classes;

/**
 * Class Password
 * @package App\Classes
 */
class Password{
    /**
     * Gera o HASH do Password
     * @param $password
     * @return bool|string
     */
    public function hash($password){
        $options=[
            'cost'=>11,
            'salt'=>mcrypt_create_iv(22,MCRYPT_DEV_RANDOM)
        ];
        return password_hash($password,PASSWORD_BCRYPT,$options);
    }
    /**
     * Verifica se o Password esta Correto
     * @param $password
     * @param $hash
     * @return bool
     */
    public function verificarPassword($password, $hash){
        if(password_verify($password,$hash)):
            return true;
        endif;
        return false;
    }
}