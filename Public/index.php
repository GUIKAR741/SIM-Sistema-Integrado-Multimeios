<?php
include_once ('../Config/config.php');
include_once('includes/header-front.php'); ?>
<!-- Stylesheets -->
<!--<link rel="stylesheet" href="assets/css/normalize.css">-->
<link rel="stylesheet" href="assets/font/font-awesome/css/font-awesome.min.css"><!--Ícones-->
<link rel="stylesheet" href="assets/libs/materialize/css/materialize.min.css" media="screen,projection"/>
<link rel="stylesheet" href="assets/css/bootstrap.css" media="screen,projection"/>

<link rel="stylesheet" href="assets/css/animate.min.css" media="screen,projection"/>
<!--<link rel="stylesheet" href="assets/libs/sweetalert/sweet-alert.css" media="screen,projection"/> Ñ SEI-->

<link rel="stylesheet" href="assets/libs/owl-carousel/owl.carousel.css" media="screen,projection"/>
<link rel="stylesheet" href="assets/libs/owl-carousel/owl.transitions.css" media="screen,projection"/>
<!--<link rel="stylesheet" href="assets/libs/owl-carousel/owl.theme.css" media="screen,projection"/> Ñ SEI-->

<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/responsive.css">

<!-- Choose your default colors -->
<link rel="stylesheet" href="assets/css/colors/color1.css">
<link rel="stylesheet" href="assets/css/estilo.css">
<!-- Stylesheets END-->
<?php include_once('includes/preloader-front.php'); ?>
<?php include_once('includes/menu-front.php'); ?>
<!-- ConteudoSite -->

<?php

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    //Pagina inicial do sistema
    if ($p == 'home') {
        include_once('pages/home.php');

    }  elseif ($p == 'about') {
        include_once('pages/about.php');

    } elseif ($p == 'contact') {
        include_once('pages/contact.php');

    } elseif ($p == 'collection') {
        include_once('pages/collection.php');

    } else {
        echo "<br /><br /><br /><br /><br />Página inexistente!";
    }
} else {
    include_once("pages/home.php");
}
?>

<!-- ConteudoSite END -->
<?php include_once('includes/footer-front.php'); ?>
<!-- JavaScripts -->
<script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script>
<script src="assets/js/jquery.easing.1.3.js"></script>
<script src="assets/js/detectmobilebrowser.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/waypoints.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/jquery.nicescroll.min.js"></script>
<!--<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>-->
<!--<script src="assets/js/gmaps.js"></script>-->
<script src="assets/libs/owl-carousel/owl.carousel.min.js"></script>
<script src="assets/libs/materialize/js/materialize.min.js"></script>
<!--<script src="assets/libs/jwplayer/jwplayer.js"></script>-->
<!--<script src="assets/libs/sweetalert/sweet-alert.min.js"></script> Ñ SEI-->
<script src="assets/js/common.js"></script>
<script src="assets/js/main.js"></script>
<!-- JavaScripts END -->
<?php include_once("includes/endhtml.php")?>
