<?php
include_once ('../../Config/config.php');
//dump($_SESSION);
if (isset($_GET['sair']) || isset($_REQUEST['sair']) ):
    session_destroy();
    header('Location:../login.php?p=logout');
    exit;
elseif (!(isset($_SESSION['logado']))||(!isset($_SESSION['nome'])||(!isset($_SESSION['email']))||($_SESSION['nivel']!='Biblioteca'))):
    header("Location:../login.php?p=negado");
    exit;
endif;
$require=(!is_null(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)))?filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING):"home";
require_once("../includes/header-back.php");
//alterarCss($require);
if (is_file("css/".$require."-css.php")):
    require_once("css/".$require."-css.php");
endif;
if ((is_file("pages/" . $require . ".php"))):
    $class="";
    require_once("../includes/loader-back.php");
    require_once("../includes/menu-biblioteca.php");
    require_once("../includes/sidebar-biblioteca.php");
    require_once("pages/".$require.".php");
else:
    $class="error-page page-404";
    require_once("../includes/loader-back.php");
    require_once ("../includes/404.php");
endif;
require_once("../includes/footer-back.php");
//alterarJs($require);
if (is_file("js/".$require."-js.php")):
    require_once("js/".$require."-js.php");
endif;
require_once("../includes/endhtml.php");