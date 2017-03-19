<?php
$root=rtrim($_SERVER['DOCUMENT_ROOT'],'/');
require_once ("$root"."/SIM-Sistema-Integrado-Multimeios/vendor/autoload.php");
unset($root);
session_start();
//dump($_SESSION);
//$senha=new \App\Classes\Password();
//dump($senha->verificarPassword('qwe123',$senha->hash('qwe123')));
//session_destroy();