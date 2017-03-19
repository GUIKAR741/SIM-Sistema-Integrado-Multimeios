<?php
include_once ('../Config/config.php');
if ((isset($_SESSION['logado']))&&(isset($_SESSION['nome'])&&(isset($_SESSION['email']))&&($_SESSION['nivel']=='Biblioteca'))):
    header("Location:biblioteca/index.php?p=home");
    exit;
endif;
if ((isset($_SESSION['logado']))&&(isset($_SESSION['nome'])&&(isset($_SESSION['email']))&&($_SESSION['nivel']=='Agendamento'))):
    header("Location:agendamentos/index.php?p=home");
    exit;
endif;
if ((isset($_SESSION['logado']))&&(isset($_SESSION['nome'])&&(isset($_SESSION['email']))&&($_SESSION['nivel']=='Professor'))):
    header("Location:professores/index.php?p=home");
    exit;
endif;
$sisco_tb_usuario=new \App\Models\SiscoTbUsuario();
$tb_usuario=new \App\Models\Tb_usuario();
if (isset($_POST['login'])):
    $login=new App\Classes\Login($tb_usuario);
    if ($_POST['email']!='' && $_POST['password']!=''):
        $email=trim(strip_tags(filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING)));
        $senha=trim(strip_tags(filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING)));
        $login->setEmail($email);
        $login->setPassword($senha);
        $logado = @$login->logar();//?true:false;
        if ($logado==false):
            $login=new App\Classes\Login($sisco_tb_usuario);
            $login->setEmail($email);
            $login->setPassword($senha);
            $logado = @$login->logar(false);//?true:false;
        endif;
        //dump($senha);
        header("Location:login.php");
    else:
        $logado=false;
    endif;
endif;
if (isset($_GET['p']) && $_GET['p'] == 'negado'):
    $retorno="<script>
    swal({title: \"Acesso Negado!\",
     type: \"error\",timer: 3000,showConfirmButton:false},function() {
       setTimeout(document.location='login.php',3000);
     });
</script>";
elseif (isset($_GET['p']) && $_GET['p'] == 'logout'):
    $retorno="<script>
    swal({title: \"Obrigado por Usar o Sistema!\",
            type: \"warning\",timer: 3000,showConfirmButton:false},function() {
       setTimeout(document.location='login.php',3000);
       });
    </script>";
endif;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <!-- Title -->
    <title>Login - SIM</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>


    <!-- Theme Styles -->
    <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="signin-page">
<div class="loader-bg"></div>
<div class="loader">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-red">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-yellow">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-green">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>
<!--<a class="btn-floating btn-large waves-effect waves-light red" href="biblioteca/"><i class="material-icons">add</i></a>
<a class="btn-floating btn-large waves-effect waves-light blue" href="professores/"><i class="material-icons">send</i></a>
<a class="btn-floating btn-large waves-effect waves-light green" href="agendamentos/"><i class="material-icons">call</i></a>-->
<div class="mn-content valign-wrapper">
    <?php require_once("includes/login.php");?>
</div>

<!-- Javascripts -->
<script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="assets/plugins/materialize/js/materialize.min.js"></script>
<script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="assets/js/alpha.min.js"></script>
<!--<script src="assets/js/pages/miscellaneous-sweetalert.js"></script>>

    //$(document).ready(function() {
    //text: "You will not be able to recover this imaginary file!",
    //text: "You will not be able to recover this imaginary file!",
    //});-->
<?php if (isset($retorno)): echo $retorno;endif;?>
</body>
</html>