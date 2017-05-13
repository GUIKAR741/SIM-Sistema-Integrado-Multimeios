<?php
include_once ('../../Config/config.php');
use Carbon\Carbon;
$dataini=Carbon::now()->startOfMonth()->toDateString();
$datafim=Carbon::now()->endOfMonth()->toDateString();
$tb_acervo=new \App\Models\Tb_acervo();
$tb_locacao=new \App\Models\Tb_locacao();
//seleciona so os campos com ids diferentes na tabela locacao
$ids=$tb_locacao->select('DISTINCT tb_aluno_idtb_aluno as id')->from()->all();
$i=0;
$cor=[[
    'backgroundColor'=> "rgba(75,192,192,0.4)",
    'borderColor'=> "rgba(75,192,192,1)"
],[
    'backgroundColor'=> "rgba(199,21,133,0.4)",
    'borderColor'=> "rgba(199,21,133,1)"
],[
    'backgroundColor'=> "rgba(0,255,0,0.4)",
    'borderColor'=> "rgba(0,255,0,1)"
],[
    'backgroundColor'=> "rgba(255,69,0,0.4)",
    'borderColor'=> "rgba(255,69,0,1)"
],[
    'backgroundColor'=> "rgba(56,69,7,0.4)",
    'borderColor'=> "rgba(56,69,7,1)"
]
];
#alunos
foreach ($ids as $value) {
    #contar todas as vezes que o id do aluno repete
    #entre o inicio e o fim do mes da data de devolucao
    #e onde o id do aluno é igual ao do selecionado
    #e status devolucao e status lido sao iguais a 0
    if ($i<5):$i++;else:$i=0;break;endif;
    $qtd=$tb_locacao->select("count(tb_aluno_idtb_aluno) as idaluno")->from()->where("data_devolucao BETWEEN '$dataini' AND '$datafim' and (tb_aluno_idtb_aluno","'".$value->id."'",'=',false)->e("(status_devolucao=0 and status_lido","'0' ))","=",false)->first();
    if ($qtd->idaluno!=0):
        $idsaluno[$value->id]=$qtd->idaluno;
    endif;
    //dump($qtd);
}
arsort($idsaluno);#ordena o array do maior para o menor
$data['labels']="lidos";
foreach ($idsaluno as $key=>$item) {
    $info=$tb_locacao->from('sisco.tb_aluno')->where('idtb_aluno',$key)->first();
    $data['datasets'][]=[
        'label'=>$info->nome_aluno,
        'backgroundColor'=>$cor[$i]['backgroundColor'],
        'borderColor'=>$cor[$i++]['borderColor'],
        'borderWidth'=> '2',
        'data'=>"$item"
    ];
}
//echo(json_encode($data));
$i=0;
#livros
//IDs distintos do Campo da Tabela do acervo
$idl=$tb_locacao->select('DISTINCT tb_acervo_idtb_acervo as id')->from()->all();
foreach ($idl as $value) {
    #contar todas as vezes que o id do livro repete
    #entre o inicio e o fim do mes da data de devolucao
    #e o id do acervo é igual ao do selecionado
    if ($i<5):$i++;else:$i=0;break;endif;
    $qtd=$tb_locacao->select("count(tb_acervo_idtb_acervo) as idlivro")->from()->where("data_devolucao BETWEEN '$dataini' AND '$datafim'AND tb_acervo_idtb_acervo",$value->id)->first();
    if ($qtd->idlivro!=0):
        $idslivro[$value->id]=$qtd->idlivro;
    endif;

}
arsort($idslivro);#ordena o array do maior para o menor
$datas['labels']="lidos";
foreach ($idslivro as $key=>$item) {
    $info=$tb_locacao->from('tb_acervo')->where('idtb_acervo',$key)->first();
    $datas['datasets'][]=[
        'label'=>$info->titulo,
        'backgroundColor'=>$cor[$i]['backgroundColor'],
        'borderColor'=>$cor[$i++]['borderColor'],
        'borderWidth'=> '2',
        'data'=>"$item"
    ];
}
//echo(json_encode($datas));
#turmas
foreach ($idsaluno as $index => $item) {
    #seleciona as informações do aluno
    $alunoTur=$tb_acervo->select()->from("sisco.tb_aluno")->where("idtb_aluno",$index)->first();
    #coloca como index a turma do aluno e todos q tem a mesma turma dentro do mesmo array multidimensional
    $turma[$alunoTur->tb_turma_idtb_turma][$index]=$item;
    #se o tamanho do array for maior que ele tira(unset) o valor
    if (count($turma[$alunoTur->tb_turma_idtb_turma])>5):
        unset($turma[$alunoTur->tb_turma_idtb_turma][$index]);
    endif;
}
$j=0;
foreach ($turma as $index => $item) {
    $curso = $tb_acervo->select()->from('sisco.tb_turma,sisco.tb_cursos')->where('sisco.tb_turma.idtb_turma',$index)->e('sisco.tb_turma.tb_cursos_idtb_cursos', 'idtb_cursos','=',false)->order('ano','desc')->first();
    $datas1[$j]['labels']=$curso->serie.'º '.$curso->nome_curso;
    $i=0;
    foreach ($item as $key=>$value):
        $alunoTur=$tb_acervo->select()->from("sisco.tb_aluno")->where("idtb_aluno",$key)->first();
        $datas1[$j]['datasets'][]=[
            'label'=>$alunoTur->nome_aluno,
            'backgroundColor'=>$cor[$i]['backgroundColor'],
            'borderColor'=>$cor[$i++]['borderColor'],
            'borderWidth'=> '2',
            'data'=>"$value"
        ];
    endforeach;
    $j++;
}
dump($data);
dump($datas);
dump($datas1);

echo(json_encode($datas1));

#esquece isso n existe
$all=$tb_acervo->select()->from()->all();
foreach ($all as $value) :
    if ($value->exemplares!=$value->disponiveis):
        $tb_acervo->disponiveis=$value->exemplares;
        $tb_acervo->update("idtb_acervo",$value->idtb_acervo);
        dump($value);
    endif;
endforeach;