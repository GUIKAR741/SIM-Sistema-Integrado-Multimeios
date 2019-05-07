<?php
$root=rtrim($_SERVER['DOCUMENT_ROOT'],'/');
date_default_timezone_set("America/Fortaleza");
require_once ("$root"."/SIM-Sistema-Integrado-Multimeios/vendor/autoload.php");
unset($root);
session_start();
//dump($_SESSION);
if (isset($_SESSION['logado']) && $_SESSION['logado']):
    $user=new \App\Models\Tb_usuario();
    $userSisco=new \App\Models\SiscoTbUsuario();
    $usuario=$user->where('idtb_usuario',$_SESSION['id_usuario'])->first();
    $usuarioSisco=$userSisco->where('idtb_usuario',$_SESSION['id_usuario'])->first();
    /*if ($usuario || $usuarioSisco):
        dump($usuario);
        dump($usuarioSisco);
    endif;*/
    if ($usuario):
        if ($usuario->status_usuario!='0'):
            session_destroy();
            echo '<script>location.reload()</script>';
        endif;
        $_SESSION['nome']=$usuario->nome_usuario;
        $_SESSION['email']=$usuario->email_usuario;
        $_SESSION['nivel']=$usuario->tipo_usuario;
        $_SESSION['status']=$usuario->status_usuario;
    elseif($usuarioSisco):
        if ($usuarioSisco->status_usuario!='1'):
            session_destroy();
            echo '<script>location.reload()</script>';
        endif;
    endif;
    unset($user);
    unset($userSisco);
    unset($usuario);
endif;
//$senha=new \App\Classes\Password();
//dump($senha->verificarPassword('qwe123',$senha->hash('qwe123')));
//session_destroy();