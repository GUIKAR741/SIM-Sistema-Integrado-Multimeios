<?php
if(isset($_POST['logar'])):

    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);

    $login = new App\Classes\Login(new App\Models\Admin());
    $login->setEmail($email);
    $login->setPassword($password);
    $logado = $login->logar();

    $logadoSistema = ($logado) ? 'redirecionar' : 'erro ao logar';
    dump($logadoSistema);

endif;
