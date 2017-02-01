<?php
if(!isset($_GET['idT']) || empty($_GET['idT']) || !isset($_GET['idA']) || empty($_GET['idA'])):
    //header('Location: home.php?acao=acervo');
    echo "<script> location='home.php?acao=turma'</script>";
    exit;
endif;
$idT=$_GET['idT'];
$idA=$_GET['idA'];
use App\Models\Turma;
use App\Models\Alunos;
$turma=new Turma();
$aluno=new Alunos();
$alunos=$aluno->select()->from()->where('id',$idA)->first();
$turmas=$turma->select()->from()->all();
//dump($alunos);
$nome=$alunos->nome;
$num=$alunos->numero;
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Atualizar</li>
            <li class="active">Aluno</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Atualizar Aluno</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body form-horizontal">
                    <?php

                    if (isset($_POST['env'])):
                        $nome=strip_tags($_POST['nome']);
                        $num=strip_tags($_POST['n']);
                        $turma=strip_tags($_POST['turma']);
                        $aluno->numero=$num;
                        $aluno->nome=$nome;
                        $aluno->turma=$turma;
                        $row=$aluno->update('id',$idA);
                        if ($row > 0):
                            echo '<div class="alert bg-success" role="alert">
                    <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> <strong>Atualizado com sucesso!</strong><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
                            //header("Refresh:1.5 home.php?acao=acervo");
                            echo "<script> setTimeout('document.location = \'home.php?acao=visualizarT&idT={$idT}\'',3000);</script>";
                        else:
                            echo '<div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> <strong>Você não fez nenhuma alteração!</strong><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
                            //header("Refresh:1.5 home.php?acao=update&id={$id}");
                            echo "<script> setTimeout('document.location = \'home.php?acao=updateTA&idT={$idT}&idA={$idA}\'',3000);</script>";
                        endif;
                    endif;
                    ?>
                    <form action="" method="post">
                        <div class="form-group text-right">
                            <div class="col-sm-1" style="margin-top: 7px;">
                                <label for="titulo">Nome:</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" id="titulo" name="nome" value="<?= $nome?>" class="form-control">
                            </div>
                            <div class="col-sm-1" style="margin-top: 7px;">
                                <label for="autor">Nº</label>
                            </div>
                            <div class="col-sm-1">
                                <input type="number" maxlength="2" max="45" min="1" value="<?= $num?>" id="autor" name="n" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1 text-right" style="margin-top: 7px;">
                                <label for="turma">Turma:</label>
                            </div>
                            <div class="col-sm-11">
                                <select name="turma" id="turma" class="form-control">
                                    <option disabled selected>Selecione Uma Turma</option>
                                    <?php
                                    foreach ($turmas as $item):
                                        ?>
                                        <option value="<?= $item->id?>" <?php if ($item->id==$idT) echo 'selected';?>><?= $item->turma?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-5"></div>
                        <div class="col-md-2"><button type="submit" name="env" class="btn btn-primary">Atualizar</button></div>
                        <div class="col-md-5"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>