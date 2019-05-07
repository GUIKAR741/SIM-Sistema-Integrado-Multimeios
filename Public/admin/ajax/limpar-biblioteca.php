<?php
include '../../../Config/config.php';
$pass=new \App\Classes\Password();
$tb_usuario=new \App\Models\Tb_usuario();
$tb_locacao=new \App\Models\Tb_locacao();
$tb_acervo=new \App\Models\Tb_acervo();
$user=$tb_usuario->where('idtb_usuario',$_SESSION['id_usuario'])->first();
if (isset($_POST['sim'])):
    if ($pass->verificarPassword($_POST['senha'],$user->senha_usuario)):
        $tb_locacao->truncate();
        $all=$tb_acervo->select()->from()->all();
        #Reseta a Quantidade de Livros Disponiveis
        foreach ($all as $value) :
            if ($value->exemplares!=$value->disponiveis):
                $tb_acervo->disponiveis=$value->exemplares;
                $tb_acervo->update("idtb_acervo",$value->idtb_acervo);
            endif;
        endforeach;
        $json=['yes'=>'yes'];
        echo json_encode($json);
    endif;
endif;