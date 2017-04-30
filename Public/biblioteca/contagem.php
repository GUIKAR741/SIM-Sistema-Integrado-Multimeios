<?php
include_once ('../../Config/config.php');
use Carbon\Carbon;
$dataini=Carbon::now()->startOfMonth()->toDateString();
$datafim=Carbon::now()->endOfMonth()->toDateString();
$tb_acervo=new \App\Models\Tb_acervo();
$tb_locacao=new \App\Models\Tb_locacao();
//seleciona so os campos com ids diferentes na tabela locacao
$ids=$tb_locacao->select('DISTINCT tb_aluno_idtb_aluno as id')->from()->all();
//dump($ids);
foreach ($ids as $value) {
    #contar todas as vezes que o id do aluno repete
    #entre o inicio e o fim do mes da data de devolucao
    #e onde o id do aluno é igual ao do selecionado
    #e status devolucao e status lido sao iguais a 0
    $qtd=$tb_locacao->select("count(tb_aluno_idtb_aluno) as idaluno")->from()->where("data_devolucao BETWEEN '$dataini' AND '$datafim' and (tb_aluno_idtb_aluno","'".$value->id."'",'=',false)->e("(status_devolucao=0 and status_lido","'0' ))","=",false)->first();
    if ($qtd->idaluno!=0):
        $idsaluno[$value->id]=$qtd->idaluno;
    endif;
    //dump($qtd);
}
#ordena o array do maior para o menor
arsort($idsaluno);
dump($idsaluno);
// Dump nos IDs distintos do Campo da Tabela do acervo
$idl=$tb_locacao->select('DISTINCT tb_acervo_idtb_acervo as id')->from()->all();
//dump($idl);
foreach ($idl as $value) {
    #contar todas as vezes que o id do livro repete
    #entre o inicio e o fim do mes da data de devolucao
    #e o id do acervo é igual ao do selecionado
    $qtd=$tb_locacao->select("count(tb_acervo_idtb_acervo) as idlivro")->from()->where("data_devolucao BETWEEN '$dataini' AND '$datafim'AND tb_acervo_idtb_acervo",$value->id)->first();
    if ($qtd->idlivro!=0):
        $idslivro[$value->id]=$qtd->idlivro;
    endif;
    //dump($qtd);
}
#ordena o array do maior para o menor
arsort($idslivro);
dump($idslivro);

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
dump($turma);
#esquece isso n existe
$all=$tb_acervo->select()->from()->all();
foreach ($all as $value) {
    if ($value->exemplares!=$value->disponiveis):
        $tb_acervo->disponiveis=$value->exemplares;
        $tb_acervo->update("idtb_acervo",$value->idtb_acervo);
        dump($value);
    endif;
}

