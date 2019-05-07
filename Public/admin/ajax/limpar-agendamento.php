<?php
include '../../../Config/config.php';
$pass=new \App\Classes\Password();
$tb_usuario=new \App\Models\Tb_usuario();
$tb_agendamento=new \App\Models\Tb_agendamento();
$user=$tb_usuario->where('idtb_usuario',$_SESSION['id_usuario'])->first();
if (isset($_POST['sim'])):
    if ($pass->verificarPassword($_POST['senha'],$user->senha_usuario)):
        $tb_agendamento->truncate();
        $json=['yes'=>'yes'];
        echo json_encode($json);
    endif;
endif;