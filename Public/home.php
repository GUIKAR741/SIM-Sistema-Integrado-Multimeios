<?php
include_once '../Config/config.php';
include_once 'includes/header.php';
//Logout e Negado
if (isset($_GET['sair']) || isset($_REQUEST['sair']) ):
    session_destroy();
    header('Location:index.php?acao=logout');
    exit;
elseif (!(isset($_SESSION['logado']))&&!(isset($_SESSION['nome'])&&!(isset($_SESSION['email']))&&!($_SESSION['logado']==true))):
    header("Location:index.php?acao=negado");
    exit;
endif;

include_once 'includes/nav.php';
include_once 'includes/sidebar.php';

if (isset($_GET['acao'])):
    $acao=$_GET['acao'];
    if ($acao=='home'):
        include_once 'pages/inicio.php';
    elseif ($acao=='acervo'):
        include_once "pages/acervo.php";
    elseif ($acao=='cadastroA'):
        include_once "pages/cadastroA.php";
    elseif ($acao=='updateA'):
        include_once "pages/updateA.php";
    elseif ($acao=='deleteA'):
        include_once "pages/deleteA.php";
    elseif ($acao=='aluno'):
        include_once "pages/aluno.php";
    elseif ($acao=='turma'):
        include_once "pages/turmas.php";
    elseif ($acao=='visualizarT'):
        include_once "pages/visualizarT.php";
    elseif ($acao=='updateT'):
        include_once "pages/updateT.php";
    elseif ($acao=='deleteT'):
        include_once "pages/deleteT.php";
    elseif ($acao=='updateTA'):
        include_once "pages/updateTA.php";
    elseif ($acao=='deleteTA'):
        include_once "pages/deleteTA.php";
    elseif ($acao=='tabela'):
        include_once "pages/tabela.php";
    else:
        include_once 'pages/erro404.php';
        echo "<script> setTimeout('document.location = \'home.php\'',1500);</script>";
    endif;
else:
    include_once 'pages/inicio.php';
endif;

include_once 'includes/footer.php';