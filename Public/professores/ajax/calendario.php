<?php
include '../../../Config/config.php';
use Carbon\Carbon;
$tb_agendamento= new App\Models\Tb_agendamento();
$datasub7=Carbon::now()->subWeek(1)->startOfWeek()->toDateString();
$dataadd7=Carbon::now()->addWeek(1)->endOfWeek()->toDateString();
$hoje=Carbon::now()->toDateString();
$agendas=$tb_agendamento->select()->from()->all();
foreach ($agendas as $value):
    if (!($datasub7<$value->data && $value->data<$dataadd7)):
        $tb_agendamento->delete('idtb_agendamento',$value->idtb_agendamento);
    endif;
endforeach;
$color=[
    '#62B232','#B22506','#3053FF'
];
$agendamento=$tb_agendamento->select()->from()->between("data",$datasub7,$dataadd7)->all();
foreach ($agendamento as $value) {
    $horario=$value->tb_horario_idtb_horario;
    $professor=$tb_agendamento->select()->from('sisco.tb_usuario')->where('idtb_usuario',$value->tb_usuario_idtb_usuario)->first();
    foreach (explode(', ',$horario) as $hora):
        $hora_select=$tb_agendamento->select()->from('tb_horario')->where('idtb_horario',$hora)->first();
        if ($value->data==$hoje):
            if ($_SESSION['id_usuario']==$value->tb_usuario_idtb_usuario):
                $agenda[] = array(
                    'id'	=> $value->idtb_agendamento,
                    'title' => $professor->nome_usuario,
                    'start' => $value->data.'T'.$hora_select->inicio_horario,
                    'end' => $value->data.'T'.$hora_select->fim_horario,
                    'className' => 'fc-borda',
                    'color'=>$color[0],
                    'url' => "?p=agendamento&id=".$value->idtb_agendamento
                );
            else:
                $agenda[] = array(
                    'id'	=> $value->idtb_agendamento,
                    'title' => $professor->nome_usuario,
                    'start' => $value->data.'T'.$hora_select->inicio_horario,
                    'end' => $value->data.'T'.$hora_select->fim_horario,
                    'color'=>$color[0],
                    'className' => 'fc-borda',
                    'url' => "?p=agenda&id=".$value->idtb_agendamento
                );
            endif;
        elseif($value->data<$hoje):
            if ($_SESSION['id_usuario']==$value->tb_usuario_idtb_usuario):
                $agenda[] = array(
                    'id'	=> $value->idtb_agendamento,
                    'title' => $professor->nome_usuario,
                    'start' => $value->data.'T'.$hora_select->inicio_horario,
                    'end' => $value->data.'T'.$hora_select->fim_horario,
                    'className' => 'fc-borda',
                    'color'=>$color[1],
                    'url' => "?p=agendamento&id=".$value->idtb_agendamento
                );
            else:
                $agenda[] = array(
                    'id'	=> $value->idtb_agendamento,
                    'title' => $professor->nome_usuario,
                    'start' => $value->data.'T'.$hora_select->inicio_horario,
                    'end' => $value->data.'T'.$hora_select->fim_horario,
                    'color'=>$color[1],
                    'className' => 'fc-borda',
                    'url' => "?p=agenda&id=".$value->idtb_agendamento
                );
            endif;
        elseif ($value->data>$hoje):
            if ($_SESSION['id_usuario']==$value->tb_usuario_idtb_usuario):
                $agenda[] = array(
                    'id'	=> $value->idtb_agendamento,
                    'title' => $professor->nome_usuario,
                    'start' => $value->data.'T'.$hora_select->inicio_horario,
                    'end' => $value->data.'T'.$hora_select->fim_horario,
                    'className' => 'fc-borda',
                    'color'=>$color[2],
                    'url' => "?p=agendamento&id=".$value->idtb_agendamento
                );
            else:
                $agenda[] = array(
                    'id'	=> $value->idtb_agendamento,
                    'title' => $professor->nome_usuario,
                    'start' => $value->data.'T'.$hora_select->inicio_horario,
                    'end' => $value->data.'T'.$hora_select->fim_horario,
                    'color'=>$color[2],
                    'className' => 'fc-borda',
                    'url' => "?p=agenda&id=".$value->idtb_agendamento
                );
            endif;
        endif;
    endforeach;
}
echo json_encode($agenda);