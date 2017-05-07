<?php
namespace App\Models;
use App\Interfaces\Ilogin;
/**
 * Class Itens
 * @package App\Models
 */
class SiscoTbUsuario extends Login implements Ilogin {
    /**
     * Recebe o Nome da Tabela
     * @var string
     */
    protected $table = 'sisco.tb_usuario';
    /**
     * Metodo da interface para logar
     * @param $email
     * @param $password
     * @return mixed
     */
    public function logar($email, $password){
        $user=$this->select()->from($this->table)->where("BINARY email_usuario",$email)->e("senha_usuario",$password)->e('status_usuario','1')->all();
        return (count($user)==1)?$user:false;
    }
}
