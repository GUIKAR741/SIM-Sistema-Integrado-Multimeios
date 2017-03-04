<?php
$root=rtrim($_SERVER['DOCUMENT_ROOT'],'/');
require_once ("$root"."/SIM-Sistema-Integrado-Multimeios/vendor/autoload.php");
unset($root);
session_start();
