<?php
namespace App\Interfaces;

/**
 * Interface Ilogin
 * @package App\Interfaces
 */
interface Ilogin{
    /**
     * Metodo da interface para logar
     * @param $email
     * @param $password
     * @return mixed
     */
    public function logar($email, $password);
}