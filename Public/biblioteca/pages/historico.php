<?php
use Carbon\Carbon;

$tb_aluno=new \App\Models\SiscoTbAluno();
$tb_locacao=new \App\Models\Tb_locacao();
$tb_acervo=new \App\Models\Tb_acervo();
$id = strip_tags($_GET['idAluno']);
$aluno= $tb_aluno->select()->
from('sisco.tb_aluno,sisco.tb_turma')->
where('sisco.tb_aluno.tb_turma_idtb_turma','idtb_turma','=',false)->
e('idtb_aluno',$id)->
first();
$curso=$tb_aluno->select()->from('sisco.tb_cursos')->where('idtb_cursos',$aluno->tb_cursos_idtb_cursos,'=',false)->first();
$locacoes=$tb_locacao->select()->from()->where("tb_aluno_idtb_aluno",$aluno->idtb_aluno)->order("idtb_locacao",'desc')->all();
if (isset($_POST['devolver'])):
    if (isset($_POST['lido']) && $_POST['lido']=='yes'):
        $tb_locacao->status_lido=0;
    else:
        $tb_locacao->status_lido=1;
    endif;
    $livro=$tb_acervo->select()->from()->where("idtb_acervo",$_POST['devolver'])->first();
    $locacao=$tb_locacao->select()->from()->where("idtb_locacao",$_POST['idLocacao'])->first();
    if ($locacao->status_devolucao!=0):
        $tb_acervo->disponiveis=intval($livro->disponiveis)+1;
        $tb_locacao->status_devolucao=0;
        $tb_acervo->update('idtb_acervo',$_POST['devolver']);
    endif;
    $tb_locacao->update('idtb_locacao',$_POST['idLocacao']);
    echo "<script>document.location='?p=historico&idAluno=".strip_tags($_POST['idAluno'])."&livro=devolvido'</script>";
endif;
if (isset($_POST['renovar'])):
    $locacao=$tb_locacao->select()->from()->where("idtb_locacao",$_POST['idLocacao'])->first();
    if ($locacao->qtd_renovacao<3):
        $data7=Carbon::parse(strip_tags($locacao->data_devolucao))->addDays(7);
        $tb_locacao->data_devolucao=$data7;
        $tb_locacao->qtd_renovacao=$locacao->qtd_renovacao+1;
        $tb_locacao->update('idtb_locacao',$_POST['idLocacao']);
    endif;
    echo "<script>document.location='?p=historico&idAluno=".strip_tags($_POST['idAluno'])."&livro=renovado'</script>";
endif;
if (isset($_POST['edit'])):
    $id=strip_tags($_POST['idLocacao']);
    $tb_locacao->tb_aluno_idtb_aluno=strip_tags($_POST['idAluno']);
    if (isset($_POST['acervoSelect']) && $_POST['acervoSelect']!=''):
        $tb_locacao->tb_acervo_idtb_acervo=strip_tags($_POST['acervoSelect']);
    else:
        $locacaoATT=$tb_locacao->select()->from()->where('idtb_locacao',$id)->first();
        $tb_locacao->tb_acervo_idtb_acervo=$locacaoATT->tb_acervo_idtb_acervo;
    endif;
    $tb_locacao->data_locacao=strip_tags($_POST['locacao_submit']);
    $tb_locacao->data_devolucao=strip_tags($_POST['devolucao_submit']);
    $tb_locacao->update("idtb_locacao",$id);
    if (isset($_POST['lido']) && $_POST['lido']=='yes'):
        $tb_locacao->status_lido=0;
    else:
        $tb_locacao->status_lido=1;
    endif;
    $tb_locacao->update('idtb_locacao',$_POST['idLocacao']);
    echo "<script>document.location='?p=historico&idAluno=".strip_tags($_POST['idAluno'])."&livro=atualizado'</script>";
    //dump($_POST);
endif;
if (isset($_GET['del']) && $_GET['del']=="true"):
    $idLoc = strip_tags($_GET['idloc']);
    $loca=$tb_locacao->select()->from()->where('idtb_locacao',$idLoc)->first();
    if ($loca->status_devolucao==0):
        $tb_locacao->delete("idtb_locacao",$idLoc);
    else:
        $acervoloca=$tb_acervo->select()->from()->where("idtb_acervo",$loca->tb_acervo_idtb_acervo)->first();
        $tb_acervo->disponiveis=intval($acervoloca->disponiveis)+1;
        $tb_acervo->update("idtb_acervo",$acervoloca->idtb_acervo);
        $tb_locacao->delete("idtb_locacao",$idLoc);
    endif;
    echo "<script>document.location='?p=historico&idAluno=".$id."&livro=deletado'</script>";
endif;
if (isset($_GET['livro']) && $_GET['livro'] == 'devolvido'):
    $retorno="setTimeout(function (){swal(
        {title: \"Livro Devolvido Com Sucesso!\",type: \"success\",timer: 2000,showConfirmButton:false}
     )},2000);";
elseif (isset($_GET['livro']) && $_GET['livro'] == 'renovado'):
    $retorno="setTimeout(function (){swal(
        {title: \"Locação Renovada Com Sucesso!\",type: \"success\",timer: 2000,showConfirmButton:false}
     )},2000);";
elseif (isset($_GET['livro']) && $_GET['livro'] == 'atualizado'):
    $retorno="setTimeout(function (){swal(
        {title: \"Locação Atualizada Com Sucesso!\",type: \"success\",timer: 2000,showConfirmButton:false}
     )},2000);";
elseif (isset($_GET['livro']) && $_GET['livro'] == 'deletado'):
    $retorno="setTimeout(function (){swal(
        {title: \"Locação Deletada Com Sucesso!\",type: \"error\",timer: 2000,showConfirmButton:false}
     )},2000);";
endif;
?>
<main class="mn-inner pad-title p-h-xs">
    <div class="row">
        <div class="col s12">
            <div class="page-title"><?= $aluno->nome_aluno?></div>
        </div>
        <div class="col s12 m12 l12 no-p-h">
            <div class="card">
                <div class="card-content">
                    <p><?= $aluno->serie."º ".$curso->nome_curso?></p>
                    <table class="responsive-table striped bordered">
                        <thead>
                        <tr>
                            <th class="center">Livro</th>
                            <th class="center">Data da Locacão</th>
                            <th class="center">Data da Devolução</th>
                            <th class="center">Consultar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($locacoes as $value):
                            $acervo=$tb_locacao->select()->from('tb_acervo')->where('idtb_acervo',$value->tb_acervo_idtb_acervo)->first();
                            ?>
                            <tr>
                                <td class="center no-m no-p-h"><?= $acervo->titulo?></td>
                                <th class="center no-m no-p-h"><?= date("d/m/Y",strtotime($value->data_locacao))?></th>
                                <th class="center no-m no-p-h"><?= date("d/m/Y",strtotime($value->data_devolucao))?></th>
                                <td class="center no-m no-p-h">
                                    <a class="btn-floating btn waves-effect waves-light green" onclick="$('#modal1<?= $value->idtb_locacao?>').openModal()"><i class="material-icons">mode_edit</i></a>
                                    <a class="btn-floating btn waves-effect waves-light red" onclick="swal({
                                            title: 'Você tem Certeza?',
                                            text: 'não sera possivel recuperar as informações da Locação',
                                            type: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#DD6B55',
                                            confirmButtonText: 'SIM',
                                            cancelButtonText: 'NÃO',
                                            closeOnConfirm: false,
                                            closeOnCancel: false
                                            },
                                            function(isConfirm){
                                            if (isConfirm) {
                                            location.href='?p=historico&idAluno=<?= $id?>&del=true&idloc=<?= $value->idtb_locacao?>';
                                            } else {
                                            swal({title:'Cancelado', text:'Sua Locação não foi excluida', type:'success',timer: 2000,showConfirmButton:false});
                                            }
                                            })"><i class="material-icons">delete_forever</i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                    $i=0;
                    foreach ($locacoes as $value):
                        ?>
                        <div id="modal1<?= $value->idtb_locacao?>" class="modal modal-fixed-footer modReserva" >
                            <form method="post">
                                <div class="modal-content">
                                    <h4 class="no-m-b">Editar Locação</h4>
                                    <input type="hidden" value="<?= $value->idtb_locacao?>" name="idLocacao">
                                    <input type="hidden" value="<?= $value->tb_aluno_idtb_aluno?>" name="idAluno">
                                    <div class="input-field">
                                        <select name="tipoSelect" id="tipoSelect<?= $i?>">
                                            <option value="" disabled selected>Selecione um Acervo</option>
                                            <option value="livro">Livros</option>
                                            <option value="circulo">Circulo de leitura</option>
                                            <option value="cd-dvd">CDs e DVDs</option>
                                            <option value="tves">TV Escola</option>
                                            <option value="materiais">Materiais</option>
                                            <option value="jmf">JMF</option>
                                        </select>
                                    </div>
                                    <div class="input-field" style="margin-bottom: 20px">
                                        <select class="js-states browser-default" tabindex="-1" style="width: 100%;" name="acervoSelect" id="acervoSelect<?= $i++?>" disabled>
                                            <option value="">Selecione um Livro</option>
                                        </select>
                                    </div>
                                    <div class="input-field">
                                        <label class="active" for="data">Data da Locação</label>
                                        <input id="data" placeholder="Escolha a Data Desejada" type="date" name="locacao" data-value="<?= $value->data_locacao?>" class="datepicker">
                                    </div>
                                    <div class="input-field">
                                        <label class="active" for="data">Data da Devolução</label>
                                        <input id="data" placeholder="Escolha a Data Desejada" type="date" name="devolucao" data-value="<?= $value->data_devolucao?>" class="datepicker">
                                    </div>
                                    <div>
                                        <input type="checkbox" name="lido" id="lido<?= $i?>" value="yes" <?php if ($value->status_lido==0) echo "checked" ?>>
                                        <label for="lido<?= $i?>">Marcar Livro como Lido</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button name="edit" type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</button>
                                    <?php
                                    $locacao=$tb_locacao->select()->from()->where("idtb_locacao",$value->idtb_locacao)->first();
                                    if ($locacao->status_devolucao!=0):
                                        ?>
                                        <button name="devolver" type="submit" value="<?= $value->tb_acervo_idtb_acervo?>" class="modal-action modal-close waves-effect waves-green btn-flat">Devolver</button>
                                        <?php
                                        if ($locacao->qtd_renovacao<3):
                                            ?>
                                            <button name="renovar" type="submit" value="<?= $value->tb_acervo_idtb_acervo?>" class="modal-action modal-close waves-effect waves-green btn-flat">Renovar</button>
                                        <?php endif;endif; ?>
                                </div>
                            </form>
                        </div>
                        <?php
                    endforeach;?>
                </div>
            </div>
        </div>
    </div>
</main>