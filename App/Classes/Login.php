<?php
namespace App\Classes;

use App\Interfaces\Ilogin;

/**
 * Class Login
 * @package App\Classes
 */
class Login{
    /**
     * Recebe os Dados do Usuario do Banco de Dados
     * @var
     */
    private $dadosUsuario;
    /**
     * Recebe a Instancia da Classe Password
     * @var Password
     */
    private $classePassword;
    /**
     * Recebe o Email do Usuario
     * @var
     */
    private $email;
    /**
     * Recebe o Password do Usuario
     * @var
     */
    private $password;
    /**
     * Recebe a Instancia da Classe Ilogin
     * @var Ilogin
     */
    private $usuario;
    /**
     * Login constructor.
     * @param Ilogin $login
     */
    public function __construct(Ilogin $login){
        $this->classePassword=new Password();
        if(method_exists($login,'logar')):
            $this->usuario=$login;
        endif;
    }
    /**
     * Metodo setter Email
     * @param $email
     */
    public function setEmail($email){
        $this->email = $email;
    }
    /**
     * Metodo setter Password
     * @param $password
     */
    public function setPassword($password){
        $this->password = $password;
    }
    /**
     * Verifica se a senha esta correta
     * @return bool
     */
    private function verificarPassword(){
        $this->dadosUsuario=$this->usuario->wheres("email",$this->email);
        return $this->classePassword->verificarPassword($this->password,$this->dadosUsuario->senha);
    }
    /**
     * Loga o usuario No sistema
     * @return bool
     */
    public function logar(){
        if($this->verificarPassword()):
            $logado=$this->usuario->logar($this->email,$this->dadosUsuario->senha);
            if($logado):
                $_SESSION['logado']=true;
                $_SESSION['nome']=$this->dadosUsuario->nome;
                $_SESSION['email']=$this->dadosUsuario->email;
                session_regenerate_id();
                return true;
            endif;
            else:
            return false;
        endif;
    }
}