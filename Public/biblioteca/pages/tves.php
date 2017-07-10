<?php
#Biblioteca para data
use Carbon\Carbon;
#Biblioteca para Redimensionar imagem
use WideImage\WideImage;
#instancias das tabelas
$tb_acervo=new \App\Models\Tb_acervo();
$tb_locacao=new \App\Models\Tb_locacao();
#instancia da classe do upload
$upload=new \App\Classes\Upload('uploads/');
#Recebe o que foi pesquisado
$procura=isset($_SESSION['procura'])?$_SESSION['procura']:"";
#recebe a quantidade de itens por pagina
$itens=isset($_SESSION['itens'])?$_SESSION['itens']:"10";
#recebe a pagina selecionada
$pagina=isset($_GET['pag'])?intval($_GET['pag'])*$itens:0;
#caso tenha sido feita a pesquisa
if (isset($procura) && $procura!=''):
    #selecionar os campos q correspondem a pesquisa
    $livros=$tb_acervo->select()->from()->like(
        "tipo_acervo = 'tves' and titulo LIKE '%$procura%' or autor LIKE '%$procura%' ".
        " or local LIKE '%$procura%' or editora LIKE '%$procura%' ".
        " or observacao LIKE '%$procura%' or data LIKE '%$procura%' ".
        " or volume LIKE '%$procura%' or exemplares LIKE '%$procura%' ".
        " or ano_publicacao LIKE '%$procura%' or estante LIKE '%$procura%' or forma_de_aquisicao ","%$procura%"
    )->limite("$pagina,$itens")->all();
    #conta quantos valores existem para pesquisa
    $livroRow=$tb_acervo->select()->from()->like(
        "tipo_acervo = 'tves' and (titulo LIKE '%$procura%' or autor LIKE '%$procura%' ".
        " or local LIKE '%$procura%' or editora LIKE '%$procura%' ".
        " or observacao LIKE '%$procura%' or data LIKE '%$procura%' ".
        " or volume LIKE '%$procura%' or exemplares LIKE '%$procura%' ".
        " or ano_publicacao LIKE '%$procura%' or estante LIKE '%$procura%' or forma_de_aquisicao ","$procura","'%","%')",false
    )->count();
    $total=$livroRow;
else:
    #selecionar todos os livros do acervo atual pela quantidade de itens por pagina
    $livros=$tb_acervo->select()->from()->limite("$pagina,$itens")->where('tipo_acervo','tves')->all();
    #quantidade de livros mostrados
    $livroRow=$tb_acervo->count();
    #total de livros
    $total=$tb_acervo->select()->from()->where('tipo_acervo','tves')->count();
endif;
#quantidade de paginas
$num_pag=ceil($total/$itens);
#se não for escolhido nenhuma pagina sera redirecionado para mesma pagina
#onde ira para o inicio
if (isset($_GET['pag'])) if((intval($_GET['pag']) < 0) || ((intval($_GET['pag'])>=$num_pag))):
    echo "<script> location='?p=tves'</script>";
endif;
#cadastro de livro
if (isset($_POST['enviarCAD'])):
    #campos
    $tb_acervo->data=trim(strip_tags($_POST['data_submit']));
    $tb_acervo->titulo=(strip_tags($_POST['titulo']));
    $tb_acervo->autor=(strip_tags($_POST['autor']));
    $tb_acervo->local=(strip_tags($_POST['local']));
    $tb_acervo->editora=(strip_tags($_POST['editora']));
    $tb_acervo->exemplares=trim(strip_tags($_POST['exemplares']));
    $tb_acervo->disponiveis=trim(strip_tags($_POST['exemplares']));
    $tb_acervo->volume=trim(strip_tags($_POST['volume']));
    $tb_acervo->ano_publicacao=trim(strip_tags($_POST['ano']));
    $tb_acervo->forma_de_aquisicao=(strip_tags($_POST['formadeaq']));
    $tb_acervo->observacao=(strip_tags($_POST['OBS']));
    $tb_acervo->estante=(strip_tags($_POST['estante']));
    $tb_acervo->sinopse=(strip_tags($_POST['sinopse']));
    $tb_acervo->tipo_acervo="tves";
    #campos
    #se foi enviado a imagem
    if ($_FILES['arquivo']['error']==UPLOAD_ERR_OK):
        #copia a imagem para pasta do upload
        $upload->image($_FILES['arquivo'],date("d-m-Y-H-i-s"),'tves/');
        #redimensiona imagem para 250x350
        WideImage::load('../uploads/tves/'.$upload->getName())->resize(250,350,'fill')->saveToFile('../uploads/tves/'.$upload->getName());
        #coloca valor no campo da imagem
        $tb_acervo->capa=$upload->getResult()==true?$upload->getName():'imagem_nao_cadastrada.png';
    else:
        #coloca valor no campo da imagem
        $tb_acervo->capa='imagem_nao_cadastrada.png';
    endif;
    #salva o novo registro
    $tb_acervo->save();
    echo '<script>window.location=\'?p=tves&livro=cadastrado\'</script>';
endif;
#editar livros
if (isset($_POST['enviarEDIT'])):
    #id do livro
    $id=trim(strip_tags($_POST['idAcervo']));
    #seleciona as informações do livro q ira ser alterado
    $value=$tb_acervo->select()->from()->where('idtb_acervo',$id)->first();
    #campos
    $tb_acervo->data=trim(strip_tags($_POST['data_submit']));
    $tb_acervo->titulo=(strip_tags($_POST['titulo']));
    $tb_acervo->autor=(strip_tags($_POST['autor']));
    $tb_acervo->local=(strip_tags($_POST['local']));
    $tb_acervo->editora=(strip_tags($_POST['editora']));
    $tb_acervo->exemplares=trim(strip_tags($_POST['exemplares']));
    $tb_acervo->disponiveis=trim(strip_tags($_POST['exemplares']));
    $tb_acervo->volume=trim(strip_tags($_POST['volume']));
    $tb_acervo->ano_publicacao=trim(strip_tags($_POST['ano']));
    $tb_acervo->forma_de_aquisicao=(strip_tags($_POST['formadeaq']));
    $tb_acervo->observacao=(strip_tags($_POST['OBS']));
    $tb_acervo->estante=(strip_tags($_POST['estante']));
    $tb_acervo->sinopse=(strip_tags($_POST['sinopse']));
    $tb_acervo->tipo_acervo="tves";
    #campos
    #se foi enviado uma imagem para trocar
    if ($_FILES['arquivo']['error']==UPLOAD_ERR_OK):
        #se existir uma imagem no banco ira ser excluida
        if (file_exists("../uploads/tves/$value->capa") && is_file("../uploads/tves/$value->capa")):
            $upload->excluir($value->capa,'tves');
        endif;
        #copia a nova imagem
        $upload->image($_FILES['arquivo'],date("d-m-Y-H-i-s"),'tves/');
        #redimensiona imagem para 250x350
        WideImage::load('../uploads/tves/'.$upload->getName())->resize(250,350,'fill')->saveToFile('../uploads/tves/'.$upload->getName());
        #coloca valor no campo da imagem
        $tb_acervo->capa=$upload->getResult()==true?$upload->getName():'imagem_nao_cadastrada.png';
    else:
        #coloca valor no campo da imagem
        $tb_acervo->capa=$value->capa;
    endif;
    #atualiza as informações do livro
    $tb_acervo->update('idtb_acervo',$id);
    echo '<script>window.location=\'?p=tves&livro=atualizado\'</script>';
endif;
#deletar livro
if (isset($_GET['delete']) && $_GET['delete']==true):
    #id do livro q ira ser excluido
    $id = strip_tags($_GET['del']);
    #seleciona as informações do livro q ira ser deletado
    $value=$tb_acervo->select()->from()->where('idtb_acervo',$id)->first();
    #apaga a imagem do banco
    if (file_exists("../uploads/tves/$value->capa") && is_file("../uploads/tves/$value->capa")):
        $upload->excluir($value->capa,'tves/');
    endif;
    #apaga o registro
    $tb_acervo->delete('idtb_acervo', $id);
    $tb_locacao->delete("tb_acervo_idtb_acervo",$id);
    echo "<script>document.location='?p=tves&livro=deletado'</script>";
endif;
#cadastra a locação
if (isset($_POST['locacao'])):
    #seleciona o livro
    $attLivro=$tb_acervo->select()->from()->where("idtb_acervo",$_POST['idAcervo'])->first();
    #se a quantidade disponivel for maior que 0
    $alunoSel=strip_tags($_POST['alunoSelect']);
    $aluno=$tb_acervo->select()->from('sisco.tb_aluno')->where('idtb_aluno',$alunoSel)->count();
    dump($aluno);
    if (intval($attLivro->disponiveis)>0 && $aluno>0):
        #reduz 1 na quantidade disponivel
        $tb_acervo->disponiveis=intval($attLivro->disponiveis)-1;
        #atualiza o registro do livro
        $tb_acervo->update('idtb_acervo',$_POST['idAcervo']);
        #campos da tabela locacao
        $tb_locacao->tb_aluno_idtb_aluno=$alunoSel;
        $tb_locacao->tb_acervo_idtb_acervo=strip_tags($_POST['idAcervo']);
        $tb_locacao->data_locacao=strip_tags($_POST['data_submit']);
        #adiciona 7 dias na data de devolução do livro
        $data7=Carbon::parse(strip_tags($_POST['data_submit']))->addDays(7);
        $tb_locacao->data_devolucao=$data7;
        #salva o registro do livro
        $tb_locacao->save();
        //dump("?p=acervo&livro=locado&idaluno=".strip_tags($_POST['alunoSelect'])."&disponivel=true");
        //$link="?p=acervo&livro=locado&idaluno=".strip_tags($_POST['alunoSelect'])."&disponivel=true";
        echo "<script>document.location='?p=tves&livro=locado&idaluno=".strip_tags($_POST['alunoSelect'])."&disponivel=true'</script>";
    endif;
    echo "<script>document.location='?p=tves&livro=locado&idaluno=".strip_tags($_POST['alunoSelect'])."&disponivel=false'</script>";
endif;
if (isset($_GET['livro']) && $_GET['livro'] == 'cadastrado'):
    $retorno="setTimeout(function (){swal(
        {title: \"Livro Cadastrado Com Sucesso!\",type: \"success\",timer: 2000,showConfirmButton:false}
     )},2000);";
elseif (isset($_GET['livro']) && $_GET['livro'] == 'atualizado'):
    $retorno="setTimeout(function (){swal(
        {title: \"Livro Atualizado Com Sucesso!\",type: \"success\",timer: 2000,showConfirmButton:false}
     )},2000);";
elseif (isset($_GET['livro']) && $_GET['livro'] == 'deletado'):
    $retorno="setTimeout(function (){swal(
        {title: \"Livro Deletado Com Sucesso!\",type: \"error\",timer: 2000,showConfirmButton:false}
     )},2000);";
elseif (isset($_GET['livro']) && $_GET['livro'] == 'locado' && isset($_GET['idaluno'])):
    $idaluno=$_GET['idaluno'];
    $aluno=$tb_acervo->select()->from('sisco.tb_aluno')->where('idtb_aluno',$idaluno)->first();
    $data_devo=$tb_acervo->select()->from('tb_locacao')->where('tb_aluno_idtb_aluno',$idaluno)->first();
    if ($aluno!=false):
        if (isset($_GET['disponivel'])):
            if ($_GET['disponivel']=="true"):
                $retorno="setTimeout(function (){swal(
        {title: 'Livro Locado!',text:
        'Aluno: <a href=\"?p=historico&idAluno=".$aluno->idtb_aluno."\" class=\"grey-text\">".$aluno->nome_aluno."</a><br>".
                    "Devolução:".date('d/m/Y',strtotime($data_devo->data_devolucao))."'
        ,html:true,type: \"success\",showConfirmButton:true}
     )},2000);";
            elseif ($_GET['disponivel']=="false"):
                $retorno="setTimeout(function (){swal(
        {title: \"Erro ao Locar:<br>Quantidade de Livros Disponiveis Insuficiente\",type: \"error\",timer: 3000,showConfirmButton:false,html:true}
     )},2000);";
            endif;
        endif;
    else:
        $retorno="setTimeout(function (){swal(
        {title: \"Erro ao Locar:<br>Aluno Não Existe\",type: \"error\",timer: 2000,showConfirmButton:false,html:true}
        )},2000);";
    endif;
endif;
?>
<main class="mn-inner p-h-xs pad-title" xmlns:swal>
    <div class="row">
        <div class="col s12">
            <div class="page-title">Acervo de Livros</div>
            <div class="fixed-action-btn horizontal">
                <a class="btn-floating btn-large waves-effect waves-light blue-grey modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
            </div>
            <div id="modal1" class="modal modal-fixed-footer modAcervo" >
                <form method="post" enctype="multipart/form-data" id="form-0">
                    <div class="modal-content">
                        <h4 class="no-m-b">Adicionar novo livro</h4>
                        <div class="col m12 l6">
                            <div class="input-field">
                                <label for="titulo">Titulo</label>
                                <input placeholder="Digite o Titulo do Livro" id="titulo" name="titulo" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="autor">Autor</label>
                                <input placeholder="Digite Nome do Autor" id="autor" name="autor" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="local">Local</label>
                                <input placeholder="Digite o Local" id="local" name="local" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="editora">Editora</label>
                                <input placeholder="Digite o Nome da Editora" id="editora" name="editora" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label class="active" for="data">Data</label>
                                <input id="data" placeholder="Escolha a Data Desejada" data-value="<?= date('Y-m-d')?>" type="date" name="data" class="datepicker">
                            </div>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span><i class="material-icons">publish</i></span>
                                    <input type="file" name="arquivo">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" placeholder="Capa do Livro" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col m12 l6">
                            <div>
                                <label for="ano">Ano de Publicação</label>
                                <div class="input-field">
                                    <p class="range-field no-m">
                                        <input type="range" class="no-m" id="ano" name="ano" min="1975" value="<?= date('Y')?>" max="<?= date('Y')?>" />
                                    </p>
                                </div>
                            </div>
                            <div>
                                <label for="exemplares">Exemplares</label>
                                <div class="input-field">
                                    <p class="range-field no-m">
                                        <input type="range" class="no-m" id="exemplares" name="exemplares" min="1" value="1" max="100" />
                                    </p>
                                </div>
                            </div><div>
                                <label for="volume">Volume</label>
                                <div class="input-field">
                                    <p class="range-field no-m">
                                        <input type="range" class="no-m" id="volume" name="volume" min="1" value="1" max="50" />
                                    </p>
                                </div>
                            </div>
                            <div class="input-field">
                                <label for="formadeaq">Forma de Aquisição</label>
                                <input placeholder="Digite a Forma de Aquisição" id="formadeaq" name="formadeaq" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="OBS">OBS.</label>
                                <input placeholder="Digite Alguma Observação sobre o Livro" id="OBS" name="OBS" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="estante">Estante</label>
                                <input placeholder="Digite as informaçãoes sobre a Estante" id="estante" name="estante" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="sinopse">Sinopse.</label>
                                <textarea placeholder="Digite a Sinopse do Livro" id="sinopse" name="sinopse" type="text" class="materialize-textarea"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="enviarCAD" class="modal-action waves-effect waves-green btn-flat">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col s12 m12 l12 no-p-h">
            <div class="card">
                <div class="card-content">
                    <div class="row no-m">
                        <form method="post">
                            <div class="input-field col s12 m1">
                                <select name="itens" id="itens" onchange="window.location='?p=tves&itens='+ $('#itens').val()">
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <label for="itens">Itens por Pagina</label>
                            </div>
                            <div class="input-field col s9 m4 offset-m6">
                                <input placeholder="Pesquisar" name="procura" type="text">
                            </div>
                            <div class="input-field col m1 center m-t-md">
                                <button class="btn-floating btn waves-effect waves-light red" type="submit"  name="env">
                                    <i class='material-icons'>search</i>
                                </button>
                            </div>

                        </form>
                    </div>
                    <table class="responsive-table" style="">
                        <thead>
                        <tr>
                            <th class="center">#</th>
                            <th class="center">Titulo</th>
                            <th class="center">Autor</th>
                            <th class="center">Local</th>
                            <th class="center">Editora</th>
                            <th class="center">Observações</th>
                            <th class="center">Data</th>
                            <th class="center">Volume</th>
                            <th class="center">Exemplares</th>
                            <th class="center">Disponiveis</th>
                            <th class="center">Ano de Publicação</th>
                            <th  class="center" style="padding-right: 0;padding-left: 0">Forma de Aquisição</th>
                            <th class="center">Estante</th>
                            <th colspan="3"  class="center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        #seleciona as turmas do banco do sisco
                        $turma=$tb_acervo->select()->from('sisco.tb_turma,sisco.tb_cursos')->where('sisco.tb_turma.tb_cursos_idtb_cursos','idtb_cursos','=',false)->order('serie')->all();
                        #se for feita uma pesquisa
                        if (isset($_POST['env'])):
                            #coloca o valor na session e atualiza a pagina
                            $_SESSION['procura']=strip_tags($_POST['procura']);
                            echo "<script>window.location='?p=tves';</script>";
                        endif;
                        #se for alterado o valor de itens por pagina
                        if (isset($_GET['itens'])):
                            #coloca o valor na session e atualiza a pagina
                            $_SESSION['itens']=$_GET['itens'];
                            echo "<script>window.location='?p=tves';</script>";
                        endif;
                        #itens mostrados na pagina
                        $pag=$pagina/$itens;
                        #contar os itens mostrados
                        $iten=0;
                        #mostrar os livros
                        if(count($livros)):
                        foreach ($livros as $value):
                            #salva os ids de cada livro
                            $id[$value->idtb_acervo]=$value->idtb_acervo;
                            ?>
                            <tr>
                                <td class="no-m center no-p-h"><?= ($pagina++)+1;$iten++?></td>
                                <td class="no-m center no-p-h"><?= $value->titulo?></td>
                                <td class="no-m center no-p-h"><?= $value->autor?></td>
                                <td class="no-m center no-p-h"><?= $value->local?></td>
                                <td class="no-m center no-p-h"><?= $value->editora?></td>
                                <td class="no-m center no-p-h"><?= $value->observacao?></td>
                                <td class="no-m center no-p-h"><?= date('d/m/Y',strtotime($value->data))?></td>
                                <td class="no-m center no-p-h"><?= $value->volume?></td>
                                <td class="no-m center no-p-h"><?= $value->exemplares?></td>
                                <td class="no-m center no-p-h"><?= $value->disponiveis?></td>
                                <td class="no-m center no-p-h"><?= $value->ano_publicacao?></td>
                                <td class="no-m center no-p-h"><?= $value->forma_de_aquisicao?></td>
                                <td class="no-m center no-p-h"><?= $value->estante?></td>
                                <td class="no-m center no-p-h">
                                    <a class="btn-floating btn waves-effect waves-light green" onclick="$('#modal1<?= $value->idtb_acervo?>').openModal()"><i class="material-icons">mode_edit</i></a>
                                </td>
                                <td class="no-m center no-p-h">
                                    <a class="btn-floating btn waves-effect waves-light red" onclick="swal({
                                            title: 'Você tem Certeza?',
                                            text: 'não sera possivel recuperar as informações do livro',
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
                                            location.href='?p=tves&delete=true&del=<?= $value->idtb_acervo?>';
                                            } else {
                                            swal({title:'Cancelado', text:'Seu Livro não foi excluido', type:'error',timer: 2000,showConfirmButton:false});
                                            }
                                            })"><i class="material-icons">delete_forever</i></a>
                                </td>
                                <?php if ($value->disponiveis>0):?>
                                    <td class="no-m center no-p-h">
                                        <a class="btn-floating btn waves-effect waves-light cyan" onclick="$('#modal2<?= $value->idtb_acervo?>').openModal()"><i class="material-icons">book</i></a>
                                    </td>
                                <?php endif;?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                    else:
                        ?>
                        </tbody>
                        </table>
                        <div class="row">
                            <div class="center">
                                <i class="no-p no-m material-icons" style="font-size:125px !important;color: #ffe64c">warning</i>
                                <h4><b>Não há Registros para Mostar</b></h4>
                            </div>
                        </div>
                        <?php
                    endif;
                    if(count($livros)>0):
                    #repete os modais fora da tabela
                    foreach ($livros as $value):
                        ?>
                        <div id="modal1<?= $value->idtb_acervo?>" class="modal modal-fixed-footer modAcervo" >
                            <form method="post" enctype="multipart/form-data" id="form-1-<?= $value->idtb_acervo?>">
                                <div class="modal-content">
                                    <h4 class="no-m-b">Atualizar Livro</h4>
                                    <div class="col m12 l6">
                                        <input type="hidden" name="idAcervo" value="<?= $value->idtb_acervo?>">
                                        <div class="input-field">
                                            <label class="active" for="titulo">Titulo</label>
                                            <input placeholder="Digite o Titulo do Livro" id="titulo" name="titulo" value="<?= $value->titulo?>" type="text" class="validate">
                                        </div>
                                        <div class="input-field">
                                            <label class="active" for="autor">Autor</label>
                                            <input placeholder="Digite Nome do Autor" id="autor" name="autor" value="<?= $value->autor?>" type="text" class="validate">
                                        </div>
                                        <div class="input-field">
                                            <label class="active" for="local">Local</label>
                                            <input placeholder="Digite o Local" id="local" name="local" value="<?= $value->local?>" type="text" class="validate">
                                        </div>
                                        <div class="input-field">
                                            <label class="active" for="editora">Editora</label>
                                            <input placeholder="Digite o Nome da Editora" id="editora" value="<?= $value->editora?>" name="editora" type="text" class="validate">
                                        </div>
                                        <div class="input-field dt-#form-1-<?= $value->idtb_acervo?>">
                                            <label class="active" for="data">Data</label>
                                            <input id="data<?= $value->idtb_acervo?>" placeholder="Escolha a Data Desejada" data-value="<?= $value->data?>" type="date" class="datepicker" name="data">
                                        </div>
                                        <div>
                                            <?php
                                            #se existir uma imagem ira ser mostrada senão ira ser mostrada uma padrão
                                            if (file_exists("../uploads/tves/$value->capa") && is_file("../uploads/tves/$value->capa")):
                                                echo "<img src=\"../uploads/tves/$value->capa\" class=\"col s6\">";
                                            else:
                                                echo "<img src=\"../uploads/imagem_nao_cadastrada.png\" class=\"col s6\">";
                                            endif;?>
                                            <div class="file-field input-field col s6">
                                                <div class="btn col s12">
                                                    <span><i class="material-icons">publish</i></span>
                                                    <input type="file" name="arquivo">
                                                </div>
                                                <div class="file-path-wrapper col s12">
                                                    <input class="file-path validate" placeholder="Capa do Livro" value="<?= $value->capa?>" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col m12 l6">
                                        <div>
                                            <label for="ano">Ano de Publicação</label>
                                            <div class="input-field">
                                                <p class="range-field no-m">
                                                    <input type="range" class="no-m" id="ano" name="ano" min="1975" value="<?= $value->ano_publicacao?>" max="<?= date('Y')?>"/>
                                                </p>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="exemplares">Exemplares</label>
                                            <div class="input-field">
                                                <p class="range-field no-m">
                                                    <input type="range" class="no-m" id="exemplares" name="exemplares" min="1" value="<?= $value->exemplares?>" max="100" />
                                                </p>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="volume">Volume</label>
                                            <div class="input-field">
                                                <p class="range-field no-m">
                                                    <input type="range" class="no-m" id="volume" name="volume" min="1" value="<?= $value->volume?>" max="50" />
                                                </p>
                                            </div>
                                        </div>
                                        <div class="input-field">
                                            <label class="active" for="formadeaq">Forma de Aquisição</label>
                                            <input placeholder="Digite a Forma de Aquisição" id="formadeaq" name="formadeaq" value="<?= $value->forma_de_aquisicao?>" type="text" class="validate">
                                        </div>
                                        <div class="input-field">
                                            <label class="active" for="OBS">OBS.</label>
                                            <input placeholder="Digite Alguma Observação sobre o Livro" id="OBS" name="OBS" value="<?= $value->observacao?>" type="text" class="validate">
                                        </div>
                                        <div class="input-field">
                                            <label class="active" for="estante">Estante</label>
                                            <input placeholder="Digite as informaçãoes sobre a Estante" id="estante" name="estante" type="text" value="<?= $value->estante?>" class="validate">
                                        </div>
                                        <div class="input-field">
                                            <label class="active" for="sinopse">Sinopse.</label>
                                            <textarea placeholder="Digite a Sinopse do Livro" id="sinopse" name="sinopse" type="text" class="materialize-textarea"><?= $value->sinopse?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="enviarEDIT" class="modal-action waves-effect waves-green btn-flat">Atualizar</button>
                                </div>
                            </form>
                        </div>
                        <?php if ($value->disponiveis>0):?>
                        <div id="modal2<?= $value->idtb_acervo?>" class="modal modal-fixed-footer modReserva" >
                            <form method="post" id="form-2-<?= $value->idtb_acervo?>">
                                <div class="modal-content">
                                    <h4 class="no-m-b">Locar Livro</h4>
                                    <input type="hidden" name="idAcervo" value="<?= $value->idtb_acervo?>">
                                    <div class="input-field">
                                        <label for="turmaSelect<?= $value->idtb_acervo?>" class="active">Turmas:</label>
                                        <select name="turmaSelect" id="turmaSelect<?= $value->idtb_acervo?>" class="validate" required>
                                            <option value="0" disabled selected>Selecione uma Turma</option>
                                            <?php foreach ($turma as $val): ?>
                                                <option value="<?= $val->idtb_turma?>"><?= $val->serie?>° <?= $val->nome_curso?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="input-field">
                                        <label for="alunoSelect<?= $value->idtb_acervo?>" class="active">Alunos:</label>
                                        <select name="alunoSelect" id="alunoSelect<?= $value->idtb_acervo?>" class="validate" disabled required>
                                            <option value="0" disabled selected>Selecione um Aluno</option>
                                        </select>
                                    </div>
                                    <div class="input-field">
                                        <label class="active" for="data">Data</label>
                                        <input id="data" placeholder="Escolha a Data Desejada" type="date" class="datepicker" name="data" data-value="<?= date("Y-m-d")?>" required>
                                    </div>
                                    <input type="hidden" name="locacao">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="valida-but-<?= $value->idtb_acervo?>" class="modal-action waves-effect waves-green btn-flat">Salvar</button>
                                </div>
                            </form>
                        </div>
                    <?php endif;
                    endforeach;?>
                    <div class="card-content" style="display: flex;box-sizing: border-box">
                        <div class="col s12 m4">
                            <p class="center" style="text-transform: uppercase">
                                <?= "mostrando ".($pagina-$iten+1)." a ".($pagina)." de $total registros";?>
                            </p>
                        </div>
                        <div class="col s12 m8">
                            <ul class="pagination no-m center">
                                <?php if (($pag-1)<0): ?>
                                    <li class="disabled">
                                        <a href=""><i class="material-icons">chevron_left</i></a>
                                    </li>
                                    <?php
                                else:?>
                                    <li class="waves-effect">
                                        <a href="?p=tves&pag=<?= $pag-1?>"><i class="material-icons">chevron_left</i></a>
                                    </li>
                                    <?php
                                endif;
                                if ($pag>=4):
                                    ?>
                                    <li class="waves-effect">
                                        <a href="?p=tves&pag=0">1</a>
                                    </li>
                                    <li class="disabled" style="padding:0;">
                                        <a href="" style="color: #333;">...</a>
                                    </li>
                                    <?php
                                endif;
                                if ($pag-2==-2):
                                    $paglist=$pag+5;
                                    $pagatual=$pag-2;
                                elseif ($pag-2==-1):
                                    $paglist=$pag+4;
                                    $pagatual=$pag-2;
                                elseif ($pag==2):
                                    $paglist=$pag+3;
                                    $pagatual=$pag-3;
                                elseif ($pag==3):
                                    $paglist=$pag+2;
                                    $pagatual=$pag-3;
                                elseif ($pag==$num_pag-1):
                                    $paglist=$pag+3;
                                    $pagatual=$pag-4;
                                elseif ($pag==$num_pag-2):
                                    $paglist=$pag+2;
                                    $pagatual=$pag-2;
                                elseif ($pag==$num_pag-3):
                                    $paglist=$pag+3;
                                    $pagatual=$pag-2;
                                elseif ($pag==$num_pag-4):
                                    $paglist=$pag+4;
                                    $pagatual=$pag-1;
                                else:
                                    $paglist=$pag+2;
                                    $pagatual=$pag-1;
                                endif;
                                for ($i=$pagatual;$i<($paglist);$i++):
                                    if ($i>=0 && $i<$num_pag):
                                        ?>
                                        <li <?php if ($i == $pag): echo "class='active'"; else: echo "class=\"waves-effect\""; endif;?>>
                                            <a href="?p=tves&pag=<?= $i?>"><b><?= $i+1?></b></a>
                                        </li>
                                        <?php
                                    endif;
                                endfor;
                                if ($pag<=$num_pag-5):
                                    ?>
                                    <li class="disabled" style="padding:0;">
                                        <a href="" style="color: #333;">...</a>
                                    </li>
                                    <li class="waves-effect">
                                        <a href="?p=tves&pag=<?= $num_pag-1?>"><?= $num_pag?></a>
                                    </li>
                                    <?php
                                endif;
                                if ($pag<$num_pag-1):?>
                                    <li class="waves-effect">
                                        <a href="?p=tves&pag=<?= $pag+1?>"><i class="material-icons">chevron_right</i></a>
                                    </li>
                                    <?php
                                else:?>
                                    <li class="disabled">
                                        <a href=""><i class="material-icons">chevron_right</i></a>
                                    </li>
                                    <?php
                                endif;
                                endif?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>