<?php
$tb_acervo=new \App\Models\Tb_acervo();
$procura=isset($_SESSION['procura'])?$_SESSION['procura']:"";
$itens=isset($_SESSION['itens'])?$_SESSION['itens']:"10";
$pagina=isset($_GET['pag'])?intval($_GET['pag'])*$itens:0;

if (isset($procura) && $procura!=''):
    $livros=$tb_acervo->select()->from()->like(
        "tipo_acervo = 'tves' and titulo LIKE '%$procura%' or autor LIKE '%$procura%' ".
        " or local LIKE '%$procura%' or editora LIKE '%$procura%' ".
        " or observacao LIKE '%$procura%' or data LIKE '%$procura%' ".
        " or volume LIKE '%$procura%' or exemplares LIKE '%$procura%' ".
        " or ano_publicacao LIKE '%$procura%' or forma_de_aquisicao ","%$procura%"
    )->limite("$pagina,$itens")->all();
    $livroRow=$tb_acervo->select()->from()->like(
        "tipo_acervo = 'tves' and (titulo LIKE '%$procura%' or autor LIKE '%$procura%' ".
        " or local LIKE '%$procura%' or editora LIKE '%$procura%' ".
        " or observacao LIKE '%$procura%' or data LIKE '%$procura%' ".
        " or volume LIKE '%$procura%' or exemplares LIKE '%$procura%' ".
        " or ano_publicacao LIKE '%$procura%' or forma_de_aquisicao ","$procura","'%","%')",false
    )->count();
    $total=$livroRow;
else:
    $livros=$tb_acervo->select()->from()->limite("$pagina,$itens")->where('tipo_acervo','tves')->all();
    $livroRow=$tb_acervo->count();
    $total=$tb_acervo->select()->from()->where('tipo_acervo','tves')->count();
endif;


$num_pag=ceil($total/$itens);

if (isset($_GET['pag'])) if((intval($_GET['pag']) < 0) || ((intval($_GET['pag'])>=$num_pag))):
    echo "<script> location='?p=tves'</script>";
endif;
?>
<main class="mn-inner p-h-xs pad-title">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Acervo de Livros</div>
            <div class="fixed-action-btn horizontal">
                <a class="btn-floating btn-large waves-effect waves-light blue-grey modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
            </div>
            <div id="modal1" class="modal modal-fixed-footer modAcervo" >
                <form method="post">
                    <div class="modal-content">
                        <h4 class="no-m-b">Adicionar novo livro</h4>
                        <div class="col m12 l6">
                            <div class="input-field">
                                <label for="titulo">Titulo</label>
                                <input placeholder="Digite o Titulo do Livro" id="titulo" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="Autor">Autor</label>
                                <input placeholder="Digite Nome do Autor" id="Autor" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="Local">Local</label>
                                <input placeholder="Digite o Local" id="Local" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="Editora">Editora</label>
                                <input placeholder="Digite o Nome da Editora" id="Editora" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label class="active" for="data">Data</label>
                                <input id="data" placeholder="Escolha a Data Desejada" type="date" class="datepicker">
                            </div>
                        </div>
                        <div class="col m12 l6">
                            <div>
                                <label for="ano">Ano de Publicação</label>
                                <div class="input-field">
                                    <p class="range-field no-m">
                                        <input type="range" class="no-m" id="ano" min="1975" value="<?= date('Y')?>" max="2025" />
                                    </p>
                                </div>
                            </div>
                            <div>
                                <label for="exemplares">Exemplares</label>
                                <div class="input-field">
                                    <p class="range-field no-m">
                                        <input type="range" class="no-m" id="exemplares" min="1" value="1" max="100" />
                                    </p>
                                </div>
                            </div><div>
                                <label for="volume">Volume</label>
                                <div class="input-field">
                                    <p class="range-field no-m">
                                        <input type="range" class="no-m" id="volume" min="1" value="1" max="50" />
                                    </p>
                                </div>
                            </div>
                            <div class="input-field">
                                <label for="formadeaq">Forma de Aquisição</label>
                                <input placeholder="Digite a Forma de Aquisição" id="formadeaq" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="OBS">OBS.</label>
                                <input placeholder="Digite Alguma Observação sobre o Livro" id="OBS" type="text" class="validate">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</a>
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
                            <th class="center">Ano de Publicação</th>
                            <th  class="center" style="padding-right: 0;padding-left: 0">Forma de Aquisição</th>
                            <th colspan="3"  class="center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        //$acervo=$tb_acervo->select()->from()->where('tipo_acervo','circulo')->all();
                        $i=1;
                        $turma=$tb_acervo->select()->from('sisco.tb_turma,sisco.tb_cursos')->where('sisco.tb_turma.tb_cursos_idtb_cursos','idtb_cursos','=',false)->order('serie')->all();


                        if (isset($_POST['env'])):
                            $_SESSION['procura']=strip_tags($_POST['procura']);
                            echo "<script>window.location='?p=tves';</script>";
                        endif;
                        if (isset($_GET['itens'])):
                            $_SESSION['itens']=$_GET['itens'];
                            echo "<script>window.location='?p=tves';</script>";
                        endif;


                        $pag=$pagina/$itens;

                        $iten=0;
                        foreach ($livros as $value):
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
                                <td class="no-m center no-p-h"><?= $value->ano_publicacao?></td>
                                <td class="no-m center no-p-h"><?= $value->forma_de_aquisicao?></td>
                                <td class="no-m center no-p-h">
                                    <a class="btn-floating btn waves-effect waves-light green" onclick="$('#modal1<?= $value->idtb_acervo?>').openModal()"><i class="material-icons">mode_edit</i></a>
                                </td>
                                <td class="no-m center no-p-h">
                                    <a class="btn-floating btn waves-effect waves-light red" href="?p=acervo&del=<?= $value->idtb_acervo?>"><i class="material-icons">delete_forever</i></a>
                                </td>
                                <td class="no-m center no-p-h">
                                    <a class="btn-floating btn waves-effect waves-light cyan" onclick="$('#modal2<?= $value->idtb_acervo?>').openModal()"><i class="material-icons">book</i></a>
                                </td>
                                <div id="modal1<?= $value->idtb_acervo?>" class="modal modal-fixed-footer modAcervo" >
                                    <form method="post">
                                        <div class="modal-content">
                                            <h4 class="no-m-b">Adicionar novo livro</h4>
                                            <div class="col m12 l6">
                                                <div class="input-field">
                                                    <label for="titulo">Titulo</label>
                                                    <input placeholder="Digite o Titulo do Livro" id="titulo" type="text" class="validate">
                                                </div>
                                                <div class="input-field">
                                                    <label for="Autor">Autor</label>
                                                    <input placeholder="Digite Nome do Autor" id="Autor" type="text" class="validate">
                                                </div>
                                                <div class="input-field">
                                                    <label for="Local">Local</label>
                                                    <input placeholder="Digite o Local" id="Local" type="text" class="validate">
                                                </div>
                                                <div class="input-field">
                                                    <label for="Editora">Editora</label>
                                                    <input placeholder="Digite o Nome da Editora" id="Editora" type="text" class="validate">
                                                </div>

                                                <div class="input-field">
                                                    <label for="Sinopse">Sinopse</label>
                                                    <textarea id="Sinopse" class="materialize-textarea" placeholder="Digite a Sinopse do Livro"></textarea>
                                                </div>
                                                <div class="file-field input-field">
                                                    <div class="btn">
                                                        <span><i class="material-icons">publish</i></span>
                                                        <input type="file">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                </div>
                                                <!--<div class="input-field">
                                                    <label for="Sinopse">Sinopse</label>
                                                    <input placeholder="Digite a Sinopse do Livro" id="Sinopse" type="text" class="validate">
                                                </div>-->
                                            </div>
                                            <div class="col m12 l6">
                                                <div class="input-field">
                                                    <label class="active" for="data">Data</label>
                                                    <input id="data" placeholder="Escolha a Data Desejada" type="date" class="datepicker">
                                                </div>
                                                <div>
                                                    <label for="ano">Ano de Publicação</label>
                                                    <div class="input-field">
                                                        <p class="range-field no-m">
                                                            <input type="range" class="no-m" id="ano" min="1975" value="<?= date('Y')?>" max="2025" />
                                                        </p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="exemplares">Exemplares</label>
                                                    <div class="input-field">
                                                        <p class="range-field no-m">
                                                            <input type="range" class="no-m" id="exemplares" min="1" value="1" max="100" />
                                                        </p>
                                                    </div>
                                                </div><div>
                                                    <label for="volume">Volume</label>
                                                    <div class="input-field">
                                                        <p class="range-field no-m">
                                                            <input type="range" class="no-m" id="volume" min="1" value="1" max="50" />
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="input-field">
                                                    <label for="formadeaq">Forma de Aquisição</label>
                                                    <input placeholder="Digite a Forma de Aquisição" id="formadeaq" type="text" class="validate">
                                                </div>
                                                <div class="input-field">
                                                    <label for="OBS">OBS.</label>
                                                    <input placeholder="Digite Alguma Observação sobre o Livro" id="OBS" type="text" class="validate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</a>
                                        </div>
                                    </form>
                                </div>
                                <div id="modal2<?= $value->idtb_acervo?>" class="modal modal-fixed-footer modReserva" >
                                    <form method="post">
                                        <div class="modal-content">
                                            <h4 class="no-m-b">Locar Livro</h4>
                                            <div class="input-field">
                                                <select name="turmaSelect" id="turmaSelect<?= $value->idtb_acervo?>">
                                                    <option value="" disabled selected>Selecione uma Turma</option>
                                                    <?php foreach ($turma as $val): ?>
                                                        <option value="<?= $val->idtb_turma?>"><?= $val->serie?>° <?= $val->nome_curso?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="input-field">
                                                <select name="alunoSelect" id="alunoSelect<?= $value->idtb_acervo?>" disabled>
                                                    <option value="" disabled selected>Selecione um Aluno</option>
                                                </select>
                                            </div>
                                            <div class="input-field">
                                                <label class="active" for="data">Data</label>
                                                <input id="data" placeholder="Escolha a Data Desejada" type="date" class="datepicker">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</a>
                                        </div>
                                    </form>
                                </div>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
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
                                endif ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>