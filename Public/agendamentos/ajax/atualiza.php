<?php
include '../../../Config/config.php';
$tb_agendamento= new App\Models\Tb_agendamento();
if (isset($_POST['action'])):
//    dump($_POST);
    $idAgendamento=$_POST['id'];
    $tb_agendamento->data=$data=$_POST['data_submit'];
    $idHora=$tb_agendamento->select('idtb_horario')->from('tb_horario')->all();
    $horaVF=[];
    foreach ($idHora as $item) {
        $horaVF[$item->idtb_horario]=false;
    }
    unset($idHora);
    $escolhido=$tb_agendamento->select()->from()->where('data',$data)->e('idtb_agendamento','')->all();
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
                                $horaVF[$_POST['horario'][$index1]]=true;
                            endif;
                        endforeach;
                    endforeach;
                endif;
            endforeach;
        endforeach;
    endforeach;
    $horaParaCad=[];
    foreach ($horaVF as $index => $item) {
        if (!in_array($index,$_POST['horario'])){
            $horaVF[$index]='not';
        }
    }
    foreach ($horaVF as $key=>$val):
        if ($val==false):
            $horaParaCad[]=$key;
        elseif (!is_bool($val)):
            unset($horaVF[$key]);
        endif;
    endforeach;
    if (isset($horaParaCad) && !empty($horaParaCad)):
        $horario=implode(", ",$horaParaCad);
        $recurso=isset($_POST['recurso'])?implode(", ",$_POST['recurso']):"";
        $turma=isset($_POST['turmas'])?implode(", ",$_POST['turmas']):"";
        $tb_agendamento->tb_turma_idtb_turma=$turma;
        $tb_agendamento->tb_recurso_idtb_recurso=$recurso;
        $tb_agendamento->tb_horario_idtb_horario=$horario;
        $tb_agendamento->tb_usuario_idtb_usuario=strip_tags($_POST['professor']);
        $tb_agendamento->update('idtb_agendamento',$idAgendamento);
        if (count($horaParaCad)==count($horaVF)):
            $json=['log'=>'yes'];
            echo json_encode($json);
        else:
            foreach ($horaVF as $key=>$val):
                $nome=$tb_agendamento->from('tb_horario')->where('idtb_horario',$key)->first();
                if ($val==true):
                    $aula['erro'][]=$nome->nome_horario;
                else:
                    $aula['ok'][]=$nome->nome_horario;
                endif;
            endforeach;
            foreach ($_POST['recurso'] as $val):
                $nome=$tb_agendamento->from('tb_recursos')->where('idtb_recurso',$val)->first();
                $recurUso[]=$nome->nome_recurso;
            endforeach;
            $retorno=['log'=>'retirado'];
            $retorno['aulaCad']=$aula['ok'];
            $retorno['aulaErro']=$aula['erro'];
            $retorno['recurso']=$recurUso;
            echo json_encode($retorno);
        endif;
    else:
        $retorno=['log'=>'error'];
        foreach ($horaVF as $key=>$val):
            $nome=$tb_agendamento->from('tb_horario')->where('idtb_horario',$key)->first();
            $aula[]=$nome->nome_horario;
        endforeach;
        foreach ($_POST['recurso'] as $val):
            $nome=$tb_agendamento->from('tb_recursos')->where('idtb_recurso',$val)->first();
            $recurUso[]=$nome->nome_recurso;
        endforeach;
        $retorno['aula']=$aula;
        $retorno['recurso']=$recurUso;
        echo json_encode($retorno);
    endif;
endif;