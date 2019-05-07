<?php
include '../../../Config/config.php';
if (isset($_REQUEST['id'])):
    $id= $_REQUEST['id'];
    $tb_aluno=new \App\Models\SiscoTbAluno();
    $alunos=$tb_aluno->select()->from()->where('tb_turma_idtb_turma',$id)->order('diario')->all();
    foreach ($alunos as $value) {
        $aluno[] = array(
            'id'	=> $value->idtb_aluno,
            'aluno' => utf8_encode($value->nome_aluno),
        );
    }
    echo(json_encode($aluno));
endif;