<?php
include '../../../Config/config.php';
use Carbon\Carbon;

$tb_agendamento= new App\Models\Tb_agendamento();
$datasub7=Carbon::now()->subWeek(1)->startOfWeek()->toDateString();
$dataadd7=Carbon::now()->addWeek(1)->endOfWeek()->toDateString();
$agendamento=$tb_agendamento->select()->from()->between("data",$datasub7,$dataadd7)->all();
foreach ($agendamento as $value) {
    $horario=$value->tb_horario_idtb_horario;
    $professor=$tb_agendamento->select()->from('sisco.tb_usuario')->where('idtb_usuario',$value->tb_usuario_idtb_usuario)->first();
    foreach (explode(', ',$horario) as $hora):
        $hora_select=$tb_agendamento->select()->from('tb_horario')->where('idtb_horario',$hora)->first();
        $agenda[] = array(
            'id'	=> $value->idtb_agendamento,
            'title' => $professor->nome_usuario,
            'start' => $value->data.'T'.$hora_select->inicio_horario,
            'end' => $value->data.'T'.$hora_select->fim_horario,
            'className' => 'fc-borda',
            'url' => "?p=agendamento&id=".$value->idtb_agendamento
        );
    endforeach;
}

echo json_encode($agenda);