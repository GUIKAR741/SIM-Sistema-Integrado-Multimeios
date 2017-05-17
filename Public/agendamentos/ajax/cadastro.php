<?php
include '../../../Config/config.php';
$tb_agendamento= new App\Models\Tb_agendamento();
if (isset($_POST['action'])):
    $tb_agendamento->data=$data=$_POST['data_submit'];
    $escolhido=$tb_agendamento->select()->from()->where('data',$data)->all();
    foreach ($escolhido as $value):
        $usuarioJaCad=$value->tb_usuario_idtb_usuario;
        $horarioJaCad=explode(", ",$value->tb_horario_idtb_horario);
        $recursoJaCad=explode(", ",$value->tb_recurso_idtb_recurso);
        foreach ($horarioJaCad as $horarioCad):
            foreach ($_POST['horario'] as $index1=>$hora):
                if ($horarioCad==$hora):
                    foreach ($recursoJaCad as $recursoCad):
                        foreach ($_POST['recurso'] as $index2=>$recur):
                            if ($recursoCad==$recur):
                                unset($_POST['horario'][$index1]);
//                                echo $recur;
                            endif;
                        endforeach;
                    endforeach;
                endif;
            endforeach;
        endforeach;
    endforeach;
//    dump(empty($_POST['horario']));
    if (isset($_POST['horario']) && (!empty($_POST['horario']))):
        $horario=implode(", ",$_POST['horario']);
        $recurso=isset($_POST['recurso'])?implode(", ",$_POST['recurso']):"";
        $turma=isset($_POST['turmas'])?implode(", ",$_POST['turmas']):"";
        $tb_agendamento->tb_turma_idtb_turma=$turma;
        $tb_agendamento->tb_recurso_idtb_recurso=$recurso;
        $tb_agendamento->tb_horario_idtb_horario=$horario;
        $tb_agendamento->tb_usuario_idtb_usuario=strip_tags($_POST['professor']);
        $id=$tb_agendamento->save();
//        echo '<script>window.location=\'?p=home&agendamento=cadastrado\'</script>';
        $json=['yes'=>'yes'];
        echo json_encode($json);
    else:
        $json=['error'=>'error'];
        echo json_encode($json);
//        echo '<script>window.location=\'?p=home&agendamento=negado\'</script>';
    endif;
endif;